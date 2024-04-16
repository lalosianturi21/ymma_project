<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\Kemanusiaan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\File;

class KemanusiaanController extends Controller
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
            $kemanusiaan = Kemanusiaan::select('id', 'slug', 'title', 'subtitle', 'konten', 'gambar1', 'gambar2', 'gambar3')->where('title', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($kemanusiaan) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $kemanusiaan = Kemanusiaan::select('id', 'slug', 'title', 'subtitle', 'konten', 'gambar1', 'gambar2', 'gambar3')->latest()->paginate(10);
        }

        return view('admin/kemanusiaan/index', compact('kemanusiaan', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/kemanusiaan/create', compact('footer'));
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
            'konten' => 'required',
            'gambar1' => 'required|mimes:jpg,jpeg,png,webp',
            'gambar2' => 'required|mimes:jpg,jpeg,png,webp',
            'gambar3' => 'required|mimes:jpg,jpeg,png,webp',
        ]);

        $gambar1 = time() . '-' . $request->gambar1->getClientOriginalName();
        $request->gambar1->move('upload/kemanusiaan', $gambar1);

        $gambar2 = time() . '-' . $request->gambar2->getClientOriginalName();
        $request->gambar2->move('upload/kemanusiaan', $gambar2);
    
        // Unggah gambar ketiga
        $gambar3 = time() . '-' . $request->gambar3->getClientOriginalName();
        $request->gambar3->move('upload/kemanusiaan', $gambar3);

        Kemanusiaan::create([
            'gambar1' => $gambar1,
            'gambar2' => $gambar2,
            'gambar3' => $gambar3,
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'konten' => $request->konten,
            'slug' => Str::slug($request->title, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/kemanusiaan');
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
        $kemanusiaan = Kemanusiaan::select('id', 'title', 'subtitle', 'konten', 'gambar1', 'gambar2', 'gambar3', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/kemanusiaan/show', compact('kemanusiaan', 'footer'));
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
        $kemanusiaan = Kemanusiaan::select('id', 'title', 'subtitle', 'konten', 'gambar1', 'gambar2', 'gambar3')->whereId($id)->firstOrFail();
        return view('admin/kemanusiaan/edit', compact('kemanusiaan', 'footer'));
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
            'konten' => 'required',
            'gambar1' => 'mimes:jpg,jpeg,png',
            'gambar2' => 'mimes:jpg,jpeg,png',
            'gambar3' => 'mimes:jpg,jpeg,png',
        ]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle,
            'konten' => $request->konten,
            'slug' => Str::slug($request->title, '-'),
        ];

        $kemanusiaan = Kemanusiaan::select('gambar1', 'gambar2', 'gambar3', 'id')->whereId($id)->first();
        if ($request->gambar1) {
            File::delete('upload/kemanusiaan/' .$kemanusiaan->gambar1);

            $gambar1 = time() . '-' . $request->gambar1->getClientOriginalName();
            $request->gambar1->move('upload/kemanusiaan', $gambar1);

            $data['gambar1'] = $gambar1;
        }

        if ($request->gambar2) {
            File::delete('upload/kemanusiaan/' .$kemanusiaan->gambar2);

            $gambar2 = time() . '-' . $request->gambar2->getClientOriginalName();
            $request->gambar2->move('upload/kemanusiaan', $gambar2);

            $data['gambar2'] = $gambar2;
        }

        if ($request->gambar3) {
            File::delete('upload/kemanusiaan/' .$kemanusiaan->gambar3);

            $gambar3 = time() . '-' . $request->gambar3->getClientOriginalName();
            $request->gambar3->move('upload/kemanusiaan', $gambar3);

            $data['gambar3'] = $gambar3;
        }

        $kemanusiaan->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/kemanusiaan');
    }

    public function konfirmasi($id)
    {
        alert()->question('Peringatan !', 'Anda yakin akan menghapus data ?')
        ->showConfirmButton('<a href="/kemanusiaan/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/kemanusiaan');
    }

    public function delete($id)
    {
        $kemanusiaan = Kemanusiaan::select('gambar1', 'gambar2', 'gambar3', 'id')->whereId($id)->firstOrFail();
    
        // Hapus gambar 1
        if (!empty($kemanusiaan->gambar1)) {
            File::delete('upload/kemanusiaan/' . $kemanusiaan->gambar1);
        }
    
        // Hapus gambar 2
        if (!empty($kemanusiaan->gambar2)) {
            File::delete('upload/kemanusiaan/' . $kemanusiaan->gambar2);
        }
    
        // Hapus gambar 3
        if (!empty($kemanusiaan->gambar3)) {
            File::delete('upload/kemanusiaan/' . $kemanusiaan->gambar3);
        }
    
        // Hapus entri kemanusiaan setelah menghapus gambar
        $kemanusiaan->delete();
    
        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/kemanusiaan');
    }
}
