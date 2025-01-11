<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;
class EmailController extends Controller
{
    public function sendemail(){
        $to = ["gideonushindi94@gmail.com", "gtechcompany01@gmail.com","jtriple817@gmail.com"];
        $msg = "Hello, welcome to G-Tech company, we are proud to have you abroad. We are technology company. We deal in web development, mobile applications, Graphics design, Cyber security, Networking, IT consultations. We are dedicated to provide best services.As G-Tech Company, we have started an online caravan to equip our customers with knowledge on technology. The caravan will begin next week 17/01/2025. Can't wait to start going together!";
        $subject = "Online Caravan";
        Mail::to($to)->send(new SendEmail($msg, $subject));
        return "Email sent successfully";
    }
}
