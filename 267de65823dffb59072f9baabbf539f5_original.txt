<?php

namespace App\Http\Controllers;

use App\Common;
use App\Models\ExerciseJson;
use App\Models\Exercises;
use App\Models\GroupLearning;
use App\Models\Lesson;
use App\Models\LibraryFile;
use App\Models\SlideExerciseZip;
use App\Models\SlideZip;
use App\PermissionManager;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class AnonymousController extends BaseController
{
    public function __construct()
    {
    }
    public function view($room_code)
    {
        $room = GroupLearning::where("Code", $room_code)->first();
        if (!isset($room)) {
            abort(404);
        }
        if (!PermissionManager::IsOrganizationQC()) {
            abort(404);
        }
        return view("beta.learner.anonymous.live", compact("room"));
    }
    public function viewOld($room_code)
    {
        $room = GroupLearning::where("Code", $room_code)->first();
        if (!isset($room)) {
            abort(404);
        }
        if (Auth::user() != null) {
            if (Auth::user()->login_type == "learner") {
                return redirect(route("home") . "?redirect_code=" . $room_code);
            } else {
                return redirect(route("home"));
            }
        }
        $messageToken = Common::getMessageToken();
        $data = array("apiKey" => config("env.apiKey"), "authDomain" => config("env.authDomain"), "db" => config("env.db"), "projectId" => config("env.projectId"), "bucket" => config("env.bucket"), "senderId" => config("env.senderId"));
        return view("anonymous.view", compact("messageToken", "room", "data"));
    }
    public function getJsonExercise(Request $request)
    {
        $exercise_id = $request->get("exercise_id");
        $exercise = Exercises::find($exercise_id);
        if (isset($exercise)) {
            $return = array("FileUrl" => $exercise->FileJsonUrl);
        } else {
            $return = array("FileUrl" => '');
        }
        return response()->json($return);
    }
    public function getSlideZip(Request $request)
    {
        $libFile = LibraryFile::findOrFail($request->get("libraryId"));
        $section = Lesson::findOrFail($libFile->ContentId);
        $slide_zip = SlideZip::where("SectionId", $section->Id)->where("Version", $section->ContentVersion)->first();
        $result = array();
        $result["Approved"] = false;
        if (isset($slide_zip)) {
            $result["Approved"] = true;
            $result["JsonUrl"] = $slide_zip->FileJsonUrl;
        }
        return response()->json($result);
    }
    public function getExerciseFile(Request $request)
    {
        $libFile = LibraryFile::findOrFail($request->get("libraryId"));
        $section = Lesson::findOrFail($libFile->ContentId);
        $exercise_zip = SlideExerciseZip::where("SectionId", $section->Id)->where("Version", $section->ContentVersion)->first();
        $result = array();
        $result["Approved"] = false;
        if (isset($exercise_zip)) {
            $result["Approved"] = true;
            $result["JsonUrl"] = $exercise_zip->FileJsonUrl;
        }
        return response()->json($result);
    }
}
