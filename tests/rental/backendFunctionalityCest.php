<?php

class backendFunctionalityCest
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
     * @param FunctionalTester $assert
     */
    public function BackendUrlRenatalNewOptions(FunctionalTester $assert)
    {
        $rental = $assert->createModel('App\Rental', ['Status' => 0]);

        $assert->wantTo('See the new rental requests in the backend');
        $assert->haveRecord('users', $this->userAttributes);
        $assert->amLoggedAs(['email' => 'john@doe.com', 'password' => 'password']);
        $assert->seeAuthentication();
        $assert->amOnRoute('backend.rental.overview', ['type' => 'new']);
        
        $assert->see($rental->Start_date);
        $assert->see($rental->End_date);
        $assert->see($rental->Group);
        $assert->see($rental->Email);
    }
}