<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Todo;
use Illuminate\Http\Request;

use App\Http\Requests;
use Mockery\CountValidator\Exception;

class TodoController extends Controller
{
    //

    /**
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function index()
    {
        try
        {
            $todos = Todo::all();
            if(count($todos) > 0) {
                return response($todos, 200);
            }
            return response([], 204);
        }
        catch (Exception $e)
        {
            return response(["error" => "Error processing request"], 500);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function store(Request $request)
    {
        try
        {
            $todo = Todo::create($request->all());
            if($todo->save()) {
                return response($todo, 201);
            }
            return response(["error" => "error saving todo item, check all fields and try again"], 400);
        }
        catch (Exception $e)
        {
            return response(["error" => "Error processing request"], 500);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function show($id)
    {
        try
        {
            $todo = Todo::find($id);
            if(!empty($todo)) {
                return response($todo, 200);
            }
            return response(["error" => "Todo Item doesn't exist"], 404);
        }
        catch(Exception $e)
        {
            return response(["error" => "Error processing request"], 500);
        }
    }

    /**
     * @param $id
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function destroy($id)
    {
        try
        {
            $todo = Todo::find($id);
            if(!empty($todo)) {
                $todo->delete();
                return response(null, 200);
            }
            return response(["error" => "Todo Item doesn't exist"],404);
        }
        catch (Exception $e)
        {
            return response(["error" => "Error processing request"], 500);
        }
    }

    /**
     * @param         $id
     * @param Request $request
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function update($id, Request $request)
    {
        try
        {
            $todo = Todo::find($id);
            if(!empty($todo)) {
                $todo->update($request->all());
                return response($todo, 200);
            }
            return response(["error" => "Todo Item doesn't exist"], 404);
        }
        catch (Exception $e)
        {
            return response(["error" => "Error processing request"], 500);
        }
    }
}
