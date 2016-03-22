<?php

use Illuminate\Database\Seeder;

class mailingUsers extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete users table records
        DB::table('mailing_users')->delete();

        // insert some dummy records
        DB::table('mailing_users')->insert(array(
            array('firstname' => 'Tim', 'lastname' => 'Joosten', 'email' => 'Topairy@gmail.com')
        ));
    }
}
