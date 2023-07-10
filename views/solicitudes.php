<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitudes</title>
    <link rel="stylesheet" href="/css/estilos.css">
    <script src="https://kit.fontawesome.com/860e3c70ee.js" crossorigin="anonymous"></script>
    <script src="/estilos.js"></script>
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
            <li><a href="/index.php"><i class="fas fa-home"></i><span> Inicio</span></a></li>
            <li><a href="#"><i class="fas fa-envelope"></i><span> Solicitudes</span></a></li>
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

    <div class="content">
        <h2 class="text-center">SOLICITUDES DE COMPRA</h2>


        <div class="search-bar">
            <input type="text" placeholder="Buscar...">
            <button class="search-button"><i class="fas fa-search"></i></button>
            <button class="pdf-button"><i class="fas fa-file-pdf"></i></button>
            <button class="excel-button"><i class="fas fa-file-excel"></i></button>
            <button class="print-button"><i class="fas fa-print"></i></button>
        </div>



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
                    <tr>
                        <td>1</td>
                        <td>Fecha 1</td>
                        <td>Monto 1</td>
                        <td>Creado por 1</td>
                        <td>Fec creacion 1</td>
                        <td>Modificado por 1</td>
                        <td>Fec Modificacion 1</td>
                        <td>
                            <button class="styled-button edit-button"><i class="fas fa-edit"></i></button>
                            <button class="styled-button delete-button"><i class="fas fa-trash"></i></button>
                            <button class="styled-button view-button"><i class="fas fa-eye"></i></button>

                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Fecha 2</td>
                        <td>Monto 2</td>
                        <td>Creado por 2</td>
                        <td>Fec creacion 2</td>
                        <td>Modificado por 2</td>
                        <td>Fec Modificacion 2</td>
                        <td>
                            <button class="styled-button edit-button"><i class="fas fa-edit"></i></button>
                            <button class="styled-button delete-button"><i class="fas fa-trash"></i></button>
                            <button class="styled-button view-button"><i class="fas fa-eye"></i></button>

                        </td>
                    </tr>
                    <!-- Agregar más filas de solicitudes aquí -->
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
</body>

</html>