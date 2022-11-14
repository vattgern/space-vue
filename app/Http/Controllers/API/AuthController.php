<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\API\LoginRequest;
use App\Http\Requests\API\RegisterRequest;

class AuthController extends Controller
{
    public function registration(RegisterRequest $request){
        // Создание пользователя
        // -----------------------
        $user = User::create([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'role' => 'user'
        ]);
        // -----------------------
        //Создается токен и сразу в базу
        // -----------------------
        $token = $user->createToken('auth_token')->plainTextToken;
        // -----------------------
        // Sanctum подключение
        // -----------------------
        //auth('sanctum')->login($user);
        // -----------------------
        // Отправка ответа JSON
        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'code' => 200,
        ]);
    }

    public function login(LoginRequest $request){
        // Проверка что пользователь существует
        // -----------------------
        if(!Auth::attempt($request->all())){
            return response()->json([
                'msg' => 'Неверные данные',
                'code' => 401
            ]);
        }
        // Подключение Auth
        // -----------------------
        $user = Auth::user();
        // Создание токена
        // -----------------------
        $token = $user->createToken('auth_token')->plainTextToken;
        // Отправка отвера в JSON
        // -----------------------
        return response()->json([
            'code' => 200,
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }
    public function me(){
        return Auth::user();
    }
    public function logout(){
        //Удаление токенов
        auth()->user()->tokens()->delete();
        return response()->json([
            'msg' => 'Вы вышли'
        ]);
    }
}
