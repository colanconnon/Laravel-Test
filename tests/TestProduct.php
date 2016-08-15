<?php

use App\Category;
use App\Image;
use App\Product;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestProduct extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProductCanSave()
    {
        $product = new Product();
        $product->name = "Test Product";
        $product->price = 12.45;

        $product->save();

        $this->seeInDatabase('products', ['name' => 'Test Product']);


    }

    /**
     *
     */
    public function testProductCanBeUpdated()
    {
        $product = Product::all()->first();

        $product->name = "updated_product";
        $product->save();
        $this->seeInDatabase('products', ['name' => "updated_product",
                                         "id" => $product->id]);
    }

    /**
     *
     */
    public function testProductCanBeDeleted()
    {
        $product = Product::all()->first();

        $product->delete();

        $this->assertNull(Product::find($product->id));

    }

    /**
     *
     */
    public function testCategoryCanRetrieveProducts()
    {
        $category = Category::all()->last();

        $this->assertTrue(count($category->products) >= 1);
    }

    /**
     *
     */
    public function testProductCanHaveImage()
    {
        $product = Product::all()->first();

        $image = new Image();
        $image->image_url = "/public/test.png";

        $image->image()->associate($product);
        $image->save();

        $this->seeInDatabase('images', ['image_id' => $product->id,
                                        'id' => $image->id]);
    }
    /**
     *
     */
    public function testProductCanHaveCategoryAndDescription()
    {
        $product = new Product();
        $product->name = "ProductWithCategory";
        $product->price = 12.14;

        $category = new Category();
        $category->name = 'testCategory';
        $category->save();

        $product->Category()->associate($category);
        $product->save();

        $this->seeInDatabase('products', ['category_id' => $category->id, 'name' => $product->name]);

    }
}
