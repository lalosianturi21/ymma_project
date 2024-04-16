<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class ProgramController extends Controller
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
    public function index () 
    {
        $footer = $this->footer;

        $search = '';
        if (request()->search) {
            $program = Program::select('id', 'slug', 'heading', 'sub_heading', 'title1','title2','title3', 'subtitle1','subtitle2', 'subtitle3', 'icon_program1', 'icon_program2', 'icon_program3')->where('heading', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($program) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $program = Program::select('id', 'slug', 'heading', 'sub_heading', 'title1','title2','title3', 'subtitle1','subtitle2', 'subtitle3', 'icon_program1', 'icon_program2', 'icon_program3')->latest()->paginate(10);
        }

        return view('admin/program/index', compact('program', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/program/create', compact('footer'));
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
            'heading' => 'required',
            'sub_heading' => 'required',
            'title1' => 'required',
            'title2' => 'required',
            'title3' => 'required',
            'subtitle1' => 'required',
            'subtitle2' => 'required',
            'subtitle3' => 'required',
            'icon_program1' => 'required',
            'icon_program2' => 'required',
            'icon_program3' => 'required',
        ]);


        Program::create([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'subtitle1' => $request->subtitle1,
            'subtitle2' => $request->subtitle2,
            'subtitle3' => $request->subtitle3,
            'icon_program1' => $request->icon_program1,
            'icon_program2' => $request->icon_program2,
            'icon_program3' => $request->icon_program3,
            'slug' => Str::slug($request->heading, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/program');
    }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $footer = $this->footer;
        $program = Program::select('id', 'heading', 'sub_heading', 'title1','title2','title3', 'subtitle1','subtitle2', 'subtitle3', 'icon_program1', 'icon_program2', 'icon_program3', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/program/show', compact('program', 'footer'));
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
        $program = Program::select('id', 'heading', 'sub_heading', 'title1','title2','title3', 'subtitle1','subtitle2', 'subtitle3', 'icon_program1', 'icon_program2', 'icon_program3')->whereId($id)->firstOrFail();
        return view('admin/program/edit', compact('program', 'footer'));
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
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'subtitle1' => $request->subtitle1,
            'subtitle2' => $request->subtitle2,
            'subtitle3' => $request->subtitle3,
            'icon_program1' => $request->icon_program1,
            'icon_program2' => $request->icon_program2,
            'icon_program3' => $request->icon_program3,
        ]);

        $data = [
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'title1' => $request->title1,
            'title2' => $request->title2,
            'title3' => $request->title3,
            'subtitle1' => $request->subtitle1,
            'subtitle2' => $request->subtitle2,
            'subtitle3' => $request->subtitle3,
            'icon_program1' => $request->icon_program1,
            'icon_program2' => $request->icon_program2,
            'icon_program3' => $request->icon_program3,
            'slug' => Str::slug($request->heading, '-'),
        ];

        $program = Program::select('id')->whereId($id)->first();
        $program->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/program');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/program/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/program');
    }

    public function delete($id)
    {
        $program = Program::select('id')->whereId($id)->firstOrFail();
    
        // Hapus entri program setelah menghapus gambar
        $program->delete();
    
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/program');
    }
    



}
