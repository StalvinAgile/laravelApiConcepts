<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Validator;

class dummyApiController extends Controller
{
    public function getdata()
    {
        // return ["name" => "dummyname", "address" => "dummyaddress", "value" => 0000]; //to return dummy data
        return Device::all();
    }

    public function postdata(Request $req)
    {
        $device = new Device;
        $device->name = $req->name;
        $device->model = $req->model;
        $result = $device->save();
        if ($result) {
            return ["Result" => "data has been saved"];
        } else {
            return ["Result" => "operation failed"];
        }
    }

    public function putdata(Request $req)
    {
        $device = Device::find($req->id);
        $device->name = $req->name;
        $device->model = $req->model;
        $result = $device->save();
        if ($result) {
            return ["Result" => "data is updated"];
        } else {
            return ["Result" => "data update is failed"];
        }
    }

    public function search($name)
    {
        return Device::where("name", "like", "%" . $name . "%")->get();
    }

    public function delete($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result) {
            return ["result" => "record has been deleted from id " . $id];
        } else {
            return ["result" => "delete operation is failed"];
        }
    }
    public function savedata(Request $req)
    {
        $rules = array(
            "model" => "required|min:2|max:5",
        );
        $validator = Validator::make($req->all(), $rules);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 401);
        } else {
            $device = new Device;
            $device->name = $req->name;
            $device->model = $req->model;
            $result = $device->save();
            if ($result) {
                return ["Result" => "data has been saved"];
            } else {
                return ["Result" => "operation failed"];
            }

        }
    }

}
