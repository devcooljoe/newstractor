<?php $user->profile->avatar == null?$thumbnail='assets/default/avatar.png':$thumbnail = str_replace('assets/avatar/', 'assets/thumbnail/', $user->profile->avatar) ?>
@extends('layouts.app')

@section('title')

<title>
	@can('update', $user->profile) Your Profile @else {{ $user->name }}'s Profile @endcan - Newstractor
</title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
<meta name="keyword" content="{{ $user->name }}, {{ preg_replace('/ /', ', ',  $user->profile->title) }}" />
<meta name="description" content="{{ $user->profile->description }}">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="profile" />
<meta property="og:title" content="{{ $user->name }} - {{ $user->profile->title }}" />
<meta property="og:description" content="{{ $user->profile->description }}" />
<meta property="og:url" content="{{ route('index') }}/profile/{{ $user->username ?? $user->id}}" />
<meta property="og:site_name" content="NewsTractor" />
<meta property="og:image" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta property="og:image:secure_url" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="450" />
<meta property="og:image:alt" content="{{ $user->name }}" />
<meta property="article:tag" content="{{ $user->name }}, {{ preg_replace('/ /', ', ',  $user->profile->title) }}" />
<meta property="article:section" content="" />
<meta property="article:published_time" content="{{ $user->profile->created_at }}" />
<meta property="article:modified_time" content="{{ $user->profile->updated_at }}" />
<meta property="article:author" content="{{ $user->name }}" />
<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="{{ $user->name }} - {{ $user->profile->title }}" />
<meta property="twitter:description" content="{{ $user->profile->description }}" />
<meta property="twitter:url" content="{{ route('index') }}/profile/{{ $user->username ?? $user->id}}" />
<meta property="twitter:image" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta property="twitter:image:width" content="800" />
<meta property="twitter:image:height" content="450" />
<meta property="twitter:image:alt" content="{{ $user->profile->title }}" />

<meta property="profile:username" content="{{ $user->username }}" />
<link rel="image_src" href="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta itemprop="image" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />
<meta name="msapplication-TileImage" content="{{ route('index') }}/storage/{{ $thumbnail ?? '' }}" />

<!--webfont-->

@endsection

@section('content')

