@extends('layouts.app')

@section('title')
<title>Edit Post - News Tractor</title>
<meta name="keywords" content="The keywords" />
<meta name="description" content="The description">
@endsection

@section('content')
    <div class="cont-margin">
    	<div class="jumbotron row jumbo1">
	        <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
	        <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<h3>Edit This Post</h3>
                <form action="/post/{{ $post->id }}/edit" method="post">
                @method('patch')
				@csrf
				<span class="ababout">Title</span>
				<input class="abform" type="text" value="{{ old('title') ?? $post->title }}" name="title" maxlength="500">
				@error('title')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror
				<br>
				<span class="ababout">Body</span>
				<textarea class="abform" name="body" cols="30" rows="10" maxlength="10000">{{ old('body') ?? $post->body }}</textarea>
				@error('body')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror				
				<br>
				<span class="ababout">Category</span>
				<select name="category" id="" class="abform">
					<option value="">Select the Post Category</option>
					<option value="sports" {{ $post->category == 'sports'? 'selected':'' }}>Sports</option>
					<option value="tech" {{ $post->category == 'tech'? 'selected':'' }}>Tech</option>
					<option value="business" {{ $post->category == 'business'? 'selected':'' }}>Business</option>
					<option value="gist" {{ $post->category == 'gist'? 'selected':'' }}>Gist/Gossips</option>
					<option value="entertainment" {{ $post->category == 'entertainment'? 'selected':'' }}>Entertainment</option>
					<option value="campus" {{ $post->category == 'campusnews'? 'selected':'' }}>CampusNews</option>
					<option value="politics" {{ $post->category == 'politics'? 'selected':'' }}>Politics</option>
					<option value="blogs" {{ $post->category == 'blogs'? 'selected':'' }}>Blogs</option>
				</select>
				@error('category')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror
				<br>
				<br>
				<input type="submit" value="Update" class="sub-btn">
			</form>
	        </div>
	        <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
    	</div>
	</div>
@endsection

