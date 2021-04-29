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


    // save our new post to the DB
    public function save(Request $request)
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
  

      $duplicate = BlogPosts::where('slug', $post->slug)->first();
      if ($duplicate) {
        return redirect('/')->withErrors('Title already exists.')->withInput();
      }

      
      return redirect($post->slug);
    }


    public function update(Request $request)
    {

      $post_id = $request->get('post_id');
      Log::debug("------------in db update -------------------");
      Log::debug("------------ $post_id -------------------");


        $post =   BlogPosts::find($post_id);
        Log::debug("------------ $post->title ---- ");
        Log::debug("------------ $post->body ---- ");



      if(!$post)
      {
        Log::debug("------------ coudnt find post id to update  -------------------");
        return redirect('/')->withErrors('requested page not found');
      } else {
        Log::debug("------------ YES post to update  -------------------");
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = Str::slug($post->title); // automatically slugifies ....
        $post->is_active = true;
        $post->author_id = $request->user()->id;
        $post->image_path = request()->file('image')->store('public/images');
        $post->save();
      }      
      return redirect($post->slug);
    }


    public function show($slug)
    {

      $five_posts = BlogPosts::with(['user'])->where('is_active',1)->orderBy('created_at','desc')->paginate(5);

      $post = BlogPosts::where('slug',$slug)->first();
      if(!$post)
      {
        return redirect('/')->withErrors('requested page not found');
      }

      return view('blogposts.show')->withPost($post)->withFiveposts($five_posts);

    }

    public function edit($id)
    {
      $post = BlogPosts::where('id',$id)->first();
      //$post = BlogPosts::where('slug',$slug)->first();

      Log::debug("--------------------in edit-------------------------");
      Log::debug("found post id $id");
      Log::debug("title $post->slug");
      Log::debug("--------------------going to edit form -------------------------");
      if(!$post)
      {
        return redirect('/')->withErrors('requested page not found');
      }
      

      return view('blogposts.edit')->withPost($post);
    }


    public function lastfive()
    {
      // Grab last posts
      $posts = BlogPosts::with(['user'])->where('is_active',1)->orderBy('created_at','desc')->paginate(5);


      //page heading
      $title = 'Latest Posts';

     return view('home')->withFiveposts($posts);
    }


    public function allPosts()
    {
      // Grab all  posts
      $posts = BlogPosts::with(['user'])->where('is_active',1)->orderBy('created_at','desc')->get();
      return view('all')->withPosts($posts);
    }


    // just seed something quick
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
