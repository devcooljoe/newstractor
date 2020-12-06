 @extends('layouts.app')

@section('title')
<title>Add New Post - News Tractor</title>
<meta name="keywords" content="The keywords" />
<meta name="description" content="The description">
@endsection

@section('content')
    <div class="cont-margin">
    	<div class="jumbotron row jumbo1">
	        <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
	        <div class="col col-lg-6 col-md-6 col-sm-6 col-xs-12">
	        	<div style="display:flex;">
				<h3>Add New Post</h3>
				<p class="text-right" style="margin-left:3px;"><b><a class="ababout" href="#" onclick="showHint()">Hint</a></b></p>
				</div>
				<form action="/post/store" method="post" enctype="multipart/form-data" autocomplete="off">
				@csrf
				<span class="ababout">Title</span>
				<input class="abform" type="text" value="{{ old('title') }}" name="title" maxlength="500">
				@error('title')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror
				<br>
				<span class="ababout">Body</span>
				<textarea class="abform" name="body" cols="30" rows="10" maxlength="10000">{{ old('body') }}</textarea>
				@error('body')  
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror				
				<br>
				<span class="ababout">Category</span>
				<select name="category" id="" class="abform">
					<option value="">Select the Post Category</option>
					<option value="sports">Sports</option>
					<option value="tech">Tech</option>
					<option value="business">Business</option>
					<option value="gist">Gist/Gossip</option>
					<option value="entertainment">Entertainment</option>
					<option value="campus">Campusnews</option>
					<option value="politics">Politics</option>
					<option value="blogs">Blogs</option>
				</select>
				@error('category')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror
				<br>
				<br>
				<span class="ababout">Picture</span>
				<input class="btn" type="file" name="file" id="file" style="width:100%">
				@error('file')
				<span class="has-error">{{ $message }}</span><br><br>
				@enderror
				<br>
				<br>
				<input type="submit" value="Post" class="sub-btn">
			</form>
	        </div>
	        <div class="col col-lg-3 col-md-3 col-sm-3 col-xs-12 hidden-xs"><br></div>
    	</div>
	</div>
	
	<script>
		var link = "https://www.google.com/webmasters/sitemaps/ping?sitemap={{ route('index') }}/sitemap.xml";
		var xhr = new XMLHttpRequest();
		xhr.open('GET',link,true);
		xhr.send();
	</script>
	<script>
	function showHint() {
		
		alert("To place a word or sentence in centre: \n 👉 #cen Sentence ##cen");
		alert("To make a word or sentence Bold: \n 👉 #b Sentence ##b");
		alert("To make a word or sentence Itallic: \n 👉 #i Sentence ##i");
		alert("To make a word or sentence underline: \n 👉 #u Sentence ##u");
		alert("To make an horizontal line: \n use #l");
	    alert('To create a code: \n 👉 #c Sentence ##c for normal code. \n #ch Sentence ##ch for html \n \n #cc Sentence ##cc for css \n #cj Sentence ##cj for js ');
	    alert('To create an hyperlink: \n 👉 #a Url a# display sentence ##a ');
	    alert('To add an image: \n 👉 #img Picture name img# Picture Url ##img ');
	    

	}
	</script>
@endsection
