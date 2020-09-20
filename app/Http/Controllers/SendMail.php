<?php

namespace App\Http\Controllers;

use App\Mail\OrderProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendMail extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'name' => 'required|max:50',
            'text' => 'max:400',
            'tel' => 'max:40'
        ]);
        $data = $request->all();
        $mail = new OrderProduct($data);

        Mail::to($data['email'])
            ->send($mail);

        $mail->toAdmin = true;

        Mail::to('serg237.y85@gmail.com')
            ->cc('otp@palwood.ru')
            ->send($mail);

        echo "ok";
    }
}
