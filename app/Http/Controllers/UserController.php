<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //
    function list($id=null){
        {
            return $id? User::find($id) :User::all();
        }
    }
    function add(Request $req){
        {
            $user = new User;
            $user-> name = $req->name;
            $user-> email = $req->email;
            $user-> address = $req->address;
            $result = $user->save();
            if($result){
            return["Result" => "Data has been saved"];
            }
            else{
                return["Result" => "Operation failed"];
           
            }
        }
    }
    function update(Request $req){
        {
            $user =  User::find($req->id);
            $user-> name = $req->name;
            $user-> email = $req->email;
            $user-> address = $req->address;
            $result = $user->save();
            if($result){
            return["Result" => "Data has been updated"];
            }
            else{
                return["Result" => "Operation failed"];
           
            }
        }
    }
    function search($name){
        {
          return User::where("name", "like", "%" .$name. "%")->get();
        }
    }
    function delete($id){
        {
          $user =  User::find($id);
          $result =  $user->delete();
          if($result){
          return["Result" => "Record has been deleted"];
          }else{
            return["Result" => "Delete operation failed"];
          }
        }
    }
    function testData(Request $req){
        {
          $rules = array(
            "name" => "required|min:2|max:4"
          );
          $validator = Validator::make($req->all(), $rules);
          if($validator->fails()){
            return response()->json($validator->errors(), 401);
          }
          else{
            $user = new User;
            $user-> name = $req->name;
            $user-> email = $req->email;
            $user-> address = $req->address;
            $result = $user->save();
            if($result){
            return["Result" => "Data has been saved"];
            }
            else{
                return["Result" => "Operation failed"];
           
            }
          }
        }
    }
}
