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
            $program = Program::select('id', 'slug', 'title', 'subtitle', 'content', 'gambar1', 'gambar2', 'gambar3', 'icon_program')->where('title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($program) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $program = Program::select('id', 'slug', 'title', 'subtitle', 'content', 'gambar1', 'gambar2', 'gambar3', 'icon_program')->latest()->paginate(10);
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
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'gambar1' => 'required|mimes:jpg,jpeg,png,webp',
            'gambar2' => 'required|mimes:jpg,jpeg,png,webp',
            'gambar3' => 'required|mimes:jpg,jpeg,png,webp',
            'icon_program' => 'required',
        ]);

        $gambar1 = time() . '-' . $request->gambar1->getClientOriginalName();
        $request->gambar1->move('upload/program', $gambar1);

        $gambar2 = time() . '-' . $request->gambar2->getClientOriginalName();
        $request->gambar2->move('upload/program', $gambar2);
    
        // Unggah gambar ketiga
        $gambar3 = time() . '-' . $request->gambar3->getClientOriginalName();
        $request->gambar3->move('upload/program', $gambar3);

        Program::create([
            'gambar1' => $gambar1,
            'gambar2' => $gambar2,
            'gambar3' => $gambar3,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'icon_program' => $request->icon_program,
            'slug' => Str::slug($request->title, '-'),
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
        $program = Program::select('id', 'title', 'subtitle', 'content', 'gambar1', 'gambar2', 'gambar3', 'icon_program', 'created_at')->whereId($id)->firstOrFail();
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
        $program = Program::select('id', 'title', 'subtitle', 'content', 'gambar1', 'gambar2', 'gambar3', 'icon_program')->whereId($id)->firstOrFail();
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
            'title' => 'required',
            'subtitle' => 'required',
            'content' => 'required',
            'icon_program' => 'required',
            'gambar1' => 'mimes:jpg,jpeg,png',
            'gambar2' => 'mimes:jpg,jpeg,png',
            'gambar3' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'content' => $request->content,
            'icon_program' => $request->icon_program,
            'slug' => Str::slug($request->title, '-'),
        ];

        $program = Program::select('gambar1', 'gambar2', 'gambar3', 'id')->whereId($id)->first();
        if ($request->gambar1) {
            File::delete('upload/program/' .$program->gambar1);

            $gambar1 = time() . '-' . $request->gambar1->getClientOriginalName();
            $request->gambar1->move('upload/program', $gambar1);

            $data['gambar1'] = $gambar1;
        }

        if ($request->gambar2) {
            File::delete('upload/program/' .$program->gambar2);

            $gambar2 = time() . '-' . $request->gambar2->getClientOriginalName();
            $request->gambar2->move('upload/program', $gambar2);

            $data['gambar2'] = $gambar2;
        }

        if ($request->gambar3) {
            File::delete('upload/program/' .$program->gambar3);

            $gambar3 = time() . '-' . $request->gambar3->getClientOriginalName();
            $request->gambar3->move('upload/program', $gambar3);

            $data['gambar3'] = $gambar3;
        }

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
        $program = Program::select('gambar1', 'gambar2', 'gambar3', 'id')->whereId($id)->firstOrFail();
    
        // Hapus gambar 1
        if (!empty($program->gambar1)) {
            File::delete('upload/program/' . $program->gambar1);
        }
    
        // Hapus gambar 2
        if (!empty($program->gambar2)) {
            File::delete('upload/program/' . $program->gambar2);
        }
    
        // Hapus gambar 3
        if (!empty($program->gambar3)) {
            File::delete('upload/program/' . $program->gambar3);
        }
    
        // Hapus entri program setelah menghapus gambar
        $program->delete();
    
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/program');
    }
    



}
