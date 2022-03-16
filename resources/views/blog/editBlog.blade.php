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
	<h1>Edit Blog</h1>

	@if(Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
        @php
        Session::forget('success');
        @endphp
    </div>
    @endif
    <div class="row">
    	<div class="col-md-2"></div>
    	<div class="col-md-8">
		    <div class="card-form">
				<form action="{{ url('update-blog') }}" method="POST" enctype="multipart/form-data">
					{{ csrf_field() }}
					<input type="hidden" name="blog_id" value="{{$blog->id}}">
					<div class="form-group">
						<label>Title:</label>
						<input type="text" name="title" class="form-control" placeholder="Title" value="{{$blog->title}}" required>
					</div>

					<div class="form-group">
						<label>Short Description:</label>
						<input type="text" name="short_desc" class="form-control" placeholder="Short Description" value="{{$blog->short_desc}}" required>
					</div>

					<div class="form-group">
						<strong>Long Description:</strong>
						<textarea class="form-control" name="long_desc" placeholder="Long Description" required>{!! $blog->long_desc !!}</textarea>
					</div>

					<div class="form-group">
						<label>Tags:</label><br/>
						<span>In case of multiple tags, add comma after every tag. Ex tag1,tag2</span>
						<br/>
						<input type="text" class="form-control" id="tags" name="tags" placeholder="Tags" value="{{ $blog->tags }}">
						<a href="#" class="pre-tag" data-val="Tag 1"><u>Tag 1</u></a>
						<a href="#" class="pre-tag" data-val="Tag 2"><u>Tag 2</u></a>
						<a href="#" class="pre-tag" data-val="Tag 3"><u>Tag 3</u></a>
						<a href="#" class="pre-tag" data-val="Tag 4"><u>Tag 4</u></a>
						<a href="#" class="pre-tag" data-val="Tag 5"><u>Tag 5</u></a>
					</div>	

					<div class="form-group">
						<label>Image:</label>
						<br/>
						<input type="file" name="blog_image" class="form-control" >
						<span><img src="{{asset($blog->blog_image)}}" style="height: 200px; width: 200px;"></span>
					</div>	

					<div class="form-group">
						<button class="btn btn-success btn-submit">Submit</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

$('.pre-tag').click(function() {
	var ctag = $('#tags').val();
	var selectedTag = $(this).attr("data-val");
	if (ctag != '') {
		var finalTag = ctag+','+selectedTag;
	}else{
		var finalTag = $(this).attr("data-val");
	}
	$('#tags').val(finalTag);
})
</script>
</body>
</html>