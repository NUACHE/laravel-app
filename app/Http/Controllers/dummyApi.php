<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dummyApi extends Controller
{
    //
    function getData()
    {
        return [
            "name"=>"anil",
            "email"=> "anim@test.com", 
            "address"=>"delhi"
            ];
    }
}
