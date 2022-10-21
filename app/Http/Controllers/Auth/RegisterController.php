<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function isBlockEmailDomain(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|string|email|max:255'
        ], [], [
            'email' => 'e-mail'
        ]);

        if(!$validator->passes())
            return response()->json(['resultCode' => -1002, 'resultMsg' => $validator->errors()->first(), 'returnUrl' => '' ], 400);

        return response()->json(['resultCode' => 0, 'resultMsg' => '', 'returnUrl' => '' ], 200);
    }

    public function EmailAuth(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|string|email|max:255'
        ], [], [
            'email' => 'e-mail'
        ]);

        if(!$validator->passes())
            return response()->json(['resultCode' => -1002, 'resultMsg' => $validator->errors()->first(), 'returnUrl' => '' ], 400);

        return response()->json(['resultCode' => 0, 'resultMsg' => '', 'returnUrl' => '' ], 200);
    }
}
