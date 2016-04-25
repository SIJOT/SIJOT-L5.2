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

        NC::create([
            'name' => 'group.edit',
            'text' => '{from.name} heeft een groeps beschrijving aangepast.',
        ]);

        NC::create([
            'name' => 'rental.edit',
            'text' => '{from.name} heeft een verhuring gewijzigd',
        ]);

        NC::create([
            'name' => 'rental.confirmed',
            'text' => '{from.name} heeft een verhuring als bevestigd gezet',
        ]);

        NC::create([
            'name' => 'rental.option',
            'text' => '{from.name} heeft een verhuring als optie gezet.'
        ]);

        NC::create([
            'name' => 'mailing.group', 
            'text' => '{from.name} een mail naar een specifiek group verzonden'
        ]);

        NC::create([
            'name' => 'mailing.store', 
            'text' => '{from.name} heeft een email adres toegevoegd',
        ]);
    }
}
