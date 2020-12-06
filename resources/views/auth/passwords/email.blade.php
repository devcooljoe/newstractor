@extends('layouts.app')

@section('title')
<title>Reset Your Password - Newstractor </title>
<link rel="stylesheet" type="text/css" href="/css/profile.css">
@endsection

@section('content')
<div class="profile">
	<div class="wrap">
		<div class="profile-main img-responsive">
			<form id="edit-profile-form" action="/password/email" method="POST">
				@csrf
				<div class="profile-pic wthree">
					<p class="text-left">
                        <span class="ababout">Enter your E-mail</span>
                        <br>
                        <br>
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ Session::get('success') ?? '' }}</strong>
                        </span>
						<input type="text" name="email" id="username-input" class="abform">
                        <span class="has-error" id="username-report">{{ Session::get('message') ?? '' }}</span>
						@if(Session::has('success'))
						<br>
                        <a href="/password/email/resend">Resend Reset Link?</a> <!-- Resend Password -->
                        @endif
                        @error('email')
                        <span class="has-error" id="username-report">{{ $message ?? '' }}</span>    
                        @enderror
					</p>
				</div>
				<div class="w3-message">
					<p style="width: 100%">
						<input type="submit" id="edit-profile-button" style="width: 0px; height:0px; opacity:0;">
						<label id="edit-btn" for="edit-profile-button" class="pull-right btn btn-danger"
							style="color:black;">Continue</label></p>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection