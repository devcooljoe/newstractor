@extends('layouts.app')

@section('title')
<title>Reset Your Password - Newstractor </title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
@endsection

@section('content')

<div class="profile">
	<h3 style="font-family: 'bebasregular'; word-spacing:5px;">Reset Your Password</h3>
	<div class="wrap">
		<div class="profile-main img-responsive">
			<form id="edit-profile-form" action="/password/reset" method="POST">
				@csrf
				<div class="profile-pic wthree">
					<p class="text-left">
                        <span class="ababout">Enter a new password</span>
						<input type="password" name="password" id="username-input" class="abform">
						@error('password')
                        <span class="has-error">{{ $message ?? '' }}</span>    
						@enderror
						<span class="has-error">{{ Session::get('message') ?? '' }}</span>
						<br>
						<span class="ababout">Comfirm password</span>
						<input type="password" name="password_confirmation" id="username-input" class="abform">
                        @error('password_confirmation')
                        <span class="has-error">{{ $message ?? '' }}</span>    
                        @enderror
					</p>
				</div>
				<div class="w3-message">
					<p style="width: 100%">
						<input type="submit" id="edit-profile-button" style="width: 0px; height:0px; opacity:0;">
						<label id="edit-btn" for="edit-profile-button" class="pull-right btn btn-danger"
							style="color:black;">Submit</label></p>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection