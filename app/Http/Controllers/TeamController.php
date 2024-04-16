<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class TeamController extends Controller
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
            $team = Team::select('id', 'slug', 'nama_anggota', 'posisi', 'quotes', 'gambar')->where('nama_anggota', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($team) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $team = Team::select('id', 'slug', 'nama_anggota', 'posisi', 'quotes', 'gambar')->latest()->paginate(10);
        }

        return view('admin/team/index', compact('team', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/team/create', compact('footer'));
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
            'nama_anggota' => 'required',
            'posisi' => 'required',
            'quotes' => 'required',
            'gambar' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $gambar = time() . '-' . $request->gambar->getClientOriginalName();
        $request->gambar->move('upload/team', $gambar);

        Team::create([
            'gambar' => $gambar,
            'nama_anggota' => $request->nama_anggota,
            'posisi' => $request->posisi,
            'quotes' => $request->quotes,
            'slug' => Str::slug($request->nama_anggota, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/team');
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
        $team = Team::select('id', 'nama_anggota', 'posisi', 'quotes', 'gambar', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/team/show', compact('team', 'footer'));
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
        $team = Team::select('id', 'nama_anggota', 'posisi', 'quotes', 'gambar')->whereId($id)->firstOrFail();
        return view('admin/team/edit', compact('team', 'footer'));
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
            'nama_anggota' => 'required',
            'posisi' => 'required',
            'quotes' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png,webp',
        ]);

        $data = [
            'nama_anggota' => $request->nama_anggota,
            'posisi' => $request->posisi,
            'quotes' => $request->quotes,
            'slug' => Str::slug($request->nama_anggota, '-'),
        ];

        $team = Team::select('gambar', 'id')->whereId($id)->first();
        if ($request->gambar) {
            File::delete('upload/team/' .$team->gambar);

            $gambar = time() . '-' . $request->gambar->getClientOriginalName();
            $request->gambar->move('upload/team', $gambar);

            $data['gambar'] = $gambar;
        }

        $team->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/team');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/team/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/team');
    }

    public function delete($id)
    {
        $team = Team::select('gambar', 'id')->whereId($id)->firstOrFail();
        File::delete('upload/team/' . $team->gambar);
        $team->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/team');
    }
}
