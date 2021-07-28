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
    protected $testProduct;

    public function setUp(): void
    {
        parent::setUp();

        $this->testUser = User::factory()->create();

        $this->testProduct = Products::factory()->create();

        Passport::actingAs($this->testUser);
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_addProductsToCart()
    {
        $response = $this->call(
            'post',
            'cart',
            [
                'id' => $this->testProduct->id,
                'quantity' => rand(1, 100)
            ]
        );

        $response->assertStatus(200);
    }

    public function test_getCart()
    {
        $this->test_addProductsToCart();

        $response = $this->call(
            'post',
            'getCart'
        );

        $response->assertStatus(200);
    }

    public function test_editCart()
    {
        $this->test_addProductsToCart();

        $response = $this->call(
            'post',
            'editCart',
            [
                'id' => $this->testProduct->id,
                'quantity' => rand(1, 100)
            ]
        );

        $response->assertStatus(200);
    }

    public function test_deleteCart()
    {
        $this->test_addProductsToCart();

        $response = $this->call(
            'post',
            'deleteCart',
            [
                'id' => $this->testProduct->id
            ]
        );

        $response->assertStatus(200);
    }

    public function test_checkOutCart()
    {
        $this->test_addProductsToCart();

        $response = $this->call(
            'post',
            'checkOutCart'
        );

        $response->assertStatus(200);
    }

    public function test_getCheckedOutCart()
    {
        $this->test_addProductsToCart();
        $this->test_checkOutCart();

        $response = $this->call(
            'post',
            'getCheckedOutCart'
        );
    }
}
