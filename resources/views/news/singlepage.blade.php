<?php $thumbnail = str_replace('assets/post', 'assets/thumbnail', $post->file) ?>
<?php $filtered = \App\Custom::filterPost($post->body) ?>
@extends('layouts.app')

@section('title')

<title>{{ $post->title }}</title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Baloo+Paaji+2:wght@500&family=Manrope&family=Ubuntu:wght@500&display=swap" rel="stylesheet">
<meta name="keyword" content="{{ preg_replace('/ /', ', ',  $post->title) }}" />
<meta name="description" content="{{ substr($filtered, 0, 155) }}">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content="{{ $post->title }}" />
<meta property="og:description" content="{{ substr($filtered, 0, 155) }}" />
<meta property="og:url" content="{{ route('index') }}/{{ $post->custom_id }}" />
<meta property="og:site_name" content="Newstractor" />
<meta property="og:image" content="{{ route('index') }}/storage/{{ $thumbnail }}" />
<meta property="og:image:secure_url" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="450" />
<meta property="og:image:alt" content="{{ substr($post->title, 0, 100) }}" />
<meta property="article:tag" content="{{ preg_replace('/ /', ', ',  substr($post->title, 0, 200)) }}" />
<meta property="article:section" conqtent="{{ $post->category }}" />
<meta property="article:published_time" content="{{ $post->created_at }}" />
<meta property="article:modified_time" content="{{ $post->updated_at }}" />
<meta property="article:author" content="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}" />
<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="{{ $post->title }}" />
<meta property="twitter:description" content="{{ substr($filtered, 0, 155) }}" />
<meta property="twitter:url" content="{{ route('index') }}/{{ $post->custom_id }}" />
<meta property="twitter:image" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta property="twitter:image:width" content="800" />
<meta property="twitter:image:height" content="450" />
<meta property="twitter:image:alt" content="{{ substr($post->title, 0, 100) }}" />

<meta property="profile:username" content="{{ $post->user->name ?? '' }}" />
<link rel="image_src" href="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta itemprop="image" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta name="msapplication-TileImage" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/themes/prism.min.css"
/>
<script src="https://apis.google.com/js/platform.js"></script>
<!--webfont-->

@endsection

@section('heading')
    <h1 style="font-size:0.1px;width:0px;height:0px;overflow:hidden;">{{ substr($post->title, 0, 55) }}</h1>
    <h2 style="font-size:0.1px; width:0px;height:0px;overflow:hidden;">{{ $post->title }}</h2>
    <p style="font-size:0.1px; width:0px;height:0px;overflow:hidden;">{{ \App\Custom::customizePost($post->date) }}</p>

@endsection

@section('content')

