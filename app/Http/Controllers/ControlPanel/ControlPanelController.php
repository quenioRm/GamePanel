<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\Countries;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Session;
use App\Models\UserAvatar;
use App\Models\UserAddInformation;
use App\Models\UserPasswordChangeLog;
use Illuminate\Validation\Rule;
use App\Models\UsersActivation;
use App\Models\UserLoginAccountLog;
use App\Models\GiftCode;

class ControlPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AccountInfoForm()
    {
        Auth::user()->load('userinformationadd');

        return view('controlpanel.pages.accountinfo',
        [
            'lastpasswordhange' => UserPasswordChangeLog::FindLastChange(),
            'ip' => UserLoginAccountLog::GetLastLog()
        ]);
    }

    public function ProfileAccountForm()
    {
        // $data = User::find(Auth::user()->id)->with('useravatar');
        $data = User::where('id', Auth::user()->id)->with('useravatar')->get();
        // dd($data->toArray());
        return view('controlpanel.pages.profileaccount',
        [
            'account' => $data->toArray(),
            'lastpasswordhange' => UserPasswordChangeLog::FindLastChange()
        ]);
    }

    public function ProfileAccountFormSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'min:5',
                'max:16',
                'alpha_dash',
				Rule::unique('users')->ignore(Auth::user()->id)->where(function ($query) use ($request) {
					return $query->where('name', $request['name']);
				})
            ],
            'profileImageNo' => ''
        ], [], [
            'name' =>  Lang::get('messages.name'),
        ]);

        if(!$validator->passes()){
            return redirect(route('gamepanel.controlpanel.profileaccount'))->withInput()->withErrors($validator->errors());
        }

        $user = User::UpdateProfile($request['name'], $request['profileImageNo']);

        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.accountInfoUpdateSucess')]);

        return redirect(route('gamepanel.controlpanel.profileaccount'));
    }

    public function ProfileAccountFormuploadAvatar(Request $request)
    {
       $validator = Validator::make($request->all(), [
           'avatar' => 'required|image|mimes:png,jpg,jpeg|max:2048'
       ], [], [
           'avatar' => 'avatar'
       ]);

        if(!$validator->passes())
           return response()->json(['resultCode' => -1002, 'resultMsg' => $validator->errors()->first(), 'returnUrl' => '' ], 400);

        $status = UserAvatar::MakeNewAvatar($request);

        if($status == -1){
            return response()->json(['resultCode' => -1, 'resultMsg' => Lang::get('messages.uploadFailed'), 'returnUrl' => '' ], 400);
        }
        return response()->json(['resultCode' => 0, 'resultMsg' => Lang::get('messages.uploadSuccess'), 'returnUrl' => '' ], 200);
    }

    public function AccountProfileInfoForm()
    {
        return view('controlpanel.pages.accountprofileinfo',
        [
            'accountregion' => Countries::GetCountrie(),
            'lastpasswordhange' => UserPasswordChangeLog::FindLastChange()
        ]);
    }

    public function AccountProfileSecondEmailForm()
    {
        return view('controlpanel.pages.profilesecondemail');
    }

    public function AccountProfileSecondEmailFormSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users_profile_add')->ignore(Auth::user()->id)->where(function ($query) use ($request) {
                    return $query->where('email', $request['email']);
                })
            ],
        ], [], [
            'email' =>  Lang::get('messages.email'),
        ]);

        if(!$validator->passes()){
            return redirect(route('gamepanel.controlpanel.accountprofilesecondemail'))->withInput()->withErrors($validator->errors());
        }

        $user = UserAddInformation::MakeInformationAdd($request->email, null);
        switch ($user['code']) {
            case -1:
                $validator->errors()->add('email', Lang::get('messages.controlPanelProfileSecondEmailMessage_2'));
                return redirect(route('gamepanel.controlpanel.accountprofilesecondemail'))->withInput()->withErrors($validator->errors());
                break;
        }

        UsersActivation::MakeActivationCode($request);

        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.accountInfoUpdateSucess')]);
        return redirect()->route('gamepanel.controlpanel.accountprofilesecondemailconfirmation', [
            'email' => $user['data']->email
        ]);
        return redirect()->route('gamepanel.controlpanel.accountprofilesecondemailconfirmation', ['account', $user['data']]);
    }

    public function AccountProfileSecondEmailConfirmationForm()
    {
        return view('controlpanel.pages.profilesecondemailconfirmation');
    }

    public function AccountProfileSecondEmailConfirmationFormSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users_profile_add')->ignore(Auth::user()->id)->where(function ($query) use ($request) {
                    return $query->where('email', $request['email']);
                })
            ],
            'authKey' => 'required'
        ], [], [
            'email' =>  Lang::get('messages.email'),
            'authKey' =>  Lang::get('messages.authKey'),
        ]);

        if(!$validator->passes()){
            return redirect(route('gamepanel.controlpanel.accountprofilesecondemailconfirmation'))
            ->withInput()->withErrors($validator->errors());
        }

        UserAddInformation::ConfirmEmail($request->email, $request->authKey);
        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.accountInfoUpdateSucess')]);

        return redirect(route('gamepanel.controlpanel.profileaccount'));
    }

    public function AccountProfileChangePasswordForm()
    {
        return view('controlpanel.pages.profilechangepassword');
    }

    public function AccountProfileChangePasswordFormSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'oldPassword' => 'required|min:8|max:20',
            'password' => 'required|min:8|max:20',
            'passwordCheck' => 'required|min:8|same:password'
        ], [], [
            'oldPassword' =>  Lang::get('messages.OPassword'),
            'password' => Lang::get('messages.password'),
            'passwordCheck' => Lang::get('messages.cPassword')
        ]);

        if(!$validator->passes())
            return redirect(route('gamepanel.controlpanel.accountprofilechangepassword'))->withInput()->withErrors($validator->errors());

        if(hash('sha512', $request['oldPassword']) != Auth::user()->password){
            $validator->errors()->add('oldPassword', Lang::get('messages.OPasswordMessage'));

            return redirect(route('gamepanel.controlpanel.accountprofilechangepassword'))->withInput()->withErrors($validator->errors());
        }

        User::ChangePassword($request->password);

        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.accountInfoUpdateSucess')]);
        return redirect(route('gamepanel.controlpanel.accountprofilechangepassword'));
    }

    public function ProtectAccountByIp($isIpCheck)
    {
        ($isIpCheck == "false" ? $isIpCheck = 0 : $isIpCheck = 1);

        $user = User::SetIpCheck($isIpCheck);
        if($user == 0)
            return response()->json(['resultCode' => 0, 'resultMsg' => Lang::get('messages.accountInfoUpdateSucess'), 'returnUrl' => '' ], 200);

        return response()->json(['resultCode' => -1002, 'resultMsg' => Lang::get('messages.accountActivateFailed'),
        'returnUrl' => '' ], 400);
    }

    public function accountlogipForm()
    {
        $data = UserLoginAccountLog::where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(5)->toArray();
        // dd($data);
        return view('controlpanel.pages.includes.accountippaginate', [
            'items' => $data
        ]);
    }

    public function GiftCodeForm()
    {
        return view('controlpanel.pages.giftcode');
    }

    public function GiftCodeRecover(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'giftcodeid' => 'required'
        ], [], [
            'giftcodeid' =>  Lang::get('messages.giftcodeid'),
        ]);

        if(!$validator->passes())
            return redirect(route('controlpanel.pages.giftcode'))->withInput()->withErrors($validator->errors());

        $gift = GiftCode::RecoverGiftCode($request->giftcodeid);

        switch ($gift) {
            case -1:
                $validator->errors()->add('giftcodeid', Lang::get('messages.giftcodeiddontExists'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.controlpanel.panelgiftcode'))->withInput()->withErrors($validator->errors());
                break;
            case -2:
                $validator->errors()->add('giftcodeid', Lang::get('messages.giftcodeidexpired'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.controlpanel.panelgiftcode'))->withInput()->withErrors($validator->errors());
                break;
            case -3:
                $validator->errors()->add('giftcodeid', Lang::get('messages.familydontExists'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.controlpanel.panelgiftcode'))->withInput()->withErrors($validator->errors());
                break;
            case -4:
                $validator->errors()->add('giftcodeid', Lang::get('messages.giftcodeidhistory'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.controlpanel.panelgiftcode'))->withInput()->withErrors($validator->errors());
                break;
            case -5:
                $validator->errors()->add('giftcodeid', Lang::get('messages.giftcodeidhistory'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.controlpanel.panelgiftcode'))->withInput()->withErrors($validator->errors());
                break;
            case -1000:
                $validator->errors()->add('giftcodeid', Lang::get('messages.userNotFound'));
                return $request->wantsJson()
                ? response()->json(['resultCode' => -1002, 'resultMsg' => ['message' => '', 'errors' => $validator->errors()], 'resultData' => null,'returnUrl' => '' ], 400)
                : redirect(route('gamepanel.controlpanel.panelgiftcode'))->withInput()->withErrors($validator->errors());
                break;
        }

        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.giftcodeidsuccess')]);

        return $request->wantsJson()
        ? response()->json(['resultCode' => 0, 'resultMsg' => null, 'resultData' => $user['data'], 'returnUrl' => '' ], 200)
        : redirect()->route('gamepanel.controlpanel.panelgiftcode');
    }
}
