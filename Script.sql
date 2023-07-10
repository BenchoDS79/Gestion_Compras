-- Uso de la base de datos
USE gestion_compras;

-- Creación de la tabla TBL_PREGUNTAS
CREATE TABLE TBL_PREGUNTAS (
  ID_PREGUNTA INT PRIMARY KEY AUTO_INCREMENT,
  PREGUNTA VARCHAR(200),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Creación de la tabla TBL_MS_ROLES
CREATE TABLE TBL_MS_ROLES (
  ID_ROL INT PRIMARY KEY AUTO_INCREMENT,
  NOMBRE_ROL VARCHAR(100),
  DESCRIPCION VARCHAR(200),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Creación de la tabla TBL_PERMISOS
CREATE TABLE TBL_PERMISOS (
  ID_PERMISO INT PRIMARY KEY AUTO_INCREMENT,
  NOMBRE_PERMISO VARCHAR(100),
  DESCRIPCION VARCHAR(200),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Creación de la tabla TBL_OBJETOS
CREATE TABLE TBL_OBJETOS (
  ID_OBJETO INT PRIMARY KEY AUTO_INCREMENT,
  NOMBRE_OBJETO VARCHAR(100),
  DESCRIPCION VARCHAR(200),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Creación de la tabla TBL_PROVEEDORES
CREATE TABLE TBL_PROVEEDORES (
  ID_PROVEEDOR INT PRIMARY KEY AUTO_INCREMENT,
  NOMBRE VARCHAR(100),
  DIRECCION VARCHAR(200),
  TELEFONO VARCHAR(20),
  CORREO_ELECTRONICO VARCHAR(100),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Creación de la tabla TBL_MS_USUARIO
CREATE TABLE TBL_MS_USUARIO (
  ID_USUARIO INT PRIMARY KEY AUTO_INCREMENT,
  NOMBRE_USUARIO VARCHAR(100),
  CONTRASENA VARCHAR(100),
  CORREO_ELECTRONICO VARCHAR(100),
  FECHA_VENCIMIENTO DATE,
  ESTADO VARCHAR(20),
  ID_ROL INT,
  ID_PREGUNTA INT,
  RESPUESTA_PREGUNTA VARCHAR(100),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ID_ROL) REFERENCES TBL_MS_ROLES(ID_ROL),
  FOREIGN KEY (ID_PREGUNTA) REFERENCES TBL_PREGUNTAS(ID_PREGUNTA)
);

-- Creación de la tabla TBL_MS_PARAMETROS
CREATE TABLE TBL_MS_PARAMETROS (
  ID_PARAMETRO INT PRIMARY KEY AUTO_INCREMENT,
  PARAMETRO VARCHAR(100),
  VALOR VARCHAR(100),
  ID_USUARIO INT,
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ID_USUARIO) REFERENCES TBL_MS_USUARIO(ID_USUARIO)
);


-- Creación de la tabla TBL_MS_HIST_CONTRASEÑA
CREATE TABLE TBL_MS_HIST_CONTRASENA (
  ID_HIST INT PRIMARY KEY AUTO_INCREMENT,
  ID_USUARIO INT,
  CONTRASENA VARCHAR(100),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ID_USUARIO) REFERENCES TBL_MS_USUARIO(ID_USUARIO)
);

-- Creación de la tabla TBL_ORDEN_PAGO
CREATE TABLE TBL_ORDEN_PAGO (
  ID_ORDEN_PAGO INT PRIMARY KEY AUTO_INCREMENT,
  ID_PROVEEDOR INT,
  NUMERO_ORDEN VARCHAR(20),
  FECHA_ORDEN DATE,
  MONTO_TOTAL DECIMAL(10, 2),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,  
  FOREIGN KEY (ID_PROVEEDOR) REFERENCES TBL_PROVEEDORES(ID_PROVEEDOR)
);

-- Creación de la tabla TBL_ORDEN_COMPRA
CREATE TABLE TBL_ORDEN_COMPRA (
  ID_ORDEN_COMPRA INT PRIMARY KEY AUTO_INCREMENT,
  ID_PROVEEDOR INT,
  NUMERO_ORDEN VARCHAR(20),
  FECHA_ORDEN DATE,
  MONTO_TOTAL DECIMAL(10, 2),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ID_PROVEEDOR) REFERENCES TBL_PROVEEDORES(ID_PROVEEDOR)
);

-- Creación de la tabla TBL_COTIZACION
CREATE TABLE TBL_COTIZACION (
  ID_COTIZACION INT PRIMARY KEY AUTO_INCREMENT,
  ID_PROVEEDOR INT,
  NUMERO_COTIZACION VARCHAR(20),
  FECHA_COTIZACION DATE,
  MONTO_TOTAL DECIMAL(10, 2),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ID_PROVEEDOR) REFERENCES TBL_PROVEEDORES(ID_PROVEEDOR)
);

