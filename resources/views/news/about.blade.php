@extends('layouts.app')


@section('title')

<title>Newstractor - Global Breaking news updates, Latest news headlines | About </title>
<meta name="keyword" content="newstractor, news, politics, breaking news, updates, trending" />
<meta name="description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part.">
<meta property="og:locale" content="en_EN" />
<meta property="og:type" content="article" />
<meta property="og:title" content=" Newstractor - Global Breaking news updates, Latest news headlines" />
<meta property="og:description" content="Newstractor Keep you up with global news updates, trends, local news, etc.. We are building the best global community and will want you to be part." />
<meta property="og:url" content="{{ route('about') }}" />
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
	<div class="about-section">
		<div class="about-us">
			<div class="col-md-7 about-left">
				<h3>A FEW WORDS ABOUT US</h3>
				<div class="abt_image">
					<img src="images/abt_pic.jpg" alt="" />
				</div>
				<h5>Lorem ipsum eos accusamu dolore massa lore fugharum quidemed rerum faciliseme iusto ssimos ducimus.
				</h5>
				<p>Ses praesentiumvoluptatum delenitimos atqcorrupti quos dolores et quas molestias exceuri occaecati
					cupiditate non prdent imilique.</p>
				<p>Sunt in culpaqui officia mos deserunt mollitia animid est laborum dolorum fuharumos.Ses
					praesentiumvoluptatum delenitimos atqcorrupti quos dolores et quas molestias exceuri occaecati
					cupiditate non prdent imiliqueunt in culpaqui officia mos deserunt mollitia animid est laborum
					dolorum fuharumosiemen quidemed. Rerumol facilisest et expedita distinc.</p>
				<p>Nam libero temprecum soluta nobis est eligendi optio cumquenihil perspic iatis unde omnis iste natus
					error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo
					inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam
					voluptatem quia voluptas sit aspernatur aut odit.</p>
			</div>
			<div class="col-md-5 about-right">
				<h3>WHAT WE OFFER</h3>
				<div class="offer">
					<h4>1</h4>
					<a href="#">LOREM IPSUM DOLOR SIT CONSECTETUER</a>
					<div class="clearfix"></div>
					<p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx
						eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
				</div>
				<div class="offer">
					<h4>2</h4>
					<a href="#">PRAESENT VESTIBULUM MOLESTIE LACUS</a>
					<div class="clearfix"></div>
					<p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx
						eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
				</div>
				<div class="offer">
					<h4>3</h4>
					<a href="#">SED UT PERSPICIATIS UNDE OMNIS ISTE</a>
					<div class="clearfix"></div>
					<p>Ut enim ad minim veniam, quis nostrud exercitat ion ullamcode laboris nisi dolore massa ealiquipx
						eato commodo consectetuor massa perspiciatis unde omnis iste natus error sit.</p>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="team">
			<h3>ADMINISTRATORS</h3>
			<div class="team-grids" style="display: flex;overflow-x:scroll;">
				@foreach ($admins as $user)
				<a href="{{ route('index') }}/profile/{{ $user->username ?? $user->id}}">
				<div class="team-grid admin-div" style="overflow: unset; height:100%; margin-left:1rem;">
					<div class="img-cont admin-div">
						<img src="/storage/{{ $user->profile->avatar ?? 'assets/default/avatar.png' }}" alt="" />
					</div>
					<h5>{{ $user->name }}</h4>
						<p>
							{{ substr($user->profile->description, 0, 60) }}
						{{ strlen($user->profile->description)>60?'...':'' }}
						</p>
				</div>
			</a>
				@endforeach
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div>

@endsection