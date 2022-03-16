<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container">
    
    <ul class="nav navbar-nav">
      <li class="active"><a href="/">Home</a></li>
      
      <li class="right-nav"><a href="/add-blog">Add New Entry</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<h1>Blog Lists</h1>
	@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
        Session::forget('success');
        @endphp
    </div>
    @endif
<div class="row">
	<div class="col-md-8">
	@if($blog->count())
		@php $cnt = 1; @endphp
		@foreach($blog as $key => $article)
		<div class="blog-list">
		@if($cnt == 1)
			<h1><b><a href={{url('/blog/'.$article->slug)}}> {{ $article->title }}</a></b></h1>
		@else
			<h2><a href={{url('/blog/'.$article->slug)}}> {{ $article->title }}</a></h2>
		@endif
		<span><img src="{{asset($article->blog_image)}}"></span>
			<h3>{{ $article->short_desc }}</h3>
			<div class="tags-div">
				<strong>Tag:</strong>
				@php 
					if(!empty($article->tags)){
						$tags = explode(",",$article->tags);
					}else{
						$tags = [];
					} 
				@endphp
				@if(count($tags) > 0)
					@foreach($tags as $tag)
						<label class="label label-info">{{ $tag }}</label>
					@endforeach
				@endif
			</div>
			<div class="button-div">
				<a href="{{url('/blog/edit/'.$article->id)}}">
		          <span class="glyphicon glyphicon-edit"></span>
		        </a>
		        <a href="{{url('/blog/delete/'.$article->id)}}" onclick="return deleteFunction()">
		          <span class="glyphicon glyphicon-trash"></span>
		        </a>
			</div>
			@php $cnt++; @endphp
		</div>
		@endforeach
	@endif
</div></div>
</div>
<script>
function deleteFunction() {
 return confirm ('Are you sure want to delete?');
}
</script>

</body>
</html>