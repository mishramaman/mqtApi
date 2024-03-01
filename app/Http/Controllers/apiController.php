<?php

namespace App\Http\Controllers;

use App\Models\Mqt;
use Illuminate\Http\Request;

class apiController extends Controller
{
    function newgetApi($id=null){
        return $id?Mqt::find($id):Mqt::all();
    }
  


    function newpostApi(Request $req){
        $data=new Mqt();
        $existingdata=Mqt::all();
        $existingdataArray=$existingdata->pluck('email')->toArray();
        if(in_array($req->email,$existingdataArray)){
            echo "data already existed for this user";
        }else{
            $data->name=$req->name;
            $data->email=$req->email;
            $data->salary=$req->salary;
            $result=$data->save();
            if($result){
                echo "Data has been saved successfully";
            }else{
                echo "Data has not been saved";
            }
        }
      
    }

    function newputApi(Request $req){
        $data=Mqt::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->salary=$req->salary;
        $result=$data->save();
        if($result){
            echo "Data for the user has been updated ";
        }else{
            echo "Data is not updated";
        }
    }


    function newdeleteApi($id){
        $data=Mqt::find($id);
        $result=$data->delete();
        if($result){
            echo "Data for the user has been deleted";
        }else{
            echo "Data has not been deleted";
        }
    }
}
