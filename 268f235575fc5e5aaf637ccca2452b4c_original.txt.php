<?php

/*   _______________________________________
    |  Dikembangkan oleh - Raden Parhanudin |
    |    Whatsapp: https://6282342788059    |
    |_______________________________________|
*/
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
Route::middleware(["auth:sanctum", "request_statistic"])->group(function () {
    Route::post("/mysapk-auth", function (Request $request) {
        goto W2cYH;
        n5Ui7:
        $auth = json_decode($login, true);
        goto zPVdP;
        zPVdP:
        if (!isset($auth["AccessTokenAuth"])) {
            throw ValidationException::withMessages(["username" => "Username dan password MySAPK tidak sesuai"]);
        } else {
            $data_user = ["asn_id" => $auth["Data"]["pnsId"], "nama" => $auth["Data"]["pnsNama"], "nip" => $auth["Data"]["pnsNip"], "instansi_id" => $auth["Data"]["instansiKerjaId"], "instansi_nama" => $auth["Data"]["instansiKerjaNama"]];
        }
        goto MdMzW;
        NGr_i:
        if ($client->instansi_id != $data_user["instansi_id"]) {
            throw ValidationException::withMessages(["username" => "Anda bukan ASN {$client->instansi->nama}"]);
        }
        goto JXfNn;
        p4hDv:
        $login = Http::asForm()->baseUrl($baseUrl)->post("/mysapk/api/login", ["grant_type" => "password", "username" => $request->username, "password" => $request->password, "client_id" => "bkn-mysapk", "client_secret" => "42e6c9c8-76b8-4847-82d2-ce3ba86c1870", "grant_type_keycloack" => "password"]);
        goto n5Ui7;
        MdMzW:
        $client = User::with("instansi")->find(auth()->user()->id);
        goto NGr_i;
        JXfNn:
        return response()->json(["status" => "OK", "data_user" => $data_user], Response::HTTP_OK);
        goto Hzrfd;
        W2cYH:
        $baseUrl = "https://api-siasn.bkn.go.id:8443";
        goto p4hDv;
        Hzrfd:
    });
});
Route::middleware(["auth:sanctum", "request_statistic"])->get("/user", function (Request $request) {
    return $request->user();
});
