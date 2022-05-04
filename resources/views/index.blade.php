@extends('master')

@section('title', 'Машины')

@section('content')


    <div class="col-md-12">
        <h1>Машины</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Код
                </th>
                <th>
                    Марка
                </th>
                <th>
                    Модель
                </th>
                <th>
                    Год выпуска
                </th>
                <th>
                    Действия
                </th>
            </tr>
            @foreach($cars as $car)
                <tr>
                    <td>{{ $car->id}}</td>
                    <td>{{ $car->brand }}</td>
                    <td>{{ $car->model }}</td>
                    <td>{{ $car->year }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('cars.destroy', $car) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('cars.show', $car) }}">Открыть</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('cars.edit', $car) }}">Редактировать</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Удалить"></form>
                        </div>
                    </td>
                </tr>
            @endforeach
            <tr>      
                <th>
                    <a class="btn btn-success" type="button" href="{{ route('cars.create') }}">Добавить машину</a>
                </th>  
            </tr>
            </tbody>
        </table>

        
        {{ $cars->links() }}
    </div>

@endsection
