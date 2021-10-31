<?php

namespace Tests\Feature;

use App\Models\Basket;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Livewire;

class CookieComponentTest extends TestCase
{

    use RefreshDatabase;

    public function test_cookies_work_in_livewire_component_tests()
    {

        // Basket ID will be 1
        $basket = Basket::factory()->create();

        Livewire::test('cookie-component')
            ->withCookie('basket', $basket->id)
            ->assertSee('Basket #1')
            ->call('$refresh')
            ->assertSee('Basket #1');

    }

    public function test_cookies_dont_work_in_livewire_component_tests()
    {

        // Basket ID will be 1
        $basket = Basket::factory()->create();

        Livewire::test('cookie-component')
            ->withCookie('basket', $basket->id)
            ->assertSee('Basket #2')
            ->call('$refresh')
            ->assertSee('Basket #3');

    }
}
