<?php

class Post extends Eloquent {

    protected $table = 'posts';
    
    /**
    * validation rules
    */
    public static $rules = array(
	    'title' => 'required|max:100',
	    'body'  => 'required|max:10000'
	);

    /**
	 * Define relationship to User.
	 */
	public function user()
	{
	    return $this->belongsTo('User');
	}

}