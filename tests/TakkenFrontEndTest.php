<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TakkenFrontEndTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;
    
    /**
     * GET: takken
     *
     * @group all
     * @group groups
     */
    public function testTakken()
    {
        $this->visit('takken')->seeStatusCode(200);
    }

    /**
     * GET: tak/kapoenen
     *
     * @group all
     * @group groups
     */
    public function testTakKapoenen()
    {
        $tak = factory(App\Group::class)->create(['Uri' => 'kapoenen']);
        
        $this->visit('tak/' . $tak->Uri)
            ->seeStatusCode(200)
            ->see($tak->Uri)
            ->see($tak->title)
            ->see($tak->sub_title)
            ->see($tak->description);
    }

    /**
     * GET: tak/welpen
     *
     * @group all
     * @group groups
     */
    public function testTakWelpen()
    {
        $tak = factory(App\Group::class)->create(['Uri' => 'welpen']);

        $this->visit('tak/' . $tak->Uri)
            ->seeStatusCode(200)
            ->see($tak->Uri)
            ->see($tak->title)
            ->see($tak->sub_title)
            ->see($tak->description);
    }

    /**
     * GET: tak/jongGivers
     *
     * @group all
     * @group groups
     */
    public function testTakJongGivers()
    {
        $tak = factory(App\Group::class)->create(['Uri' => 'jonggivers']);

        $this->visit('tak/' . $tak->Uri)
            ->seeStatusCode(200)
            ->see($tak->Uri)
            ->see($tak->title)
            ->see($tak->sub_title)
            ->see($tak->description);
    }

    /**
     * GET: tak/givers
     *
     * @group all
     * @group groups
     */
    public function testTakGivers()
    {
        $tak = factory(App\Group::class)->create(['Uri' => 'givers']);

        $this->visit('tak/' . $tak->Uri)
            ->seeStatusCode(200)
            ->see($tak->Uri)
            ->see($tak->title)
            ->see($tak->sub_title)
            ->see($tak->description);
    }

    /**
     * GET: tak/jins
     *
     * @group all
     * @group groups
     */
    public function testTakJins()
    {
        $tak = factory(App\Group::class)->create(['Uri' => 'jins']);

        $this->visit('tak/' . $tak->Uri)
            ->seeStatusCode(200)
            ->see($tak->Uri)
            ->see($tak->title)
            ->see($tak->sub_title)
            ->see($tak->description);
    }

    /**
     * GET: tak/leiding
     *
     * @group all
     * @group groups
     */
    public function testTakLeiding()
    {
        $tak = factory(App\Group::class)->create(['Uri' => 'leiding']);

        $this->visit('tak/' . $tak->Uri)
            ->seeStatusCode(200)
            ->see($tak->Uri)
            ->see($tak->title)
            ->see($tak->sub_title)
            ->see($tak->description);
    }
}
