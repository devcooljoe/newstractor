@extends('layouts.app')

@section('title')
<title>Super Admin Panel - News Tractor</title>
<link rel="canonical" href="{{ route('index') }}/" />
<meta name="keyword" content="" />
<meta name="description" content="Keep up with global news updates, trends, local news, fashion, sports, technologies, business, gist/gossips, entertainment, capus news, politics etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content="Global Breaking news updates | Latest news headlines | Public relations - News Tractor" />
<meta property="og:description" content="Keep up with global news updates, trends, local news, fashion, sports, technologies, business, gist/gossips, entertainment, capus news, politics etc.. We are building the best global community and will want you to be part." />
<meta property="og:url" content="{{ route('index') }}" />
<meta property="og:site_name" content="NewsTractor" />
<meta property="og:image" content="{{ route('index') }}/storage/assets/default/icon.png" />
<meta property="og:image:secure_url" content="{{ route('index') }}/storage/assets/default/icon.png" />
<meta property="og:image:width" content="800" />
<meta property="og:image:height" content="450" />
<meta property="og:image:alt" content="" />
<meta property="article:tag" content="about, news, headlines, NewsTractor" />
<meta property="article:section" content="" />
<meta property="article:published_time" content="" />
<meta property="article:modified_time" content="" />
<meta property="article:author" content="" />
<meta name="twitter:card" content="summary" />
<meta property="twitter:title" content="Global & Breaking news updates | Latest news headlines | Public relations - News Tractor" />
<meta property="twitter:description" content="Keep up with global news updates, trends, local news, fashion, sports, technologies, business, gist/gossips, entertainment, capus news, politics etc.. We are building the best global community and will want you to be part." />
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
<div class="jumbotron row jumbo1">
    <p>Sports: {{ $sports }}, Tech: {{ $tech }}, Business: {{ $business }}, 
        Gist: {{ $gist }}, Entertainment: {{ $entertainment }}, Campus: {{ $campus }}, 
        Politics: {{ $politics }}, Blogs: {{ $blogs }} <hr></p>
    <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
    <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
        
        <h3>Total Post = {{ $all }}</h3>
        <br>
        <h3>View Admins</h3>
        <br>
        <span class="ababout">ID / Username</span>
        <input class="abform" type="text" id="id" maxlength="200">
        <span class="has-error" id="error"></span>
        <hr>
        <div id="user-cont" style="display:none;">
            <h4 style="margin-left:1rem" id="user"></h4>
            <input type="checkbox" id="check" style="margin-left: 2rem">
            <label for="check" style="margin-left: 1rem;cursor: pointer;">Add or Remove Admin</label>
        </div>
        <hr>
        <input type="submit" id="btn" value="Submit" class="sub-btn">
    </div>
    <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
</div>
<div class="team" style="border-top: 1px dashed gray;padding-top: 1rem;">
	<h3>ADMINS</h3>
	<div class="team-grids">
		@foreach ($admins as $user)
		<a href="/profile/{{ $user->username ?? $user->id}}">
			<div class="col-md-2 team-grid">
				<div class="img-cont admin-div img-responsive">
					<img class="img-responsive" src="/storage/{{ $user->profile->avatar ?? 'assets/default/avatar.png' }}" alt="" />
				</div>
				<h5>{{ $user->name }}</h4>
					<p>{{ substr($user->profile->description, 0, 60) }}
						{{ strlen($user->profile->description)>60?'...':'' }}
					</p>
			</div>
		</a>
		<div class="clearfix visible-xs"></div>
		@endforeach
		<div class="clearfix"></div>
	</div>
</div>

<script>
    var userid = null;
    $('#btn').click(function () {
        var id = $('#id').val();
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/admin/' + id, true);
        xhr.onload = function () {
            var response = JSON.parse(this.responseText);
            if (response.error == true) {
                $('#error').addClass('has-error');
                $('#error').removeClass('text-success');
                $('#error').html('User Not Found!');
            } else {
                if (response.admin) {
                    $('#check').attr('checked', 'checked');
                } else {
                    $('#check').removeAttr('checked');
                }
                userid = response.userid;
                $('#user-cont').css('display', 'flex');
                $('#user').html(response.name);
            }
        }
        xhr.send();
    });
    function checkBox() {
        var xhr = new XMLHttpRequest();
        xhr.open('GET', '/admin/action/' + userid, true);
        xhr.onload = function () {
            if (this.responseText == 'added') {
                $('#error').removeClass('has-error');
                $('#error').addClass('text-success');
                $('#error').html('User Added!');
                $('#check').attr('checked', 'checked');
            } else {
                $('#error').addClass('has-error');
                $('#error').removeClass('text-success');
                $('#error').html('User Removed!');
                $('#check').removeAttr('checked');
            }
        }
        xhr.send();
    }
    $('#check').click(function () {
        checkBox();
    });
</script>
@endsection