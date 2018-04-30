<?php

use Illuminate\Database\Seeder;

class UserRolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('user_roles')->delete();

        DB::table('user_roles')->insert([
        	[
        		'role_name'		=> 'admin',
        		'description'	=> 'User yang mempunyai semua akses ke dalam sistem',
	    		'created_at'	=>	date('Y-m-d H:i:s'),
	    		'updated_at'	=>	date('Y-m-d H:i:s'),
        	]
        ]);
    }
}
