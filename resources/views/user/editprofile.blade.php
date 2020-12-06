@extends('layouts.app')

@section('title')
<title>
	Edit Your Profile - News Tractor
</title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
<link rel="canonical" href="{{ route('index') }}/" />
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

@endsection

@section('content')
<div class="profile">
	<div class="wrap">
		<div class="profile-main img-responsive">
			<form id="upload-pic" action="/profile/edit/picture" method="POST" enctype="multipart/form-data">
				@method('patch')
				@csrf
				<input name="file" type="file" id="img-file" style="width: 0px; height:0px; opacity:0;">
				<input type="submit" style="width: 0px; height:0px; opacity:0;">
			</form>
			<form id="edit-profile-form" action="/profile/edit" method="POST">
				@method('patch')
				@csrf
				<div class="profile-pic wthree">
					<img id="avatarLoader" src="/storage/assets/default/loader.gif"
						style="width: 20px;height: 20px; border:none; visibility: hidden;">
					<label for="img-file" class="img-label">
						<center>
							<div class="img-cont">
								<img id="avatar"
									src="/storage/{{ $user->profile->avatar ?? 'assets/default/avatar.png' }}" alt=""
									class="dp @can('update', $user->profile) dphover @endcan">
							</div>
							<span class="cam-pack"><i class="fa fa-camera camera-img"></i></span>
						</center>
					</label>
					<h2>{{ $user->name }}</h2>
					<p class="text-left">
						<span class="ababout">Name</span>
						<input type="text" name="name" class="abform" value="{{ $user->name }}">
						@error('name')
						<span class="has-error"></span>
						@enderror
					</p>
					<p class="text-left">
						<span class="ababout">Username</span>
						<input type="text" id="username-input" class="abform" value="{{ $user->username }}">
						<span class="has-error" id="username-report"></span>
					</p>
					<p class="text-left">
						@if($user->admin())
						<span class="ababout">Role</span>
						<input type="text" class="abform" name="role"
							value="{{ old('role') ?? $user->profile->role }}" maxlength="100">
						@else
						<input type="hidden" class="abform" name="role" value="{{ $user->profile->role }}">
						@endif
						@error('role')
						<span class="has-error">{{ $message }}</span>
						@enderror
					</p>
				</div>
				<div class="w3-message">
					<h5 class="text-left">
						<span class="ababout">Title</span>
						<input class="abform" value="{{ old('title') ?? $user->profile->title }}" type="text"
							name="title" maxlength="100">
						@error('title')
						<span class="has-error">{{ $message }}</span>
						@enderror
					</h5>
					<p class="text-left">
						<span class="ababout">Description</span>
						<textarea class="abform" maxlength="500" name="description" cols="10"
							rows="5">{{ old('description') ?? $user->profile->description }}</textarea>
						@error('description')
						<span class="has-error">{{ $message }}</span>
						@enderror
					</p>
					<div class="w3ls-touch">
						<div class="social" style="border-top: 1px solid #8b8b8b; border-style: dashed">
							<p style="font-size: 20px; text-align:center">Links</p>
							<ul class="text-left">
								<span class="ababout">Facebook</span>
								<input class="abform" value="{{ old('facebook') ?? $user->profile->facebook }}"
									maxlength="100" type="text" name="facebook">
								@error('facebook')
								<span class="has-error">{{ $message }}</span><br><br>
								@enderror
								<span class="ababout">Twitter</span>
								<input class="abform" value="{{ old('twitter') ?? $user->profile->twitter }}"
									maxlength="100" type="text" name="twitter">
								@error('twitter')
								<span class="has-error">{{ $message }}</span><br><br>
								@enderror
								<span class="ababout">Instagram</span>
								<input class="abform" value="{{ old('instagram') ?? $user->profile->instagram }}"
									type="text" maxlength="100" name="instagram">
								@error('instagram')
								<span class="has-error">{{ $message }}</span><br><br>
								@enderror
							</ul>
						</div>
					</div>
					<br>
					<p style="width: 100%">
						<input type="submit" id="edit-profile-button" style="width: 0px; height:0px; opacity:0;">
						<label id="edit-btn" for="edit-profile-button" class="pull-right btn btn-danger"
							style="color:black;"><i class="fa fa-save"></i> Save</label></p>
				</div>

			</form>

		</div>
	</div>
</div>


<script>
	function checkUploadAvatar() {
		var imgVal = $('#img-file').val();
		if (imgVal != '') {
			$('#upload-pic').submit(); 
			$('#img-file').val('');
			$('#avatarLoader').css('visibility', 'visible');
		}
	}
	setInterval(checkUploadAvatar, 100);
	$('#upload-pic').submit(function (e) {
		e.preventDefault();
		$('#edit-btn').attr('disabled', 'true');
		var xhr = new XMLHttpRequest();
		xhr.open('POST', '/profile/edit/picture', true);
		// xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
		// xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
		xhr.onload = function () {
			if (this.status == 200) {
				var response = JSON.parse(this.responseText);
				var message = response['state'];
				var path = response['path'];
				$('#avatar').attr('src', '/storage/' + path);
			}
		}
		xhr.onloadend = function () {
			$('#edit-btn').removeAttr('disabled');
			$('#avatarLoader').css('visibility', 'hidden');
		}
		xhr.send(new FormData(this));

	});
	var old = '{{ $user->username }}';
	function checkUsername() {
		var temp, xhr, link;
		temp = $('#username-input').val();
		if (old != temp) {
			old = temp;
			xhr = new XMLHttpRequest();
			xhr.open('GET', '/profile/edit/username/' + temp, true);
			xhr.onload = function () {
				if (this.status == 200) {
					// console.log(temp);
					var report = JSON.parse(this.responseText);
					if (report['state'] == 'ok') {
						$('#username-report').attr('class', 'text-success');
						$('#username-report').html(report['report']);
						let url = document.URL;
						let splitUrl = url.split('/');
						let lenUrl = splitUrl.length;
						splitUrl[lenUrl - 2] = temp;
						link = '/profile/' + splitUrl[lenUrl - 2] + '/edit';
						history.replaceState('', '', link);
					} else if (report['state'] == 'error') {
						$('#username-report').attr('class', 'has-error');
						$('#username-report').html(report['report']);
					} else {
						history.replaceState('', '', '/profile/' + report['state'] + '/edit');
					}

				}
			}

			xhr.send();
		}
		// console.log('hello');
	}

	$('#username-input').focus(function () {
		setInterval(checkUsername, 2000);
	});

</script>
@endsection

