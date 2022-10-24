<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Http\Requests\CarRequest;

class CarController extends Controller
{
    public function index()
    {
        $cars = Car::all();
        return $this->successResponse($cars);
    }

    public function show(Car $car)
    {
        return $this->successResponse($car);
    }

    public function store(CarRequest $request)
    {
        $car = Car::create($request->only(['name', 'user_id']));
        return $this->successResponse($car, 'created');
    }

    public function update(Car $car, CarRequest $request)
    {
        $car->fill($request->all());
        $car->save();
        return $this->successResponse($car, 'updated');
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return $this->successResponse(null, 'deleted');
    }

    public function free()
    {
        return $this->successResponse(Car::free()->get());
    }

    public function inuse()
    {
        return $this->successResponse(Car::inuse()->get());
    }
}
