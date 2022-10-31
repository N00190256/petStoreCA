<?php

namespace App\Http\Controllers;

use App\Http\Resources\PetCollection;
use App\Http\Resources\PetResource;
use App\Models\Pet;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
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
 *  * @OA\Post(
 *     path="/api/pets",
 *     description="Create new pet",
 *     tags={"Pets"},
 *          *  @OA\Parameter(
     *      name="species",
     *      description="Species of Pet being added",
     *      example="Dog",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  ),
     *   *          *  @OA\Parameter(
     *      name="breed",
     *      description="Breed of Pet species",
     *      example="Labrador",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  ),
     *       *   *          *  @OA\Parameter(
     *      name="description",
     *      description="Description of Pet",
     *      example="Brown with white spots",
     *      in="path",
     *           @OA\Schema(
     *          type="text"
     *      )
     *  ),
     *       *   *          *  @OA\Parameter(
     *      name="name",
     *      description="Name of Pet",
     *      example="Bruno",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  ),
     *       *   *          *  @OA\Parameter(
     *      name="age",
     *      description="Age of Pet",
     *      example=8,
     *      in="path",
     *           @OA\Schema(
     *          type="int"
     *      )
     *  ),
     *      @OA\Response(
        *          response=201,
        *          description="Successful operation, Created a new pet"
        *       ),
        *      @OA\Response(
        *          response=405,
        *          description="Invalid input"
        *      )
 * )
 *  * @OA\Get(
 *     path="/api/pets/id",
 *     description="Displays Pet with specified id",
 *     tags={"Pets"},
 *     *       *   *          *  @OA\Parameter(
     *      name="id",
     *      description="id of Pet",
     *      example=5,
     *      in="path",
     *           @OA\Schema(
     *          type="int"
     *      )
     *  ),
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns Pet corresponding to id"
        *       ),
        *      @OA\Response(
        *          response=404,
        *          description="Not Found",
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

        return new PetResource($pet);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pet  $pet
     * @return \Illuminate\Http\Response
     */
    public function show(Pet $pet)
    {
        return new PetResource($pet);
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
