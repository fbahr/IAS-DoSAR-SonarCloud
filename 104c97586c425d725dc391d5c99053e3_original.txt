public function send($Kno7P, $qVBta, $Kr151, $aNzSV, $P5UXD, $ofNih, $qEFEH = null, $YmieO = null, $g7LMX = false, $sOOqh = '', $CjKou = '', $po_Sk = '', $GuVEX = false)
    {
        goto eeEEA;
        Cl2Sm:
        if (!$YmieO) {
            goto FZ0tc;
        }
        $o3XA7["senddate"] = date("YmdHis", strtotime($YmieO));
        FZ0tc:
        goto ksCYS;
        TP5qK:
        if (!$qEFEH) {
            goto xswLQ;
        }
        $o3XA7["button_1"] = json_encode(array("button" => $qEFEH));
        xswLQ:
        goto Cl2Sm;
        Ny3OS:
        return $this->R0Y6A($wexp8, $o3XA7);
        goto RU2TC;
        J5YM2:
        $o3XA7["fsubject_1"] = $sOOqh;
        $o3XA7["fmessage_1"] = $CjKou;
        eX0xC:
        goto umOGH;
        ksCYS:
        if (!$GuVEX) {
            goto aMFUO;
        }
        $o3XA7["testMode"] = "Y";
        aMFUO:
        goto Ny3OS;
        umOGH:
        if (!$po_Sk) {
            goto YzwI2;
        }
        $o3XA7["emtitle_1"] = $po_Sk;
        YzwI2:
        goto TP5qK;
        eeEEA:
        $wexp8 = "/alimtalk/send/";
        $o3XA7 = array("apikey" => $this->ObStm, "userid" => $this->YmIzV, "token" => $this->YsNGq, "senderkey" => $this->T8SmP, "tpl_code" => $Kno7P, "sender" => $qVBta, "subject_1" => $P5UXD, "message_1" => $ofNih, "receiver_1" => $Kr151, "recvname_1" => $aNzSV);
        if (!($g7LMX && $sOOqh && $CjKou)) {
            goto eX0xC;
        }
        goto J5YM2;
        RU2TC:
    }
