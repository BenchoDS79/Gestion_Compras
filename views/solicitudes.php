<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC IHCI</title>

    <link rel="stylesheet" href="/estilos.css">

    <script src="https://kit.fontawesome.com/860e3c70ee.js" crossorigin="anonymous"></script>
    
</head>


<body id="body">
<header>
        <div class="icon__menu">
            <i class="fas fa-bars" id="btn_open"></i>
        </div>
        <div class="centrar">
            <h1>MVC IHCI</h1>
        </div>
        
    </header>

    <div class="menu__side" id="menu_side">

        <div class="name__page">
            <i class="fa-solid fa-landmark"></i>
            <h4>IHCI</h4>
        </div>

        <div class="options__menu">	

            <a href="/views/solicitudes.php"/>
                <div class="option">
                    <i class="fas fa-envelope" title="Solicitudes"></i>
                    <h5>Solicitudes</h5>
                </div>
            </a>

            <a href="/views/crear_solicitud.php">
                <div class="option">
                    <i class="fas fa-plus" title="Crear Solicitud"></i>
                    <h5>Crear Solicitud</h5>
                </div>
            </a>
            
            <a href="/views/cotizaciones.php">
                <div class="option">
                    <i class="fas fa-file-alt" title="Cotizaciones"></i>
                    <h5>Cotizaciones</h5>
                </div>
            </a>

            <a href="/views/proveedores.php">
                <div class="option">
                    <i class="fas fa-users" title="Proveedores"></i>
                    <h5>Proveedores</h5>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-cubes" title="Productos"></i>
                    <h5>Productos</h5>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-chart-bar" title="Reportes"></i>
                    <h5>Reportes</h5>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-cog" title="Settings"></i>
                    <h5>Settings</h5>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-bell" title="Notificaciones"></i>
                    <h5>Notificaciones</h5>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-sign-out-alt" title="Salir"></i>
                    <h5>Salir</h5>
                </div>
            </a>

            <a href="#">
                <div class="option">
                    <i class="fas fa-question-circle" title="Ayuda"></i>
                    <h5>Ayuda</h5>
                </div>
            </a>

        </div>

    </div>


    <maine>
    <h2 class="text-center">SOLICITUDES DE COMPRA</h2>

    <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
        <div class="content" role="group" aria-label="First group">
            <button class="pdf-button"><i class="fas fa-file-pdf"></i></button>
            <button class="excel-button"><i class="fas fa-file-excel"></i></button>
            <button class="print-button"><i class="fas fa-print"></i></button>
            <button class="plus-button"><i class="fas fa-plus"></i></button>
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
                                <button class='btn btn-warning'><i class='fas fa-edit'></i></button>
                                <button class='btn btn-danger'><i class='fas fa-trash'></i></button>
                                <button class='btn btn-success'><i class='fas fa-eye'></i></button>
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
                </maine>
    <script src="script.js"></script>
</body>

</html>