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
        $provider = (is_null($provider)) ? '\wa7eedem\smsGate\\' . config('sender.provider') : '\wa7eedem\smsGate\\' . $provider;
        $call     = new $provider;
        $balance  = $call->getBalance();

        return $balance;
    }

    public static function getSenderNames($provider = null)
    {
        $provider   = (is_null($provider)) ? '\wa7eedem\smsGate\\' . config('sender.provider') : '\wa7eedem\smsGate\\' . $provider;
        $call       = new $provider;
        $senderName = $call->getSenderNames();

        return $senderName;
    }

    public static function send($provider = null, $to, $msg)
    {
        $provider = (is_null($provider)) ? '\wa7eedem\smsGate\\' . config('sender.provider') : '\wa7eedem\smsGate\\' . $provider;
        $call     = new $provider;
        $sendSms  = $call->send($to, $msg);

        if ($sendSms->status == 1) {
            return $sendSms;
        }

        throw new \Exception('sending failed =>> ' . json_encode($sendSms));
    }
}
