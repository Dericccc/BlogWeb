<?php
/**
 * Created by PhpStorm.
 * User: m1563
 * Date: 2018/2/12
 * Time: 9:19
 */
namespace App\Http\Controllers;

//use http\Env\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests;
use Mail;
use Session;

class PagesController extends Controller{

    public function getIndex(){
        $posts = Post::orderBy('created_at','desc')->limit(4)->get();
       return view('pages/welcome')->withPosts($posts);
    }

    public function getContact(){
        return view('pages/contact');
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'emali' => 'email',
            'subject' => 'min:3',
            'message' => 'min:10']);
        $data = array(
            'email' => $request->email,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );


        Mail::send('emails.contact', $data, function ($message) use ($data) {
            $message->from($data['email']);
            $message->to('yzhu817@aucklanduni.ac.nz');
            $message->subject($data['subject']);
            $message->getSwiftMessage();

        });

        Session::flash('success', 'Your email has been sent successfully');
        return view('pages.contact');
    }

    public function getAbout(){

        return view('pages/about');


    }

//    public function index(){
//
//        $pdo=DB::connection()->getPdo();
//        dd($pdo);
//}
}