<div class="blog-main-content">
    <div class="col-md-9 total-news">

        <div class="grids">
            <div class="grid box">
                <div class="grid-header">
                <h4 style="margin-bottom:10px">
                  <a class="more" href="{{ route('index') }}/search/?q={{ $post->category }}" title="">{{ strtoupper($post->category) }}</a>
                </h4>
                    <a class="gotosingle" href="{{ route('index') }}/{{ $post->custom_id }}" title="{{$post->title}}">{{ $post->title }}</a>
                    <ul>
                        <li><span>Post by <a
                                    href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}" title="{{ $post->user->name }}">{{ $post->user->name }}</a>
                                 {{ \App\Custom::customdate($post->date) }} </span>
                        </li>
                        <li><a href="#" title="">{{ $post->comment->count() }}
                                {{ $post->comment->count()>1?'Comments':'Comment' }}</a></li>
                    </ul>
                </div>
                <div class="singlepage">
                    <a href="#" title=""><img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}"
                            alt="{{ $post->title }}" /></a>

                    <h5 style="font-weight:normal;"><span style="color: #535353;font-size:14px;white-space:pre-wrap; font-family: Manrope, 'Open Sans', sans-serif;"><?php echo \App\Custom::customizePost($post->body) ?></span></h5>
                 
                </div>
                <div class="comments">
                    <ul class="link-ul" style="display: flex; align-items:center;">
                        @auth
                        <li>
                            <strong id="like-count">{{ $post->like->count() }}</strong><a class="hvr-icon-bounce col-22"
                                style="cursor:pointer;" post="{{ $post->id }}" title="Like" id="like">
                                <i id="like-font" style="font-size: 25px"
                                    class="fa {{ $likepost?'fa-thumbs-up':'fa-thumbs-o-up' }} font-awesome font-awesome-like"></i>
                            </a>
                        </li>
                        @else
                        <li><strong id="like-count">{{ $post->like->count() }}</strong><a class="hvr-icon-bounce" href="#"
                                id="sub-a" title="Like Post">
                                <i style="font-size: 25px" class="fa fa-thumbs-o-up font-awesome font-awesome-like"></i>
                            </a></li>
                        @endauth
                        <li>{{ $post->view->count() }}<a
                                 id="sub-a" title="Views">
                                <i style="font-size: 20px; box-shadow: none;padding-left:0px;margin-left:0px;" class="fa fa-eye font-awesome font-awesome-like"></i>
                            </a></li>
                        <!-- <li id="sh-phone">
                            <strong style="cursor:pointer;" onclick="sharePost()" title="Share Post">
                                <i style="font-size: 25px" onclick="sharePost()" class="fa fa-share font-awesome font-awesome-blue"></i>
                            </strong>
                        </li> -->
                        <script>
                            function sharePost() {
                            navigator.share({ 
                                    title: "{{ $post->title }}",
                                    text: "",
                                    url: "{{ route('index') }}/{{ $post->custom_id }}",
                           });
                            }
                        </script>

                        @can('update', $post)
                        <li><a href="{{ route('index') }}/post/{{ $post->id }}/edit" title="Edit Post">
                                <i style="font-size: 25px" class="fa fa-edit font-awesome-green"></i>
                            </a></li>
                        <li><a href="{{ route('index') }}/post/{{ $post->id }}/delete" id="delete" title="Delete Post">
                                <i style="font-size: 25px" class="fa fa-trash-o font-awesome-red"></i>
                            </a></li>
                        @endcan
                    </ul>
                </div>
            </div>

            <div class="clearfix"> </div>
        </div>

        <div>
            <p>Like this article? Share with your friends.</p>
            <div class="social" style="margin: 10px;">
            <ul style="word-spacing: 2rem; text-align: center;">
               <li>
                  <a href="http://www.facebook.com/sharer/sharer.php?u={{ route('index') }}/{{ $post->custom_id }}" target="_blank" title="Share on Facebook">
                    <i class="fa fa-facebook" aria-hidden="true"></i> 
                  </a>
               </li>
               <li>
                <a href="http://twitter.com/share?url={{ route('index').'/'.$post->custom_id }}%0A%0A{{ substr($filtered, 0, 250) }}" target="_blank" title="Share on Twitter">
                    <i class="fa fa-twitter" aria-hidden="true"></i> 
                </a>
               </li>
               <li>
                <a href="whatsapp://send?text={{ urlencode(substr($filtered, 0, 250)) }}%20{{ strlen($filtered)>250?'...':'' }}%0A%0A{{ route('index').'/'.$post->custom_id }}" target="_blank" title="Share on WhatsApp">
                    <i class="fa fa-whatsapp" aria-hidden="true"></i> 
                </a>
               </li>
           </ul>
       </div>
       <p>Please SUBSCRIBE to our Youtube Channel to get Our Tutorial Videos </p>
       <center>
       <div class="g-ytsubscribe" data-channelid="UCtjowJUDHz7cEkn6cJhDKcA" data-layout="full" data-count="default"></div>
       </center>
        <div class="story-review">
            <h4>REVIEW:</h4>
            <span style="color:black"> 
            Do you want to be hit blunt by latest happenings around the world🌐, campus news, latest cash💸💵, sim or data tricks and code📲📞, receive funny and relatable twitter highlights😂💯, engage in intellectual discourse💯💯 and yeah, win massive occasional giveaways😋😋? Then, Click <a href="https://api.whatsapp.com/send/?phone=%2B2348105902536&text=Hi%20I%20want%20to%20view%20your%20status." target="_blank">here</a> to connect with our Whatsapp Broadcast📞📲  in order to be among the first person to see our daily WhatsApp status  !😇 
<br>
We also have a large media outreach to <b>promote your business, music, blog, Instagram, twitter, etc..</b> at a very <b>affordable rate.</b> 📌


