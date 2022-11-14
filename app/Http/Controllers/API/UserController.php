<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function all(){
        return response()->json([
            'data' => User::all(),
            'code' => 200
        ]);
    }
    public function destroy($id){
        User::find($id)->delete();
        return response()->json([
            'msg' => 'Пол-ль удален',
            'code' => 200
        ]);
    }
}
