@extends('layouts.app')


@section('title')

<title>Contact Us - Newstractor</title>
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

<!--webfont-->

@endsection 

@section('content')

<div class="main-content">
	<div class="contact-section">
		<div class="contact-section-head">
			<h3>Contact us</h3>
		</div>
		<br>
		<div class="contact-form-bottom">
			<div class="col-md-4 address">
				<address>
					<h5><br></h5>
					<p><br></p>
					<p><br></p>
					<p class="bottom"><br></p>
					<h5><br></h5>
					<p><br></p>
				</address>
			</div>
			<div class="col-md-4 contact-form">
				<form>
					<div class="contact-form-row">
						<div>
							<span>Name</span>
							<input type="text" class="text" value="" onfocus="this.value = '';"
								onblur="if (this.value == '') {this.value = '';}">
						</div>
						<div>
							<span>Email</span>
							<input type="text" class="text" value="" onfocus="this.value = '';"
								onblur="if (this.value == '') {this.value = '';}">
						</div>
						<div>
							<span>Phone</span>
							<input type="text" class="text" value="" onfocus="this.value = '';"
								onblur="if (this.value == '') {this.value = '';}">
						</div>
						<input type="submit" value="Submit" />
						<div class="clearfix"> </div>
					</div>
				</form>
			</div>
			<div class="col-md-4 contact-form-row ccomments">
				<div>
					<span>Enter text</span>
					<textarea value="" onfocus="this.value = '';"
						onblur="if (this.value == '') {this.value = '';}"></textarea>
				</div>
				<div>
					<span>Security</span>
					<img src="images/security.jpg" class="code" alt="" />
					<input type="text" class="text" value="" onfocus="this.value = '';"
						onblur="if (this.value == '') {this.value = '';}">
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div>

@endsection