<?php
/**
 * Created by PhpStorm.
 * User: atmonshi
 * Date: 10/7/17
 * Time: 9:46 AM
 */

namespace wa7eedem\smsGate;

use wa7eedem\smsGate\STag\STagAPI;

class STag
{
    protected $api;

    public function __construct()
    {
        $this->api = new stagAPI;
    }

    public function getBalance($serviceVars = [])
    {
        $service = $this->api->callService('checkBalance', $serviceVars);

        return $service->balance;
    }

    public function getSenderNames()
    {
        $service     = $this->api->callService('senderNames', ['getAll' => 1]);

        return $service->senderNames;
    }
}