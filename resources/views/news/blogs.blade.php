@extends('layouts.app')


@section('title')

<title>Newstractor - Global Breaking news updates, Latest news headlines | Blogs </title>
<meta name="keyword" content="newstractor, news, politics, breaking news, updates, trending" />
<meta name="description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="og:description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
<meta property="og:url" content="{{ route('blogs') }}" />
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

<div class="blog-main-content">
	<div class="col-md-9 total-news">
		<!----start-content----->
		<div class="content">
			<div class="grids">
                @foreach ($blogs as $post)
                <?php $post->body = \App\Custom::filterPost($post->body) ?>
				<div class="grid box">
					<div class="grid-header">
						<a class="gotosingle" href="{{ route('index') }}/{{ $post->custom_id }}">{{ $post->title }}</a>
						<ul>
							<li><span>Post by <a href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}"> {{ $post->user->name }}</a> {{ \App\Custom::customdate($post->date) }} </span></li>
							<li><a href="#">{{ $post->comment->count() }}
                                {{ $post->comment->count()>1?'Comments':'Comment' }}</a></li>
						</ul>
					</div>
					<div class="grid-img-content">
						<a href="{{ route('index') }}/{{ $post->custom_id }}"><img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" class="blog img-responsive" alt="{{ $post->title }}" style="width:400px;" /></a>
						<p>{{ substr(($post->body), 0, 500) }} {{ strlen($post->body)>500?'...':'' }}</p>
						<div class="clearfix"> </div>
					</div>
					<div class="comments">
						<ul>
							<li><a class="readmore" href="{{ route('index') }}/{{ $post->custom_id }}">ReadMore</a></li>
						</ul>
					</div>
				</div>
				<hr>
				<br>
				@endforeach
			</div>
			<div class="clearfix"></div>
			<div class="content-pagenation">
				<li><a href="{{ route('search') }}/?q=blogs">&laquo; Prev</a></li>
				<li><a href="{{ route('search') }}/?q=blogs">1</a></li>
				<li><a href="{{ route('search') }}/?q=blogs">2</a></li>
				<li><a href="{{ route('search') }}/?q=blogs">3</a></li>
				<li><span>....</span></a></li>
				<li><a href="{{ route('search') }}/?q=blogs">Next &raquo;</a></li>
				<div class="clearfix"> </div>
			</div>
			<div class="clearfix"> </div>

		</div>
	</div>
	<div class="col-md-3 side-bar">
        <div class="l_g_r">
            @if ($mightlike->count()>0)
            <?php $post->body = \App\Custom::filterPost($post->body) ?>
            <div class="might">
                <h4>Blogs You Might Like</h4>
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
            @if ($featured->count()>0)
            <?php $post->body = \App\Custom::filterPost($post->body) ?>
            <div class="featured">
                <h3>Featured Blogs</h3>
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
            @if ($popular->count()>0)
            <?php $post->body = \App\Custom::filterPost($post->body) ?>
            <div class="popular mpopular">
                <div class="main-title-head">
                    <h5>popular</h5>
                    <h4> Blogs</h4>
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

		</div>
	</div>
	<div class="clearfix"></div>
</div>

@endsection

