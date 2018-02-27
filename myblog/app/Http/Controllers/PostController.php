<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//use Illuminate\Support\Facades\DB;
use App\Post;
use Illuminate\Support\Facades\Input;
use Session;
use App\Category;
use App\Timelast;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index()
    {
        //
        $posts = Post::orderBy('id','desc')->paginate(2);
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $timelasts = Timelast::all();
        return view('posts.create')->withCategories($categories)->withTimelasts($timelasts);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate the data
        $this->validate($request,array(
          'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' => 'required|integer',
            'body' =>'required'
        ));

        //store in the database
       $post = new Post;
       $post->title =$request->title;
       $post->slug = $request->slug;
       $post->category_id = $request->category_id ;
        $post->timelast_id = $request->timelast_id ;
       $post->body = $request->body;
       $post->save();

       Session::flash('success','The blog post was successfully saved');
        //redirect to another page
     return redirect()->route('posts.show', $post->id);

    }


//    public function add(){
//        if(Input::all()){
//            $input = Input::all();
//            $post = DB::table('posts')->insert([
//                'title'=>$input['title'],
//                 'body'=>$input['body'],
//            ]);
//
//            Session::flash('success','The blog post was successfully saved');
//            return redirect()->route('posts.show',['id'=>1]);
//        }else{
//            echo 212323;
//        }
//    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

       $post = Post::find($id);
       return view('posts.show')->withPost($post);
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int $id
         * @return \Illuminate\Http\Response
         */
    }
    public function edit($id)
    {
        //
        $post = Post::find($id);
        $categories = Category::all();
        $timelasts = Timelast::all();
        $cats = array();
        foreach ($categories as $category){
            $cats[$category->id] = $category->name;
        }

        $dogs = array();
        foreach ($timelasts as $timelast){
            $dogs[$timelast->id] = $timelast->name;
        }
        return view('posts.edit')->withPost($post)->withCategories($cats)->withTimelasts($dogs);
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
        //
        $post = Post::find($id);
        if ($request->input('slug') == $post->slug) {

            $this->validate($request, array(
                'title' => 'required|max:255',
                'category_id' =>'required|integer',
                'body' => 'required'
            ));
        } else {

        $this->validate($request, array(
            'title' => 'required|max:255',
            'slug' => 'required|alpha_dash|min:5|max:255|unique:posts,slug',
            'category_id' =>'required|integer',
            'body' => 'required'
        ));
    }
        $post = Post::find($id);

        $post->title = $request->input('title');
        $post->slug = $request->input('slug');
        $post->category_id = $request->input('category_id');
        $post->timelast_id = $request->input('timelast_id');
        $post->body  = $request->input('body');

        $post->save();


        Session::flash('success','This posts was successfully saved');

        return redirect()->route('posts.show', $post->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post =Post::find($id);

        $post->delete();

        Session::flash('success','This posts was successfully deleted!');
        return redirect()->route('posts.index');


    }
}
