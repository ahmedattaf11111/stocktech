<?php

namespace App\Commons\Traits;

trait SMS
{
    public function send($phone, $subject, $message)
    {
        $basic  = new \Vonage\Client\Credentials\Basic("73424200", "5eSRQjZU5CtVeu1h");
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phone, $subject, $message)
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully\n";
        } else {
            echo "The message failed with status: " . $message->getStatus() . "\n";
        }
    }
}
