<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Products;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Passport\Passport;
use Tests\TestCase;

class CartControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $testUser;

    public function setUp(): void
    {
        parent::setUp();

        $this->testUser = User::create([
            'name' => 'test_name',
            'email' => 'test_email@gmail.com',
            'password' => 'test_password',
            'level' => 0
        ]);

        Passport::actingAs($this->testUser);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_addProductsToCart()
    {

        $testProduct = Products::create([
            'cht_name' => 'test_cht_name',
            'en_name' => 'test_en_name',
            'mvp' => 0,
            'content' => 'test_content',
            'equipment' => 'test_equipment',
            'price' => 100,
            'quantity' => 100
        ]);

        $response = $this->call(
            'post',
            'cart',
            [
                'id' => $testProduct->id,
                'quantity' => 101
            ]
        );

        $response->assertStatus(200);
    }

    public function test_getCart()
    {
        
    }
}
