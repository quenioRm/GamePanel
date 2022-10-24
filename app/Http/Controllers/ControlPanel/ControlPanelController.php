<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Lang;
use Session;
use App\Models\UserAvatar;

class ControlPanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AccountInfoForm()
    {
        return view('controlpanel.pages.accountinfo', ['account' => User::find(Auth::user()->id)]);
    }

    public function ProfileAccountForm()
    {
        // $data = User::find(Auth::user()->id)->with('useravatar');
        $data = User::where('id', Auth::user()->id)->with('useravatar')->get();
        // dd($data->toArray());
        return view('controlpanel.pages.profileaccount', ['account' => $data->toArray()]);
    }

    public function ProfileAccountFormSubmit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:users|min:5|max:16|alpha_dash'
        ], [], [
            'name' =>  Lang::get('messages.name'),
        ]);

        if(!$validator->passes()){
            return redirect(route('controlpanel.profileaccount'))->withInput()->withErrors($validator->errors());
        }

        $user = User::UpdateUsername($request['name']);

        Session::flash('message', ['type' => 'success', 'text' => Lang::get('messages.accountInfoUpdateSucess')]);

        return redirect(route('controlpanel.profileaccount'));
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
}
