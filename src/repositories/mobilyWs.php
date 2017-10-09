<?php
/**
 * Created by PhpStorm.
 * User: atmonshi
 * Date: 10/7/17
 * Time: 9:46 AM
 */

namespace wa7eedem\smsGate;

class mobilyWs
{
    public function getBalance($resultType = 0)
    {
        include(__DIR__ . "/../mobilyWs/includeSettings.php");
        $mobile   = config('sender.mobileWs.username');
        $password = config('sender.mobileWs.password');
        $balcanc  = balanceSMS($mobile, $password, $resultType);

        return $balcanc;
    }

    public function getSenderNames()
    {
        return "Not available in mobilyWs";
    }
}
