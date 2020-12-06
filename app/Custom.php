<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Custom extends Model
{ 

    public static function customdate($arg) {
		
		$list = explode("-", $arg);
	
		$wkd = $list[0];
		$cwkd = date('D');
	
		$d = $list[1];
		$cd = date('d');
		$mth = ['', 'Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];
		
		$m = $list[2];
		$cm= date('M');
	
		$ind_m = array_search($m, $mth);
		$ind_cm = array_search($cm, $mth);
		
		$y=$list[3];
		$cy = date('Y');
	
		$h=$list[4];
		$ch = date('H');
	
		$min =$list[5];
		$cmin = date('i');
	
		$arr_30 = ['Sep', 'Apr','Jun','Nov'];
		$arr_31 = ['Jan','Mar','May','Jul','Aug','Oct','Dec'];
	
		if (in_array($m, $arr_30)) {
			$mtotal = 30;
		}
		if (in_array($m, $arr_31)){
			$mtotal = 31;
		}
		else {
			$mtotal = 28;
		}
		
		if (in_array($cm, $arr_30)) {
			$cmtotal = 30;
		}
		if (in_array($cm, $arr_31)) {
			$cmtotal = 31;
		}
		else {
			$cmtotal = 28;
		}
	
		$prev_date = ($y*365)+($ind_m*$mtotal)+($d);
		$cur_date = ($cy*365)+($ind_cm*$cmtotal)+($cd);
		
		if ($cur_date > $prev_date) { 
			$days = $cur_date - $prev_date;
			if ($days > 1) {
				if ($days > 7) {
					return $wkd.' '.$d.' '.$m.', '.$y;
				}else {
					return $days.' days ago';
				}
			}else {
				return 'Yesterday';
			}
		}else{
		
			if ($ch > $h) {
				$i = $ch - $h;
				if ($i>1){
					return $i.' hours ago.';
				}else{
						return $i.' hour ago';
					}
				}
		
				if ($cmin > $min) {
					$i = $cmin - $min;
					if ($i>1){
						return $i.' minutes ago.';
					}else{
						return $i.' minute ago';
					}
			}
		
			else {
					return 'Just now';
			}
		}

   }









   public static function compress($file, $destination, $quality) {

        $source = $file['tmp_name'];

        $info = getimagesize($source);
        
        if ($info[0]>=250 && $file['size'] >= 350000) {
             $x = ceil($info[0]/7);
             $y = ceil($info[1]/7);
        }else {
        	$x=$info[0];
        	$y=$info[1];
        }

        if ($info['mime'] == 'image/jpeg') {
            $image =  imagecreatefromjpeg($source);
        }
        elseif ($info['mime'] == 'image/png') {
            $image =  imagecreatefrompng($source);
        }
        elseif ($info['mime'] == 'image/gif') {
            $image =  imagecreatefromgif($source);
        }

        $blank = imagecreatetruecolor($x, $y);

        imagecopyresized($blank, $image, 0, 0, 0, 0, $x, $y, $info[0], $info[1]);

        return imagejpeg($blank, $destination, $quality);

    }





    



    public static function updatesitemap() 
    {
    	$posts = \App\Post::all();
    	$users = \App\User::all();
    	
    	$xmlfile = '<urlset xmlns="http://www.google.com/schemas/sitemap/0.84" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('index').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('about').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>0.80</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('contact').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>0.80</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('sports').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('tech').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('business').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('gist').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('entertainment').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('politics').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('campus').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		$xmlfile .= '<url>'."\n";
		$xmlfile .= '<loc>'.route('blogs').'</loc>'."\n";
		$xmlfile .= '<changefreq>daily</changefreq>'."\n";
		$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
		$xmlfile .= '<priority>1.00</priority>'."\n";
		$xmlfile .= '</url>'."\n";
		
		
		foreach($posts as $post) {
			$xmlfile .= '<url>'."\n";
			$xmlfile .= '<loc>'.route('index').'/'.$post->custom_id.'</loc>'."\n";
			$xmlfile .= '<changefreq>daily</changefreq>'."\n";
			$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
			$xmlfile .= '<priority>1.00</priority>'."\n";
			$xmlfile .= '</url>'."\n";
		}
		foreach($users as $user) {
			$xmlfile .= '<url>'."\n";
			$xmlfile .= '<loc>'.route('index').'/profile/'.$user->id.'</loc>'."\n";
			$xmlfile .= '<changefreq>daily</changefreq>'."\n";
			$xmlfile .= '<lastmod>'.date('Y-m-d\TH:i:sP').'</lastmod>'."\n";
			$xmlfile .= '<priority>1.00</priority>'."\n";
			$xmlfile .= '</url>'."\n";
		}
		
		$xmlfile .= '</urlset>';
		
		$file = fopen('sitemap.xml', 'w');
		fwrite($file, $xmlfile);
		fclose($file);
			
    }
    








    public static function sendMail($reciever, $subject, $body) 
	{
		include "mailer.php";
		return publicMail($reciever, $subject, $body);
	}
	
	
	
	
	
	
	
	
	public static function getHtml($arg) {
		include "simplehtmldom/simple_html_dom.php";
		
		return file_get_html($arg);
	
	}







	public static function filterPost($arg) {
		$body = preg_replace("/##web|##b|##h|##u|##ch|##cc|##cj|##a|##img|##cen|##i|##c/", "", $arg);
		$body = preg_replace("/#web|#b|#h|#i|#u|#l|#c|#ch|#cc|#cj|#a|a#|#img|img#|#cen|#i|#c/", "", $body);

		return $body;
	}
	
	
	
	public static function customizePost($arg) {
	    $main = htmlspecialchars($arg);
	    
	    $main=str_replace("##web", '" style="width:100%;height:100%;position:fixed;top:0px;left:0px;z-index:99;"></iframe>', $main);
	    $main=str_replace("#web", '<iframe src="', $main);
	    
	    $main=str_replace("##img", '" /></center>', $main);
	    $main=str_replace("img#", '" src="', $main);
	    $main=str_replace("#img", '<center><img style="width:70%" class="img-responsive" alt="', $main);
	    
	    $main= str_replace("##aud", '"></audio>', $main);
	    $main=str_replace("#aud",'<audio controls><source src="', $main);
	    
	    
	    // $main = preg_replace('@(https?://([-\w\.]+[-\w])+(:\d+)?(/([\w/_\.#-]*(\?\S+)?[^\.\s])?)?)@', '<a href="'.route('url').'?link='.'$1" title="" target="_blank" >$1</a>', $main);
	    
	    $main=str_replace("##cen", "</center>", $main);
	    $main=str_replace("#cen", "<center>", $main);
	    $main=str_replace("##b", "</strong>", $main);
	    $main=str_replace("#b", "<strong>", $main);
	    $main=str_replace("##h", "</h3>", $main);
	    $main=str_replace("#h", "<h3>", $main);
	    $main=str_replace("##i", "</em>", $main);
	    $main=str_replace("#i", "<em>", $main);
	    $main=str_replace("##u", "</u>", $main);
	    $main=str_replace("#u", "<u>", $main);
	    $main=str_replace("#l", "<hr/>", $main); 
	    
	    $main=str_replace("##ch", '</code></pre>', $main);
	    $main=str_replace("#ch", '<pre><code class="language-html">', $main);
	    
	    $main=str_replace("##cc", '</code></pre>', $main);
	    $main=str_replace("#cc", '<pre><code class="language-css">', $main);
	    
	    $main=str_replace("##cj", '</code></pre>', $main);
	    $main=str_replace("#cj", '<pre><code class="language-js">', $main);
	    
	    $main=str_replace("##c", "</code>", $main);
	    $main=str_replace("#c", "<code style='color:black;background-color:white;'>", $main);
	    
	    $main=str_replace("##a", "</a>", $main);
	    $main=str_replace("a#", '">', $main);
	    $main=str_replace("#a", '<a target="_blank" href="'.route("url").'?link=', $main);
	 
	    return $main;
	}






	public static function randomFetch(
		$count, // The number of content to fetch
		$column, // The Column to compare with value
		$value, // The value to the column
		$used_arr, // The list of used id
		$table='post' // The model to fetch from 
	) {

		$model = strtolower($table);

		$post_group = [];
		if ($model == 'Comment') {
			$max_post = \App\Comment::orderBy('id', 'DESC')->firstOrFail();
		}else{
			$max_post = \App\Post::orderBy('id', 'DESC')->firstOrFail();
		}


		for ($i=1; $i<=$count; $i++) {
			while (true) {
				$rand_num = rand(1, $max_post->id);
				if ($model == 'Comment') {
					$post = \App\Comment::where('id', $rand_num)->first();
				}else{
					$post = \App\Post::where('id', $rand_num)->first();
				}
				if ($post != null && $post->$column != $value && !in_array($post->id, $used_arr)) {
					array_push($used_arr, $post->id);
					array_push($post_group, $post);
					break;
				}
			}
		}


		return [$post_group, $used_arr];
	}





	public static function checkNotification() {
		$notification = \App\Notification::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->where('status', '!=', 'read')->first();
			if ($notification != null) {
				return true;
			}else{
				return false;
			}
	}


}