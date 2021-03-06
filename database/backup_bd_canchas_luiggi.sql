-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-08-2014 a las 09:17:33
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `bd_canchas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_CANCHAS`(
IN _accion varchar(50),
IN _nombre varchar (100),
IN _descripcion varchar (500),
IN _latitud varchar (40),
IN _longitud varchar (40),
IN _iddepa char (5),
IN _idprov char (5),
IN _iddis char (5),
IN _direccion varchar (150),
IN _telefono varchar (20),
IN _facebook varchar (100),
IN _email varchar (100),
IN _website varchar (100),
IN _nrocanchas char (2),
IN _fotoportada varchar (500)
)
BEGIN
-- REGISTRO DE CANCHAS
IF _accion = 'INS-CANCHAS' THEN

-- Insertando en la tabla "canchas"
INSERT INTO canchas(cCanNombre,cCanDescripcion,cCanLatitud,cCanLongitud,nUbiDepartamento,nUbiProvincia,nUbiDistrito,
dCanFechaRegistro,nCanVisitas,cCanEstado,cCanFotoPortada)
VALUES
(
 _nombre,
_descripcion,
_latitud,
_longitud,
_iddepa,
_idprov,
_iddis,
now(),
0,
'H',
_fotoportada
);

SET @_codcancha = LAST_INSERT_ID();

-- Insertando la dirección en la tabla "detalle_canchas"
INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
VALUES(@_codcancha,_direccion,'12','11','H');

-- Insertando el telefono en la tabla "detalle_canchas"
INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
VALUES(@_codcancha,_telefono,'13','11','H');

-- Insertando el nro de canchas en la tabla "detalle_canchas"
INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
VALUES(@_codcancha,_nrocanchas,'14','11','H');

-- Insertando el facebook en la tabla "detalle_canchas"
IF _facebook != '' THEN
	BEGIN
		INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
		VALUES(@_codcancha,_facebook,'15','11','H');
	END;
END IF;
 
-- Insertando el email en la tabla "detalle_canchas"
INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
VALUES(@_codcancha,_email,'16','11','H');

-- Insertando el website en la tabla "detalle_canchas"
IF _website != '' THEN
	BEGIN
		INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
		VALUES(@_codcancha,_website,'17','11','H');
	END;
END IF;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_I_USUARIOS`(
IN _accion varchar(50),
IN _nombres varchar (100),
IN _apellidos varchar (100),
IN _email varchar (100),
IN _contraseña varchar (50)
)
BEGIN
-- REGISTRO DE USUARIOS
IF _accion = 'INS-USUARIOS' THEN

-- Insertando en la tabla "persona"
INSERT INTO persona (cPerNombres,cPerApellidos,cPerTipo,dPerFechaRegistro,cPerEstado)
VALUES(_nombres,_apellidos,'N',now(),'H');

SET @_codpersona = LAST_INSERT_ID();

-- Insertando en la tabla "persona_detalle"
INSERT INTO persona_detalle (nPerID,cPedValor,nParID,nPcaID,cPedEstado)
VALUES(@_codpersona,_email,'9','8','H');

-- Insertando en la tabla "usuarios"
INSERT INTO usuarios (nPerID,cUsuNick,cUsuClave,cUsuTipo,dUsuFechaRegistro,cUsuEstado)
VALUES(@_codpersona,_email,_contraseña,'2',now(),'H');

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_CANCHAS`(
IN _accion varchar(50),
IN _criterio varchar(100),
IN _iddepa char(5),
IN _idprov char(5),
IN _iddis char(5)
)
BEGIN
-- LISTADO DE CANCHAS SEGUN CRITERIO
IF _accion = 'LISTADO-CANCHAS-CRITERIO' THEN
SELECT can.nCanID,can.cCanNombre,can.cCanDescripcion,can.cCanLatitud,can.cCanLongitud,
date_format(can.dCanFechaRegistro, '%d/%m/%Y') as fecha_registro,
vdir.cDetCanValor as direccion,
vtel.cDetCanValor as telefono,
vnc.cDetCanValor as nro_canchas,
vcfa.cDetCanValor as facebook,
vema.cDetCanValor as email,
vweb.cDetCanValor as sitio_web,
udepa.cUbiDescripcion as departamento,
uprov.cUbiDescripcion as provincia,
udis.cUbiDescripcion as distrito,
can.nCanVisitas,
(CASE WHEN can.cCanEstado = 'H' THEN 'Habilitado' ELSE 'Deshabilitado' END) AS cCanEstado,
can.cCanFotoPortada
FROM canchas can
LEFT JOIN detalle_canchas vdir ON can.nCanID = vdir.nCanID AND vdir.nParID = 12 AND vdir.nPcaID = 11
LEFT JOIN detalle_canchas vtel ON can.nCanID = vtel.nCanID AND vtel.nParID = 13 AND vtel.nPcaID = 11
LEFT JOIN detalle_canchas vnc ON can.nCanID = vnc.nCanID AND vnc.nParID = 14 AND vnc.nPcaID = 11
LEFT JOIN detalle_canchas vcfa ON can.nCanID = vcfa.nCanID AND vcfa.nParID = 15 AND vcfa.nPcaID = 11
LEFT JOIN detalle_canchas vema ON can.nCanID = vema.nCanID AND vema.nParID = 16 AND vema.nPcaID = 11
LEFT JOIN detalle_canchas vweb ON can.nCanID = vweb.nCanID AND vweb.nParID = 17 AND vweb.nPcaID = 11
INNER JOIN ubigeo udepa ON can.nUbiDepartamento = udepa.nUbiID
INNER JOIN ubigeo uprov ON can.nUbiProvincia = uprov.nUbiProvincia AND uprov.nUbiDepartamento = can.nUbiDepartamento AND uprov.nUbiDistrito = 0
INNER JOIN ubigeo udis ON can.nUbiDistrito = udis.nUbiID
WHERE 
(can.cCanNombre like concat('%',_criterio,'%'))
OR
(can.nUbiDepartamento = CAST(_iddepa AS UNSIGNED) AND 
can.nUbiProvincia = CAST(_idprov AS UNSIGNED) AND 
can.nUbiDistrito = CAST(_iddis AS UNSIGNED))
ORDER BY 1 DESC;


-- LISTADO DE CANCHAS FAVORITAS
ELSEIF _accion = 'LISTADO-CANCHAS-FAVORITAS' THEN
SELECT can.nCanID,can.cCanNombre,can.cCanDescripcion,can.cCanLatitud,can.cCanLongitud,
date_format(can.dCanFechaRegistro, '%d/%m/%Y') as fecha_registro,
vdir.cDetCanValor as direccion,
vtel.cDetCanValor as telefono,
vnc.cDetCanValor as nro_canchas,
vcfa.cDetCanValor as facebook,
vema.cDetCanValor as email,
vweb.cDetCanValor as sitio_web,
udepa.cUbiDescripcion as departamento,
uprov.cUbiDescripcion as provincia,
udis.cUbiDescripcion as distrito,
can.nCanVisitas,
(CASE WHEN can.cCanEstado = 'H' THEN 'Habilitado' ELSE 'Deshabilitado' END) AS cCanEstado,
can.cCanFotoPortada
FROM canchas can
LEFT JOIN detalle_canchas vdir ON can.nCanID = vdir.nCanID AND vdir.nParID = 12 AND vdir.nPcaID = 11
LEFT JOIN detalle_canchas vtel ON can.nCanID = vtel.nCanID AND vtel.nParID = 13 AND vtel.nPcaID = 11
LEFT JOIN detalle_canchas vnc ON can.nCanID = vnc.nCanID AND vnc.nParID = 14 AND vnc.nPcaID = 11
LEFT JOIN detalle_canchas vcfa ON can.nCanID = vcfa.nCanID AND vcfa.nParID = 15 AND vcfa.nPcaID = 11
LEFT JOIN detalle_canchas vema ON can.nCanID = vema.nCanID AND vema.nParID = 16 AND vema.nPcaID = 11
LEFT JOIN detalle_canchas vweb ON can.nCanID = vweb.nCanID AND vweb.nParID = 17 AND vweb.nPcaID = 11
INNER JOIN ubigeo udepa ON can.nUbiDepartamento = udepa.nUbiID
INNER JOIN ubigeo uprov ON can.nUbiProvincia = uprov.nUbiProvincia AND uprov.nUbiDepartamento = can.nUbiDepartamento AND uprov.nUbiDistrito = 0
INNER JOIN ubigeo udis ON can.nUbiDistrito = udis.nUbiID
WHERE 
(can.cCanNombre like concat('%',_criterio,'%'))
OR
(can.nUbiDepartamento = CAST(_iddepa AS UNSIGNED) AND 
can.nUbiProvincia = CAST(_idprov AS UNSIGNED) AND 
can.nUbiDistrito = CAST(_iddis AS UNSIGNED))
ORDER BY 1 DESC;


-- LISTADO DE CANCHAS SEGUN CRITERIO
ELSEIF _accion = 'LISTADO-CANCHAS-CODIGO' THEN
SELECT can.nCanID,can.cCanNombre,can.cCanDescripcion,can.cCanLatitud,can.cCanLongitud,
date_format(can.dCanFechaRegistro, '%d/%m/%Y') as fecha_registro,
vdir.cDetCanValor as direccion,
vtel.cDetCanValor as telefono,
vnc.cDetCanValor as nro_canchas,
vcfa.cDetCanValor as facebook,
vema.cDetCanValor as email,
vweb.cDetCanValor as sitio_web,
can.nUbiDepartamento as id_depa,
can.nUbiProvincia as id_prov,
can.nUbiDistrito as id_dis,
can.nCanVisitas,can.cCanEstado,
can.cCanFotoPortada
FROM canchas can
LEFT JOIN detalle_canchas vdir ON can.nCanID = vdir.nCanID AND vdir.nParID = 12 AND vdir.nPcaID = 11
LEFT JOIN detalle_canchas vtel ON can.nCanID = vtel.nCanID AND vtel.nParID = 13 AND vtel.nPcaID = 11
LEFT JOIN detalle_canchas vnc ON can.nCanID = vnc.nCanID AND vnc.nParID = 14 AND vnc.nPcaID = 11
LEFT JOIN detalle_canchas vcfa ON can.nCanID = vcfa.nCanID AND vcfa.nParID = 15 AND vcfa.nPcaID = 11
LEFT JOIN detalle_canchas vema ON can.nCanID = vema.nCanID AND vema.nParID = 16 AND vema.nPcaID = 11
LEFT JOIN detalle_canchas vweb ON can.nCanID = vweb.nCanID AND vweb.nParID = 17 AND vweb.nPcaID = 11
INNER JOIN ubigeo udepa ON can.nUbiDepartamento = udepa.nUbiID
INNER JOIN ubigeo uprov ON can.nUbiProvincia = uprov.nUbiProvincia AND uprov.nUbiDepartamento = can.nUbiDepartamento AND uprov.nUbiDistrito = 0
INNER JOIN ubigeo udis ON can.nUbiDistrito = udis.nUbiID
WHERE can.nCanID = CAST(_criterio AS UNSIGNED);


-- LISTADO DE OTRAS CANCHAS DIFERENTES A LA SELECCIONADA
ELSEIF _accion = 'LISTADO-CANCHAS-OTROS' THEN
SELECT can.nCanID,can.cCanNombre,can.cCanDescripcion,can.cCanLatitud,can.cCanLongitud,
date_format(can.dCanFechaRegistro, '%d/%m/%Y') as fecha_registro,
vdir.cDetCanValor as direccion,
vtel.cDetCanValor as telefono,
vnc.cDetCanValor as nro_canchas,
vcfa.cDetCanValor as facebook,
vema.cDetCanValor as email,
vweb.cDetCanValor as sitio_web,
udepa.cUbiDescripcion as departamento,
uprov.cUbiDescripcion as provincia,
udis.cUbiDescripcion as distrito,
can.nCanVisitas,can.cCanEstado,
can.cCanFotoPortada
FROM canchas can
LEFT JOIN detalle_canchas vdir ON can.nCanID = vdir.nCanID AND vdir.nParID = 12 AND vdir.nPcaID = 11
LEFT JOIN detalle_canchas vtel ON can.nCanID = vtel.nCanID AND vtel.nParID = 13 AND vtel.nPcaID = 11
LEFT JOIN detalle_canchas vnc ON can.nCanID = vnc.nCanID AND vnc.nParID = 14 AND vnc.nPcaID = 11
LEFT JOIN detalle_canchas vcfa ON can.nCanID = vcfa.nCanID AND vcfa.nParID = 15 AND vcfa.nPcaID = 11
LEFT JOIN detalle_canchas vema ON can.nCanID = vema.nCanID AND vema.nParID = 16 AND vema.nPcaID = 11
LEFT JOIN detalle_canchas vweb ON can.nCanID = vweb.nCanID AND vweb.nParID = 17 AND vweb.nPcaID = 11
INNER JOIN ubigeo udepa ON can.nUbiDepartamento = udepa.nUbiID
INNER JOIN ubigeo uprov ON can.nUbiProvincia = uprov.nUbiProvincia AND uprov.nUbiDepartamento = can.nUbiDepartamento AND uprov.nUbiDistrito = 0
INNER JOIN ubigeo udis ON can.nUbiDistrito = udis.nUbiID
WHERE can.nCanID != CAST(_criterio AS UNSIGNED)
ORDER BY RAND() DESC LIMIT 0,3;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_COMENTARIOS_CANCHAS`(
IN _accion varchar(50)
)
BEGIN
-- LISTADO DE COMENTARIOS SEGUN LA CANCHA SELECCIONADA
IF _accion = 'LISTADO-COMENTARIOS-CANCHAS-CRITERIO' THEN
SELECT nComcaID, nCanID, cComcaNombrePersona,cComcaTexto,nComcaPadreID,dComcaFechaRegistro,cComcaEstado
FROM comentarios_canchas
WHERE cComcaEstado = 'H'
ORDER BY 1 DESC;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_MENU`(
in _nUsuID integer,
in _nAplID integer,
in _cOpdPlataforma char(1)
)
begin
SELECT * FROM usuarios_opciones UO 
INNER JOIN opciones O on O.nOpcID=UO.nOpcID 
INNER JOIN opciones_detalle OD on OD.nOpcID=O.nOpcID 
WHERE O.nAplID = _nAplID AND UO.nUsuID = _nUsuID AND OD.cOpdPlataforma = _cOpdPlataforma
AND UO.cUsoEstado='H' AND O.cOpcEstado='H' AND OD.cOpdEstado='H' 
ORDER BY O.cOpcDescripcion ASC;
end$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_NOTICIAS`(
IN _accion varchar(50),
IN _criterio varchar (100)
)
BEGIN
-- LISTADO DE NOTICIAS
IF _accion = 'LISTADO-NOTICIAS-CRITERIO' THEN
SELECT info.nInfoID,mul.nMultID,info.nInfoTipoID,info.cInfoTitulo,info.cInfoSumilla,
info.cInfoDescripcion,date_format(info.dInfoFechaRegistro,'%d/%m/%Y') as dInfoFechaRegistro,
info.cInfoAutor,info.cInfoLugar,info.nInfoVisitas, mul.cMultLinkMiniatura as foto_noticia
FROM multimedia_informacion mi
INNER JOIN informacion info ON mi.nInfoID = info.nInfoID
INNER JOIN multimedia mul ON mi.nMultID = mul.nMultID
WHERE info.cInfoEstado = 'H'
ORDER BY 1 DESC;

-- OBTENER INFORMACIÓN DE LA NOTICIA SEGUN SU CODIGO
ELSEIF _accion = 'LISTADO-NOTICIAS-CODIGO' THEN
SELECT info.nInfoID,info.nInfoTipoID,info.cInfoTitulo,info.cInfoSumilla,
info.cInfoDescripcion,date_format(info.dInfoFechaRegistro,'%d/%m/%Y') as dInfoFechaRegistro,
info.cInfoAutor,info.cInfoLugar, mul.cMultLinkMiniatura as foto_noticia
FROM multimedia_informacion mi
INNER JOIN informacion info ON mi.nInfoID = info.nInfoID
INNER JOIN multimedia mul ON mi.nMultID = mul.nMultID
WHERE info.nInfoID = CAST(_criterio AS UNSIGNED);


-- LISTADO DE OTRAS NOTICIAS
ELSEIF _accion = 'LISTADO-NOTICIAS-OTRAS' THEN
SELECT info.nInfoID,info.nInfoTipoID,info.cInfoTitulo,info.cInfoSumilla,
info.cInfoDescripcion,date_format(info.dInfoFechaRegistro,'%d/%m/%Y') as dInfoFechaRegistro,
info.cInfoAutor,info.cInfoLugar, mul.cMultLinkMiniatura as foto_noticia
FROM multimedia_informacion mi
INNER JOIN informacion info ON mi.nInfoID = info.nInfoID
INNER JOIN multimedia mul ON mi.nMultID = mul.nMultID
WHERE info.nInfoID != CAST(_criterio AS UNSIGNED) AND info.cInfoEstado = 'H'
ORDER BY RAND() LIMIT 0,3;

-- LISTADO LA NOTICIA PRINCIPAL
ELSEIF _accion = 'LISTADO-NOTICIAS-PRINCIPAL' THEN
SELECT info.nInfoID,info.nInfoTipoID,info.cInfoTitulo,info.cInfoSumilla,
info.cInfoDescripcion,date_format(info.dInfoFechaRegistro,'%d/%m/%Y') as dInfoFechaRegistro,
info.cInfoAutor,info.cInfoLugar, mul.cMultLinkMiniatura as foto_noticia
FROM multimedia_informacion mi
INNER JOIN informacion info ON mi.nInfoID = info.nInfoID
INNER JOIN multimedia mul ON mi.nMultID = mul.nMultID
WHERE info.cInfoEstado = 'H'
ORDER BY info.nInfoVisitas LIMIT 0,1;
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_PERSONA`(
in _accion varchar(50),
in _criterio varchar(100), -- codigo o criterio string
in _valor varchar(50)
)
BEGIN

-- Listar información de la persona segun su código de persona
IF _accion='LIST-PERSON-POR-CRITERIO' THEN
SELECT per.nPerID,cPerNombres,per.cPerApellidos,
per_deta_email.cPedValor as Correo,
usu.nUsuID,usu.cUsuNick,usu.cUsuClave,
(CASE WHEN usu.cUsuEstado = 'H' THEN 'Habilitado' ELSE 'Deshabilitado' END) AS cUsuEstado,
usu.cUsuTipo
FROM persona per
LEFT JOIN persona_detalle per_deta_email ON per.nPerID=per_deta_email.nPerID and per_deta_email.nParID=9 and per_deta_email.nPcaID=8
INNER JOIN usuarios usu ON per.nPerID=usu.nPerID;
-- WHERE 
-- usu.nUsuID = CAST(_criterio AS UNSIGNED);

-- Listar información de la persona segun su código de persona
ELSEIF _accion='LIST-PERSON-POR-CODE-PERSONA' THEN
SELECT per.nPerID,per.cPerNombres,per.cPerApellidos,
per_deta_email.cPedValor as Correo,
usu.nUsuID,usu.cUsuNick,usu.cUsuClave,usu.cUsuEstado,
usu.cUsuEstado AS cUsuarioEstado,
usu.cUsuTipo
FROM persona per
LEFT JOIN persona_detalle per_deta_email ON per.nPerID=per_deta_email.nPerID and per_deta_email.nParID=9
INNER JOIN usuarios usu ON per.nPerID=usu.nPerID
WHERE 
usu.nUsuID = CAST(_criterio AS UNSIGNED);

-- Listar información de la persona segun criterio a buscar (email,dni,etc)
ELSEIF _accion='LIST-PERSON-POR-VALOR-CRITERIO' THEN
SELECT per.nPerID,UPPER(cPerNombres) AS NombrePersona,cPerNombres,per.cPerApellidos,
per_deta_email.cPedValor as Correo,
usu.nUsuID,usu.cUsuNick,usu.cUsuClave,
usu.cUsuEstado,
usu.cUsuTipo
FROM persona per
LEFT JOIN persona_detalle per_deta_email ON per.nPerID=per_deta_email.nPerID and per_deta_email.nParID=9
INNER JOIN usuarios usu ON per.nPerID=usu.nPerID
WHERE 
per_deta_email.cPedValor like concat('%',_criterio,'%') AND
per_deta_email.nParID = CAST(_valor AS UNSIGNED) AND 
-- usu.cUsuTipo='2' AND
usu.cUsuEstado!='E' AND
per.cPerEstado!='E'
ORDER BY 1 DESC;
END if;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_UBIGEO`(
IN Accion varchar(50),
IN Criterio varchar(50),
IN Opcional varchar(50)
)
BEGIN
-- LISTADO DE DEPARTAMENTOS
IF Accion = 'L-U-DEP' THEN
SELECT * FROM ubigeo WHERE nUbiDepartamento <> 0 AND nUbiProvincia = 0 AND nUbiDistrito=0 AND  
cUbiEstado = 'H' ;

-- LISTADO DE PROVINCIAS SEGUN DEPARTAMENTO SELECCIONADO
ELSEIF Accion = 'L-U-PRO' THEN
SELECT * FROM ubigeo WHERE nUbiProvincia <> 0 AND nUbiDistrito = 0 AND
nUbiDepartamento = cast(Criterio AS UNSIGNED) AND cUbiEstado = 'H' ;

-- LISTADO DE DISTRITOS SEGUN DEPARTAMENTO Y PROVINCIA SELECCIONADOS RESPECTIVAMENTE
ELSEIF Accion = 'L-U-DIS' THEN
SELECT * FROM ubigeo WHERE nUbiDepartamento = cast(Criterio AS UNSIGNED) AND 
nUbiProvincia=cast(Opcional AS UNSIGNED)  AND nUbiDistrito <> 0 and cUbiEstado = 'H';
END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_USER_CLAVE`(
IN _nPerID integer,
IN _usuario varchar(30) , 
IN _clave varchar(100)
)
BEGIN
SELECT u.nUsuID,u.cUsuNick FROM usuarios u 
inner join persona p on p.nPerID=u.nPerID 
WHERE cUsuNick=_usuario and cUsuClave=_clave and p.nPerID=_nPerID
and cPerEstado='H'
and cUsuEstado='H'; 
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_USUARIOS_OPCIONES`(
in _accion varchar(50),
in _criterio  varchar(100),
in _criterio2 varchar(100)
)
BEGIN

-- ACTUALIZAR CLAVE DE USUARIO SELECCIONADO
IF _accion = 'DEL-USUARIOS' THEN
UPDATE usuarios SET cUsuEstado = _criterio2 WHERE nUsuID = cast(_criterio AS UNSIGNED);

ELSEIF _accion = 'LISTAR-PERMISOS-USER' THEN
SELECT apl.nAplID,apl.cAplDescripcion AS aplicacion,apl.cAplIcono,opc.nOpcID,opc.cOpcDescripcion AS opcion,
opde.nOpdID ,opde.cOpdRuta as ruta_url,
(SELECT COUNT(*) FROM usuarios_opciones WHERE nUsuId=CAST(_criterio AS UNSIGNED) AND nOpcID=opc.nOpcID ) AS nUsuID 
FROM aplicacion apl 
INNER JOIN opciones opc ON apl.nAplID=opc.nAplId 
INNER JOIN  opciones_detalle opde ON opc.nOpcID=opde.nOpcID
WHERE apl.cAplEstado='H' AND opc.cOpcEstado='H' AND opde.cOpdEstado='H' AND opde.cOpdPlataforma='W'
ORDER BY apl.nAplID ASC;

-- ELIMINAR USUARIOS_OPCIONES
ELSEIF _accion='DELETE-USUARIOS-OPCIONES' THEN
DELETE FROM usuarios_opciones WHERE nUsuID = cast(_criterio AS UNSIGNED);

-- ACTUALIZAR CLAVE DE USUARIO SELECCIONADO
ELSEIF _accion = 'UPD_CLAVE_USUARIO' THEN
UPDATE usuarios SET cUsuClave = _criterio2 WHERE nUsuID = cast(_criterio AS UNSIGNED);

-- ACTIVAR CUENTA DE USUARIO
ELSEIF _accion = 'ACTIVAR-CUENTA' THEN
UPDATE usuarios SET cUsuEstado = 'H' WHERE nUsuID = cast(_criterio AS UNSIGNED);

end if;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_S_VALIDAR_USUARIO`(
IN _usuario varchar(30) , 
IN _clave varchar(100)
)
SELECT u.cUsuNick, p.cPerApellidos,p.cPerNombres,u.nPerID,u.nUsuID 
	FROM usuarios u 
	INNER JOIN persona p ON p.nPerID = u.nPerID 
	WHERE 
	u.cUsuNick = _usuario AND 
	u.cUsuClave = _clave AND 
	p.cPerEstado = 'H' AND 
	u.cUsuEstado = 'H'$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_U_CANCHAS`(
IN _accion varchar(50),
IN _codigo int (11),
IN _criterio varchar (100),
IN _descripcion varchar (500),
IN _latitud varchar (40),
IN _longitud varchar (40),
IN _iddepa char (5),
IN _idprov char (5),
IN _iddis char (5),
IN _direccion varchar (150),
IN _telefono varchar (20),
IN _facebook varchar (100),
IN _email varchar (100),
IN _website varchar (100),
IN _nrocanchas char (2),
IN _fotoportada varchar (500)
)
BEGIN
-- ELIMINAR CANCHAS
IF _accion = 'DEL-CANCHAS' THEN

-- eliminando en la tabla canchas
UPDATE canchas SET cCanEstado = _criterio WHERE nCanID = _codigo;

ELSEIF _accion = 'UPD-CANCHAS' THEN

-- Actualizar valores en la tabla "canchas"
UPDATE canchas SET 
cCanNombre = _criterio,
cCanDescripcion = _descripcion,
cCanLatitud = _latitud,
cCanLongitud = _longitud,
cCanDescripcion = _descripcion,
nUbiDepartamento = _iddepa,
nUbiProvincia = _idprov,
nUbiDistrito = _iddis,
cCanFotoPortada = _fotoportada
WHERE nCanID = _codigo;

-- Actualizar la dirección en la tabla "detalle_canchas"
UPDATE detalle_canchas SET cDetCanValor = _direccion 
WHERE nCanID = _codigo AND nParID = 12 AND nPcaID = 11;

-- Actualizar el email en la tabla "detalle_canchas"
UPDATE detalle_canchas SET cDetCanValor = _email 
WHERE nCanID = _codigo AND nParID = 16 AND nPcaID = 11;

-- Actualizar el telefono en la tabla "detalle_canchas"
UPDATE detalle_canchas SET cDetCanValor = _telefono 
WHERE nCanID = _codigo AND nParID = 13 AND nPcaID = 11;

-- Actualizar el nro de canchas en la tabla "detalle_canchas"
UPDATE detalle_canchas SET cDetCanValor = _nrocanchas 
WHERE nCanID = _codigo AND nParID = 14 AND nPcaID = 11;


-- Actualizar o Registrar el facebook en la tabla "detalle_canchas"
IF (SELECT COUNT(*) FROM detalle_canchas WHERE nCanID = _codigo AND nParID = 15 AND nPcaID = 11) != 0 THEN
	UPDATE detalle_canchas SET cDetCanValor = _facebook 
	WHERE nCanID = _codigo AND nParID = 15 AND nPcaID = 11;
ELSE
	IF _facebook != '' THEN
		INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
		VALUES(_codigo,_facebook,'15','11','H');
	END IF;
END IF;


-- Actualizar o Registrar el sitio web en la tabla "detalle_canchas"
IF (SELECT COUNT(*) FROM detalle_canchas WHERE nCanID = _codigo AND nParID = 17 AND nPcaID = 11) != 0 THEN
	UPDATE detalle_canchas SET cDetCanValor = _website 
	WHERE nCanID = _codigo AND nParID = 17 AND nPcaID = 11;
ELSE
	IF _website != '' THEN
		INSERT INTO detalle_canchas (nCanID,cDetCanValor,nParID,nPcaID,cDetCanEstado)
		VALUES(_codigo,_website,'17','11','H');
	END IF;
END IF;

END IF;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `USP_GEN_U_USUARIOS`(
IN _accion varchar(50),
IN _codigo int(11),
IN _nombres varchar (100),
IN _apellidos varchar (100),
IN _email varchar (100)
)
BEGIN
-- ACTUALIZAR DATOS DEL USUARIO
IF _accion = 'UPD-USUARIOS' THEN

UPDATE persona SET 
cPerNombres = _nombres,
cPerApellidos = _apellidos
WHERE nPerID = _codigo; 

UPDATE persona_detalle SET
cPedValor = _email
WHERE nPerID = _codigo;

-- Insertando en la tabla "persona"
-- INSERT INTO persona (cPerNombres,cPerApellidos,cPerTipo,dPerFechaRegistro,cPerEstado)
-- VALUES(_nombres,_apellidos,'N',now(),'H');

-- SET @_codpersona = LAST_INSERT_ID();

-- Insertando en la tabla "persona_detalle"
-- INSERT INTO persona_detalle (nPerID,cPedValor,nParID,nPcaID,cPedEstado)
-- VALUES(@_codpersona,_email,'9','8','H');

-- Insertando en la tabla "usuarios"
-- INSERT INTO usuarios (nPerID,cUsuNick,cUsuClave,cUsuTipo,dUsuFechaRegistro,cUsuEstado)
-- VALUES(@_codpersona,_email,_contraseña,'2',now(),'H');

END IF;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicacion`
--

