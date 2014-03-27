@extends('layouts.master')

@section('content')
    <div class="col-md-2"></div>
    <div class="col-md-8" style="background-color:#ecf0f1">
	  {{ Form::open(array('action' => array('PostsController@store'))) }}
	  <fieldset>
	    <legend>Create A New Blog Post</legend>
	    <div class="form-group {{ $errors->has('title') ? 'has-error' : ''}}">
	      {{ Form::label('title', 'Title') }}
	      <div class="col-lg-10">
	      	{{ $errors->first('title', '<p><span class="help-block">:message</span></p>')}}
	        {{ Form::text('title') }}
	      </div>
	    </div>
	    <div class="form-group {{ $errors->has('body') ? 'has-error' : ''}}">
	      {{ Form::label('body')}}
	      <div class="col-lg-10">
	        {{ Form::textarea('body') }}
	        {{ $errors->first('body', '<p><span class="help-block">:message</span></p>')}}
	      </div>
	    </div>
	   <div class="col-lg-10 col-lg-offset-2">
        {{Form::submit('Submit')}}
      </div>
	</fieldset>
	{{ Form::close() }}
    <div class="col-md-2"></div>
@stop