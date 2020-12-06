<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Notification;

class NotificationController extends Controller
{
    public function index() {
        
        $results = Notification::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->get();

        $resultscount = $results->count();

        
        if (request()->__pgn) {
            $r = request()->__pgn;
            if ($r > $resultscount-20) {
                $r = 0;
            }
            $final = $results->skip($r)->take(20);
            $r+=20;

        }else {
            $final = $results->take(20);
            $r = 20;
        }
        
        return view('user.notification', [
            'results' => $final, 
            'resultcount' => $resultscount,
            'r' => $r,
        ]);
    }







    public function mark($id) {
        if (isset(request()->link)) {
            $notification = Notification::findOrFail($id);
            $notification->update([
                'status' => 'read',
            ]);
            return redirect(request()->link);
        }
        else {
            return redirect()->back();
        }
        
    }

    public function ajaxMark($id) {
        $notification = Notification::findOrFail($id);
        $notification->update([
            'status' => 'read',
        ]);
        
        // $str = '<a href="'.route('index').'/notification/'.$notification->id.'/mark/?link='.route('index').$notification->link.'"
        //     class="search-head">
        //     <h4>'.$notification->message.'</h4>
        // </a>
        // <button class="badge pull-right" style="margin-left: 1rem; position:relative; bottom:5px;" onclick="mark('.$id.', '.$eq.')">Mark as Read</button>
        // <span class="notidate" style="color: #696969">'.\App\Custom::customdate($notification->date).'</span>';

        // return $str;
        
    }
}