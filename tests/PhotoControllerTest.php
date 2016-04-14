<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PhotoControllerTest extends TestCase
{
    use DatabaseMigrations, DatabaseTransactions;

    /**
     * GET: fotos
     *
     * @group all
     * @group photos
     */
    public function testFrontedIndex()
    {
        $this->visit('fotos')->seeStatusCode(200);
    }

    /**
     * GET: backend/photos
     *
     * @group all
     * @group photos
     */
    public function testIndexAdmin()
    {

    }

    /**
     * GET: backend/photos/upload
     *
     * @group all
     * @group photos
     */
    public function testInsertView()
    {

    }

    /**
     * POST: fotos/{uri}
     *
     * @group all
     * @group photos
     */
    public function testPhotosSpecific()
    {
        $this->withoutMiddleware();
    }
}
