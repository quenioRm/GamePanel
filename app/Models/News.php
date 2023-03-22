<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Image;

class News extends Model
{
    use HasFactory;

    protected $connection = 'web';
    protected $table = "news";
    protected $primaryKey = 'id';
    protected $dates = ['created_at','updated_at'];
    protected $fillable = [
        'category',
        'language',
        'name',
        'description',
        'image_url',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public static function MakeNew($input)
    {
        if(!Storage::exists('public/news/')){
            Storage::makeDirectory('public/news/');
        }

        $fileName = time().'.'.$input->file('image_url')->extension();
        $filePath = $input->file('image_url')->storeAs('news', $fileName, 'public');

        if(Storage::disk('news')->exists($fileName)){
            $notice = new News();
            $notice->category = $input['category'];
            $notice->language = $input['language'];
            $notice->name = $input['name'];
            $notice->description = $input['description'];
            $notice->image_url = $fileName;
            $notice->user_id = Auth::user()->id;
            $notice->save();

            return 0;
        }

        return -1;
    }

    public static function MakeEdit($id, $input)
    {
        if(!Storage::exists('public/news/')){
            Storage::makeDirectory('public/news/');
        }

        $fileName = time().'.'.$input->file('image_url')->extension();
        $filePath = $input->file('image_url')->storeAs('news', $fileName, 'public');

        if(Storage::disk('news')->exists($fileName)){
            $notice = self::find($id);
            $notice->category = $input['category'];
            $notice->language = $input['language'];
            $notice->name = $input['name'];
            $notice->description = $input['description'];
            $notice->image_url = $fileName;
            $notice->user_id = Auth::user()->id;
            $notice->save();

            return 0;
        }

        return -1;
    }

}
