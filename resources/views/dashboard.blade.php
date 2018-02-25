@extends('admin/template')
@include('navbar')
<br><br><br><br><br><br><br><br>   

<section class="row posts">
	<div class="col-md-6 col-md-offset-3"> <h3>Dashboard</h3></div>
	<div class="col-md-6 col-md-offset-3" style="width: 50%; height: 250px; overflow: scroll;"> 
		
		@foreach($posts as $post)
			<article class="post panel panel-success" data-postid="{{ $post->id }}">
				<div class="info panel-heading" style="margin-left:;">
					{{ $post->user->name }} {{ $post->created_at }}
				</div>
				<div class="panel-body" style="margin-left: 20px;">{{ $post->body }}</div>
			</article>
	    @endforeach
	</div>
	
</section>
<section class="row new-post">
	<div class="col-md-6 col-md-offset-3">
		<header><h3></h3></header>
		<form action="{{url('createpost')}}" method="post">
				<textarea class="form-control" name="body" id="new-post" rows="4" placeholder=" Your Message"></textarea><br>
			<button type="submit" class="btn btn-primary">Send Message</button>
			<input type="hidden" value="{{ Session::token() }}" name="_token">
		</form>
	</div>
</section>

