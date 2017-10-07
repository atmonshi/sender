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
        $provider = (is_null($provider)) ? config('sender.provider') : $provider;
        $call     = new $provider;
        $balance  = $call->getBalance();

        return "hi api " . $balance;
    }
}