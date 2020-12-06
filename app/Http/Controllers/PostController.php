<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custom;
use App\Post;
use App\User;
use App\View;
use App\Comment;
use App\Like;
use App\Notification;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        if (request()->report)
        {
            echo '<script>alert("'.request('report').'");</script>';
        }  
        return view('admin.post.new');
        
    }




 
    public function store(Request $request)
    {
        $messages = [
            'not_regex' => 'The :attribute must not include special characters like #,*,_,^,/,',
            'unique' => 'This :attribute has been used previously.',
        ];
       
        $data = $request->validate([
            'title' => [ 'max:500', 'required', 'unique:posts'],
            'body' => ['max:10000', 'required'],
            'category' => 'required',
            'file' => ['image', 'max:5000', 'required'],
        ], $messages);

        

        $path = request('file')->store('assets/post', 'public');

        $date = date('D-d-M-Y-H-i');
        $cus = preg_replace('/ /', '-', strtolower($data['title']));
        $custom = preg_replace("/[^A-Za-z0-9\-]/", '', $cus);
        
        auth()->user()->post()->create([
            'custom_id' => $custom,
            'title' => $data['title'],
            'body' => $data['body'],
            'category' => $data['category'],
            'file' => $path,
            'date' => $date,
        ]);


        $file_name = str_replace('assets/post/', '', $path);

        $file_destination = 'storage/assets/thumbnail/'.$file_name;

        Custom::compress($_FILES['file'], $file_destination, 60);
        Custom::updatesitemap();
        
        
        return redirect('/post/new');
    }






    public function show($custom_id)
    {
        $post = Post::where('custom_id', $custom_id)->firstOrFail();
        
        $clientId = $_SERVER['HTTP_USER_AGENT'];
        $checkView = View::where('post_id', $post->id)->where('client_id', $clientId)->first();
        if ($checkView == null) {
            $post->view()->create(['client_id'=>$clientId]);
        }
        
        $mightlike = Custom::randomFetch(5, 'id', $post->id, []);
        $popular = Custom::randomFetch(4, 'id', $post->id, $mightlike[1]);
        $featured = Custom::randomFetch(6, 'id', $post->id, $popular[1]);
        $recentpost = Custom::randomFetch(5, 'id', $post->id, $featured[1]);
        $recentcomment = Comment::orderBy('id', 'DESC')->where('post_id', '!=', $post->id)->paginate(5);
        $commentcount = $post->comment->count();

        if(request()->__pgn && request()->dir)
        {
            if(request('dir') == 'next') {
                $pagin = request('__pgn')-5;
                if ($pagin < 1){
                    $pagin = 5;
                    if ($pagin > $commentcount) {
                        $pagin = $commentcount;
                    }
                }

            }else{
                $pagin = request('__pgn')+5;
                if ($pagin > $commentcount){
                    $pagin = $commentcount;
                }
            }
            $postcomment = $post->comment->skip($commentcount-$pagin)->take(5);
        }
        else
        {
            $num = 5;
            if ($num>$commentcount){
                $num = $commentcount;
            }
            $postcomment = $post->comment->skip($commentcount-$num)->take(5);
            $pagin = 5;
        }
        
        if(auth()->user() != null) {
            $liked = Like::where('user_id', auth()->user()->id)->where('post_id', $post->id)->first();
            if($liked == null) {
                $likepost = false;
            }else{
                $likepost = true;
            }
        }else{
            $likepost = null;
        }


        return view('news.singlepage', [
            'post' => $post,
            'recentpost' => $recentpost[0],   
            'recentcomment' => $recentcomment,
            'mightlike' => $mightlike[0],
            'popular' => $popular[0],
            'featured' => $featured[0],
            'postcomment' => $postcomment,
            'pagin' => $pagin,
            'likepost' => $likepost,

        ]);
    }
    




    public function viewUpdate($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        
        return view('admin.post.edit', [
            'post' => $post,
        ]);
    }





    public function update($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        $messages = [
            'not_regex' => 'The :attribute must not include special characters like #,*,_,^,/',
            'unique' => 'This :attribute has been used previously.',
        ];
        
        $data = request()->validate([
            'title' => [ 'max:500', 'required', 'unique:posts'],
            'body' => ['max:10000', 'required'],
            'category' => 'required',
        ], $messages);
        $cus = preg_replace('/ /', '-', strtolower($data['title']));
        $custom = preg_replace("/[^A-Za-z0-9\-]/", '', $cus);	

        $post->update([
            'custom_id' => $custom,
            'title' => $data['title'],
            'body' => $data['body'],
            'category' => $data['category'],
        ]);
		Custom::updatesitemap();
		
        return redirect('/'.$post->custom_id);

    }




    public function likePost($id) 
    {
        $post = Post::findOrFail($id);
        $count = Post::findOrFail($id)->like->count();
        $comment = Like::where('user_id', auth()->user()->id)->where('post_id', $id)->first();
        if($comment == null) {
            auth()->user()->like()->create(['post_id'=>$id]);
            if ($post->user_id != auth()->user()->id) {
            	Notification::create([
                'user_id' =>$post->user_id,
                'message' => auth()->user()->name.' liked your post.',
                'link' => '/'.$post->custom_id,
                'status' => '',
                'date' => date('D-d-M-Y-H-i'),
            ]);
            }
            return json_encode(['count'=>$count+1, 'react'=>$count+1>1?'Likes':'Like']);
        }else {
            $comment->delete();
            return json_encode(['count'=>$count-1, 'react'=>$count-1>1?'Likes':'Like']);
        }
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);
        
        $old_file_name = str_replace('assets/post/', '', $post->file);

        Storage::disk('public')->delete('assets/post/'.$old_file_name);
        Storage::disk('public')->delete('assets/thumbnail/'.$old_file_name);
        

        $post->delete();

        $comments = $post->comment->all();
        foreach ($comments as $comment) {
            $comment->delete();
        }

        $likes = $post->like->all();
        foreach ($likes as $like) {
            $like->delete();
        }

        $follows = $post->post_follows->all();
        foreach ($follows as $follow) {
            $follow->delete();
        }
        
        Custom::updatesitemap();

        return redirect('/');


    }

}