@extends('layouts.app')


@section('title')

<title>The News Reporter a Magazine Category Flat Bootstarp Responsive Website Template| Home :: w3layouts</title>
<meta name="keywords" content="The keywords" />
<meta name="description" content="The description">
<!--webfont-->

@endsection

@section('content')

<div class="main-content">
	<div class="col-md-9 total-news">
		<div class="classifieds">
			<h3>Free Classified Ads</h3>
			<div class="classified-grids">
				<a href="#">
					<div class="classified-grid">
						<h4>Real Estate</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Jobs</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Electronics</h4>
					</div>
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="classified-grids">
				<a href="#">
					<div class="classified-grid">
						<h4>Automobiles</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Services</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Home Store</h4>
					</div>
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="classified-grids">
				<a href="#">
					<div class="classified-grid">
						<h4>Education & Learning</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Travels</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Business Opportunities</h4>
					</div>
				</a>
				<div class="clearfix"></div>
			</div>
			<div class="classified-grids">
				<a href="#">
					<div class="classified-grid">
						<h4>Entertainment</h4>
					</div>
				</a>
				<a href="#">
					<div class="classified-grid">
						<h4>Matrimonial</h4>
					</div>
				</a>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<div class="col-md-3 side-bar">
		<div class="videos">
			<div class="video-grid">
				<div class="video">
					<a href="single"><i class="play"></i></a>
				</div>
				<div class="video-name">
					<a href="single">Lorem ipsum dolor sit amet conse ctetur adipiscing elit</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="video-grid">
				<div class="video">
					<a href="single"><i class="play"></i></a>
				</div>
				<div class="video-name">
					<a href="single">Lorem ipsum dolor sit amet conse ctetur adipiscing elit</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="video-grid">
				<div class="video">
					<a href="single"><i class="play"></i></a>
				</div>
				<div class="video-name">
					<a href="single">Lorem ipsum dolor sit amet conse ctetur adipiscing elit</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="video-grid">
				<div class="video">
					<a href="single"><i class="play"></i></a>
				</div>
				<div class="video-name">
					<a href="single">Lorem ipsum dolor sit amet conse ctetur adipiscing elit</a>
				</div>
				<div class="clearfix"></div>
			</div>
			<a class="more1" href="single">More +</a>
			<div class="clearfix"></div>
		</div>
		<div class="sign_up text-center" id="subscribe">
			<h3>Sign Up for Newsletter</h3>
			<p class="sign">Sign up to receive our free newsletters!</p>
			<form>
				<input type="text" class="text" value="Name" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Name';}">
				<input type="text" class="text" value="Email Address" onfocus="this.value = '';"
					onblur="if (this.value == '') {this.value = 'Email Address';}">
				<input type="submit" value="submit">
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
				<div class="popular-grid">
					<i>Sept 24th 2011 </i>
					<p>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#">Read More</a></p>
				</div>
				<div class="popular-grid">
					<i>Sept 24th 2011 </i>
					<p>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#">Read More</a></p>
				</div>
				<div class="popular-grid">
					<i>Sept 24th 2011 </i>
					<p>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#">Read More</a></p>
				</div>
				<div class="popular-grid">
					<i>Sept 24th 2011 </i>
					<p>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#">Read More</a></p>
				</div>
				<div class="popular-grid">
					<i>Sept 24th 2011 </i>
					<p>Lorem ipsum dolor sit amet conse ctetur adipiscing elit <a href="#">Read More</a></p>
				</div>
				<a class="more" href="#">More +</a>
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

@endsection