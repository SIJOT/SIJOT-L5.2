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
        $data['name'] = 'Tim Joosten';
        $data['email'] = 'Topairy@gmail.com';
        $data['password'] = bcrypt('admin');

        DB::table('users')->insert($data);
    }
}
