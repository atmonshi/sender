<?php

namespace atmonshi\sender\STag;

/**
 * Class STag_API for managing the STag SMS API Calls.
 *
 * @version     1.0
 */
class STagAPI
{
    /**
     * @var string Base Url fo STag API
     */
    private $url = 'https://newtags.com.sa/sms/api/';
    /**
     * @var array User Config
     */
    private $config;
    /**
     * @var CURL CURL library Object
     */
    private $curl;
    /**
     * @var array Services names with callable service name for API
     */
    private $services
        = [
            'checkBalance'    => 'checkBalance',
            'senderNames'     => 'getSenderNames',
            'sendSms'         => 'sendSMS',
            'groupsMangment'  => 'groupsMangment',
            'mobilesMangment' => 'mobilesMangment',

        ];

    public function __construct()
    {
        $this->config = config('sender.stag');
        $this->url = $this->url.$this->config['apiVersion'].'/';
        $this->curl = new CURL();
    }

    /**
     * Call an API Service.
     *
     * @param string $serviceName API Service Name
     * @param array  $serviceVars Service Parameters
     *
     * @return object
     */
    public function callService($serviceName, array $serviceVars = [])
    {
        if (isset($this->services[$serviceName])) {
            return $this->$serviceName($serviceVars);
        } else {
            return 'Undefined Service Name !';
        }
    }

    /**
     * Check User Balance Service.
     *
     * @param array $serviceVars Service Parameters
     *
     * @return object
     */
    private function checkBalance($serviceVars = [])
    {
        $userInfo = [
            'user' => $this->config['username'],
            'pass' => $this->config['password'],
        ];
        if (!isset($userInfo['user']) || !isset($userInfo['pass'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }
        $vars = array_merge($userInfo, $serviceVars);

        $response = $this->curl->post($this->url.$this->services['checkBalance'], $vars);
        if (isset($response->status) && $response->status === 1) {
            return $response;
        } else {
            throw new \Exception($response->error);
        }
    }

    /**
     * Get Sender Names Service.
     *
     * @param array $serviceVars Service Parameters
     *
     * @return object
     */
    private function senderNames($serviceVars = [])
    {
        if (!isset($serviceVars['getAll'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }

        $userInfo = [
            'user' => $this->config['username'],
            'pass' => $this->config['password'],
        ];

        $vars = array_merge($userInfo, $serviceVars);
        if (!isset($userInfo['user']) || !isset($userInfo['pass'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }
        $response = $this->curl->post($this->url.$this->services['senderNames'], $vars);

        if (isset($response->status) && $response->status === 1) {
            return $response;
        } else {
            throw new \Exception($response->error);
        }
    }

    /**
     * send sms Service.
     *
     * @param array $serviceVars Service Parameters
     *
     * @return object
     */
    private function sendSms($serviceVars = [])
    {
        if (!isset($serviceVars['appName']) || !isset($serviceVars['host']) || !isset($serviceVars['mobiles']) || !isset($serviceVars['text'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }
        if (!preg_match('/^[a-z0-9][a-z0-9\-]+[a-z0-9](\.[a-z]{2,5})+$/i', $serviceVars['host'])) {
            throw new \Exception('Not a valid host');
        }
        $userInfo = [
            'user'       => $this->config['username'],
            'pass'       => $this->config['password'],
            'senderName' => $this->config['senderName'],
        ];

        if (!isset($userInfo['user']) || !isset($userInfo['pass']) || !isset($userInfo['senderName'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }
        $vars = array_merge($userInfo, $serviceVars);

        $response = $this->curl->post($this->url.$this->services['sendSms'], $vars);

        if (isset($response->status) && $response->status === 1) {
            return $response;
        } else {
            throw new \Exception($response->error);
        }
    }

    /**
     * Groups Managment Service.
     *
     * @param array $serviceVars Service Parameters
     *
     * @return object
     */
    private function groupsMangment($serviceVars = [])
    {
        if (!isset($serviceVars['action'])) {
            throw new \Exception(' Not a valid action , or must be creat,delete,get,getMobiles ');
        }

        if ($serviceVars['action'] != "create" && $serviceVars['action'] != "delete" && $serviceVars['action'] != "getMobiles" && $serviceVars['action'] != "get") {
            throw new \Exception(' action must be creat,delete,get,getMobiles ');
        }

        if ($serviceVars['action'] == "create") {
            $serviceVars['name'] = trim($serviceVars['name']);
            if (( !isset($serviceVars['name']) || !isset($serviceVars['type']) ) || ( isset($serviceVars['type']) && ( $serviceVars['type'] != "1" && $serviceVars['type'] != "2" ) )) {
                throw new \Exception('There is Some Missing Parameters for create action, Please review the documentation ');
            }
        }

        if ($serviceVars['action'] == "delete") {
            if (!isset($serviceVars['id'])) {
                throw new \Exception('There is Some Missing Parameters for delete action, Please review the documentation ');
            }
        }

        if ($serviceVars['action'] == "getMobiles") {
            if (!isset($serviceVars['id'])) {
                throw new \Exception('There is Some Missing Parameters for getMobiles action, Please review the documentation ');
            }
        }

        $userInfo = [
            'user' => $this->config['username'],
            'pass' => $this->config['password'],
        ];
        $vars     = array_merge($userInfo, $serviceVars);
        if (!isset($userInfo['user']) || !isset($userInfo['pass'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }
        $response = $this->curl->post($this->url.$this->services['groupsMangment'], $vars);
        //var_dump($response);
        if (isset($response->status) && $response->status === 1) {
            return $response;
        } else {
            throw new \Exception($response->error);
        }
    }

    /**
     * Groups Mobiles Managment Service.
     *
     * @param array $serviceVars Service Parameters
     *
     * @return object
     */
    private function mobilesMangment($serviceVars = [])
    {
        if (!isset($serviceVars['action'])) {
            throw new \Exception(' Not a valid action , or must be create,update,delete,get ');
        }

        if ($serviceVars['action'] != "create" && $serviceVars['action'] != "delete" && $serviceVars['action'] != "update" && $serviceVars['action'] != "get") {
            throw new \Exception(' action must be creat,delete,get,update ');
        }

        if ($serviceVars['action'] == "create") {
            if (( !isset($serviceVars['group_id']) || !isset($serviceVars['number']) )) {
                throw new \Exception('There is Some Missing Parameters for create action, Please review the documentation ');
            }
        }

        if ($serviceVars['action'] == "delete") {
            if (!isset($serviceVars['id'])) {
                throw new \Exception('There is Some Missing Parameters for delete action, Please review the documentation ');
            }
        }

        if ($serviceVars['action'] == "get") {
            if (!isset($serviceVars['id'])) {
                throw new \Exception('There is Some Missing Parameters for get action, Please review the documentation ');
            }
        }

        if ($serviceVars['action'] == "update") {
            if (!isset($serviceVars['id']) || !isset($serviceVars['number']) || !isset($serviceVars['group_id'])) {
                throw new \Exception('There is Some Missing Parameters for update action, Please review the documentation ');
            }
        }

        $userInfo = [
            'user' => $this->config['username'],
            'pass' => $this->config['password'],
        ];
        $vars     = array_merge($userInfo, $serviceVars);
        if (!isset($userInfo['user']) || !isset($userInfo['pass'])) {
            throw new \Exception('There is Some Missing Parameters for this Service, Please review the documentation ');
        }
        $response = $this->curl->post($this->url.$this->services['mobilesMangment'], $vars);
        if (isset($response->status) && $response->status === 1) {
            return $response;
        } else {
            throw new \Exception($response->error);
        }
    }
}
?>