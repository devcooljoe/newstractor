@extends('layouts.app')


@section('title')

<title>The News Reporter a Magazine Category Flat Bootstarp Responsive Website Template| Home :: w3layouts</title>
<meta name="keywords" content="The keywords" />
<meta name="description" content="The description">
<!--webfont-->

@endsection

@section('content')

<div class="movie-main-content">
	<div class="col-md-9 total-news">

		<div class="grids">
			<div class="msingle-grid box">
				<div class="grid-header">
					<h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod . </h3>
					<ul>
						<li><span>Post By Admin on sunday,March 05,2013 width</span></li>
						<li><a href="#">5 comments</a></li>
					</ul>
				</div>
				<div class="singlepage">
					<a href="#"><img src="images/m1.jpg" /></a>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,Sed ut perspiciatis unde omnis iste
						natus error sit voluptatem accusantium perspiciatis unde omnis iste natus error sit voluptatem
						accusantiumdoloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis
						et quasi architecto beatae vitae dicta sunt explicabo. sed do eiusmod tempor incididunt ut
						labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
						laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
						voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat
						non proident, sunt in culpa qui officia deserunt mollit anim id est laborum<a href="#">...</a>
					</p>
					<div class="clearfix"> </div>
				</div>
				<div class="single">
					<h3>Lorem Ipsum IS A TENSE, TAUT, COMPELLING THRILLER</h3>
					<p>STORY:<i> Meera and Arjun drive down Lorem Ipsum - can they survive a highway from hell?</i></p>
				</div>
				<div class="best-review">
					<h4>Best Reader's Review</h4>
					<p>Excellent Movie and great performance by Lorem, one of the finest thriller of recent like Aldus
						PageMaker including versions of Lorem Ipsum.</p>
					<p><span>Neeraj Upadhyay (Noida)</span> 16/03/2015 at 12:14 PM</p>
				</div>
				<div class="story-review">
					<h4>REVIEW:</h4>
					<p>So,Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
						been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
						galley of type and scrambled it to make a type specimen book. It has survived not only five
						centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It
						was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum
						passages, and more recently with desktop publishing software like Aldus PageMaker including
						versions of Lorem Ipsum.</p>
				</div>
			</div>

			<div class="clearfix"> </div>
		</div>

		<ul class="comment-list">
			<h5 class="post-author_head">Written by <a href="#" title="Posts by admin" rel="author">admin</a></h5>
			<li><img src="images/avatar.png" class="img-responsive" alt="">
				<div class="desc">
					<p>View all posts by: <a href="#" title="Posts by admin" rel="author">admin</a></p>
				</div>
				<div class="clearfix"></div>
			</li>
		</ul>
		<div class="content-form">
			<h3>Leave a comment</h3>
			<form>
				<input type="text" placeholder="Name" required />
				<input type="text" placeholder="Email" required />
				<input type="text" placeholder="Phone" required />
				<textarea placeholder="Message"></textarea>
				<input type="submit" value="SEND" />
			</form>
		</div>
	</div>
	<div class="col-md-3 side-bar">
		<div class="might">
			<h4>You might also like</h4>
			<div class="might-grid">
				<div class="grid-might">
					<a href="single"><img src="images/mi.jpg" class="img-responsive" alt=""> </a>
				</div>
				<div class="might-top">
					<p>Lorem Ipsum is simply typesetting industry.</p>
					<a href="single">Lorem Ipsum <i> </i></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="might-grid">
				<div class="grid-might">
					<a href="single"><img src="images/mi1.jpg" class="img-responsive" alt=""> </a>
				</div>
				<div class="might-top">
					<p>Lorem Ipsum is simply typesetting industry.</p>
					<a href="single">Lorem Ipsum <i> </i></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="might-grid">
				<div class="grid-might">
					<a href="single"><img src="images/mi2.jpg" class="img-responsive" alt=""> </a>
				</div>
				<div class="might-top">
					<p>Lorem Ipsum is simply typesetting industry.</p>
					<a href="single">Lorem Ipsum <i> </i></a>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="might-grid">
				<div class="grid-might">
					<a href="single"><img src="images/mi3.jpg" class="img-responsive" alt=""> </a>
				</div>
				<div class="might-top">
					<p>Lorem Ipsum is simply typesetting industry.</p>
					<a href="single">Lorem Ipsum <i> </i></a>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
		<div class="featured">
			<h3>Featured Today in Movie Reviews</h3>
			<ul>
				<li>
					<a href="single"><img src="images/f1.jpg" alt="" /></a>
					<p>lorem movie review</p>
				</li>
				<li>
					<a href="single"><img src="images/f2.jpg" alt="" /></a>
					<p>lorem movie review</p>
				</li>
				<li>
					<a href="single"><img src="images/f3.jpg" alt="" /></a>
					<p>lorem movie review</p>
				</li>
				<li>
					<a href="single"><img src="images/f4.jpg" alt="" /></a>
					<p>lorem movie review</p>
				</li>
				<li>
					<a href="single"><img src="images/f5.jpg" alt="" /></a>
					<p>lorem movie review</p>
				</li>
				<li>
					<a href="single"><img src="images/f6.jpg" alt="" /></a>
					<p>lorem movie review</p>
				</li>
				<div class="clearfix"></div>
			</ul>
		</div>
		<div class="clearfix"></div>
		<div class="popular mpopular">
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
				<a class="more" href="#">More +</a>
			</div>
		</div>
		<div class="subscribe-now">
			<div class="discount">
				<a href="#">
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
		<div class="grid-top">
			<h4>Archives</h4>
			<ul>
				<li><a href="single">Lorem Ipsum is simply dummy text of the printing industry. </a></li>
				<li><a href="single">Lorem Ipsum has been the industry's text ever since the 1500s</a></li>
				<li><a href="single">When an unknown printer took a galley scrambled it to make a type </a> </li>
				<li><a href="single">It has survived not, but also the leap into electronic typesetting</a> </li>
				<li><a href="single">Letraset sheets containing Lorem Ipsum with desktop publishing </a> </li>
				<li><a href="single">Software like Aldus versionsof Lorem Ipsum.</a> </li>
			</ul>
		</div>

	</div>
	<div class="clearfix"></div>
</div>

@endsection