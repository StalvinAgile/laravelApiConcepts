<?php

namespace App\Http\Controllers;

use App\Models\Device;

class dummyApiController extends Controller
{
    public function getdata()
    {
        // return ["name" => "dummyname", "address" => "dummyaddress", "value" => 0000]; //to return dummy data
        return Device::all();
    }
    public function postdata()
    {
        return ["Result" => "data has been saved"];
    }
}
