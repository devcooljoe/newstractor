<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="{{ route('index') }}/css/style.css">
	<link rel="stylesheet" type="text/css" href="{{ route('index') }}/css/bootstrap.css">
	<title>Page Not avialable!</title>
</head>
<body  style="background:none;">
	<center>
		<div class="img-responsive" style="width:700px; text-align: left;padding: 1rem;" >
		<h3>Sorry! This Page is Temporarily Closed but you may use the search box to search for things related to it.</h3>
		<br>
		<div class="search">
		<form action="/search" method="GET" autocomplete="off">
		<input name="q" type="text" value="Search here.." onfocus="this.value = '';"
		                                onblur="if (this.value == '') {this.value = 'Search';}" />
		<input type="submit" value="">
		</form>
		</div>
	</div>
	</center>
	<p class="text-center"><a href="#" onclick="window.history.back();">Click here to go back!</a></p>
</body>
</html>