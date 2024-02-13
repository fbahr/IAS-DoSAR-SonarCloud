<?php

/* #1: PHPDeobfuscator eval output */ 
    namespace App\Http\Middleware;
    
    use App\Models\Billings\DiningArea;
    use App\Models\Billings\ShiftManage;
    use App\Models\Billings\WorkingDate;
    use App\Models\UserManagement\UserComputer;
    use Closure;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    class OpenShiftMiddleware
    {
        public function handle(Request $request, Closure $next, $area_ids = null)
        {
            $user = $request->user();
            if (!$user->is_shift_user) {
                return $next($request);
            }
            $w_date = WorkingDate::getWorkingDate();
            $shift = ShiftManage::getUclosedShift($w_date, $user->id, $user->club_id);
            $sweetAlert["type"] = "info";
            $sweetAlert["expression"] = "Shift Not Opened";
            $sweetAlert["message"] = "<p>Please Open your shift please</p>";
            if ($shift) {
                $session_area_id = $request->session()->get("area_id");
                $computer = UserComputer::where("ip", $request->getClientIp())->first();
                $area = DiningArea::where("area_id", $shift->areaid)->first("area_desc");
                $computer2 = UserComputer::where("id", $shift->till_no)->first();
                if ($area_ids) {
                    $aids = explode("|", $area_ids);
                    if (in_array($session_area_id, $aids) && $shift->till_no == $computer->id) {
                        return $next($request);
                    } else {
                        if (!in_array($session_area_id, $aids)) {
                            $sweetAlert["type"] = "info";
                            $sweetAlert["expression"] = "Shift Opened at " . ucwords(strtolower($area->area_desc));
                            $sweetAlert["message"] = "<p>You have opend your shift in <strong>" . $area->area_desc . "</strong>";
                            return response()->redirectTo(route("home-page"))->with("sweetAlert", $sweetAlert);
                        } else {
                            if ($shift->till_no != $computer->id) {
                                $sweetAlert["type"] = "info";
                                $sweetAlert["expression"] = "Shift Opened at " . $computer2->name;
                                $sweetAlert["message"] = "<p>Your shift is already opened at <strong>" . $computer2->name . "</strong>";
                                return response()->redirectTo(route("home-page"))->with("sweetAlert", $sweetAlert);
                            }
                        }
                    }
                }
                $sweetAlert["type"] = "info";
                $sweetAlert["expression"] = "Shift Already Opened";
                $sweetAlert["message"] = "<p>Shift already opened at <strong>" . $area->area_desc . "</strong> <br /> On <strong>" . $computer2->name . "</strong></p>";
                return response()->redirectTo(route("home-page"))->with("sweetAlert", $sweetAlert);
            }
            return response()->redirectTo(route("shift-management.create"))->with("sweetAlert", $sweetAlert);
        }
    }
/* END:#1 */
