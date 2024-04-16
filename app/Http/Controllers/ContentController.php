<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class ContentController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $footer = $this->footer;

        $search = '';
        if (request()->search) {
            $content = Content::select('id', 'slug', 'title', 'sub_title', 'link_button','nama_button')->where('title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($content) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                '); 
            }
        } else {
            $content = Content::select('id', 'slug', 'title', 'sub_title', 'link_button','nama_button')->latest()->paginate(10);
        }
       
        return view('admin/content/index', compact('content', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/content/create', compact('footer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'nama_button' => 'required',
            'link_button' => 'required',
        ]);

        Content::create([
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'nama_button' => $request->nama_button,
            'link_button' => $request->link_button,
            'slug' => Str::slug($request->title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/content');
    }

     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $footer = $this->footer;
        $content = Content::select('id', 'title', 'sub_title', 'nama_button', 'link_button')->whereId($id)->first();
        return view('admin/content/edit', compact('content', 'footer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'nama_button' => 'required',
            'link_button' => 'required',
        ]);

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'nama_button' => $request->nama_button,
            'link_button' => $request->link_button,
            'slug' => Str::slug($request->title, '-'),
        ];

        $content = Content::select('id')->whereId($id)->first();

        $content->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/content');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //    
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/content/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/content');
    }

    public function delete($id)
    {
        $content = Content::select('id')->whereId($id)->firstOrFail();
        $content->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/content');
    }

}
