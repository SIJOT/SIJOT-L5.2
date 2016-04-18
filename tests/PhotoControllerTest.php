<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

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
        Artisan::call('bouncer:seed');

        $user = factory(App\User::class)->create();
        $role = Bouncer::assign('active')->to($user);

        $this->assertTrue($role);

        $this->actingAs($user)
            ->seeIsAuthenticatedAs($user)
            ->visit('backend/photos')
            ->seeStatusCode(200);

    }

    /**
     * POST: backend/photos/upload
     *
     * @group all
     * @group photos
     */
    public function testInsertView()
    {
        // TODO: write test.
        $this->withoutMiddleware();
    }

    /**
     * POST: fotos/{uri}
     *
     * @group all
     * @group photos
     */
    public function testPhotosSpecific()
    {
        $this->visit('fotos/kapoenen')->seeStatusCode(200);
    }
}
