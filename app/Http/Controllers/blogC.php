<?php

namespace App\Http\Controllers;

use App\Models\postM;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class blogC extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $post = postM::latest()->get();
        return view('backend.pages.blog_saya',compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.pages.create_blog');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);
        $date = date('Y-m-d H:i:s');
        $id_user = Auth::user()->id_user;
        // dd($id_user);

        $post = new postM;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->date = $date;
        $post->user_id = $id_user;
        $post->save();

        Alert::success('Sukses','Data berhasil ditambah');
        return redirect()->route('blog');
    }

    /**
     * Display the specified resource.
     */
    public function show(postM $blog)
    {
        return view('backend.pages.show_blog',compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, postM $blog)
    {
        $request->validate([
            'title'=>'required',
            'content'=>'required',
        ]);

        $blog->update([
            'title'=>$request->title,
            'content'=>$request->content,
        ]);

        Alert::success('Sukses','Data berhasil diubah');
        return redirect()->route('blog');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(postM $blog)
    {
        $blog->delete();
        
        Alert::success('Sukses','Data berhasil dihapus');
        return redirect()->route('blog');
    }
}
