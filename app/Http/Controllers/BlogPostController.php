<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\Models\BlogPosts;
use App\Http\Requests\StoreBlogPosts; 
use Illuminate\Support\Facades\Log;

class BlogPostController extends Controller
{

    // Show the create form
    public function create(Request $request)
    {
        if (Auth::check()) {
            return view('blogposts.create');
        } else {
        return redirect('/')->withErrors('Not logged in!');
      }
    }


    // edit an existing post
    // public function edit(Request $request,$slug)
    // {
    //     $post = BlogPosts::where('slug',$slug)->first();
    //     if($post && ($request->user()->id == $post->author_id || $request->user()->is_admin()))
    //     return view('blogposts.edit')->with('post',$post);
    //     return redirect('/')->withErrors('you have not sufficient permissions');
    // }

    public function store(Request $request)
    {

      $validatedData = $request->validate([
            'title' => 'required|unique:blogposts|max:255',
            'body' => 'required',
        ]);


      $post = new BlogPosts();
      $post->title = $request->get('title');
      $post->body = $request->get('body');
      $post->slug = Str::slug($post->title); // automatically slugifies ....
      $post->is_active = true;
      $post->author_id = $request->user()->id;
      $post->image_path = request()->file('image')->store('public/images');
      $post->save();
  

      // $duplicate = BlogPosts::where('slug', $post->slug)->first();
      // if ($duplicate) {
      //   return redirect('new-post')->withErrors('Title already exists.')->withInput();
      // }

      
      return redirect($post->slug);
    }


    public function show($slug)
    {
        $post = BlogPosts::where('slug',$slug)->first();
        if(!$post)
        {
          return redirect('/')->withErrors('requested page not found');
        }

        return view('blogposts.show')->withPost($post);
    }


    public function lastfive()
    {
      // Grab last posts
      $posts = BlogPosts::with(['user'])->where('is_active',1)->orderBy('created_at','desc')->paginate(5);


     //$posts = BlogPosts::all();

     // $posts = DB::table('blogposts')->get();

      //Flight::all()

      //page heading
      $title = 'Latest Posts';
      //return home.blade.php template from resources/views folder
     // return view('home')->withPosts($posts)->withTitle($title);
     //return view('home')->withTitle($title);
     return view('home')->withPosts($posts);
    }


    public function makeABlogPost()
    {
       Log::debug("make a blog post");
       BlogPosts::create(array(
           'title' => 'Mike Title',
           'body' => 'Mike Body',
           'slug' => 'mike-title-unique',
           'author_id' => 1,
           'is_active' => 1
       ));
       return view('welcome');
    }

    










}
