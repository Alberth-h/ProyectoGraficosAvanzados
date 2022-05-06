<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Adopcion</title>
</head>
<body>
    <h1>Editar Adopcion</h1>
    <a href="{{route('animales.index')}}">Regresar</a>
    <form method="POST" action="{{route('animales.update', $animal->id)}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div>
            <label>Especie</label>
            <input type="text" name="especie" id="especie" value="{{$animal->especie}}">
        </div>
        <div>
            <label>Edad</label>
            <input type="text" name="edad" id="edad" value="{{$animal->edad}}">
        </div>
        <div>
            <label>Ubicacion</label>
            <input type="text" name="ubicacion" id="ubicacion" value="{{$animal->ubicacion}}">
        </div>
        <div>
            <label>Descripcion</label>
            <textarea name="descripcion" id="descripcion" rows="5" value="{{$animal->descripcion}}"></textarea>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" id="foto" value="{{$animal->foto}}">
        </div>
        <div>
            <button type="submit">Actualizar</button>
        </div>
    </form>
</body>
</html>