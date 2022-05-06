<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir Adopcion</title>
</head>
<body>
    <h1>Añadir Adopcion</h1>
    <a href="{{route('animales.index')}}">Regresar</a>
    <form method="POST" action="{{route('animales.store')}}" enctype="multipart/form-data">
        @csrf
        <div>
            <label>Especie</label>
            <input type="text" name="especie" id="especie">
        </div>
        <div>
            <label>Edad</label>
            <input type="text" name="edad" id="edad">
        </div>
        <div>
            <label>Ubicacion</label>
            <input type="text" name="ubicacion" id="ubicacion">
        </div>
        <div>
            <label>Descripcion</label>
            <textarea name="descripcion" id="descripcion" rows="5"></textarea>
        </div>
        <div>
            <label>Foto</label>
            <input type="file" name="foto" id="foto">
        </div>
        <div>
            <button type="submit">Crear</button>
        </div>
    </form>
</body>
</html>