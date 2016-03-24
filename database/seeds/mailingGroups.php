<?php

use Illuminate\Database\Seeder;

class mailingGroups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete users table records
        DB::table('mailing_tags')->delete();

        // insert some dummy records
        DB::table('mailing_tags')->insert(array(
            array('name'=>'ouderraad', 'description'=>'ouder comitee')
        ));
    }
}
