@extends('layouts.master')

@section('content')
	<div class="col-md-2"></div>

	<div class="col-md-8" style="background-color:#ecf0f1">

	@if (empty($post->id))
		{{ Form::open(array('action' => 'PostsController@store', 'files' => true, 'class' => 'form-horizontal')) }}
	<fieldset>
		<legend>Create A New Blog Post</legend>
	@else 
		{{ Form::model($post, array('action' => array('PostsController@update', $post->id, 'class' => 'form-horizontal'), 'method' => 'put', 'files' => true)) }}
		<fieldset>
		<legend>Edit Blog Post</legend>
	@endif

	<div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">

		{{ Form::label('title', 'Title', array('class' => 'col-lg-2 control-label')) }}

		<div class="col-lg-10">

			{{ $errors->first('title', '<p><span class="help-block">:message</span></p>') }}

			{{ Form::text('title', null, array('class' => 'form-control', 'placeholder' => 'Title')) }}

		</div>

	</div>

	<div class="form-group {{ $errors->has('body') ? 'has-error' : ''}} ">

		{{ Form::label('body', 'Body', array('class' => 'col-lg-2 control-label'))}}

	<div class="col-lg-10">

		{{ Form::textarea('body', null, array('class' => 'form-control', 'rows' => '3', 'placeholder' => 'Body')) }}

		{{ $errors->first('body', '<p><span class="help-block">:message</span></p>')}}

		<!-- <label for="exampleInputFile"> Attach Image </label>-->		
		{{Form::label('image', 'Image Upload', array('for' => 'exampleInputFile'))}}	

		{{ Form::file('image')}}

	</div>

	</div>

	<div class="col-lg-10 col-lg-offset-2">

		{{Form::submit('Submit', array('class' => 'btn btn-success'))}}

	</div>

	</fieldset>

		{{ Form::close() }}

		<div class="col-md-2"></div>
@stop
