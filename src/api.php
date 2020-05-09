<?php

namespace atmonshi\sender;

class api
{
    public static function getBalance($provider = null)
    {
        $provider = (is_null($provider)) ? '\atmonshi\sender\\' . config('sender.provider') : '\atmonshi\sender\\' . $provider;
        $call     = new $provider;
        $balance  = $call->getBalance();

        return $balance;
    }

    public static function getSenderNames($provider = null)
    {
        $provider   = (is_null($provider)) ? '\atmonshi\sender\\' . config('sender.provider') : '\atmonshi\sender\\' . $provider;
        $call       = new $provider;
        $senderName = $call->getSenderNames();

        return $senderName;
    }

    public static function send($provider = null, $to, $msg)
    {
        $provider = (is_null($provider)) ? '\atmonshi\sender\\' . config('sender.provider') : '\atmonshi\sender\\' . $provider;
        $call     = new $provider;
        $sendSms  = $call->send($to, $msg);

        if ($sendSms->status == 1) {
            return $sendSms;
        }

        throw new \Exception('sending failed =>> ' . json_encode($sendSms));
    }
}
