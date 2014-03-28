@extends('layouts.master')

@section('content')
	<div class="blog-post">
        <h2 class="blog-post-title">{{{$post->title}}}</h2>
        <p>{{{$post->created_at->setTimezone('America/Chicago')->format('l, F jS @ h:i:s A')}}}</p>
        <p>{{{$post->body}}}</p>
        <a href="{{{ action('PostsController@edit') }}}">Edit Post</a> |
        <a href="#" id="btnDeletePost">Delete Post</a> |
        <a href="{{{ action('PostsController@index') }}}">View All Posts</a>
    </div>

    {{ Form::open(array('action' => array('PostsController@destroy', $post->id), 'method' => 'delete', 'id' => 'formDeletePost')) }}
	{{ Form::close() }}
@stop

@section('bottom-script')

<script type="text/javascript">

$('#btnDeletePost').on('click', function (e) {
	e.preventDefault();
	if(confirm("Are you sure you want to delete this post?")) {
		$('#formDeletePost').submit();
	}
});

</script>

@stop

