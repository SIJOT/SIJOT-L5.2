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
        DB::table('users')->delete();

        $data['name'] = 'Tim Joosten';
        $data['email'] = 'Topairy@gmail.com';
        $data['gsm'] = '0474834880';
        $data['password'] = bcrypt('admin');

        $id = DB::table('users')->insertGetId($data);

        $user = App\User::find($id);
        Bouncer::assign('active')->to($user);
    }
}
