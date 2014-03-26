@extends('layouts.master')

@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8" style="background-color:#ecf0f1">
	  <form class="form-horizontal" role="form" action="{{{ action('PostsController@store') }}}" method="Post">
	  <fieldset>
	    <legend>Create A New Blog Post</legend>
	    <div class="form-group">
	      <label for="title" class="col-lg-2 control-label">Title</label>
	      <div class="col-lg-10">
	        <input name="title" type="text" class="form-control" id="title" placeholder="Title" value="{{{ Input::old('title') }}}">
	      </div>
	    </div>
	    <div class="form-group">
	      <label for="body" class="col-lg-2 control-label">Body</label>
	      <div class="col-lg-10">
	        <textarea name="body" class="form-control" rows="3" id="body" placeholder="Body">{{{ Input::old('body') }}}</textarea>
	      </div>
	    </div>
	   <div class="col-lg-10 col-lg-offset-2">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
	</fieldset>
	</form>
    <div class="col-md-2"></div>
@stop
