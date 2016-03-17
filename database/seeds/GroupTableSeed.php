<?php

use Illuminate\Database\Seeder;

class GroupTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();

        $kapoenen['uri'] = 'kapoenen';

        DB::table('groups')->insert($kapoenen);
    }
}
