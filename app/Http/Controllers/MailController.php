<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmMail;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sent_mail(){
       $employee = Employee::find(1);
       $mailable = new ConfirmMail($employee);
       Mail::to("thoigian5792@gmail.com")->send($mailable);
       return true;
    }
}
