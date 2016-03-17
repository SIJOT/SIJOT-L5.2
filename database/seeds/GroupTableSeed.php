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

        $data1['uri'] = 'kapoenen';
        $data2['uri'] = 'welpen';
        $data3['uri'] = 'jonggivers';
        $data4['uri'] = 'givers';
        $data5['uri'] = 'jins';
        $data6['uri'] = 'leiding';

        DB::table('groups')->insert($data1);
        DB::table('groups')->insert($data2);
        DB::table('groups')->insert($data3);
        DB::table('groups')->insert($data4);
        DB::table('groups')->insert($data5);
        DB::table('groups')->insert($data6);
    }
}