Newstractor Media 📝📌🌐
            </span>
        </div>

        <ul class="comment-list img-responsive">
            <h5 class="post-author_head">Written by <a
                    href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}"
                    title="Posts by admin" rel="author">{{ $post->user->name }}</a></h5>
            <li class="list-com">
                <a href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}"
                    title="View {{ $post->user->name }}'s Profile">
                    <div class="img-cont img-responsive">
                        <img src="{{ route('index') }}/storage/{{ $post->user->profile->avatar ?? 'assets/default/avatar.png' }}"
                            alt="{{ $post->user->name }}" class="img-responsive" style="width: 150px">
                    </div>
                </a>
                <div class="desc img-reponsive" style="margin-left: 1rem;">

                    <p><span style="color: gray">{{ $post->user->post->count() }}
                            {{ $post->user->post->count()>1?'Articles':'Article' }}, {{ $post->user->follow->count() }}
                            {{ $post->user->follow->count()>1?'Followers':'Follower' }} </span><br> View all posts by:
                        <a href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}#view"
                            title="Posts by admin" rel="author">{{ $post->user->name }}</a></p>
                </div>
                <div class="desc img-responsive" style="margin-left: 1rem">
                    <p style="font-size: 13px;">{{ $post->user->profile->description ?? '' }}</p>
                    <p>
                    		<div class="social">
									<ul>
										@if($post->user->profile->facebook != null)
										<li><a href="{{ $post->user->profile->facebook }}" target="_blank" title=""><i
													class="fa fa-facebook" aria-hidden="true"></i> </a></li>
										@endif
										@if($post->user->profile->twitter != null)
										<li><a href="{{ $post->user->profile->twitter }}" target="_blank" title=""><i
													class="fa fa-twitter" aria-hidden="true"></i> </a></li>
										@endif
										@if($post->user->profile->instagram != null)
										<li><a href="{{ $post->user->profile->instagram }}" target="_blank" title=""><i
													class="fa fa-instagram" aria-hidden="true"></i> </a></li>
										@endif

										<!-- <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li> -->
									</ul>
								</div>
                    </p>
                </div>
                <div class="clearfix"></div>
            </li>
        </ul>



        <h6 id="top"><br></h6>
        @if($postcomment->count()>0)
        <h3 class="recent-comm">Recent Comments</h3>
        @endif
        <?php $i=$postcomment->count(); $eq=0; ?>
        @foreach ($postcomment as $comment)
        @if($i<=1) <h6 id="comment"><br></h6>
            @endif
            <ul class="comment-list" id="comm{{ $eq }}" style="padding: 5px; margin:0px;border:none;">
                <div class="media img img-responsive" id="media-div">
                    @can('update', $comment)
                    <span id="del-link" onclick="delComm({{ $comment->id }}, {{ $eq }})">Delete</span>
                    @endcan
                    <a href="{{ route('index') }}/profile/{{ $comment->user->username ?? $comment->user->id}}"
                        title="View {{ $comment->user->name }}'s Profile">
                        <img src="{{ route('index') }}/storage/{{ $comment->user->profile->avatar ?? 'assets/default/avatar.png' }}"
                            id="media-object2" class="media-object img-thumbnail" alt="{{ $comment->user->name }}">
                        <span id="name-span">{{ $comment->user->name }}<br></span>
                        <span id="date-span">
                            {{ \App\Custom::customdate($comment->date) }}
                        </span><br>
                    </a>
                    <div class="media-body" id="media-body-div">
                        <p id="com-pre"><?php echo \App\Custom::customizePost($comment->comment) ?></p>
                    </div>
                </div>
            </ul>
            <?php $i--; $eq++; ?>
            @endforeach


            <!-- Pagination -->
            @if($post->comment->count()>5)
            <div style="margin-right: 4rem;">
                <ul class="pagination">
                    <li><a href="{{ route('index') }}/{{ $post->custom_id }}?__pgn={{ $pagin }}&dir=prev#top" title="">&laquo;
                            Prev</a></li>
                    <li><a href="{{ route('index') }}/{{ $post->custom_id }}?__pgn={{ $pagin }}&dir=next#top" title="">Next
                            &raquo;</a></li>
                </ul>
            </div>
            @endif

            <div class="content-form">
                <h3>Leave a comment</h3>
                <form action="/comment/{{ $post->id }}" method="POST">
                    @csrf
                    <textarea placeholder="Comment here.." name="comment" maxlength="2000"></textarea>
                    @error('comment')
                    <span class="has-error">{{ $message }}</span><br><br>
                    @enderror
                    @auth
                    <input type="submit" value="SEND" />
                    @else
                    <input type="submit" value="SEND" id="sub-b" />
                    <script>
                    $('#sub-b').click(function(e) {
                        e.preventDefault();
                        $('#modal_trigger').trigger('click');
                    });
                    $('#sub-a').click(function(e) {
                        e.preventDefault();
                        $('#modal_trigger').trigger('click');
                    });
                    </script>
                    @endauth

                </form>
            </div>
        </div>
    </div>

    <div class="col-md-3 side-bar">
        <div class="l_g_r">
            @if (count($mightlike)>0)
            <div class="might">
                <h4>You might also like</h4>
                @foreach ($mightlike as $post)
                <div class="might-grid">
                    <div class="grid-might">
                        <a href="{{ route('index') }}/{{ $post->custom_id }}" title=""><img
                                src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" class="img-responsive"
                                alt="{{ $post->title }}" /></a>
                    </div>
                    <div class="might-top">
                        <p>
                            {{ substr($post->title, 0, 50) }}
                            {{ strlen($post->title)>50?'...':'' }}
                        </p>
                        <a href="{{ route('index') }}/{{ $post->custom_id }}" title="">Read More<i> </i></a>
                    </div>
                    <div class="clearfix"></div>
                </div>
                @endforeach
            </div>
            @endif
            @if (count($featured)>0)
            <div class="featured">
                <h3>Featured News</h3>
                <hr>
                <ul>
                    @foreach ($featured as $post)
                    <li>
                        <a href="{{ route('index') }}/{{ $post->custom_id }}" title="">
                            <div class="video" style="border: 2px solid white;overflow:hidden">
                                <img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
                                    class="img-responsive">
                            </div>
                        </a>
                    </li>
                    @endforeach
                    <div class="clearfix"></div>
                </ul>
            </div>
            @endif
            @if (count($popular)>0)
            <div class="popular mpopular">
                <div class="main-title-head">
                    <h5>popular</h5>
                    <h4> Most read</h4>
                    <div class="clearfix"></div>
                </div>
                <div class="popular-news">
                    @foreach ($popular as $post)
                    <div class="popular-grid">
                        <i>
                            {{ \App\Custom::customdate($post->date) }}
                        </i>
                        <p>{{ substr($post->title, 0, 70) }}
                            {{ strlen($post->title)>70?'...':'' }}
                            <a href="{{ route('index') }}/{{ $post->custom_id }}" title="">Read More</a>
                        </p>
                    </div>
                    @endforeach
                </div>
            </div>
            @endif

            @if (count($recentpost)>0)
            <div class="posts">
                <h4>Recent posts</h4>
                @foreach ($recentpost as $post)
                <h6 style="margin-bottom: 1rem;"><a
                        href="{{ route('index') }}/{{ $post->custom_id }}" title="">{{ substr($post->title, 0, 50) }}
                        {{ strlen($post->title)>50?'...':'' }}</a></h6>
                @endforeach
            </div>
            @endif

            @if (count($recentcomment)>0)
            <div class="recent-comments">
                <h4>Recent Comments</h4>
                @foreach ($recentcomment as $comment)
                <h6 style="margin-bottom: 1rem;"><a href="{{ route('index') }}/{{ $comment->post->custom_id }}" title="">
                        {{ substr($comment->comment, 0, 30) }}
                        {{ strlen($comment->comment)>30?'...':'' }}
                        <span>on</span>
                        {{ substr($comment->post->title, 0, 30) }}
                        {{ strlen($comment->post->title)>30?'...':'' }}
                    </a></h6>
                @endforeach
            </div>
            @endif

        </div>
    </div>
    <div class="clearfix"></div>
