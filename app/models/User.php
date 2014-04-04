<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends BaseModel implements UserInterface, RemindableInterface {

	const ROLE_ADMIN = 1;
	const ROLE_STAND = 2;

	public static $ROLES = array(
		array('id' => 1, 'name' => 'Admin'),
		array('id' => 2, 'name' =>'Stand')
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

	/**
	 * Relationship has many posts.
	 *
	 */
	public function posts()
	{
	    return $this->hasMany('Post');
	}

	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function isAdmin()
	{
		return $this->role_id == self::ROLE_ADMIN;
	}

	public function canManagePost($posts)
	{ 

		return $this->id == $posts->user_id;
	}

}