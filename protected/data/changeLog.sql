INSERT DELAYED IGNORE INTO `cursos` (`id`, `state_curso`, `id_docente`, `idmateria`, `nombre_curso`, `descripcion_curso`, `fecha_inicio`, `fecha_cierre`) VALUES
(1, 'inactive', 1, 1, 'asdf', 'sdf', '2014-03-27', '2014-04-19');


INSERT DELAYED IGNORE INTO `materias` (`idmaterias`, `nombre_materia`, `state_materia`) VALUES
(1, 'Matematicas', 'active'),
(2, 'Español', 'active'),
(3, 'Fisica', 'active'),
(4, 'Quimica', 'active'),
(5, 'Bilogia', 'active'),
(6, 'Inglés', 'active');

