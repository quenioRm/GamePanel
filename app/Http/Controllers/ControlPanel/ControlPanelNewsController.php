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
        dd($request->all());
    }
}
