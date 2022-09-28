<?php


namespace App\SMSProviders;


use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class TwilioSMSProvider
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
        $this->apiKey = config('sms.twilio.api_key');
        $this->apiHost = config('sms.twilio.api_host');
    }

    /**
     * @param $massage
     * @param $phoneNumber
     * @return bool
     */
    public function sendSms($massage, $phoneNumber): bool
    {
        Log::channel('SmsNotification')->info("Provider - 'Twilio', Message - $massage, phoneNumber - $phoneNumber");
        return true;
    }
}