<div class="main-content">

	<div class="col-md-9 total-news">
		<div class="classifieds bg-profile">
			<h3>
				@can('update', $user->profile) Your Profile @else {{ $user->name }}'s Profile @endcan
			</h3>
			<div class="profile">
				<div class="wrap">
					<div class="profile-main img-responsive">
						<div class="profile-pic wthree">
							<p style="width: 100%">
							@can('update', $user->profile)
								<a href="{{ route('index') }}/profile/{{ $user->username ?? $user->id}}/edit"
									class="pull-right btn btn-danger btn-sm" style="color:black;"><i
										class="fa fa-edit"></i>
									Edit</a></p>
							@else
								@if($user->admin())
								@auth
								<div class="pull-right">
								 <button class="btn btn-danger followBtn" id="followBtn">{{ $button }}</button>
								</div>
								@else
								<div class="pull-right">
								 <button class="btn btn-danger" id="followBtn2">Follow</button>
								</div>
								@endauth
								@endif
							@endcan
							<script type="text/javascript">
								$('#followBtn2').click(function(){
									$('#modal_trigger').trigger('click');
								});
							</script>
							<br><br><br>
							<center>
								<div class="img-cont">
									<img src="{{ route('index') }}/storage/{{ $user->profile->avatar ?? 'assets/default/avatar.png' }}"
										alt="{{ $user->name }}">
								</div>
							</center>


							@if($user->admin())
							<div class="" style="align-items: top;">
								<strong class="label label-primary pull-left" id="followText">{{ $follower }} {{ $follower>1?'Followers':'Follower' }}</strong>
								<strong class="label label-primary pull-right">{{ $following }} {{ __('Following') }}</strong>
							</div>
							@endif
							<div class="clearfix"></div>
							<br>
							<h2 style="position: relative;top: -1rem;">{{ $user->name }}</h2>
							<p style="position: relative;top: -1rem;">@if($user->admin()) {{ $user->profile->role }} @endif
								@if($user->profile->role == null && $user->admin())
								@can('update', $user->profile)
								Edit Profile to add Role
								@endcan
								@endif
								<br><strong>{{ ($user->admin()?'(ADMIN)':'') }}</strong>
							</p>
						</div>
						<div class="w3-message" style="position: relative;top: -1rem;">
							<h5>
								{{ $user->profile->title }}
								@if($user->profile->title == null)
								@can('update', $user->profile)
								Edit Profile to add Title
								@endcan
								@endif
							</h5>
							<p class="paragraph">{{ $user->profile->description }}
								@if($user->profile->description == null)
								@can('update', $user->profile)
								Edit Profile to add Description
								@endcan
								@endif
							</p>
							<div class="w3ls-touch">

								<div class="social">
									<ul>
										@if($user->profile->facebook != null)
										<li><a href="{{ $user->profile->facebook }}" target="_blank"><i
													class="fa fa-facebook" aria-hidden="true"></i> </a></li>
										@endif
										@if($user->profile->twitter != null)
										<li><a href="{{ $user->profile->twitter }}" target="_blank"><i
													class="fa fa-twitter" aria-hidden="true"></i> </a></li>
										@endif
										@if($user->profile->instagram != null)
										<li><a href="{{ $user->profile->instagram }}" target="_blank"><i
													class="fa fa-instagram" aria-hidden="true"></i> </a></li>
										@endif



										<!-- <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i> </a></li> -->
									</ul>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>


		</div>

		@if($user->admin())
		<span style="margin-bottom: 1rem;" id="view"><br></span>
		<div class="classifieds author-padding">
			<div class="main-title-head">
				@can('update', $user->profile)
				<h3>Your latest posts</h3>
				@else
				<h3>latest posts by {{ $user->name }}</h3>
				@endcan
				<div class="clearfix"></div>
			</div>
			<div class="world-news-grids">
				@foreach($posts as $post)
				<?php $post->body = \App\Custom::filterPost($post->body); ?>
				<div class="world-news-grid img-responsive">
					<div class="img-cont-post img-responsive">
						<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}"
							class="img-responsive" />
					</div>
					<a href="{{ route('index') }}/{{ $post->custom_id }}"
						class="title">{{ strlen($post->title)>80?substr($post->title, 0, 80).' ...':$post->title }}</a>
					<p>{{ strlen($post->body)>95?substr($post->body, 0, 95).'...':$post->body }}</p>
					<a href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a>
				</div>
				@endforeach
			</div>
		</div>
		@endif
	</div>
	<div class="clearfix visible-xs"></div>
	<div class="col-md-3 side-bar">
		<div class="videos">
			@foreach ($maylike as $post)
			<div class="video-grid">
				<div class="video" style="border: 2px solid white;">
					<img src="{{ route('index') }}/storage/{{ $post->file ?? '' }}" alt="{{ $post->title }}">
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
			<a class="more1" href="{{ route('index') }}/">More +</a>
			<div class="clearfix"></div>
		</div>
		<div class="sign_up text-center" id="subscribe">
			<h3>Sign Up for Newsletter</h3>
			<p class="sign">Sign up to receive our free newsletters!</p>
			<form>
				<input type="text" class="text" value="Name" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Name';}" disabled="true">
				<input type="text" class="text" value="Email Address" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Email Address';}" disabled="true">
				<input type="submit" value="submit" disabled="true">
			</form>
			<p class="spam">We do not spam. We value your privacy!</p>
		</div>
		<div class="clearfix"></div>
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
						<a href="{{ route('index') }}/{{ $post->custom_id }}">Read More</a></p>
				</div>
				@endforeach
				<a class="more" href="{{ route('index') }}/">More +</a>
			</div>
		</div>
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

<script type="text/javascript">
	$('#followBtn').click(function(){

		var btn = $('#followBtn');

		if (btn.html() == 'Follow') {
			btn.html('Unfollow');
		}else{
			btn.html('Follow');
		}

		var id = {{ $user->id }};
		xhr = new XMLHttpRequest();
		xhr.open('GET', '/profile/'+id+'/follow', true);
		xhr.onload = function () {
			if (this.status == 200) {
				var response = JSON.parse(this.responseText);
				$('#followText').html(response.count+' '+response.follow);
				btn.html(response.status);
			}
		}
		xhr.send();
	});
</script>
@endsection