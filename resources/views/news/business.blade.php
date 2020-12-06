@extends('layouts.app')


@section('title')

<title>Newstractor - Global Breaking news updates, Latest news headlines | Business </title>
<meta name="keyword" content="newstractor, news, politics, breaking news, updates, trending" />
<meta name="description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="og:description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
<meta property="og:url" content="{{ route('business') }}" />
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

<div class="main-content">
	<div class="col-md-9 total-news">
		@if($live->count()>0)
		<div class="live-market">
			<h3><span>live</span> market</h3>
			@foreach($live as $post)
			<?php $post->body = \App\Custom::filterPost($post->body) ?>
			<div class="bull">
				<a href="{{ route('index') }}/{{ $post->custom_id }}">
					<div class="pic-box" class="img-responsive">
						<img class="img-responsive" src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}">
					</div>
				</a>
			</div>
			<div class="bull-text">
				<a class="bull1" href="{{ route('index') }}/{{ $post->custom_id }}">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
				<p>{{ strlen($post->body)>300?substr($post->body, 0, 300).'...':$post->body }}</p>
			</div>
			@endforeach
			<div class="clearfix"></div>
		</div>
		@endif
		<div class="posts">
			<div class="left-posts">
				<div class="world-news">
					@if($world->count()>0)
					<div class="main-title-head">
						<h3>from around the world</h3>
						<a href="#">More +</a>
						<div class="clearfix"></div>
					</div>
					<div class="world-news-grids ">
						@foreach($world as $post)
						<?php $post->body = \App\Custom::filterPost($post->body) ?>
						<div class="world-news-grid img-responsive">
							<div class="img-cont-post img-responsive">
								<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}" class="img-responsive"/>
							</div>
							<a href="{{ route('index') }}/{{ $post->custom_id }}" class="title">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
							<p>{{ strlen($post->body)>95?substr($post->body, 0, 95).'...':$post->body }}</p>
							<a href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
					@endif
				</div>
				<div class="latest-articles">
					@if($latest->count()>0)
					<div class="main-title-head">
						<h3>latest articles</h3>
						<a href="#">More +</a>
						<div class="clearfix"></div>
					</div>
					<div class="world-news-grids">
						@foreach($latest as $post)
						<?php $post->body = \App\Custom::filterPost($post->body) ?>
						<div class="world-news-grid img-responsive">
							<div class="img-cont-post img-responsive">
								<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}" class="img-responsive"/>
							</div>
							<a href="{{ route('index') }}/{{ $post->custom_id }}" class="title">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
							<p>{{ strlen($post->body)>95?substr($post->body, 0, 95).'...':$post->body }}</p>
							<a href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						@endforeach
						<div class="clearfix"></div>
					</div>
					@endif
				</div>
				<div class="gallery">
					<div class="main-title-head">
						<h3>gallery</h3>
						<a href="#">More +</a>
						<div class="clearfix"></div>
					</div>
					<div class="gallery-images">
						@if ($galtop->count()>0)
						<div class="course_demo1">
							<ul id="flexiselDemo1">
								@foreach ($galtop as $post)
								<li>
									<a href="{{ route('index') }}/{{ $post->custom_id }}">
										<div class="img-cont-post img-responsive" style="height:120px;">
										<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}" />
										</div>
									</a>
								</li>
								@endforeach
							</ul>
						</div>
						@endif
						<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
						<script type="text/javascript">
							$(window).load(function () {
								$("#flexiselDemo1").flexisel({
									visibleItems: 3,
									animationSpeed: 1000,
									autoPlay: true,
									autoPlaySpeed: 3000,
									pauseOnHover: true,
									enableResponsiveBreakpoints: true,
									responsiveBreakpoints: {
										portrait: {
											changePoint: 480,
											visibleItems: 2
										},
										landscape: {
											changePoint: 640,
											visibleItems: 2
										},
										tablet: {
											changePoint: 768,
											visibleItems: 3
										}
									}
								});

							});
						</script>
						<script type="text/javascript" src="js/jquery.flexisel.js"></script>
					</div>
					@if ($galbottom->count()>0)
					<div class="course_demo1">
						<ul id="flexiselDemo">
							@foreach ($galbottom as $post)
								<li>
									<a href="{{ route('index') }}/{{ $post->custom_id }}">
										<div class="img-cont-post img-responsive" style="height:120px;">
										<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}" />
										</div>
									</a>
								</li>
							@endforeach
						</ul>
					</div>
					@endif
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
					<script type="text/javascript">
						$(window).load(function () {
							$("#flexiselDemo").flexisel({
								visibleItems: 3,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: {
									portrait: {
										changePoint: 480,
										visibleItems: 2
									},
									landscape: {
										changePoint: 640,
										visibleItems: 2
									},
									tablet: {
										changePoint: 768,
										visibleItems: 3
									}
								}
							});

						});
					</script>
					<script type="text/javascript" src="js/jquery.flexisel.js"></script>

				</div>
				<div class="tech-news">
					@if ($leftmore->count()>0)
					<div class="main-title-head">
						<h3>More To Read</h3>
						<a href="#">More +</a>
						<div class="clearfix"></div>
					</div>
					@endif
					<div class="tech-news-grids">
						<div class="left-tech-news">
							@foreach($leftmore as $post)
							<?php $post->body = \App\Custom::filterPost($post->body) ?>
							<div class="tech-news-grid span_66">
								<a href="{{ route('index') }}/{{ $post->custom_id }}">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
								<p>{{ strlen($post->body)>100?substr($post->body, 0, 100).'...':$post->body }}
								</p>
								<p>by <a href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}" style="text-transform: capitalize;">{{ $post->user->name }}</a> | {{ $post->comment->count() }}
								{{ $post->comment->count()>1?'Comments':'Comment' }}</p>
							</div>
							@endforeach
						</div>
						<div class="right-tech-news">
							@foreach($rightmore as $post)
							<?php $post->body = \App\Custom::filterPost($post->body) ?>
							<div class="tech-news-grid span_66">
								<a href="{{ route('index') }}/{{ $post->custom_id }}">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
								<p>{{ strlen($post->body)>100?substr($post->body, 0, 100).'...':$post->body }}
								</p>
								<p>by <a href="{{ route('index') }}/profile/{{ $post->user->username ?? $post->user->id}}" style="text-transform: capitalize;">{{ $post->user->name }}</a> | {{ $post->comment->count() }}
								{{ $post->comment->count()>1?'Comments':'Comment' }}</p>
							</div>
							@endforeach
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="right-posts">
				@if ($editorial->count()>0)
				<div class="editorial">
					<h3>editorial</h3>
					@foreach ($editorial as $post)
					<div class="editor">
						<a href="{{ route('index') }}/{{ $post->custom_id }}" class="img-cont-post">
							<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}" />
						</a>
						<a href="{{ route('index') }}/{{ $post->custom_id }}">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
					</div>
					@endforeach
				</div>
				@endif
			</div>
			<div class="clearfix"></div>
		</div>
	</div>

	<div class="col-md-3 side-bar">
		<div class="videos">
			@foreach ($maylike as $post)
			<div class="video-grid">
				<div class="video" style="border: 2px solid white;overflow:hidden">
					<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}" class="img-responsive">
				</div>
				<div class="video-name">
					<a href="{{ route('index') }}/{{ $post->custom_id }}">
						{{ substr($post->title, 0, 80) }}
						{{ strlen($post->title)>80?'...':'' }}
					</a>
				</div>
				<div class="clearfix"></div>
			</div>
			@endforeach
			<a class="more1" href="#">More +</a>
			<div class="clearfix"></div>
		</div>
		@auth 
		<div class="sign_up text-center" id="subscribe">
			<h3>Sign Up for Newsletter</h3>
			<p class="sign">Sign up to receive our free newsletters!</p>
			<form action="{{ route('index') }}/subscribe" method="GET">
				<input type="text" class="text" value="Name" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Name';}" @if(Auth::user()->subscribed()) disabled @endif>
				<input type="text" class="text" name="email" value="Email Address" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Email Address';}" @if(Auth::user()->subscribed()) disabled @endif>
				<input type="submit" value="submit" @if(Auth::user()->subscribed()) disabled @endif>
			</form>
			<p class="spam">We do not spam. We value your privacy!</p>
		</div>
		@else
		<div class="sign_up text-center" id="subscribe">
			<h3>Sign Up for Newsletter</h3>
			<p class="sign">Sign up to receive our free newsletters!</p>
			<form action="{{ route('index') }}/subscribe" method="GET">
				<input type="text" class="text" value="Name" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Name';}">
				<input type="text" class="text" name="email" value="Email Address" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Email Address';}">
				<input type="submit" value="submit">
			</form>
			<p class="spam">We do not spam. We value your privacy!</p>
		</div>
		@endauth
		<div class="clearfix"></div>
		@if ($popular->count()>0)
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
						<p>{{ substr($post->title, 0, 80) }}
							{{ strlen($post->title)>80?'...':'' }}
							<a title="{{ route('index') }}/{{ $post->custom_id }}" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</p>
					</div>
					@endforeach
				</div>
			</div>				
		@endif
		<div class="subscribe-now">
			<div class="discount">
				<a href="#subscribe">
					<div class="save">
						<p>Save</p>
						<p>upto</p>
					</div>
					<div class="percent">
						<h2>50%</h2>
					</div>
					<div class="clearfix"></div>
			</div>
			<h3 class="sn">subscribe now</h3>
			</a>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
</div>

@endsection