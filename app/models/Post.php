<?php

class Post extends BaseModel {

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

	/**
	*
	*image upload function
	*saves image path to database
	*
	*/
	public function imageUpload($file)
	{

		$destinationPath = 'uploads/images';

		$filename = $file->getClientOriginalName();

		$file->move($destinationPath, $filename);

		$pathToFile = "/uploads/images/" . $filename;

		$this->image = $pathToFile;
	}
}