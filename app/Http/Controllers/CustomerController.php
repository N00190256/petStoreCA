<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\CustomerCollection;     
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Implementation of Swagger documentation for customer table
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


class CustomerController extends Controller
{

    /**
     *
 * @OA\Get(
 *     path="/api/customers",
 *     description="Displays all the customers",
 *     tags={"Customers"},
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns a list of customers in JSON format"
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
 *     path="/api/customers",
 *     description="Create new customer",
 *     tags={"Customers"},
 *       *          *  @OA\Parameter(
     *      name="name",
     *      description="Name of customer",
     *      example="Mark Roberts",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  ),
     *   *          *  @OA\Parameter(
     *      name="address",
     *      description="Address of customer",
     *      example="21 Parkville Road, Dublin",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  )
 * )
 *  * @OA\Get(
 *     path="/api/customers/id",
 *     description="Displays customer with specified id",
 *     tags={"Customers"},
 *          *  @OA\Parameter(
     *      name="id",
     *      description="id of customer",
     *      example=5,
     *      in="path",
     *           @OA\Schema(
     *          type="int"
     *      )
     *  ),
     *      @OA\Response(
        *          response=200,
        *          description="Successful operation, Returns customer corresponding to id"
        *       ),
        *      @OA\Response(
        *          response=404,
        *          description="Not Found",
        *      )
 * )
 *  * @OA\Put(
 *     path="/api/customers/id",
 *     description="Create new customer",
 *     tags={"Customers"},
 *          *  @OA\Parameter(
     *      name="id",
     *      description="id of customer you want to Update",
     *      example=7,
     *      in="path",
     *           @OA\Schema(
     *          type="int"
     *      )
     *  ),
     *   *          *  @OA\Parameter(
     *      name="name",
     *      description="Name of customer",
     *      example="Mark Roberts",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  ),
     *   *          *  @OA\Parameter(
     *      name="address",
     *      description="Address of customer",
     *      example="21 Parkville Road, Dublin",
     *      in="path",
     *           @OA\Schema(
     *          type="varchar"
     *      )
     *  ),
     *      @OA\Response(
        *          response=400,
        *          description="Invalid id supplied"
        *       ),
     *      @OA\Response(
        *          response=404,
        *          description="Customer not found"
        *       ),
        *      @OA\Response(
        *          response=405,
        *          description="Validation exception"
        *      )
 * )
    * @OA\Delete(
 *     path="/api/customers/id",
 *     description="Delete a customer",
 *     tags={"Customers"},
 *          *  @OA\Parameter(
     *      name="id",
     *      description="id of customer you want to Delete",
     *      example=4,
     *      in="path",
     *           @OA\Schema(
     *          type="int"
     *      )
     *  ),
     *      @OA\Response(
        *          response=400,
        *          description="Invalid id supplied"
        *       ),
        *      @OA\Response(
        *          response=404,
        *          description="Customer not found"
        *      )
 * )
     * @return \Illuminate\Http\Response
     */


/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//Implementation of CRUD functionality for customer table
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new CustomerCollection(Customer::paginate(1));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCustomerRequest $request)
    {
        
        $customer = Customer::create([
            'name' => $request->name,
            'address' => $request->address
        ]);

            return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        $customer -> update($request->all()); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer ->delete();
    }
}
