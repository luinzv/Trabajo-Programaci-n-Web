<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <div class="container w-50">
        <form action="procesar.php" method="post" enctype="multipart/form-data">
            <h3 class="mb-3 mt-3">Complete el formulario</h3>
            <div class="mb-3 ">
                <label for="nombre" class="form-label">Nombre Completo</label>
                <input type="text" class="form-control form-control-sm mb-2 w-50" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="rut" class="form-label">RUT</label>
                <input type="number" class="form-control form-control-sm mb-2 w-50" id="rut" name="rut">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control form-control-sm mb-2 w-50" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="telefono" class="form-label">Telefono</label>
                <input type="number" class="form-control form-control-sm mb-2 w-50" id="telefono" name="telefono">
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control form-control-sm mb-2 w-50" id="imagen" name="imagen">
            </div>
            <button type="submit" class="btn btn-secondary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
</html>
