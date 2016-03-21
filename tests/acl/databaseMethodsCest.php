<?php

use Illuminate\Support\Facades\Hash;

class databaseMethodsCest
{
    private $userAttributes;

    public function _before()
    {
        $this->userAttributes = [
            'name' => 'Tim',
            'image' => 'image',
            'gsm' => '0000/00.00.00',
            'email' =>  'john@doe.com',
            'password' => Hash::make('password'),
            'created_at' => new DateTime(),
            'updated_at' => new DateTime(),
        ];
    }

    /**
     * @param FunctionalTester $I
     */
    public function insertNewUserWithFormErrors(FunctionalTester $I)
    {
        // testing logic
        $I->wantTo('Insert a new user insert');

        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);
        $I->seeAuthentication();
        $I->amOnRoute('backend.users.insert');
        $I->click('button[type=submit]');

        $I->seeFormErrorMessages(array(
            'name' => 'The name field is required.',
            'email' => 'The email field is required.'
        ));
    }
}