<?php

/**
 * Class frontEndRouteCest
 */
class frontEndRouteTakkenCest
{
    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlIndex(FunctionalTester $I)
    {
        $I->amOnRoute('takken.index');
        $I->seeCurrentUrlEquals('/takken');
        $I->seeCurrentActionIs('takkenController@overview');
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlKapoenen(FunctionalTester $I)
    {
        $db = $I->createModel('App\Group', ['Uri' => 'kapoenen']);
        $I->amOnRoute('takken.specific', ['id' => $db->Uri]);
        $I->canSeeCurrentUrlEquals('/tak/' . $db->Uri);
        $I->seeCurrentActionIs('takkenController@group');
        $I->see($db->Uri);
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlWelpen(FunctionalTester $I)
    {
        $db = $I->createModel('App\Group', ['Uri' => 'welpen']);
        $I->amOnRoute('takken.specific', ['id' => $db->Uri]);
        $I->canSeeCurrentUrlEquals('/tak/' . $db->Uri);
        $I->seeCurrentActionIs('takkenController@group');
        $I->see($db->Uri);
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlJongGivers(FunctionalTester $I)
    {
        $db = $I->createModel('App\Group', ['Uri' => 'jg']);
        $I->amOnRoute('takken.specific', ['id' => $db->Uri]);
        $I->canSeeCurrentUrlEquals('/tak/' . $db->Uri);
        $I->seeCurrentActionIs('takkenController@group');
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlGivers(FunctionalTester $I)
    {
        $db = $I->createModel('App\Group', ['Uri' => 'givers']);
        $I->amOnRoute('takken.specific', ['id' => $db->Uri]);
        $I->canSeeCurrentUrlEquals('/tak/' . $db->Uri);
        $I->seeCurrentActionIs('takkenController@group');
        $I->see($db->Uri);
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlJins(FunctionalTester $I)
    {
        $db = $I->createModel('App\Group', ['Uri' => 'jins']);
        $I->amOnRoute('takken.specific', ['id' => $db->Uri]);
        $I->canSeeCurrentUrlEquals('/tak/' . $db->Uri);
        $I->seeCurrentActionIs('takkenController@group');
        $I->see($db->Uri);
    }

    /**
     * @param FunctionalTester $I
     */
    public function FrontendUrlLeiding(FunctionalTester $I)
    {
        $db = $I->createModel('App\Group', ['Uri' => 'leiding']);
        $I->amOnRoute('takken.specific', ['id' => $db->Uri]);
        $I->canSeeCurrentUrlEquals('/tak/' . $db->Uri);
        $I->seeCurrentActionIs('takkenController@group');
        $I->see($db->Uri);
    }
}