<?php

class UserTableSeeder extends Seeder {

	public function run() 
	{
		DB::table('users')->delete();

        $user = new User();
        $user->email = 'admin@codeup.com';
        $user->password = 'adminPass123!';
        $user->first_name = 'Grace';
        $user->last_name = 'Faubion';
        $user->role_id = 1;
        $user->save();
	}
}

