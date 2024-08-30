<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use App\Models\User;

use Illuminate\Http\Request;
use App\Http\Requests\StorePostsRequest;

// use App\Http\Controllers\Auth;

use Illuminate\Support\Facades\Auth;





class PostsController extends Controller
{


    function __construct(){

         $this->middleware(middleware: "auth")->only('store');
        
        }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Posts::paginate(3);
        // $posts = Posts::all();

        // dd($posts);

        
        return view('CRUD.AllPosts',compact('posts'));    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // dd($NumCreatedPost);
        // dd(Auth::user()->name);


        return view('CRUD.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostsRequest $request)
    {
        $data=request()->all();
        $image_path='';
        if(request()->hasfile("image")){
            // $image = request()->file("image");
            $image = request()->image;
            $image_path=$image->store("posts", 'posts_images');
            
            // dd($image_path);
        }
        
        // dd($image_path);     
        $authId=Auth::id();

        $data['image'] = $image_path;
        $data['creator_id']=$authId; 
        $data['posted_by']= Auth::user()->name;

        $NumCreatedPost=Posts::where('creator_id', $authId)->count();

        if($NumCreatedPost>3){
            $request->session()->flash('overNum', 'you can not creat post becouse you created 3 post ');
            return to_route('posts.index');
        }

        
        

        // dd($post->image);

        Posts::create($data); # accept data as associative array
        return to_route('posts.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Posts $post)
    {
        // $posts=Posts::find($posts);
        // dd($posts);
        return view('CRUD.showPost',compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Posts $post)
    {
        // dd($posts);

        $users = User::all();

        return view('CRUD.update', compact('post','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Posts $post)
    {
        $data=request()->all();
        if(request()->hasfile("image")){
            // $image = request()->file("image");
            $image = request()->image;
            $image_path=$image->store("posts", 'posts_images');
            $data['image'] = $image_path;
            
            // dd($image_path);
        }
        
        // dd($image_path);     

        // dd($post->image);

        $post->update($data);
        return to_route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Posts $post)
    {
        //

        $post->delete();
        return to_route('posts.index');
    }


    public function  GetDeletedPosts()
    {

        $DelePosts = Posts::onlyTrashed()->paginate(3);
        // $posts = Posts::all();

        // dd($posts);

        
        return view('CRUD.DeletedPosts',compact('DelePosts'));

    }

    public function restorPost($x)
    {
        //
        $www=Posts::onlyTrashed()->find($x);
        // echo "asdf";
        // $www=Posts::withTrashed()
        // ->where('user_id', $x);
        $www->restore();
        
        $DelePosts = Posts::onlyTrashed()->paginate(3);
        // dd($www);
        // $post->restore();
        return view('CRUD.DeletedPosts',compact('DelePosts'));
    }


}
