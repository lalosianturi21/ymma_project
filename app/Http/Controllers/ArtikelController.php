<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Footer;
use App\Models\Program;
use App\Models\Keagamaan;
use App\Models\Kemanusiaan;
use App\Models\Kategori;
use App\Models\Like;
use App\Models\Logo;
use App\Models\Content;
use App\Models\Team;
use App\Models\Mitra;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Rekomendasi;
use App\Models\DataTahunan;
use App\Models\Tag;
use App\Models\Tentang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    public function __construct()
    {
        $this->footer = Footer::select('konten')->first();
    }

    public function index()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $banner = Banner::select('slug', 'sampul', 'judul', 'konten')->latest()->get();
        $program = Program::select('slug', 'heading', 'sub_heading', 'title1','title2','title3', 'subtitle1','subtitle2', 'subtitle3', 'icon_program1', 'icon_program2', 'icon_program3')->latest()->first();
        $keagamaan = Keagamaan::select('slug', 'title')->latest()->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        $profile = Profile::select('slug', 'heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5', 'program6',  'link_yt')->latest()->first();
        $content = Content::select('slug', 'title', 'sub_title', 'nama_button', 'link_button')->latest()->first();
        $team = Team::select('slug', 'nama_anggota', 'gambar', 'posisi', 'quotes')->latest()->get();
        $mitra = Mitra::select('slug', 'nama_mitra', 'gambar')->latest()->get();
        $datatahunan = DataTahunan::select('slug', 'tahun', 'icon1', 'icon2', 'icon3', 'total_data1', 'total_data2', 'total_data3', 'nama_data1','nama_data2', 'nama_data3')->latest()->get();

        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('judul', 'LIKE', '%'. request()->search .'%')->latest()->paginate(6);

            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->latest()->paginate(6);
            $search = '';
        }

        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $home = true;
        $author = User::getAdminPenulis();
        $rekomendasi = Rekomendasi::select('id_post')->latest()->paginate(3);
        return view('artikel/index', compact('artikel', 'kemanusiaan', 'kategori','banner', 'content', 'keagamaan','mitra', 'team', 'program','datatahunan', 'logo', 'profile', 'footer', 'home', 'author', 'search', 'rekomendasi'));
    }

    public function search(Request $request)
    {
        $query = $request->input('query');
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        // Lakukan pencarian artikel berdasarkan query
        $artikel = Post::where('judul', 'like', "%$query%")->get();

        // Kirim data pencarian ke tampilan
        return view('artikel/search', compact('footer', 'logo','artikel', 'keagamaan', 'kemanusiaan', 'query'));
    }

    

    public function artikel($slug)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $recentPosts = Post::where('slug', '!=', $slug)->limit(3)->get();
        $artikel = Post::select('id', 'judul', 'konten', 'id_kategori', 'created_at', 'sampul', 'id_user')->where('slug', $slug)->firstOrFail();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $tag = Tag::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $author = User::getAdminPenulis();
        $like = Like::where('id_post', $artikel->id)->count();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        return view('artikel/artikel', compact('artikel', 'kategori', 'logo', 'footer', 'author', 'like' , 'recentPosts', 'tag', 'keagamaan', 'kemanusiaan'));
    }

    public function team($slug)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        $team = Team::select('id', 'nama_anggota', 'gambar', 'posisi', 'created_at', 'quotes')->where('slug', $slug)->firstOrFail();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        return view('artikel/team', compact('team', 'logo', 'footer', 'kemanusiaan', 'keagamaan'));
    }

    public function artikelall()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
    
        // Menggunakan paginate untuk mengambil data artikel
        $artikelall = Post::select('id', 'judul', 'konten', 'id_kategori', 'created_at', 'sampul', 'id_user')->paginate(8);
    
        $author = User::getAdminPenulis();
        return view('artikel/artikelall', compact('artikelall', 'kategori', 'logo', 'footer', 'author'));
    }

    public function kategori($slug)
{
    // Mengambil data footer dan logo
    $footer = $this->footer;
    $logo = Logo::select('gambar')->first();
    

    // Mengambil kategori yang sesuai berdasarkan $slug
    $kategori_dipilih = Kategori::where('slug', $slug)->firstOrFail();

    // Mencari artikel berdasarkan kategori yang dipilih
    $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')
        ->whereHas('kategori', function ($query) use ($slug) {
            $query->where('slug', $slug);
        })
        ->latest()
        ->paginate(6);

    // Mengecek apakah ada pencarian
    $search = request()->search;
    if ($search) {
        $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')
            ->where('judul', 'LIKE', '%' . $search . '%')
            ->whereHas('kategori', function ($query) use ($slug) {
                $query->where('slug', $slug);
            })
            ->latest()
            ->paginate(6);

        if ($artikel->isEmpty()) {
            request()->session()->flash('search', 'Post yang anda cari tidak ada');
        }
    }
    

    

    // Mengambil data kategori (jangan gunakan variabel yang sama dengan yang digunakan sebelumnya)
    $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
    

    // Mengambil data author
    $author = User::getAdminPenulis();

    // Menampilkan tampilan dengan data yang diperlukan
    return view('artikel/index', compact('artikel', 'kategori', 'logo', 'footer', 'kategori_dipilih', 'author', 'search'));
}



    public function paginate($items, $perPage = 6, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }

    public function banner($slug)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $banner = Banner::select('id', 'judul', 'konten', 'created_at', 'sampul')->where('slug', $slug)->firstOrFail();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $author = User::getAdminPenulis();
        return view('artikel/banner', compact('banner', 'kategori', 'logo', 'footer', 'author'));
    }

    public function keagamaan()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('judul', 'LIKE', '%'. request()->search .'%')->latest()->paginate(6);

            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->latest()->paginate(6);
            $search = '';
        }

        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        return view('artikel/keagamaan', compact('logo', 'footer', 'keagamaan', 'artikel', 'search', 'kemanusiaan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function kemanusiaan()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        return view('artikel/kemanusiaan', compact('logo', 'footer', 'keagamaan', 'kemanusiaan'));
    }

    public function sosial()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        return view('artikel/sosial', compact('logo', 'footer', 'keagamaan', 'kemanusiaan'));
    }

    

    public function history()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        return view('artikel/history', compact( 'logo', 'footer', 'keagamaan', 'kemanusiaan'));
    }


    public function vision()
    {
        $footer = $this->footer;
        $banner1 = Banner::select('sampul', 'judul', 'konten')->find(1);
        $banner2 = Banner::select('sampul', 'judul', 'konten')->find(2);
        $banner3 = Banner::select('sampul', 'judul', 'konten')->find(3);
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        $logo = Logo::select('gambar')->first();
        return view('artikel/vision', compact( 'logo', 'footer', 'banner1','banner2', 'banner3', 'keagamaan', 'kemanusiaan'));
    }

    public function struktur()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        return view('artikel/struktur', compact( 'logo', 'footer', 'keagamaan','kemanusiaan'));
    }

    

    public function tentang()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $tentang = Tentang::select('konten', 'facebook', 'twitter', 'instagram')->first();
        $author = User::getAdminPenulis();
        return view('artikel/tentang', compact('tentang', 'kategori', 'logo', 'footer', 'author'));
    }

    public function profile()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $profile = Profile::select('slug', 'heading', 'sub_heading', 'nama', 'description1', 'description2', 'program1', 'program2', 'program3', 'program4', 'program5', 'program6',  'link_yt')->latest()->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        return view('artikel/profile', compact( 'profile','logo', 'footer', 'keagamaan', 'kemanusiaan'));
    }

    public function cabang()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        return view('artikel/cabang', compact( 'logo', 'footer', 'keagamaan', 'kemanusiaan'));
    }

    public function komunitas()
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();
        $keagamaan = Keagamaan::select('slug', 'title', 'subtitle', 'gambar1','gambar2','gambar3', 'konten')->first();
        $kemanusiaan = Kemanusiaan::select('slug', 'title')->latest()->first();
        return view('artikel/komunitas', compact( 'logo', 'footer', 'keagamaan', 'kemanusiaan'));
    }


    public function author($id)
    {
        $footer = $this->footer;
        $logo = Logo::select('gambar')->first();

        request()->session()->forget('search');
        if (request()->search) {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('id_user', $id)->where('judul', 'LIKE', '%' . request()->search . '%')->latest()->paginate(6);
            if (count($artikel) == 0) {
                request()->session()->flash('search', 'Post yang anda cari tidak ada');
            }
            $search = request()->search;
        } else {
            $artikel = Post::select('sampul', 'judul', 'slug', 'created_at')->where('id_user', $id)->latest()->paginate(6);
            $search = '';
        }

        $kategori = Kategori::select('slug', 'nama')->orderBy('nama', 'asc')->get();
        $author_dipilih = User::select('name')->whereId($id)->firstOrFail();
        $author = User::getAdminPenulis();
        return view('artikel/index', compact('artikel', 'kategori', 'logo', 'footer', 'author_dipilih', 'author', 'search'));
    }
}
