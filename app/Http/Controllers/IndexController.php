<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return view('index');
    }

    public function sendMail(Request $request){
        $string = '';
        $string .= $request->has('name') ? ('���: ' . $request->name . "\r\n") : '';
        $string .= $request->has('phone') ? ('�������: ' . $request->phone . "\r\n") : '';
        $string .= $request->has('email') ? ('�����: ' . $request->email . "\r\n") : '';
        $string .= $request->has('message') ? ('���������: ' . $request->message . "\r\n") : '';
        Mail::raw($string, function ($m) {
            $m->subject('pechatny.su');
            $m->to('pechatny@gmail.com');
        });

        return ['success' => true];
    }
}
