@extends('layouts.app')


@section('title')

<title>Newstractor - Global Breaking news updates, Latest news headlines | Sports </title>'
<meta name="keyword" content="newstractor, news, politics, breaking news, updates, trending" />
<meta name="description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="og:description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
<meta property="og:url" content="{{ route('sports') }}" />
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
		<section class="slider">
			<div class="flexslider">
				<ul class="slides">
					@foreach($slide as $post)  
					<li>
						<a href="{{ route('index') }}/{{ $post->custom_id }}">
						<div class="pic-box-sport" class="img-responsive">
							<img class="img-responsive" src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}">
						</div>
						</a>
					</li>
					@endforeach
				</ul>
			</div>
		</section>
		<!-- FlexSlider -->
		<script defer src="js/jquery.flexslider.js"></script>
		<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
		<script type="text/javascript">
			$(function () {
				SyntaxHighlighter.all();
			});
			$(window).load(function () {
				$('.flexslider').flexslider({
					animation: "slide",
					start: function (slider) {
						$('body').removeClass('loading');
					}
				});
			});
		</script>
		<div class="sports-top">
			<div class="s-grid-left">
				<div class="cricket">
					<h3>Latest Article</h3>
					@foreach ($latest as $post)
					<div class="c-sports-main">
						<div class="c-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="c-text">
							<p>Latest Article</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
					@foreach ($latest2 as $post)
					<div class="s-grid-small">
						<div class="sc-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive" style="height: 90px">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="sc-text">
							<p>Latest Article</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="s-grid-right">
				<div class="cricket">
					<h3>World Wide</h3>
					@foreach ($worldwide as $post)
					<div class="c-sports-main">
						<div class="c-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="c-text">
							<p>World Wide</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
					@foreach ($worldwide2 as $post)
					<div class="s-grid-small">
						<div class="sc-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive" style="height: 90px">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="sc-text">
							<p>World Wide</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="sports-top">
			<div class="s-grid-left">
				<div class="cricket">
					<h3>Recent</h3>
					@foreach ($worldwide as $post)
					<div class="c-sports-main">
						<div class="c-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="c-text">
							<p>Recent</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
					@foreach ($recent2 as $post)
					<div class="s-grid-small">
						<div class="sc-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive" style="height: 90px">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="sc-text">
							<p>Recent</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="s-grid-right">
				<div class="cricket">
					<h3>More</h3>
					@foreach ($more as $post)
					<div class="c-sports-main">
						<div class="c-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="c-text">
							<p>More</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
					@foreach ($more2 as $post)
					<div class="s-grid-small">
						<div class="sc-image">
							<a href="{{ route('index') }}/{{ $post->custom_id }}">
								<div class="img-cont-post img-responsive" style="height: 90px">
									<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
										class="img-responsive" />
								</div>
							</a>
						</div>
						<div class="sc-text">
							<p>More</p>
							<a class="power" href="{{ route('index') }}/{{ $post->custom_id }}">
								{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}
							</a>
							<a class="reu" href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
						</div>
						<div class="clearfix"></div>
					</div>
					@endforeach
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="photos">
			@if ($photos->count()>0)
			<h3>PHOTOS</h3>

			<div class="course_demo1">
				<ul id="flexiselDemo">
					@foreach ($photos as $post)
					<li>
						<a href="single">
							<div class="img-cont-post img-responsive">
								<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
									class="img-responsive" />
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
						visibleItems: 4,
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
	</div>
</div>
<div class="col-md-3 side-bar">
	@if ($videos->count()>0)
	<div class="videos">
		@foreach ($videos as $post)
		<div class="video-grid">
			<div class="video" style="border: 2px solid white;overflow:hidden">
				<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
					class="img-responsive">
			</div>
			<div class="video-name">
				<a href="{{ route('index') }}/{{ $post->custom_id }}">
					{{ substr($post->title, 0, 50) }}
					{{ strlen($post->title)>50?'...':'' }}
				</a>
			</div>
			<div class="clearfix"></div>
		</div>
		@endforeach
		<a class="more" href="#">More +</a>
		<div class="clearfix"></div>
	</div>
	@endif
	<div class="sign_up text-center" id="subscribe">
			<h3>Sign Up for Newsletter</h3>
			<p class="sign">Sign up to receive our free newsletters!</p>
			<form action="{{ route('index') }}/subscribe" method="GET">
				<input type="text" class="text" value="Name" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Name';}" disabled="true">
				<input type="text" class="text" name="email" value="Email Address" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Email Address';}" disabled="true">
				<input type="submit" value="submit" disabled="true">
			</form>
			<p class="spam">We do not spam. We value your privacy!</p>
		</div>
	<div class="clearfix"></div>
	@if ($popular->count()>0)
	<div class="popular">
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
					<a title="{{ route('index') }}/{{ $post->custom_id }}"
						href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
				</p>
			</div>
			@endforeach
			<a class="more" href="#">More +</a>
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

@endsection