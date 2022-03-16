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
      <li class=""><a href="/">Home</a></li>
      
      <li class="right-nav"><a href="/add-blog">Add New Entry</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<h1>Blog Details</h1>
	<div class="row">
		<div class="col-md-8">
			<div class="blog-list">
				<h2>{{$blog->title}}</h2>
				<span><img src="{{asset($blog->blog_image)}}"></span>
				<h3>{{ $blog->short_desc }}</h3>
				<p>{!! $blog->long_desc !!}</p>
				<div class="tags-div">
					<strong>Tag:</strong>
					@php 
						if(!empty($blog->tags)){
							$tags = explode(",",$blog->tags);
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
			</div>
		</div>
	</div>
</div>

</body>
</html>