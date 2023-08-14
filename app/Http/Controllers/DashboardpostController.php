<?php

namespace App\Http\Controllers;

use App\Models\post;
use App\Models\category;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardpostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $categories = category::count();
        // $posts = post::count();
        // $users = User::count();

        $keyword = $request->keyword;
        return view('dashboard.posts.index',[
            // untuk memanggil semua post
            'posts' =>post::with('category')
                    ->where('title', 'LIKE', '%'.$keyword.'%')
                    ->orwhere('author', 'LIKE', '%'.$keyword.'%')
                    ->orWhere('body', 'LIKE', '%'.$keyword.'%')
                    ->orWhereHas('category', function($query) use($keyword) {
                $query->where('name', 'LIKE', '%'.$keyword.'%');
            })
            ->paginate(20)


            // show karya ilmiha only user
            // 'posts' =>post::where('user_id', auth()->user()->id)->get() 
        ]);
        // ], compact('categories','posts', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.posts.create',[
            'categories' => category::all()
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
            'title'         => 'required|max:255',
            'author'        => 'required',
            'slug'          => 'required',
            'category_id'   => 'required',
            'image'         => 'image|file|max:2048',
            'dokumen'       => 'mimes:pdf',
            'body'          => 'required',
        ]);


        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('post-images', $file_name);

        $file_name = $request->dokumen->getClientOriginalName();
        $dokumen = $request->dokumen->storeAs('dokumen-pdf', $file_name);



        $title          = $request->title;
        $author          = $request->author;
        $slug           = $request->slug;
        $category_id    = $request->category_id;
        $image          = $image;
        $dokumen        = $dokumen;
        $body           = $request->body;


        $data = new post();
        $data->user_id      = Auth::id();
        $data->nomorinduk    = Auth::user()->nomorinduk;
        $data->prodi     = Auth::user()->prodi;
        $data->title        = $title;
        $data->author        = $author;
        $data->slug         = $slug;
        $data->category_id  = $category_id;
        $data->image        = $image;
        $data->dokumen        = $dokumen;
        $data->excerpt      = Str::limit(strip_tags($request->body), 200);
        // $data->excerpt      = '-';
        $data->body         = $body;
        $data->save();

        return redirect('/dashboard/posts')->with('success', 'Post telah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(post $post)
    {
        return view('dashboard.posts.show',[
             'post' => $post
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(post $post)
    {
        return view('dashboard.posts.edit',[
            'post' => $post,
            'categories' => category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, post $post)
    {

        $request->validate([
            'title'         => 'required|max:255',
            'author'        => 'required',
            'slug'          => 'required',
            'category_id'   => 'required',
            'image'         => 'image|file|max:2048',
            'dokumen'       => 'mimes:docx,doc,pdf',
            'body'          => 'required',
        ]);
        
        if($request->oldImage) {
            Storage::delete($request->oldImage);
        }
        $file_name = $request->image->getClientOriginalName();
        $image = $request->image->storeAs('post-images', $file_name);

        // dokumen 
        $dokumen = $request->file('dokumen');
        $nama_dokumen = 'FT'.date('Ymdhis').'.'.$request->file('dokumen')->getClientOriginalExtension();
        $dokumen->move('dokumen/',$nama_dokumen);



        $title          = $request->title;
        $author         = $request->author;
        $slug           = $request->slug;
        $category_id    = $request->category_id;
        $image          = $image;
        $dokumen        = $dokumen;
        $body           = $request->body;

        $data = post::find($post->id);
        $data->user_id      = Auth::id();
        $data->title        = $title;
        $data->author       = $author;
        $data->slug         = $slug;
        $data->category_id  = $category_id;
        $data->image        = $image;
        $data->dokumen      = $nama_dokumen;
        $data->excerpt      = Str::limit(strip_tags($request->body), 200);
        // $data->excerpt      = '-';
        $data->body         = $body;
        $data->save();

        return redirect('/dashboard/posts')->with('success', 'Post Telah berhasil di Update');

    //     $rules = ([
    //         'title'         => 'required|max:255',
    //         // 'slug'          => 'required|unique:post',
    //         'category_id'   => 'required',
    //         'body'          => 'required',
    //     ]);

    //     if($request->slug != $post->slug) {
    //         $rules['slug'] = 'required|unique:post';
    //     }

    //    $validatedData =  $request->validate($rules);

    //    $validatedData['user_id'] = auth()->user()->id;
    //    $validatedData['excerpt'] = Str::limit(strip_tags($request->body), 200);

    //    post::where('id', $post->id)
    //         ->update($validatedData);

            // return redirect('/dashboard/posts')->with('success', 'Post Telah berhasil di Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(post $post)
    {
        if($post->image) {
            Storage::delete($post->image);
        }   
        post::destroy($post->id); 
        return redirect('/dashboard/posts')->with('success', 'Post telah dihapus');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json(['slug' =>$slug]);
    }
}
