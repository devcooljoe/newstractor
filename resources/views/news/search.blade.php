@extends('layouts.app')


@section('title')
<title>Search Results For "{{ $q }}"</title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
<meta name="keyword" content="newstractor, news, politics, breaking news, updates, trending" />
<meta name="description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="og:description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
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
<meta property="twitter:description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
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
            Search Results For "{{ $q }}"
        </h3>

        <div class="profile-main img-responsive" style="width:700px;box-shadow:none;">
            @if($count<=0)
            <h4 class="search-result-head text-center">No Result Found!</h4>
            @endif
            @if ($model == 'post')
                @foreach ($results as $result)
                <?php $result->body = \App\Custom::filterPost($result->body) ?>
                <div class="result-s">
                    <a href="{{ route('index') }}/{{ $result->custom_id }}" class="search-head">
                        <h4>{{ strlen($result->title)>95?substr($result->title, 0, 95).'...':$result->title }}</h4>
                    </a>
                    <p class="search-parag">{{ strlen($result->body)>170?substr($result->body, 0, 170).'...':$result->body }}</p>
                </div>
                @endforeach
            @else 
                @foreach ($results as $user)
                <div class="result-s">
                    <a href="{{ route('index') }}/profile/{{ $user->username ?? $user->id}}" class="search-head">
                        <h4>{{ $user->name }} - {{ $user->profile->title }}</h4>
                    </a>
                    <p class="search-parag">{{ $user->profile->description }}</p>
                </div>
                @endforeach
            @endif
            
            
            @if($count>10)
            <ul class="pagination pagination-sm">
                <li><a href="{{ route('index') }}/search?q={{ $q??'' }}&__pgn={{ $pagin }}&dir=next">&laquo; Prev</a></li>
                
                @for($i=0;$i<$list;$i++)
                @if(($i+1)*10-10 == $pagin-10)
                <li><span style="color:black;">{{ $i+1 }}</span></li>
                @else
                <li><a href="{{ route('index') }}/search?q={{ $q??'' }}&__pgn={{ ($i+1)*10-10 }}&dir=next">{{ $i+1 }}</a></li>
                @endif
                @endfor
				<li><a href="{{ route('index') }}/search?q={{ $q??'' }}&__pgn={{ $pagin }}&dir=prev">Next &raquo;</a></li>
            </ul>
            @endif
        </div>
        
	</div>
</div>

@endsection