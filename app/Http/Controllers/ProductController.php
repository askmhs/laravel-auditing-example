<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            $products = Products::all();
            return response()->json($products);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage()], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $product = Products::create($request->all());
            return response()->json($product);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage()], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Products::findOrFail($id);
            $product->audits;
            return response()->json($product);
        } catch (ModelNotFoundException $exception) {
            return response()->json(["Couldn't find the data you're looking for!"], 404);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage()], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Products::findOrFail($id);
            $product->update($request->all());
            return response()->json(Products::find($id));
        } catch (ModelNotFoundException $exception) {
            return response()->json(["Couldn't find the data you're looking for!"], 404);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $product = Products::findOrFail($id);
            $product->delete();
            return response()->json("The data successfully deleted!");
        } catch (ModelNotFoundException $exception) {
            return response()->json(["Couldn't find the data you're looking for!"], 404);
        } catch (\Exception $exception) {
            return response()->json([$exception->getMessage()], 500);
        }
    }
}
