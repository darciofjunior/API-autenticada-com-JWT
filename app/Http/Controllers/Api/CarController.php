<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Car;

class CarController extends Controller
{
    private $car;

    public function __construct(Car $car)
    {
        $this->car = $car;
    }

    public function index()
    {
        if(!$cars = $this->car->orderBy('modelo', 'ASC')->get())
            return response()->json(['mensagem' => 'Not Found Car(s) !'], 404);

        return response()->json($cars);
    }

    public function show($id)
    {
        if(!$car = $this->car->find($id))
            return response()->json(['mensagem' => 'Not Found Car !'], 404);

        return response()->json($car);
    }

    public function store(Request $request)
    {
        $car = $this->car->create($request->all());

        return response()->json($car, 201);
    }

    public function update(Request $request, $id)
    {
        if(!$car = $this->car->find($id))
            return response()->json(['mensagem' => 'Not Found Car !'], 404);

        $car->update($request->all());

        return response()->json($car);
    }

    public function destroy($id)
    {
        if(!$car = $this->car->find($id))
            return response()->json(['mensagem' => 'Not Found Car !'], 404);

        $car->delete();

        return response()->json($car, 204);
    }
}
