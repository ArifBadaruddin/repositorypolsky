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
        return view('dashbaord.users.create',[

        ]);


    }
}
