@extends('main')

@section('title', ' | All Blogs')

@section('content')

	<div class="row" style="padding: 20px">
		<div class="col-md-11">
			<h1>All posts</h1>
		</div>
		<div class="col-md-1">
			<a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary btn-h1-spacing">글쓰기</a>
		</div> 
	</div> 
	<div class="row">
		<div class="col-md-12">
			@if(count($posts)==0) 
			<div>
				<p>There is no post yet.</p>
				<p>Please make an account first, and create new post.</p>
				<a href="/register">Make an account.</a>
				<br><br> 
				<p>아무 게시글이 없습니다..</p>
				<p>회원가입을 먼저히시고 글을 작성해주세요..</p>
				<a href="/register">회원가입하기.</a>
				<br><br> 
				<p>Tree&Saw is my online-shopping mall.</p>
				<p>Please buy something for me.</p>
				<p>Thanks a lot.</p>
				<a href="http://www.treeandsaw.com" target="_blank">Visit Tree&Saw</a> 
				<br><br><br>
			</div>
			<div style="text-align: right">
				<p>Written by treeboy.</p>	
				<p>Feb. 22 2017 from Bakersfield, CA</p>
			</div>
			@endif
					
			<table class="table">
			@foreach ($posts as $post) 
				<tr>
					<td><h5>{{ $post->id }}</h5></td> 
					<td>
				    	<a href="{{ route('posts.show', $post->id) }}">
				    		<h4>{{ $post->title }} 
	 							@if($post->comments()->count()>=1)
	 								<small>({{ $post->comments()->count() }})</small>
	 							@endif
				    		</h4>
				    	</a> 
					</td>
					<td><h4>{{ $post->author }}</h4></td>
					<td><h4> <small>{{ date("F j, Y h:m A" , strtotime($post->created_at))}}</small> </h4></td> 
				</tr>
			@endforeach
			</table> 
		</div> 

		<!--to show the pagination field-->
 		<center>
			{{$posts->links()}} 			
 		</center>	 

	</div>
	<div class="row">   
		<div class="col-md-11"> 
		</div>
		<div class="col-md-1">
			<a href="{{ route('posts.create') }}" class="btn btn-sm btn-primary btn-h1-spacing">글쓰기</a>
		</div>
	</div> 
@endsection