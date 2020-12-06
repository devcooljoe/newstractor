<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Notification;
use App\PostFollows;

class CommentController extends Controller
{



    public function store($id)
    {
        $post = Post::findOrFail($id);
        
        $data = request()->validate([
            'comment' => ['required', 'max:2000'],
        ]);

        $date = date('D-d-M-Y-H-i');

        auth()->user()->comment()->create([
            'post_id' => $id,
            'comment' => $data['comment'],
            'date' => $date,
        ]);


        $follows = PostFollows::where('post_id', $id)->where('user_id', auth()->user()->id)->first();
    
        if ($follows == null) {
            PostFollows::create([
                'post_id' => $id,
                'user_id' => auth()->user()->id,
            ]);
        }
        
        $pfollowers = PostFollows::where('post_id', $id)->get();
        
        if (auth()->user()->id != $post->user_id) {
            
            foreach ($pfollowers as $follower) {
                if ($follower->user_id == $post->user_id) {
                    $message = auth()->user()->name." commented on your post.";
                }else {
                    $message = auth()->user()->name." commented on a post you are following.";
                }
                $user = User::findOrFail($follower->user_id);

                if(auth()->user()->id != $follower->user_id) {
                
                    Notification::create([
                        'user_id'=>$follower->user_id,
                        'message' => $message,
                        'link' => '/'.$post->custom_id,
                        'status' => '',
                        'date' => $date,
                    ]);
                }
            }
        }else {
            foreach ($pfollowers as $follower) {
                if ($follower->user_id != $post->user_id) {
                    
                    $message = auth()->user()->name." commented his post.";
                    $user = User::findOrFail($follower->user_id);
                    
                    if(auth()->user()->id != $follower->user_id) {
                   
                        Notification::create([
                            'user_id'=>$user->id,
                            'message' => $message,
                            'link' => '/'.$post->custom_id,
                            'status' => '',
                            'date' => $date,
                        ]);
                    }
                }
            } 
        }
        
        return redirect('/'.$post->custom_id.'#comment');
    }






    public function delete($id)
    {
        $comment = Comment::findOrFail($id);
        $custom_id = $comment->post->custom_id;
        $this->authorize('update', $comment);
        $comment->delete();

        // return redirect('/'.$custom_id.'#comment');
    }
}