@extends('master')

@isset($car)
    @section('title', 'Редактировать машину ' .  $car->brand . ' ' . $car->model . ' ' . $car->generation)
@else
    @section('title', 'Создать машину')
@endisset

@section('content')
    <div class="col-md-12">
        @isset($car)
            <h1>Редактировать машину <b>{{ $car->brand }}  {{ $car->model }} {{$car->generation}}</b></h1>
        @else
            <h1>Добавить машину</h1>
        @endisset
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" enctype="multipart/form-data"
              @isset($car)
              action="{{ route('cars.update', $car) }}"
              @else
              action="{{ route('cars.store') }}"
            @endisset
        >
            <div>

                @isset($car)
                    @method('PUT')
                @endisset
                @csrf
                @isset($car)
                    @foreach($car->toArray() as $key => $value)
                    @if($key != 'equipment')
                    <div class="input-group row">
                        <label for="code" class="col-sm-2 col-form-label">{{ $key }}: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="{{ $key }}" id="{{ $key }}"
                                value="@isset($car){{ $value }}@endisset">
                        </div>
                    </div>
                    <br>
                    @endif
                    @if($key == 'equipment')
                    @foreach($car->groups() as $group)
                            <br>
                            <div class="input-group row">
                                <label for="property_id" class="col-sm-2 col-form-label">{{ $group->ru_name }}: </label>
                                <div class="col-sm-6">
                                    <select name="equipment_id[]" multiple>
                                        @foreach($group->equipment() as $equipment)
                                            <option value="{{ $equipment->id }}"
                                                    @isset($car)
                                                        @if($car->carEquipment()->contains('equipment_id', $equipment->id))
                                                            selected
                                                        @endif
                                                    @endisset
                                            >{{ $equipment->ru_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                    @endforeach
                    @endif
                    @endforeach
                @endisset
                
                
                @csrf
                @isset($newCar)
                    @foreach($newCar->getFillable() as $key => $value)
                    @if($value != 'equipment')
                    <div class="input-group row">
                        <label for="code" class="col-sm-2 col-form-label">{{ $value }}: </label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="{{ $value }}" id="{{ $value }}"
                                value="">
                        </div>
                    </div>
                    <br>
                    @endif
                    @if($value == 'equipment')
                    @foreach($groups as $group)
                            <br>
                            <div class="input-group row">
                                <label for="property_id" class="col-sm-2 col-form-label">{{ $group->ru_name }}: </label>
                                <div class="col-sm-6">
                                    <select name="equipment_id[]" multiple>
                                        @foreach($group->equipment() as $equipment)
                                            <option value="{{ $equipment->id }}"
                                            >{{ $equipment->ru_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <br>
                    @endforeach
                    @endif
                    @endforeach
                @endisset
                

                <button class="btn btn-success">Сохранить</button>
            </div> 
        </form>
    </div>
@endsection
