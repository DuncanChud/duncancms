@extends('layouts.blogmain')
{{-- @section('title')
{{$title}}
@endsection --}}
@section('sidebar')

  @include('layouts.sidebar');

  
@endsection


@section('content')
<div class="text-xl text-gray-800 p-6" >
  <h1 class="text-2xl text-gray-700 underline">Welcome to the Proof Of Concept DuncanBlog</h1>
  <hr>
  <p class="py-3">Ok, time for a little tech talk, ... <i>so what are you looking at exactly here anyway?</i></p>
  <p class="py-3">For this use-case, this blog is built from scratch on a fresh install of Laravel 8, using Eloquent ORM againt SQLite as a DB.  I have been a fan of SQLite for quick projects forever, and in real world terms if you were building a lopsidedly read-heavy application (like a blog), the performance would be as good as the standard options even up to a pretty significant traffic load.  For this project it made sense as a way to build and commit the entirety of the project into source control without extra dependecies.</p>  
  <p class="py-3">The routes are mostly what you would expect, although I did recycle one route using GET vs POST for different actions.</p>  
  <p class="py-3">Since I had not had the excuse to learn it before, I took the opportunity to setup all the styling using <a class="text-blue-500 underline" target="_blank" href="https://tailwindcss.com/">Tailwind CSS</a>.  This compositional CSS system is a most-favored-nation in modern Laravel develoment but at the same time is often a devisive topic among CSS purists.  I'll admit there is a kind of <i>"wait you shouldn't be doing this"</i> dissonance the first time around different with this approach, but after having learned enough of it to create this blog, I'm can see it's place, particularly in prototyping or while working in component-centric frameworks to begin with.  Pretty cool.</p>  
  <p class="py-3">The WYSIWYG interface in the blog admin is using <a class="text-blue-500 underline" href="https://quilljs.com/" target="_blank">QuillJS.</a>.  I had never used it before but it's pretty capable and has a kind of API-driven design to it.  Out of the box it can serialize the input into json entities vs. only ending up with HTML as the output (although not really needed in our use case).</p>
  <p class="py-3">All of this is running on an <a class="text-blue-500 underline" href="https://aws.amazon.com/lightsail/" target="_blank">AWS LightSail</a> Ubuntu 20.04 instance I spun up, and installed php / apache on.  LightSail is AWS's canned EC2 instances offering where you get turnkey streamlined EC2 boxes with fewer options but quick and easy admin.  Great for ephemeral / proof of concept machines.</p>
  <p class="py-3">Since the nature of this exercise is to show the work related in routing, CRUD operations, etc, 
    I wrote the classes by hand and only tapped into one common starter package which 
    is <a class="text-blue-500 underline" href="https://github.com/laravel/breeze"  target="_blank">Laravel Breeze</a> (nicer-looking auth than the built in auth classes.).</p>
  <h2 class="my-3 font-bold">Ok, so if this weren't an exercise how would this have been approached differently?</h2>
  <h3 class="font-bold">Option 1</h3>
  <p  class="py-3">If the task at hand was simply to standup a Laravel-powered blog for production use, I would have taken this in a different direction.  If we were going to use a standard database-driven solution I would have implemented <a class="text-blue-500 underline" href="https://www.getcraftable.com/"  target="_blank">Craftable</a> (open source) which gets you very nice CRUD / Admin interface "for free".  It scaffolds out against your Model classes and you end up with a very user friendly Admin interface ready to go complete with WYSIWYG interface, and Media Gallery capabilites.  This particular site could have been built in easily 1/2 the time with this option.</p>
  <h3 class="my-3 font-bold">Option 2</h3>
  <p class="py-3">If we are more generally just looking for a standalone Laravel powered blog, I would have checked out <a class="text-blue-500 underline" href="https://jigsaw.tighten.co/"  target="_blank">Jigsaw</a>.  Jigsaw is a Laravel-powered static site generator which is a great modern workflow that lends itself to simple deploys and almost unlimited easy-scaling. This is something I've been meaning to run a proof of concept through for a while.<p> 
  <h3 class="my-3 font-bold">Follow on Questions / Other Considerations...</h3>
  <h3 class="my-3 font-bold">How does the system operate if the Backend is hosted on a different server from the Frontend/Admin?</h3>
  <p  class="py-3">So in this case with SQLite you are kind of stuck.  If we wan't to switch to MySql, we can update connection type and re-migrate our models into MySql's schema, though we would need to write a custom bit to move the data around.</p>
  <h3 class="my-3 font-bold">Where might you apply caching to avoid overwhelming the database during high traffic?</h3>
  <p  class="py-3">Static assets can be cached in a CDN, data driven performance could be beefed up by throwing an in memory cache at it like memcached or redis.  You would retool some code for cache invalidation, etc. Alternately you can scale horizontally if you have cloud-based auto scaling servers / container services behind a load balancer.  Spin up time still takes a few minutes per onboarded node, but the upside is this is a more or less infinitely scalable solution.</p>
  <h3 class="my-3 font-bold">Expand the admin tool to allow updates of posts and deleting posts.</h3>
  <p  class="py-3">I threw in a couple additional routes / pages for 1) updating existing pages and 2) Viewing a master list of ALL pages in the system.</p>
  <h3 class="my-3 font-bold">Allow uploading of a high-resolution image to be displayed on the article page that is automatically resized for the home page thumbnail.</h3>
  <p  class="py-3">Right now I'm accepting in and displaying the uploaded assets as original size within the limits of the responsive container it lives in.  If you go to edit an existing page though you will see a thumbnailified version of the item you are replacing.  (This is css container fitting, not running through a true image resizer).</p>

    
</div>
@endsection