<?php

class frontEndRouteCest
{
    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlIndex(FunctionalTester $I)
    {
        $I->amOnRoute('rental.index');
        $I->seeCurrentUrlEquals('/verhuur');
        $I->seeCurrentActionIs('rentalController@indexFront');
    }

    public function FrontendUrlDomainAccess(FunctionalTester $I)
    {
        $I->amOnRoute('rental.access');
        $I->seeCurrentUrlEquals('/verhuur/bereikbaarheid');
        $I->seeCurrentActionIs('rentalController@domainAccess');
    }

    public function FrontendUrlRentalInsertForm(FunctionalTester $I)
    {
        $I->amOnRoute('rental.request');
        $I->seeCurrentUrlEquals('/verhuur/aanvraag');
        $I->seeCurrentActionIs('rentalController@insertFront');
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlRentalCalendar(FunctionalTester $I)
    {
        $I->amOnRoute('rental.calendar');
        $I->seeCurrentUrlEquals('/verhuur/kalender');
        $I->seeCurrentActionIs('rentalController@calendar');
    }
}