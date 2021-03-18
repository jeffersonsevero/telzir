<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class WebController extends Controller
{


    public function index(){


        $plans = Plan::all();


        return view('web.index')->with([
            'plans' => $plans
        ]);


    }

}
