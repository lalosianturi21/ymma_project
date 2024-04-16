<?php

namespace App\Http\Controllers;

use App\Models\Footer;
use App\Models\DataTahunan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class DataTahunanController extends Controller
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
            $datatahunan = DataTahunan::select('id', 'tahun', 'icon1', 'icon2', 'icon3', 'total_data1', 'total_data2', 'total_data3', 'nama_data1','nama_data2', 'nama_data3', 'slug')->where('tahun', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($datatahunan) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                ');
            }
        } else {
            $datatahunan = DataTahunan::select('id', 'tahun', 'icon1', 'icon2', 'icon3', 'total_data1', 'total_data2', 'total_data3', 'nama_data1','nama_data2', 'nama_data3', 'slug')->latest()->paginate(10);
        }

        return view('admin/datatahunan/index', compact('datatahunan', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/datatahunan/create', compact('footer'));
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
            'tahun' => 'required',
            'icon1' => 'required',
            'icon2' => 'required',
            'icon3' => 'required',
            'total_data1' => 'required',
            'total_data2' => 'required',
            'total_data3' => 'required',
            'nama_data1' => 'required',
            'nama_data2' => 'required',
            'nama_data3' => 'required',
        ]);

        DataTahunan::create([
            'tahun' => $request->tahun,
            'icon1' => $request->icon1,
            'icon2' => $request->icon2,
            'icon3' => $request->icon3,
            'total_data1' => $request->total_data1,
            'total_data2' => $request->total_data2,
            'total_data3' => $request->total_data3,
            'nama_data1' => $request->nama_data1,
            'nama_data2' => $request->nama_data2,
            'nama_data3' => $request->nama_data3,
            'slug' => Str::slug($request->tahun, '-')
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil ditambahkan
            </div>
        ');
        return redirect('/datatahunan');
    }

    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $datatahunan = DataTahunan::select('id', 'tahun', 'icon1', 'icon2', 'icon3', 'total_data1', 'total_data2', 'total_data3', 'nama_data1','nama_data2', 'nama_data3')->whereId($id)->first();
        return view('admin/datatahunan/edit', compact('datatahunan', 'footer'));
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
            'tahun' => 'required',
            'icon1' => 'required',
            'icon2' => 'required',
            'icon3' => 'required',
            'total_data1' => 'required',
            'total_data2' => 'required',
            'total_data3' => 'required',
            'nama_data1' => 'required',
            'nama_data2' => 'required',
            'nama_data3' => 'required',
        ]);

        DataTahunan::whereId($id)->update([
            'tahun' => $request->tahun,
            'icon1' => $request->icon1,
            'icon2' => $request->icon2,
            'icon3' => $request->icon3,
            'total_data1' => $request->total_data1,
            'total_data2' => $request->total_data2,
            'total_data3' => $request->total_data3,
            'nama_data1' => $request->nama_data1,
            'nama_data2' => $request->nama_data2,
            'nama_data3' => $request->nama_data3,
            'slug' => Str::slug($request->tahun, '-')
        ]);

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil diubah
            </div>
        ');
        return redirect('/datatahunan');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        DataTahunan::whereId($id)->delete();

        $request->session()->flash('sukses', '
            <div class="alert alert-success" role="alert">
                Data berhasil dihapus
            </div>
        ');
        return redirect('/datatahunan');
    }




}
