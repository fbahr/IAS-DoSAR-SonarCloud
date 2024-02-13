<?php

/* #1: PHPDeobfuscator eval output */ 
    // ini_set('display_errors', 0);
    // error_reporting(0);
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    #Colors
    $ress = "\x1b[0;32m";
    $res = "\x1b[0;33m";
    $red = "\x1b[0;31m";
    $green = "\x1b[0;37m";
    $nau = "\x1b[38;5;94m";
    $white = "\x1b[0;33m";
    $banner = "\r";
    $xnhac = "\x1b[1;96m";
    $den = "\x1b[1;90m";
    $do = "\x1b[1;91m";
    $luc = "\x1b[1;92m";
    $vang = "\x1b[1;93m";
    $xduong = "\x1b[1;94m";
    $hong = "\x1b[1;95m";
    $trang = "\x1b[1;97m";
    $y2 = "\x1b[0;33m";
    $white = "\x1b[0;37m";
    $cyan = "\x1b[1;36m";
    $blue = "\x1b[1;34m";
    $ngreen = "\x1b[42m";
    $ngreen = "\x1b[42m";
    $maul = rand(31, 37);
    $maui = "\x1b[1;" . $maul . "m";
    system('clear');
    $banner = "{$maui}\n\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\n\n\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x80\x83\xe2\x80\x83\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\n\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x80\x83\xe2\x80\x83\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x9d\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\n\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x80\x83\xe2\x80\x83\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\n\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x80\x83\xe2\x80\x83\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\n\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x80\x83\xe2\x80\x83\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x9d\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x94\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x97\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x96\x88\xe2\x96\x88\xe2\x96\x88\xe2\x95\x91\n\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x80\x83\xe2\x80\x83\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x9d\xe2\x96\x91\xe2\x96\x91\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\n";
    usleep(100000);
    echo $banner;
    usleep(100000);
    echo "\n\x1b[1;93m \xe2\x80\xa2\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x99\x9b\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x97\xe2\x80\xa2\n\x1b[1;92m        \xe2\x98\x9e Copyright : Nguy\xe1\xbb\x85n V\xc4\x83n H\xe1\xba\xa3i\n\x1b[1;92m        \xe2\x98\x9e Zalo: 0982641483\n\x1b[1;92m        \xe2\x98\x9e Facebook: https://www.facebook.com/bantinhcadautienn\n\x1b[1;93m \xe2\x80\xa2\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x9c\xa6\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x80\xa2\n";
    echo "\x1b[1;94m TOOLS C\xc3\x80Y XU T\xc4\x90S\n";
    $taskList = [];
    $tokenTds = "";
    $breakTime = 0;
    $idFb = "";
    $userNameTds = "";
    $forderImg = "";
    $cookie = "";
    $list_Cookie = [];
    $answer = "";
    // lưu tùy chọn chạy = profile hay page
    $jobSuccess = 0;
    $updateAntiBlock = 0;
    $savekey = "";
    $forderImg = "";
    // Input
    checkKey();
    echo "\x1b[1;93m Nh\xe1\xba\xadp proxy (\xc4\x91\xe1\xbb\x8bnh d\xe1\xba\xa1ng ip:port:user:pass, kh\xc3\xb4ng c\xc3\xb3 th\xc3\xac enter): ";
    $proxy = trim(fgets(STDIN));
    if ($proxy) {
        $proxy = explode(':', $proxy);
    }
    echo "\n{$vang} \xe2\x80\xa2\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x99\x9b\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x97\xe2\x80\xa2\n{$luc}        [1] => Reg page profile\n{$luc}        [2] => C\xc3\xa0y xu TDS\n{$vang} \xe2\x80\xa2\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x9c\xa6\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x80\xa2\n";
    echo "{$y2} => M\xe1\xbb\x9di b\xe1\xba\xa1n ch\xe1\xbb\x8dn: ";
    $selectService = trim(fgets(STDIN));
    if ($selectService == 1) {
        echo "{$y2} => M\xe1\xbb\x97i cookie reg m\xe1\xba\xa5y page: ";
        $numberPageReg = trim(fgets(STDIN));
        echo "{$y2} => Nh\xe1\xba\xadp th\xe1\xbb\x9di gian ngh\xe1\xbb\x89 sau khi reg 1 page: ";
        $timeWaitPage = trim(fgets(STDIN));
        echo "{$y2} => Nh\xe1\xba\xadp forder ch\xe1\xbb\xa9a \xe1\xba\xa3nh ( s\xe1\xbb\xada \\ th\xc3\xa0nh / ): ";
        $forderImg = trim(fgets(STDIN));
        loadCookieProfile();
        foreach ($list_Cookie as $key => $value) {
            $cookie = $value['cookie'];
            for ($i = 0; $i < $numberPageReg; $i++) {
                regPagePro5();
                sleep($timeWaitPage);
            }
        }
        exit("{$vang} Ch\xe1\xba\xa1y xong reg page ...");
    }
    loadTokenTds();
    loadCookies();
    echo "\n{$vang} \xe2\x80\xa2\xe2\x95\x94\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x99\x9b\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x97\xe2\x80\xa2\n{$luc}        [1] => Like ch\xc3\xa9o gi\xc3\xa1 cao\n{$luc}        [2] => Like ch\xc3\xa9o\n{$luc}        [3] => C\xe1\xba\xa3m x\xc3\xbac\n{$luc}        [4] => C\xe1\xba\xa3m x\xc3\xbac CMT\n{$luc}        [5] => Theo d\xc3\xb5i ch\xc3\xa9o\n{$luc}        [6] => Like page ch\xc3\xa9o\n{$luc}        [7] => Chia s\xe1\xba\xbb ch\xc3\xa9o\n{$vang} \xe2\x80\xa2\xe2\x95\x9a\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x9c\xa6\xe2\x95\x90\xe2\x95\x90\xe2\x98\xa9\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x90\xe2\x95\x9d\xe2\x80\xa2\n";
    loadTasks();
    echo "{$vang} Nh\xe1\xba\xadp th\xe1\xbb\x9di gian ngh\xe1\xbb\x89 gi\xe1\xbb\xafa m\xe1\xbb\x97i l\xe1\xba\xabn l\xc3\xa0m nhi\xe1\xbb\x87m v\xe1\xbb\xa5: ";
    $breakTime = trim(fgets(STDIN));
    echo "{$vang} L\xc3\xa0m \xc4\x91\xc6\xb0\xe1\xbb\xa3c bao nhi\xc3\xaau job th\xc3\xac ngh\xe1\xbb\x89 ch\xe1\xbb\x91ng block: ";
    $antiBlock = trim(fgets(STDIN));
    $updateAntiBlock = $antiBlock;
    echo "{$vang} Sau {$antiBlock} job th\xc3\xac ngh\xe1\xbb\x89 bao nhi\xc3\xaau gi\xc3\xa2y: ";
    $timeAntiBlock = trim(fgets(STDIN));
    // Finished entering
    $i = 0;
    // Plow coins
    while (true) {
        $countCookie = trim(file_get_contents($tokenTds . ".json"));
        $countCookie = json_decode($countCookie, true);
        if (count($countCookie) < 1) {
            loadCookies();
        }
        $cookie = $countCookie[$i];
        $cookie = $cookie['cookie'];
        if ($answer == "yes") {
            preg_match_all("/i_user=([0-9]+)/", $cookie, $id);
        } else {
            preg_match_all("/c_user=([0-9]+)/", $cookie, $id);
        }
        $idNick = $id[1][0];
        configure($idNick);
        likeAPc();
        likeBPc();
        reactionPc();
        reactionCmtPc();
        followPc();
        likePagePc();
        sharePc();
        if ($i >= count($countCookie) - 1) {
            $i = 0;
        } else {
            $i = 1;
        }
    }
    // Finish plowing coins
    function checkKey()
    {
        global $vang;
        global $maui;
        global $checkKey;
        global $do;
        echo "{$vang} Vui l\xc3\xb2ng nh\xe1\xba\xadp key: ";
        $key = trim(fgets(STDIN));
        $res = json_decode(curlTds("https://get-key-xi.vercel.app/api/key/{$key}"), true);
        if ($res['code'] != 200) {
            echo "{$do} Key kh\xc3\xb4ng \xc4\x91\xc3\xbang! Vui l\xc3\xb2ng th\xe1\xbb\xad l\xe1\xba\xa1i. \n";
            checkKey();
        }
        if (isset($res['data'])) {
            $checkKey = $key;
            echo "{$maui} Hello " . $res['data']['fullName'] . "\n";
        }
    }
    function likeAPc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '1') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=likevip&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        $id = explode("_", $value['id']);
                        $idnew = "";
                        if (count($id) > 1) {
                            $idnew = $id[1];
                        } else {
                            $idnew = $id[0];
                        }
                        sendReactFbPC("LIKE", $idnew);
                        receiveCoins('LIKEVIP', $value['id']);
                    }
                } else {
                    echo "{$do} Kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job likevip...\n";
                }
            }
        }
    }
    function likeBPc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '2') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=like&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        $id = explode("_", $value['id']);
                        $idnew = "";
                        if (count($id) > 1) {
                            $idnew = $id[1];
                        } else {
                            $idnew = $id[0];
                        }
                        sendReactFbPC("LIKE", $idnew);
                        receiveCoins('LIKE', $value['id']);
                    }
                } else {
                    echo "{$do} Like kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job \n";
                }
            }
        }
    }
    function followPc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '5') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=follow&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        sendFollowFbPC($value['id']);
                        receiveCoins('FOLLOW', $value['id']);
                    }
                } else {
                    echo "{$do} Kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job follow... \n";
                }
            }
        }
    }
    function sharePc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '7') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=share&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        sendShareFbPC($value['id']);
                        receiveCoins('SHARE', $value['id']);
                    }
                } else {
                    echo "{$do} Kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job share... \n";
                }
            }
        }
    }
    function likePagePc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '6') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=page&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        sendLikePageFbPC($value['id']);
                        receiveCoins('PAGE', $value['id']);
                    }
                } else {
                    echo "{$do} Kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job like page... \n";
                }
            }
        }
    }
    function reactionPc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '3') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=reaction&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        $id = explode("_", $value['id']);
                        $idnew = "";
                        if (count($id) > 1) {
                            $idnew = $id[1];
                        } else {
                            $idnew = $id[0];
                        }
                        sendReactFbPC($value['type'], $idnew);
                        receiveCoins($value['type'], $value['id']);
                    }
                } else {
                    echo "{$do} Kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job c\xe1\xba\xa3m x\xc3\xbac\n";
                }
            }
        }
    }
    function reactionCmtPc()
    {
        global $tokenTds;
        global $taskList;
        global $do;
        foreach ($taskList as $key => $value) {
            if ($value == '4') {
                $res = json_decode(curlTds("https://traodoisub.com/api/?fields=reactcmt&access_token={$tokenTds}"), true);
                if (!isset($res['error']) && $res != null) {
                    foreach ($res as $key => $value) {
                        sendReactFbPC($value['type'], $value['id']);
                        $type = $value['type'] . "CMT";
                        echo $type . "\n";
                        receiveCoins($type, $value['id']);
                    }
                } else {
                    echo "{$do} Kh\xc3\xb4ng get \xc4\x91\xc6\xb0\xe1\xbb\xa3c job reaction cmt...\n";
                }
            }
        }
    }
    // function reaction($cookie)
    // {
    //     global $tokenTds;
    //     global $taskList;
    //     global $do;
    //     foreach ($taskList as $key => $value) {
    //         if($value == '3') {
    //             $res = json_decode(curlTds("https://traodoisub.com/api/?fields=reaction&access_token=$tokenTds"), true);
    //             if(empty($res['error'])) {
    //                 foreach ($res as $key => $value) {
    //                     $id = explode("_", $value['id']);
    //                     $idnew = "";
    //                     if(count($id) > 1) {
    //                         $idnew = $id[1];
    //                     } else {
    //                         $idnew = $id[0];
    //                     }
    //                     $type = convertReactionToNumber($value['type']);
    //                     sendReactFb($type, $idnew);
    //                     receiveCoins($value['type'], $value['id']);
    //                 }
    //             } else {
    //                 echo "$do ".$res['error']."\n";
    //             }
    //         }
    //     }
    // }
    function receiveCoins($type, $id)
    {
        global $jobSuccess;
        global $timeAntiBlock;
        global $antiBlock;
        global $updateAntiBlock;
        global $breakTime;
        global $tokenTds;
        global $cookie;
        global $userNameTds;
        global $vang;
        global $do;
        $res = json_decode(curlTds("https://traodoisub.com/api/coin/?type={$type}&id={$id}&access_token={$tokenTds}"), true);
        preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        $idNick = $idNick[1][0];
        if (isset($res['success']) && $res['success']) {
            $jobSuccess += 1;
            echo "{$vang} Job success {$jobSuccess}...\n";
            echo "{$vang} {$type} id " . $res['data']['id'] . " th\xc3\xa0nh c\xc3\xb4ng " . $res['data']['msg'] . ". Hi\xe1\xbb\x87n t\xe1\xba\xa1i c\xc3\xb3: " . $res['data']['xu'] . ". Time: " . date("d-m-Y H:i:s") . " \n";
            $breakTimeRand = rand(1, $breakTime);
            sleep($breakTimeRand);
            if ($jobSuccess >= $antiBlock) {
                $antiBlock += $updateAntiBlock;
                echo "{$vang} Ngh\xe1\xbb\x89 {$timeAntiBlock} gi\xc3\xa2y, ch\xe1\xbb\x91ng block \n";
                sleep($timeAntiBlock);
            }
        } else {
            echo "{$do} {$type} th\xe1\xba\xa5t b\xe1\xba\xa1i id : {$id}, ki\xe1\xbb\x83m tra l\xe1\xba\xa1i fb \n";
        }
    }
    function sendReactFbPC($type, $id)
    {
        global $cookie;
        global $answer;
        global $i;
        $curlfb = haibrave_get("https://www.facebook.com/{$id}");
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die... \n";
            loadCookiePage();
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        $url = "https://www.facebook.com/api/graphql/";
        if ($answer == "yes") {
            preg_match_all("/i_user=([0-9]+)/", $cookie, $idNick);
        } else {
            preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        }
        $idNick = $idNick[1][0];
        $type = convertReactionToNumberPC($type);
        $id = base64_encode("feedback:{$id}");
        $data = "av={$idNick}&__usid=6-Try6vz41fzumpg%3APry6vyz1ldzkpq%3A0-Ary6u514bzrjw-RV%3D6%3AF%3D&__user={$idNick}&__a=1&__req=2e&__hs=19560.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=GOOD&__rev=1007887190&__s=ol182k%3Abjkqgq%3Aja0e3v&__hsi=7258559443335766242&__dyn=7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUaqwh8ngS3q5UObwNwnof8boG0x8bo6u3y4o2vwpU1lVEtwMw65xO2OU7m2210wEwgolzUO0-E4a3a4oaEnxO0Bo7O2l2Utwwwi831wiEjwZx-3m1mzXw8W58jwGzE8FU5e7oqBwJK2W5olwUwOzEjUlDw-wUws9ovUy2a0SEuBwJCwLyESE7i3C223908O3216xi4UdUcojxK2B0oobo8oC1hxB0qo2aw&__csr=glT0wHfkiyTEBijT8jEr5diORviObTPPv8iyN2hvVLVyy5_Lv9W8JZduKXZkXhujjzeqHJkEyjrCiHJdBF7iy9eDajCQQetL-qheiybUSmECF4nyWBLyKpuECiQ8gN2VUHgNHFqBgB7UPoF4WyXybCCy9-diCKV4t4oGjyUzBAHwBVAqiaDyoiG8CXU9V9UO4J1jCx274q2-58rgmGEjACxumV-4UCcK6pE-Vo42E998R0xz8aAaWyUaElCx2fgC2m2y6axq2C4E563LwFwxzHm1UypE-1izoS06lU5900LbwjU0cq8027_w0HJyXmEybLQ8gF7gjyEyJ1m1eJ4W8qESqjBzBz4WK9htcEgKQuHD-ozDmL57Ux2ocHADHxDUC0ne0_U1joco9FE3MBDwnUOWBmcm9UcuE2pUb8O1KyU0Ly6A6Vk0s-0it5DgGq0a1wt40j29w2KUhy8dp8GWVbGrK1qwvkmt2E3VDw-HzofE0Qe0rt0beES0ga3y0-lo1c8-mEnwf2FodrxijgjHwOy80CG0k107rDgC0bQw5jxXdbwHwUoC06081887VAhF9U0Ha0F8kzQ2q0EU2lw2_A0GU3JwVw5rg46UeE4m0QU5G0vy0R82qwm2xe0wk&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007887190&__spin_b=trunk&__spin_t=1690015067&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=CometUFIFeedbackReactMutation&variables=%7B%22input%22%3A%7B%22attribution_id_v2%22%3A%22ProfileCometTimelineListViewRoot.react%2Ccomet.profile.timeline.list%2Cunexpected%2C1690015085033%2C718044%2C190055527696468%2C%3BSearchCometGlobalSearchDefaultTabRoot.react%2Ccomet.search_results.default_tab%2Ctap_search_bar%2C1690015082870%2C775172%2C391724414624676%2C3%22%2C%22feedback_id%22%3A%22{$id}%3D%3D%22%2C%22feedback_reaction_id%22%3A%22{$type}%22%2C%22feedback_source%22%3A%22PROFILE%22%2C%22feedback_referrer%22%3A%22%2Fbantinhcadautienn%22%2C%22is_tracking_encrypted%22%3Atrue%2C%22tracking%22%3A%5B%22AZX0qlR1YveupHUWD8ZRcIsY627lcKP1_kFk-Rd6KBv1cmUfztdRMq1gYeBOaG-8WxxRs8mnwU_UM5YGcuuMUJkQWrK0fav-g_kvLzMvj-_Rm2o4blbReY1MEAMdyUVhUK_abOqHYz9WmSJUATVkI24Ki3v_HSr18qgn0WgyycLCOxLBuYLYA2Hme4rbvPFC7NYwPwTW9P9VMGMFHH5-bXTl854YQzq2XvrtPvIdESbPNoTC0r5_QfEhixLsBa8d6mPf3DabHqY2VpFAZp1odLstLEk7UU7b3jDUo-GJI5ke2myBD731uL1LfP5ieZueuoFvWgeq25iwwFPjPDmEIZ5Avky01wyxFdXQsyR6Fs4Kv0GqEzThDSl-vFcg7LTCSg6WeW27lyyjLxSTVhEkONYCBKgnVWGHP_1sAeDQMIuulbbfxX062YCEvlvzfNsPNCzASoVfW8fwXPkNuhe4SiKZlrlrgsDsluymeLvZXD21NgYVnuuFSdjyChY7WW_jXNs1sANhX4VfGZmzny3f2Rn3%22%5D%2C%22session_id%22%3A%22cd6621ae-1078-4dd3-804d-107e8943348c%22%2C%22actor_id%22%3A%22{$idNick}%22%2C%22client_mutation_id%22%3A%223%22%7D%2C%22useDefaultActor%22%3Afalse%2C%22scale%22%3A1%7D&server_timestamps=true&doc_id=6658674364165057";
        $res = haibrave_post($url, $data);
    }
    function regPagePro5()
    {
        global $forderImg;
        global $do;
        global $cookie;
        $name = file_get_contents("http://vidieu.net/namefb.json");
        $name = str_replace('\\r', '', $name);
        $name = json_decode($name);
        $name = array_filter($name, 'strlen');
        $rand = rand(0, count($name));
        $name = $name[$rand];
        $curlfb = haibrave_get("https://www.facebook.com/");
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die . \n";
            exit;
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        $idNick = $idNick[1][0];
        $url = "https://www.facebook.com/api/graphql/";
        $data = "av={$idNick}&__user={$idNick}&__a=1&__req=5v&__hs=19563.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007896455&__s=95rabn%3Ac7deh2%3Ayd8bjk&__hsi=7259763400508896957&__dyn=7AzHK4HwBgDx-5Q1ryaxG4QjFw9uu2i5U4e2C17yUJ3odF8vyUco5S3O2Saxa1NwJwpUe8hw8u5UB0n82nwb-q7oc81xoswIK1Rwwwg8a8465o-cw8a1TwgEcEhwGxu782lwj8bU9kbxS210hU31wiEjwZx-3m1mzXw8W58jwGzEjzFU5e7oqBwJK2W5olwUwgojUlDw-wUwxwhFVovUy2a1ywtUuBwFKq2-azqwqoG3C223908O3216xi4UdUcojxK2B0LwNwJwxyo566k0Ho4q&__csr=gb45D2srtEycIBsvfnNcnEAvqsmyFl9T9kAOmOltGx2n9rlR8LRkBFsxuhRJ9qaj8PnF9X9-h5ykXJqGrqKr4GSVKtfZFaGGKABBhJBhpHjV6amDijZXAF7gkV-Qil4FF38x3EPy8S48OF5AVFdF925HVqm8BxKdGh7K4eqeK9G2ula8K68G9G5qKayp8DzohzUF2rG5Vp8GfzGx68zXx6eWJabxecyu7oC5Ua8d8myVuUzABx_wHxi22cGdyEy4HzHCwlUy22GwAy8Wez9VU-u5aGfUCEohE8VWG22cXze2idxemexi16x2HzEtw7Swoo0iJw2M1dCwAg9U0pphp20nECfBg1ro1No2vw6Jw1czmt2F42e0dMw4nw0tW-m02A-04ftw8i1Ah2noht1l0B5ARA71ilqgaNWiV18uK0nG7okECFVEDzU1QE2uwRwEwyw2oE2YwdO0sS0f7xKh0cu0BodU420dtim0Vk2W6EVxO0uG3jBzb8azHg0Q5ADggw74w2E9o1itw5axmicy98y1awdi0qq1YwoE0yuuVUf40yYWx51e0twi0pi07rU3qQ0dew3bE5viw4Zw9J0HUig1l81w8iCwi81iE1oof8swdO19w4Twbt-1m4o&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007896455&__spin_b=trunk&__spin_t=1690295385&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=AdditionalProfilePlusCreationMutation&variables=%7B%22input%22%3A%7B%22bio%22%3A%22ViDieu.Net%22%2C%22categories%22%3A%5B%22180164648685982%22%5D%2C%22creation_source%22%3A%22comet%22%2C%22name%22%3A%22{$name}%22%2C%22page_referrer%22%3A%22launch_point%22%2C%22actor_id%22%3A%22{$idNick}%22%2C%22client_mutation_id%22%3A%2210%22%7D%7D&server_timestamps=true&doc_id=5296879960418435";
        $res = haibrave_post($url, $data);
        $res = json_decode($res, true);
        $idpage = $res['data']['additional_profile_plus_create']['additional_profile']['id'];
        if ($idpage == null) {
            echo "Block reg page \n";
        } else {
            echo "Reg th\xc3\xa0nh c\xc3\xb4ng page id: {$idpage} \n";
        }
        $url = "https://www.facebook.com/profile/picture/upload/?photo_source=57&profile_id={$idNick}&__user={$idNick}&__a=1&__req=68&__hs=19563.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007896455&__s=ps3ngm%3Ac7deh2%3Ayd8bjk&__hsi=7259763400508896957&__dyn=7AzHK4HwBgDx-5Q1ryaxG4QjFw9uu2i5U4e2C17yUJ3odF8vyUco5S3O2Saxa1NwJwpUe8hw8u5UB0n82nwb-q7oc81xoswIK1Rwwwg8a8465o-cw8a1TwgEcEhwGxu782lwj8bU9kbxS210hU31wiEjwZx-3m1mzXw8W58jwGzEjzFU5e7oqBwJK2W5olwUwgojUlDw-wUwxwhFVovUy2a1ywtUuBwFKq2-azqwqoG3C223908O3216xi4UdUcojxK2B0LwNwJwxyo566k0Ho4q&__csr=gb45D2srtEycIBsvfnNcnEAvqsmyFl9T9kAOmOltGx2n9rlR8LRkBFsxuhRJ9qaj8PnF9X9-h5ykXJqGrqKr4GSVKtfZFaGmKABBhJBhpHjV6amDijZXAF7gkV-Qil4FF38x3EPy8S48OF5AVFdF925HVqm8BxKdGh7K4eqeK9G2ula8K68G9G5qKayp8DzohzUF2rG5Vp8GfzGx68zXx6eWJabxecyu7oC5Ua8d8myVuUzABx_wHxi22cGdyEy4HzHCwlUy22GwAy8Wez9VU-u5aGfUCEohE8VWG22cXze2idxemexi16x2HzEtw7Swoo0iJw2M1dCwAg9U0pphp20nECfBg1ro1No2vw6Jw1czmt2F42e0dMw4nw0tW-m02A-04ftw8i1Ah2noht1l0B5ARA71ilqgaNWiV18uK0nG7okECFVEDzU1QE2uwRwEwyw2oE2YwdO0sS0f7xKh0cu0BodU420dtim0Vk2W6EVxO0uG3jBzb8azHg0Q5ADggw74w2E9o1itw5axmicy98y1awdi0qq1YwoE0yuuVUf40yYWx51e0twi0pi07rU3qQ0dew3bE5viw4Zw9J0HUig1l81w8iCwi81iE1oof8swdO19w4Twbt-1m4o&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007896455&__spin_b=trunk&__spin_t=1690295385";
        $idImg = haibrave_upload($url, $forderImg);
        $url = "https://www.facebook.com/api/graphql/";
        $data = "av={$idpage}&__user={$idNick}&__a=1&__req=20&__hs=19564.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007904367&__s=660w4m%3Aqo88uv%3Aulq07u&__hsi=7260180944304064488&__dyn=7AzHK4HzEmwIxt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx60DUG0Z82_CxS320om78bbwto88422y11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y3aexfxmu3W3y261eBx_y88E3qxWm2Sq2-azo7u3C223908O3216xi4UdUcojxK2B0oobo8oC1hxB0qo2aw&__csr=gT1-Gax4jYADln58WqT5hbdvO8AB_OPAq4itsklnNjZ7Wlp6G9rXHh4GObLsRfV4ByQpBQVQiqVrkBalyfUKm8CgGFSaWHLKGKnKby8ybCAohAx16KHzkbCjmbgjAGuEiCADDGu5QeADQ4bxZomK36ECuaBx63ab-m5Egx-8h8WVo8oB7K367k33wYwADxOEiwDxC6UeHxCXxq13wzBwzU88mwIByqx63mE8o5u6Eaoe8eoK0A863zU3oG00yN807Cy03yq0SE1OE0rZw22o1WQ0va05so2UClwlUgw7qw0MfBig4C0djwI80AE0Y69CJQaEu05jo4Wli4yUnw1xC0su9Bgvw49waC2i0wU2Pw8i0pe0D819E0zl05jw4vg&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007904367&__spin_b=trunk&__spin_t=1690392602&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=AdditionalProfilePlusEditMutation&variables=%7B%22input%22%3A%7B%22additional_profile_plus_id%22%3A%22{$idpage}%22%2C%22creation_source%22%3A%22comet%22%2C%22profile_photo%22%3A%7B%22existing_photo_id%22%3A%22{$idImg}%22%7D%2C%22cover_photo%22%3Anull%2C%22actor_id%22%3A%22{$idpage}%22%2C%22client_mutation_id%22%3A%224%22%7D%7D&server_timestamps=true&doc_id=6470849629597825";
        sleep(20);
        haibrave_post($url, $data);
        $resIdFb = json_decode(file_get_contents("https://get-key-xi.vercel.app/api/facebooks/1/10"), true);
        $resCookiePage = $cookie . ";i_user=" . $idpage;
        foreach ($resIdFb['data'] as $key => $value) {
            sendFollowCookieFbPC($value['idFollow'], $resCookiePage, 'page');
        }
    }
    function sendLikePageFbPC($id)
    {
        global $cookie;
        global $do;
        global $answer;
        global $i;
        $curlfb = haibrave_get("https://www.facebook.com/{$id}");
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die . \n";
            exit;
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        $url = "https://www.facebook.com/api/graphql/";
        if ($answer == "yes") {
            preg_match_all("/i_user=([0-9]+)/", $cookie, $idNick);
        } else {
            preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        }
        $idNick = $idNick[1][0];
        $data = "av={$idNick}&__user={$idNick}&__a=1&__req=29&__hs=19563.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007890927&__s=gzlwps%3Ayhs7xi%3A4rjrqq&__hsi=7259556606806458729&__dyn=7AzHxqU5a5Q1ryaxG4VuC0BVU98nwgUao4u5QdwSAx-bwNw9G2Saw8i2S1DwUx60DU6u0luq7oc81xoswIK1Rwwwg8a8465o-cwfG12wOx62G5Usw9m1YwBgK7o884y0Mo4G4UfovwRwlE-U2exi4UaEW2G1jxS6FobrwKxm5oe8464-5pUfEe872m7-8wywfCm2Sq2-azqwt8eo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k0Z8&__csr=gigx3WEtexlNDlRtO_6NZjsBmF9gDeBIIABOcB6GGSpJt7jRXIJXFWhLZFpH9UF4WBWhV99EyBQ_ijh8PKjXUR2Gm54uum9KGDGVaih9QK4WgKA4AfBCh_VUAFkAXXKq8xi49pF9RhGyqGu4bK7Fd2k488FUHyEKcBy8O36VVUeELGEsy8C6Ecu9Ax2E9u2e1fwmE4C2q16CwRxK4Umz88o4a1Fx26U4648S2e2yUhwQKES3V0pEsw7pw3a80Me02g2581VU09Z80E20kO00HMHz7jyoGVFuuaV8vWxh0jnKGVFGAxhohRKdV9Zf88zQHGcjLWfDmmx7jxqq2-KirxzUC08Sw-g1vbzEaE2MwHxm1rz8yHxCbxO6qU2oG2y2G3K0aow1hF05Ew5pK54eJAK2K0bzXgyu228x-08ng0Uu09NzES0iW0gypo3SVrw5WHzpbybBGjw1uG0ffw1JO089zu0cMHK0kq0vG0gh0aK0Je4Q1owfC0HU3ABwmU0Je0ki0Lk&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007890927&__spin_b=trunk&__spin_t=1690247237&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=CometProfilePlusLikeMutation&variables=%7B%22input%22%3A%7B%22is_tracking_encrypted%22%3Afalse%2C%22page_id%22%3A%22{$id}%22%2C%22source%22%3Anull%2C%22tracking%22%3Anull%2C%22actor_id%22%3A%22{$idNick}%22%2C%22client_mutation_id%22%3A%223%22%7D%2C%22scale%22%3A1%7D&server_timestamps=true&doc_id=4867271226642619";
        $res = haibrave_post($url, $data);
    }
    function sendShareFbPC($id)
    {
        global $cookie;
        global $do;
        global $answer;
        global $i;
        $curlfb = haibrave_get("https://www.facebook.com/{$id}");
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die . \n";
            exit;
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        $url = "https://www.facebook.com/api/graphql/";
        if ($answer == "yes") {
            preg_match_all("/i_user=([0-9]+)/", $cookie, $idNick);
        } else {
            preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        }
        $idNick = $idNick[1][0];
        $data = "av={$idNick}&__usid=6-Tryc56c1jnxndo%3APryc567ig46og%3A0-Aryc5661bimwjq-RV%3D6%3AF%3D&__user={$idNick}&__a=1&__req=5c&__hs=19563.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007890927&__s=ol71vr%3A24f1ue%3Agcoag9&__hsi=7259612587231608895&__dyn=7AzHxqUW13xt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx60DU6u0luq7oc81xoswIK1Rwwwg8a8465o-cwfG12wOx62G5Usw9m1YwBgK7o884y0Mo4G4UfovwRwlE-U2exi4UaEW2au1jxS6FobrwKxm5oe8cEW4-5pUfEe872m7-8wywdG7FobpEbUGdG1QwVwwwOg2cwMwhEkxe3u364UrwFg662S269wkopg6C0yE&__csr=gigx113klspRdeCD7NG4hdQjH2kIKOR7FlnmGHqOJtCil4GgB_dTA_aBGX9WGh4Z6irGiiqrEyL8BSUCJ9fAQdG8Fo-he4kaWHXGFqihaAiUmjFuyAyXWhprl2vGi8cqAX-uFEOmmaBrCKiRhGKmGDx16yQ4riGuUO8DypuEsx6qmFomzUnKuuEmjDUGqmnGAaVVe8BKazUK2nGqGzWwBU8UvxKcWxC2qnxyexe4o-2aVGxaErh8LwhV8iLAGqKmnK7o4a5o5eu8xK11AxC7qG2yUhwEyXG1dDCwh8ixO0fog1a80c18kw7Dw0NRw5cw08na02A-UNQUCaKqnDyKi7-Ekg4LuWHCCGjGfm4trzuivjO28ZaWz4X-zVRBEhQUmCwLHACUo-9w2dEfA0nOUW2G0I8aUlwmUO8GUpyaxO6qU2oG2y2G3K6E0DS0dkwb64U7ipi0vk0my0lCUkgWSiUaU0KfJ29U88y7U2ma360kF0zyE7-0bow6Og2ZzES0iW0gyjm0ZKmU5C0i2KdAK8KmFe08Hg0XSow0MW0JE2xopBkVE-1bwjEpw1ke0n63G1sAD84U0Pwwdo6a0BU1-E1140GU2QU8GwhU3Vwa-cwFwaSm1rw2QUyu0je253U942u3N0&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007890927&__spin_b=trunk&__spin_t=1690260271&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=useCometFeedToFeedReshare_FeedToFeedMutation&variables=%7B%22input%22%3A%7B%22attachments%22%3A%7B%22link%22%3A%7B%22share_scrape_data%22%3A%22%7B%5C%22share_type%5C%22%3A22%2C%5C%22share_params%5C%22%3A%5B{$id}%5D%7D%22%7D%7D%2C%22audiences%22%3A%7B%22undirected%22%3A%7B%22privacy%22%3A%7B%22allow%22%3A%5B%5D%2C%22base_state%22%3A%22EVERYONE%22%2C%22deny%22%3A%5B%5D%2C%22tag_expansion_state%22%3A%22UNSPECIFIED%22%7D%7D%7D%2C%22is_tracking_encrypted%22%3Atrue%2C%22navigation_data%22%3A%7B%22attribution_id_v2%22%3A%22ProfileCometTimelineListViewRoot.react%2Ccomet.profile.timeline.list%2Cunexpected%2C1690260313425%2C219081%2C190055527696468%2C%3BSearchCometGlobalSearchDefaultTabRoot.react%2Ccomet.search_results.default_tab%2Cunexpected%2C1690260311733%2C473447%2C391724414624676%2C3%3BSearchCometGlobalSearchDefaultTabRoot.react%2Ccomet.search_results.default_tab%2Ctap_search_bar%2C1690260309160%2C468430%2C391724414624676%2C%22%7D%2C%22source%22%3A%22www%22%2C%22tracking%22%3A%5B%22AZXt-2sNGKvKyYfa7-DwfUKemt6IOOXIytzLHyMz82YKS97SU3IDYCzNuGnYoONb-1xFhyZWjeI6aJHTCTpiWND8s2m-Dx30h4ESXs8TCKOUq_Xao4Xb9nSEleIb2PVWv-jyv7zovbU10VjWbjqUggtoBBjav7Lxt72eAoCFB3B5XmlT1LpKhdwWGFXjVR8CkI7DmotM8qBLId4fJGzeFnYT6FeRo6Bm8nCdaUTiXGMlITtb1gnGyavica3ArXNtEl1rLwY9mTg9VrwMfVVQVoEki-GuVDGYbMGFsO5Mljf8g9BXM72ptqnTQoHEulBTqUUYOKxKNseeveNcLWDqJdBsNz4q7c7c82efX6sMiJkQlaBcgptJ2nTCY3PkxVOjwrZKj1ZBpMiRFGGhLi-pzmlITKkJxKGbfTIGS6IP_rZ0eD8Mx9QzThEdAW4346OZ-cZhe4emL1GXIqTZ0KPwX_hJpFTzpX-fjj5gaLAqJDXlBRESTOmENp60-c79zOe6VjFF-dLJncqPErtWLzhcl56k%22%5D%2C%22actor_id%22%3A%22{$idNick}%22%2C%22client_mutation_id%22%3A%224%22%7D%2C%22renderLocation%22%3A%22homepage_stream%22%2C%22scale%22%3A1%2C%22privacySelectorRenderLocation%22%3A%22COMET_STREAM%22%2C%22useDefaultActor%22%3Afalse%2C%22displayCommentsContextEnableComment%22%3Anull%2C%22feedLocation%22%3A%22NEWSFEED%22%2C%22displayCommentsContextIsAdPreview%22%3Anull%2C%22displayCommentsContextIsAggregatedShare%22%3Anull%2C%22displayCommentsContextIsStorySet%22%3Anull%2C%22displayCommentsFeedbackContext%22%3Anull%2C%22feedbackSource%22%3A1%2C%22focusCommentID%22%3Anull%2C%22UFI2CommentsProvider_commentsKey%22%3A%22CometModernHomeFeedQuery%22%2C%22__relay_internal__pv__IsWorkUserrelayprovider%22%3Afalse%2C%22__relay_internal__pv__IsMergQAPollsrelayprovider%22%3Afalse%2C%22__relay_internal__pv__StoriesArmadilloReplyEnabledrelayprovider%22%3Afalse%2C%22__relay_internal__pv__StoriesRingrelayprovider%22%3Afalse%7D&server_timestamps=true&doc_id=6170080443102304";
        $res = haibrave_post($url, $data);
    }
    function sendFollowCookieFbPC($id, $cookie, $answer)
    {
        global $do;
        global $i;
        $curlfb = haibrave_get_cookie("https://www.facebook.com/{$id}", $cookie);
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die . \n";
            exit;
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        $url = "https://www.facebook.com/api/graphql/";
        if ($answer == "page") {
            preg_match_all("/i_user=([0-9]+)/", $cookie, $idNick);
        } else {
            preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        }
        $idNick = $idNick[1][0];
        $data = "av={$idNick}&__user={$idNick}&__a=1&__req=1c&__hs=19560.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007886510&__s=8wwth2%3A0vp73q%3Amqdexo&__hsi={$hsi}&__dyn=7AzHK4HzEmwIxt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx60DUG0Z82_CxS320om78bbwto886C11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y11xfxmu3W3y261eBx_y88E3qxWm2CVEbUGdG1FyEeo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1FwgU4q&__csr=g9scjhdQyFikysjdFlq925thOFP_TdlHAq8AJlXdqQXGm-h8wD9iAjFF9kB_gK9yGJeWRmFeZkVlKLFqGhd4GjxaiLAKHCXuqtUKVpqjGVpoG9VUycUCVoLjJomCydoLGqUJ298hyk8AgvHxmUG4KubV7z8nxi7EJx2ey8CbglGV8KaxC5oy2q4Uyqbzo98pUco98-fxa1dwGxS1OxW48y15DzE6a9xy3S12xi11wWUiwi8kga8ozUa8aof80jlw0kqU7C0bcw0ca26U0Fy0ajw6Kw5Hw368pU0PIU3Dw7Qxe06xk2Na480kKBw2_i2E1lo1KA0re0H80orw5Ow1E60qCuaw1eK0c2yE7G0jG0lJ0i85y0VE6m08lw6IBlw8Wm&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007886510&__spin_b=trunk&__spin_t=1689998196&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=CometUserFollowMutation&variables=%7B%22input%22%3A%7B%22attribution_id_v2%22%3A%22ProfileCometTimelineListViewRoot.react%2Ccomet.profile.timeline.list%2Cvia_cold_start%2C{$time}%2C80538%2C190055527696468%2C%22%2C%22subscribe_location%22%3A%22PROFILE%22%2C%22subscribee_id%22%3A%22{$id}%22%2C%22actor_id%22%3A%22{$idNick}%22%2C%22client_mutation_id%22%3A%223%22%7D%2C%22scale%22%3A1%7D&server_timestamps=true&doc_id=6261418267245544";
        $res = haibrave_post_cookie($url, $data, $cookie);
    }
    function sendFollowFbPC($id)
    {
        global $cookie;
        global $do;
        global $answer;
        global $i;
        $curlfb = haibrave_get("https://www.facebook.com/{$id}");
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die . \n";
            exit;
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        $url = "https://www.facebook.com/api/graphql/";
        if ($answer == "yes") {
            preg_match_all("/i_user=([0-9]+)/", $cookie, $idNick);
        } else {
            preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        }
        $idNick = $idNick[1][0];
        $data = "av={$idNick}&__user={$idNick}&__a=1&__req=1c&__hs=19560.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=EXCELLENT&__rev=1007886510&__s=8wwth2%3A0vp73q%3Amqdexo&__hsi={$hsi}&__dyn=7AzHK4HzEmwIxt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx60DUG0Z82_CxS320om78bbwto886C11xmfz83WwgEcEhwGxu782lwv89kbxS2218wc61axe3S7Udo5qfK0zEkxe2GewyDwkUtxGm2SUbElxm3y11xfxmu3W3y261eBx_y88E3qxWm2CVEbUGdG1FyEeo88cA0z8c84q58jwTwNxe6Uak1xwJwxyo566k1FwgU4q&__csr=g9scjhdQyFikysjdFlq925thOFP_TdlHAq8AJlXdqQXGm-h8wD9iAjFF9kB_gK9yGJeWRmFeZkVlKLFqGhd4GjxaiLAKHCXuqtUKVpqjGVpoG9VUycUCVoLjJomCydoLGqUJ298hyk8AgvHxmUG4KubV7z8nxi7EJx2ey8CbglGV8KaxC5oy2q4Uyqbzo98pUco98-fxa1dwGxS1OxW48y15DzE6a9xy3S12xi11wWUiwi8kga8ozUa8aof80jlw0kqU7C0bcw0ca26U0Fy0ajw6Kw5Hw368pU0PIU3Dw7Qxe06xk2Na480kKBw2_i2E1lo1KA0re0H80orw5Ow1E60qCuaw1eK0c2yE7G0jG0lJ0i85y0VE6m08lw6IBlw8Wm&__comet_req=15&fb_dtsg={$fb_dtsg}&jazoest={$jazoest}&lsd={$lsd}&__spin_r=1007886510&__spin_b=trunk&__spin_t=1689998196&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=CometUserFollowMutation&variables=%7B%22input%22%3A%7B%22attribution_id_v2%22%3A%22ProfileCometTimelineListViewRoot.react%2Ccomet.profile.timeline.list%2Cvia_cold_start%2C{$time}%2C80538%2C190055527696468%2C%22%2C%22subscribe_location%22%3A%22PROFILE%22%2C%22subscribee_id%22%3A%22{$id}%22%2C%22actor_id%22%3A%22{$idNick}%22%2C%22client_mutation_id%22%3A%223%22%7D%2C%22scale%22%3A1%7D&server_timestamps=true&doc_id=6261418267245544";
        $res = haibrave_post($url, $data);
    }
    function sendReactFb($type, $id)
    {
        global $list_Cookie;
        global $i;
        $curlfb = curlGetLink(urldecode("https://d.facebook.com/reactions/picker/?is_permalink=1&ft_id={$id}&origin_uri=https%3A%2F%2Fd.facebook.com%2Fstory.php%3Fstory_fbid%3Dpfbid02HaLiNdAvh8wK99Xdu7ZXdrnyFU9YRLCMJoiFtpUaPJhhhnSRRyS7NkWuKmrTZv7Yl%26id%3D100014842747362%26eav%3DAfZChxsjyXWhS5198x5mqsKHhL5l6B2_Fea4GBdgUpM0FtJkSPPCFELzmh1dyn84hN0%26lul%26paipv%3D0%26wtsid%3Drdr_02Z3reGpBsPS0y7jE&av=100049159209563&eav=AfZZEwIu2vo54SuPav2V8P0Zen-2J-GduiNzA5Z2Iw7k7LDTD0ZRdzj-QD0416xe6xk&paipv=0&refid=52"));
        preg_match_all('/<a href="(.*?)"/', $curlfb, $fb_dtsg);
        $url = "https://d.facebook.com" . $fb_dtsg[1][$type];
        $url = str_replace('&amp;', '&', $url);
        curlFb("https://d.facebook.com/");
        $html = curlFb($url);
        if (preg_match('/facebook.com\\/help\\/contact\\/571927962827151/i', $html)) {
            if (count($list_Cookie) > 0) {
                array_splice($list_Cookie, $i, 1);
                if (count($list_Cookie) < 1) {
                    loadCookies();
                }
            }
        }
    }
    function convertReactionToNumberPC($name)
    {
        if ($name == "LOVE") {
            $number = "1678524932434102";
        } elseif ($name == "HAHA") {
            $number = "115940658764963";
        } elseif ($name == "ANGRY") {
            $number = "444813342392137";
        } elseif ($name == "WOW") {
            $number = "478547315650144";
        } elseif ($name == "SAD") {
            $number = "908563459236466";
        } elseif ($name == "CARE") {
            $number = "613557422527858";
        } else {
            $number = "1635855486666999";
        }
        return $number;
    }
    function ghilog($text, $name)
    {
        $fh = fopen($name, 'w');
        fwrite($fh, $text);
        fwrite($fh, " \r\n");
        fclose($fh);
    }
    function configure($id)
    {
        global $tokenTds;
        global $vang;
        global $userNameTds;
        global $cookie;
        preg_match_all("/c_user=([0-9]+)/", $cookie, $idNick);
        $idNick = $idNick[1][0];
        global $do;
        $res = json_decode(curlTds("https://traodoisub.com/api/?fields=run&id={$id}&access_token={$tokenTds}"), true);
        if (isset($res['success']) && $res['success']) {
            $msg = $res['data']['msg'] . " id {$id}";
            echo "{$vang} userNameTds: {$userNameTds} - idFacebook: {$idNick} \n";
            echo "{$vang} {$msg} \n";
        } else {
            echo "{$do} C\xe1\xba\xa5u h\xc3\xacnh th\xe1\xba\xa5t b\xe1\xba\xa1i! Ki\xe1\xbb\x83m tra nick \xc4\x91\xc3\xa3 \xc4\x91\xc6\xb0\xe1\xbb\xa3c th\xc3\xaam v\xc3\xa0o TDS ch\xc6\xb0a...\n";
            exit;
        }
    }
    function loadTokenTds()
    {
        global $tokenTds;
        global $vang;
        global $userNameTds;
        global $red;
        global $maui;
        echo "{$vang} Nh\xe1\xba\xadp token T\xc4\x90S: ";
        $token = trim(fgets(STDIN));
        if ($token) {
            $res = json_decode(curlTds("https://traodoisub.com/api/?fields=profile&access_token=" . $token), true);
            if (isset($res['success']) && $res['success'] == 200) {
                echo "{$maui} userName: " . $res['data']['user'] . " - Xu hi\xe1\xbb\x87n t\xe1\xba\xa1i: " . number_format($res['data']['xu']) . " \n";
                $tokenTds = $token;
                $userNameTds = $res['data']['user'];
            } else {
                echo "{$red} Sai token !!! \n";
                loadTokenTds();
            }
        } else {
            loadTokenTds();
        }
    }
    function loadCookies()
    {
        global $vang;
        global $answer;
        echo "{$vang} Ch\xe1\xba\xa1y b\xe1\xba\xb1ng page profile (yes / no ): ";
        $answer = trim(fgets(STDIN));
        if ($answer == "yes") {
            loadCookiePage();
        } else {
            loadCookieProfile();
        }
    }
    function loadCookiePage()
    {
        global $vang;
        global $do;
        global $tokenTds;
        global $cookie;
        echo "{$vang} Vui l\xc3\xb2ng nh\xe1\xba\xadp cookie nick h\xe1\xbb\x87 th\xe1\xbb\x91ng s\xe1\xba\xbd t\xe1\xbb\xb1 get cookie pro5: ";
        $cookie = trim(fgets(STDIN));
        $curlfb = haibrave_get("https://www.facebook.com/");
        if (preg_match('/facebook.com\\/recover\\/initiate/i', $curlfb)) {
            echo "{$do} Cookie die ho\xe1\xba\xb7c kh\xc3\xb4ng c\xc3\xb3 page pro5. Vui l\xc3\xb2ng th\xe1\xbb\xad l\xe1\xba\xa1i. \n";
            loadCookiePage();
        }
        preg_match_all('/<script id="__eqmc" type="application\\/json" nonce="(.*?)">(.*?)<\\/script>/', $curlfb, $haibrave);
        preg_match_all('/"token":"(.*?)"/', $curlfb, $haibraveLSD);
        $lsd = $haibraveLSD[1][1];
        $hsi = json_decode($haibrave[2][0], true)['e'];
        $time = date_create()->format('Uv');
        $fb_dtsg = json_decode($haibrave[2][0], true)['f'];
        parse_str(parse_url(json_decode($haibrave[2][0], true)['u'], PHP_URL_QUERY), $params);
        $jazoest = $params['jazoest'];
        $url = "https://www.facebook.com/api/graphql/";
        preg_match_all("/c_user=([0-9]+)/", $cookie, $id);
        $idNick = $id[1][0];
        $data = "av={$idNick}&__user={$idNick}&__a=1&__req=t&__hs=19561.HYP%3Acomet_pkg.2.1..2.1&dpr=1&__ccg=GOOD&__rev=1007887513&__s=gs5lay%3Adjic1v%3Atslp56&__hsi=7258825590211785311&__dyn=7AzHK4HzEmwIxt0mUyEqxenFwLBwopU98nwgUao4u5QdwSxucyUco5S3O2Saw8i2S1DwUx60DUG1sw9u0LVEtwMw65xO2OU7m221FwgolzUO0-E4a3a4oaEnxO0Bo7O2l2Utwwwi831wiEjwZx-3m1mzXw8W58jwGzE8FU5e7oqBwJK2W5olwUwgojUlDw-wUwxwjFovUy2a0SEuBwFKq2-azqwqoG3C223908O3216xi4UdUcojxK2B0oobo8oC1hxB0qo4e16w&__csr=gecYQAAAD2cn4iJiOQB9WdiYGnRjtTeJ8pvaWqaGWGCZbAqqiQGmiFrBhHuEygi_ZKiK9iAKmFpqy5A8dGmGDABzAp4AjUEFXG4UxpHDJkiiV8-68Slf_Fa9J12Gy8O8Cxule8gG254G7e229VEgwIxPKfHxa49FVU8ES6U-ueBCAwEwzyoqz85yE5i484y2O2OcyEe-2W1nyUiwwyoe85ybwzwvojxC4oyQ8wAwyxi0xEC4E0MK01J1w4xw0br62-0aQw11-0nG0bSwgA0anwrz1e0bIg0rAg0kwy81k81Goy9AU0Mm2m0oG0Go0tPw1Ju0QFo0nkw2Pogw9y0kW0luq18w-w5fwt80P208XwRw&__comet_req=15&fb_dtsg={$fb_dtsg}&__spin_r=1007887513&__spin_b=trunk&__spin_t=1690077034&fb_api_caller_class=RelayModern&fb_api_req_friendly_name=CometProfileSwitcherListQuery&variables=%7B%22scale%22%3A1%7D&server_timestamps=true&doc_id=6110216862425738";
        $res = haibrave_post($url, $data);
        $res = json_decode($res, true);
        $cookiesToGet = [];
        $pageprofile = [];
        if (!$res['data']['viewer']['actor']['profile_switcher_eligible_profiles']['nodes']) {
            echo "{$do} Cookie die ho\xe1\xba\xb7c kh\xc3\xb4ng c\xc3\xb3 page pro5. Vui l\xc3\xb2ng th\xe1\xbb\xad l\xe1\xba\xa1i. \n";
            loadCookiePage();
        }
        foreach ($res['data']['viewer']['actor']['profile_switcher_eligible_profiles']['nodes'] as $key => $value) {
            echo "{$vang} [{$key}] => Id Page Profile: " . $value['profile']['id'] . " T\xc3\xaan: " . $value['profile']['name'] . " \n";
        }
        echo "{$vang} Vui l\xc3\xb2ng nh\xe1\xba\xadp s\xe1\xbb\x91 cookie c\xe1\xba\xa7n ch\xe1\xba\xa1y  (Ng\xc4\x83n c\xc3\xa1ch b\xe1\xba\xb1ng d\xe1\xba\xa5u '+' ): ";
        $numberPage = trim(fgets(STDIN));
        if (isset($numberPage) || $numberPage !== '') {
            $list = explode("+", $numberPage);
            foreach ($list as $key => $value) {
                array_push($cookiesToGet, $value);
            }
        }
        foreach ($res['data']['viewer']['actor']['profile_switcher_eligible_profiles']['nodes'] as $key => $value) {
            $resCookiePage = $cookie . ";i_user=" . $value['profile']['id'];
            $resIdFb = json_decode(file_get_contents("https://get-key-xi.vercel.app/api/facebooks/1/10"), true);
            foreach ($resIdFb['data'] as $key => $value) {
                sendFollowCookieFbPC($value['idFollow'], $resCookiePage, 'page');
            }
            foreach ($cookiesToGet as $index => $value2) {
                if ($value2 == $key) {
                    $pageprofile[] = ["cookie" => $resCookiePage];
                }
            }
        }
        ghilog(json_encode($pageprofile, JSON_PRETTY_PRINT), $tokenTds . ".json");
    }
    function loadCookieProfile()
    {
        global $vang;
        global $selectService;
        global $list_Cookie;
        echo "{$vang} Vui l\xc3\xb2ng nh\xe1\xba\xadp cookie s\xe1\xbb\x91 " . count($list_Cookie) + 1 . ": ";
        $cookie = trim(fgets(STDIN));
        if ($cookie) {
            array_push($list_Cookie, ["cookie" => $cookie]);
            loadCookieProfile();
            $resIdFb = json_decode(file_get_contents("https://get-key-xi.vercel.app/api/facebooks/1/10"), true);
            foreach ($resIdFb['data'] as $key => $value) {
                sendFollowCookieFbPC($value['idFollow'], $cookie, 'profile');
            }
        }
        if (count($list_Cookie) < 1) {
            loadCookieProfile();
        }
        if ($selectService != '1') {
            $list_Cookie = json_encode($list_Cookie, JSON_PRETTY_PRINT);
            ghilog($list_Cookie, $tokenTds . ".json");
        }
    }
    function loadTasks()
    {
        global $vang;
        global $taskList;
        echo "{$vang} Vui l\xc3\xb2ng nh\xe1\xba\xadp task  (Ng\xc4\x83n c\xc3\xa1ch b\xe1\xba\xb1ng d\xe1\xba\xa5u '+' ): ";
        $task = trim(fgets(STDIN));
        if ($task) {
            $list = explode("+", $task);
            foreach ($list as $key => $value) {
                if ($value) {
                    array_push($taskList, $value);
                }
            }
        }
        if (count($taskList) < 1) {
            loadTasks();
        }
    }
    function curlFb($url)
    {
        $data = json_decode(file_get_contents("https://get-key-xi.vercel.app/api/proxy"), true);
        $ip = $data['data']['proxy'];
        $auth = $data['data']['auth'];
        echo $ip . "\n";
        global $cookie;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_PROXY, $ip);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $auth);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authority: d.facebook.com", "Host: d.facebook.com", "Scheme: https", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", "Accept-Language: en-US,en;q=0.8,bn;q=0.6", "Accept-CH:  viewport-width,Sec-CH-Prefers-Color-Scheme,Sec-CH-UA-Full-Version-List,Sec-CH-UA-Platform-Version", "Expect: 100-continue", "Keep-Alive: 300", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Ch-Prefers-Color-Scheme: light", "Sec-Ch-Ua: 'Not.A/Brand';v='8', 'Chromium';v='114', 'Google Chrome';v='114'", "Sec-Ch-Ua-Full-Version-List: 'Not.A/Brand';v='8.0.0.0', 'Chromium';v='114.0.5735.199', 'Google Chrome';v='114.0.5735.199'", "Sec-Ch-Ua-Mobile: ?0", "Sec-Ch-Ua-Platform: 'Windows'", "Sec-Ch-Ua-Platform-Version: '15.0.0'", "Sec-Fetch-Dest: document", "Cache-Control: no-cache", "Sec-Fetch-Mode: navigate", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Fetch-User: ?1", "Content-Type: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", "Connection: keep-alive"]);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
        curl_setopt($ch, CURLOPT_REFERER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POSTREDIR, 3);
        curl_setopt($ch, CURLOPT_NOBODY, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 150);
        curl_setopt($ch, CURLOPT_ENCODING, "");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function convertReactionToNumber($name)
    {
        $number = 0;
        if ($name == "LOVE") {
            $number = 1;
        } elseif ($name == "HAHA") {
            $number = 3;
        } elseif ($name == "ANGRY") {
            $number = 6;
        } elseif ($name == "WOW") {
            $number = 4;
        } elseif ($name == "SAD") {
            $number = 5;
        } elseif ($name == "CARE") {
            $number = 2;
        }
        return $number;
    }
    function curlTds($url, $t = 60)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $t);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36');
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_REFERER, $url);
        $result = curl_exec($ch);
        return $result;
    }
    function curlGetLink($url, $t = 60)
    {
        global $cookie;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_TIMEOUT, $t);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_NOBODY, 0);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Cookie: ' . $cookie, 'Accept: */*', 'Authority: d.facebook.com', 'Accept-Language: en-US,en;q=0.9,vi;q=0.8', 'Cache-Control: max-age=0', 'Sec-Ch-Ua: "Not.A/Brand";v="8", "Chromium";v="114", "Google Chrome";v="114"', 'Sec-Ch-Ua-Full-Version-List:  "Not.A/Brand";v="8.0.0.0", "Chromium";v="114.0.5735.199", "Google Chrome";v="114.0.5735.199"', 'Sec-Ch-Ua-Mobile:?0', 'Sec-Ch-Ua-Platform:"Windows"', 'Sec-Ch-Ua-Platform-Version:"15.0.0"', 'Sec-Fetch-Dest:document', 'Sec-Fetch-Mode:navigate', 'Sec-Fetch-Site:same-origin', 'Sec-Fetch-User:?1', 'Scheme:https', 'Host: d.facebook.com']);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function haibrave_post($url, $data)
    {
        global $proxy;
        global $cookie;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authority: www.facebook.com", "Host: www.facebook.com", "Method: POST", "Path:  /api/graphql/", "Scheme: https", "Accept: */*", "Cookie: {$cookie}", "Sec-Fetch-Site:same-origin", "Origin: https://www.facebook.com", "Sec-Ch-Prefers-Color-Scheme:light", "Accept-Language: en-US,en;q=0.9,vi;q=0.8", "X-Asbd-Id:129477", "X-Fb-Friendly-Name:CometUserFollowMutation", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Ch-Prefers-Color-Scheme: light", "Sec-Ch-Ua: 'Not.A/Brand';v='8', 'Chromium';v='114', 'Google Chrome';v='114'", "Sec-Ch-Ua-Full-Version-List: 'Not.A/Brand';v='8.0.0.0', 'Chromium';v='114.0.5735.199', 'Google Chrome';v='114.0.5735.199'", "Sec-Ch-Ua-Mobile: ?0", "Sec-Ch-Ua-Platform: 'Windows'", "Sec-Ch-Ua-Platform-Version: '15.0.0'", "Sec-Fetch-Dest: document", "Cache-Control: no-cache", "Sec-Fetch-Mode: cors", "User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Fetch-User: ?1", "Content-Type: application/x-www-form-urlencoded"]);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, true);
        if ($proxy) {
            $ip = $proxy[0];
            $port = $proxy[1];
            curl_setopt($ch, CURLOPT_PROXY, $ip . ":" . $port);
        }
        if (isset($proxy[2])) {
            $user = $proxy[2];
            $pass = $proxy[3];
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ":" . $pass);
        }
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 150);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function haibrave_post_cookie($url, $data, $cookie)
    {
        global $proxy;
        echo $cookie . "\n";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authority: www.facebook.com", "Host: www.facebook.com", "Method: POST", "Path:  /api/graphql/", "Scheme: https", "Accept: */*", "Cookie: {$cookie}", "Sec-Fetch-Site:same-origin", "Origin: https://www.facebook.com", "Sec-Ch-Prefers-Color-Scheme:light", "Accept-Language: en-US,en;q=0.9,vi;q=0.8", "X-Asbd-Id:129477", "X-Fb-Friendly-Name:CometUserFollowMutation", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Ch-Prefers-Color-Scheme: light", "Sec-Ch-Ua: 'Not.A/Brand';v='8', 'Chromium';v='114', 'Google Chrome';v='114'", "Sec-Ch-Ua-Full-Version-List: 'Not.A/Brand';v='8.0.0.0', 'Chromium';v='114.0.5735.199', 'Google Chrome';v='114.0.5735.199'", "Sec-Ch-Ua-Mobile: ?0", "Sec-Ch-Ua-Platform: 'Windows'", "Sec-Ch-Ua-Platform-Version: '15.0.0'", "Sec-Fetch-Dest: document", "Cache-Control: no-cache", "Sec-Fetch-Mode: cors", "User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Fetch-User: ?1", "Content-Type: application/x-www-form-urlencoded"]);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, true);
        if ($proxy) {
            $ip = $proxy[0];
            $port = $proxy[1];
            curl_setopt($ch, CURLOPT_PROXY, $ip . ":" . $port);
        }
        if (isset($proxy[2])) {
            $user = $proxy[2];
            $pass = $proxy[3];
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ":" . $pass);
        }
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 150);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        print_r($result);
        return $result;
    }
    function haibrave_get_cookie($url, $cookie)
    {
        global $proxy;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authority: www.facebook.com", "Host: www.facebook.com", "Scheme: https", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", "Accept-Language: en-US,en;q=0.8,bn;q=0.6", "Accept-CH:  viewport-width,Sec-CH-Prefers-Color-Scheme,Sec-CH-UA-Full-Version-List,Sec-CH-UA-Platform-Version", "Expect: 100-continue", "Keep-Alive: 300", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Ch-Prefers-Color-Scheme: light", "Sec-Ch-Ua: 'Not.A/Brand';v='8', 'Chromium';v='114', 'Google Chrome';v='114'", "Sec-Ch-Ua-Full-Version-List: 'Not.A/Brand';v='8.0.0.0', 'Chromium';v='114.0.5735.248', 'Google Chrome';v='114.0.5735.248'", "Sec-Ch-Ua-Mobile: ?0", "Sec-Ch-Ua-Platform: 'Windows'", "Sec-Ch-Ua-Platform-Version: '15.0.0'", "Sec-Fetch-Dest: document", "Cache-Control: no-cache", "Sec-Fetch-Mode: navigate", "User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Fetch-User: ?1", "Content-Type: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", "Connection: keep-alive"]);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, true);
        if ($proxy) {
            $ip = $proxy[0];
            $port = $proxy[1];
            curl_setopt($ch, CURLOPT_PROXY, $ip . ":" . $port);
        }
        if (isset($proxy[2])) {
            $user = $proxy[2];
            $pass = $proxy[3];
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ":" . $pass);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_POSTREDIR, 3);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 150);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function haibrave_get($url)
    {
        global $proxy;
        global $cookie;
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authority: www.facebook.com", "Host: www.facebook.com", "Scheme: https", "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", "Accept-Language: en-US,en;q=0.8,bn;q=0.6", "Accept-CH:  viewport-width,Sec-CH-Prefers-Color-Scheme,Sec-CH-UA-Full-Version-List,Sec-CH-UA-Platform-Version", "Expect: 100-continue", "Keep-Alive: 300", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Ch-Prefers-Color-Scheme: light", "Sec-Ch-Ua: 'Not.A/Brand';v='8', 'Chromium';v='114', 'Google Chrome';v='114'", "Sec-Ch-Ua-Full-Version-List: 'Not.A/Brand';v='8.0.0.0', 'Chromium';v='114.0.5735.248', 'Google Chrome';v='114.0.5735.248'", "Sec-Ch-Ua-Mobile: ?0", "Sec-Ch-Ua-Platform: 'Windows'", "Sec-Ch-Ua-Platform-Version: '15.0.0'", "Sec-Fetch-Dest: document", "Cache-Control: no-cache", "Sec-Fetch-Mode: navigate", "User-Agent:Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Fetch-User: ?1", "Content-Type: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7", "Connection: keep-alive"]);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 10; Redmi Note 7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.92 Mobile Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_REFERER, true);
        if ($proxy) {
            $ip = $proxy[0];
            $port = $proxy[1];
            curl_setopt($ch, CURLOPT_PROXY, $ip . ":" . $port);
        }
        if (isset($proxy[2])) {
            $user = $proxy[2];
            $pass = $proxy[3];
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ":" . $pass);
        }
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HEADER, true);
        curl_setopt($ch, CURLOPT_POSTREDIR, 3);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 150);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }
    function haibrave_upload($url, $forderImg)
    {
        global $cookie;
        $images = glob($forderImg . "/*.jpg");
        $rand = rand(0, count($images) - 1);
        $boundary = uniqid();
        $info = pathinfo($images[$rand]);
        $name = $info['basename'];
        $data = '';
        $delimter = '------WebKitFormBoundary' . $boundary;
        $data .= $delimter . '
Content-Disposition: form-data; name="file"; filename="' . $name . '"
Content-Type: image/jpeg 

' . file_get_contents($images[$rand]) . '
' . $delimter . '--';
        $headers = array("Authority: www.facebook.com", 'Content-Type: multipart/form-data; boundary=----WebKitFormBoundary' . $boundary, "Scheme: https", "Host: www.facebook.com", "Sec-Ch-Prefers-Color-Scheme:light", "Accept: */*", "Accept-Language: en-US,en;q=0.9,vi;q=0.8", "Sec-Fetch-Mode:cors", "Referer:https://www.facebook.com/pages/creation/?ref_type=launch_point", "Sec-Fetch-Site:same-origin", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Ch-Prefers-Color-Scheme: light", "Sec-Fetch-Dest: document", "Cache-Control: no-cache", "Sec-Fetch-Mode: navigate", "Accept-Charset: ISO-8859-1,utf-8;q=0.7,*;q=0.7", "Sec-Fetch-User: ?1", "Connection: keep-alive");
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_COOKIE, $cookie);
        curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        if ($proxy) {
            $ip = $proxy[0];
            $port = $proxy[1];
            curl_setopt($ch, CURLOPT_PROXY, $ip . ":" . $port);
        }
        if (isset($proxy[2])) {
            $user = $proxy[2];
            $pass = $proxy[3];
            curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ":" . $pass);
        }
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_REFERER, true);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 150);
        $result = curl_exec($ch);
        $jsonData = substr($result, 9);
        $dataArray = json_decode($jsonData, true);
        $fbid = $dataArray['payload']['fbid'];
        curl_close($ch);
        return $fbid;
    }
/* END:#1 */