CREATE TABLE IF NOT EXISTS `aplicacion` (
  `nAplID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `cAplDescripcion` varchar(100) NOT NULL,
  `cAplIcono` varchar(45) DEFAULT NULL,
  `cAplEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nAplID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `aplicacion`
--

INSERT INTO `aplicacion` (`nAplID`, `cAplDescripcion`, `cAplIcono`, `cAplEstado`) VALUES
(1, 'MANTENEDORES', 'icon-file', 'H'),
(2, 'PORTAL WEB', 'icon-th-list', 'H'),
(3, 'PERFIL USUARIO', 'icon-user', 'H'),
(4, 'MULTIMEDIA', 'icon-picture', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canchas`
--

CREATE TABLE IF NOT EXISTS `canchas` (
  `nCanID` int(11) NOT NULL AUTO_INCREMENT,
  `cCanNombre` varchar(100) NOT NULL,
  `cCanDescripcion` varchar(500) NOT NULL,
  `cCanLatitud` varchar(40) DEFAULT NULL,
  `cCanLongitud` varchar(40) DEFAULT NULL,
  `nUbiDepartamento` char(5) DEFAULT NULL,
  `nUbiProvincia` char(5) DEFAULT NULL,
  `nUbiDistrito` char(5) DEFAULT NULL,
  `dCanFechaRegistro` datetime NOT NULL,
  `nCanVisitas` int(11) NOT NULL,
  `cCanEstado` char(1) NOT NULL,
  `cCanFotoPortada` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`nCanID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `canchas`
--

INSERT INTO `canchas` (`nCanID`, `cCanNombre`, `cCanDescripcion`, `cCanLatitud`, `cCanLongitud`, `nUbiDepartamento`, `nUbiProvincia`, `nUbiDistrito`, `dCanFechaRegistro`, `nCanVisitas`, `cCanEstado`, `cCanFotoPortada`) VALUES
(1, 'VillaSports Precursores', 'Descripcion completa', '-8.1090524', '-79.0215336', '13', '1', '1350', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-05accb00-0ab6-40f0-9c03-8090c2c13570-img-demo10.jpg'),
(2, 'Planeta Gol Club', 'Además de prestar un servicio a sus deportistas, Planeta Gol Club tiene como objetivo suplir las necesidades y comodidades de los acompañantes, porque como dice su propietario Jason Morales, el fútbol 5 es un deporte para disfrutar en familia.', '-8.107650351299949', '-79.03573857894287', '13', '1', '1350', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-f096e59e-8944-4fbd-94db-b2b8ff4d3843-img-demo9.jpg'),
(3, 'Canchas Soccer Math', 'Tiene dos sedes, una en el centro (Calle 19 # 4-71) y otra en Corferias (Avenida Las Américas # 39 - 36). Ambas cuentan con lo necesario para brindar un servicio grato a sus deportistas.', '-8.113853317605939', '-79.03659688582763', '13', '2', '1361', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-6af664bd-580b-432c-8fd6-7993ad8b2178-img-demo8.JPG'),
(4, 'Campín 5', 'Con el propósito de cumplirle a los deportistas y a sus acompañantes, este lugar cuenta con 5 canchas, cada una de ellas con un camerino propio, baño, duchas, puntos de hidratación, graderías para las barras de los equipos y parqueadero.', '-8.10310428099431', '-79.04539453139648', '15', '1', '1480', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-a5f47a63-a732-4ff9-8637-9cd4f77c028b-img-demo7.jpg'),
(5, 'SPORT ARENA', 'En el mítico barrio de Boedo se ubica uno de los mejores predios multideportivos para jugar al fútbol, el Campus Sport Arena. Este espacio tiene 8 canchas, seis de fútbol 5 y dos de fútbol 8.', '-8.099237956490336', '-79.04045926680908', '13', '1', '1356', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-e5396143-7661-4262-b051-0e0a75bb4ea0-img-demo6.jpg'),
(6, 'VIEYTES', 'Arrimándonos a la zona sur de la ciudad pero sin alejarnos demasiado del centro, nos encontramos con el clásico Complejo Vieytes. Ahí se desarrollan desde hace muchos años torneos de alta calidad futbolística y muy bien organizados, tanto para particulares como para empresas', '-8.09843069723768', '-79.03393613448486', '15', '1', '1510', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-31269278-cba9-48a7-b400-4b7a9a72c1be-img-demo5.jpg'),
(7, 'MARANGONI ROSALES', 'Volviendo hacia la zona norte, detrás del club Obras Sanitarias, se destaca el predio de canchas Muni Fútbol en Núñez. Las canchas están en excelente estado y hay alternativas desde 6 hasta 8 jugadores, techadas y sin techar.', '-8.096561248544479', '-79.04290544143066', '15', '1', '1510', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-e15d7b3e-32b2-49b6-a716-1cdd4ba018ba-img-demo4.jpg'),
(8, 'MARANGONI', 'En la zona norte de la ciudad y cerca del Alto Palermo, aparece un espacio en el que todo futbolista amateur alguna vez jugó un partidito: el Complejo Claudio Marangoni.', '-8.091080314869291', '-79.04389249434814', '13', '1', '1350', '2014-07-03 00:00:00', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-ea841e9a-d519-46d3-ba35-ef921ccf3954-img-demo3.jpg'),
(12, 'prueba de registro', 'contenido de prueba de registro', '-7.227131', '-79.42983600000002', '13', '1', '1350', '2014-07-26 16:55:06', 0, 'H', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-6187969c-af55-4b3f-b4c6-ae8ccdb28a65-nofoto.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_canchas`
--

CREATE TABLE IF NOT EXISTS `comentarios_canchas` (
  `nComcaID` int(11) NOT NULL AUTO_INCREMENT,
  `nCanID` int(11) DEFAULT NULL,
  `cComcaNombrePersona` varchar(80) DEFAULT NULL,
  `cComcaTexto` text,
  `nComcaPadreID` int(11) DEFAULT NULL,
  `dComcaFechaRegistro` datetime DEFAULT NULL,
  `cComcaEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nComcaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `comentarios_canchas`
--

INSERT INTO `comentarios_canchas` (`nComcaID`, `nCanID`, `cComcaNombrePersona`, `cComcaTexto`, `nComcaPadreID`, `dComcaFechaRegistro`, `cComcaEstado`) VALUES
(1, 1, 'Luiggi Chirinos', 'Esta muy buena la cancha la verdad es que mi grupo y yo la pasamos genial siempre en este lugar. Gracias', 0, '2014-07-08 00:00:00', 'H'),
(2, 1, 'Juan Carlos', 'Todo genial de momento me gustan los uniformes que nos brindan para hacer deporte. Sigan asi excelente atención', 0, '2014-07-08 00:00:00', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_canchas`
--

CREATE TABLE IF NOT EXISTS `detalle_canchas` (
  `nDetCanID` int(11) NOT NULL AUTO_INCREMENT,
  `nCanID` int(11) NOT NULL,
  `cDetCanValor` varchar(500) NOT NULL,
  `nParID` int(11) NOT NULL,
  `nPcaID` int(11) NOT NULL,
  `cDetCanEstado` char(1) NOT NULL,
  PRIMARY KEY (`nDetCanID`),
  KEY `nCanID` (`nCanID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

--
-- Volcado de datos para la tabla `detalle_canchas`
--

INSERT INTO `detalle_canchas` (`nDetCanID`, `nCanID`, `cDetCanValor`, `nParID`, `nPcaID`, `cDetCanEstado`) VALUES
(1, 1, 'Jr. Jose Aguilar Segura s/n', 12, 11, 'H'),
(2, 1, '987878454', 13, 11, 'H'),
(3, 1, '3', 14, 11, 'H'),
(4, 1, 'www.facebook.com/villasports-precursores', 15, 11, 'H'),
(5, 1, 'villasportprecursores@hotmail.com', 16, 11, 'H'),
(6, 1, 'www.villasportprecursores.com', 17, 11, 'H'),
(7, 2, 'Jr Diego de Almagro s/n', 12, 11, 'H'),
(8, 2, '98765465487', 13, 11, 'H'),
(9, 2, '3', 14, 11, 'H'),
(10, 2, 'planetaclub@hotmail.com', 16, 11, 'H'),
(11, 2, 'www.planetaclub.com', 17, 11, 'H'),
(12, 3, 'Calle 19 No. 4-71 Los Angeles Local 323B', 12, 11, 'H'),
(13, 3, '284 1255', 13, 11, 'H'),
(14, 4, 'Los paujiles 125', 12, 11, 'H'),
(15, 4, '202020', 13, 11, 'H'),
(16, 5, 'Maza 754.', 12, 11, 'H'),
(17, 5, '4956-0045 ', 13, 11, 'H'),
(18, 5, '8', 14, 11, 'H'),
(19, 6, 'Las Gaviotas 548', 12, 11, 'H'),
(20, 6, '98566699', 13, 11, 'H'),
(21, 6, '4', 14, 11, 'H'),
(22, 7, 'Urb. San Andres 5ta Etapa - Las Orquideas', 12, 11, 'H'),
(23, 7, '98787222', 13, 11, 'H'),
(24, 7, '2', 14, 11, 'H'),
(25, 8, 'Av Mansiche 2356', 12, 11, 'H'),
(26, 8, '044563201', 13, 11, 'H'),
(27, 8, '3', 14, 11, 'H'),
(28, 9, 'direccion de prueba', 12, 11, 'H'),
(29, 9, '45400133', 13, 11, 'H'),
(30, 9, '10', 14, 11, 'H'),
(31, 9, 'facebook.canchaprueba', 15, 11, 'H'),
(32, 9, 'email_prueba@hotmail.com', 16, 11, 'H'),
(33, 9, 'www.canchaprueba.com', 17, 11, 'H'),
(34, 10, 'Leoncio Prado 123', 12, 11, 'H'),
(35, 10, '1452365', 13, 11, 'H'),
(36, 10, '1', 14, 11, 'H'),
(37, 10, 'wrwrwrwrr', 15, 11, 'H'),
(38, 10, 'prueba@gmail.com', 16, 11, 'H'),
(39, 10, 'joda no mas', 17, 11, 'H'),
(40, 11, 'Pasaje Jorge Chavez 1334', 12, 11, 'H'),
(41, 11, '125633', 13, 11, 'H'),
(42, 11, '1', 14, 11, 'H'),
(43, 11, 'facebook.chistosos', 15, 11, 'H'),
(44, 11, 'prueba3@hotmail.com', 16, 11, 'H'),
(45, 11, 'payasito.com', 17, 11, 'H'),
(46, 12, 'direccion de prueba', 12, 11, 'H'),
(47, 12, '1256633', 13, 11, 'H'),
(48, 12, '3', 14, 11, 'H'),
(49, 12, 'pruebanommas@hotmail.com', 16, 11, 'H'),
(52, 12, 'locumbeto de melaxxx', 15, 11, 'H'),
(53, 12, 'www.pruebanomas.com', 17, 11, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE IF NOT EXISTS `eventos` (
  `nEveID` int(11) NOT NULL AUTO_INCREMENT,
  `cEveLatitud` varchar(45) DEFAULT NULL,
  `cEveLongitud` varchar(45) DEFAULT NULL,
  `cEveTitulo` varchar(100) NOT NULL,
  `cEveDescripcion` varchar(500) NOT NULL,
  `cEveLinkFoto` varchar(400) DEFAULT NULL,
  `cEveLinkFacebook` varchar(100) DEFAULT NULL,
  `cEveDireccion` varchar(45) NOT NULL,
  `dEveStartTime` datetime NOT NULL,
  `dEveEndTime` datetime DEFAULT NULL,
  `nUbiDepartamento` char(5) DEFAULT NULL,
  `nUbiProvincia` char(5) DEFAULT NULL,
  `nUbiDistrito` char(5) DEFAULT NULL,
  `dEveFechaRegistro` datetime NOT NULL,
  `cEveEstado` char(1) NOT NULL,
  `nEveCosto` varchar(10) NOT NULL,
  `nUsuario` varchar(40) NOT NULL,
  PRIMARY KEY (`nEveID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`nEveID`, `cEveLatitud`, `cEveLongitud`, `cEveTitulo`, `cEveDescripcion`, `cEveLinkFoto`, `cEveLinkFacebook`, `cEveDireccion`, `dEveStartTime`, `dEveEndTime`, `nUbiDepartamento`, `nUbiProvincia`, `nUbiDistrito`, `dEveFechaRegistro`, `cEveEstado`, `nEveCosto`, `nUsuario`) VALUES
(1, '-8.0804311', '-79.10404319999998', 'Marley Vibration', 'Compartiendo escenario como estelares junto a KY MANI MARLEY, GONDWANA, LO CAFRES, DREAD MAR I, y grandes bandas de la escena nacional como JAGANNATHA, TIERRA SUR, ASCESIS NATIVA , SHIVA SHANTI, LA RENKEN, entre otras!', '', 'https://www.facebook.com/events/391129404326990/', 'La poza - Huanchaco', '2014-07-11 18:30:00', '2014-07-11 21:00:00', '0', '0', '0', '2014-07-21 00:00:00', 'H', '0', '1'),
(6, '-8.089168343723216', '-79.09174310317383', 'pollada bailable', 'pollada bailable con musica en vivo', '', '', 'av mansiche 144, trujillo', '2014-07-18 08:00:00', '2014-07-18 20:00:00', '0', '0', '0', '2014-07-16 00:00:00', 'H', '10', '1'),
(7, '-8.111729024852341', '-79.02822839370117', 'parrillada pro fondos', 'parrillada pro fondos', '', '', 'trujillo', '2014-07-16 12:09:00', '2014-07-16 18:09:00', '0', '0', '0', '2014-07-16 00:00:00', 'H', '10', '1'),
(15, '-12.046374', '-77.0427934', 'otro con foto editado', 'otro con foto', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-b637d301-3994-4e1e-aceb-8352a9366c60-Chrysanthemum.jpg', '', 'lima', '2014-07-25 14:20:00', '2014-07-25 19:20:00', NULL, NULL, NULL, '2014-07-24 00:00:00', 'H', '10', '1'),
(13, '40.7127837', '-74.00594130000002', 'ultima prubea de modfica', 'nueva descripcion', '', '', 'new york', '2014-07-23 13:03:00', '2014-07-24 15:03:00', NULL, NULL, NULL, '2014-07-23 00:00:00', 'H', '10', '1'),
(12, '-8.111729024852341', '-79.02822839370117', 'dwdwdw', 'wdwdwwddwd dwdwd', '', '', 'wdwdw', '2014-07-23 11:08:00', '2014-07-24 13:08:00', NULL, NULL, NULL, '2014-07-23 00:00:00', 'H', '10', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE IF NOT EXISTS `informacion` (
  `nInfoID` int(11) NOT NULL AUTO_INCREMENT,
  `nInfoTipoID` int(11) DEFAULT NULL,
  `cInfoTitulo` varchar(200) DEFAULT NULL,
  `cInfoSumilla` varchar(300) DEFAULT NULL,
  `cInfoDescripcion` text,
  `dInfoFechaRegistro` datetime DEFAULT NULL,
  `dInfoFechaInicio` datetime DEFAULT NULL,
  `dInfoFechaFinal` datetime DEFAULT NULL,
  `cInfoLugar` varchar(100) DEFAULT NULL,
  `cInfoAutor` varchar(50) DEFAULT NULL,
  `nParID` int(11) DEFAULT NULL,
  `nPcaID` int(11) DEFAULT NULL,
  `nInfoVisitas` int(11) DEFAULT NULL,
  `cInfoEstado` char(1) DEFAULT NULL,
  `nUsuID` char(100) DEFAULT NULL,
  `cInfoLinkFoto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`nInfoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`nInfoID`, `nInfoTipoID`, `cInfoTitulo`, `cInfoSumilla`, `cInfoDescripcion`, `dInfoFechaRegistro`, `dInfoFechaInicio`, `dInfoFechaFinal`, `cInfoLugar`, `cInfoAutor`, `nParID`, `nPcaID`, `nInfoVisitas`, `cInfoEstado`, `nUsuID`, `cInfoLinkFoto`) VALUES
(1, 1, 'Di Stéfano, uno de los "cuatro grandes" de la historia del fútbol', 'Pelé, Cruyff, Maradona y Di Stéfano están considerados los "4 grandes" del fútbol.', 'Nombre como Beckenbauer, Eusebio o Zidane hicieron grandes cosas y son muchos los partidarios de incluirles en el selecto club de ''los más grandes''. Algún jugador actual podría llegar algún día a formar parte de ese selecto club, quizás Messi. Pero todo el mundo coincide en los cuatro futbolistas anteriormente citados por su trascendencia en la historia del fútbol, cada uno trasgresor en su época.', '2014-07-09 00:00:00', '2014-07-09 00:00:00', '2014-07-09 00:00:00', 'Trujillo, La Libertad', 'Luiggi Chirinos Plasencia', 24, 23, 10, 'H', NULL, NULL),
(2, 1, 'La mayor humillación de la historia del fútbol: Alemania aplasta a Brasil (1-7)', 'Belo Horizonte fue testigo de un partido que pasa a la historia del fútbol.', 'Lo vivido en la primera media hora del Brasil - Alemania pasará a la historia de los Mundiales. Será recordado durante décadas, quizás siglos. La selección pentacampeona del mundo fue humillada como no lo había sido nunca, aplastada sin piedad por el rodillo alemán en un partido en el que parecían jugar niños contra hombres. El 1-7 final de esta semifinal del Mundial lo dice todo. <br /><br />', '2014-07-09 00:00:00', '2014-07-09 00:00:00', '2014-07-09 00:00:00', 'Trujillo, La Libertad', 'Luiggi Chirinos Plasencia', 24, 23, 20, 'H', NULL, NULL),
(3, 1, 'Alianza Lima: Rodrigo Cuba y Joazhiño Arroé con ofertas blanquiazules', 'Se aproximan. Luego de asegurar el concurso de Mauro Guevgeozián y cerrar la cabida a otro jugador foráneo en el plantel, Alianza Lima no ha desestimado contratar a uno que otro refuerzo nacional de cara a lo que resta del año.', 'LÍBERO pudo conocer que Rodrígo Cuba, lateral del Juan Aurich, ha sido sondeado y se sabe que dentro de poco podría surgir alguna negociación. El volante Joazhiño Arroé no ha renovado con Cristal y ahora maneja la propuesta grone.   ', '2014-07-09 00:00:00', '2014-07-09 00:00:00', '2014-07-09 00:00:00', 'Trujillo, La Libertad', 'Luiggi Chirinos Plasencia', 25, 23, 1, 'H', NULL, NULL),
(4, 1, 'La Real jugará con el Chelsea FC el 12 de agosto en Stamford Bridge', 'El encuentro servirá como presentación del conjunto londinense ante su afición', '<p>La Real Sociedad afronta una de las pretemporadas más exigentes de las que se recuerda en cuanto a rivales y partidos amistosos se refiere. El club txuri urdin ha anunciado que será el rival del Chelsea F.C. en la presentación del conjunto londinense ante su afición. El encuento se disputará en Stamford Bridge a partir de las 20:45 (hora en Gipuzkoa).</p>  <p>Al frente del equipo londinense sigue otra temporada José Mourinho, que tiene a su disposición una de las plantillas más completas de Europa y que ha sido reforzada con fichajes de relumbrón como los de Diego Costa y Cesc Fábregas. En su segunda etapa al frente del conjunto azul Mourinho cuenta además en su plantilla con jugadores de la talla de Torres, Hazard, Óscar, Courtois, Terry o Schurrle.</p> <p>El primer encuentro de la pretemporada la Real lo disputará el próximo sábado en Berazubi <b>ante el Tolosa y servirá de homenaje Urtzi Gurrutxaga</b>, futbolista fallecido en febrero durante el transcurso de un partido de la liga de Honor Regional.</p><p>El día 17 el equipo txuri urdin viajará hasta Holanda para llevar a cabo una concentración de nueve días. El primer rival de la Real fuera de Gipuzkoa será el Ajax de Amsterdam, al que se medirá el día 19 en un encuentro que se disputará en el Estadio De Boshoek, en la localidad de Hardenberg.</p><p>El partido ante el campeón holandés en las útlimas cuatro temporadas será un buen toque de piedra de cara a la primera previa de la Europa League que la Real disputará el 31 de julio y el 7 de agosto. Para cuando aterricen en el país de los tulipanes el equipo ya conocerá la identidad del rival de esa eliminatoria, ya que el sorteo se celebrará el día 18.</p>', '2014-07-09 00:00:00', '2014-07-09 00:00:00', '2014-07-09 00:00:00', 'Trujillo, La Libertad', 'Luiggi Chirinos Plasencia', 24, 23, 5, 'H', NULL, NULL),
(5, 1, 'prueba de noticia', 'notica por mi', 'ejemplo con foto', '2014-07-24 00:00:00', '2014-07-24 00:00:00', '2014-07-24 00:00:00', 'mi casa', 'juan', 24, 23, 0, 'H', '1', NULL),
(6, 1, 'prueba de noticia', 'notica por mi', 'ejemplo con foto', '2014-07-24 00:00:00', '2014-07-24 00:00:00', '2014-07-24 00:00:00', 'mi casa', 'juan', 24, 23, 0, 'H', '1', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-0c42c628-b6f6-4d97-9c69-d130255');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion_tipo`
--

CREATE TABLE IF NOT EXISTS `informacion_tipo` (
  `nInfoTipoID` int(11) NOT NULL AUTO_INCREMENT,
  `cInfoTipoDescripcion` varchar(100) DEFAULT NULL,
  `cInfoTipoEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nInfoTipoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `informacion_tipo`
--

INSERT INTO `informacion_tipo` (`nInfoTipoID`, `cInfoTipoDescripcion`, `cInfoTipoEstado`) VALUES
(1, 'NOTICIAS', 'H'),
(2, 'EVENTOS', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia`
--

CREATE TABLE IF NOT EXISTS `multimedia` (
  `nMultID` int(11) NOT NULL AUTO_INCREMENT,
  `nMultTipoID` int(11) NOT NULL,
  `nMultCategID` int(11) NOT NULL,
  `cMultLinkMiniatura` varchar(300) NOT NULL,
  `cMultLink` varchar(2000) DEFAULT NULL,
  `cMultTitulo` varchar(200) NOT NULL,
  `cMultDescripcion` varchar(500) NOT NULL,
  `cMultFechaRegistro` char(10) NOT NULL,
  `cMultFechaInicial` char(10) DEFAULT NULL,
  `cMultFechaFinal` char(10) DEFAULT NULL,
  `nParID` int(11) DEFAULT NULL,
  `cMultEstado` char(2) NOT NULL,
  `cMultNumVisitas` int(11) DEFAULT NULL,
  PRIMARY KEY (`nMultID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `multimedia`
--

INSERT INTO `multimedia` (`nMultID`, `nMultTipoID`, `nMultCategID`, `cMultLinkMiniatura`, `cMultLink`, `cMultTitulo`, `cMultDescripcion`, `cMultFechaRegistro`, `cMultFechaInicial`, `cMultFechaFinal`, `nParID`, `cMultEstado`, `cMultNumVisitas`) VALUES
(2, 6, 1, 'alianza_lima.jpg', 'alianza_lima.jpg', 'Foto de alianza lima', '', '20-10-2005', '20-10-2005', '20-10-2005', NULL, 'H', 0),
(3, 6, 1, 'brazil_alemania.jpg', 'brazil_alemania.jpg', 'Foto del Partido de Alemania y Brazil', '', '20-10-2005', '20-10-2005', '20-10-2005', NULL, 'H', 0),
(4, 6, 1, 'di_estefano.jpg', 'di_estefano.jpg', 'Foto de Di Estafano', '', '20-10-2005', '20-10-2005', '20-10-2005', NULL, 'H', 0),
(5, 6, 1, 'chelsea_partido.jpg', 'chelsea_partido.jpg', 'Foto del Partido de Chelsea', '', '20-10-2005', '20-10-2005', '20-10-2005', NULL, 'H', 0),
(6, 0, 4, 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-2c02cb95-4b3e-46a2-9f22-640b82dbc269-10385025_851370404892120_824695452_n.jpg', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-2c02cb95-4b3e-46a2-9f22-640b82dbc269-10385025_851370404892120_824695452_n.jpg', 'prueba', 'prueba d subida', '2014-07-24', '2014-07-24', '2014-07-24', NULL, 'H', 0),
(7, 0, 4, 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-ceeb4f05-57f4-4b22-92b5-87bfb96871a3-Chrysanthemum.jpg', 'http://files.parsetfss.com/a0123345-0b5c-4bbe-86e3-98d56cdc8497/tfss-ceeb4f05-57f4-4b22-92b5-87bfb96871a3-Chrysanthemum.jpg', 'en panico', 'prueba', '2014-07-24', '2014-07-24', '2014-07-24', NULL, 'H', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia_categoria`
--

CREATE TABLE IF NOT EXISTS `multimedia_categoria` (
  `nMCategID` int(11) NOT NULL AUTO_INCREMENT,
  `cMCategDescripcion` varchar(100) DEFAULT NULL,
  `cMCategEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nMCategID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `multimedia_categoria`
--

INSERT INTO `multimedia_categoria` (`nMCategID`, `cMCategDescripcion`, `cMCategEstado`) VALUES
(1, 'NOTICIAS', 'H'),
(2, 'EVENTOS', 'H'),
(3, 'CANCHAS', 'H'),
(4, 'MULTIMEDIA', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia_informacion`
--

CREATE TABLE IF NOT EXISTS `multimedia_informacion` (
  `nMultInfoID` int(11) NOT NULL AUTO_INCREMENT,
  `nMultID` int(11) DEFAULT NULL,
  `nInfoID` int(11) DEFAULT NULL,
  `cMultInfoEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nMultInfoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `multimedia_informacion`
--

INSERT INTO `multimedia_informacion` (`nMultInfoID`, `nMultID`, `nInfoID`, `cMultInfoEstado`) VALUES
(1, 4, 1, 'H'),
(2, 3, 2, 'H'),
(3, 2, 3, 'H'),
(4, 5, 4, 'H'),
(5, 8, 6, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `multimedia_tipo`
--

CREATE TABLE IF NOT EXISTS `multimedia_tipo` (
  `nMTipoID` int(11) NOT NULL AUTO_INCREMENT,
  `cMTipoDescripcion` varchar(100) DEFAULT NULL,
  `cMTipoEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nMTipoID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `multimedia_tipo`
--

INSERT INTO `multimedia_tipo` (`nMTipoID`, `cMTipoDescripcion`, `cMTipoEstado`) VALUES
(1, 'Imagen', 'H'),
(2, 'Video', 'H'),
(3, 'Swf', 'H'),
(4, 'Audio', 'H'),
(5, 'PDF', 'H'),
(6, 'Texto', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones`
--

CREATE TABLE IF NOT EXISTS `opciones` (
  `nOpcID` int(11) NOT NULL AUTO_INCREMENT,
  `cOpcDescripcion` varchar(100) NOT NULL,
  `nOpcIDPadre` smallint(6) DEFAULT NULL,
  `cOpcIcono` varchar(45) DEFAULT NULL,
  `cOpcEstado` char(1) DEFAULT NULL,
  `nAplID` tinyint(4) NOT NULL,
  PRIMARY KEY (`nOpcID`),
  KEY `nAplID` (`nAplID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `opciones`
--

INSERT INTO `opciones` (`nOpcID`, `cOpcDescripcion`, `nOpcIDPadre`, `cOpcIcono`, `cOpcEstado`, `nAplID`) VALUES
(1, 'Aplicacion', 0, 'aplicacion.png', 'H', 1),
(2, 'Opciones', 0, 'opciones.png', 'H', 1),
(3, 'Detalle de Opciones', 0, 'detalle_opciones.png', 'H', 1),
(4, 'Parámetros', 0, 'params-32.png', 'H', 1),
(5, 'Usuarios', 0, 'users.png', 'H', 1),
(6, 'Publicidad', 0, 'users.png', 'H', 2),
(7, 'Galería Multimedia', 0, 'users.png', 'H', 2),
(8, 'Actualización de Datos', 0, 'my-account.png', 'H', 3),
(9, 'Cambiar Clave', 0, 'lock.png', 'H', 3),
(10, 'Galería de Fotos', 0, 'lock.png', 'H', 4),
(11, 'Galería de Videos', 0, 'lock.png', 'H', 4),
(12, 'Noticias', 0, 'lock.png', 'H', 2),
(13, 'Eventos', 0, 'lock.png', 'H', 2),
(14, 'Canchas', 0, 'lock.png', 'H', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opciones_detalle`
--

CREATE TABLE IF NOT EXISTS `opciones_detalle` (
  `nOpdID` int(11) NOT NULL AUTO_INCREMENT,
  `cOpdRuta` varchar(200) NOT NULL,
  `cOpdPlataforma` char(1) NOT NULL,
  `nOpcID` smallint(6) NOT NULL,
  `cOpdPermisos` char(1) NOT NULL,
  `cOpdEstado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`nOpdID`),
  KEY `nOpcID` (`nOpcID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `opciones_detalle`
--

INSERT INTO `opciones_detalle` (`nOpdID`, `cOpdRuta`, `cOpdPlataforma`, `nOpcID`, `cOpdPermisos`, `cOpdEstado`) VALUES
(1, 'aplicacion', 'W', 1, '1', 'H'),
(2, 'opciones', 'W', 2, '1', 'H'),
(3, 'detalle_opciones', 'W', 3, '1', 'H'),
(4, 'parametros', 'W', 4, '1', 'H'),
(5, 'usuarios', 'W', 5, '1', 'H'),
(6, 'publicidad', 'W', 6, '1', 'H'),
(7, 'galeria_multimedia', 'W', 7, '1', 'H'),
(8, 'actualizar_datos', 'W', 8, '1', 'H'),
(9, 'cambiar_clave', 'W', 9, '1', 'H'),
(10, 'multimedia/fotos', 'W', 10, '1', 'H'),
(11, 'multimedia/videos', 'W', 11, '1', 'H'),
(12, 'multimedia/noticias', 'W', 12, '1', 'H'),
(13, 'eventos', 'W', 13, '1', 'H'),
(14, 'canchas', 'W', 14, '1', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `nParID` int(11) NOT NULL AUTO_INCREMENT,
  `cParDescripcion` varchar(200) DEFAULT NULL,
  `nParIDPadre` int(11) DEFAULT NULL,
  `cParEstado` char(1) NOT NULL,
  PRIMARY KEY (`nParID`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`nParID`, `cParDescripcion`, `nParIDPadre`, `cParEstado`) VALUES
(1, 'Documento de Identidad', 0, 'H'),
(2, 'DNI', 1, 'H'),
(3, 'CE', 1, 'H'),
(4, 'Telefono', 0, 'H'),
(5, 'Fijo', 4, 'H'),
(6, 'Trabajo', 4, 'H'),
(7, 'Celular', 4, 'H'),
(8, 'Correo Electrónico', 0, 'H'),
(9, 'Personal', 8, 'H'),
(10, 'Coorporativo', 8, 'H'),
(11, 'Detalles de la Cancha', 0, 'H'),
(12, 'Dirección', 11, 'H'),
(13, 'Teléfono', 11, 'H'),
(14, 'Número de Canchas', 11, 'H'),
(15, 'Cuenta de Facebook', 11, 'H'),
(16, 'Email', 11, 'H'),
(17, 'Dirección Web', 11, 'H'),
(18, 'Cuenta bancaria', 0, 'H'),
(19, 'fecha de vencimiento', 18, 'H'),
(20, 'Direccion', 0, 'H'),
(21, 'Latitud', 20, 'H'),
(22, 'Longitud', 20, 'H'),
(23, 'Categoria Noticias', 0, 'H'),
(24, 'Futbol Peruano', 23, 'H'),
(25, 'Futbol Internacional', 23, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE IF NOT EXISTS `persona` (
  `nPerID` int(11) NOT NULL AUTO_INCREMENT,
  `cPerNombres` varchar(45) NOT NULL,
  `cPerApellidos` varchar(100) DEFAULT NULL,
  `cPerTipo` char(1) NOT NULL,
  `dPerFechaRegistro` datetime DEFAULT NULL,
  `cPerEstado` char(1) NOT NULL,
  PRIMARY KEY (`nPerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`nPerID`, `cPerNombres`, `cPerApellidos`, `cPerTipo`, `dPerFechaRegistro`, `cPerEstado`) VALUES
(1, 'juan', 'manay', 'N', '2014-07-11 19:50:06', 'H'),
(3, 'Gino', 'Chirinos Plasencia', 'N', '2014-07-11 19:50:06', 'H'),
(4, 'jose', 'guevara', 'N', '2014-07-11 20:33:59', 'H'),
(5, 'jose', 'guevara', 'N', '2014-07-11 20:34:37', 'H'),
(8, 'compare', 'compare', 'N', '2014-07-18 19:09:07', 'H'),
(9, 'primo', 'primo', 'N', '2014-07-18 19:17:59', 'H'),
(10, 'compadre', 'compadre', 'N', '2014-07-18 19:23:54', 'H'),
(11, 'carlota', 'carlota', 'N', '2014-07-18 19:27:47', 'H'),
(12, 'usuario nuevo', 'usuario nuevo', 'N', '2014-07-21 20:37:21', 'H'),
(13, 'wwww', 'wwwww', 'N', '2014-07-22 12:50:55', 'H'),
(14, 'juan', 'manay', 'N', '2014-07-22 14:00:25', 'H'),
(15, 'Gino Edgardo', 'Chirinos Ramos', 'N', '2014-07-29 18:09:23', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona_detalle`
--

CREATE TABLE IF NOT EXISTS `persona_detalle` (
  `nPedID` int(11) NOT NULL AUTO_INCREMENT,
  `nPerID` int(11) NOT NULL,
  `cPedValor` varchar(200) NOT NULL,
  `nParID` int(11) NOT NULL,
  `nPcaID` int(11) DEFAULT NULL,
  `cPedEstado` char(1) DEFAULT NULL,
  PRIMARY KEY (`nPedID`),
  KEY `nPerID` (`nPerID`),
  KEY `nParID` (`nParID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `persona_detalle`
--

INSERT INTO `persona_detalle` (`nPedID`, `nPerID`, `cPedValor`, `nParID`, `nPcaID`, `cPedEstado`) VALUES
(1, 3, 'luiggichirinos_pxxx@outlook.com', 9, 8, 'H'),
(2, 4, 'guevara@hotmail.com', 9, 8, 'H'),
(3, 5, 'guevara@hotmail.com', 9, 8, 'H'),
(8, 8, 'luiggichirinos_p@outlook.com', 9, 8, 'H'),
(9, 9, 'local@hotmail.com', 9, 8, 'H'),
(10, 10, 'compadre@outlook.com', 9, 8, 'H'),
(11, 11, 'wefjhwef@hotmail.com', 9, 8, 'H'),
(12, 12, 'usuario_nuevo@hotmail.com', 9, 8, 'H'),
(13, 13, 'aaaa@hotmail.com', 9, 8, 'H'),
(14, 14, 'carlos@reality-magic.com', 9, 8, 'H'),
(15, 15, 'ginoramos@hotmail.com', 9, 8, 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubigeo`
--

CREATE TABLE IF NOT EXISTS `ubigeo` (
  `nUbiID` smallint(6) NOT NULL,
  `nUbiDepartamento` char(2) NOT NULL,
  `nUbiProvincia` char(2) NOT NULL,
  `nUbiDistrito` char(2) NOT NULL,
  `cUbiDescripcion` varchar(150) NOT NULL,
  `cUbiEstado` char(1) NOT NULL,
  PRIMARY KEY (`nUbiID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ubigeo`
--

INSERT INTO `ubigeo` (`nUbiID`, `nUbiDepartamento`, `nUbiProvincia`, `nUbiDistrito`, `cUbiDescripcion`, `cUbiEstado`) VALUES
(1, '1', '0', '0', 'AMAZONAS', 'H'),
(2, '2', '0', '0', 'ANCASH', 'H'),
(3, '3', '0', '0', 'APURIMAC', 'H'),
(4, '4', '0', '0', 'AREQUIPA', 'H'),
(5, '5', '0', '0', 'AYACUCHO', 'H'),
(6, '6', '0', '0', 'CAJAMARCA', 'H'),
(7, '7', '0', '0', 'CALLAO', 'H'),
(8, '8', '0', '0', 'CUSCO', 'H'),
(9, '9', '0', '0', 'HUANCAVELICA', 'H'),
(10, '10', '0', '0', 'HUANUCO', 'H'),
(11, '11', '0', '0', 'ICA', 'H'),
(12, '12', '0', '0', 'JUNIN', 'H'),
(13, '13', '0', '0', 'LA LIBERTAD', 'H'),
(14, '14', '0', '0', 'LAMBAYEQUE', 'H'),
(15, '15', '0', '0', 'LIMA', 'H'),
(16, '16', '0', '0', 'LORETO', 'H'),
(17, '17', '0', '0', 'MADRE DE DIOS', 'H'),
(18, '18', '0', '0', 'MOQUEGUA', 'H'),
(19, '19', '0', '0', 'PASCO', 'H'),
(20, '20', '0', '0', 'PIURA', 'H'),
(21, '21', '0', '0', 'PUNO', 'H'),
(22, '22', '0', '0', 'SAN MARTIN', 'H'),
(23, '23', '0', '0', 'TACNA', 'H'),
(24, '24', '0', '0', 'TUMBES', 'H'),
(25, '25', '0', '0', 'UCAYALI', 'H'),
(26, '1', '1', '0', 'CHACHAPOYAS', 'H'),
(27, '1', '2', '0', 'BAGUA', 'H'),
(28, '1', '3', '0', 'BONGARA', 'H'),
(29, '1', '4', '0', 'CONDORCANQUI', 'H'),
(30, '1', '5', '0', 'LUYA', 'H'),
(31, '1', '6', '0', 'RODRIGUEZ DE MENDOZA', 'H'),
(32, '1', '7', '0', 'UTCUBAMBA', 'H'),
(33, '2', '1', '0', 'HUARAZ', 'H'),
(34, '2', '2', '0', 'AIJA', 'H'),
(35, '2', '3', '0', 'ANTONIO RAYMONDI', 'H'),
(36, '2', '4', '0', 'ASUNCION', 'H'),
(37, '2', '5', '0', 'BOLOGNESI', 'H'),
(38, '2', '6', '0', 'CARHUAZ', 'H'),
(39, '2', '7', '0', 'CARLOS FERMIN FITZCARRALD', 'H'),
(40, '2', '8', '0', 'CASMA', 'H'),
(41, '2', '9', '0', 'CORONGO', 'H'),
(42, '2', '10', '0', 'HUARI', 'H'),
(43, '2', '11', '0', 'HUARMEY', 'H'),
(44, '2', '12', '0', 'HUAYLAS', 'H'),
(45, '2', '13', '0', 'MARISCAL LUZURIAGA', 'H'),
(46, '2', '14', '0', 'OCROS', 'H'),
(47, '2', '15', '0', 'PALLASCA', 'H'),
(48, '2', '16', '0', 'POMABAMBA', 'H'),
(49, '2', '17', '0', 'RECUAY', 'H'),
(50, '2', '18', '0', 'SANTA', 'H'),
(51, '2', '19', '0', 'SIHUAS', 'H'),
(52, '2', '20', '0', 'YUNGAY', 'H'),
(53, '3', '1', '0', 'ABANCAY', 'H'),
(54, '3', '2', '0', 'ANDAHUAYLAS', 'H'),
(55, '3', '3', '0', 'ANTABAMBA', 'H'),
(56, '3', '4', '0', 'AYMARAES', 'H'),
(57, '3', '5', '0', 'COTABAMBAS', 'H'),
(58, '3', '6', '0', 'CHINCHEROS', 'H'),
(59, '3', '7', '0', 'GRAU', 'H'),
(60, '4', '1', '0', 'AREQUIPA', 'H'),
(61, '4', '2', '0', 'CAMANA', 'H'),
(62, '4', '3', '0', 'CARAVELI', 'H'),
(63, '4', '4', '0', 'CASTILLA', 'H'),
(64, '4', '5', '0', 'CAYLLOMA', 'H'),
(65, '4', '6', '0', 'CONDESUYOS', 'H'),
(66, '4', '7', '0', 'ISLAY', 'H'),
(67, '4', '8', '0', 'LA UNION', 'H'),
(68, '5', '1', '0', 'HUAMANGA', 'H'),
(69, '5', '2', '0', 'CANGALLO', 'H'),
(70, '5', '3', '0', 'HUANCA SANCOS', 'H'),
(71, '5', '4', '0', 'HUANTA', 'H'),
(72, '5', '5', '0', 'LA MAR', 'H'),
(73, '5', '6', '0', 'LUCANAS', 'H'),
(74, '5', '7', '0', 'PARINACOCHAS', 'H'),
(75, '5', '8', '0', 'PAUCAR DEL SARA SARA', 'H'),
(76, '5', '9', '0', 'SUCRE', 'H'),
(77, '5', '10', '0', 'VICTOR FAFARDO', 'H'),
(78, '5', '10', '0', 'VICTOR FAJARDO', 'H'),
(79, '5', '11', '0', 'VILCAS HUAMAN', 'H'),
(80, '6', '1', '0', 'CAJAMARCA', 'H'),
(81, '6', '2', '0', 'CAJABAMBA', 'H'),
(82, '6', '3', '0', 'CELENDIN', 'H'),
(83, '6', '4', '0', 'CHOTA', 'H'),
(84, '6', '5', '0', 'CONTUMAZA', 'H'),
(85, '6', '6', '0', 'CUTERVO', 'H'),
(86, '6', '7', '0', 'HUALGAYOC', 'H'),
(87, '6', '8', '0', 'JAEN', 'H'),
(88, '6', '9', '0', 'SAN IGNACIO', 'H'),
(89, '6', '10', '0', 'SAN MARCOS', 'H'),
(90, '6', '11', '0', 'SAN MIGUEL', 'H'),
(91, '6', '12', '0', 'SAN PABLO', 'H'),
(92, '6', '13', '0', 'SANTA CRUZ', 'H'),
(93, '7', '1', '0', 'CALLAO', 'H'),
(94, '8', '1', '0', 'CUSCO', 'H'),
(95, '8', '2', '0', 'ACOMAYO', 'H'),
(96, '8', '3', '0', 'ANTA', 'H'),
(97, '8', '4', '0', 'CALCA', 'H'),
(98, '8', '5', '0', 'CANAS', 'H'),
(99, '8', '6', '0', 'CANCHIS', 'H'),
(100, '8', '7', '0', 'CHUMBIVILCAS', 'H'),
(101, '8', '8', '0', 'ESPINAR', 'H'),
(102, '8', '9', '0', 'LA CONVENCION', 'H'),
(103, '8', '10', '0', 'PARURO', 'H'),
(104, '8', '11', '0', 'PAUCARTAMBO', 'H'),
(105, '8', '12', '0', 'QUISPICANCHI', 'H'),
(106, '8', '13', '0', 'URUBAMBA', 'H'),
(107, '9', '1', '0', 'HUANCAVELICA', 'H'),
(108, '9', '2', '0', 'ACOBAMBA', 'H'),
(109, '9', '3', '0', 'ANGARAES', 'H'),
(110, '9', '4', '0', 'CASTROVIRREYNA', 'H'),
(111, '9', '5', '0', 'CHURCAMPA', 'H'),
(112, '9', '6', '0', 'HUAYTARA', 'H'),
(113, '9', '7', '0', 'TAYACAJA', 'H'),
(114, '10', '1', '0', 'HUANUCO', 'H'),
(115, '10', '2', '0', 'AMBO', 'H'),
(116, '10', '3', '0', 'DOS DE MAYO', 'H'),
(117, '10', '4', '0', 'HUACAYBAMBA', 'H'),
(118, '10', '5', '0', 'HUAMALIES', 'H'),
(119, '10', '6', '0', 'LEONCIO PRADO', 'H'),
(120, '10', '7', '0', 'MARAÃƒ?ON', 'H'),
(121, '10', '8', '0', 'PACHITEA', 'H'),
(122, '10', '9', '0', 'PUERTO INCA', 'H'),
(123, '10', '10', '0', 'LAURICOCHA', 'H'),
(124, '10', '11', '0', 'YAROWILCA', 'H'),
(125, '11', '1', '0', 'ICA', 'H'),
(126, '11', '2', '0', 'CHINCHA', 'H'),
(127, '11', '3', '0', 'NAZCA', 'H'),
(128, '11', '4', '0', 'PALPA', 'H'),
(129, '11', '5', '0', 'PISCO', 'H'),
(130, '12', '1', '0', 'HUANCAYO', 'H'),
(131, '12', '2', '0', 'CONCEPCION', 'H'),
(132, '12', '3', '0', 'CHANCHAMAYO', 'H'),
(133, '12', '4', '0', 'JAUJA', 'H'),
(134, '12', '5', '0', 'JUNIN', 'H'),
(135, '12', '6', '0', 'SATIPO', 'H'),
(136, '12', '7', '0', 'TARMA', 'H'),
(137, '12', '8', '0', 'YAULI', 'H'),
(138, '12', '9', '0', 'CHUPACA', 'H'),
(139, '13', '1', '0', 'TRUJILLO', 'H'),
(140, '13', '2', '0', 'ASCOPE', 'H'),
(141, '13', '3', '0', 'BOLIVAR', 'H'),
(142, '13', '4', '0', 'CHEPEN', 'H'),
(143, '13', '5', '0', 'JULCAN', 'H'),
(144, '13', '6', '0', 'OTUZCO', 'H'),
(145, '13', '7', '0', 'PACASMAYO', 'H'),
(146, '13', '8', '0', 'PATAZ', 'H'),
(147, '13', '9', '0', 'SANCHEZ CARRION', 'H'),
(148, '13', '10', '0', 'SANTIAGO DE CHUCO', 'H'),
(149, '13', '11', '0', 'GRAN CHIMU', 'H'),
(150, '13', '12', '0', 'VIRU', 'H'),
(151, '14', '1', '0', 'CHICLAYO', 'H'),
(152, '14', '2', '0', 'FERREÃƒ?AFE', 'H'),
(153, '14', '3', '0', 'LAMBAYEQUE', 'H'),
(154, '15', '1', '0', 'LIMA', 'H'),
(155, '15', '2', '0', 'BARRANCA', 'H'),
(156, '15', '3', '0', 'CAJATAMBO', 'H'),
(157, '15', '4', '0', 'CANTA', 'H'),
(158, '15', '5', '0', 'CAÃƒ?ETE', 'H'),
(159, '15', '6', '0', 'HUARAL', 'H'),
(160, '15', '7', '0', 'HUAROCHIRI', 'H'),
(161, '15', '8', '0', 'HUAURA', 'H'),
(162, '15', '9', '0', 'OYON', 'H'),
(163, '15', '10', '0', 'YAUYOS', 'H'),
(164, '16', '1', '0', 'MAYNAS', 'H'),
(165, '16', '2', '0', 'ALTO AMAZONAS', 'H'),
(166, '16', '3', '0', 'LORETO', 'H'),
(167, '16', '4', '0', 'MARISCAL RAMON CASTILLA', 'H'),
(168, '16', '5', '0', 'REQUENA', 'H'),
(169, '16', '6', '0', 'UCAYALI', 'H'),
(170, '16', '7', '0', 'DATEM DEL MARAÃƒ?ON', 'H'),
(171, '17', '1', '0', 'TAMBOPATA', 'H'),
(172, '17', '2', '0', 'MANU', 'H'),
(173, '17', '3', '0', 'TAHUAMANU', 'H'),
(174, '18', '1', '0', 'MARISCAL NIETO', 'H'),
(175, '18', '2', '0', 'GENERAL SANCHEZ CERRO', 'H'),
(176, '18', '3', '0', 'ILO', 'H'),
(177, '19', '1', '0', 'PASCO', 'H'),
(178, '19', '2', '0', 'DANIEL ALCIDES CARRION', 'H'),
(179, '19', '3', '0', 'OXAPAMPA', 'H'),
(180, '20', '1', '0', 'PIURA', 'H'),
(181, '20', '1', '0', 'PUIRA', 'H'),
(182, '20', '2', '0', 'AYABACA', 'H'),
(183, '20', '3', '0', 'HUANCABAMBA', 'H'),
(184, '20', '4', '0', 'MORROPON', 'H'),
(185, '20', '5', '0', 'PAITA', 'H'),
(186, '20', '6', '0', 'SULLANA', 'H'),
(187, '20', '7', '0', 'TALARA', 'H'),
(188, '20', '8', '0', 'SECHURA', 'H'),
(189, '21', '1', '0', 'PUNO', 'H'),
(190, '21', '2', '0', 'AZANGARO', 'H'),
(191, '21', '3', '0', 'CARABAYA', 'H'),
(192, '21', '4', '0', 'CHUCUITO', 'H'),
(193, '21', '5', '0', 'EL COLLAO', 'H'),
(194, '21', '6', '0', 'HUANCANE', 'H'),
(195, '21', '7', '0', 'LAMPA', 'H'),
(196, '21', '8', '0', 'MELGAR', 'H'),
(197, '21', '9', '0', 'MOHO', 'H'),
(198, '21', '10', '0', 'SAN ANTONIO DE PUTINA', 'H'),
(199, '21', '11', '0', 'SAN ROMAN', 'H'),
(200, '21', '12', '0', 'SANDIA', 'H'),
(201, '21', '13', '0', 'YUNGUYO', 'H'),
(202, '22', '1', '0', 'MOYOBAMBA', 'H'),
(203, '22', '2', '0', 'BELLAVISTA', 'H'),
(204, '22', '3', '0', 'EL DORADO', 'H'),
(205, '22', '4', '0', 'HUALLAGA', 'H'),
(206, '22', '5', '0', 'LAMAS', 'H'),
(207, '22', '6', '0', 'MARISCAL CACERES', 'H'),
(208, '22', '7', '0', 'PICOTA', 'H'),
(209, '22', '8', '0', 'RIOJA', 'H'),
(210, '22', '9', '0', 'SAN MARTIN', 'H'),
(211, '22', '10', '0', 'TOCACHE', 'H'),
(212, '23', '1', '0', 'TACNA', 'H'),
(213, '23', '2', '0', 'CANDARAVE', 'H'),
(214, '23', '3', '0', 'JORGE BASADRE', 'H'),
(215, '23', '4', '0', 'TARATA', 'H'),
(216, '24', '1', '0', 'TUMBES', 'H'),
(217, '24', '2', '0', 'CONTRALMIRANTE VILLAR', 'H'),
(218, '24', '3', '0', 'ZARUMILLA', 'H'),
(219, '25', '1', '0', 'CORONEL PORTILLO', 'H'),
(220, '25', '2', '0', 'ATALAYA', 'H'),
(221, '25', '3', '0', 'PADRE ABAD', 'H'),
(222, '25', '4', '0', 'PURUS', 'H'),
(223, '1', '1', '1', 'CHACHAPOYAS', 'H'),
(224, '1', '1', '2', 'ASUNCION', 'H'),
(225, '1', '1', '3', 'BALSAS', 'H'),
(226, '1', '1', '4', 'CHETO', 'H'),
(227, '1', '1', '5', 'CHILIQUIN', 'H'),
(228, '1', '1', '6', 'CHUQUIBAMBA', 'H'),
(229, '1', '1', '7', 'GRANADA', 'H'),
(230, '1', '1', '8', 'HUANCAS', 'H'),
(231, '1', '1', '9', 'LA JALCA', 'H'),
(232, '1', '1', '10', 'LEIMEBAMBA', 'H'),
(233, '1', '1', '11', 'LEVANTO', 'H'),
(234, '1', '1', '12', 'MAGDALENA', 'H'),
(235, '1', '1', '13', 'MARISCAL CASTILLA', 'H'),
(236, '1', '1', '14', 'MOLINOPAMPA', 'H'),
(237, '1', '1', '15', 'MONTEVIDEO', 'H'),
(238, '1', '1', '16', 'OLLEROS', 'H'),
(239, '1', '1', '17', 'QUINJALCA', 'H'),
(240, '1', '1', '18', 'SAN FRANCISCO DE DAGUAS', 'H'),
(241, '1', '1', '19', 'SAN ISIDRO DE MAINO', 'H'),
(242, '1', '1', '20', 'SOLOCO', 'H'),
(243, '1', '1', '21', 'SONCHE', 'H'),
(244, '1', '2', '1', 'LA PECA', 'H'),
(245, '1', '2', '2', 'ARAMANGO', 'H'),
(246, '1', '2', '3', 'COPALLIN', 'H'),
(247, '1', '2', '4', 'EL PARCO', 'H'),
(248, '1', '2', '5', 'IMAZA', 'H'),
(249, '1', '2', '6', 'BAGUA', 'H'),
(250, '1', '3', '1', 'JUMBILLA', 'H'),
(251, '1', '3', '2', 'CHISQUILLA', 'H'),
(252, '1', '3', '3', 'CHURUJA', 'H'),
(253, '1', '3', '4', 'COROSHA', 'H'),
(254, '1', '3', '5', 'CUISPES', 'H'),
(255, '1', '3', '6', 'FLORIDA', 'H'),
(256, '1', '3', '7', 'JAZAN', 'H'),
(257, '1', '3', '8', 'RECTA', 'H'),
(258, '1', '3', '9', 'SAN CARLOS', 'H'),
(259, '1', '3', '10', 'SHIPASBAMBA', 'H'),
(260, '1', '3', '11', 'VALERA', 'H'),
(261, '1', '3', '12', 'YAMBRASBAMBA', 'H'),
(262, '1', '4', '1', 'NIEVA', 'H'),
(263, '1', '4', '2', 'EL CENEPA', 'H'),
(264, '1', '4', '3', 'RIO SANTIAGO', 'H'),
(265, '1', '5', '1', 'LAMUD', 'H'),
(266, '1', '5', '2', 'CAMPORREDONDO', 'H'),
(267, '1', '5', '3', 'COCABAMBA', 'H'),
(268, '1', '5', '4', 'COLCAMAR', 'H'),
(269, '1', '5', '5', 'CONILA', 'H'),
(270, '1', '5', '6', 'INGUILPATA', 'H'),
(271, '1', '5', '7', 'LONGUITA', 'H'),
(272, '1', '5', '8', 'LONYA CHICO', 'H'),
(273, '1', '5', '9', 'LUYA', 'H'),
(274, '1', '5', '10', 'LUYA VIEJO', 'H'),
(275, '1', '5', '11', 'MARIA', 'H'),
(276, '1', '5', '12', 'OCALLI', 'H'),
(277, '1', '5', '13', 'OCUMAL', 'H'),
(278, '1', '5', '14', 'PISUQUIA', 'H'),
(279, '1', '5', '15', 'PROVIDENCIA', 'H'),
(280, '1', '5', '16', 'SAN CRISTOBAL', 'H'),
(281, '1', '5', '17', 'SAN FRANCISCO DEL YESO', 'H'),
(282, '1', '5', '18', 'SAN JERONIMO', 'H'),
(283, '1', '5', '19', 'SAN JUAN DE LOPECANCHA', 'H'),
(284, '1', '5', '20', 'SANTA CATALINA', 'H'),
(285, '1', '5', '21', 'SANTO TOMAS', 'H'),
(286, '1', '5', '22', 'TINGO', 'H'),
(287, '1', '5', '23', 'TRITA', 'H'),
(288, '1', '6', '1', 'SAN NICOLAS', 'H'),
(289, '1', '6', '2', 'CHIRIMOTO', 'H'),
(290, '1', '6', '3', 'COCHAMAL', 'H'),
(291, '1', '6', '4', 'HUAMBO', 'H'),
(292, '1', '6', '5', 'LIMABAMBA', 'H'),
(293, '1', '6', '6', 'LONGAR', 'H'),
(294, '1', '6', '7', 'MARISCAL BENAVIDES', 'H'),
(295, '1', '6', '8', 'MILPUC', 'H'),
(296, '1', '6', '9', 'OMIA', 'H'),
(297, '1', '6', '10', 'SANTA ROSA', 'H'),
(298, '1', '6', '11', 'TOTORA', 'H'),
(299, '1', '6', '12', 'VISTA ALEGRE', 'H'),
(300, '1', '7', '1', 'BAGUA GRANDE', 'H'),
(301, '1', '7', '2', 'CAJARURO', 'H'),
(302, '1', '7', '3', 'CUMBA', 'H'),
(303, '1', '7', '4', 'EL MILAGRO', 'H'),
(304, '1', '7', '5', 'JAMALCA', 'H'),
(305, '1', '7', '6', 'LONYA GRANDE', 'H'),
(306, '1', '7', '7', 'YAMON', 'H'),
(307, '2', '1', '1', 'HUARAZ', 'H'),
(308, '2', '1', '2', 'COCHABAMBA', 'H'),
(309, '2', '1', '3', 'COLCABAMBA', 'H'),
(310, '2', '1', '4', 'HUANCHAY', 'H'),
(311, '2', '1', '5', 'INDEPENDENCIA', 'H'),
(312, '2', '1', '6', 'JANGAS', 'H'),
(313, '2', '1', '7', 'LA LIBERTAD', 'H'),
(314, '2', '1', '8', 'OLLEROS', 'H'),
(315, '2', '1', '9', 'PAMPAS', 'H'),
(316, '2', '1', '10', 'PARIACOTO', 'H'),
(317, '2', '1', '11', 'PIRA', 'H'),
(318, '2', '1', '12', 'TARICA', 'H'),
(319, '2', '2', '1', 'AIJA', 'H'),
(320, '2', '2', '2', 'CORIS', 'H'),
(321, '2', '2', '3', 'HUACLLAN', 'H'),
(322, '2', '2', '4', 'LA MERCED', 'H'),
(323, '2', '2', '5', 'SUCCHA', 'H'),
(324, '2', '3', '1', 'LLAMELLIN', 'H'),
(325, '2', '3', '2', 'ACZO', 'H'),
(326, '2', '3', '3', 'CHACCHO', 'H'),
(327, '2', '3', '4', 'CHINGAS', 'H'),
(328, '2', '3', '5', 'MIRGAS', 'H'),
(329, '2', '3', '6', 'SAN JUAN DE RONTOY', 'H'),
(330, '2', '4', '1', 'CHACAS', 'H'),
(331, '2', '4', '2', 'ACOCHACA', 'H'),
(332, '2', '5', '1', 'CHIQUIAN', 'H'),
(333, '2', '5', '2', 'ABELARDO PARDO LEZAMETA', 'H'),
(334, '2', '5', '3', 'ANTONIO RAYMONDI', 'H'),
(335, '2', '5', '4', 'AQUIA', 'H'),
(336, '2', '5', '5', 'CAJACAY', 'H'),
(337, '2', '5', '6', 'CANIS', 'H'),
(338, '2', '5', '7', 'COLQUIOC', 'H'),
(339, '2', '5', '8', 'HUALLANCA', 'H'),
(340, '2', '5', '9', 'HUASTA', 'H'),
(341, '2', '5', '10', 'HUAYLLACAYAN', 'H'),
(342, '2', '5', '11', 'LA PRIMAVERA', 'H'),
(343, '2', '5', '12', 'MANGAS', 'H'),
(344, '2', '5', '13', 'PACLLON', 'H'),
(345, '2', '5', '14', 'SAN MIGUEL DE CORPANQUI', 'H'),
(346, '2', '5', '15', 'TICLLOS', 'H'),
(347, '2', '6', '1', 'CARHUAZ', 'H'),
(348, '2', '6', '2', 'ACOPAMPA', 'H'),
(349, '2', '6', '3', 'AMASHCA', 'H'),
(350, '2', '6', '4', 'ANTA', 'H'),
(351, '2', '6', '5', 'ATAQUERO', 'H'),
(352, '2', '6', '6', 'MARCARA', 'H'),
(353, '2', '6', '7', 'PARIAHUANCA', 'H'),
(354, '2', '6', '8', 'SAN MIGUEL DE ACO', 'H'),
(355, '2', '6', '9', 'SHILLA', 'H'),
(356, '2', '6', '10', 'TINCO', 'H'),
(357, '2', '6', '11', 'YUNGAR', 'H'),
(358, '2', '7', '1', 'SAN LUIS', 'H'),
(359, '2', '7', '2', 'SAN NICOLAS', 'H'),
(360, '2', '7', '3', 'YAUYA', 'H'),
(361, '2', '8', '1', 'CASMA', 'H'),
(362, '2', '8', '2', 'BUENA VISTA ALTA', 'H'),
(363, '2', '8', '3', 'COMANDANTE NOEL', 'H'),
(364, '2', '8', '4', 'YAUTAN', 'H'),
(365, '2', '9', '1', 'CORONGO', 'H'),
(366, '2', '9', '2', 'ACO', 'H'),
(367, '2', '9', '3', 'BAMBAS', 'H'),
(368, '2', '9', '4', 'CUSCA', 'H'),
(369, '2', '9', '5', 'LA PAMPA', 'H'),
(370, '2', '9', '6', 'YANAC', 'H'),
(371, '2', '9', '7', 'YUPAN', 'H'),
(372, '2', '10', '1', 'HUARI', 'H'),
(373, '2', '10', '2', 'ANRA', 'H'),
(374, '2', '10', '3', 'CAJAY', 'H'),
(375, '2', '10', '4', 'CHAVIN DE HUANTAR', 'H'),
(376, '2', '10', '5', 'HUACACHI', 'H'),
(377, '2', '10', '6', 'HUACCHIS', 'H'),
(378, '2', '10', '7', 'HUACHIS', 'H'),
(379, '2', '10', '8', 'HUANTAR', 'H'),
(380, '2', '10', '9', 'MASIN', 'H'),
(381, '2', '10', '10', 'PAUCAS', 'H'),
(382, '2', '10', '11', 'PONTO', 'H'),
(383, '2', '10', '12', 'RAHUAPAMPA', 'H'),
(384, '2', '10', '13', 'RAPAYAN', 'H'),
(385, '2', '10', '14', 'SAN MARCOS', 'H'),
(386, '2', '10', '15', 'SAN PEDRO DE CHANA', 'H'),
(387, '2', '10', '16', 'UCO', 'H'),
(388, '2', '11', '1', 'HUARMEY', 'H'),
(389, '2', '11', '2', 'COCHAPETI', 'H'),
(390, '2', '11', '3', 'CULEBRAS', 'H'),
(391, '2', '11', '4', 'HUAYAN', 'H'),
(392, '2', '11', '5', 'MALVAS', 'H'),
(393, '2', '12', '1', 'CARAZ', 'H'),
(394, '2', '12', '2', 'HUALLANCA', 'H'),
(395, '2', '12', '3', 'HUATA', 'H'),
(396, '2', '12', '4', 'HUAYLAS', 'H'),
(397, '2', '12', '5', 'MATO', 'H'),
(398, '2', '12', '6', 'PAMPAROMAS', 'H'),
(399, '2', '12', '7', 'PUEBLO LIBRE', 'H'),
(400, '2', '12', '8', 'SANTA CRUZ', 'H'),
(401, '2', '12', '9', 'SANTO TORIBIO', 'H'),
(402, '2', '12', '10', 'YURACMARCA', 'H'),
(403, '2', '13', '1', 'PISCOBAMBA', 'H'),
(404, '2', '13', '2', 'CASCA', 'H'),
(405, '2', '13', '3', 'ELEAZAR GUZMAN BARRON', 'H'),
(406, '2', '13', '4', 'FIDEL OLIVAS ESCUDERO', 'H'),
(407, '2', '13', '5', 'LLAMA', 'H'),
(408, '2', '13', '6', 'LLUMPA', 'H'),
(409, '2', '13', '7', 'LUCMA', 'H'),
(410, '2', '13', '8', 'MUSGA', 'H'),
(411, '2', '14', '1', 'OCROS', 'H'),
(412, '2', '14', '2', 'ACAS', 'H'),
(413, '2', '14', '3', 'CAJAMARQUILLA', 'H'),
(414, '2', '14', '4', 'CARHUAPAMPA', 'H'),
(415, '2', '14', '5', 'COCHAS', 'H'),
(416, '2', '14', '6', 'CONGAS', 'H'),
(417, '2', '14', '7', 'LLIPA', 'H'),
(418, '2', '14', '8', 'SAN CRISTOBAL DE RAJAN', 'H'),
(419, '2', '14', '9', 'SAN PEDRO', 'H'),
(420, '2', '14', '10', 'SANTIAGO DE CHILCAS', 'H'),
(421, '2', '15', '1', 'CABANA', 'H'),
(422, '2', '15', '2', 'BOLOGNESI', 'H'),
(423, '2', '15', '3', 'CONCHUCOS', 'H'),
(424, '2', '15', '4', 'HUACASCHUQUE', 'H'),
(425, '2', '15', '5', 'HUANDOVAL', 'H'),
(426, '2', '15', '6', 'LACABAMBA', 'H'),
(427, '2', '15', '7', 'LLAPO', 'H'),
(428, '2', '15', '8', 'PALLASCA', 'H'),
(429, '2', '15', '9', 'PAMPAS', 'H'),
(430, '2', '15', '10', 'SANTA ROSA', 'H'),
(431, '2', '15', '11', 'TAUCA', 'H'),
(432, '2', '16', '1', 'POMABAMBA', 'H'),
(433, '2', '16', '2', 'HUAYLLAN', 'H'),
(434, '2', '16', '3', 'PAROBAMBA', 'H'),
(435, '2', '16', '4', 'QUINUABAMBA', 'H'),
(436, '2', '17', '1', 'RECUAY', 'H'),
(437, '2', '17', '2', 'CATAC', 'H'),
(438, '2', '17', '3', 'COTAPARACO', 'H'),
(439, '2', '17', '4', 'HUAYLLAPAMPA', 'H'),
(440, '2', '17', '5', 'LLACLLIN', 'H'),
(441, '2', '17', '6', 'MARCA', 'H'),
(442, '2', '17', '7', 'PAMPAS CHICO', 'H'),
(443, '2', '17', '8', 'PARARIN', 'H'),
(444, '2', '17', '9', 'TAPACOCHA', 'H'),
(445, '2', '17', '10', 'TICAPAMPA', 'H'),
(446, '2', '18', '1', 'CHIMBOTE', 'H'),
(447, '2', '18', '2', 'CACERES DEL PERU', 'H'),
(448, '2', '18', '3', 'COISHCO', 'H'),
(449, '2', '18', '4', 'MACATE', 'H'),
(450, '2', '18', '5', 'MORO', 'H'),
(451, '2', '18', '6', 'NEPEÃƒ?A', 'H'),
(452, '2', '18', '7', 'SAMANCO', 'H'),
(453, '2', '18', '8', 'SANTA', 'H'),
(454, '2', '18', '9', 'NUEVO CHIMBOTE', 'H'),
(455, '2', '19', '1', 'SIHUAS', 'H'),
(456, '2', '19', '2', 'ACOBAMBA', 'H'),
(457, '2', '19', '3', 'ALFONSO UGARTE', 'H'),
(458, '2', '19', '4', 'CASHAPAMPA', 'H'),
(459, '2', '19', '5', 'CHINGALPO', 'H'),
(460, '2', '19', '6', 'HUAYLLABAMBA', 'H'),
(461, '2', '19', '7', 'QUICHES', 'H'),
(462, '2', '19', '8', 'RAGASH', 'H'),
(463, '2', '19', '9', 'SAN JUAN', 'H'),
(464, '2', '19', '10', 'SICSIBAMBA', 'H'),
(465, '2', '20', '1', 'YUNGAY', 'H'),
(466, '2', '20', '2', 'CASCAPARA', 'H'),
(467, '2', '20', '3', 'MANCOS', 'H'),
(468, '2', '20', '4', 'MATACOTO', 'H'),
(469, '2', '20', '5', 'QUILLO', 'H'),
(470, '2', '20', '6', 'RANRAHIRCA', 'H'),
(471, '2', '20', '7', 'SHUPLUY', 'H'),
(472, '2', '20', '8', 'YANAMA', 'H'),
(473, '3', '1', '1', 'ABANCAY', 'H'),
(474, '3', '1', '2', 'CHACOCHE', 'H'),
(475, '3', '1', '3', 'CIRCA', 'H'),
(476, '3', '1', '4', 'CURAHUASI', 'H'),
(477, '3', '1', '5', 'HUANIPACA', 'H'),
(478, '3', '1', '6', 'LAMBRAMA', 'H'),
(479, '3', '1', '7', 'PICHIRHUA', 'H'),
(480, '3', '1', '8', 'SAN PEDRO DE CACHORA', 'H'),
(481, '3', '1', '9', 'TAMBURCO', 'H'),
(482, '3', '2', '1', 'ANDAHUAYLAS', 'H'),
(483, '3', '2', '2', 'ANDARAPA', 'H'),
(484, '3', '2', '3', 'CHIARA', 'H'),
(485, '3', '2', '4', 'HUANCARAMA', 'H'),
(486, '3', '2', '5', 'HUANCARAY', 'H'),
(487, '3', '2', '6', 'HUAYANA', 'H'),
(488, '3', '2', '7', 'KISHUARA', 'H'),
(489, '3', '2', '8', 'PACOBAMBA', 'H'),
(490, '3', '2', '9', 'PACUCHA', 'H'),
(491, '3', '2', '10', 'PAMPACHIRI', 'H'),
(492, '3', '2', '11', 'POMACOCHA', 'H'),
(493, '3', '2', '12', 'SAN ANTONIO DE CACHI', 'H'),
(494, '3', '2', '13', 'SAN JERONIMO', 'H'),
(495, '3', '2', '14', 'SAN MIGUEL DE CHACCRAMPA', 'H'),
(496, '3', '2', '15', 'SANTA MARIA DE CHICMO', 'H'),
(497, '3', '2', '16', 'TALAVERA', 'H'),
(498, '3', '2', '17', 'TUMAY HUARACA', 'H'),
(499, '3', '2', '18', 'TURPO', 'H'),
(500, '3', '2', '19', 'KAQUIABAMBA', 'H'),
(501, '3', '3', '1', 'ANTABAMBA', 'H'),
(502, '3', '3', '2', 'EL ORO', 'H'),
(503, '3', '3', '3', 'HUAQUIRCA', 'H'),
(504, '3', '3', '4', 'JUAN ESPINOZA MEDRANO', 'H'),
(505, '3', '3', '5', 'OROPESA', 'H'),
(506, '3', '3', '6', 'PACHACONAS', 'H'),
(507, '3', '3', '7', 'SABAINO', 'H'),
(508, '3', '4', '1', 'CHALHUANCA', 'H'),
(509, '3', '4', '2', 'CAPAYA', 'H'),
(510, '3', '4', '3', 'CARAYBAMBA', 'H'),
(511, '3', '4', '4', 'CHAPIMARCA', 'H'),
(512, '3', '4', '5', 'COLCABAMBA', 'H'),
(513, '3', '4', '6', 'COTARUSE', 'H'),
(514, '3', '4', '7', 'HUAYLLO', 'H'),
(515, '3', '4', '8', 'JUSTO APU SAHUARAURA', 'H'),
(516, '3', '4', '9', 'LUCRE', 'H'),
(517, '3', '4', '10', 'POCOHUANCA', 'H'),
(518, '3', '4', '11', 'SAN JUAN DE CHACÃƒ?A', 'H'),
(519, '3', '4', '12', 'SAÃƒ?AYCA', 'H'),
(520, '3', '4', '13', 'SORAYA', 'H'),
(521, '3', '4', '14', 'TAPAIRIHUA', 'H'),
(522, '3', '4', '15', 'TINTAY', 'H'),
(523, '3', '4', '16', 'TORAYA', 'H'),
(524, '3', '4', '17', 'YANACA', 'H'),
(525, '3', '5', '1', 'TAMBOBAMBA', 'H'),
(526, '3', '5', '2', 'COTABAMBAS', 'H'),
(527, '3', '5', '3', 'COYLLURQUI', 'H'),
(528, '3', '5', '4', 'HAQUIRA', 'H'),
(529, '3', '5', '5', 'MARA', 'H'),
(530, '3', '5', '6', 'CHALLHUAHUACHO', 'H'),
(531, '3', '6', '1', 'CHINCHEROS', 'H'),
(532, '3', '6', '2', 'ANCO_HUALLO', 'H'),
(533, '3', '6', '3', 'COCHARCAS', 'H'),
(534, '3', '6', '4', 'HUACCANA', 'H'),
(535, '3', '6', '5', 'OCOBAMBA', 'H'),
(536, '3', '6', '6', 'ONGOY', 'H'),
(537, '3', '6', '7', 'URANMARCA', 'H'),
(538, '3', '6', '8', 'RANRACANCHA', 'H'),
(539, '3', '7', '1', 'CHUQUIBAMBILLA', 'H'),
(540, '3', '7', '2', 'CURPAHUASI', 'H'),
(541, '3', '7', '3', 'GAMARRA', 'H'),
(542, '3', '7', '4', 'HUAYLLATI', 'H'),
(543, '3', '7', '5', 'MAMARA', 'H'),
(544, '3', '7', '6', 'MICAELA BASTIDAS', 'H'),
(545, '3', '7', '7', 'PATAYPAMPA', 'H'),
(546, '3', '7', '8', 'PROGRESO', 'H'),
(547, '3', '7', '9', 'SAN ANTONIO', 'H'),
(548, '3', '7', '10', 'SANTA ROSA', 'H'),
(549, '3', '7', '11', 'TURPAY', 'H'),
(550, '3', '7', '12', 'VILCABAMBA', 'H'),
(551, '3', '7', '13', 'VIRUNDO', 'H'),
(552, '3', '7', '14', 'CURASCO', 'H'),
(553, '4', '1', '1', 'AREQUIPA', 'H'),
(554, '4', '1', '2', 'ALTO SELVA ALEGRE', 'H'),
(555, '4', '1', '3', 'CAYMA', 'H'),
(556, '4', '1', '4', 'CERRO COLORADO', 'H'),
(557, '4', '1', '5', 'CHARACATO', 'H'),
(558, '4', '1', '6', 'CHIGUATA', 'H'),
(559, '4', '1', '7', 'JACOBO HUNTER', 'H'),
(560, '4', '1', '8', 'LA JOYA', 'H'),
(561, '4', '1', '9', 'MARIANO MELGAR', 'H'),
(562, '4', '1', '10', 'MIRAFLORES', 'H'),
(563, '4', '1', '11', 'MOLLEBAYA', 'H'),
(564, '4', '1', '12', 'PAUCARPATA', 'H'),
(565, '4', '1', '13', 'POCSI', 'H'),
(566, '4', '1', '14', 'POLOBAYA', 'H'),
(567, '4', '1', '15', 'QUEQUEÃƒ?A', 'H'),
(568, '4', '1', '16', 'SABANDIA', 'H'),
(569, '4', '1', '17', 'SACHACA', 'H'),
(570, '4', '1', '18', 'SAN JUAN DE SIGUAS', 'H'),
(571, '4', '1', '19', 'SAN JUAN DE TARUCANI', 'H'),
(572, '4', '1', '20', 'SANTA ISABEL DE SIGUAS', 'H'),
(573, '4', '1', '21', 'SANTA RITA DE SIGUAS', 'H'),
(574, '4', '1', '22', 'SOCABAYA', 'H'),
(575, '4', '1', '23', 'TIABAYA', 'H'),
(576, '4', '1', '24', 'UCHUMAYO', 'H'),
(577, '4', '1', '25', 'VITOR', 'H'),
(578, '4', '1', '26', 'YANAHUARA', 'H'),
(579, '4', '1', '27', 'YARABAMBA', 'H'),
(580, '4', '1', '28', 'YURA', 'H'),
(581, '4', '1', '29', 'JOSE LUIS BUSTAMANTE Y RIVERO', 'H'),
(582, '4', '2', '1', 'CAMANA', 'H'),
(583, '4', '2', '2', 'JOSE MARIA QUIMPER', 'H'),
(584, '4', '2', '3', 'MARIANO NICOLAS VALCARCEL', 'H'),
(585, '4', '2', '4', 'MARISCAL CACERES', 'H'),
(586, '4', '2', '5', 'NICOLAS DE PIEROLA', 'H'),
(587, '4', '2', '6', 'OCOÃƒ?A', 'H'),
(588, '4', '2', '7', 'QUILCA', 'H'),
(589, '4', '2', '8', 'SAMUEL PASTOR', 'H'),
(590, '4', '3', '1', 'CARAVELI', 'H'),
(591, '4', '3', '2', 'ACARI', 'H'),
(592, '4', '3', '3', 'ATICO', 'H'),
(593, '4', '3', '4', 'ATIQUIPA', 'H'),
(594, '4', '3', '5', 'BELLA UNION', 'H'),
(595, '4', '3', '6', 'CAHUACHO', 'H'),
(596, '4', '3', '7', 'CHALA', 'H'),
(597, '4', '3', '8', 'CHAPARRA', 'H'),
(598, '4', '3', '9', 'HUANUHUANU', 'H'),
(599, '4', '3', '10', 'JAQUI', 'H'),
(600, '4', '3', '11', 'LOMAS', 'H'),
(601, '4', '3', '12', 'QUICACHA', 'H'),
(602, '4', '3', '13', 'YAUCA', 'H'),
(603, '4', '4', '1', 'APLAO', 'H'),
(604, '4', '4', '2', 'ANDAGUA', 'H'),
(605, '4', '4', '3', 'AYO', 'H'),
(606, '4', '4', '4', 'CHACHAS', 'H'),
(607, '4', '4', '5', 'CHILCAYMARCA', 'H'),
(608, '4', '4', '6', 'CHOCO', 'H'),
(609, '4', '4', '7', 'HUANCARQUI', 'H'),
(610, '4', '4', '8', 'MACHAGUAY', 'H'),
(611, '4', '4', '9', 'ORCOPAMPA', 'H'),
(612, '4', '4', '10', 'PAMPACOLCA', 'H'),
(613, '4', '4', '11', 'TIPAN', 'H'),
(614, '4', '4', '12', 'UÃƒ?ON', 'H'),
(615, '4', '4', '13', 'URACA', 'H'),
(616, '4', '4', '14', 'VIRACO', 'H'),
(617, '4', '5', '1', 'CHIVAY', 'H'),
(618, '4', '5', '2', 'ACHOMA', 'H'),
(619, '4', '5', '3', 'CABANACONDE', 'H'),
(620, '4', '5', '4', 'CALLALLI', 'H'),
(621, '4', '5', '5', 'CAYLLOMA', 'H'),
(622, '4', '5', '6', 'COPORAQUE', 'H'),
(623, '4', '5', '7', 'HUAMBO', 'H'),
(624, '4', '5', '8', 'HUANCA', 'H'),
(625, '4', '5', '9', 'ICHUPAMPA', 'H'),
(626, '4', '5', '10', 'LARI', 'H'),
(627, '4', '5', '11', 'LLUTA', 'H'),
(628, '4', '5', '12', 'MACA', 'H'),
(629, '4', '5', '13', 'MADRIGAL', 'H'),
(630, '4', '5', '14', 'SAN ANTONIO DE CHUCA', 'H'),
(631, '4', '5', '15', 'SIBAYO', 'H'),
(632, '4', '5', '16', 'TAPAY', 'H'),
(633, '4', '5', '17', 'TISCO', 'H'),
(634, '4', '5', '18', 'TUTI', 'H'),
(635, '4', '5', '19', 'YANQUE', 'H'),
(636, '4', '5', '20', 'MAJES', 'H'),
(637, '4', '6', '1', 'CHUQUIBAMBA', 'H'),
(638, '4', '6', '2', 'ANDARAY', 'H'),
(639, '4', '6', '3', 'CAYARANI', 'H'),
(640, '4', '6', '4', 'CHICHAS', 'H'),
(641, '4', '6', '5', 'IRAY', 'H'),
(642, '4', '6', '6', 'RIO GRANDE', 'H'),
(643, '4', '6', '7', 'SALAMANCA', 'H'),
(644, '4', '6', '8', 'YANAQUIHUA', 'H'),
(645, '4', '7', '1', 'MOLLENDO', 'H'),
(646, '4', '7', '2', 'COCACHACRA', 'H'),
(647, '4', '7', '3', 'DEAN VALDIVIA', 'H'),
(648, '4', '7', '4', 'ISLAY', 'H'),
(649, '4', '7', '5', 'MEJIA', 'H'),
(650, '4', '7', '6', 'PUNTA DE BOMBON', 'H'),
(651, '4', '8', '1', 'COTAHUASI', 'H'),
(652, '4', '8', '2', 'ALCA', 'H'),
(653, '4', '8', '3', 'CHARCANA', 'H'),
(654, '4', '8', '4', 'HUAYNACOTAS', 'H'),
(655, '4', '8', '5', 'PAMPAMARCA', 'H'),
(656, '4', '8', '6', 'PUYCA', 'H'),
(657, '4', '8', '7', 'QUECHUALLA', 'H'),
(658, '4', '8', '8', 'SAYLA', 'H'),
(659, '4', '8', '9', 'TAURIA', 'H'),
(660, '4', '8', '10', 'TOMEPAMPA', 'H'),
(661, '4', '8', '11', 'TORO', 'H'),
(662, '5', '1', '1', 'AYACUCHO', 'H'),
(663, '5', '1', '2', 'ACOCRO', 'H'),
(664, '5', '1', '3', 'ACOS VINCHOS', 'H'),
(665, '5', '1', '4', 'CARMEN ALTO', 'H'),
(666, '5', '1', '5', 'CHIARA', 'H'),
(667, '5', '1', '6', 'OCROS', 'H'),
(668, '5', '1', '7', 'PACAYCASA', 'H'),
(669, '5', '1', '8', 'QUINUA', 'H'),
(670, '5', '1', '9', 'SAN JOSE DE TICLLAS', 'H'),
(671, '5', '1', '10', 'SAN JUAN BAUTISTA', 'H'),
(672, '5', '1', '11', 'SANTIAGO DE PISCHA', 'H'),
(673, '5', '1', '12', 'SOCOS', 'H'),
(674, '5', '1', '13', 'TAMBILLO', 'H'),
(675, '5', '1', '14', 'VINCHOS', 'H'),
(676, '5', '1', '15', 'JESUS NAZARENO', 'H'),
(677, '5', '2', '1', 'CANGALLO', 'H'),
(678, '5', '2', '2', 'CHUSCHI', 'H'),
(679, '5', '2', '3', 'LOS MOROCHUCOS', 'H'),
(680, '5', '2', '4', 'MARIA PARADO DE BELLIDO', 'H'),
(681, '5', '2', '5', 'PARAS', 'H'),
(682, '5', '2', '6', 'TOTOS', 'H'),
(683, '5', '3', '1', 'SANCOS', 'H'),
(684, '5', '3', '2', 'CARAPO', 'H'),
(685, '5', '3', '3', 'SACSAMARCA', 'H'),
(686, '5', '3', '4', 'SANTIAGO DE LUCANAMARCA', 'H'),
(687, '5', '4', '1', 'HUANTA', 'H'),
(688, '5', '4', '2', 'AYAHUANCO', 'H'),
(689, '5', '4', '3', 'HUAMANGUILLA', 'H'),
(690, '5', '4', '4', 'IGUAIN', 'H'),
(691, '5', '4', '5', 'LURICOCHA', 'H'),
(692, '5', '4', '6', 'SANTILLANA', 'H'),
(693, '5', '4', '7', 'SIVIA', 'H'),
(694, '5', '4', '8', 'LLOCHEGUA', 'H'),
(695, '5', '5', '1', 'SAN MIGUEL', 'H'),
(696, '5', '5', '2', 'ANCO', 'H'),
(697, '5', '5', '3', 'AYNA', 'H'),
(698, '5', '5', '4', 'CHILCAS', 'H'),
(699, '5', '5', '5', 'CHUNGUI', 'H'),
(700, '5', '5', '6', 'LUIS CARRANZA', 'H'),
(701, '5', '5', '7', 'SANTA ROSA', 'H'),
(702, '5', '5', '8', 'TAMBO', 'H'),
(703, '5', '6', '1', 'PUQUIO', 'H'),
(704, '5', '6', '2', 'AUCARA', 'H'),
(705, '5', '6', '3', 'CABANA', 'H'),
(706, '5', '6', '4', 'CARMEN SALCEDO', 'H'),
(707, '5', '6', '5', 'CHAVIÃƒ?A', 'H'),
(708, '5', '6', '6', 'CHIPAO', 'H'),
(709, '5', '6', '7', 'HUAC-HUAS', 'H'),
(710, '5', '6', '8', 'LARAMATE', 'H'),
(711, '5', '6', '9', 'LEONCIO PRADO', 'H'),
(712, '5', '6', '10', 'LLAUTA', 'H'),
(713, '5', '6', '11', 'LUCANAS', 'H'),
(714, '5', '6', '12', 'OCAÃƒ?A', 'H'),
(715, '5', '6', '13', 'OTOCA', 'H'),
(716, '5', '6', '14', 'SAISA', 'H'),
(717, '5', '6', '15', 'SAN CRISTOBAL', 'H'),
(718, '5', '6', '16', 'SAN JUAN', 'H'),
(719, '5', '6', '17', 'SAN PEDRO', 'H'),
(720, '5', '6', '18', 'SAN PEDRO DE PALCO', 'H'),
(721, '5', '6', '19', 'SANCOS', 'H'),
(722, '5', '6', '20', 'SANTA ANA DE HUAYCAHUACHO', 'H'),
(723, '5', '6', '21', 'SANTA LUCIA', 'H'),
(724, '5', '7', '1', 'CORACORA', 'H'),
(725, '5', '7', '2', 'CHUMPI', 'H'),
(726, '5', '7', '3', 'CORONEL CASTAÃƒ?EDA', 'H'),
(727, '5', '7', '4', 'PACAPAUSA', 'H'),
(728, '5', '7', '5', 'PULLO', 'H'),
(729, '5', '7', '6', 'PUYUSCA', 'H'),
(730, '5', '7', '7', 'SAN FRANCISCO DE RAVACAYCO', 'H'),
(731, '5', '7', '8', 'UPAHUACHO', 'H'),
(732, '5', '8', '1', 'PAUSA', 'H'),
(733, '5', '8', '2', 'COLTA', 'H'),
(734, '5', '8', '3', 'CORCULLA', 'H'),
(735, '5', '8', '4', 'LAMPA', 'H'),
(736, '5', '8', '5', 'MARCABAMBA', 'H'),
(737, '5', '8', '6', 'OYOLO', 'H'),
(738, '5', '8', '7', 'PARARCA', 'H'),
(739, '5', '8', '8', 'SAN JAVIER DE ALPABAMBA', 'H'),
(740, '5', '8', '9', 'SAN JOSE DE USHUA', 'H'),
(741, '5', '8', '10', 'SARA SARA', 'H'),
(742, '5', '9', '1', 'QUEROBAMBA', 'H'),
(743, '5', '9', '2', 'BELEN', 'H'),
(744, '5', '9', '3', 'CHALCOS', 'H'),
(745, '5', '9', '4', 'CHILCAYOC', 'H'),
(746, '5', '9', '5', 'HUACAÃƒ?A', 'H'),
(747, '5', '9', '6', 'MORCOLLA', 'H'),
(748, '5', '9', '7', 'PAICO', 'H'),
(749, '5', '9', '8', 'SAN PEDRO DE LARCAY', 'H'),
(750, '5', '9', '9', 'SAN SALVADOR DE QUIJE', 'H'),
(751, '5', '9', '10', 'SANTIAGO DE PAUCARAY', 'H'),
(752, '5', '9', '11', 'SORAS', 'H'),
(753, '5', '10', '1', 'HUANCAPI', 'H'),
(754, '5', '10', '2', 'ALCAMENCA', 'H'),
(755, '5', '10', '3', 'APONGO', 'H'),
(756, '5', '10', '4', 'ASQUIPATA', 'H'),
(757, '5', '10', '5', 'CANARIA', 'H'),
(758, '5', '10', '6', 'CAYARA', 'H'),
(759, '5', '10', '7', 'COLCA', 'H'),
(760, '5', '10', '8', 'HUAMANQUIQUIA', 'H'),
(761, '5', '10', '9', 'HUANCARAYLLA', 'H'),
(762, '5', '10', '10', 'HUAYA', 'H'),
(763, '5', '10', '11', 'SARHUA', 'H'),
(764, '5', '10', '12', 'VILCANCHOS', 'H'),
(765, '5', '11', '1', 'VILCAS HUAMAN', 'H'),
(766, '5', '11', '2', 'ACCOMARCA', 'H'),
(767, '5', '11', '3', 'CARHUANCA', 'H'),
(768, '5', '11', '4', 'CONCEPCION', 'H'),
(769, '5', '11', '5', 'HUAMBALPA', 'H'),
(770, '5', '11', '6', 'INDEPENDENCIA', 'H'),
(771, '5', '11', '7', 'SAURAMA', 'H'),
(772, '5', '11', '8', 'VISCHONGO', 'H'),
(773, '6', '1', '1', 'CAJAMARCA', 'H'),
(774, '6', '1', '2', 'ASUNCION', 'H'),
(775, '6', '1', '3', 'CHETILLA', 'H'),
(776, '6', '1', '4', 'COSPAN', 'H'),
(777, '6', '1', '5', 'ENCAÃƒ?ADA', 'H'),
(778, '6', '1', '6', 'JESUS', 'H'),
(779, '6', '1', '7', 'LLACANORA', 'H'),
(780, '6', '1', '8', 'LOS BAÃƒ?OS DEL INCA', 'H'),
(781, '6', '1', '9', 'MAGDALENA', 'H'),
(782, '6', '1', '10', 'MATARA', 'H'),
(783, '6', '1', '11', 'NAMORA', 'H'),
(784, '6', '1', '12', 'SAN JUAN', 'H'),
(785, '6', '2', '1', 'CAJABAMBA', 'H'),
(786, '6', '2', '2', 'CACHACHI', 'H'),
(787, '6', '2', '3', 'CONDEBAMBA', 'H'),
(788, '6', '2', '4', 'SITACOCHA', 'H'),
(789, '6', '3', '1', 'CELENDIN', 'H'),
(790, '6', '3', '2', 'CHUMUCH', 'H'),
(791, '6', '3', '3', 'CORTEGANA', 'H'),
(792, '6', '3', '4', 'HUASMIN', 'H'),
(793, '6', '3', '5', 'JORGE CHAVEZ', 'H'),
(794, '6', '3', '6', 'JOSE GALVEZ', 'H'),
(795, '6', '3', '7', 'MIGUEL IGLESIAS', 'H'),
(796, '6', '3', '8', 'OXAMARCA', 'H'),
(797, '6', '3', '9', 'SOROCHUCO', 'H'),
(798, '6', '3', '10', 'SUCRE', 'H'),
(799, '6', '3', '11', 'UTCO', 'H'),
(800, '6', '3', '12', 'LA LIBERTAD DE PALLAN', 'H'),
(801, '6', '4', '1', 'CHOTA', 'H'),
(802, '6', '4', '2', 'ANGUIA', 'H'),
(803, '6', '4', '3', 'CHADIN', 'H'),
(804, '6', '4', '4', 'CHIGUIRIP', 'H'),
(805, '6', '4', '5', 'CHIMBAN', 'H'),
(806, '6', '4', '6', 'CHOROPAMPA', 'H'),
(807, '6', '4', '7', 'COCHABAMBA', 'H'),
(808, '6', '4', '8', 'CONCHAN', 'H'),
(809, '6', '4', '9', 'HUAMBOS', 'H'),
(810, '6', '4', '10', 'LAJAS', 'H'),
(811, '6', '4', '11', 'LLAMA', 'H'),
(812, '6', '4', '12', 'MIRACOSTA', 'H'),
(813, '6', '4', '13', 'PACCHA', 'H'),
(814, '6', '4', '14', 'PION', 'H'),
(815, '6', '4', '15', 'QUEROCOTO', 'H'),
(816, '6', '4', '16', 'SAN JUAN DE LICUPIS', 'H'),
(817, '6', '4', '17', 'TACABAMBA', 'H'),
(818, '6', '4', '18', 'TOCMOCHE', 'H'),
(819, '6', '4', '19', 'CHALAMARCA', 'H'),
(820, '6', '5', '1', 'CONTUMAZA', 'H'),
(821, '6', '5', '2', 'CHILETE', 'H'),
(822, '6', '5', '3', 'CUPISNIQUE', 'H'),
(823, '6', '5', '4', 'GUZMANGO', 'H'),
(824, '6', '5', '5', 'SAN BENITO', 'H'),
(825, '6', '5', '6', 'SANTA CRUZ DE TOLED', 'H'),
(826, '6', '5', '7', 'TANTARICA', 'H'),
(827, '6', '5', '8', 'YONAN', 'H'),
(828, '6', '6', '1', 'CUTERVO', 'H'),
(829, '6', '6', '2', 'CALLAYUC', 'H'),
(830, '6', '6', '3', 'CHOROS', 'H'),
(831, '6', '6', '4', 'CUJILLO', 'H'),
(832, '6', '6', '5', 'LA RAMADA', 'H'),
(833, '6', '6', '6', 'PIMPINGOS', 'H'),
(834, '6', '6', '7', 'QUEROCOTILLO', 'H'),
(835, '6', '6', '8', 'SAN ANDRES DE CUTERVO', 'H'),
(836, '6', '6', '9', 'SAN JUAN DE CUTERVO', 'H'),
(837, '6', '6', '10', 'SAN LUIS DE LUCMA', 'H'),
(838, '6', '6', '11', 'SANTA CRUZ', 'H'),
(839, '6', '6', '12', 'SANTO DOMINGO DE LA CAPILLA', 'H'),
(840, '6', '6', '13', 'SANTO TOMAS', 'H'),
(841, '6', '6', '14', 'SOCOTA', 'H'),
(842, '6', '6', '15', 'TORIBIO CASANOVA', 'H'),
(843, '6', '7', '1', 'BAMBAMARCA', 'H'),
(844, '6', '7', '2', 'CHUGUR', 'H'),
(845, '6', '7', '3', 'HUALGAYOC', 'H'),
(846, '6', '8', '1', 'JAEN', 'H'),
(847, '6', '8', '2', 'BELLAVISTA', 'H'),
(848, '6', '8', '3', 'CHONTALI', 'H'),
(849, '6', '8', '4', 'COLASAY', 'H'),
(850, '6', '8', '5', 'HUABAL', 'H'),
(851, '6', '8', '6', 'LAS PIRIAS', 'H'),
(852, '6', '8', '7', 'POMAHUACA', 'H'),
(853, '6', '8', '8', 'PUCARA', 'H'),
(854, '6', '8', '9', 'SALLIQUE', 'H'),
(855, '6', '8', '10', 'SAN FELIPE', 'H'),
(856, '6', '8', '11', 'SAN JOSE DEL ALTO', 'H'),
(857, '6', '8', '12', 'SANTA ROSA', 'H'),
(858, '6', '9', '1', 'SAN IGNACIO', 'H'),
(859, '6', '9', '2', 'CHIRINOS', 'H'),
(860, '6', '9', '3', 'HUARANGO', 'H'),
(861, '6', '9', '4', 'LA COIPA', 'H'),
(862, '6', '9', '5', 'NAMBALLE', 'H'),
(863, '6', '9', '6', 'SAN JOSE DE LOURDES', 'H'),
(864, '6', '9', '7', 'TABACONAS', 'H'),
(865, '6', '10', '1', 'PEDRO GALVEZ', 'H'),
(866, '6', '10', '2', 'CHANCAY', 'H'),
(867, '6', '10', '3', 'EDUARDO VILLANUEVA', 'H'),
(868, '6', '10', '4', 'GREGORIO PITA', 'H'),
(869, '6', '10', '5', 'ICHOCAN', 'H'),
(870, '6', '10', '6', 'JOSE MANUEL QUIROZ', 'H'),
(871, '6', '10', '7', 'JOSE SABOGAL', 'H'),
(872, '6', '11', '1', 'SAN MIGUEL', 'H'),
(873, '6', '11', '2', 'BOLIVAR', 'H'),
(874, '6', '11', '3', 'CALQUIS', 'H'),
(875, '6', '11', '4', 'CATILLUC', 'H'),
(876, '6', '11', '5', 'EL PRADO', 'H'),
(877, '6', '11', '6', 'LA FLORIDA', 'H'),
(878, '6', '11', '7', 'LLAPA', 'H'),
(879, '6', '11', '8', 'NANCHOC', 'H'),
(880, '6', '11', '9', 'NIEPOS', 'H'),
(881, '6', '11', '10', 'SAN GREGORIO', 'H'),
(882, '6', '11', '11', 'SAN SILVESTRE DE COCHAN', 'H'),
(883, '6', '11', '12', 'TONGOD', 'H'),
(884, '6', '11', '13', 'UNION AGUA BLANCA', 'H'),
(885, '6', '12', '1', 'SAN PABLO', 'H'),
(886, '6', '12', '2', 'SAN BERNARDINO', 'H'),
(887, '6', '12', '3', 'SAN LUIS', 'H'),
(888, '6', '12', '4', 'TUMBADEN', 'H'),
(889, '6', '13', '1', 'SANTA CRUZ', 'H'),
(890, '6', '13', '2', 'ANDABAMBA', 'H'),
(891, '6', '13', '3', 'CATACHE', 'H'),
(892, '6', '13', '4', 'CHANCAYBAÃƒ?OS', 'H'),
(893, '6', '13', '5', 'LA ESPERANZA', 'H'),
(894, '6', '13', '6', 'NINABAMBA', 'H'),
(895, '6', '13', '7', 'PULAN', 'H'),
(896, '6', '13', '8', 'SAUCEPAMPA', 'H'),
(897, '6', '13', '9', 'SEXI', 'H'),
(898, '6', '13', '10', 'UTICYACU', 'H'),
(899, '6', '13', '11', 'YAUYUCAN', 'H'),
(900, '7', '1', '1', 'CALLAO', 'H'),
(901, '7', '1', '2', 'BELLAVISTA', 'H'),
(902, '7', '1', '3', 'CARMEN DE LA LEGUA REYNOSO', 'H'),
(903, '7', '1', '4', 'LA PERLA', 'H'),
(904, '7', '1', '5', 'LA PUNTA', 'H'),
(905, '7', '1', '6', 'VENTANILLA', 'H'),
(906, '8', '1', '1', 'CUSCO', 'H'),
(907, '8', '1', '2', 'CCORCA', 'H'),
(908, '8', '1', '3', 'POROY', 'H'),
(909, '8', '1', '4', 'SAN JERONIMO', 'H'),
(910, '8', '1', '5', 'SAN SEBASTIAN', 'H'),
(911, '8', '1', '6', 'SANTIAGO', 'H'),
(912, '8', '1', '7', 'SAYLLA', 'H'),
(913, '8', '1', '8', 'WANCHAQ', 'H'),
(914, '8', '2', '1', 'ACOMAYO', 'H'),
(915, '8', '2', '2', 'ACOPIA', 'H'),
(916, '8', '2', '3', 'ACOS', 'H'),
(917, '8', '2', '4', 'MOSOC LLACTA', 'H'),
(918, '8', '2', '5', 'POMACANCHI', 'H'),
(919, '8', '2', '6', 'RONDOCAN', 'H'),
(920, '8', '2', '7', 'SANGARARA', 'H'),
(921, '8', '3', '1', 'ANTA', 'H'),
(922, '8', '3', '2', 'ANCAHUASI', 'H'),
(923, '8', '3', '3', 'CACHIMAYO', 'H'),
(924, '8', '3', '4', 'CHINCHAYPUJIO', 'H'),
(925, '8', '3', '5', 'HUAROCONDO', 'H'),
(926, '8', '3', '6', 'LIMATAMBO', 'H'),
(927, '8', '3', '7', 'MOLLEPATA', 'H'),
(928, '8', '3', '8', 'PUCYURA', 'H'),
(929, '8', '3', '9', 'ZURITE', 'H'),
(930, '8', '4', '1', 'CALCA', 'H'),
(931, '8', '4', '2', 'COYA', 'H'),
(932, '8', '4', '3', 'LAMAY', 'H'),
(933, '8', '4', '4', 'LARES', 'H'),
(934, '8', '4', '5', 'PISAC', 'H'),
(935, '8', '4', '6', 'SAN SALVADOR', 'H'),
(936, '8', '4', '7', 'TARAY', 'H'),
(937, '8', '4', '8', 'YANATILE', 'H'),
(938, '8', '5', '1', 'YANAOCA', 'H'),
(939, '8', '5', '2', 'CHECCA', 'H'),
(940, '8', '5', '3', 'KUNTURKANKI', 'H'),
(941, '8', '5', '4', 'LANGUI', 'H'),
(942, '8', '5', '5', 'LAYO', 'H'),
(943, '8', '5', '6', 'PAMPAMARCA', 'H'),
(944, '8', '5', '7', 'QUEHUE', 'H'),
(945, '8', '5', '8', 'TUPAC AMARU', 'H'),
(946, '8', '6', '1', 'SICUANI', 'H'),
(947, '8', '6', '2', 'CHECACUPE', 'H'),
(948, '8', '6', '3', 'COMBAPATA', 'H'),
(949, '8', '6', '4', 'MARANGANI', 'H'),
(950, '8', '6', '5', 'PITUMARCA', 'H'),
(951, '8', '6', '6', 'SAN PABLO', 'H'),
(952, '8', '6', '7', 'SAN PEDRO', 'H'),
(953, '8', '6', '8', 'TINTA', 'H'),
(954, '8', '7', '1', 'SANTO TOMAS', 'H'),
(955, '8', '7', '2', 'CAPACMARCA', 'H'),
(956, '8', '7', '3', 'CHAMACA', 'H'),
(957, '8', '7', '4', 'COLQUEMARCA', 'H'),
(958, '8', '7', '5', 'LIVITACA', 'H'),
(959, '8', '7', '6', 'LLUSCO', 'H'),
(960, '8', '7', '7', 'QUIÃƒ?OTA', 'H'),
(961, '8', '7', '8', 'VELILLE', 'H'),
(962, '8', '8', '1', 'ESPINAR', 'H'),
(963, '8', '8', '2', 'CONDOROMA', 'H'),
(964, '8', '8', '3', 'COPORAQUE', 'H'),
(965, '8', '8', '4', 'OCORURO', 'H'),
(966, '8', '8', '5', 'PALLPATA', 'H'),
(967, '8', '8', '6', 'PICHIGUA', 'H'),
(968, '8', '8', '7', 'SUYCKUTAMBO', 'H'),
(969, '8', '8', '8', 'ALTO PICHIGUA', 'H'),
(970, '8', '9', '1', 'SANTA ANA', 'H'),
(971, '8', '9', '2', 'ECHARATE', 'H'),
(972, '8', '9', '3', 'HUAYOPATA', 'H'),
(973, '8', '9', '4', 'MARANURA', 'H'),
(974, '8', '9', '5', 'OCOBAMBA', 'H'),
(975, '8', '9', '6', 'QUELLOUNO', 'H'),
(976, '8', '9', '7', 'KIMBIRI', 'H'),
(977, '8', '9', '8', 'SANTA TERESA', 'H'),
(978, '8', '9', '9', 'VILCABAMBA', 'H'),
(979, '8', '9', '10', 'PICHARI', 'H'),
(980, '8', '10', '1', 'PARURO', 'H'),
(981, '8', '10', '2', 'ACCHA', 'H'),
(982, '8', '10', '3', 'CCAPI', 'H'),
(983, '8', '10', '4', 'COLCHA', 'H'),
(984, '8', '10', '5', 'HUANOQUITE', 'H'),
(985, '8', '10', '6', 'OMACHA', 'H'),
(986, '8', '10', '7', 'PACCARITAMBO', 'H'),
(987, '8', '10', '8', 'PILLPINTO', 'H'),
(988, '8', '10', '9', 'YAURISQUE', 'H'),
(989, '8', '11', '1', 'PAUCARTAMBO', 'H'),
(990, '8', '11', '2', 'CAICAY', 'H'),
(991, '8', '11', '3', 'CHALLABAMBA', 'H'),
(992, '8', '11', '4', 'COLQUEPATA', 'H'),
(993, '8', '11', '5', 'HUANCARANI', 'H'),
(994, '8', '11', '6', 'KOSÃƒ?IPATA', 'H'),
(995, '8', '12', '1', 'URCOS', 'H'),
(996, '8', '12', '2', 'ANDAHUAYLILLAS', 'H'),
(997, '8', '12', '3', 'CAMANTI', 'H'),
(998, '8', '12', '4', 'CCARHUAYO', 'H'),
(999, '8', '12', '5', 'CCATCA', 'H'),
(1000, '8', '12', '6', 'CUSIPATA', 'H'),
(1001, '8', '12', '7', 'HUARO', 'H'),
(1002, '8', '12', '8', 'LUCRE', 'H'),
(1003, '8', '12', '9', 'MARCAPATA', 'H'),
(1004, '8', '12', '10', 'OCONGATE', 'H'),
(1005, '8', '12', '11', 'OROPESA', 'H'),
(1006, '8', '12', '12', 'QUIQUIJANA', 'H'),
(1007, '8', '13', '1', 'URUBAMBA', 'H'),
(1008, '8', '13', '2', 'CHINCHERO', 'H'),
(1009, '8', '13', '3', 'HUAYLLABAMBA', 'H'),
(1010, '8', '13', '4', 'MACHUPICCHU', 'H'),
(1011, '8', '13', '5', 'MARAS', 'H'),
(1012, '8', '13', '6', 'OLLANTAYTAMBO', 'H'),
(1013, '8', '13', '7', 'YUCAY', 'H'),
(1014, '9', '1', '1', 'HUANCAVELICA', 'H'),
(1015, '9', '1', '2', 'ACOBAMBILLA', 'H'),
(1016, '9', '1', '3', 'ACORIA', 'H'),
(1017, '9', '1', '4', 'CONAYCA', 'H'),
(1018, '9', '1', '5', 'CUENCA', 'H'),
(1019, '9', '1', '6', 'HUACHOCOLPA', 'H'),
(1020, '9', '1', '7', 'HUAYLLAHUARA', 'H'),
(1021, '9', '1', '8', 'IZCUCHACA', 'H'),
(1022, '9', '1', '9', 'LARIA', 'H'),
(1023, '9', '1', '10', 'MANTA', 'H'),
(1024, '9', '1', '11', 'MARISCAL CACERES', 'H'),
(1025, '9', '1', '12', 'MOYA', 'H'),
(1026, '9', '1', '13', 'NUEVO OCCORO', 'H'),
(1027, '9', '1', '14', 'PALCA', 'H'),
(1028, '9', '1', '15', 'PILCHACA', 'H'),
(1029, '9', '1', '16', 'VILCA', 'H'),
(1030, '9', '1', '17', 'YAULI', 'H'),
(1031, '9', '1', '18', 'ASCENSION', 'H'),
(1032, '9', '1', '19', 'HUANDO', 'H'),
(1033, '9', '2', '1', 'ACOBAMBA', 'H'),
(1034, '9', '2', '2', 'ANDABAMBA', 'H'),
(1035, '9', '2', '3', 'ANTA', 'H'),
(1036, '9', '2', '4', 'CAJA', 'H'),
(1037, '9', '2', '5', 'MARCAS', 'H'),
(1038, '9', '2', '6', 'PAUCARA', 'H'),
(1039, '9', '2', '7', 'POMACOCHA', 'H'),
(1040, '9', '2', '8', 'ROSARIO', 'H'),
(1041, '9', '3', '1', 'LIRCAY', 'H'),
(1042, '9', '3', '2', 'ANCHONGA', 'H'),
(1043, '9', '3', '3', 'CALLANMARCA', 'H'),
(1044, '9', '3', '4', 'CCOCHACCASA', 'H'),
(1045, '9', '3', '5', 'CHINCHO', 'H'),
(1046, '9', '3', '6', 'CONGALLA', 'H'),
(1047, '9', '3', '7', 'HUANCA-HUANCA', 'H'),
(1048, '9', '3', '8', 'HUAYLLAY GRANDE', 'H'),
(1049, '9', '3', '9', 'JULCAMARCA', 'H'),
(1050, '9', '3', '10', 'SAN ANTONIO DE ANTAPARCO', 'H'),
(1051, '9', '3', '11', 'SANTO TOMAS DE PATA', 'H'),
(1052, '9', '3', '12', 'SECCLLA', 'H'),
(1053, '9', '4', '1', 'CASTROVIRREYNA', 'H'),
(1054, '9', '4', '2', 'ARMA', 'H'),
(1055, '9', '4', '3', 'AURAHUA', 'H'),
(1056, '9', '4', '4', 'CAPILLAS', 'H'),
(1057, '9', '4', '5', 'CHUPAMARCA', 'H'),
(1058, '9', '4', '6', 'COCAS', 'H'),
(1059, '9', '4', '7', 'HUACHOS', 'H'),
(1060, '9', '4', '8', 'HUAMATAMBO', 'H'),
(1061, '9', '4', '9', 'MOLLEPAMPA', 'H'),
(1062, '9', '4', '10', 'SAN JUAN', 'H'),
(1063, '9', '4', '11', 'SANTA ANA', 'H'),
(1064, '9', '4', '12', 'TANTARA', 'H'),
(1065, '9', '4', '13', 'TICRAPO', 'H'),
(1066, '9', '5', '1', 'CHURCAMPA', 'H'),
(1067, '9', '5', '2', 'ANCO', 'H'),
(1068, '9', '5', '3', 'CHINCHIHUASI', 'H'),
(1069, '9', '5', '4', 'EL CARMEN', 'H'),
(1070, '9', '5', '5', 'LA MERCED', 'H'),
(1071, '9', '5', '6', 'LOCROJA', 'H'),
(1072, '9', '5', '7', 'PAUCARBAMBA', 'H'),
(1073, '9', '5', '8', 'SAN MIGUEL DE MAYOCC', 'H'),
(1074, '9', '5', '9', 'SAN PEDRO DE CORIS', 'H'),
(1075, '9', '5', '10', 'PACHAMARCA', 'H'),
(1076, '9', '6', '1', 'HUAYTARA', 'H'),
(1077, '9', '6', '2', 'AYAVI', 'H'),
(1078, '9', '6', '3', 'CORDOVA', 'H'),
(1079, '9', '6', '4', 'HUAYACUNDO ARMA', 'H'),
(1080, '9', '6', '5', 'LARAMARCA', 'H'),
(1081, '9', '6', '6', 'OCOYO', 'H'),
(1082, '9', '6', '7', 'PILPICHACA', 'H'),
(1083, '9', '6', '8', 'QUERCO', 'H'),
(1084, '9', '6', '9', 'QUITO-ARMA', 'H'),
(1085, '9', '6', '10', 'SAN ANTONIO DE CUSICANCHA', 'H'),
(1086, '9', '6', '11', 'SAN FRANCISCO DE SANGAYAICO', 'H'),
(1087, '9', '6', '12', 'SAN ISIDRO', 'H'),
(1088, '9', '6', '12', 'ANTIAGO DE CHOCORVOS', 'H'),
(1089, '9', '6', '14', 'SANTIAGO DE QUIRAHUARA', 'H'),
(1090, '9', '6', '15', 'SANTO DOMINGO DE CAPILLAS', 'H'),
(1091, '9', '6', '16', 'TAMBO', 'H'),
(1092, '9', '7', '1', 'PAMPAS', 'H'),
(1093, '9', '7', '2', 'ACOSTAMBO', 'H'),
(1094, '9', '7', '3', 'ACRAQUIA', 'H'),
(1095, '9', '7', '4', 'AHUAYCHA', 'H'),
(1096, '9', '7', '5', 'COLCABAMBA', 'H'),
(1097, '9', '7', '6', 'DANIEL HERNANDEZ', 'H'),
(1098, '9', '7', '7', 'HUACHOCOLPA', 'H'),
(1099, '9', '7', '9', 'HUARIBAMBA', 'H'),
(1100, '9', '7', '10', 'Ãƒ?AHUIMPUQUIO', 'H'),
(1101, '9', '7', '11', 'PAZOS', 'H'),
(1102, '9', '7', '13', 'QUISHUAR', 'H'),
(1103, '9', '7', '14', 'SALCABAMBA', 'H'),
(1104, '9', '7', '15', 'SALCAHUASI', 'H'),
(1105, '9', '7', '16', 'SAN MARCOS DE ROCCHAC', 'H'),
(1106, '9', '7', '17', 'SURCUBAMBA', 'H'),
(1107, '9', '7', '18', 'TINTAY PUNCU', 'H'),
(1108, '10', '1', '1', 'HUANUCO', 'H'),
(1109, '10', '1', '2', 'AMARILIS', 'H'),
(1110, '10', '1', '3', 'CHINCHAO', 'H'),
(1111, '10', '1', '4', 'CHURUBAMBA', 'H'),
(1112, '10', '1', '5', 'MARGOS', 'H'),
(1113, '10', '1', '6', 'QUISQUI', 'H'),
(1114, '10', '1', '7', 'SAN FRANCISCO DE CAYRAN', 'H'),
(1115, '10', '1', '8', 'SAN PEDRO DE CHAULAN', 'H'),
(1116, '10', '1', '9', 'SANTA MARIA DEL VALLE', 'H'),
(1117, '10', '1', '10', 'YARUMAYO', 'H'),
(1118, '10', '1', '11', 'PILLCO MARCA', 'H'),
(1119, '10', '2', '1', 'AMBO', 'H'),
(1120, '10', '2', '2', 'CAYNA', 'H'),
(1121, '10', '2', '3', 'COLPAS', 'H'),
(1122, '10', '2', '4', 'CONCHAMARCA', 'H'),
(1123, '10', '2', '5', 'HUACAR', 'H'),
(1124, '10', '2', '6', 'SAN FRANCISCO', 'H'),
(1125, '10', '2', '7', 'SAN RAFAEL', 'H'),
(1126, '10', '2', '8', 'TOMAY KICHWA', 'H'),
(1127, '10', '3', '1', 'LA UNION', 'H'),
(1128, '10', '3', '7', 'CHUQUIS', 'H'),
(1129, '10', '3', '11', 'MARIAS', 'H'),
(1130, '10', '3', '13', 'PACHAS', 'H'),
(1131, '10', '3', '16', 'QUIVILLA', 'H'),
(1132, '10', '3', '17', 'RIPAN', 'H'),
(1133, '10', '3', '21', 'SHUNQUI', 'H'),
(1134, '10', '3', '22', 'SILLAPATA', 'H'),
(1135, '10', '3', '23', 'YANAS', 'H'),
(1136, '10', '4', '1', 'HUACAYBAMBA', 'H'),
(1137, '10', '4', '2', 'CANCHABAMBA', 'H'),
(1138, '10', '4', '3', 'COCHABAMBA', 'H'),
(1139, '10', '4', '4', 'PINRA', 'H'),
(1140, '10', '5', '1', 'LLATA', 'H'),
(1141, '10', '5', '2', 'ARANCAY', 'H'),
(1142, '10', '5', '3', 'CHAVIN DE PARIARCA', 'H'),
(1143, '10', '5', '4', 'JACAS GRANDE', 'H'),
(1144, '10', '5', '5', 'JIRCAN', 'H'),
(1145, '10', '5', '6', 'MIRAFLORES', 'H'),
(1146, '10', '5', '7', 'MONZON', 'H'),
(1147, '10', '5', '8', 'PUNCHAO', 'H'),
(1148, '10', '5', '9', 'PUÃƒ?OS', 'H'),
(1149, '10', '5', '10', 'SINGA', 'H'),
(1150, '10', '5', '11', 'TANTAMAYO', 'H'),
(1151, '10', '6', '1', 'RUPA-RUPA', 'H'),
(1152, '10', '6', '2', 'DANIEL ALOMIAS ROBLES', 'H'),
(1153, '10', '6', '3', 'HERMILIO VALDIZAN', 'H'),
(1154, '10', '6', '4', 'JOSE CRESPO Y CASTILLO', 'H'),
(1155, '10', '6', '5', 'LUYANDO', 'H'),
(1156, '10', '6', '6', 'MARIANO DAMASO BERAUN', 'H'),
(1157, '10', '7', '1', 'HUACRACHUCO', 'H'),
(1158, '10', '7', '2', 'CHOLON', 'H'),
(1159, '10', '7', '3', 'SAN BUENAVENTURA', 'H'),
(1160, '10', '8', '1', 'PANAO', 'H'),
(1161, '10', '8', '2', 'CHAGLLA', 'H'),
(1162, '10', '8', '3', 'MOLINO', 'H'),
(1163, '10', '8', '4', 'UMARI', 'H'),
(1164, '10', '9', '1', 'PUERTO INCA', 'H'),
(1165, '10', '9', '2', 'CODO DEL POZUZO', 'H'),
(1166, '10', '9', '3', 'HONORIA', 'H'),
(1167, '10', '9', '4', 'TOURNAVISTA', 'H'),
(1168, '10', '9', '5', 'YUYAPICHIS', 'H'),
(1169, '10', '10', '1', 'JESUS', 'H'),
(1170, '10', '10', '2', 'BAÃƒ?OS', 'H'),
(1171, '10', '10', '3', 'JIVIA', 'H'),
(1172, '10', '10', '4', 'QUEROPALCA', 'H'),
(1173, '10', '10', '5', 'RONDOS', 'H'),
(1174, '10', '10', '6', 'SAN FRANCISCO DE ASIS', 'H'),
(1175, '10', '10', '7', 'SAN MIGUEL DE CAURI', 'H'),
(1176, '10', '11', '1', 'CHAVINILLO', 'H'),
(1177, '10', '11', '2', 'CAHUAC', 'H'),
(1178, '10', '11', '3', 'CHACABAMBA', 'H'),
(1179, '10', '11', '4', 'APARICIO POMARES', 'H'),
(1180, '10', '11', '5', 'JACAS CHICO', 'H'),
(1181, '10', '11', '6', 'OBAS', 'H'),
(1182, '10', '11', '7', 'PAMPAMARCA', 'H'),
(1183, '10', '11', '8', 'CHORAS', 'H'),
(1184, '11', '1', '1', 'ICA', 'H'),
(1185, '11', '1', '2', 'LA TINGUIÃƒ?A', 'H'),
(1186, '11', '1', '3', 'LOS AQUIJES', 'H'),
(1187, '11', '1', '4', 'OCUCAJE', 'H'),
(1188, '11', '1', '5', 'PACHACUTEC', 'H'),
(1189, '11', '1', '6', 'PARCONA', 'H'),
(1190, '11', '1', '7', 'PUEBLO NUEVO', 'H'),
(1191, '11', '1', '8', 'SALAS', 'H'),
(1192, '11', '1', '9', 'SAN JOSE DE LOS MOLINOS', 'H'),
(1193, '11', '1', '10', 'SAN JUAN BAUTISTA', 'H'),
(1194, '11', '1', '11', 'SANTIAGO', 'H'),
(1195, '11', '1', '12', 'SUBTANJALLA', 'H'),
(1196, '11', '1', '13', 'TATE', 'H'),
(1197, '11', '1', '14', 'YAUCA DEL ROSARIO', 'H'),
(1198, '11', '2', '1', 'CHINCHA ALTA', 'H'),
(1199, '11', '2', '2', 'ALTO LARAN', 'H'),
(1200, '11', '2', '3', 'CHAVIN', 'H'),
(1201, '11', '2', '4', 'CHINCHA BAJA', 'H'),
(1202, '11', '2', '5', 'EL CARMEN', 'H'),
(1203, '11', '2', '6', 'GROCIO PRADO', 'H'),
(1204, '11', '2', '7', 'PUEBLO NUEVO', 'H'),
(1205, '11', '2', '8', 'SAN JUAN DE YANAC', 'H'),
(1206, '11', '2', '9', 'SAN PEDRO DE HUACARPANA', 'H'),
(1207, '11', '2', '10', 'SUNAMPE', 'H'),
(1208, '11', '2', '11', 'TAMBO DE MORA', 'H'),
(1209, '11', '3', '1', 'NAZCA', 'H'),
(1210, '11', '3', '2', 'CHANGUILLO', 'H'),
(1211, '11', '3', '3', 'EL INGENIO', 'H'),
(1212, '11', '3', '4', 'MARCONA', 'H'),
(1213, '11', '3', '5', 'VISTA ALEGRE', 'H'),
(1214, '11', '4', '1', 'PALPA', 'H'),
(1215, '11', '4', '2', 'LLIPATA', 'H'),
(1216, '11', '4', '3', 'RIO GRANDE', 'H'),
(1217, '11', '4', '4', 'SANTA CRUZ', 'H'),
(1218, '11', '4', '5', 'TIBILLO', 'H'),
(1219, '11', '5', '1', 'PISCO', 'H'),
(1220, '11', '5', '2', 'HUANCANO', 'H'),
(1221, '11', '5', '3', 'HUMAY', 'H'),
(1222, '11', '5', '4', 'INDEPENDENCIA', 'H'),
(1223, '11', '5', '5', 'PARACAS', 'H'),
(1224, '11', '5', '6', 'SAN ANDRES', 'H'),
(1225, '11', '5', '7', 'SAN CLEMENTE', 'H'),
(1226, '11', '5', '8', 'TUPAC AMARU INCA', 'H'),
(1227, '12', '1', '1', 'HUANCAYO', 'H'),
(1228, '12', '1', '4', 'CARHUACALLANGA', 'H'),
(1229, '12', '1', '5', 'CHACAPAMPA', 'H'),
(1230, '12', '1', '6', 'CHICCHE', 'H'),
(1231, '12', '1', '7', 'CHILCA', 'H'),
(1232, '12', '1', '8', 'CHONGOS ALTO', 'H'),
(1233, '12', '1', '11', 'CHUPURO', 'H'),
(1234, '12', '1', '12', 'COLCA', 'H'),
(1235, '12', '1', '13', 'CULLHUAS', 'H'),
(1236, '12', '1', '14', 'EL TAMBO', 'H'),
(1237, '12', '1', '16', 'HUACRAPUQUIO', 'H'),
(1238, '12', '1', '17', 'HUALHUAS', 'H'),
(1239, '12', '1', '19', 'HUANCAN', 'H'),
(1240, '12', '1', '20', 'HUASICANCHA', 'H'),
(1241, '12', '1', '21', 'HUAYUCACHI', 'H'),
(1242, '12', '1', '22', 'INGENIO', 'H'),
(1243, '12', '1', '24', 'PARIAHUANCA', 'H'),
(1244, '12', '1', '25', 'PILCOMAYO', 'H'),
(1245, '12', '1', '26', 'PUCARA', 'H'),
(1246, '12', '1', '27', 'QUICHUAY', 'H'),
(1247, '12', '1', '28', 'QUILCAS', 'H'),
(1248, '12', '1', '29', 'SAN AGUSTIN', 'H'),
(1249, '12', '1', '30', 'SAN JERONIMO DE TUNAN', 'H'),
(1250, '12', '1', '32', 'SAÃƒ?O', 'H'),
(1251, '12', '1', '33', 'SAPALLANGA', 'H'),
(1252, '12', '1', '34', 'SICAYA', 'H'),
(1253, '12', '1', '35', 'SANTO DOMINGO DE ACOBAMBA', 'H'),
(1254, '12', '1', '36', 'VIQUES', 'H'),
(1255, '12', '2', '1', 'CONCEPCION', 'H'),
(1256, '12', '2', '2', 'ACO', 'H'),
(1257, '12', '2', '3', 'ANDAMARCA', 'H'),
(1258, '12', '2', '4', 'CHAMBARA', 'H'),
(1259, '12', '2', '5', 'COCHAS', 'H'),
(1260, '12', '2', '6', 'COMAS', 'H'),
(1261, '12', '2', '7', 'HEROINAS TOLEDO', 'H'),
(1262, '12', '2', '8', 'MANZANARES', 'H'),
(1263, '12', '2', '9', 'MARISCAL CASTILLA', 'H'),
(1264, '12', '2', '10', 'MATAHUASI', 'H'),
(1265, '12', '2', '11', 'MITO', 'H'),
(1266, '12', '2', '12', 'NUEVE DE JULIO', 'H'),
(1267, '12', '2', '13', 'ORCOTUNA', 'H'),
(1268, '12', '2', '14', 'SAN JOSE DE QUERO', 'H'),
(1269, '12', '2', '15', 'SANTA ROSA DE OCOPA', 'H'),
(1270, '12', '3', '1', 'CHANCHAMAYO', 'H'),
(1271, '12', '3', '2', 'PERENE', 'H'),
(1272, '12', '3', '3', 'PICHANAQUI', 'H'),
(1273, '12', '3', '4', 'SAN LUIS DE SHUARO', 'H'),
(1274, '12', '3', '5', 'SAN RAMON', 'H'),
(1275, '12', '3', '6', 'VITOC', 'H'),
(1276, '12', '4', '1', 'JAUJA', 'H'),
(1277, '12', '4', '2', 'ACOLLA', 'H'),
(1278, '12', '4', '3', 'APATA', 'H'),
(1279, '12', '4', '4', 'ATAURA', 'H'),
(1280, '12', '4', '5', 'CANCHAYLLO', 'H'),
(1281, '12', '4', '6', 'CURICACA', 'H'),
(1282, '12', '4', '7', 'EL MANTARO', 'H'),
(1283, '12', '4', '8', 'HUAMALI', 'H');
INSERT INTO `ubigeo` (`nUbiID`, `nUbiDepartamento`, `nUbiProvincia`, `nUbiDistrito`, `cUbiDescripcion`, `cUbiEstado`) VALUES
(1284, '12', '4', '9', 'HUARIPAMPA', 'H'),
(1285, '12', '4', '10', 'HUERTAS', 'H'),
(1286, '12', '4', '11', 'JANJAILLO', 'H'),
(1287, '12', '4', '12', 'JULCAN', 'H'),
(1288, '12', '4', '13', 'LEONOR ORDOÃ‘EZ', 'H'),
(1289, '12', '4', '14', 'LLOCLLAPAMPA', 'H'),
(1290, '12', '4', '15', 'MARCO', 'H'),
(1291, '12', '4', '16', 'MASMA', 'H'),
(1292, '12', '4', '17', 'MASMA CHICCHE', 'H'),
(1293, '12', '4', '18', 'MOLINOS', 'H'),
(1294, '12', '4', '19', 'MONOBAMBA', 'H'),
(1295, '12', '4', '20', 'MUQUI', 'H'),
(1296, '12', '4', '21', 'MUQUIYAUYO', 'H'),
(1297, '12', '4', '22', 'PACA', 'H'),
(1298, '12', '4', '23', 'PACCHA', 'H'),
(1299, '12', '4', '24', 'PANCAN', 'H'),
(1300, '12', '4', '25', 'PARCO', 'H'),
(1301, '12', '4', '26', 'POMACANCHA', 'H'),
(1302, '12', '4', '27', 'RICRAN', 'H'),
(1303, '12', '4', '28', 'SAN LORENZO', 'H'),
(1304, '12', '4', '29', 'SAN PEDRO DE CHUNAN', 'H'),
(1305, '12', '4', '30', 'SAUSA', 'H'),
(1306, '12', '4', '31', 'SINCOS', 'H'),
(1307, '12', '4', '32', 'TUNAN MARCA', 'H'),
(1308, '12', '4', '33', 'YAULI', 'H'),
(1309, '12', '4', '34', 'YAUYOS', 'H'),
(1310, '12', '5', '1', 'JUNIN', 'H'),
(1311, '12', '5', '2', 'CARHUAMAYO', 'H'),
(1312, '12', '5', '3', 'ONDORES', 'H'),
(1313, '12', '5', '4', 'ULCUMAYO', 'H'),
(1314, '12', '6', '1', 'SATIPO', 'H'),
(1315, '12', '6', '2', 'COVIRIALI', 'H'),
(1316, '12', '6', '3', 'LLAYLLA', 'H'),
(1317, '12', '6', '4', 'MAZAMARI', 'H'),
(1318, '12', '6', '5', 'PAMPA HERMOSA', 'H'),
(1319, '12', '6', '6', 'PANGOA', 'H'),
(1320, '12', '6', '7', 'RIO NEGRO', 'H'),
(1321, '12', '6', '8', 'RIO TAMBO', 'H'),
(1322, '12', '7', '1', 'TARMA', 'H'),
(1323, '12', '7', '2', 'ACOBAMBA', 'H'),
(1324, '12', '7', '3', 'HUARICOLCA', 'H'),
(1325, '12', '7', '4', 'HUASAHUASI', 'H'),
(1326, '12', '7', '5', 'LA UNION', 'H'),
(1327, '12', '7', '6', 'PALCA', 'H'),
(1328, '12', '7', '7', 'PALCAMAYO', 'H'),
(1329, '12', '7', '8', 'SAN PEDRO DE CAJAS', 'H'),
(1330, '12', '7', '9', 'TAPO', 'H'),
(1331, '12', '8', '1', 'LA OROYA', 'H'),
(1332, '12', '8', '2', 'CHACAPALPA', 'H'),
(1333, '12', '8', '3', 'HUAY-HUAY', 'H'),
(1334, '12', '8', '4', 'MARCAPOMACOCHA', 'H'),
(1335, '12', '8', '5', 'MOROCOCHA', 'H'),
(1336, '12', '8', '6', 'PACCHA', 'H'),
(1337, '12', '8', '7', 'SANTA BARBARA DE CARHUACAYAN', 'H'),
(1338, '12', '8', '8', 'SANTA ROSA DE SACCO', 'H'),
(1339, '12', '8', '9', 'SUITUCANCHA', 'H'),
(1340, '12', '8', '10', 'YAULI', 'H'),
(1341, '12', '9', '1', 'CHUPACA', 'H'),
(1342, '12', '9', '2', 'AHUAC', 'H'),
(1343, '12', '9', '3', 'CHONGOS BAJO', 'H'),
(1344, '12', '9', '4', 'HUACHAC', 'H'),
(1345, '12', '9', '5', 'HUAMANCACA CHICO', 'H'),
(1346, '12', '9', '6', 'SAN JUAN DE YSCOS', 'H'),
(1347, '12', '9', '7', 'SAN JUAN DE JARPA', 'H'),
(1348, '12', '9', '8', 'TRES DE DICIEMBRE', 'H'),
(1349, '12', '9', '9', 'YANACANCHA', 'H'),
(1350, '13', '1', '1', 'TRUJILLO', 'H'),
(1351, '13', '1', '2', 'EL PORVENIR', 'H'),
(1352, '13', '1', '3', 'FLORENCIA DE MORA', 'H'),
(1353, '13', '1', '4', 'HUANCHACO', 'H'),
(1354, '13', '1', '5', 'LA ESPERANZA', 'H'),
(1355, '13', '1', '6', 'LAREDO', 'H'),
(1356, '13', '1', '7', 'MOCHE', 'H'),
(1357, '13', '1', '8', 'POROTO', 'H'),
(1358, '13', '1', '9', 'SALAVERRY', 'H'),
(1359, '13', '1', '10', 'SIMBAL', 'H'),
(1360, '13', '1', '11', 'VICTOR LARCO HERRERA', 'H'),
(1361, '13', '2', '1', 'ASCOPE', 'H'),
(1362, '13', '2', '2', 'CHICAMA', 'H'),
(1363, '13', '2', '3', 'CHOCOPE', 'H'),
(1364, '13', '2', '4', 'MAGDALENA DE CAO', 'H'),
(1365, '13', '2', '5', 'PAIJAN', 'H'),
(1366, '13', '2', '6', 'RAZURI', 'H'),
(1367, '13', '2', '7', 'SANTIAGO DE CAO', 'H'),
(1368, '13', '2', '8', 'CASA GRANDE', 'H'),
(1369, '13', '3', '1', 'BOLIVAR', 'H'),
(1370, '13', '3', '2', 'BAMBAMARCA', 'H'),
(1371, '13', '3', '3', 'CONDORMARCA', 'H'),
(1372, '13', '3', '4', 'LONGOTEA', 'H'),
(1373, '13', '3', '5', 'UCHUMARCA', 'H'),
(1374, '13', '3', '6', 'UCUNCHA', 'H'),
(1375, '13', '4', '1', 'CHEPEN', 'H'),
(1376, '13', '4', '2', 'PACANGA', 'H'),
(1377, '13', '4', '3', 'PUEBLO NUEVO', 'H'),
(1378, '13', '5', '1', 'JULCAN', 'H'),
(1379, '13', '5', '2', 'CALAMARCA', 'H'),
(1380, '13', '5', '3', 'CARABAMBA', 'H'),
(1381, '13', '5', '4', 'HUASO', 'H'),
(1382, '13', '6', '1', 'OTUZCO', 'H'),
(1383, '13', '6', '2', 'AGALLPAMPA', 'H'),
(1384, '13', '6', '4', 'CHARAT', 'H'),
(1385, '13', '6', '5', 'HUARANCHAL', 'H'),
(1386, '13', '6', '6', 'LA CUESTA', 'H'),
(1387, '13', '6', '8', 'MACHE', 'H'),
(1388, '13', '6', '10', 'PARANDAY', 'H'),
(1389, '13', '6', '11', 'SALPO', 'H'),
(1390, '13', '6', '11', 'INSICAP', 'H'),
(1391, '13', '6', '14', 'USQUIL', 'H'),
(1392, '13', '7', '1', 'SAN PEDRO DE LLOC', 'H'),
(1393, '13', '7', '2', 'GUADALUPE', 'H'),
(1394, '13', '7', '3', 'JEQUETEPEQUE', 'H'),
(1395, '13', '7', '4', 'PACASMAYO', 'H'),
(1396, '13', '7', '5', 'SAN JOSE', 'H'),
(1397, '13', '8', '1', 'TAYABAMBA', 'H'),
(1398, '13', '8', '2', 'BULDIBUYO', 'H'),
(1399, '13', '8', '3', 'CHILLIA', 'H'),
(1400, '13', '8', '4', 'HUANCASPATA', 'H'),
(1401, '13', '8', '5', 'HUAYLILLAS', 'H'),
(1402, '13', '8', '6', 'HUAYO', 'H'),
(1403, '13', '8', '7', 'ONGON', 'H'),
(1404, '13', '8', '8', 'PARCOY', 'H'),
(1405, '13', '8', '9', 'PATAZ', 'H'),
(1406, '13', '8', '10', 'PIAS', 'H'),
(1407, '13', '8', '11', 'SANTIAGO DE CHALLAS', 'H'),
(1408, '13', '8', '12', 'TAURIJA', 'H'),
(1409, '13', '8', '13', 'URPAY', 'H'),
(1410, '13', '9', '1', 'HUAMACHUCO', 'H'),
(1411, '13', '9', '2', 'CHUGAY', 'H'),
(1412, '13', '9', '3', 'COCHORCO', 'H'),
(1413, '13', '9', '4', 'CURGOS', 'H'),
(1414, '13', '9', '5', 'MARCABAL', 'H'),
(1415, '13', '9', '6', 'SANAGORAN', 'H'),
(1416, '13', '9', '7', 'SARIN', 'H'),
(1417, '13', '9', '8', 'SARTIMBAMBA', 'H'),
(1418, '13', '10', '1', 'SANTIAGO DE CHUCO', 'H'),
(1419, '13', '10', '2', 'ANGASMARCA', 'H'),
(1420, '13', '10', '3', 'CACHICADAN', 'H'),
(1421, '13', '10', '4', 'MOLLEBAMBA', 'H'),
(1422, '13', '10', '5', 'MOLLEPATA', 'H'),
(1423, '13', '10', '6', 'QUIRUVILCA', 'H'),
(1424, '13', '10', '7', 'SANTA CRUZ DE CHUCA', 'H'),
(1425, '13', '10', '8', 'SITABAMBA', 'H'),
(1426, '13', '11', '1', 'CASCAS', 'H'),
(1427, '13', '11', '2', 'LUCMA', 'H'),
(1428, '13', '11', '3', 'COMPIN', 'H'),
(1429, '13', '11', '4', 'SAYAPULLO', 'H'),
(1430, '13', '12', '1', 'VIRU', 'H'),
(1431, '13', '12', '2', 'CHAO', 'H'),
(1432, '13', '12', '3', 'GUADALUPITO', 'H'),
(1433, '14', '1', '1', 'CHICLAYO', 'H'),
(1434, '14', '1', '2', 'CHONGOYAPE', 'H'),
(1435, '14', '1', '3', 'ETEN', 'H'),
(1436, '14', '1', '4', 'ETEN PUERTO', 'H'),
(1437, '14', '1', '5', 'JOSE LEONARDO ORTIZ', 'H'),
(1438, '14', '1', '6', 'LA VICTORIA', 'H'),
(1439, '14', '1', '7', 'LAGUNAS', 'H'),
(1440, '14', '1', '8', 'MONSEFU', 'H'),
(1441, '14', '1', '9', 'NUEVA ARICA', 'H'),
(1442, '14', '1', '10', 'OYOTUN', 'H'),
(1443, '14', '1', '11', 'PICSI', 'H'),
(1444, '14', '1', '12', 'PIMENTEL', 'H'),
(1445, '14', '1', '13', 'REQUE', 'H'),
(1446, '14', '1', '14', 'SANTA ROSA', 'H'),
(1447, '14', '1', '15', 'SAÃ‘A', 'H'),
(1448, '14', '1', '16', 'CAYALTI', 'H'),
(1449, '14', '1', '17', 'PATAPO', 'H'),
(1450, '14', '1', '18', 'POMALCA', 'H'),
(1451, '14', '1', '19', 'PUCALA', 'H'),
(1452, '14', '1', '20', 'TUMAN', 'H'),
(1453, '14', '2', '1', 'FERREÃ‘AFE', 'H'),
(1454, '14', '2', '2', 'CAÃ‘ARIS', 'H'),
(1455, '14', '2', '3', 'INCAHUASI', 'H'),
(1456, '14', '2', '4', 'MANUEL ANTONIO MESONES MURO', 'H'),
(1457, '14', '2', '5', 'PITIPO', 'H'),
(1458, '14', '2', '6', 'PUEBLO NUEVO', 'H'),
(1459, '14', '3', '1', 'LAMBAYEQUE', 'H'),
(1460, '14', '3', '2', 'CHOCHOPE', 'H'),
(1461, '14', '3', '3', 'ILLIMO', 'H'),
(1462, '14', '3', '4', 'JAYANCA', 'H'),
(1463, '14', '3', '5', 'MOCHUMI', 'H'),
(1464, '14', '3', '6', 'MORROPE', 'H'),
(1465, '14', '3', '7', 'MOTUPE', 'H'),
(1466, '14', '3', '8', 'OLMOS', 'H'),
(1467, '14', '3', '9', 'PACORA', 'H'),
(1468, '14', '3', '10', 'SALAS', 'H'),
(1469, '14', '3', '11', 'SAN JOSE', 'H'),
(1470, '14', '3', '12', 'TUCUME', 'H'),
(1471, '15', '1', '1', 'LIMA', 'H'),
(1472, '15', '1', '2', 'ANCON', 'H'),
(1473, '15', '1', '3', 'ATE', 'H'),
(1474, '15', '1', '4', 'BARRANCO', 'H'),
(1475, '15', '1', '5', 'BREÃ‘A', 'H'),
(1476, '15', '1', '6', 'CARABAYLLO', 'H'),
(1477, '15', '1', '7', 'CHACLACAYO', 'H'),
(1478, '15', '1', '8', 'CHORRILLOS', 'H'),
(1479, '15', '1', '9', 'CIENEGUILLA', 'H'),
(1480, '15', '1', '10', 'COMAS', 'H'),
(1481, '15', '1', '11', 'EL AGUSTINO', 'H'),
(1482, '15', '1', '12', 'INDEPENDENCIA', 'H'),
(1483, '15', '1', '13', 'JESUS MARIA', 'H'),
(1484, '15', '1', '14', 'LA MOLINA', 'H'),
(1485, '15', '1', '15', 'LA VICTORIA', 'H'),
(1486, '15', '1', '16', 'LINCE', 'H'),
(1487, '15', '1', '17', 'LOS OLIVOS', 'H'),
(1488, '15', '1', '18', 'LURIGANCHO', 'H'),
(1489, '15', '1', '19', 'LURIN', 'H'),
(1490, '15', '1', '20', 'MAGDALENA DEL MAR', 'H'),
(1491, '15', '1', '21', 'MAGDALENA VIEJA', 'H'),
(1492, '15', '1', '22', 'MIRAFLORES', 'H'),
(1493, '15', '1', '23', 'PACHACAMAC', 'H'),
(1494, '15', '1', '24', 'PUCUSANA', 'H'),
(1495, '15', '1', '25', 'PUENTE PIEDRA', 'H'),
(1496, '15', '1', '26', 'PUNTA HERMOSA', 'H'),
(1497, '15', '1', '27', 'PUNTA NEGRA', 'H'),
(1498, '15', '1', '28', 'RIMAC', 'H'),
(1499, '15', '1', '29', 'SAN BARTOLO', 'H'),
(1500, '15', '1', '30', 'SAN BORJA', 'H'),
(1501, '15', '1', '31', 'SAN ISIDRO', 'H'),
(1502, '15', '1', '32', 'SAN JUAN DE LURIGANCHO', 'H'),
(1503, '15', '1', '33', 'SAN JUAN DE MIRAFLORES', 'H'),
(1504, '15', '1', '34', 'SAN LUIS', 'H'),
(1505, '15', '1', '35', 'SAN MARTIN DE PORRES', 'H'),
(1506, '15', '1', '36', 'SAN MIGUEL', 'H'),
(1507, '15', '1', '37', 'SANTA ANITA', 'H'),
(1508, '15', '1', '38', 'SANTA MARIA DEL MAR', 'H'),
(1509, '15', '1', '39', 'SANTA ROSA', 'H'),
(1510, '15', '1', '40', 'SANTIAGO DE SURCO', 'H'),
(1511, '15', '1', '41', 'SURQUILLO', 'H'),
(1512, '15', '1', '42', 'VILLA EL SALVADOR', 'H'),
(1513, '15', '1', '43', 'VILLA MARIA DEL TRIUNFO', 'H'),
(1514, '15', '2', '1', 'BARRANCA', 'H'),
(1515, '15', '2', '2', 'PARAMONGA', 'H'),
(1516, '15', '2', '3', 'PATIVILCA', 'H'),
(1517, '15', '2', '4', 'SUPE', 'H'),
(1518, '15', '2', '5', 'SUPE PUERTO', 'H'),
(1519, '15', '3', '1', 'CAJATAMBO', 'H'),
(1520, '15', '3', '2', 'COPA', 'H'),
(1521, '15', '3', '3', 'GORGOR', 'H'),
(1522, '15', '3', '4', 'HUANCAPON', 'H'),
(1523, '15', '3', '5', 'MANAS', 'H'),
(1524, '15', '4', '1', 'CANTA', 'H'),
(1525, '15', '4', '2', 'ARAHUAY', 'H'),
(1526, '15', '4', '3', 'HUAMANTANGA', 'H'),
(1527, '15', '4', '4', 'HUAROS', 'H'),
(1528, '15', '4', '5', 'LACHAQUI', 'H'),
(1529, '15', '4', '6', 'SAN BUENAVENTURA', 'H'),
(1530, '15', '4', '7', 'SANTA ROSA DE QUIVES', 'H'),
(1531, '15', '5', '1', 'SAN VICENTE DE CAÃ‘ETE', 'H'),
(1532, '15', '5', '2', 'ASIA', 'H'),
(1533, '15', '5', '3', 'CALANGO', 'H'),
(1534, '15', '5', '4', 'CERRO AZUL', 'H'),
(1535, '15', '5', '5', 'CHILCA', 'H'),
(1536, '15', '5', '6', 'COAYLLO', 'H'),
(1537, '15', '5', '7', 'IMPERIAL', 'H'),
(1538, '15', '5', '8', 'LUNAHUANA', 'H'),
(1539, '15', '5', '9', 'MALA', 'H'),
(1540, '15', '5', '10', 'NUEVO IMPERIAL', 'H'),
(1541, '15', '5', '11', 'PACARAN', 'H'),
(1542, '15', '5', '12', 'QUILMANA', 'H'),
(1543, '15', '5', '13', 'SAN ANTONIO', 'H'),
(1544, '15', '5', '14', 'SAN LUIS', 'H'),
(1545, '15', '5', '15', 'SANTA CRUZ DE FLORES', 'H'),
(1546, '15', '5', '16', 'ZUÃ‘IGA', 'H'),
(1547, '15', '6', '1', 'HUARAL', 'H'),
(1548, '15', '6', '2', 'ATAVILLOS ALTO', 'H'),
(1549, '15', '6', '3', 'ATAVILLOS BAJO', 'H'),
(1550, '15', '6', '4', 'AUCALLAMA', 'H'),
(1551, '15', '6', '5', 'CHANCAY', 'H'),
(1552, '15', '6', '6', 'IHUARI', 'H'),
(1553, '15', '6', '7', 'LAMPIAN', 'H'),
(1554, '15', '6', '8', 'PACARAOS', 'H'),
(1555, '15', '6', '9', 'SAN MIGUEL DE ACOS', 'H'),
(1556, '15', '6', '10', 'SANTA CRUZ DE ANDAMARCA', 'H'),
(1557, '15', '6', '11', 'SUMBILCA', 'H'),
(1558, '15', '6', '12', 'VEINTISIETE DE NOVIEMBRE', 'H'),
(1559, '15', '7', '1', 'MATUCANA', 'H'),
(1560, '15', '7', '2', 'ANTIOQUIA', 'H'),
(1561, '15', '7', '3', 'CALLAHUANCA', 'H'),
(1562, '15', '7', '4', 'CARAMPOMA', 'H'),
(1563, '15', '7', '5', 'CHICLA', 'H'),
(1564, '15', '7', '6', 'CUENCA', 'H'),
(1565, '15', '7', '7', 'HUACHUPAMPA', 'H'),
(1566, '15', '7', '8', 'HUANZA', 'H'),
(1567, '15', '7', '9', 'HUAROCHIRI', 'H'),
(1568, '15', '7', '10', 'LAHUAYTAMBO', 'H'),
(1569, '15', '7', '11', 'LANGA', 'H'),
(1570, '15', '7', '12', 'LARAOS', 'H'),
(1571, '15', '7', '13', 'MARIATANA', 'H'),
(1572, '15', '7', '14', 'RICARDO PALMA', 'H'),
(1573, '15', '7', '15', 'SAN ANDRES DE TUPICOCHA', 'H'),
(1574, '15', '7', '16', 'SAN ANTONIO', 'H'),
(1575, '15', '7', '17', 'SAN BARTOLOME', 'H'),
(1576, '15', '7', '18', 'SAN DAMIAN', 'H'),
(1577, '15', '7', '19', 'SAN JUAN DE IRIS', 'H'),
(1578, '15', '7', '20', 'SAN JUAN DE TANTARANCHE', 'H'),
(1579, '15', '7', '21', 'SAN LORENZO DE QUINTI', 'H'),
(1580, '15', '7', '22', 'SAN MATEO', 'H'),
(1581, '15', '7', '23', 'SAN MATEO DE OTAO', 'H'),
(1582, '15', '7', '24', 'SAN PEDRO DE CASTA', 'H'),
(1583, '15', '7', '25', 'SAN PEDRO DE HUANCAYRE', 'H'),
(1584, '15', '7', '26', 'SANGALLAYA', 'H'),
(1585, '15', '7', '27', 'SANTA CRUZ DE COCACHACRA', 'H'),
(1586, '15', '7', '28', 'SANTA EULALIA', 'H'),
(1587, '15', '7', '29', 'SANTIAGO DE ANCHUCAYA', 'H'),
(1588, '15', '7', '30', 'SANTIAGO DE TUNA', 'H'),
(1589, '15', '7', '31', 'SANTO DOMINGO DE LOS OLLEROS', 'H'),
(1590, '15', '7', '32', 'SURCO', 'H'),
(1591, '15', '8', '1', 'HUACHO', 'H'),
(1592, '15', '8', '2', 'AMBAR', 'H'),
(1593, '15', '8', '3', 'CALETA DE CARQUIN', 'H'),
(1594, '15', '8', '4', 'CHECRAS', 'H'),
(1595, '15', '8', '5', 'HUALMAY', 'H'),
(1596, '15', '8', '6', 'HUAURA', 'H'),
(1597, '15', '8', '7', 'LEONCIO PRADO', 'H'),
(1598, '15', '8', '8', 'PACCHO', 'H'),
(1599, '15', '8', '9', 'SANTA LEONOR', 'H'),
(1600, '15', '8', '10', 'SANTA MARIA', 'H'),
(1601, '15', '8', '11', 'SAYAN', 'H'),
(1602, '15', '8', '12', 'VEGUETA', 'H'),
(1603, '15', '9', '1', 'OYON', 'H'),
(1604, '15', '9', '2', 'ANDAJES', 'H'),
(1605, '15', '9', '3', 'CAUJUL', 'H'),
(1606, '15', '9', '4', 'COCHAMARCA', 'H'),
(1607, '15', '9', '5', 'NAVAN', 'H'),
(1608, '15', '9', '6', 'PACHANGARA', 'H'),
(1609, '15', '10', '1', 'YAUYOS', 'H'),
(1610, '15', '10', '2', 'ALIS', 'H'),
(1611, '15', '10', '3', 'AYAUCA', 'H'),
(1612, '15', '10', '4', 'AYAVIRI', 'H'),
(1613, '15', '10', '5', 'AZANGARO', 'H'),
(1614, '15', '10', '6', 'CACRA', 'H'),
(1615, '15', '10', '7', 'CARANIA', 'H'),
(1616, '15', '10', '8', 'CATAHUASI', 'H'),
(1617, '15', '10', '9', 'CHOCOS', 'H'),
(1618, '15', '10', '10', 'COCHAS', 'H'),
(1619, '15', '10', '11', 'COLONIA', 'H'),
(1620, '15', '10', '12', 'HONGOS', 'H'),
(1621, '15', '10', '13', 'HUAMPARA', 'H'),
(1622, '15', '10', '14', 'HUANCAYA', 'H'),
(1623, '15', '10', '15', 'HUANGASCAR', 'H'),
(1624, '15', '10', '16', 'HUANTAN', 'H'),
(1625, '15', '10', '17', 'HUAÃ‘EC', 'H'),
(1626, '15', '10', '18', 'LARAOS', 'H'),
(1627, '15', '10', '19', 'LINCHA', 'H'),
(1628, '15', '10', '20', 'MADEAN', 'H'),
(1629, '15', '10', '21', 'MIRAFLORES', 'H'),
(1630, '15', '10', '22', 'OMAS', 'H'),
(1631, '15', '10', '23', 'PUTINZA', 'H'),
(1632, '15', '10', '24', 'QUINCHES', 'H'),
(1633, '15', '10', '25', 'QUINOCAY', 'H'),
(1634, '15', '10', '26', 'SAN JOAQUIN', 'H'),
(1635, '15', '10', '27', 'SAN PEDRO DE PILAS', 'H'),
(1636, '15', '10', '28', 'TANTA', 'H'),
(1637, '15', '10', '29', 'TAURIPAMPA', 'H'),
(1638, '15', '10', '30', 'TOMAS', 'H'),
(1639, '15', '10', '31', 'TUPE', 'H'),
(1640, '15', '10', '32', 'VIÃ‘AC', 'H'),
(1641, '15', '10', '33', 'VITIS', 'H'),
(1642, '16', '1', '1', 'IQUITOS', 'H'),
(1643, '16', '1', '2', 'ALTO NANAY', 'H'),
(1644, '16', '1', '3', 'FERNANDO LORES', 'H'),
(1645, '16', '1', '4', 'INDIANA', 'H'),
(1646, '16', '1', '5', 'LAS AMAZONAS', 'H'),
(1647, '16', '1', '6', 'MAZAN', 'H'),
(1648, '16', '1', '7', 'NAPO', 'H'),
(1649, '16', '1', '8', 'PUNCHANA', 'H'),
(1650, '16', '1', '9', 'PUTUMAYO', 'H'),
(1651, '16', '1', '10', 'TORRES CAUSANA', 'H'),
(1652, '16', '1', '12', 'BELEN', 'H'),
(1653, '16', '1', '13', 'SAN JUAN BAUTISTA', 'H'),
(1654, '16', '1', '14', 'TENIENTE MANUEL CLAVERO', 'H'),
(1655, '16', '2', '1', 'YURIMAGUAS', 'H'),
(1656, '16', '2', '2', 'BALSAPUERTO', 'H'),
(1657, '16', '2', '5', 'JEBEROS', 'H'),
(1658, '16', '2', '6', 'LAGUNAS', 'H'),
(1659, '16', '2', '10', 'SANTA CRUZ', 'H'),
(1660, '16', '2', '11', 'TENIENTE CESAR LOPEZ ROJAS', 'H'),
(1661, '16', '3', '1', 'NAUTA', 'H'),
(1662, '16', '3', '2', 'PARINARI', 'H'),
(1663, '16', '3', '3', 'TIGRE', 'H'),
(1664, '16', '3', '4', 'TROMPETEROS', 'H'),
(1665, '16', '3', '5', 'URARINAS', 'H'),
(1666, '16', '4', '1', 'RAMON CASTILLA', 'H'),
(1667, '16', '4', '2', 'PEBAS', 'H'),
(1668, '16', '4', '3', 'YAVARI', 'H'),
(1669, '16', '4', '4', 'SAN PABLO', 'H'),
(1670, '16', '5', '1', 'REQUENA', 'H'),
(1671, '16', '5', '2', 'ALTO TAPICHE', 'H'),
(1672, '16', '5', '3', 'CAPELO', 'H'),
(1673, '16', '5', '4', 'EMILIO SAN MARTIN', 'H'),
(1674, '16', '5', '5', 'MAQUIA', 'H'),
(1675, '16', '5', '6', 'PUINAHUA', 'H'),
(1676, '16', '5', '7', 'SAQUENA', 'H'),
(1677, '16', '5', '8', 'SOPLIN', 'H'),
(1678, '16', '5', '9', 'TAPICHE', 'H'),
(1679, '16', '5', '10', 'JENARO HERRERA', 'H'),
(1680, '16', '5', '11', 'YAQUERANA', 'H'),
(1681, '16', '6', '1', 'CONTAMANA', 'H'),
(1682, '16', '6', '2', 'INAHUAYA', 'H'),
(1683, '16', '6', '3', 'PADRE MARQUEZ', 'H'),
(1684, '16', '6', '4', 'PAMPA HERMOSA', 'H'),
(1685, '16', '6', '5', 'SARAYACU', 'H'),
(1686, '16', '6', '6', 'VARGAS GUERRA', 'H'),
(1687, '16', '7', '1', 'BARRANCA', 'H'),
(1688, '16', '7', '2', 'CAHUAPANAS', 'H'),
(1689, '16', '7', '3', 'MANSERICHE', 'H'),
(1690, '16', '7', '4', 'MORONA', 'H'),
(1691, '16', '7', '5', 'PASTAZA', 'H'),
(1692, '16', '7', '6', 'ANDOAS', 'H'),
(1693, '17', '1', '1', 'TAMBOPATA', 'H'),
(1694, '17', '1', '2', 'INAMBARI', 'H'),
(1695, '17', '1', '3', 'LAS PIEDRAS', 'H'),
(1696, '17', '1', '4', 'LABERINTO', 'H'),
(1697, '17', '2', '1', 'MANU', 'H'),
(1698, '17', '2', '2', 'FITZCARRALD', 'H'),
(1699, '17', '2', '3', 'MADRE DE DIOS', 'H'),
(1700, '17', '2', '4', 'HUEPETUHE', 'H'),
(1701, '17', '3', '1', 'IÃ‘APARI', 'H'),
(1702, '17', '3', '2', 'IBERIA', 'H'),
(1703, '17', '3', '3', 'TAHUAMANU', 'H'),
(1704, '18', '1', '1', 'MOQUEGUA', 'H'),
(1705, '18', '1', '2', 'CARUMAS', 'H'),
(1706, '18', '1', '3', 'CUCHUMBAYA', 'H'),
(1707, '18', '1', '4', 'SAMEGUA', 'H'),
(1708, '18', '1', '5', 'SAN CRISTOBAL', 'H'),
(1709, '18', '1', '6', 'TORATA', 'H'),
(1710, '18', '2', '1', 'OMATE', 'H'),
(1711, '18', '2', '2', 'CHOJATA', 'H'),
(1712, '18', '2', '3', 'COALAQUE', 'H'),
(1713, '18', '2', '4', 'ICHUÃ‘A', 'H'),
(1714, '18', '2', '5', 'LA CAPILLA', 'H'),
(1715, '18', '2', '6', 'LLOQUE', 'H'),
(1716, '18', '2', '7', 'MATALAQUE', 'H'),
(1717, '18', '2', '8', 'PUQUINA', 'H'),
(1718, '18', '2', '9', 'QUINISTAQUILLAS', 'H'),
(1719, '18', '2', '10', 'UBINAS', 'H'),
(1720, '18', '2', '11', 'YUNGA', 'H'),
(1721, '18', '3', '1', 'ILO', 'H'),
(1722, '18', '3', '2', 'EL ALGARROBAL', 'H'),
(1723, '18', '3', '3', 'PACOCHA', 'H'),
(1724, '19', '1', '1', 'CHAUPIMARCA', 'H'),
(1725, '19', '1', '2', 'HUACHON', 'H'),
(1726, '19', '1', '3', 'HUARIACA', 'H'),
(1727, '19', '1', '4', 'HUAYLLAY', 'H'),
(1728, '19', '1', '5', 'NINACACA', 'H'),
(1729, '19', '1', '6', 'PALLANCHACRA', 'H'),
(1730, '19', '1', '7', 'PAUCARTAMBO', 'H'),
(1731, '19', '1', '8', 'SAN FRANCISCO DE ASIS DE YARUSYACAN', 'H'),
(1732, '19', '1', '9', 'SIMON BOLIVAR', 'H'),
(1733, '19', '1', '10', 'TICLACAYAN', 'H'),
(1734, '19', '1', '11', 'TINYAHUARCO', 'H'),
(1735, '19', '1', '12', 'VICCO', 'H'),
(1736, '19', '1', '13', 'YANACANCHA', 'H'),
(1737, '19', '2', '1', 'YANAHUANCA', 'H'),
(1738, '19', '2', '2', 'CHACAYAN', 'H'),
(1739, '19', '2', '3', 'GOYLLARISQUIZGA', 'H'),
(1740, '19', '2', '4', 'PAUCAR', 'H'),
(1741, '19', '2', '5', 'SAN PEDRO DE PILLAO', 'H'),
(1742, '19', '2', '6', 'SANTA ANA DE TUSI', 'H'),
(1743, '19', '2', '7', 'TAPUC', 'H'),
(1744, '19', '2', '8', 'VILCABAMBA', 'H'),
(1745, '19', '3', '1', 'OXAPAMPA', 'H'),
(1746, '19', '3', '2', 'CHONTABAMBA', 'H'),
(1747, '19', '3', '3', 'HUANCABAMBA', 'H'),
(1748, '19', '3', '4', 'PALCAZU', 'H'),
(1749, '19', '3', '5', 'POZUZO', 'H'),
(1750, '19', '3', '6', 'PUERTO BERMUDEZ', 'H'),
(1751, '19', '3', '7', 'VILLA RICA', 'H'),
(1752, '20', '1', '1', 'PIURA', 'H'),
(1753, '20', '1', '4', 'CASTILLA', 'H'),
(1754, '20', '1', '5', 'CATACAOS', 'H'),
(1755, '20', '1', '7', 'CURA MORI', 'H'),
(1756, '20', '1', '8', 'EL TALLAN', 'H'),
(1757, '20', '1', '9', 'LA ARENA', 'H'),
(1758, '20', '1', '10', 'LA UNION', 'H'),
(1759, '20', '1', '11', 'LAS LOMAS', 'H'),
(1760, '20', '1', '14', 'TAMBO GRANDE', 'H'),
(1761, '20', '2', '1', 'AYABACA', 'H'),
(1762, '20', '2', '2', 'FRIAS', 'H'),
(1763, '20', '2', '3', 'JILILI', 'H'),
(1764, '20', '2', '4', 'LAGUNAS', 'H'),
(1765, '20', '2', '5', 'MONTERO', 'H'),
(1766, '20', '2', '6', 'PACAIPAMPA', 'H'),
(1767, '20', '2', '7', 'PAIMAS', 'H'),
(1768, '20', '2', '8', 'SAPILLICA', 'H'),
(1769, '20', '2', '9', 'SICCHEZ', 'H'),
(1770, '20', '2', '10', 'SUYO', 'H'),
(1771, '20', '3', '1', 'HUANCABAMBA', 'H'),
(1772, '20', '3', '2', 'CANCHAQUE', 'H'),
(1773, '20', '3', '3', 'EL CARMEN DE LA FRONTERA', 'H'),
(1774, '20', '3', '4', 'HUARMACA', 'H'),
(1775, '20', '3', '5', 'LALAQUIZ', 'H'),
(1776, '20', '3', '6', 'SAN MIGUEL DE EL FAIQUE', 'H'),
(1777, '20', '3', '7', 'SONDOR', 'H'),
(1778, '20', '3', '8', 'SONDORILLO', 'H'),
(1779, '20', '4', '1', 'CHULUCANAS', 'H'),
(1780, '20', '4', '2', 'BUENOS AIRES', 'H'),
(1781, '20', '4', '3', 'CHALACO', 'H'),
(1782, '20', '4', '4', 'LA MATANZA', 'H'),
(1783, '20', '4', '5', 'MORROPON', 'H'),
(1784, '20', '4', '6', 'SALITRAL', 'H'),
(1785, '20', '4', '7', 'SAN JUAN DE BIGOTE', 'H'),
(1786, '20', '4', '8', 'SANTA CATALINA DE MOSSA', 'H'),
(1787, '20', '4', '9', 'SANTO DOMINGO', 'H'),
(1788, '20', '4', '10', 'YAMANGO', 'H'),
(1789, '20', '5', '1', 'PAITA', 'H'),
(1790, '20', '5', '2', 'AMOTAPE', 'H'),
(1791, '20', '5', '3', 'ARENAL', 'H'),
(1792, '20', '5', '4', 'COLAN', 'H'),
(1793, '20', '5', '5', 'LA HUACA', 'H'),
(1794, '20', '5', '6', 'TAMARINDO', 'H'),
(1795, '20', '5', '7', 'VICHAYAL', 'H'),
(1796, '20', '6', '1', 'SULLANA', 'H'),
(1797, '20', '6', '2', 'BELLAVISTA', 'H'),
(1798, '20', '6', '3', 'IGNACIO ESCUDERO', 'H'),
(1799, '20', '6', '4', 'LANCONES', 'H'),
(1800, '20', '6', '5', 'MARCAVELICA', 'H'),
(1801, '20', '6', '6', 'MIGUEL CHECA', 'H'),
(1802, '20', '6', '7', 'QUERECOTILLO', 'H'),
(1803, '20', '6', '8', 'SALITRAL', 'H'),
(1804, '20', '7', '1', 'PARIÃ‘AS', 'H'),
(1805, '20', '7', '2', 'EL ALTO', 'H'),
(1806, '20', '7', '3', 'LA BREA', 'H'),
(1807, '20', '7', '4', 'LOBITOS', 'H'),
(1808, '20', '7', '5', 'LOS ORGANOS', 'H'),
(1809, '20', '7', '6', 'MANCORA', 'H'),
(1810, '20', '8', '1', 'SECHURA', 'H'),
(1811, '20', '8', '2', 'BELLAVISTA DE LA UNION', 'H'),
(1812, '20', '8', '3', 'BERNAL', 'H'),
(1813, '20', '8', '4', 'CRISTO NOS VALGA', 'H'),
(1814, '20', '8', '5', 'VICE', 'H'),
(1815, '20', '8', '6', 'RINCONADA LLICUAR', 'H'),
(1816, '21', '1', '1', 'PUNO', 'H'),
(1817, '21', '1', '2', 'ACORA', 'H'),
(1818, '21', '1', '3', 'AMANTANI', 'H'),
(1819, '21', '1', '4', 'ATUNCOLLA', 'H'),
(1820, '21', '1', '5', 'CAPACHICA', 'H'),
(1821, '21', '1', '6', 'CHUCUITO', 'H'),
(1822, '21', '1', '7', 'COATA', 'H'),
(1823, '21', '1', '8', 'HUATA', 'H'),
(1824, '21', '1', '9', 'MAÃ‘AZO', 'H'),
(1825, '21', '1', '10', 'PAUCARCOLLA', 'H'),
(1826, '21', '1', '11', 'PICHACANI', 'H'),
(1827, '21', '1', '12', 'PLATERIA', 'H'),
(1828, '21', '1', '13', 'SAN ANTONIO', 'H'),
(1829, '21', '1', '14', 'TIQUILLACA', 'H'),
(1830, '21', '1', '15', 'VILQUE', 'H'),
(1831, '21', '2', '1', 'AZANGARO', 'H'),
(1832, '21', '2', '2', 'ACHAYA', 'H'),
(1833, '21', '2', '3', 'ARAPA', 'H'),
(1834, '21', '2', '4', 'ASILLO', 'H'),
(1835, '21', '2', '5', 'CAMINACA', 'H'),
(1836, '21', '2', '6', 'CHUPA', 'H'),
(1837, '21', '2', '7', 'JOSE DOMINGO CHOQUEHUANCA', 'H'),
(1838, '21', '2', '8', 'MUÃ‘ANI', 'H'),
(1839, '21', '2', '9', 'POTONI', 'H'),
(1840, '21', '2', '10', 'SAMAN', 'H'),
(1841, '21', '2', '11', 'SAN ANTON', 'H'),
(1842, '21', '2', '12', 'SAN JOSE', 'H'),
(1843, '21', '2', '13', 'SAN JUAN DE SALINAS', 'H'),
(1844, '21', '2', '14', 'SANTIAGO DE PUPUJA', 'H'),
(1845, '21', '2', '15', 'TIRAPATA', 'H'),
(1846, '21', '3', '1', 'MACUSANI', 'H'),
(1847, '21', '3', '2', 'AJOYANI', 'H'),
(1848, '21', '3', '3', 'AYAPATA', 'H'),
(1849, '21', '3', '4', 'COASA', 'H'),
(1850, '21', '3', '5', 'CORANI', 'H'),
(1851, '21', '3', '6', 'CRUCERO', 'H'),
(1852, '21', '3', '7', 'ITUATA', 'H'),
(1853, '21', '3', '8', 'OLLACHEA', 'H'),
(1854, '21', '3', '9', 'SAN GABAN', 'H'),
(1855, '21', '3', '10', 'USICAYOS', 'H'),
(1856, '21', '4', '1', 'JULI', 'H'),
(1857, '21', '4', '2', 'DESAGUADERO', 'H'),
(1858, '21', '4', '3', 'HUACULLANI', 'H'),
(1859, '21', '4', '4', 'KELLUYO', 'H'),
(1860, '21', '4', '5', 'PISACOMA', 'H'),
(1861, '21', '4', '6', 'POMATA', 'H'),
(1862, '21', '4', '7', 'ZEPITA', 'H'),
(1863, '21', '5', '1', 'ILAVE', 'H'),
(1864, '21', '5', '2', 'CAPAZO', 'H'),
(1865, '21', '5', '3', 'PILCUYO', 'H'),
(1866, '21', '5', '4', 'SANTA ROSA', 'H'),
(1867, '21', '5', '5', 'CONDURIRI', 'H'),
(1868, '21', '6', '1', 'HUANCANE', 'H'),
(1869, '21', '6', '2', 'COJATA', 'H'),
(1870, '21', '6', '3', 'HUATASANI', 'H'),
(1871, '21', '6', '4', 'INCHUPALLA', 'H'),
(1872, '21', '6', '5', 'PUSI', 'H'),
(1873, '21', '6', '6', 'ROSASPATA', 'H'),
(1874, '21', '6', '7', 'TARACO', 'H'),
(1875, '21', '6', '8', 'VILQUE CHICO', 'H'),
(1876, '21', '7', '1', 'LAMPA', 'H'),
(1877, '21', '7', '2', 'CABANILLA', 'H'),
(1878, '21', '7', '3', 'CALAPUJA', 'H'),
(1879, '21', '7', '4', 'NICASIO', 'H'),
(1880, '21', '7', '5', 'OCUVIRI', 'H'),
(1881, '21', '7', '6', 'PALCA', 'H'),
(1882, '21', '7', '7', 'PARATIA', 'H'),
(1883, '21', '7', '8', 'PUCARA', 'H'),
(1884, '21', '7', '9', 'SANTA LUCIA', 'H'),
(1885, '21', '7', '10', 'VILAVILA', 'H'),
(1886, '21', '8', '1', 'AYAVIRI', 'H'),
(1887, '21', '8', '2', 'ANTAUTA', 'H'),
(1888, '21', '8', '3', 'CUPI', 'H'),
(1889, '21', '8', '4', 'LLALLI', 'H'),
(1890, '21', '8', '5', 'MACARI', 'H'),
(1891, '21', '8', '6', 'NUÃ‘OA', 'H'),
(1892, '21', '8', '7', 'ORURILLO', 'H'),
(1893, '21', '8', '8', 'SANTA ROSA', 'H'),
(1894, '21', '8', '9', 'UMACHIRI', 'H'),
(1895, '21', '9', '1', 'MOHO', 'H'),
(1896, '21', '9', '2', 'CONIMA', 'H'),
(1897, '21', '9', '3', 'HUAYRAPATA', 'H'),
(1898, '21', '9', '4', 'TILALI', 'H'),
(1899, '21', '10', '1', 'PUTINA', 'H'),
(1900, '21', '10', '2', 'ANANEA', 'H'),
(1901, '21', '10', '3', 'PEDRO VILCA APAZA', 'H'),
(1902, '21', '10', '4', 'QUILCAPUNCU', 'H'),
(1903, '21', '10', '5', 'SINA', 'H'),
(1904, '21', '11', '1', 'JULIACA', 'H'),
(1905, '21', '11', '2', 'CABANA', 'H'),
(1906, '21', '11', '3', 'CABANILLAS', 'H'),
(1907, '21', '11', '4', 'CARACOTO', 'H'),
(1908, '21', '12', '1', 'SANDIA', 'H'),
(1909, '21', '12', '2', 'CUYOCUYO', 'H'),
(1910, '21', '12', '3', 'LIMBANI', 'H'),
(1911, '21', '12', '4', 'PATAMBUCO', 'H'),
(1912, '21', '12', '5', 'PHARA', 'H'),
(1913, '21', '12', '6', 'QUIACA', 'H'),
(1914, '21', '12', '7', 'SAN JUAN DEL ORO', 'H'),
(1915, '21', '12', '8', 'YANAHUAYA', 'H'),
(1916, '21', '12', '9', 'ALTO INAMBARI', 'H'),
(1917, '21', '12', '10', 'SAN PEDRO DE PUTINA PUNCO', 'H'),
(1918, '21', '13', '1', 'YUNGUYO', 'H'),
(1919, '21', '13', '2', 'ANAPIA', 'H'),
(1920, '21', '13', '3', 'COPANI', 'H'),
(1921, '21', '13', '4', 'CUTURAPI', 'H'),
(1922, '21', '13', '5', 'OLLARAYA', 'H'),
(1923, '21', '13', '6', 'TINICACHI', 'H'),
(1924, '21', '13', '7', 'UNICACHI', 'H'),
(1925, '22', '1', '1', 'MOYOBAMBA', 'H'),
(1926, '22', '1', '2', 'CALZADA', 'H'),
(1927, '22', '1', '3', 'HABANA', 'H'),
(1928, '22', '1', '4', 'JEPELACIO', 'H'),
(1929, '22', '1', '5', 'SORITOR', 'H'),
(1930, '22', '1', '6', 'YANTALO', 'H'),
(1931, '22', '2', '1', 'BELLAVISTA', 'H'),
(1932, '22', '2', '2', 'ALTO BIAVO', 'H'),
(1933, '22', '2', '3', 'BAJO BIAVO', 'H'),
(1934, '22', '2', '4', 'HUALLAGA', 'H'),
(1935, '22', '2', '5', 'SAN PABLO', 'H'),
(1936, '22', '2', '6', 'SAN RAFAEL', 'H'),
(1937, '22', '3', '1', 'SAN JOSE DE SISA', 'H'),
(1938, '22', '3', '2', 'AGUA BLANCA', 'H'),
(1939, '22', '3', '3', 'SAN MARTIN', 'H'),
(1940, '22', '3', '4', 'SANTA ROSA', 'H'),
(1941, '22', '3', '5', 'SHATOJA', 'H'),
(1942, '22', '4', '1', 'SAPOSOA', 'H'),
(1943, '22', '4', '2', 'ALTO SAPOSOA', 'H'),
(1944, '22', '4', '3', 'EL ESLABON', 'H'),
(1945, '22', '4', '4', 'PISCOYACU', 'H'),
(1946, '22', '4', '5', 'SACANCHE', 'H'),
(1947, '22', '4', '6', 'TINGO DE SAPOSOA', 'H'),
(1948, '22', '5', '1', 'LAMAS', 'H'),
(1949, '22', '5', '2', 'ALONSO DE ALVARADO', 'H'),
(1950, '22', '5', '3', 'BARRANQUITA', 'H'),
(1951, '22', '5', '4', 'CAYNARACHI', 'H'),
(1952, '22', '5', '5', 'CUÃ‘UMBUQUI', 'H'),
(1953, '22', '5', '6', 'PINTO RECODO', 'H'),
(1954, '22', '5', '7', 'RUMISAPA', 'H'),
(1955, '22', '5', '8', 'SAN ROQUE DE CUMBAZA', 'H'),
(1956, '22', '5', '9', 'SHANAO', 'H'),
(1957, '22', '5', '10', 'TABALOSOS', 'H'),
(1958, '22', '5', '11', 'ZAPATERO', 'H'),
(1959, '22', '6', '1', 'JUANJUI', 'H'),
(1960, '22', '6', '2', 'CAMPANILLA', 'H'),
(1961, '22', '6', '3', 'HUICUNGO', 'H'),
(1962, '22', '6', '4', 'PACHIZA', 'H'),
(1963, '22', '6', '5', 'PAJARILLO', 'H'),
(1964, '22', '7', '1', 'PICOTA', 'H'),
(1965, '22', '7', '2', 'BUENOS AIRES', 'H'),
(1966, '22', '7', '3', 'CASPISAPA', 'H'),
(1967, '22', '7', '4', 'PILLUANA', 'H'),
(1968, '22', '7', '5', 'PUCACACA', 'H'),
(1969, '22', '7', '6', 'SAN CRISTOBAL', 'H'),
(1970, '22', '7', '7', 'SAN HILARION', 'H'),
(1971, '22', '7', '8', 'SHAMBOYACU', 'H'),
(1972, '22', '7', '9', 'TINGO DE PONASA', 'H'),
(1973, '22', '7', '10', 'TRES UNIDOS', 'H'),
(1974, '22', '8', '1', 'RIOJA', 'H'),
(1975, '22', '8', '2', 'AWAJUN', 'H'),
(1976, '22', '8', '3', 'ELIAS SOPLIN VARGAS', 'H'),
(1977, '22', '8', '4', 'NUEVA CAJAMARCA', 'H'),
(1978, '22', '8', '5', 'PARDO MIGUEL', 'H'),
(1979, '22', '8', '6', 'POSIC', 'H'),
(1980, '22', '8', '7', 'SAN FERNANDO', 'H'),
(1981, '22', '8', '8', 'YORONGOS', 'H'),
(1982, '22', '8', '9', 'YURACYACU', 'H'),
(1983, '22', '9', '1', 'TARAPOTO', 'H'),
(1984, '22', '9', '2', 'ALBERTO LEVEAU', 'H'),
(1985, '22', '9', '3', 'CACATACHI', 'H'),
(1986, '22', '9', '4', 'CHAZUTA', 'H'),
(1987, '22', '9', '5', 'CHIPURANA', 'H'),
(1988, '22', '9', '6', 'EL PORVENIR', 'H'),
(1989, '22', '9', '7', 'HUIMBAYOC', 'H'),
(1990, '22', '9', '8', 'JUAN GUERRA', 'H'),
(1991, '22', '9', '9', 'LA BANDA DE SHILCAYO', 'H'),
(1992, '22', '9', '10', 'MORALES', 'H'),
(1993, '22', '9', '11', 'PAPAPLAYA', 'H'),
(1994, '22', '9', '12', 'SAN ANTONIO', 'H'),
(1995, '22', '9', '13', 'SAUCE', 'H'),
(1996, '22', '9', '14', 'SHAPAJA', 'H'),
(1997, '22', '10', '1', 'TOCACHE', 'H'),
(1998, '22', '10', '2', 'NUEVO PROGRESO', 'H'),
(1999, '22', '10', '3', 'POLVORA', 'H'),
(2000, '22', '10', '4', 'SHUNTE', 'H'),
(2001, '22', '10', '5', 'UCHIZA', 'H'),
(2002, '23', '1', '1', 'TACNA', 'H'),
(2003, '23', '1', '2', 'ALTO DE LA ALIANZA', 'H'),
(2004, '23', '1', '3', 'CALANA', 'H'),
(2005, '23', '1', '4', 'CIUDAD NUEVA', 'H'),
(2006, '23', '1', '5', 'INCLAN', 'H'),
(2007, '23', '1', '6', 'PACHIA', 'H'),
(2008, '23', '1', '7', 'PALCA', 'H'),
(2009, '23', '1', '8', 'POCOLLAY', 'H'),
(2010, '23', '1', '9', 'SAMA', 'H'),
(2011, '23', '1', '10', 'CORONEL GREGORIO ALBARRACIN LANCHIPA', 'H'),
(2012, '23', '2', '1', 'CANDARAVE', 'H'),
(2013, '23', '2', '2', 'CAIRANI', 'H'),
(2014, '23', '2', '3', 'CAMILACA', 'H'),
(2015, '23', '2', '4', 'CURIBAYA', 'H'),
(2016, '23', '2', '5', 'HUANUARA', 'H'),
(2017, '23', '2', '6', 'QUILAHUANI', 'H'),
(2018, '23', '3', '1', 'LOCUMBA', 'H'),
(2019, '23', '3', '2', 'ILABAYA', 'H'),
(2020, '23', '3', '3', 'ITE', 'H'),
(2021, '23', '4', '1', 'TARATA', 'H'),
(2022, '23', '4', '2', 'HEROES ALBARRACIN', 'H'),
(2023, '23', '4', '3', 'ESTIQUE', 'H'),
(2024, '23', '4', '4', 'ESTIQUE-PAMPA', 'H'),
(2025, '23', '4', '5', 'SITAJARA', 'H'),
(2026, '23', '4', '6', 'SUSAPAYA', 'H'),
(2027, '23', '4', '7', 'TARUCACHI', 'H'),
(2028, '23', '4', '8', 'TICACO', 'H'),
(2029, '24', '1', '1', 'TUMBES', 'H'),
(2030, '24', '1', '2', 'CORRALES', 'H'),
(2031, '24', '1', '3', 'LA CRUZ', 'H'),
(2032, '24', '1', '4', 'PAMPAS DE HOSPITAL', 'H'),
(2033, '24', '1', '5', 'SAN JACINTO', 'H'),
(2034, '24', '1', '6', 'SAN JUAN DE LA VIRGEN', 'H'),
(2035, '24', '2', '1', 'ZORRITOS', 'H'),
(2036, '24', '2', '2', 'CASITAS', 'H'),
(2037, '24', '2', '3', 'CANOAS DE PUNTA SAL', 'H'),
(2038, '24', '3', '1', 'ZARUMILLA', 'H'),
(2039, '24', '3', '2', 'AGUAS VERDES', 'H'),
(2040, '24', '3', '3', 'MATAPALO', 'H'),
(2041, '24', '3', '4', 'PAPAYAL', 'H'),
(2042, '25', '1', '1', 'CALLERIA', 'H'),
(2043, '25', '1', '2', 'CAMPOVERDE', 'H'),
(2044, '25', '1', '3', 'IPARIA', 'H'),
(2045, '25', '1', '4', 'MASISEA', 'H'),
(2046, '25', '1', '5', 'YARINACOCHA', 'H'),
(2047, '25', '1', '6', 'NUEVA REQUENA', 'H'),
(2048, '25', '2', '1', 'RAYMONDI', 'H'),
(2049, '25', '2', '2', 'SEPAHUA', 'H'),
(2050, '25', '2', '3', 'TAHUANIA', 'H'),
(2051, '25', '2', '4', 'YURUA', 'H'),
(2052, '25', '3', '1', 'PADRE ABAD', 'H'),
(2053, '25', '3', '2', 'IRAZOLA', 'H'),
(2054, '25', '3', '3', 'CURIMANA', 'H'),
(2055, '25', '4', '1', 'PURUS', 'H'),
(2056, '0', '0', '0', 'AfganistÃ¡n', 'H'),
(2057, '0', '0', '0', 'Akrotiri', 'H'),
(2058, '0', '0', '0', 'Albania', 'H'),
(2059, '0', '0', '0', 'Alemania', 'H'),
(2060, '0', '0', '0', 'Andorra', 'H'),
(2061, '0', '0', '0', 'Angola', 'H'),
(2062, '0', '0', '0', 'Anguila', 'H'),
(2063, '0', '0', '0', 'AntÃ¡rtida', 'H'),
(2064, '0', '0', '0', 'Antigua y Barbuda', 'H'),
(2065, '0', '0', '0', 'Antillas Neerlandesas', 'H'),
(2066, '0', '0', '0', 'Arabia SaudÃ­', 'H'),
(2067, '0', '0', '0', 'Arctic Ocean', 'H'),
(2068, '0', '0', '0', 'Argelia', 'H'),
(2069, '0', '0', '0', 'Argentina', 'H'),
(2070, '0', '0', '0', 'Armenia', 'H'),
(2071, '0', '0', '0', 'Aruba', 'H'),
(2072, '0', '0', '0', 'Ashmore and Cartier Islands', 'H'),
(2073, '0', '0', '0', 'Atlantic Ocean', 'H'),
(2074, '0', '0', '0', 'Australia', 'H'),
(2075, '0', '0', '0', 'Austria', 'H'),
(2076, '0', '0', '0', 'AzerbaiyÃ¡n', 'H'),
(2077, '0', '0', '0', 'Bahamas', 'H'),
(2078, '0', '0', '0', 'BahrÃ¡in', 'H'),
(2079, '0', '0', '0', 'Bangladesh', 'H'),
(2080, '0', '0', '0', 'Barbados', 'H'),
(2081, '0', '0', '0', 'BÃ©lgica', 'H'),
(2082, '0', '0', '0', 'Belice', 'H'),
(2083, '0', '0', '0', 'BenÃ­n', 'H'),
(2084, '0', '0', '0', 'Bermudas', 'H'),
(2085, '0', '0', '0', 'Bielorrusia', 'H'),
(2086, '0', '0', '0', 'Birmania; Myanmar', 'H'),
(2087, '0', '0', '0', 'Bolivia', 'H'),
(2088, '0', '0', '0', 'Bosnia y Hercegovina', 'H'),
(2089, '0', '0', '0', 'Botsuana', 'H'),
(2090, '0', '0', '0', 'Brasil', 'H'),
(2091, '0', '0', '0', 'BrunÃ©i', 'H'),
(2092, '0', '0', '0', 'Bulgaria', 'H'),
(2093, '0', '0', '0', 'Burkina Faso', 'H'),
(2094, '0', '0', '0', 'Burundi', 'H'),
(2095, '0', '0', '0', 'ButÃ¡n', 'H'),
(2096, '0', '0', '0', 'Cabo Verde', 'H'),
(2097, '0', '0', '0', 'Camboya', 'H'),
(2098, '0', '0', '0', 'CamerÃºn', 'H'),
(2099, '0', '0', '0', 'CanadÃ¡', 'H'),
(2100, '0', '0', '0', 'Chad', 'H'),
(2101, '0', '0', '0', 'Chile', 'H'),
(2102, '0', '0', '0', 'China', 'H'),
(2103, '0', '0', '0', 'Chipre', 'H'),
(2104, '0', '0', '0', 'Clipperton Island', 'H'),
(2105, '0', '0', '0', 'Colombia', 'H'),
(2106, '0', '0', '0', 'Comoras', 'H'),
(2107, '0', '0', '0', 'Congo', 'H'),
(2108, '0', '0', '0', 'Coral Sea Islands', 'H'),
(2109, '0', '0', '0', 'Corea del Norte', 'H'),
(2110, '0', '0', '0', 'Corea del Sur', 'H'),
(2111, '0', '0', '0', 'Costa de Marfil', 'H'),
(2112, '0', '0', '0', 'Costa Rica', 'H'),
(2113, '0', '0', '0', 'Croacia', 'H'),
(2114, '0', '0', '0', 'Cuba', 'H'),
(2115, '0', '0', '0', 'Dhekelia', 'H'),
(2116, '0', '0', '0', 'Dinamarca', 'H'),
(2117, '0', '0', '0', 'Dominica', 'H'),
(2118, '0', '0', '0', 'Ecuador', 'H'),
(2119, '0', '0', '0', 'Egipto', 'H'),
(2120, '0', '0', '0', 'El Salvador', 'H'),
(2121, '0', '0', '0', 'El Vaticano', 'H'),
(2122, '0', '0', '0', 'Emiratos Ãrabes Unidos', 'H'),
(2123, '0', '0', '0', 'Eritrea', 'H'),
(2124, '0', '0', '0', 'Eslovaquia', 'H'),
(2125, '0', '0', '0', 'Eslovenia', 'H'),
(2126, '0', '0', '0', 'EspaÃ±a', 'H'),
(2127, '0', '0', '0', 'Estados Unidos', 'H'),
(2128, '0', '0', '0', 'Estonia', 'H'),
(2129, '0', '0', '0', 'EtiopÃ­a', 'H'),
(2130, '0', '0', '0', 'Filipinas', 'H'),
(2131, '0', '0', '0', 'Finlandia', 'H'),
(2132, '0', '0', '0', 'Fiyi', 'H'),
(2133, '0', '0', '0', 'Francia', 'H'),
(2134, '0', '0', '0', 'GabÃ³n', 'H'),
(2135, '0', '0', '0', 'Gambia', 'H'),
(2136, '0', '0', '0', 'Gaza Strip', 'H'),
(2137, '0', '0', '0', 'Georgia', 'H'),
(2138, '0', '0', '0', 'Ghana', 'H'),
(2139, '0', '0', '0', 'Gibraltar', 'H'),
(2140, '0', '0', '0', 'Granada', 'H'),
(2141, '0', '0', '0', 'Grecia', 'H'),
(2142, '0', '0', '0', 'Groenlandia', 'H'),
(2143, '0', '0', '0', 'Guam', 'H'),
(2144, '0', '0', '0', 'Guatemala', 'H'),
(2145, '0', '0', '0', 'Guernsey', 'H'),
(2146, '0', '0', '0', 'Guinea', 'H'),
(2147, '0', '0', '0', 'Guinea Ecuatorial', 'H'),
(2148, '0', '0', '0', 'Guinea-Bissau', 'H'),
(2149, '0', '0', '0', 'Guyana', 'H'),
(2150, '0', '0', '0', 'HaitÃ­', 'H'),
(2151, '0', '0', '0', 'Honduras', 'H'),
(2152, '0', '0', '0', 'Hong Kong', 'H'),
(2153, '0', '0', '0', 'HungrÃ­a', 'H'),
(2154, '0', '0', '0', 'India', 'H'),
(2155, '0', '0', '0', 'Indian Ocean', 'H'),
(2156, '0', '0', '0', 'Indonesia', 'H'),
(2157, '0', '0', '0', 'IrÃ¡n', 'H'),
(2158, '0', '0', '0', 'Iraq', 'H'),
(2159, '0', '0', '0', 'Irlanda', 'H'),
(2160, '0', '0', '0', 'Isla Bouvet', 'H'),
(2161, '0', '0', '0', 'Isla Christmas', 'H'),
(2162, '0', '0', '0', 'Isla Norfolk', 'H'),
(2163, '0', '0', '0', 'Islandia', 'H'),
(2164, '0', '0', '0', 'Islas CaimÃ¡n', 'H'),
(2165, '0', '0', '0', 'Islas Cocos', 'H'),
(2166, '0', '0', '0', 'Islas Cook', 'H'),
(2167, '0', '0', '0', 'Islas Feroe', 'H'),
(2168, '0', '0', '0', 'Islas Georgia del Sur y Sandwich del Sur', 'H'),
(2169, '0', '0', '0', 'Islas Heard y McDonald', 'H'),
(2170, '0', '0', '0', 'Islas Malvinas', 'H'),
(2171, '0', '0', '0', 'Islas Marianas del Norte', 'H'),
(2172, '0', '0', '0', 'Islas Marshall', 'H'),
(2173, '0', '0', '0', 'Islas Pitcairn', 'H'),
(2174, '0', '0', '0', 'Islas SalomÃ³n', 'H'),
(2175, '0', '0', '0', 'Islas Turcas y Caicos', 'H'),
(2176, '0', '0', '0', 'Islas VÃ­rgenes Americanas', 'H'),
(2177, '0', '0', '0', 'Islas VÃ­rgenes BritÃ¡nicas', 'H'),
(2178, '0', '0', '0', 'Israel', 'H'),
(2179, '0', '0', '0', 'Italia', 'H'),
(2180, '0', '0', '0', 'Jamaica', 'H'),
(2181, '0', '0', '0', 'Jan Mayen', 'H'),
(2182, '0', '0', '0', 'JapÃ³n', 'H'),
(2183, '0', '0', '0', 'Jersey', 'H'),
(2184, '0', '0', '0', 'Jordania', 'H'),
(2185, '0', '0', '0', 'KazajistÃ¡n', 'H'),
(2186, '0', '0', '0', 'Kenia', 'H'),
(2187, '0', '0', '0', 'KirguizistÃ¡n', 'H'),
(2188, '0', '0', '0', 'Kiribati', 'H'),
(2189, '0', '0', '0', 'Kuwait', 'H'),
(2190, '0', '0', '0', 'Laos', 'H'),
(2191, '0', '0', '0', 'Lesoto', 'H'),
(2192, '0', '0', '0', 'Letonia', 'H'),
(2193, '0', '0', '0', 'LÃ­bano', 'H'),
(2194, '0', '0', '0', 'Liberia', 'H'),
(2195, '0', '0', '0', 'Libia', 'H'),
(2196, '0', '0', '0', 'Liechtenstein', 'H'),
(2197, '0', '0', '0', 'Lituania', 'H'),
(2198, '0', '0', '0', 'Luxemburgo', 'H'),
(2199, '0', '0', '0', 'Macao', 'H'),
(2200, '0', '0', '0', 'Macedonia', 'H'),
(2201, '0', '0', '0', 'Madagascar', 'H'),
(2202, '0', '0', '0', 'Malasia', 'H'),
(2203, '0', '0', '0', 'Malaui', 'H'),
(2204, '0', '0', '0', 'Maldivas', 'H'),
(2205, '0', '0', '0', 'MalÃ­', 'H'),
(2206, '0', '0', '0', 'Malta', 'H'),
(2207, '0', '0', '0', 'Man, Isle of', 'H'),
(2208, '0', '0', '0', 'Marruecos', 'H'),
(2209, '0', '0', '0', 'Mauricio', 'H'),
(2210, '0', '0', '0', 'Mauritania', 'H'),
(2211, '0', '0', '0', 'Mayotte', 'H'),
(2212, '0', '0', '0', 'MÃ©xico', 'H'),
(2213, '0', '0', '0', 'Micronesia', 'H'),
(2214, '0', '0', '0', 'Moldavia', 'H'),
(2215, '0', '0', '0', 'MÃ³naco', 'H'),
(2216, '0', '0', '0', 'Mongolia', 'H'),
(2217, '0', '0', '0', 'Montenegro', 'H'),
(2218, '0', '0', '0', 'Montserrat', 'H'),
(2219, '0', '0', '0', 'Mozambique', 'H'),
(2220, '0', '0', '0', 'Mundo', 'H'),
(2221, '0', '0', '0', 'Namibia', 'H'),
(2222, '0', '0', '0', 'Nauru', 'H'),
(2223, '0', '0', '0', 'Navassa Island', 'H'),
(2224, '0', '0', '0', 'Nepal', 'H'),
(2225, '0', '0', '0', 'Nicaragua', 'H'),
(2226, '0', '0', '0', 'NÃ­ger', 'H'),
(2227, '0', '0', '0', 'Nigeria', 'H'),
(2228, '0', '0', '0', 'Niue', 'H'),
(2229, '0', '0', '0', 'Noruega', 'H'),
(2230, '0', '0', '0', 'Nueva Caledonia', 'H'),
(2231, '0', '0', '0', 'Nueva Zelanda', 'H'),
(2232, '0', '0', '0', 'OmÃ¡n', 'H'),
(2233, '0', '0', '0', 'Pacific Ocean', 'H'),
(2234, '0', '0', '0', 'PaÃ­ses Bajos', 'H'),
(2235, '0', '0', '0', 'PakistÃ¡n', 'H'),
(2236, '0', '0', '0', 'Palaos', 'H'),
(2237, '0', '0', '0', 'PanamÃ¡', 'H'),
(2238, '0', '0', '0', 'PapÃºa-Nueva Guinea', 'H'),
(2239, '0', '0', '0', 'Paracel Islands', 'H'),
(2240, '0', '0', '0', 'Paraguay', 'H'),
(2241, '0', '0', '0', 'PerÃº', 'H'),
(2242, '0', '0', '0', 'Polinesia Francesa', 'H'),
(2243, '0', '0', '0', 'Polonia', 'H'),
(2244, '0', '0', '0', 'Portugal', 'H'),
(2245, '0', '0', '0', 'Puerto Rico', 'H'),
(2246, '0', '0', '0', 'Qatar', 'H'),
(2247, '0', '0', '0', 'Reino Unido', 'H'),
(2248, '0', '0', '0', 'RepÃºblica Centroafricana', 'H'),
(2249, '0', '0', '0', 'RepÃºblica Checa', 'H'),
(2250, '0', '0', '0', 'RepÃºblica DemocrÃ¡tica del Congo', 'H'),
(2251, '0', '0', '0', 'RepÃºblica Dominicana', 'H'),
(2252, '0', '0', '0', 'Ruanda', 'H'),
(2253, '0', '0', '0', 'Rumania', 'H'),
(2254, '0', '0', '0', 'Rusia', 'H'),
(2255, '0', '0', '0', 'SÃ¡hara Occidental', 'H'),
(2256, '0', '0', '0', 'Samoa', 'H'),
(2257, '0', '0', '0', 'Samoa Americana', 'H'),
(2258, '0', '0', '0', 'San CristÃ³bal y Nieves', 'H'),
(2259, '0', '0', '0', 'San Marino', 'H'),
(2260, '0', '0', '0', 'San Pedro y MiquelÃ³n', 'H'),
(2261, '0', '0', '0', 'San Vicente y las Granadinas', 'H'),
(2262, '0', '0', '0', 'Santa Helena', 'H'),
(2263, '0', '0', '0', 'Santa LucÃ­a', 'H'),
(2264, '0', '0', '0', 'Santo TomÃ© y PrÃ­ncipe', 'H'),
(2265, '0', '0', '0', 'Senegal', 'H'),
(2266, '0', '0', '0', 'Serbia', 'H'),
(2267, '0', '0', '0', 'Seychelles', 'H'),
(2268, '0', '0', '0', 'Sierra Leona', 'H'),
(2269, '0', '0', '0', 'Singapur', 'H'),
(2270, '0', '0', '0', 'Siria', 'H'),
(2271, '0', '0', '0', 'Somalia', 'H'),
(2272, '0', '0', '0', 'Southern Ocean', 'H'),
(2273, '0', '0', '0', 'Spratly Islands', 'H'),
(2274, '0', '0', '0', 'Sri Lanka', 'H'),
(2275, '0', '0', '0', 'Suazilandia', 'H'),
(2276, '0', '0', '0', 'SudÃ¡frica', 'H'),
(2277, '0', '0', '0', 'SudÃ¡n', 'H'),
(2278, '0', '0', '0', 'Suecia', 'H'),
(2279, '0', '0', '0', 'Suiza', 'H'),
(2280, '0', '0', '0', 'Surinam', 'H'),
(2281, '0', '0', '0', 'Svalbard y Jan Mayen', 'H'),
(2282, '0', '0', '0', 'Tailandia', 'H'),
(2283, '0', '0', '0', 'TaiwÃ¡n', 'H'),
(2284, '0', '0', '0', 'Tanzania', 'H'),
(2285, '0', '0', '0', 'TayikistÃ¡n', 'H'),
(2286, '0', '0', '0', 'Territorio BritÃ¡nico del OcÃ©ano Indico', 'H'),
(2287, '0', '0', '0', 'Territorios Australes Franceses', 'H'),
(2288, '0', '0', '0', 'Timor Oriental', 'H'),
(2289, '0', '0', '0', 'Togo', 'H'),
(2290, '0', '0', '0', 'Tokelau', 'H'),
(2291, '0', '0', '0', 'Tonga', 'H'),
(2292, '0', '0', '0', 'Trinidad y Tobago', 'H'),
(2293, '0', '0', '0', 'TÃºnez', 'H'),
(2294, '0', '0', '0', 'TurkmenistÃ¡n', 'H'),
(2295, '0', '0', '0', 'TurquÃ­a', 'H'),
(2296, '0', '0', '0', 'Tuvalu', 'H'),
(2297, '0', '0', '0', 'Ucrania', 'H'),
(2298, '0', '0', '0', 'Uganda', 'H'),
(2299, '0', '0', '0', 'UniÃ³n Europea', 'H'),
(2300, '0', '0', '0', 'Uruguay', 'H'),
(2301, '0', '0', '0', 'UzbekistÃ¡n', 'H'),
(2302, '0', '0', '0', 'Vanuatu', 'H'),
(2303, '0', '0', '0', 'Venezuela', 'H'),
(2304, '0', '0', '0', 'Vietnam', 'H'),
(2305, '0', '0', '0', 'Wake Island', 'H'),
(2306, '0', '0', '0', 'Wallis y Futuna', 'H'),
(2307, '0', '0', '0', 'West Bank', 'H'),
(2308, '0', '0', '0', 'Yemen', 'H'),
(2309, '0', '0', '0', 'Yibuti', 'H'),
(2310, '0', '0', '0', 'Zambia', 'H'),
(2311, '0', '0', '0', 'Zimbabue', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `nUsuID` int(11) NOT NULL AUTO_INCREMENT,
  `nPerID` int(11) NOT NULL,
  `cUsuNick` varchar(50) NOT NULL,
  `cUsuClave` varchar(200) NOT NULL,
  `cUsuTipo` char(1) DEFAULT NULL,
  `dUsuFechaRegistro` datetime DEFAULT NULL,
  `cUsuEstado` char(1) NOT NULL,
  PRIMARY KEY (`nUsuID`),
  KEY `nPerID` (`nPerID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`nUsuID`, `nPerID`, `cUsuNick`, `cUsuClave`, `cUsuTipo`, `dUsuFechaRegistro`, `cUsuEstado`) VALUES
(1, 1, 'juan', '', '1', NULL, 'H'),
(2, 3, 'luiggichirinos_p@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '1', '2014-07-11 19:50:06', 'H'),
(3, 4, 'guevara@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-11 20:33:59', 'I'),
(4, 5, 'guevara@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-11 20:34:38', 'I'),
(8, 8, 'luiggichirinos_p2255@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-18 19:09:07', 'H'),
(9, 9, 'local@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-18 19:17:59', 'H'),
(10, 10, 'compadre@outlook.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-18 19:23:54', 'H'),
(11, 11, 'wefjhwef@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-18 19:27:47', 'H'),
(12, 12, 'usuario_nuevo@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-21 20:37:21', 'H'),
(13, 13, 'aaaa@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-22 12:50:55', 'H'),
(14, 14, 'carlos@reality-magic.com', '827ccb0eea8a706c4c34a16891f84e7b', '2', '2014-07-22 14:00:25', 'H'),
(15, 15, 'ginoramos@hotmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2', '2014-07-29 18:09:23', 'H');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_opciones`
--

CREATE TABLE IF NOT EXISTS `usuarios_opciones` (
  `nUsoID` int(11) NOT NULL AUTO_INCREMENT,
  `nUsuID` int(11) NOT NULL,
  `nOpcID` smallint(6) NOT NULL,
  `cUsoEstado` char(1) NOT NULL,
  PRIMARY KEY (`nUsoID`),
  KEY `nOpcID` (`nOpcID`),
  KEY `nUsuID` (`nUsuID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=83 ;

--
-- Volcado de datos para la tabla `usuarios_opciones`
--

INSERT INTO `usuarios_opciones` (`nUsoID`, `nUsuID`, `nOpcID`, `cUsoEstado`) VALUES
(17, 1, 1, 'H'),
(18, 1, 2, 'H'),
(19, 1, 1, 'H'),
(20, 1, 4, 'H'),
(21, 1, 5, 'H'),
(22, 1, 1, 'H'),
(23, 1, 2, 'H'),
(24, 1, 5, 'H'),
(75, 2, 5, 'H'),
(76, 2, 12, 'H'),
(77, 2, 13, 'H'),
(78, 2, 14, 'H'),
(79, 2, 8, 'H'),
(80, 2, 9, 'H'),
(81, 2, 10, 'H'),
(82, 2, 11, 'H');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
