<?php

namespace App\Jobs;

use App\SMSProviders\NexmoSMSProvider;
use App\SMSProviders\TwilioSMSProvider;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SMSJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user;

    /**
     * @var string
     */
    public $message;

    /**
     * @var array[]
     */
    public $SMSProviders = [
        'twilio' => TwilioSMSProvider::class,
        'nexmo' => NexmoSMSProvider::class
    ];

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user, $message)
    {
        $this->user = $user;
        $this->message = $message;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        /**
         * Get current provider
         */
        $currentProvider = config('sms.sms_provider');

        /**
         * class initialization and sending sms
         */
        $smsClass = new $this->SMSProviders[$currentProvider];
        $smsClass->sendSms($this->message, $this->user->phone);
    }
}
