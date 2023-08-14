<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Hash;

class UsersController extends Controller
{
    public function index(request $request)
    {

        $keyword = $request->keyword;
            return view('dashboard.users.index', [
                'users' =>User::where('id', '!=', \Auth::user()->id)->filter(request(['keyword']))
                ->paginate(20)->withQueryString()
                // 'users' =>User::Where('nama_poktan', 'LIKE', '%'.$keyword.'%')
                // ->orWhere('id_poktan', 'LIKE', '%'.$keyword.'%')
                // ->orWhere('kelurahan', 'LIKE', '%'.$keyword.'%')
                // ->orWhere('kecamatan', 'LIKE', '%'.$keyword.'%')
                // ->orWhere('NIK', 'LIKE', '%'.$keyword.'%')
                // ->orWhere('ketua', 'LIKE', '%'.$keyword.'%')
                // ->orWhere('alamat_sekretariat', 'LIKE', '%'.$keyword.'%')
                // ->paginate(20)
            ]);
    }

    public function create()
    {
        return view('dashboard.users.create',[

        ]);


    }
    public function store(Request $request)
    {

        // $request->validate([
        //     'title'         => 'required|max:255',
        //     'author'        => 'required',
        //     'slug'          => 'required',
        //     'category_id'   => 'required',
        //     'image'         => 'image|file|max:2048',
        //     'dokumen'       => 'mimes:pdf',
        //     'body'          => 'required',
        // ]);

        // $title          = $request->title;
        // $author          = $request->author;
        // $slug           = $request->slug;
        // $category_id    = $request->category_id;
        // $body           = $request->body;


        // $data = new User();
        // $data->user_id      = Auth::id();
        // $data->nomorinduk    = Auth::user()->nomorinduk;
        // $data->prodi     = Auth::user()->prodi;
        // $data->title        = $title;
        // $data->author        = $author;
        // $data->slug         = $slug;
        // $data->category_id  = $category_id;
        // $data->image        = $image;
        // $data->dokumen        = $dokumen;
        // $data->excerpt      = Str::limit(strip_tags($request->body), 200);
        // // $data->excerpt      = '-';
        // $data->body         = $body;
        // $data->save();

        // return redirect('/dashboard/posts')->with('success', 'Post telah berhasil ditambahkan');
    }

    // public function show($id)
    // {
    //     $user = User::find($id);
    //     return view('dashboard.users.show',['user' => $user

    //     ]);


    // }
}
