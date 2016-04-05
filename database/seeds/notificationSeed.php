<?php

use Illuminate\Database\Seeder;
use Fenos\Notifynder\Models\NotificationCategory as NC;

class notificationSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NC::create([
            'name' => 'rental.insert',
            'text' => '{from.name} heeft een nieuwe verhuring toegevoegd.'
        ]);

        NC::create([
            'name' => 'rental.edit.api',
            'text' => '{from.name} heeft een verhuring gewijzigd - API',
        ]);

        NC::create([
            'name' => 'rental.delete',
            'text' => '{from.name} heeft een verhuring verwijderd - API',
        ]);
    }
}
