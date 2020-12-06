@extends('layouts.app')


@section('title')
<title>Notification - Newstractor</title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
<meta name="keyword" content="newstractor, news, politics, breaking news, updates, trending" />
<meta name="description"
    content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="og:description"
    content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
<meta property="og:url" content="{{ route('index') }}" />
<meta property="og:site_name" content="Newstractor" />
<meta property="og:image" content="{{ route('index') }}/storage/assets/default/icon.png" />
<meta property="og:image:secure_url" content="{{ route('index') }}/storage/assets/default/icon.png" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="450" />
<meta property="og:image:alt" content="" />
<meta property="article:tag" content="about, news, headlines, Newstractor" />
<meta property="article:section" content="" />
<meta property="article:published_time" content="" />
<meta property="article:modified_time" content="" />
<meta property="article:author" content="" />
<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="twitter:description"
    content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
<meta property="twitter:url" content="" />
<meta property="twitter:image" content="{{ route('index') }}/storage/assets/default/icon.png" />
<meta property="twitter:image:width" content="800" />
<meta property="twitter:image:height" content="450" />
<meta property="twitter:image:alt" content="" />

<meta property="profile:username" content="" />
<link rel="image_src" href="{{ route('index') }}/storage/assets/default/icon.png" />
<meta itemprop="image" content="{{ route('index') }}/storage/assets/default/icon.png" />
<meta name="msapplication-TileImage" content="{{ route('index') }}/storage/assets/default/icon.png" />


@endsection

@section('content')

<div class="profile">
    <div class="wrap">
        <br>
        <h3 class="search-result-head">
            Your Notifications
        </h3>

        <div class="profile-main img-responsive" style="width:700px;box-shadow:none;">
            @if($results->count()<1) 
            <h4 class="search-result-head text-center">
                You don't have any Notification yet!
            </h4>
                @else
                <?php $eq=0; ?>
                @foreach ($results as $notification)
                <div class="result-s mg-top @if($notification->status != 'read') result-r @endif">
                    @if($notification->status != 'read')<span class="bullet">&bullet;</span>@endif
                    <a href="{{ route('index') }}/notification/{{ $notification->id }}/mark/?link={{ route('index') }}{{ $notification->link }}"
                        class="search-head">
                        <h4>{{ $notification->message }}</h4>
                    </a>
                    <button class="badge pull-right" style="margin-left: 1rem; margin-top:5px; position:relative; bottom:5px; outline:none;" onclick="mark({{ $notification->id }}, {{ $eq }})">Mark as Read</button>
                    <span class="notidate" style="color: #696969">{{ \App\Custom::customdate($notification->date) }}</span>
                
                    
                </div>
                <?php $eq++; ?>
                @endforeach
                @endif


                @if($resultcount>20)
                <p class="text-center"><a class="btn btn-danger" href="{{ route('index') }}/notification?__pgn={{ $r }}&dir=more">See More</a></p>
                @endif
        </div>

    </div>
</div>


<script type="text/javascript">
    function mark(id, eq) {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/notification/'+id+'/ajaxMark', true);
        xhr.onload = function () {
            if (this.status == 200) {
                $('.mg-top').eq(eq).removeClass('result-r');
            }
        }
        xhr.send();
    }
</script>

@endsection