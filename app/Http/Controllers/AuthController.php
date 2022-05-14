<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Companies;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{

    public function register(CreateCompanyRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);

        $data['user_id'] = $user->id;
        $data['status'] = 'active';
        $company = Companies::create($data);

        return response()->json([
            'company_id' => $company->id,
            'status' => $company->status,
            'token' => $user->createToken('API Token')->plainTextToken,
        ], 200);
    }

    public function login(LoginRequest $request)
    {

        $data = $request->validated();

        if (!Auth::attempt($data)) {
            return response()->json([
                'message' => 'Kullanıcı Bulunamadı'
            ], 401);
        }

        return response()->json([
            'token' => Auth::user()->createToken('API Token')->plainTextToken
        ], 200);

    }

}
