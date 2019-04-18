<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserUpload;
use Illuminate\Support\Facades\DB;

class PublicView extends Controller
{
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

    public function show($id)
    {
        $post = UserUpload::find($id);
        return view('app.show',compact('img','post'));
    }
    
    public function paginate()
    {
        $post = UserUpload::paginate();
        return response()->json($post);
    }
}
