<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Image;
use App\Jobs\LogTextFile;
use App\Product;
use App\ProductImages;
use App\ProductImagesFacade;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

class ProductController extends Controller
{
    //
    function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * @return View
     */
    public function index()
    {
        $products = Product::getActive();
        return view('products.index', compact('products'));
    }

    /**
     * @return View
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * @param $id
     * @return View
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return View('products.edit', compact('product'));
    }




    /**
     * @param ProductRequest $productRequest
     * @return mixed
     */
    public function store(ProductRequest $productRequest)
    {

        $product = Auth::user()->products()->create($productRequest->all());

        Mail::queue('emails.created', [], function ($message) {
            $message->from('postmaster@sandbox14d795b801ed403eafd82752be6a51fd.mailgun.org', 'Laravel');
            $message->to('cconnon11@gmail.com');
        });
        Mail::later(5000, 'emails.reminder', [], function ($message) {
            $message->from('postmaster@sandbox14d795b801ed403eafd82752be6a51fd.mailgun.org', 'Laravel');
            $message->to('cconnon11@gmail.com');
        });
        $dbImage = new Image();
        $image = Input::file('image');

        if(!empty($image)) {
            $name = str_random(16) . '.jpg';
            $image->move(public_path() . '/images/', $name);
            $dbImage->image_url = $name;
        } else {
            $dbImage->image_url = "default.jpeg";
        }
        $dbImage->image()->associate($product);
        $dbImage->save();
        $this->dispatch(new LogTextFile());
        $productRequest->session()->flash('product_update', 'Product was created in the database');
        return redirect()->action('ProductController@edit', $product->id);

    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function show($id)
    {
        $image = ProductImagesFacade::get($id);
        $product = Product::with('Category')->where('id',$id)->first();
        return view('products.show', compact('product', 'image'));
    }

    /**
     * @param Product        $product
     * @param ProductRequest $productRequest
     * @return Product
     * @internal param $ Requests\ProductRequest $
     *
     */
    public function update(Product $product, ProductRequest $productRequest)
    {
        $user = Auth::user();
        if($user->can('update', $product)) {
            $product->update($productRequest->all());
            $productRequest->session()->flash('product_update', 'Product was updated in the database');
            return redirect()->action('ProductController@edit', $product->id);
        } else {
            abort(403);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->action('ProductController@index');
    }

}
