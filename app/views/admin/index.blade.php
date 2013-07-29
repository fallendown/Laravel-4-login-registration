@extends('master')


@section('content')

<div class="span8 well">
	<h4>Hello {{ ucwords(Auth::user()->username) }}</h4>
</div>


@stop