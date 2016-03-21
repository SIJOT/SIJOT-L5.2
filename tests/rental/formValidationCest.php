<?php

class formValidationCest
{
    /**
     * @param FunctionalTester $I
     */
    public function FrontendFormInsert(FunctionalTester $I)
    {
        $data['Group']      = 'Sint-Joris Turnhout';
        $data['telephone']  = '014673880';
        $data['Email']      = 'Topairy@gmail.com';
        $data['Start_date'] = '01/10/2016';
        $data['End_date']   = '01/10/2017';

        $I->wantTo('submit a form without validation errors');
        $I->amOnRoute('rental.request');
        $I->fillField('Group', 'Sint-Joris Turnhout');
        $I->fillField('telephone', '014673880');
        $I->fillField('Email', 'Topairy@gmail.com');
        $I->fillField('Start_date', '01/10/2016');
        $I->fillField('End_date', '01/10/2017');
        $I->click('Toevoegen');

        $I->dontSeeFormErrors();
        $I->grabRecord('rentals', $data);
    }

    public function FrontEndFormInsertWithValidationErrors(FunctionalTester $I)
    {
        $I->wantTo('submit a form with validation errors');
        $I->amOnRoute('rental.request');
        $I->click('Toevoegen');

        $I->seeFormErrorMessage('Group');
    }
}
