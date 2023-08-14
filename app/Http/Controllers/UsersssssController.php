<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;

class UsersssssController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.users.create',[

        ]);
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
            'username'        => 'required',
            'nomorinduk'         => 'required|max:255',
            'nama'        => 'required',
            'status'          => 'required',
            'prodi'   => 'required',
        ]);

        $username          = $request->username;
        $nomorinduk          = $request->nomorinduk;
        $nama          = $request->nama;
        $status           = $request->status;
        $prodi    = $request->prodi;


        $data = new User();
        $data->username        = $username;
        $data->nomorinduk        = $nomorinduk;
        $data->nama        = $nama;
        $data->status         = $status;
        $data->prodi  = $prodi;
        $data->password  = Hash::make('password');
        // $data->excerpt      = '-';
     
        $data->save();

        return redirect('/dashboard/users')->with('success', 'Post telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
            return view('dashboard.users.show',['user' => $user
    
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('dashboard.users.edit',['user' =>$user

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
             $user = User::find($id);
            $request->validate([
            'username'        => 'required',
            'nomorinduk'         => 'required|max:255',
            'nama'        => 'required',
            'status'          => 'required',
            'prodi'   => 'required',
        ]);

        $username          = $request->username;
        $nomorinduk          = $request->nomorinduk;
        $nama          = $request->nama;
        $status           = $request->status;
        $prodi    = $request->prodi;


        $data = User::find($user->id);
        $data->username        = $username;
        $data->nomorinduk        = $nomorinduk;
        $data->nama        = $nama;
        $data->status         = $status;
        $data->prodi  = $prodi;
        // $data->excerpt      = '-';
     
        $data->save();
        return redirect('/dashboard/users')->with('success', 'Post telah berhasil ditambahkan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        User::destroy($user->id); 
        return redirect('/dashboard/users')->with('success', 'Post telah dihapus');
    }
}
