<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuallyController extends Controller
{
    //
    public function index()
    {
        return view('usually.index');
    }
    public function template()
    {
        return view('usually.template');
    }
}
