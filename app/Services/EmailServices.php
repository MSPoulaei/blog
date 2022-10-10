<?php

namespace App\Services;

use Illuminate\Support\Facades\Mail;

class EmailServices
{
    public static function send($title,$body,$toEmail)
    {
        $fromName=env("MAIL_FROM_NAME","Sadegh");
        $fromEmail=env("MAIL_FROM_ADDRESS","admin@gmail.com");
        $data = array('name'=>$toEmail,"body"=>$body);

        Mail::send(['text'=>'mail'], $data, function($message) use($fromName,$fromEmail,$title,$toEmail) {
            $message->to($toEmail, $toEmail)->subject($title);
            $message->from($fromEmail,$fromName);
        });
    }
}
