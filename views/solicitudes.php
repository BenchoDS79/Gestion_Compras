<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC IHCI</title>
    <link rel="stylesheet" href="/css/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/860e3c70ee.js" crossorigin="anonymous"></script>
    <script src="/Js/estilos.js"></script>
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
    <div class="sidebar">
        <div class="sidebar-header">
            <element class="logo">
                <img src="/imagen/ihci.jfif">
            </element>
            <button class="menu-toggle" onclick="toggleSidebar()">&#9776;
                <span class="menu-icon"></span>
            </button>
        </div>
        <ul class="menu">
            <li>
                <a href="/index.php"><i class="fas fa-home"></i><span> Inicio </span></a>
            </li>
            <li><a href="/views/solicitudes.php"><i class="fas fa-envelope"></i><span> Solicitudes</span></a></li>
            <li><a href="/views/crear_solicitud.php"><i class="fas fa-plus"></i><span> Crear Solicitud</span></a></li>
            <li><a href="/views/cotizaciones.php"><i class="fas fa-file-alt"></i><span> Cotizaciones</span></a></li>
            <li><a href="/views/proveedores.php"><i class="fas fa-users"></i><span> Proveedores</span></a></li>
            <li><a href="#"><i class="fas fa-cubes"></i><span> Productos</span></a></li>
            <li><a href="#"><i class="fas fa-chart-bar"></i><span> Reportes</span></a></li>
            <li><a href="#"><i class="fas fa-cog"></i><span> Settings</span></a></li>
            <li><a href="#"><i class="fas fa-bell"></i><span> Mis Notificaciones</span></a></li>
            <li><a href="#"><i class="fas fa-sign-out-alt"></i><span> Salir</span></a></li>
            <li>
                <div><a href="#"><i class="fas fa-question-circle"></i><span> Help</span></a></div>
            </li>
        </ul>
    </div>


    <h2 class="text-center">SOLICITUDES DE COMPRA</h2>

    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="content" role="group" aria-label="First group">
            <button class="pdf-button"><i class="fas fa-file-pdf"></i></button>
            <button class="excel-button"><i class="fas fa-file-excel"></i></button>
            <button class="print-button"><i class="fas fa-print"></i></button>
            <button class="plus-button" onclick="toggleFloatingForm()"><i class="fas fa-plus"></i></button>
        </div>
        <div class="search-bar">
            <input type="text" placeholder="Buscar...">
            <button class="search-button"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <div class="content">
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>N Solicitud</th>
                        <th>Fecha</th>
                        <th>Monto Total</th>
                        <th>Creado por</th>
                        <th>Fec Creacion</th>
                        <th>Modificado por</th>
                        <th>Fec Modificacion</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    

                    <?php
                    $server = "localhost";
                    $username = "root";
                    $password = "rads123";
                    $dbname = "gestion_compras";
                    // Create connection
                    $conn = new mysqli($server, $username, $password, $dbname);
                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    echo "Connected successfully";

                    $sql = "SELECT * FROM tbl_solicitud_compra";
                    $result = $conn->query($sql);

                    if (!$result) {
                        die("Invalid Query:" . $connection->error);
                    }

                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "
                        <tr>
                            <td>$row[NUMERO_SOLICITUD]</td>
                            <td>$row[FECHA_SOLICITUD]</td>
                            <td>$row[MONTO_TOTAL]</td>
                            <td>$row[CREADO_POR]</td>
                            <td>$row[FECHA_CREACION]</td>
                            <td>$row[MODIFICADO_POR]</td>
                            <td>$row[FECHA_MODIFICACION]</td>
                            <td>
                            <button class='styled-button btn-warning edit-button'><i class='fas fa-edit'></i></button>
                            <button class='styled-button btn-danger delete-button'><i class='fas fa-trash'></i></button>
                            <button class='styled-button btn-success view-button'><i class='fas fa-eye'></i></button>
                            </td>
                        </tr>
                        ";
                    }
                    ?>


                </tbody>
            </table>

            <div class="content">
                <div class="table-container">
                    <table>
                        <!-- Contenido de la tabla -->
                    </table>
                </div>

                <?php
                // Datos de ejemplo para la paginación
                $totalSolicitudes = 50; // Total de registros en la base de datos
                $registrosPorPagina = 10; // Número de registros por página
                $totalPaginas = ceil($totalSolicitudes / $registrosPorPagina); // Cálculo del número total de páginas

                // Obtener el número de página actual (por ejemplo, a través de parámetro GET)
                $paginaActual = isset($_GET['page']) ? $_GET['page'] : 1;

                // Calcular el índice de inicio del primer registro en la página actual
                $indiceInicio = ($paginaActual - 1) * $registrosPorPagina;

                // Obtener los registros de la página actual de la base de datos (puedes ajustar esto según tu lógica y estructura de datos)
                // $registros = obtenerRegistrosDesdeLaBaseDeDatos($indiceInicio, $registrosPorPagina);

                // Mostrar los registros en la tabla
                // foreach ($registros as $registro) {
                //     // Generar filas de la tabla
                //     // ...
                // }
                ?>

                <div class="pagination">
                    <?php
                    // Botón de retroceso "<"
                    if ($paginaActual > 1) {
                        echo '<a href="?page=' . ($paginaActual - 1) . '"><i class="fas fa-chevron-left"></i></a>';
                    }

                    // Generar enlaces de paginación
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                        echo '<a href="?page=' . $i . '" ' . ($i == $paginaActual ? 'class="current"' : '') . '>' . $i . '</a>';
                    }

                    // Botón de avance ">"
                    if ($paginaActual < $totalPaginas) {
                        echo '<a href="?page=' . ($paginaActual + 1) . '"><i class="fas fa-chevron-right"></i></a>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
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
    <script src="/Js/script.js"></script>
</body>

</html>