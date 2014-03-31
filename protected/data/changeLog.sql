INSERT DELAYED IGNORE INTO `cursos` (`id`, `state_curso`, `id_docente`, `idmateria`, `nombre_curso`, `descripcion_curso`, `fecha_inicio`, `fecha_cierre`) VALUES
(1, 'inactive', 1, 1, 'asdf', 'sdf', '2014-03-27', '2014-04-19');


INSERT DELAYED IGNORE INTO `materias` (`idmaterias`, `nombre_materia`, `state_materia`) VALUES
(1, 'Matematicas', 'active'),
(2, 'Español', 'active'),
(3, 'Fisica', 'active'),
(4, 'Quimica', 'active'),
(5, 'Bilogia', 'active'),
(6, 'Inglés', 'active');

----------------------

ALTER TABLE  `talleres` ADD  `id_materia` INT( 5 ) NOT NULL AFTER  `idtalleres` ,
ADD  `id_curso` INT( 5 ) NOT NULL AFTER  `id_materia`;

ALTER TABLE  `talleres` ADD INDEX (  `id_materia` ) ;

ALTER TABLE  `talleres` ADD INDEX (  `id_curso` ) ;

ALTER TABLE  `talleres` ADD FOREIGN KEY (  `id_materia` ) REFERENCES  `math`.`materias` (
`idmaterias`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE  `talleres` ADD FOREIGN KEY (  `id_curso` ) REFERENCES  `math`.`cursos` (
`id`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;


ALTER TABLE  `cursos` ADD FOREIGN KEY (  `id_docente` ) REFERENCES  `math`.`usuarios` (
`id_usuario`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;

ALTER TABLE  `cursos` ADD FOREIGN KEY (  `idmateria` ) REFERENCES  `math`.`materias` (
`idmaterias`
) ON DELETE RESTRICT ON UPDATE RESTRICT ;   


    