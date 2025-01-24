<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class EmailController extends Controller
{
    public function sendemail(){
        $to = ["gideonushindi94@gmail.com", "gtechcompany01@gmail.com","jtriple817@gmail.com", "jeyjeyochieng@gmail.com"];
        $msg = "Welcome it's Thursday. Today we are going to kick off our online caravan. We are setting the path the caravan is going to take. We will be covering topics on computer technology every Thursday. We will be visiting Web development, Mobile development, Artificial Intelligence, Algorithms and Latest news in computer technology. Check your email on Thursdays to view the topic the caravan will be visiting. See you next week on Thursday, take care!.";
        $subject = "Caravan Kick off!";
        Mail::to($to)->send(new SendEmail($msg, $subject));
        return "Email sent successfully";
    }
}
