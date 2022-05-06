<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adopcion Animal</title>
</head>
<body>
    <h1>Lista de Oferta de Adopcion</h1>
    @if(Session::has('exito'))
        <p>{{Session::get('exito')}}</p>
    @endif
    @if(Session::has('error'))
        <p>{{Session::get('error')}}</p>
    @endif
    <a href="{{route('animales.create')}}">Añadir Adopcion</a>
    <table>
        <thead>
            <tr>
                <th>Especie</th>
                <th>Edad</th>
                <th>Ubicacion</th>
                <th>Descripcion</th>
                <!-- <th>Foto</th> -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($animales as $animal)
                <tr>
                    <td>{{$animal->especie}}</td>
                    <td>{{$animal->edad}}</td>
                    <td>{{$animal->ubicacion}}</td>
                    <td>{{$animal->descripcion}}</td>
                    <!-- <td>{{$animal->foto}}</td> -->
                    <td>
                        <form method="post" action="{{ route('animales.destroy', $animal->id) }}">
                            @csrf
                            @method('delete')
                            <a href="{{ route('animales.edit', $animal->id) }}">Editar</a>
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>