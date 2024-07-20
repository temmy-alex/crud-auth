<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function index()
    {
        // Mirip dengan query
        // SELECT id, title, description, image
        // FROM posts ORDER BY id DESC;
        $posts = Post::select('id', 'title', 'description', 'image')
                    ->orderBy('id', 'desc')
                    ->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        // Step untuk melakukan Validasi Data
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,jpeg,png,bmp,tiff|max:4096'
        ]);

        $image = $request->file('image');

        // Melakukan pengecekkan apakah gambar ada atau tidak
        if ($request->hasFile('image')) {
            if ($image->isValid())
            {
                $destinationPath = public_path() . '/files/products/';
                $imageFile = time() . '-' . Str::random(15) . '.' . $image->getClientOriginalExtension();
                $image->move($destinationPath, $imageFile);
                $imageName = '/files/products/'.$imageFile;
            }
        } else {
            $imageName = '/img/no-image.png';
        }

        // Step untuk melakukan penyimpanan data menggunakan ORM
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName, // menyimpan nama gambar di database,
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('posts.index')->with('success', 'Post success created');
    }
}
