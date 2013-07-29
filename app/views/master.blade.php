<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
	{{ HTML::script('js/jquery.js') }}
	{{ HTML::script('js/bootstrap.js') }}
	{{ HTML::style('css/bootstrap.css') }}

</head>
<body>
<div class="row-fluid">
	<div class="span12 well">
		<h1>Some Website</h1>
	</div>
</div>
<div class="row-fluid">
	<div class="span3">
		<ul class="nav nav-list well">
			@if(Auth::user())
			<li class="nav-header">{{ ucwords(Auth::user()->username) }}</li>
			<li>{{ HTML::link('post', 'Add Post') }}</li>
			<li>{{ HTML::link('users', 'View Users') }}</li>
			<li>{{ HTML::link('logout', 'Logout') }}</li>
			@else
			<li>{{ HTML::link('login', 'Login') }}</li>
			@endif
		</ul>
	</div>
	<div class="span9">
		@yield('content')
	</div>
</div>
</body>
</html>