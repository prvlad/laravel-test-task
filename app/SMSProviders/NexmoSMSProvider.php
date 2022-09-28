<?php


namespace App\SMSProviders;


use Illuminate\Support\Facades\Log;

class NexmoSMSProvider
{
    /**
     * @var string
     */
    protected $apiKey;

    /**
     * @var string
     */
    protected $apiHost;

    public function __construct()
    {
        $this->apiKey = config('sms.nexmo.api_key');
        $this->apiHost = config('sms.nexmo.api_host');
    }

    /**
     * @param $massage
     * @param $phoneNumber
     * @return bool
     */
    public function sendSms($massage, $phoneNumber): bool
    {
        Log::channel('SmsNotification')->info("Provider - 'Nexmo', Message - $massage, phoneNumber - $phoneNumber");
        return true;
    }
}
