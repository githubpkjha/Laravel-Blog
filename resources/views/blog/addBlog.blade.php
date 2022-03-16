<!DOCTYPE html>
<html>
<head>
	<title>Blogs</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" />
	<link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
	<script src="http://demo.itsolutionstuff.com/plugin/jquery.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>
</head>
<body>
	<nav class="navbar navbar-inverse">
  <div class="container">
    
    <ul class="nav navbar-nav">
      <li ><a href="/">Home</a></li>
      
      <li class="right-nav active"><a href="/add-blog">Add Blog</a></li>
    </ul>
  </div>
</nav>
<div class="container">
	<h1 class="add-blog">Add Blog</h1>

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
						<form action="{{ url('add-blog') }}" method="POST" enctype="multipart/form-data">
							{{ csrf_field() }}
							<div class="form-group">
								<label>Title:</label>
								<input type="text" name="title" class="form-control" placeholder="Title" required>
							</div>

							<div class="form-group">
								<label>Short Description:</label>
								<input type="text" name="short_desc" class="form-control" placeholder="Short Description" required>
							</div>

							<div class="form-group">
								<strong>Long Description:</strong>
								<textarea class="form-control" name="long_desc" placeholder="Long Description" required></textarea>
							</div>

							<div class="form-group">
								<label>Tags:</label><br/>
								<span>In case of multiple tags, add comma after every tag. Ex tag1,tag2</span>
								<br/>
								<input type="text" class="form-control" name="tags" value="" placeholder="Tags" required>
							</div>	

							<div class="form-group">
								<label>Image:</label>
								<br/>
								<input type="file" name="blog_image" class="form-control" required>
							</div>	

							<div class="form-group">
								<button class="btn btn-success btn-submit">Submit</button>
							</div>
						</form>
					</div>
				</div>
		</div>
</div>

</body>
</html>