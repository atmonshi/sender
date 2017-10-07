<?php
/**
 * Created by PhpStorm.
 * User: atmonshi
 * Date: 10/7/17
 * Time: 9:46 AM
 */

namespace wa7eedem\smsGate;


class api
{
    public static function getBalance($provider = null)
    {
        $provider = (is_null($provider)) ? '\wa7eedem\smsGate\\'.config('sender.provider') : '\wa7eedem\smsGate\\'.$provider;
        $call     = new $provider;
        $balance  = $call->getBalance();

        return $balance;
    }

    public static function getSenderNames($provider = null)
    {
        $provider = (is_null($provider)) ? '\wa7eedem\smsGate\\'.config('sender.provider') : '\wa7eedem\smsGate\\'.$provider;
        $call     = new $provider;
        $senderName  = $call->getSenderNames();

        return $senderName;
    }
}