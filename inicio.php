<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MVC IHCI</title>

    <link rel="stylesheet" href="/estilos.css">

    <script src="https://kit.fontawesome.com/860e3c70ee.js" crossorigin="anonymous"></script>
    <script src="/script.js"></script>
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


    </maine>
    <script src="/script.js"></script>
</body>
</html>