<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

use App\Models\Posts;


class PostsController extends Controller
{

    private $users = [
        ["id"=>1, "title"=>"title1", "posted_by"=> "Mohamed" , "description"=>"des1111"],
        ["id"=>2, "title"=>"title2", "posted_by"=> "Ahmed" , "description"=>"des2222"],
        ["id"=>3, "title"=>"title3", "posted_by"=> "Anas" , "description"=>"des22222" ],
    ];



    function index () {

        // $userss = DB::table('users')->get();
        // $userss = Posts::all();

        $userss = DB::table('posts')->paginate(3);
        
        return view('CRUD/AllPosts',["userss"=>$userss]);
    
    }

    function show($id) {

        // foreach($this ->users as $user){
        //     if ($user['id']==$id){
        //         return view('CRUD/showPost',["user"=>$user]);
        //     }
        // }
        // return 'notfound';

        $user = Posts::find($id);

        return view('CRUD.showPost',["user"=>$user]);
    
    }

    function createPost() {
    
        return view('CRUD/create',["users"=> $this -> users]);
    }

    function store() {
    
        // dd($_POST);

        $data=request()->all();
        $image_path='';
        if(request()->hasfile("image")){
            // $image = request()->file("image");
            $image = request()->image;
            $image_path=$image->store("posts", 'posts_images');
            
            // dd($image_path);
        }
        
        // dd($image_path);

        $post = new Posts();

        $post->title = $data["title"];
        $post->description = $data["description"];
        $post->posted_by =$data["user"] ;
        $post->image = $image_path;
        // dd($post->image);
        $post->save();

        return to_route('allposts.index');

    }



    function destroy($id) {

        $post = Posts::find($id);
        $post->delete();
        return to_route('allposts.index');

    }



    function update($id) {

        // foreach($this ->users as $user){
        //     if ($user['id']==$id){
        //         return view('CRUD.update',["user"=>$user]);
        //     }
        // }
        // return 'notfound';

        $user = Posts::find($id);
        return view('CRUD.update',["user"=>$user]);
    }


    function edit($id) {

        $post = Posts::findorfail($id);
        $data=request()->all();


        $post->title = $data["title"];
        $post->description = $data["description"];
        $post->posted_by =$data["user"] ;
        
        if(request()->hasfile("image")){
            // $image = request()->file("image");
            $image = request()->image;
            $image_path=$image->store("posts", 'posts_images');
            $post->image = $image_path;        
            // dd($image_path);
        }
        
        // dd($post->image);
        $post->save();
        // dd($post);

        return to_route('allposts.index');


    }



    

    
}
