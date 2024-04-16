<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\Footer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert; 

class ProfileController extends Controller
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
            $profile = Profile::select('id', 'slug', 'heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5', 'program6', 'link_yt')->where('heading', 'LIKE', '%' . request()->search . '%')->latest()->paginate(10);
            $search = request()->search;

            if (count($profile) == 0) {
                request()->session()->flash('search', '
                    <div class="alert alert-success mt-4" role="alert">
                        Data yang anda cari tidak ada
                    </div>
                '); 
            }
        } else {
            $profile = Profile::select('id','slug', 'heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5', 'program6', 'link_yt')->latest()->paginate(10);
        }
       
        return view('admin/profile/index', compact('profile', 'footer', 'search'));
    }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $footer = $this->footer;
        return view('admin/profile/create', compact('footer'));
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
            'nama' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'program1' => 'required',
            'program2' => 'required',
            'program3' => 'required',
            'program5' => 'required',
            'program6' => 'required',
            'link_yt' => 'required',
        ]);

        Profile::create([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'nama' => $request->nama,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'program1' => $request->program1,
            'program2' => $request->program2,
            'program3' => $request->program3,
            'program4' => $request->program4,
            'program5' => $request->program5,
            'program6' => $request->program6,
            'link_yt' => $request->link_yt,
            'slug' => Str::slug($request->heading, '-'),
        ]);

        Alert::success('Sukses', 'Data berhasil ditambahkan');
        return redirect('/profile');
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
        $profile = Profile::select('id', 'heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5', 'program6',  'link_yt', 'created_at')->whereId($id)->firstOrFail();
        return view('admin/profile/show', compact('profile', 'footer'));
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
        $profile = Profile::select('id', 'heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5', 'program6', 'link_yt')->whereId($id)->firstOrFail();
        return view('admin/profile/edit', compact('profile', 'footer'));
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
            'heading' => 'required',
            'sub_heading' => 'required',
            'nama' => 'required',
            'description1' => 'required',
            'description2' => 'required',
            'program1' => 'required',
            'program2' => 'required',
            'program3' => 'required',
            'program5' => 'required',
            'program6' => 'required',
            'link_yt' => 'required',
        ]);

        $data = [
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
            'nama' => $request->nama,
            'description1' => $request->description1,
            'description2' => $request->description2,
            'program1' => $request->program1,
            'program2' => $request->program2,
            'program3' => $request->program3,
            'program4' => $request->program4,
            'program5' => $request->program5,
            'program6' => $request->program6,
            'link_yt' => $request->link_yt,
            'slug' => Str::slug($request->heading, '-'),
        ];

        $profile = Profile::select('id')->whereId($id)->first();

        $profile->update($data);

        Alert::success('Sukses', 'Data berhasil diubah');
        return redirect('/profile');
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
        ->showConfirmButton('<a href="/profile/' . $id . '/delete" class="text-white" style="text-decoration: none"> Hapus</a>', '#3085d6')->toHtml()
        ->showCancelButton('Batal', '#aaa')->reverseButtons();

        return redirect('/profile');
    }

    public function delete($id)
    {
        $profile = Profile::select('id')->whereId($id)->firstOrFail();
        $profile->delete();

        Alert::success('Sukses', 'Data berhasil dihapus');
        return redirect('/profile');
    }

}
