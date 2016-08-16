<?php

namespace App\Http\Controllers;

use App\ApiManagement;
use Illuminate\Http\Request;

use App\Http\Requests;

class ApiManagementController extends Controller
{

    public function index()
    {
        $items = ApiManagement::all();

        return view('ApiManagement.index', compact('items'));
    }

    public function create()
    {
        return view('ApiManagement.create');
    }
    public function store()
    {
        $apiManager = new ApiManagement();
        $apiManager->public_api_key = str_random('32');
        $apiManager->private_api_key = str_random('32');
        $apiManager->save();
        return redirect()->action('ApiManagementController@index');
    }

    public function show()
    {

    }


    public function update()
    {

    }

    public function destroy()
    {

    }
}
