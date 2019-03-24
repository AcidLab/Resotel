<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendMail(Array $contact,$subject){

    	Mail::to($contact['mail1'])
    	->subject($subject)
        ->send(new SendEmail($contact));
        Mail::to($contact['mail2'])
        ->subject($subject)
        ->send(new SendEmail($contact));
    }
}
