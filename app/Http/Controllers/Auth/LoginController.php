<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
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
        $this->middleware('guest')->except('logout');
    }

    public function LoginForm()
    {
        return view('auth.login');
    }

    public function LoginFormSubmit(Request $request)
    {
        $accountLang = $request->header('Accept-Language');

        Session::put('applocale', $accountLang);
        App::setLocale(Session()->get('applocale'));

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'isIpCheck' => '',
            'password' => 'required|min:8|max:20'
        ], [], [
            'email' =>  Lang::get('messages.email'),
            'password' => Lang::get('messages.password')
        ]);

        $ip = $request->ip();

        if(!$validator->passes()){
            $this->incrementLoginAttempts($request);

            return $request->wantsJson()
            ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()],'resultData' => null, 'returnUrl' => '' ], 400)
            : redirect(route('gamepanel.login'))->withInput()->withErrors($validator->errors());
        }

        ($request['isIpCheck'] == 'false' ? $request['isIpCheck'] = 0 : $request['isIpCheck']);
        $user = User::MakeLogin($request['email'], $request['password'], $request['isIpCheck'], $ip);

        switch ($user['code']) {
            case -5:
                $validator->errors()->add('email', Lang::get('messages.ipProtectLockedMessage'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.login'))->withInput()->withErrors($validator->errors());
                break;
            case -4:
                $validator->errors()->add('email', Lang::get('messages.secondEmailIsNotActivated'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.login'))->withInput()->withErrors($validator->errors());
                break;
            case -3:
                $validator->errors()->add('email', Lang::get('messages.isBlockedAccount'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.login'))->withInput()->withErrors($validator->errors());
                break;
            case -2:
                $validator->errors()->add('email', Lang::get('messages.userNotFound'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.login'))->withInput()->withErrors($validator->errors());
                break;
            case -1:
                $validator->errors()->add('password', Lang::get('messages.incorrectPassword'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null, 'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.login'))->withInput()->withErrors($validator->errors());
                break;
        }

        Auth::loginUsingId($user['data']->id);

        return $request->wantsJson()
        ? response()->json(['resultCode' => 0, 'resultMsg' => null, 'resultData' => $user['data'], 'returnUrl' => '' ], 200)
        : redirect()->route('gamepanel.controlpanel.panelaccountinfo');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        $this->guard()->logout();

        // $request->session()->invalidate();

        $request->session()->regenerateToken();

        if ($response = $this->loggedOut($request)) {
            return $response;
        }

        return $request->wantsJson()
            ? response()->json([], 204)
            : redirect('/');
    }

    /**
     * The user has logged out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    protected function loggedOut(Request $request)
    {
        //
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    public function LoginIpProtectCheck($email)
    {
        $user = User::CheckIsIpProtect($email);
        if($user == -1){
            return response()->json(['resultCode' => -1, 'resultMsg' => '', 'returnUrl' => '' ], 200);
        }
        return response()->json(['resultCode' => 0, 'resultMsg' => '', 'returnUrl' => '' ], 200);
    }

    public function ResetPasswordForm()
    {
        return view('auth.passwords.reset');
    }

    public function ResetPasswordFormSubmit(Request $request)
    {
        $accountLang = $request->header('Accept-Language');

        Session::put('applocale', $accountLang);
        App::setLocale(Session()->get('applocale'));

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255'
        ], [], [
            'email' =>  Lang::get('messages.email'),
        ]);

        if(!$validator->passes()){
            return $request->wantsJson()
            ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()],'resultData' => null, 'returnUrl' => '' ], 400)
            : redirect(route('gamepanel.reset'))->withInput()->withErrors($validator->errors());
        }

        $user = User::ResetPassword($request['email'], $request['password'], $request['isIpCheck']);

        switch ($user['code']) {
            case -3:
                $validator->errors()->add('email', Lang::get('messages.isBlockedAccount'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1003, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null, 'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.reset'))->withInput()->withErrors($validator->errors());
            case -2:
                $validator->errors()->add('email', Lang::get('messages.userNotFound'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null, 'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.reset'))->withInput()->withErrors($validator->errors());
                break;
            case -1:
                $validator->errors()->add('email', Lang::get('messages.resetPasswordTimeElapsed'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1001, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null, 'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.reset'))->withInput()->withErrors($validator->errors());
                break;
        }

        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.resetPasswordMessage')]);

        return $request->wantsJson()
        ? response()->json(['resultCode' => 1000, 'resultMsg' => ['message' => Lang::get('messages.resetPasswordMessage'), 'errors' => null], 'resultData' => null, 'returnUrl' => '' ], 200)
        : redirect(route('gamepanel.login'));
    }

    public function UpdateDiscordId(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'discordId' => 'required'
        ], [], [
            'email' =>  Lang::get('messages.email'),
            'discordId' =>  Lang::get('messages.discordId')
        ]);

        // errors
        if(!$validator->passes()){
            return response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()],'resultData' => null, 'returnUrl' => '' ], 400);
        }

        User::UpdateDiscordId($request->email, $request->discordId);

        // Success
        return response()->json(['resultCode' => 1000, 'resultMsg' => ['message' => 'success', 'errors' => null],'resultData' => null, 'returnUrl' => '' ], 200);
    }
}
