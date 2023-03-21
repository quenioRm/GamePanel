<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;

class ControlPanelNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('AdminPermission');
    }

    public function List()
    {
        $items =  News::orderBy('created_at', 'desc')->paginate(5)->toArray();

        return view('controlpanel.pages.news.index', ['items' => $items]);
    }

    public function Add()
    {
        return view('controlpanel.pages.news.add');
    }

    public function AddPost(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'language' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required|image|mimes:png,jpg,jpeg|max:2048'
        ], [], [
            'category' => 'categoria',
            'language' => 'idioma',
            'name' => 'nome',
            'description' => 'descrição',
            'image_url' => 'imagem'
        ]);

        dd($request->all());
    }
}
