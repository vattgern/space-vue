<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Letter;

class LetterController extends Controller
{
    public function all(){
        return response()->json([
            'data' => Letter::all(),
            'code' => 200
        ]);
    }
    public function index($id){
        return response()->json([
            'data' => Letter::find($id),
            'code' => 200
        ]);
    }
    public function store(){
        
    }
}
