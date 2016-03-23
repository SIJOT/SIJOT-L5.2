<?php

use Illuminate\Support\Facades\Hash;

class databaseMethodsCest
{
    private $userAttributes;
    private $user;

    public function _before(FunctionalTester $assert)
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

        $assert->amOnPage('/login');
        $assert->fillField('email', $this->userAttributes['email']);
        $assert->fillField('password', $this->userAttributes['password']);
        $assert->click('button[type=submit]');
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

        // $I->seeFormErrorMessages(array(
        //    'name' => 'The name field is required.',
        //    'email' => 'The email field is required.'
        // ));
    }

    public function setUserToBlocked(FunctionalTester $I)
    {
        \Bouncer::seed();

        $I->wantToTest('that the user can be blocked.');
        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);
        $I->seeAuthentication();
    }

    public function setUserToActive(FunctionalTester $I)
    {
        \Bouncer::seed();

        $I->wantToTest('that the user can be unblocked');
        $I->haveRecord('users', $this->userAttributes);
        $I->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);
        $I->seeAuthentication();
    }

    public function deleteUser(FunctionalTester $assert)
    {
        $assert->seeAuthentication();
        $assert->wantToTest('that the user can be deleted');
        $assert->haveRecord('users', $this->userAttributes);
        $assert->amOnRoute('backend.users.destroy', ['id' => $this->user['id']]);
        // $assert->dontSeeRecord('users', ['id' => $this->user['id']]);
    }
}