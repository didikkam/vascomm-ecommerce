<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        return view('frontend.login');
    }

    public function doLogin(Request $request)
    {
        $dataValidate = [
            'email'      => 'required|email|max:255',
            'password'     => 'required|max:255',
        ];
        $validator = Validator::make($request->all(), $dataValidate);
        if ($validator->fails()) {
            return getValidatedMessage($validator);
        }

        try {
            $data = [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ];

            if (!Auth::Attempt($data)) {
                throw new Exception("Email atau Password Salah", Response::HTTP_NOT_FOUND);
            }
            return getSuccessMessage("");
        } catch (\Throwable $th) {
            return getThrowMessage($th);
        }
    }

    public function register(Request $request)
    {
        return view('frontend.register');
    }

    public function doRegister(Request $request)
    {
        $dataValidate = [
            'name'      => 'required|string|max:255',
            'email'   => 'required|string|max:255|email|unique:users',
            'phone'     => 'required|numeric',
        ];
        $validator = Validator::make($request->all(), $dataValidate);
        if ($validator->fails()) {
            return getValidatedMessage($validator);
        }

        try {
            $dataStore = [
                'name'     => $request->name,
                'email'     => $request->email,
                'phone'     => $request->phone,
                'status'     => 1,
                'password'  => Hash::make("secret123"),
            ];
            $data = User::create($dataStore);
            return getSuccessMessage($data);
        } catch (\Throwable $th) {
            return getThrowMessage($th);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
