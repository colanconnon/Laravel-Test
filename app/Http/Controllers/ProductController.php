<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Jobs\LogTextFile;
use App\Product;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
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
    public function index()
    {
        $products = Product::getActive();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

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
        $product = Product::with('Category')->where('id',$id)->first();
        return view('products.show', compact('product'));
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
        $product->update($productRequest->all());
        $productRequest->session()->flash('product_update', 'Product was updated in the database');
        return redirect()->action('ProductController@edit', $product->id);
    }

}
