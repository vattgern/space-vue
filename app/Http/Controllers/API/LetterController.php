<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\LetterRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Letter;

class LetterController extends Controller
{
    public function all(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Letter::all(),
            'code' => 200
        ]);
    }
    public function index($id): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'data' => Letter::find($id),
            'code' => 200
        ]);
    }
    public function store(LetterRequest $request): \Illuminate\Http\JsonResponse
    {
        $letter = Letter::create($request->all());
        return response()->json([
           'data' => $letter,
           'code' => 200
        ]);
    }
    public function destroy($id): \Illuminate\Http\JsonResponse
    {
        Letter::find($id)->delete();
        return response()->json([
           'msg' => 'письмо удалено',
           'code' => 200
        ]);
    }
}
