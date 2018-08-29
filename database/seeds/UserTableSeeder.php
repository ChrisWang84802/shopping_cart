<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
	//[Chris+ factory]
	factory(App\User::class,10)->create()->each(function(){
	   // $u->posts()->save(factory(App\Post::class)->make());
	});
	//[Chris- seed]
       /* DB::table('users')->insert([
	    'name' => str_random(10),
	    'email' => str_random(10).'@gmail.com',
	    'password' => bcrypt('secret'),
	]);*/
    }
    public function testDatabase()
    {
	$user = factory(App\User::class)->make();
    }

}
