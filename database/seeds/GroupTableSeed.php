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

        $data1['uri']   = 'kapoenen';
        $data1['title'] = 'De kapoenen';

        $data2['uri']   = 'welpen';
        $data2['title'] = 'De Welpen';

        $data3['uri']   = 'jonggivers';
        $data3['title'] = 'De Jong-Givers';

        $data4['uri']   = 'givers';
        $data4['title'] = 'De Givers';

        $data5['uri']   = 'jins';
        $data5['title'] = 'De Jins';

        $data6['uri']   = 'leiding';
        $data6['title'] = 'De Leiding';

        DB::table('groups')->insert($data1);
        DB::table('groups')->insert($data2);
        DB::table('groups')->insert($data3);
        DB::table('groups')->insert($data4);
        DB::table('groups')->insert($data5);
        DB::table('groups')->insert($data6);
    }
}
