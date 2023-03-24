<?php

namespace App\Http\Controllers\ControlPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\News;
use Illuminate\Support\Facades\Validator;
use Session;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Storage;

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

        return view('controlpanel.pages.news.includes.indexPaginate', ['items' => $items]);
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
            'image_url' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'topnotice' => 'required'
        ], [], [
            'category' => 'categoria',
            'language' => 'idioma',
            'name' => 'nome',
            'description' => 'descrição',
            'image_url' => 'imagem',
            'topnotice' => 'destaque'
        ]);


        if(!$validator->passes())
            return redirect(route('gamepanel.controlpanel.news.add'))->withInput()->withErrors($validator->errors());

        $result = News::MakeNew($request);

        Session::flash('message', ['type' => 'success', 'text' => 'Criado com sucesso!']);

        return back();
    }

    public function Edit($id)
    {
        $item = News::find($id);
        if($item)
            return view('controlpanel.pages.news.edit', ['item' => $item]);

        return back();
    }

    public function EditPost($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'category' => 'required',
            'language' => 'required',
            'name' => 'required',
            'description' => 'required',
            'image_url' => 'required|image|mimes:png,jpg,jpeg|max:2048',
            'topnotice' => 'required'
        ], [], [
            'category' => 'categoria',
            'language' => 'idioma',
            'name' => 'nome',
            'description' => 'descrição',
            'image_url' => 'imagem',
            'topnotice' => 'destaque'
        ]);


        if(!$validator->passes())
            return redirect(route('gamepanel.controlpanel.news.add'))->withInput()->withErrors($validator->errors());

        $result = News::makeEdit($id, $request);

        Session::flash('message', ['type' => 'success', 'text' => 'Atualizado com sucesso!']);

        return back();
    }

    public function Delete($id)
    {
        $notice = News::find($id);

        Storage::disk('news')->delete($notice->image_url);

        $notice->delete();

        Session::flash('message', ['type' => 'success', 'text' => 'Deletado com sucesso!']);

        return back();
    }
}
