<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(GroupTableSeed::class);

        // Mailing system.
        $this->call(mailingUsers::class);
        $this->call(mailingGroups::class);
        $this->call(mailingUsersAssignGroups::class);

        $this->call(notificationSeed::class);
    }
}
