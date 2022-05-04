
@extends('master')

@section('title', 'Машина ' . $car->brand . ' ' . $car->model . ' ' . $car->generation)

@section('content')
    <div class="col-md-12">
        <h1>{{  $car->brand . ' ' . $car->model . ' ' . $car->generation}}</h1>
        {{-- @dd($car) --}}
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Поле
                </th>
                <th>
                    Значение
                </th>
            </tr>
            @foreach($car->toArray() as $key => $value)
            @if($key != 'equipment') 
            <tr>
                <td>{{$key}}</td>
                <td>{{ $value }}</td>
            </tr>
            @endif
            @if($key == 'equipment') 
                @foreach($car->carGroup() as $item)
                    <tr>
                        <td>{{$car->groupName($item->group_id)}}</td>
                         @foreach($car->equipment($item->group_id) as $key)
                         @isset($car->equipmentName($key->equipment_id)[0]->ru_name)
                                <td> {{$car->equipmentName($key->equipment_id)[0]->ru_name}}</td>
                        @endisset
                        @endforeach 
                    </tr>
                @endforeach
            @endif
            @endforeach
            
            </tbody>
        </table>
    </div>
@endsection