-- Creación de la tabla TBL_SOLICITUD_COMPRA
CREATE TABLE TBL_SOLICITUD_COMPRA (
  ID_SOLICITUD_COMPRA INT PRIMARY KEY AUTO_INCREMENT,
  NUMERO_SOLICITUD VARCHAR(20),
  FECHA_SOLICITUD DATE,
  MONTO_TOTAL DECIMAL(10, 2),
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP  
);

-- Creación de la tabla TBL_DETALLE_SOLICITUD_COMPRA
CREATE TABLE TBL_DETALLE_SOLICITUD_COMPRA (
  ID_DETALLE_SOLICITUD_COMPRA INT PRIMARY KEY AUTO_INCREMENT,
  ID_SOLICITUD_COMPRA INT,
  PRODUCTO VARCHAR(100),
  CANTIDAD INT,
  CREADO_POR INT,
  FECHA_CREACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  MODIFICADO_POR INT,
  FECHA_MODIFICACION TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (ID_SOLICITUD_COMPRA) REFERENCES TBL_SOLICITUD_COMPRA(ID_SOLICITUD_COMPRA)
);

-- --------------------------------------------------------------------------------------------
-- ------------------------EJEMPLO DE DATOS----------------------------------------------------
-- --------------------------------------------------------------------------------------------

SELECT * FROM gestion_compras.tbl_ms_roles;

INSERT INTO `gestion_compras`.`tbl_ms_roles` (
`NOMBRE_ROL`, `DESCRIPCION`, `CREADO_POR`, `FECHA_CREACION`
) 
VALUES (
'Usuario', 'usuario de sistema', '1', '2023-07-09'
);

-- ----------------------------------------------------------------
-- ----------------------------------------------------------------

SELECT * FROM gestion_compras.tbl_preguntas;

INSERT INTO `gestion_compras`.`tbl_preguntas` (
`PREGUNTA`, `CREADO_POR`, `FECHA_CREACION`
) 
VALUES (
'¿Nombre de tu equipo favorito?', '1', '2023-07-09'
);

-- ----------------------------------------------------------------
-- ----------------------------------------------------------------

SELECT * FROM gestion_compras.tbl_proveedores;

INSERT INTO `gestion_compras`.`tbl_proveedores` (
`NOMBRE`, `DIRECCION`, `TELEFONO`, `CORREO_ELECTRONICO`, `CREADO_POR`, `FECHA_CREACION`
) 
VALUES (
'Antonio ', 'San Pedro Sula', '25556698', 'antonio@gmail.com', '1', '2023-07-09'
);

-- ----------------------------------------------------------------
-- ----------------------------------------------------------------

SELECT * FROM gestion_compras.tbl_solicitud_compra;

INSERT INTO `gestion_compras`.`tbl_solicitud_compra` (
`NUMERO_SOLICITUD`, `FECHA_SOLICITUD`, `MONTO_TOTAL`, `CREADO_POR`, `FECHA_CREACION`
) 
VALUES (
'001-002', '2023-07-09', '2500', '1', '2023-07-09'
);

-- ----------------------------------------------------------------
-- ----------------------------------------------------------------

SELECT * FROM gestion_compras.tbl_ms_usuario;

INSERT INTO `gestion_compras`.`tbl_ms_usuario` (
`NOMBRE_USUARIO`, `CONTRASENA`, `CORREO_ELECTRONICO`, 
`FECHA_VENCIMIENTO`, `ESTADO`, `ID_ROL`, `ID_PREGUNTA`, 
`RESPUESTA_PREGUNTA`, `CREADO_POR`, `FECHA_CREACION`
) 
VALUES (
'tony', '12345', 'tony@gmail.com', '2024-07-09', 
'Activo', '2', '1', 'oppa', '1', '2023-07-09'
);



