<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Custom;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function search() 
    {
        $q = request('q');
        if (empty($q)) {
            die('Please fill the search field!');
        }


        $results = Post::orderBy('id', 'DESC')->where('title', 'LIKE', '%'.$q.'%')->orWhere('body', 'LIKE', '%'.$q.'%')->orWhere('category', 'LIKE', '%'.$q.'%')->get();
        
       // $u = User::orderBy('id', 'DESC')->where('name', 'LIKE', '%{$q}%')->orWhere('username', 'LIKE', '%'.$q.'%')->orWhere('email', 'LIKE', '%'.$q.'%')->get();
        

     //   $results = $u->merge($p)->all();
      //  $results= $results->collect([$results])->values()->all();
        
        
       
        
        
        $resultscount = $results->count();
        $list = intval(floor($resultscount/10));

        
        if(request()->__pgn && request()->dir)
        {
            if(request('dir') == 'next') {
                $pagin = request('__pgn')-5;
                if ($pagin < 1){
                    $pagin = 10;
                    if ($pagin > $resultscount) {
                        $pagin = $resultscount;
                    }
                }

            }else{
                $pagin = request('__pgn')+10;
                if ($pagin > $resultscount){
                    $pagin = $resultscount;
                }
            }
            $final = $results->skip($resultscount-$pagin)->take(10);
        }
        else
        {
            $num = 10;
            if ($num>$resultscount){
                $num = $resultscount;
            }
            $final = $results->skip($resultscount-$num)->take(10);
            $pagin = 10;
        }
        
        $model="post";
        return view('news.search', [
            'list' => $list,
            'count' => $resultscount,
            'results'=>$final,
            'pagin' => $pagin, 
            'q' => $q,
            'model' => $model,
        ]);
    }




    
    public function index()
    {
        $latest = Post::orderBy('id', 'DESC')->paginate(3);
        $world = Post::orderBy('id', 'DESC')->skip(3)->take(3)->get();
        $slide = Post::orderBy('id', 'DESC')->skip(6)->take(4)->get();
        $desk = Post::orderBy('id', 'DESC')->skip(10)->take(3)->get();
        $edit = Post::orderBy('id', 'DESC')->skip(13)->take(4)->get();
        $leftmore = Post::orderBy('id', 'DESC')->skip(17)->take(2)->get();
        $rightmore = Post::orderBy('id', 'DESC')->skip(19)->take(2)->get();
        $popular = Post::orderBy('id', 'DESC')->skip(21)->take(5)->get();
        $videos = Post::orderBy('id', 'DESC')->skip(26)->take(4)->get();
        $galtop = Post::orderBy('id', 'DESC')->skip(30)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->skip(37)->take(6)->get();
        
        
        return view('news.index', [
            'latest' => $latest,
            'world' => $world,
            'slide' => $slide,
            'leftmore' => $leftmore,
            'rightmore' => $rightmore,
            'desk' => $desk,
            'editorial' => $edit,
            'popular' => $popular,
            'videos' => $videos,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
        ]);
    }





    

    public function about()
    {
        // Admins
        $arr_users = array();
        $arr_follow_count = array();
        $follow_count = array();
        $user_main = array();
        $users = User::all();
        foreach ($users as $key => $user) {
            if($user->admin()){
                array_push($arr_users, $user);
                array_push($arr_follow_count, $user->follow->count());
                array_push($follow_count, $user->follow->count());
            }
        }
        rsort($arr_follow_count);
        $i = 1;
        foreach ($arr_follow_count as $count) {
            $uid = uniqid();
            if($i<=5) {
                $index = array_search($count, $follow_count);
                $follow_count[$index] = $uid;
                array_push($user_main, $arr_users[$index]);
            }else{
                break;
            }
            $i++;
        }

        return view('news.about', [
            'admins' => $user_main,
        ]);
    }







    public function sports()
    {

        $latest = Post::orderBy('id', 'DESC')->where('category', 'sports')->paginate(1);
        $latest2 = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(1)->take(2)->get();
        $worldwide = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(3)->take(1)->get();
        $worldwide2 = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(4)->take(2)->get();
        $slide = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(6)->take(3)->get();
        $recent = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(9)->take(1)->get();
        $recent2 = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(10)->take(2)->get();
        $more = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(12)->take(1)->get();
        $more2 = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(13)->take(2)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(15)->take(5)->get();
        $videos = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(20)->take(4)->get();
        $photos = Post::orderBy('id', 'DESC')->where('category', 'sports')->skip(24)->take(4)->get();
        
        return view('news.sports', [
            'latest' => $latest,
            'latest2' => $latest2,
            'worldwide' => $worldwide,
            'worldwide2' => $worldwide2,
            'slide' => $slide,
            'recent' => $recent,
            'recent2' => $recent2,
            'more' => $more,
            'more2' => $more2,
            'popular' => $popular,
            'videos' => $videos,
            'photos' => $photos,
        ]);
    }






    
    public function tech()
    {

        $latesttop = Post::orderBy('id', 'DESC')->where('category', 'tech')->paginate(3);
        $latestbottom = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(3)->take(3)->get();
        $techleft = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(6)->take(2)->get();
        $techright = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(8)->take(2)->get();
        $whatshot = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(10)->take(3)->get();
        $topnews = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(13)->take(4)->get();
        $maylike = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(17)->take(4)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(21)->take(5)->get();
        $galtop = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(26)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->where('category', 'tech')->skip(33)->take(6)->get();

        return view('news.tech', [
            'latesttop' => $latesttop,
            'latestbottom' => $latestbottom,
            'techleft' => $techleft,
            'techright' => $techright,
            'whatshot' => $whatshot,
            'topnews' => $topnews,
            'maylike' => $maylike,
            'popular' => $popular,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
        ]);
    }




    public function business()
    {

        $live = Post::orderBy('id', 'DESC')->where('category', 'business')->paginate(1);
        $latest = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(1)->take(3)->get();
        $world = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(4)->take(3)->get();
        $leftmore = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(7)->take(2)->get();
        $rightmore = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(9)->take(2)->get();
        $editorial = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(11)->take(5)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(16)->take(5)->get();
        $maylike = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(21)->take(4)->get();
        $galtop = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(25)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->where('category', 'business')->skip(32)->take(6)->get();


        return view('news.business', [
            'live' => $live,
            'latest' => $latest,
            'world' => $world,
            'leftmore' => $leftmore,
            'rightmore' => $rightmore,
            'editorial' => $editorial,
            'popular' => $maylike,
            'maylike' => $maylike,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
        ]);
    }





    public function gist()
    {
        $latest = Post::orderBy('id', 'DESC')->where('category', 'gist')->paginate(3);
        $world = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(3)->take(3)->get();
        $slide = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(6)->take(4)->get();
        $desk = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(10)->take(3)->get();
        $edit = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(13)->take(4)->get();
        $leftmore = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(17)->take(2)->get();
        $rightmore = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(19)->take(2)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(21)->take(5)->get();
        $mightlike = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(26)->take(4)->get();
        $galtop = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(30)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(37)->take(6)->get();
        $featured = Post::orderBy('id', 'DESC')->where('category', 'gist')->skip(43)->take(6)->get();
        
        

        return view('news.gist', [
            'latest' => $latest,
            'world' => $world,
            'slide' => $slide,
            'leftmore' => $leftmore,
            'rightmore' => $rightmore,
            'desk' => $desk,
            'editorial' => $edit,
            'popular' => $popular,
            'mightlike' => $mightlike,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
            'featured' => $featured,
        ]);
    }





    public function entertainment()
    {

        $latest = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->paginate(3);
        $world = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(3)->take(3)->get();
        $slide = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(6)->take(4)->get();
        $desk = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(10)->take(3)->get();
        $edit = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(13)->take(4)->get();
        $leftmore = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(17)->take(2)->get();
        $rightmore = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(19)->take(2)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(21)->take(5)->get();
        $mightlike = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(26)->take(4)->get();
        $galtop = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(30)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(37)->take(6)->get();
        $featured = Post::orderBy('id', 'DESC')->where('category', 'entertainment')->skip(43)->take(6)->get();
        
        

        return view('news.entertainment', [
            'latest' => $latest,
            'world' => $world,
            'slide' => $slide,
            'leftmore' => $leftmore,
            'rightmore' => $rightmore,
            'desk' => $desk,
            'editorial' => $edit,
            'popular' => $popular,
            'mightlike' => $mightlike,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
            'featured' => $featured,
        ]);
    }





    public function campus()
    {
        $latest = Post::orderBy('id', 'DESC')->where('category', 'campus')->paginate(3);
        $world = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(3)->take(3)->get();
        $slidetop = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(6)->take(3)->get();
        $slidebottom = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(9)->take(3)->get();
        $desk = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(12)->take(3)->get();
        $edit = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(15)->take(4)->get();
        $leftmore = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(19)->take(2)->get();
        $rightmore = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(21)->take(2)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(23)->take(5)->get();
        $videos = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(28)->take(4)->get();
        $galtop = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(32)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->where('category', 'campus')->skip(39)->take(6)->get();
        
        
        return view('news.campus', [
            'latest' => $latest,
            'world' => $world,
            'slidetop' => $slidetop,
            'slidebottom' => $slidebottom,
            'leftmore' => $leftmore,
            'rightmore' => $rightmore,
            'desk' => $desk,
            'editorial' => $edit,
            'popular' => $popular,
            'videos' => $videos,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
        ]);
    }





    public function politics()
    {
        $latest = Post::orderBy('id', 'DESC')->where('category', 'politics')->paginate(3);
        $world = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(3)->take(3)->get();
        $slide = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(6)->take(4)->get();
        $desk = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(10)->take(3)->get();
        $edit = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(13)->take(4)->get();
        $leftmore = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(17)->take(2)->get();
        $rightmore = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(19)->take(2)->get();
        $popular = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(21)->take(5)->get();
        $mightlike = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(26)->take(4)->get();
        $galtop = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(30)->take(7)->get();
        $galbottom = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(37)->take(6)->get();
        $featured = Post::orderBy('id', 'DESC')->where('category', 'politics')->skip(43)->take(6)->get();
        
        

        return view('news.politics', [
            'latest' => $latest,
            'world' => $world,
            'slide' => $slide,
            'leftmore' => $leftmore,
            'rightmore' => $rightmore,
            'desk' => $desk,
            'editorial' => $edit,
            'popular' => $popular,
            'mightlike' => $mightlike,
            'galtop' => $galtop,
            'galbottom' => $galbottom,
            'featured' => $featured,
        ]);
    }






    public function blogs() {
        $blogs = Post::orderBy('id', 'DESC')->where('category', 'blogs')->paginate(3);
        $mightlike = Post::orderBy('id', 'DESC')->where('category', 'blogs')->skip(3)->take(5);
        $popular = Post::orderBy('id', 'DESC')->where('category', 'blogs')->skip(8)->take(4);
        $featured = Post::orderBy('id', 'DESC')->where('category', 'blogs')->skip(12)->take(6);
        
        return view('news.blogs', [
            'blogs' => $blogs,
            'mightlike' => $mightlike,
            'popular' => $popular,
            'featured' => $featured,
        ]);
    }

    

}