<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario Flotante</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        /* Estilos adicionales */
.floating-form {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    background-color: #fff;
    border: 1px solid #ccc;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

.floating-form .close-button {
    position: relative;
    top: 10px;
    right: 10px;
    cursor: pointer;
    color: #dc3545;
}

.floating-form .close-button:hover {
    color: #721c24;
}

.btn-primary {
    color: #fff;
    background-color: #007bff;
    border-color: #007bff;
    justify-content: right;
}
    </style>
</head>

<body>
    <!-- Botón para abrir el formulario flotante -->
    <button class="btn btn-primary" onclick="toggleFloatingForm()">Agregar</button>

    <!-- Formulario flotante -->
    <div class="floating-form" id="floatingForm" style="display: none;">


        <h4>Agregar Solicitud de Compra</h4>

        <form action="procesar_detalle.php" method="POST">

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Numero de Solicitud</span>
                <input type="text" class="form-control" id="CREADO_POR" name="numero_solicitud" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Solicitud</span>
                <input type="date" class="form-control" id="FECHA_SOLICITUD" name="fecha_solicitud" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Monto Total</span>
                <input type="number" class="form-control" id="MONTO_TOTAL" name="monto_total" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Creado Por</span>
                <input type="text" class="form-control" id="CREADO_POR" name="creado_por" required>
            </div>

            <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Fecha Creacion</span>
                <input type="date" class="form-control" id="FECHA_CREACION" name="fecha_creacion" required>
            </div>
            <!-- Aquí puedes agregar más campos del formulario según tus necesidades -->
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-primary">Agregar</button>
                <button class="btn btn-danger ml-auto" onclick="toggleFloatingForm()">Cerrar</button>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.min.js"></script>
    <script src="/script.js"></script>
</body>

</html>