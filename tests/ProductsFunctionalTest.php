<?php

use App\Product;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductsFunctionalTest extends TestCase
{

    /**
     * Test when you go to the products route you can see products
     */
    public function testCanSeeProducts()
    {
        $this->visit('/product')
            ->see('Products');
        $product = Product::all()->first();
        $this->see($product->name);
    }

    public function testCanSeeProductDetail()
    {
        //get a product
        $product = Product::all()->first();
        //visit the products page and click a link
        $this->visit('/product')
            ->see($product->name)
            ->click($product->name);
        //verify we went to the right page and we can see the right price.
        $this->seePageIs('/product/'. $product->id);
        $this->see($product->price);
    }

    /**
     *
     */
    public function testCanSeeUpdateProduct()
    {
        $product = Product::all()->first();
        $user = \App\User::find(1);
        $this->actingAs($user);
        $faker = Faker\Factory::create();
        $this->visit('/product')
             ->click("Edit")
             ->seePageIs("/product/". $product->id . "/edit/")
             ->see('Edit Product')
             ->seeInField('name', $product->name)
             ->seeInField('price', $product->price)
             ->type($faker->slug, 'name')
             ->type($faker->randomFloat(2, 0, 200), 'price')
             ->press('Update Product')
             ->see('Product was updated');

    }

    public function testCanCreateProduct()
    {
        $faker = Faker\Factory::create();
        $user = \App\User::find(1);
        $this->actingAs($user);
        $this->visit('/product')
            ->click("Create New Product")
            ->seePageIs("/product/create")
            ->see('Create Product')
            ->seeInField('name', '')
            ->seeInField('price', '')
            ->type($faker->slug, 'name')
            ->type($faker->randomFloat(2, 0, 200), 'price')
            ->press('Create Product')
            ->see('Product was created');
    }


    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
