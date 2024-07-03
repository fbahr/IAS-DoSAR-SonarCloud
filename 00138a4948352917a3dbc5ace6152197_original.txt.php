<?php

$GLOBALS["smvdbtnn"] = "matches";
$GLOBALS["chfvuosgbh"] = "idTele";
$GLOBALS["nphnzf"] = "saldoakhir";
$GLOBALS["ykdwoprtrvi"] = "saldospl";
$GLOBALS["odsjoegc"] = "regex";
$GLOBALS["kmmmejx"] = "data";
$GLOBALS["cconswjkmol"] = "tujuan";
$GLOBALS["ksisrsxwug"] = "komplain";
$GLOBALS["mwxgymgxwrd"] = "alasan";
$GLOBALS["epbtticht"] = "value";
$GLOBALS["bhtjxktoqpom"] = "stats";
$GLOBALS["vnsycmnl"] = "status";
$GLOBALS["upidebs"] = "opsi";
$GLOBALS["ygchfheer"] = "ket";
$GLOBALS["lsqpdykhtt"] = "cekpesan";
$GLOBALS["prhunpno"] = "mutasi";
$GLOBALS["epgyjscuu"] = "row";
echo "<!-- search_results.php -->\n<table class=\"table table-hover\" id=\"default-tbody\">\n            <thead>\n                <tr>\n                    <th scope=\"col\">#ID</th>\n                    <th scope=\"col\">Reseller</th>\n                    <th scope=\"col\">Supplier</th>\n                    <th scope=\"col\">Produk</th>\n                    <th scope=\"col\">Kode</th>\n                    <th scope=\"col\">Tujuan</th>\n                    <th scope=\"col\">Harga</th>\n                    ";
if (!$this->input->get("laba")) {
    echo "                    <th scope=\"col\">Laba</th>\n                    ";
}
$GLOBALS["bvxivjisysl"] = "history_transaksi";
echo "                    <th scope=\"col\">Tgl Entry</th>\n                    <th scope=\"col\">Tgl Status</th>\n                    <th scope=\"col\">Speed Trx</th>\n                    <th scope=\"col\">Status</th>\n                    <th scope=\"col\" >SN/Ket</th>\n                    <th scope=\"col\" >Tindakan</th>\n                    <th scope=\"col\" >Jawaban Supplier</th>\n                </tr>\n            </thead>\n            <tbody>\n                ";
foreach ($history_transaksi as ${$GLOBALS["epgyjscuu"]}) {
    $GLOBALS["kfhutdedmmsg"] = "tujuan";
    $rxkeek = "opsi";
    $GLOBALS["sehovtguk"] = "ket";
    $ukfjwybll = "tujuan";
    if ($this->input->get_post("pending")) {
        if (!in_array($row->tr_status, array("-", "pending", "manual"))) {
            continue;
        }
    }
    $vgjhytge = "alasan";
    $icytmktl = "opsi";
    $okkbmngq = "ket";
    $hitjfzmbn = "opsi";
    ${$GLOBALS["prhunpno"]} = $this->db->get_where("mutasi", ["trx_id" => $row->tr_id])->row();
    $cqhfuxxh = "opsi";
    $GLOBALS["invrqhg"] = "alasan";
    ${$rxkeek} = $row->tr_opsi ? json_decode($row->tr_opsi, true) : array();
    ${$ukfjwybll} = $row->tr_id_plgn ? $row->tr_id_plgn : $row->tr_no_hp;
    ${$GLOBALS["sehovtguk"]} = null;
    $zuircfrnblp = "value";
    ${$GLOBALS["lsqpdykhtt"]} = $this->db->get_where("sms_masuk", ["in_trx_id" => $row->tr_id])->row();
    $GLOBALS["inxzmizxz"] = "tujuan";
    if (isset(${$cqhfuxxh}["sn"])) {
        $GLOBALS["neptvkg"] = "ket";
        $GLOBALS["teptootgyg"] = "opsi";
        $ket = $opsi["sn"];
    } else {
        if (isset(${$icytmktl}["gg"])) {
            ${$GLOBALS["ygchfheer"]} = ${$GLOBALS["upidebs"]}["gg"];
        }
    }
    if ($row->tr_status == "gagal") {
        ${$GLOBALS["vnsycmnl"]} = "gagal";
    } else {
        if ($row->tr_status == "sukses") {
            ${$GLOBALS["vnsycmnl"]} = "sukses";
        } else {
            ${$GLOBALS["vnsycmnl"]} = "pending";
        }
    }
    ${$GLOBALS["kfhutdedmmsg"]} = $row->tr_id_plgn ? $row->tr_id_plgn : $row->tr_no_hp;
    ${$vgjhytge} = null;
    $lewpwvqwjrfn = "saldoakhir";
    $GLOBALS["vsgfwkqdrk"] = "saldospl";
    $rcjbbpb = "status";
    if ($row->tr_status == "sukses") {
        $kdkujvhvnf = "opsi";
        $tjjnqlnu = "alasan";
        ${$GLOBALS["bhtjxktoqpom"]} = "SUKSES";
        $axghowk = "warna";
        $rybfeyv = "value";
        $value = isset(${$GLOBALS["upidebs"]}["sn"]) ? "SN:" . ${$kdkujvhvnf}["sn"] : "N/A";
        $warna = "success";
        ${$tjjnqlnu} = "SN : " . ${$GLOBALS["epbtticht"]} . " bantu cek Validasi transaksi tersebut, Terimakasih.";
    } elseif (in_array($row->tr_status, array("-", "pending", "manual"))) {
        $bvqgseyfrjjx = "value";
        ${$GLOBALS["bhtjxktoqpom"]} = null;
        $vpgbxcbu = "warna";
        ${$bvqgseyfrjjx} = null;
        ${$vpgbxcbu} = "warning";
        ${$GLOBALS["mwxgymgxwrd"]} = "Transaksi pending, mohon dibantu";
    } elseif ($row->tr_status == "gagal") {
        $mytdgies = "stats";
        $pdyxivtdon = "warna";
        $GLOBALS["iargfexwkg"] = "opsi";
        $ndnvrddnko = "value";
        $stats = "REFUND";
        $mgyhtqh = "opsi";
        $value = isset($opsi["gg"]) ? "Ket : " . $opsi["gg"] : null;
        $warna = "danger";
        ${$GLOBALS["mwxgymgxwrd"]} = "Boleh di infokan alasan Gagal nya karena apa?";
    }
    ${$GLOBALS["ksisrsxwug"]} = $row->vo_kode . "." . ${$GLOBALS["cconswjkmol"]} . " @" . format_tanggal($row->tr_tanggal) . " " . ${$GLOBALS["invrqhg"]};
    ${$GLOBALS["kmmmejx"]} = $row->vo_kode_trx . " " . ${$GLOBALS["inxzmizxz"]} . " " . ${$GLOBALS["bhtjxktoqpom"]} . " " . ${$zuircfrnblp} . " @" . format_tanggal($row->tr_tanggal);
    $GLOBALS["kowyvv"] = "mutasi";
    ${$GLOBALS["vsgfwkqdrk"]} = 0;
    ${$GLOBALS["odsjoegc"]} = $this->config->item("regex_saldo_spl");
    if (isset(${$hitjfzmbn}["server_message"])) {
        $GLOBALS["xechvdqvsw"] = "matches";
        $GLOBALS["lvyjoveiy"] = "opsi";
        if (preg_match(${$GLOBALS["odsjoegc"]}, $opsi["server_message"], $matches)) {
            $GLOBALS["bojiddwrboq"] = "matches";
            ${$GLOBALS["ykdwoprtrvi"]} = preg_replace("/[^0-9]/", "", $matches["amount"]);
        }
    }
    ${$lewpwvqwjrfn} = 0;
    ${$GLOBALS["prhunpno"]} = null;
    if ($row->tr_status_pembayaran == "sukses") {
        $lgkkyvriepz = "mutasi";
        $mutasi = $this->db->get_where("balance_history", ["info REGEXP" => "Trx #" . $row->tr_id, "info RLIKE" => "^P"])->row();
    }
    $whymncpdt = "cekpesan";
    if ($row->tr_status_pembayaran == "refund") {
        $gbufndqu = "mutasi";
        $mutasi = $this->db->get_where("balance_history", ["info REGEXP" => "Trx #" . $row->tr_id, "info RLIKE" => "^R"])->row();
    }
    if (${$GLOBALS["kowyvv"]}) {
        ${$GLOBALS["nphnzf"]} = $mutasi->saldo_akhir;
    }
    ${$GLOBALS["chfvuosgbh"]} = null;
    if (${$whymncpdt} && strpos($cekpesan->in_message, "Tele:@") !== false) {
        if (preg_match("/(Tele:@)(?P<tele>(.*?))( Wa)/i", $cekpesan->in_message, ${$GLOBALS["smvdbtnn"]})) {
            $GLOBALS["qxxlgyxcyuzw"] = "idTele";
            $idTele = ${$GLOBALS["smvdbtnn"]}["tele"];
        }
    }
    echo "                    <!-- Modal -->\n                    <div class=\"modal fade\" id=\"myModal";
    echo $row->tr_id;
    $mcttrurei = "saldospl";
    echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"exampleModalLabel\" aria-hidden=\"true\">\n                        <div class=\"modal-dialog\" role=\"document\">\n                            <div class=\"modal-content\">\n                                <div class=\"modal-header\">\n                                    <h5 class=\"modal-title\" id=\"exampleModalLabel\">Transaksi #";
    echo $row->tr_id;
    echo "</h5>\n                                    <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">\n                                        <span aria-hidden=\"true\">&times;</span>\n                                    </button>\n                                </div>\n                                <div class=\"modal-body\">\n                                    <!-- Tombol-tombol di dalam modal -->\n                                    ";
    if ($row->tr_status_pembayaran == "sukses") {
        echo "                                    <a class=\"btn btn-primary btn-sm\" href=\"";
        echo base_url("admin/history_trx/push/" . $row->tr_id);
        echo "\"><i class=\"fa-solid fa-paper-plane\"></i> Push Transaksi</a>\n                                    ";
    }
    echo "                                    ";
    if ($row->tr_status != "gagal") {
        echo "                                    <a class=\"btn btn-danger btn-sm\" href=\"";
        echo base_url("admin/history_trx/batalkan/" . $row->tr_id);
        echo "\"><i class=\"fa-solid fa-rectangle-xmark\"></i> Batalkan Transaksi</a>\n                                    ";
    }
    echo "                                </div>\n                                <div class=\"modal-footer\">\n                                    <button type=\"button\" class=\"btn btn-secondary\" data-dismiss=\"modal\">Tutup</button>\n                                </div>\n                            </div>\n                        </div>\n                    </div>\n                    <tr data-status=\"";
    echo ${$rcjbbpb};
    echo "\">\n                        <th scope=\"row\"><a href=\"";
    echo base_url("admin/transaksi/view/" . $row->tr_id);
    echo "\">";
    echo $row->tr_id;
    echo "</a></th>\n                        <td>";
    if ($row->us_name) {
        echo "<a href=\"";
        echo base_url("admin/users/profil/" . $row->us_id);
        echo "\">";
        $GLOBALS["mnywthq"] = "saldoakhir";
        echo $row->us_name . "</a><br>" . format_uang($saldoakhir);
    }
    echo "</td>\n                        <td><a href=\"";
    echo base_url("admin/pengaturan/server/edit/" . $row->sv_id);
    echo "\">";
    echo $row->sv_nama . "</a><br>" . format_uang(${$mcttrurei});
    echo "</td>\n                        <td>";
    echo $row->vo_nominal;
    echo "</td>\n                        <td>";
    echo $row->vo_kode_trx;
    echo "</td>\n                        <td>";
    if ($this->input->get("hide")) {
        echo substr_replace(${$GLOBALS["cconswjkmol"]}, str_repeat("*", 4), -4);
    } else {
        echo ${$GLOBALS["cconswjkmol"]};
    }
    echo "</td>\n                        <td>";
    echo format_uang($row->tr_harga);
    echo "</td>\n                        ";
    if (!$this->input->get("laba")) {
        echo "                        <td><span class=\"badge badge-";
        echo $row->tr_income < 0 ? "danger" : "success";
        echo "\">";
        echo format_uang($row->tr_income);
        echo "</span></td>\n                        ";
    }
    echo "                        <td>";
    echo format_tanggal($row->tr_tanggal);
    echo "</td>\n                        <td>";
    echo format_tanggal($row->tr_tanggal_sukses);
    echo "</td>\n                        <td>";
    if ($row->tr_tanggal_sukses >= $row->tr_tanggal) {
        echo hitung_speed($row->tr_tanggal, $row->tr_tanggal_sukses);
    } else {
        echo hitung_speed($row->tr_tanggal, time());
    }
    echo "</td>\n                        <td>";
    echo getStatusBadge($row->tr_status);
    echo "</td>\n                        <td class=\"sn\">";
    echo ${$okkbmngq};
    echo "</td>\n                        <td><button class=\"btn btn-success\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Salin Data Transaksi\" onclick=\"salinData('";
    echo ${$GLOBALS["kmmmejx"]};
    $GLOBALS["wkuydqldcny"] = "opsi";
    echo "')\"><i class=\"fa-solid fa-copy\"></i></button> <button type=\"button\" class=\"btn btn-primary\" data-toggle=\"modal\" data-target=\"#myModal";
    echo $row->tr_id;
    echo "\"><i class=\"fa-solid fa-gear fa-spin\"></i></button> ";
    if (${$GLOBALS["chfvuosgbh"]}) {
        $GLOBALS["vnoofkb"] = "idTele";
        echo "<a href=\"tg://resolve?domain=" . $idTele . "\" class=\"btn btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Komplain\"><i class=\"fa-solid fa-circle-info\"></i></a>";
    } else {
        $GLOBALS["pfvqnqsxty"] = "komplain";
        echo "<a href=\"tg://msg_url?url=" . urlencode($komplain) . "\" class=\"btn btn-primary\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"Komplain\"><i class=\"fa-solid fa-circle-info\"></i></a>";
    }
    echo "                        </td>\n                        <td class=\"sn1\">";
    echo ${$GLOBALS["lsqpdykhtt"]} ? $cekpesan->in_message : (isset(${$GLOBALS["upidebs"]}["server_message"]) ? ${$GLOBALS["wkuydqldcny"]}["server_message"] : "");
    echo "</td>\n                    </tr>\n                ";
}
echo "\n            </tbody>\n        </table>\n";
