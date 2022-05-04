<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use App\Models\Equipment;
use App\Models\CarEquipment;
use App\Models\CarGroup;
use App\Models\Group;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    
        $cars = Car::simplePaginate(10);
        return view('index', compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $newCar = new Car;
        // dd($newCar);
        $groups = Group::get();
        $equipment = Equipment::get();
        return view('form', compact('groups', 'equipment', 'newCar'));    
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarRequest $request)
    {
        
        $params = $request->all();
        dd($params);
        Car::create($params);
        return redirect()->route('cars.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view('show', compact('car'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
        $group = Group::find($id);
        $equipment = Equipment::get();
        return view('form', compact('car', 'group', 'equipment'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CarRequest $request, $id)
    {
        
        $car = Car::find($id);
        $params = $request->all();
    //    dd($id);
    if(isset( $params['equipment_id'])){
        $equipment_id = [];
        $equipment_id[] = $params['equipment_id'];
        $params['equipment_id'] = 1;
// dd($equipment_id[0]);
        $car->update($params);
        CarEquipment::where('car_id', $id)->delete();
        CarGroup::where('car_id', $id)->delete();
        foreach($equipment_id[0] as $oe_id){
            // dd($oe_id);
            $group_id = (int) Equipment::find($oe_id)->group_id;
            // dd( $group_id);
            $ce = CarEquipment::create([
                "equipment_id" => (int) $oe_id,
                "car_id" => (int) $id,
                "group_id" => (int) $group_id 
            ]);
            // dd($ce);
           $cg = CarGroup::create([
                "car_id" => (int) $id,
                "group_id" => (int) $group_id 
            ]);
            // dd($cg );
        }
    }
        
// dd(1);
        // $car->properties()->sync($request->property_id);

        return redirect()->route('cars.index');
        $car = Car::find($id);
        $params = $request->all();

        $car->update($params);
        // $car->properties()->sync($request->property_id);

        return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index');
    }
}
