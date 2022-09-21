<?php

namespace App\Http\Controllers;

use App\Models\vehicle;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vehicles = Vehicle::all();

        return $vehicles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'max_speed' => 'required|integer|gt:0',
            'horsepower' => 'required|integer|gt:0',
            'driver_id' => 'required|integer|gt:0',
            'manufacturer_id' => 'required|integer|gt:0'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }

        $vehicle = Vehicle::create([
            'name' => $request->name,
            'model' => $request->model,
            'max_speed' => $request->max_speed,
            'horsepower' => $request->horsepower,
            'driver_id' => $request->driver_id,
            'manufacturer_id' => $request->manufacturer_id
        ]);

        return $vehicle;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function show(vehicle $vehicle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function edit(vehicle $vehicle)
    {
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'string|max:100',
            'model' => 'string|max:100',
            'max_speed' => 'integer|gt:0',
            'power' => 'integer|gt:0',
            'driver_id' => 'integer|gt:0',
            'manufacturer_id' => 'integer|gt:0'
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $vehicle = Vehicle::find($id);

        if (!isset($vehicle)) return response()->json("Vehicle with id: $id not found", 404);

        foreach ($request->all() as $key => $value) {
            $vehicle[$key] = $value;
        }

        $vehicle->save();
        return $vehicle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vehicle  $vehicle
     * @return \Illuminate\Http\Response
     */
    public function destroy($vehicle_id)
    {
        Vehicle::destroy($vehicle_id);
    }
}
