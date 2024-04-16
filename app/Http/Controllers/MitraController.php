<?php

namespace App\Http\Controllers;

use App\Models\Mitra;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class MitraController extends Controller
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
            $mitra = Mitra::select('id', 'slug', 'nama_mitra', 'gambar')->where('nama_mitra', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($mitra) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $mitra = Mitra::select('id', 'slug', 'nama_mitra', 'gambar')->latest()->paginate(10);
        }

        return view('admin/mitra/index', compact('mitra', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/mitra/create', compact('footer'));
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
            'nama_mitra' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $gambar = time() . '-' . $request->gambar->getClientOriginalName();
        $request->gambar->move('upload/mitra', $gambar);

        Mitra::create([
            'gambar' => $gambar,
            'nama_mitra' => $request->nama_mitra,
            'slug' => Str::slug($request->nama_mitra, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/mitra');
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
        $mitra = Mitra::select('id', 'nama_mitra', 'gambar', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/mitra/show', compact('mitra', 'footer'));
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
        $mitra = Mitra::select('id', 'nama_mitra', 'gambar')->whereId($id)->firstOrFail();
        return view('admin/mitra/edit', compact('mitra', 'footer'));
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
            'nama_mitra' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'nama_mitra' => $request->nama_mitra,
            'posisi' => $request->posisi,
            'quotes' => $request->quotes,
            'slug' => Str::slug($request->nama_mitra, '-'),
        ];

        $mitra = Mitra::select('gambar', 'id')->whereId($id)->first();
        if ($request->gambar) {
            File::delete('upload/mitra/' .$mitra->gambar);

            $gambar = time() . '-' . $request->gambar->getClientOriginalName();
            $request->gambar->move('upload/mitra', $gambar);

            $data['gambar'] = $gambar;
        }

        $mitra->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/mitra');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/mitra/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/mitra');
    }

    public function delete($id)
    {
        $mitra = Mitra::select('gambar', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/mitra/' . $mitra->gambar);
        $mitra->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/mitra');
    }
}
