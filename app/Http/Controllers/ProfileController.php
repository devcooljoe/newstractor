<?php

namespace App\Http\Controllers;  

use Illuminate\Http\Request;
use App\Custom;
use App\User;
use App\Post;
use App\Follow;
use App\Attribute;
use App\Subscriber;
use App\Notification;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{





    
    public function index($id)
    {
        $user = User::where('username', $id)->first() ?? User::findOrFail($id);
        $following = Follow::where('follower_id', $user->id)->count();
        
        if (auth()->user() != null) {

            $follow = Follow::where('user_id', $user->id)->where('follower_id', auth()->user()->id)->first();

            if($follow == null) {
                $button = 'Follow';
            }else {
                $button = 'Unfollow';
            }
        }
        else{
            $button = null;
        }
        
        $follower = $user->follow->count();

        $posts = Post::orderBy('id', 'DESC')->where('user_id', $user->id)->paginate(9);
        $maylike = Custom::randomFetch(5, 'user_id', $user->id, []);
        $popular = Custom::randomFetch(5, 'user_id', $user->id, $maylike[1]);

        return view('user.profile', [
            'user' => $user,
            'posts' => $posts,
            'maylike' => $maylike[0],
            'popular' => $popular[0],
            'follower' => $follower,
            'button' => $button,
            'following' => $following,
        ]);
    }










    public function edit($id)
    {
        $user = User::where('username', $id)->first() ?? User::findOrFail($id);
        $this->authorize('update', $user->profile);
        
        return view('user.editprofile', [
            'user' => $user,
        ]);
    }












    public function storeAvatar(Request $request) 
    {
        $request->validate([
            'file' => ['image', 'max:5000', 'required']
        ]);

        $old_file_name = str_replace('assets/avatar/', '', auth()->user()->profile->avatar);

        Storage::disk('public')->delete('assets/avatar/'.$old_file_name);
        Storage::disk('public')->delete('assets/thumbnail/'.$old_file_name);

        $path = request('file')->store('assets/avatar', 'public');
        
        auth()->user()->profile()->update([
            'avatar' => $path,
        ]);

        $file_name = str_replace('assets/avatar/', '', $path);
        $file_destination = 'storage/assets/thumbnail/'.$file_name;

        Custom::compress($_FILES['file'], $file_destination, 60);

        return json_encode(array('state'=>'Profile Picture Changed!', 'path'=>$path));
        
    }










    public function updateInfo()
    {
        $data = request()->validate([
            'name' => ['max:50', 'required'],
            'role' => 'max:100',
            'title' => 'max:100',
            'description' => 'max:500',
        ]);
        $facebook['facebook'] = null;
        $twitter['twitter'] = null;
        $instagram['instagram'] = null;

        if (!empty(request('facebook'))) 
        {
            $facebook = request()->validate([
                'facebook' => ['max:100', 'url'],
            ]);
        }
        if (!empty(request('twitter')))
        {
            $twitter = request()->validate([
                'twitter' => ['max:100', 'url'],
            ]);
        }
        if(!empty(request('instagram')))
        {
            $instagram = request()->validate([
                'instagram' => ['max:100', 'url'],
            ]);
        }

        auth()->user()->update([
            'name' => $data['name'],
        ]);
        auth()->user()->profile()->update([
            'role' => $data['role'],
            'title' => $data['title'],
            'description' => $data['description'],
            'facebook' => $facebook['facebook'],
            'twitter' => $twitter['twitter'],
            'instagram' => $instagram['instagram'],
        ]);

        if (auth()->user()->username == null)
        {
            return redirect('/profile/'.auth()->user()->id);
        }else
        {
            return redirect('/profile/'.auth()->user()->username);
        }
        
    }







    public function updateUsername($temp = null)
    {
        if ($temp != null) 
        {
            $username = User::where('username', $temp)->first();
            if ($username != null)
            {
                return json_encode(['state'=>'error', 'report'=>'This Username is not available!']);
            }elseif (preg_match("/[^A-Za-z0-9_]/", $temp)){
                return json_encode(['state'=>'error', 'report'=>'Username can only contain alphabets, numbers or underscores!']);
            }else
            {
                auth()->user()->update(['username'=>$temp]);
                return json_encode(['state'=>'ok', 'report'=>'Username Updated!']);
            }
        }else
        {
            auth()->user()->update(['username'=>null]);
            return json_encode(['state'=>auth()->user()->id]);
        }
    }









    public function admin()
    {

        $sports = Post::where('category', 'sports')->count();
        $tech = Post::where('category', 'tech')->count();
        $business = Post::where('category', 'business')->count();
        $gist = Post::where('category', 'gist')->count();
        $entertainment = Post::where('category', 'entertainment')->count();
        $campus = Post::where('category', 'campus')->count();
        $politics = Post::where('category', 'politics')->count();
        $blogs = Post::where('category', 'blogs')->count();
        $all = Post::all()->count();
        $u = Attribute::where('admin', 'true')->orWhere('admin', 'super')->get();
        $admins = [];
        foreach ($u as $id) {
            array_push($admins, User::find($id->user_id));
        }
        
        return view('user.admin', [
            'sports'=>$sports,
            'tech'=>$tech,
            'business'=>$business,
            'gist' => $gist,
            'entertainment'=>$entertainment,
            'campus' => $campus,
            'politics'=>$politics,
            'blogs'=>$blogs,
            'all' => $all,
            'admins' => $admins,
        ]);
    }

    public function fetchAdmin($id)
    {
        $user = User::where('username', $id)->first() ?? User::find($id);

        if ($user == null || $user->superadmin()) {
            return json_encode(['error'=>true]);
        }
        $uname = $user->name;
        $admin = false;
        if ($user->admin()) {
            $admin = true;
        }
        return json_encode(['userid'=>$user->id, 'name'=>$uname, 'admin'=>$admin, 'error'=>false]);
    }

    public function actionAdmin($id)
    {
        $user = User::where('username', $id)->first() ?? User::findOrFail($id);
        if ($user->admin()) {
            $user->attribute()->update(['admin'=>'false']);
            return 'removed';
        }else{
           $user->attribute()->update(['admin'=>'true']); 
           return 'added';
        }
    }








    public function follow($id)
    {   
        $user = User::findOrFail($id);
        $count = User::findOrFail($id)->follow->count();
        $follow = Follow::where('user_id', $id)->where('follower_id', auth()->user()->id)->first();
        
        if(auth()->user()->id != $id && $user->admin()) {
            if ($follow == null) {
                Follow::create(['user_id'=> $id, 'follower_id' => auth()->user()->id]);
                $user->notification()->create([
                    'message' => auth()->user()->name." started following you.",
                    'link' => '/profile/'.auth()->user()->id,
                    'status' => '',
                    'date' => date('D-d-M-Y-H-i'),
                ]);
                return json_encode(['count'=> $count+1, 'follow'=>($count+1)>1?'Followers':'Follower', 'status'=>'Unfollow']);
    
            }else {
                $follow->delete();
                return json_encode(['count'=> $count-1, 'follow'=>($count-1)>1?'Followers':'Follower', 'status'=>'Follow']);
            }
        }
    }








    

    public function subscribe()
    {
        $data = request()->validate(['email'=>'string|max:200|email|unique:subscribers']); 

        $used_mail = Subscriber::where('email', $data['email'])->first();
        if ($used_mail == null) {
            Subscriber::create(['email'=>$data['email']]);
           
            $title = "Thanks for subscribing to our Newsletter!";
            $body = Custom::getHtml("templates/subscribe.php");
            Custom::sendMail($data['email'], $title, $body);
        }

        $user = User::where('email', $data['email'])->first();
        if ($user != null) {
            $user->attribute()->update(['subscribed'=>'true']);
        }
        return redirect()->back();
    }


}