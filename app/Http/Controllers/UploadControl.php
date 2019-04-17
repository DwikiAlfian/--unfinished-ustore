<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\UserUpload;
use Illuminate\Support\Facades\Auth;

class UploadControl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user()->name;
        $posts = UserUpload::all()->where('user', $user);

        return view('app.read', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.create');
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
            'user'=>'required',
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'image'=>'image|required'
        ]);

        // HANDLE REQUEST
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $filenametostore = $filename;
            $path = $request->file('image')->storeAs('public/images', $filenametostore);
        } else {
            $filenametostore = 'noimage.jpg';
        }
        
        // UPLOAD TO DATABASE
        $post = new UserUpload([
            'user' => $request->get('user'),
            'name' => $request->get('name'),
            'category' => $request->get('category'),
            'description' => $request->get('description'),
            'image' => $filenametostore
        ]);

        $post->save();

        return redirect('user')->with('success','Data has been added');
    }

    /**
     * Display the specifie resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = UserUpload::find($id);
        return view('app.show',compact('img','post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = UserUpload::find($id);

        return view ('app.edit', compact('post'));
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
            'user'=>'required',
            'name'=>'required',
            'category'=>'required',
            'description'=>'required',
            'image'=>'image'
        ]);

        // HANDLE REQUEST
        if($request->hasFile('image')){
            $filename = $request->file('image')->getClientOriginalName();
            $filenametostore = $filename;
            $path = $request->file('image')->storeAs('public/images', $filenametostore);
        }



        $post = UserUpload::find($id);
        $post->name = $request->get('name');
        $post->user = $request->get('user');
        $post->category = $request->get('category');
        $post->description = $request->get('description');
        if($request->hasFile('image')){
            $post->image = $filenametostore;
        }

        $post->save();

        return redirect('user')->with('success','Data has been added');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = UserUpload::find($id);

        if(auth()->user()->name !==$post->user){
            return redirect('/user')->with('errors', 'Unauthorized Page');
        }

        if($post->image != 'noimage.jpg'){
            Storage::delete('public/image/.$post->image');
        }

        $post->delete();
        return redirect('/user')->with('success', 'Picture has been removed');
    }

    public function category()
    {
        // $posts = DB::table('user_uploads')->select('name','image','user')->where('category','Panorama')->first();
        $image_p = UserUpload::all()->where('category','Panorama');
        $image_r = UserUpload::all()->where('category','Portrait');
        $image_a = UserUpload::all()->where('category','Animals');
        $image_o = UserUpload::all()->where('category','Other');

        return view('app.category', compact('posts','image_p','image_r','image_a','image_o'));
    }

    public function browse()
    {
        // $posts = DB::table('user_uploads')->select('name','image','user')->where('category','Panorama')->first();
        $image = UserUpload::all();
        $image_p = UserUpload::all()->where('category','Panorama');
        $image_r = UserUpload::all()->where('category','Portrait');
        $image_a = UserUpload::all()->where('category','Animals');
        $image_o = UserUpload::all()->where('category','Other');

        return view('app.browse', compact('posts','image','image_p','image_r','image_a','image_o'));
    }
}
