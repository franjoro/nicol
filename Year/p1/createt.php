<?php
$date =date('y')+1;
$base="s1000114_nicol";
$xd =$base.$date;
$conexion=mysqli_connect("localhost","s1000114","cisberm30CS","$xd"); 



mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `actividades` (
  `idAct` int(11) NOT NULL,
  `Titulo` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `Descripcion` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `idMa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Role` int(11) NOT NULL,
  `Bimestre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Des1` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcen1` float DEFAULT NULL,
  `Des2` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcen2` float DEFAULT NULL,
  `Des3` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcen3` float DEFAULT NULL,
  `Des4` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcen4` float DEFAULT NULL,
  `Des5` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Porcen5` float DEFAULT NULL,
  `IdG` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Num` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2873 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
");

mysqli_query($conexion,"ALTER TABLE actividades ADD PRIMARY KEY (idAct);");


mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `bimestre` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");
mysqli_query($conexion,"ALTER TABLE bimestre ADD PRIMARY KEY (id);");
mysqli_query($conexion,"INSERT INTO bimestre VALUES ('1')");



 mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `codigo` (
  `idCodigo` int(11) NOT NULL,
  `Codigo` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `valor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

mysqli_query($conexion,"ALTER TABLE codigo ADD PRIMARY KEY (idCodigo);");

mysqli_query($conexion,"INSERT INTO codigo (idCodigo, Codigo, valor) VALUES
(1, 'No hace tareas asignadas en casa o en clase.', -1),
(2, 'Entregó tarea incompleta.', -1),
(3, 'Llega tarde al Colegio y a la formación.', -2),
(4, 'Llega tarde a clase después del receso.', -2),
(5, 'Muestra Indiferencia al aprendizaje de las distintas disciplinas.', -3),
(6, 'No pone atención ni participa en clase.', -2),
(7, 'Bajo rendimiento académico.', -1),
(8, 'Ausente', -3),
(9, 'Ausencia Justificada.', 3),
(10, 'Se retiró de la clase por acto de indisciplina.', -5),
(11, 'Se retiró de clase por enfermedad.', 0),
(12, 'Se ausenta de clase sin permiso.', -2),
(13, 'No sigue orientaciones de sus educadores.', -2),
(14, 'No trae Agenda Escolar.', -2),
(15, 'No entrega notificación al Padre de Familia.', -2),
(16, 'No porta el Carnet Estudiantil.', -2),
(17, 'Fuera de su lugar en los cambios de clase.', -1),
(18, 'Se cambia de lugar sin permiso o autorización del docente guía', -1),
(19, 'Permanece en el aula en horario no permitido.', -1),
(20, 'No presenta el uniforme completo.', -3),
(21, 'Utiliza un corte de cabello inadecuado o tiene el cabello largo.', -3),
(22, 'Se presenta maquillada o con las uñas pintadas.', -3),
(23, 'No trae útiles de acuerdo al horario.', -2),
(24, 'Habla durante la formación y hace desorden en la fila.', -2),
(25, 'Come en clase o mastica chicle.', -2),
(26, 'No cuida su aseo ni presentación personal.', -2),
(27, 'Utiliza celular en clase, iglesia, formación y ambiente del Colegio durante la jornada.', -3),
(28, 'Indiferente a los valores (éticos, morales y espirituales.)', -5),
(29, 'Indiferentes a las actividades del colegio (culturales, deportivas, religiosas)', -5),
(30, 'No es Proactivo.', -5),
(31, 'Agrede a su compañero(a) verbal y físicamente. (Informe preventivo)', -10),
(32, 'Influye negativamente en sus compañeros.', -2),
(33, 'Copia durante los exámenes.', -5),
(34, 'Registra y/o altera el Diario Pedagógico.', -5),
(35, 'Daña el mobiliario y las instalaciones (informe preventivo)', -10),
(36, 'Falta el respeto al Educador Salesiano.', -10),
(37, 'Cometió acto que atenta contra la moral (informe preventivo)', -10),
(38, 'Colabora con el cuido y limpieza del aula', 1),
(39, 'Colabora con la directiva de grado', 1),
(40, 'Muestra interes por el aprendizaje en las diferentes disciplinas', 1),
(41, 'Mantiene una actitud positiva hacia la propuesta educatica del colegio', 1),
(42, 'Influye positivamente a sus compañeros', 1),
(43, 'Plantea sus inquietudes con franqueza, respeto y honestidad', 1),
(44, 'Trae su uniforme completo y cuida su presentacion personal', 1),
(45, 'Presenta sus utiles escolares en orden y aseo', 1),
(46, 'Trae sus materiales de acuerdo al horario establecido', 1),
(47, 'Cumple con sus tareas y deberes escolares', 1),
(48, 'Pone atencion y participa en clase', 1),
(49, 'Mantiene una actitud de mejora y esfuerzoconstante de sus esfuerzos de aprendizaje', 1),
(50, 'Es creativo, disponible y colaborador', 1),
(51, 'Manifiesta compostura en los de formacion comunitaria', 1),
(52, 'Muestra actitud positiva dentro del salon de clases', 1),
(53, 'Busca soluciones y se muestra solidario a los problemas y necesidades de los demas', 1),
(54, 'Ha mejorado su comportamiento y actitudes', 1),
(55, 'Se identifica con los valores religiosos y vive', 1),
(56, 'Participa con entusiasmo y alegria en las actividadesdel colegio', 1),
(57, 'Ha respondido positivamente a las directrices y normas del colegio', 1),
(58, 'Es un lider positivo', 1),
(59, 'Es respetuoso ante sus compañeros y autoridades del colegio', 1),
(60, 'Vela por el cuido y mantenimiento de los bienes del colegio', 1),
(61, 'Presenta Permiso de salida de Clase ', 2);
");


 mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `aplicados` (
  `id_ap` int(11) NOT NULL,
  `idCodigo` int(11) DEFAULT NULL,
  `Descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `IdEs` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `idM` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Role` int(11) NOT NULL,
  `fecha` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `bimestre` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8671 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");

mysqli_query($conexion,"ALTER TABLE aplicados ADD PRIMARY KEY (id_ap);");



 mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `estudiantes` (
  `IdEs` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `IdG` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `conducta1` int(11) NOT NULL DEFAULT '100',
  `conducta2` int(11) NOT NULL DEFAULT '100',
  `conducta3` int(11) NOT NULL DEFAULT '100',
  `conducta4` int(11) NOT NULL DEFAULT '100'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");


mysqli_query($conexion,"ALTER TABLE estudiantes ADD PRIMARY KEY (IdEs);");

 mysqli_query($conexion,"
CREATE TABLE IF NOT EXISTS `grados` (
  `idG` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Seccion` varchar(5) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
");

mysqli_query($conexion,"ALTER TABLE grados ADD PRIMARY KEY (idG);");

mysqli_query($conexion,"INSERT INTO grados (idG, Nombre, Seccion) VALUES
('CuartoA', 'Cuarto', 'A'),
('CuartoB', 'Cuarto', 'B'),
('DecimoA', 'DÃ©cimo', 'A'),
('DecimoB', 'DÃ©cimo', 'B'),
('DecimoC', 'DÃ©cimo', 'C'),
('NovenoA', 'Noveno', 'A'),
('NovenoB', 'Noveno', 'B'),
('OctavoA', 'Octavo', 'A'),
('OctavoB', 'Octavo', 'B'),
('PrimeroA', 'Primero', 'A'),
('PrimeroB', 'Primero', 'B'),
('QuintoA', 'Quinto', 'A'),
('QuintoB', 'Quinto', 'B'),
('SegundoA', 'Segundo', 'A'),
('SegundoB', 'Segundo', 'B'),
('SeptimoA', 'Septimo', 'A'),
('SeptimoB', 'Septimo', 'B'),
('SextoA', 'Sexto', 'A'),
('SextoB', 'Sexto', 'B'),
('TerceroA', 'Tercero', 'A'),
('TerceroB', 'Tercero', 'B'),
('UndecimoA', 'Undecimo', 'A'),
('UndecimoB', 'Undecimo', 'B'),
('UndecimoC', 'Undecimo', 'C');");






mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `maestros` (
  `idM` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Genero` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Puesto` varchar(35) COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `IdG` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(100) COLLATE utf8_spanish_ci DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
");

mysqli_query($conexion,"ALTER TABLE maestros ADD PRIMARY KEY (idM);");


mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `materias` (
  `idMa` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Cant` int(11) NOT NULL,
  `idG` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `idM` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `2idM` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Bact1` int(11) DEFAULT '1',
  `Bact2` int(11) DEFAULT '1',
  `Bact3` int(11) DEFAULT '1',
  `Role` int(11) 
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

");

mysqli_query($conexion,"ALTER TABLE materias ADD PRIMARY KEY (idMa);");


mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `notas` (
  `idNota` int(11) NOT NULL,
  `Nota` int(11) DEFAULT NULL,
  `idAct` int(11) NOT NULL,
  `IdEs` varchar(23) COLLATE utf8_spanish_ci NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;	");

mysqli_query($conexion,"ALTER TABLE notas ADD PRIMARY KEY (idNota);");


mysqli_query($conexion,"CREATE TABLE IF NOT EXISTS `users` (
  `idU` int(11) NOT NULL,
  `Username` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `Role` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `acceso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;");


mysqli_query($conexion,"ALTER TABLE users ADD PRIMARY KEY (idU);");

mysqli_query($conexion,"INSERT INTO `users` (`idU`, `Username`, `Password`, `Role`, `acceso`) VALUES
(9025, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 1)
");


// mysqli_query($conexion,"");
header ("location:../");
 ?>