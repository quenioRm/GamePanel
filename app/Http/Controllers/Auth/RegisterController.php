<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Functions;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Lang;
use App\Models\UsersActivation;

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

    public function RegisterForm()
    {
        return view('auth.register');
    }

    public function RegisterFormSubmit(Request $request)
    {
        $request['birth'] = Carbon::parse(str_replace("/","-", $request['birth']))->format('d-m-Y');

        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|string|email|max:255',
            'authKey' => 'required',
            'password' => 'required|min:8|max:20',
            'passwordCheck' => 'required|min:8|same:password',
            'name' => 'required|unique:users|min:5|max:10|alpha_dash',
            'birth' => 'required|date_format:d-m-Y',
            'nationCode' => 'required'
        ], [], [
            'email' =>  Lang::get('messages.email'),
            'authKey' =>  Lang::get('messages.authKey'),
            'password' => Lang::get('messages.password'),
            'passwordCheck' => Lang::get('messages.cPassword'),
            'name' => Lang::get('messages.name'),
            'birth' => Lang::get('messages.birth'),
            'nationCode' => Lang::get('messages.nation')
        ]);

        if(!$validator->passes())
            return redirect(route('register'))->withInput()->withErrors($validator->errors());
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

        $user = UsersActivation::MakeActivationCode($request);
        if($user == 0)
            return response()->json(['resultCode' => 0, 'resultMsg' => '', 'returnUrl' => '' ], 200);
        
        return response()->json(['resultCode' => 0, 'resultMsg' => Lang::get('messages.accountActivateFailed'),
        'returnUrl' => '' ], 400);
    }

    public function AuthMailSend(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|unique:users|string|email|max:255',
        ], [], [
            'email' =>  Lang::get('messages.email')
        ]);
        
        if(!$validator->passes())
            return response()->json(['resultCode' => -1002, 'resultMsg' => $validator->errors()->first(), 'returnUrl' => '' ], 400);

        $user = UsersActivation::MakeActivationCode($request);
        if($user == 0)
            return response()->json(['resultCode' => 0, 'resultMsg' => '', 'returnUrl' => '' ], 200);
        
        return response()->json(['resultCode' => 0, 'resultMsg' => Lang::get('messages.accountActivateFailed'),
        'returnUrl' => '' ], 400);
        
    }
}

