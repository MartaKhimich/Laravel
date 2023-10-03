<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CategoryFormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testFormAddCategory(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/admin/categories/create')
                ->type('title', '1')
                ->press('Save')
                ->assertSee('Количество символов в поле заголовок должно быть не меньше 3');
        });
    }
}
