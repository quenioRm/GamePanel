<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Image;
use Illuminate\Support\Facades\Storage;

class UserAvatar extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "users_avatar";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'user_id',
        'avatar'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function MakeNewAvatar($input)
    {
        try {
            $user = User::find(Auth::user()->id)->first();
            if($user){

                // $newName = time() . '.' . $input->avatar->extension();
                // $upload = $input->avatar->storeAs('user/avatar/'. Auth::user()->id . '/', $newName);

                $image = $input->file('avatar');
                $input['avatar'] = time(). '.' . $input->avatar->extension();

                if(!Storage::exists('app/public/user/avatar/' . Auth::user()->id)){
                    Storage::makeDirectory('app/public/user/avatar/' . Auth::user()->id);
                }

                $destinationPath = storage_path('app/public/user/avatar/') . Auth::user()->id .'/'. time(). '.' . $input->avatar->extension();

                $imgFile = Image::make($image->getRealPath());
                // $imgFile->resize(200, 200, function ($constraint) {
                //     $constraint->upsize();
                // })->save($destinationPath);

                $image->storeAs('public/user/avatar/', Auth::user()->id .'/'. time(). '.' . $input->avatar->extension());

                $avatar = new UserAvatar();
                $avatar->user_id = Auth::user()->id;
                $avatar->avatar = time(). '.' . $input->avatar->extension();
                $avatar->save();

                return 0;
            }

            return -1;

        } catch (\Exception $e){

            throw new \Exception($e);
            return -1;
        }
    }
}