</div>
<script>
document.getElementById('delete').addEventListener('click', function(e) {
    e.preventDefault();
    var conf = confirm('Do you really want to delete this post?');
    if (conf == true) {
        location.href = this.href;
    }
});
</script>
<script>
function delComm(id, eq) {
    var conf = confirm('Do you really want to delete this comment?');
    if (conf == true) {
        // location.href = '/comment/' + id + '/delete';
        xhr = new XMLHttpRequest();
        xhr.open('GET', '/comment/' + id + '/delete');
        xhr.onload = function() {
            if (this.status == 200) {
                $('#comm'+eq).css('display', 'none');
            }
        }
        xhr.send();
    }
}
</script>
<script>
$('#like').click(function(e) {
    e.preventDefault();
    var like = $('#like-font');
    if (like.hasClass('fa-thumbs-up')) {
        like.removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
    } else {
        like.removeClass('fa-thumbs-o-up').addClass('fa-thumbs-up');
    }
    var id = $(this).attr('post');
    xhr = new XMLHttpRequest();
    xhr.open('GET', '/post/' + id + '/like');
    xhr.onload = function() {
        if (this.status == 200) {
            var response = JSON.parse(this.responseText);
            $('#like-count').html(response.count);
        }
    }
    xhr.send();
});
</script>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f63e20d479afa92">
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.5.0/prism.min.js"></script>

@endsection




