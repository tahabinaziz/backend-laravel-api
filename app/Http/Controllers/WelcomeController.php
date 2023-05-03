<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;
use Illuminate\Http\Response;

class WelcomeController extends Controller
{
    //
    public function mailSend() {
        $email = 'mail@hotmail.com';
   
        $mailInfo = [
            'title' => 'Welcome New User',
            'url' => 'https://www.remotestack.io'
        ];
  
        Mail::to($email)->send(new WelcomeMail($mailInfo));
   
        return response()->json([
            'message' => 'Mail has sent.'
        ], Response::HTTP_OK);
    }
}
