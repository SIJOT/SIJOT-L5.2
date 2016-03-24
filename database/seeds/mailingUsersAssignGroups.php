<?php

use Illuminate\Database\Seeder;

class mailingUsersAssignGroups extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // delete users table records
        DB::table('mailing_tags_mailing_users')->delete();

        // insert some dummy records
        DB::table('mailing_tags_mailing_users')->insert(array(
            array('mailing_tags_id' => 1, 'mailing_users_id' => 1)
        ));
    }
}
