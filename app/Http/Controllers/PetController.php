<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetCollection;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
 * @OA\Get(
 *     path="/api/pets",
 *     description="Displays all the pets",
 *     tags={"Pets"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of Pets in JSON format"
        *       ),
        *      @OA\Response(
        *          response=401,
        *          description="Unauthenticated",
        *      ),
        *      @OA\Response(
        *          response=403,
        *          description="Forbidden"
        *      )
 * )
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $pets = Pet::all();
        // return new PetCollection($pets);
        return new PetCollection(Pet::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pet = Pet::create($request->only([
            'species', 'breed', 'description', 'name', 'age'
        ]));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
