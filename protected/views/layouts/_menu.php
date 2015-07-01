<aside class="left-side" style="min-height: 884px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div>
            <img src="<?php echo Yii::app()->baseUrl . '/themes/OzAuLink/images/iefo.png'; ?>" style="margin: 0px 20%;">
        </div>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Yii::app()->baseUrl . '/themes/OzAuLink/images/user.jpg'; ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?php echo Yii::app()->user->name; ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Conectado</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..." style="height: 25px;width: 94%;">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat" style=""><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <?php if(!Yii::app()->user->isGuest){?>
        <ul class="sidebar-menu">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
           <?php 

                    if( Yii::app()->user->checkAccess('usuario_docente') 
                     OR Yii::app()->user->checkAccess('usuario_alumno') ):
            ?>
                <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'cruge')?'active':'');?>">
                    <a href="#">
                        <i class="fa fa-edit"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                    </a>


                            <ul class="treeview-menu">
                                <?php if( Yii::app()->user->checkAccess('action_ui_editprofile') 
                                       OR Yii::app()->user->checkAccess('action_ui_usermanagementcreate')
                                       OR Yii::app()->user->checkAccess('action_ui_usermanagementadmin') ): ?>
                                    <li class="header">Administrador de Usuarios</li>
                                    <?php if(Yii::app()->user->checkAccess('action_ui_editprofile') ): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/editprofile"); ?> "><i class="fa fa-user"></i>Editar Perfil</a></li>
                                    <?php endif; ?>
                                    <?php if( Yii::app()->user->checkAccess('action_ui_usermanagementcreate') ): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/usermanagementcreate"); ?>"><i class="fa fa-user"></i>Crear Usuario</a></li>
                                    <?php endif; ?>
                                    <?php if( Yii::app()->user->checkAccess('action_ui_usermanagementadmin') ): ?>
                                            <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/usermanagementadmin"); ?>"><i class="fa fa-user"></i>Administrar</a></li>
                                    <?php endif; ?>
                                <?php endif; ?>

                                <?php if( Yii::app()->user->checkAccess('action_ui_fieldsadminlist')
                                      OR  Yii::app()->user->checkAccess('action_ui_fieldsadmincreate') ): ?>
                                        <li class="header">Campos Personalizados</li>
                                        <?php if( Yii::app()->user->checkAccess('action_ui_fieldsadminlist') ): ?>
                                                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/fieldsadminlist"); ?>"><i class="fa fa-user"></i> Listar Campos de Perfil</a></li>
                                        <?php endif; ?>
                                        <?php if( Yii::app()->user->checkAccess('action_ui_fieldsadmincreate') ): ?>
                                                <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/fieldsadmincreate"); ?>"><i class="fa fa-user"></i>Crear Campo de Perfil</a></li>
                                        <?php endif; ?>
                                <?php endif; ?>
                                <?php if(  Yii::app()->user->checkAccess('action_ui_rbaclistroles')
                                        OR Yii::app()->user->checkAccess('action_ui_rbaclisttasks')
                                        OR Yii::app()->user->checkAccess('action_ui_rbaclistops')
                                        OR Yii::app()->user->checkAccess('action_ui_rbacusersassignments') ): ?>
                                    <li class="header">Roles y Asignaciones</li>
                                    <?php if( Yii::app()->user->checkAccess('action_ui_rbaclistroles') ): ?>
                                            <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbaclistroles"); ?>"><i class="fa fa-user"></i>Roles</a></li>
                                    <?php endif; ?>
                                    <?php if( Yii::app()->user->checkAccess('action_ui_rbaclisttasks') ): ?>
                                            <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbaclisttasks"); ?>"><i class="fa fa-user"></i>Tareas</a></li>
                                    <?php endif; ?>
                                    <?php if( Yii::app()->user->checkAccess('action_ui_rbaclistops') ): ?>
                                            <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbaclistops"); ?>"><i class="fa fa-user"></i>Operaciones</a></li>
                                    <?php endif; ?>
                                    <?php if( Yii::app()->user->checkAccess('action_ui_rbacusersassignments') ): ?>
                                            <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbacusersassignments"); ?>"><i class="fa fa-user"></i>Asignar Roles a Usuarios</a></li>
                                    <?php endif; ?>
                                <?php  endif; ?>
                                <?php if( Yii::app()->user->checkAccess('sessionadmin')
                                       OR Yii::app()->user->checkAccess('systemupdate') ): ?>
                                        <li class="header">Sistema</li>
                                        <?php if( Yii::app()->user->checkAccess('sessionadmin') ): ?>
                                                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/sessionadmin"); ?>"><i class="fa fa-user"></i>Sesiones</a></li>
                                        <?php endif; ?>
                                        <?php if( Yii::app()->user->checkAccess('systemupdate') ): ?>
                                                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/systemupdate"); ?>"><i class="fa fa-user"></i>Variables del Sistema</a></li>
                                        <?php endif; ?>    
                                <?php endif; ?>
                            </ul>
                    
                </li>
            <?php endif; ?>
            <?php if( Yii::app()->user->checkAccess('action_cursos_admin')  
                  OR  Yii::app()->user->checkAccess('action_cursos_create')
                  OR  Yii::app()->user->checkAccess('action_cursos_index')  ): ?>
                <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'cursos')?'active':''); ?>">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> 
                        <span>Cursos</span> 
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <?php if( Yii::app()->user->checkAccess('action_cursos_admin') ): ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('cursos/admin') ?>">
                                    <i class="fa fa-angle-double-right"></i> Administrar
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if( Yii::app()->user->checkAccess('action_cursos_create') ): ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('cursos/create') ?>">
                                    <i class="fa fa-angle-double-right"></i>Crear
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php if( Yii::app()->user->checkAccess('action_cursos_index') ): ?>
                            <li>
                                <a href="<?php echo Yii::app()->createUrl('cursos/index') ?>">
                                    <i class="fa fa-angle-double-right"></i>Lista
                                </a>
                            </li>
                        <?php endif; ?>

                    </ul>                
                </li>
            <?php endif; ?>
            
            <?php if( Yii::app()->user->checkAccess('action_area_admin')
                   OR Yii::app()->user->checkAccess('action_area_index')
                   OR Yii::app()->user->checkAccess('action_area_create')): ?>
                    <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'area')?'active':''); ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> 
                            <span>Areas</span> 
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <?php if(Yii::app()->user->checkAccess('action_area_admin')): ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('area/admin') ?>">
                                        <i class="fa fa-angle-double-right"></i> Administrar
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Yii::app()->user->checkAccess('action_area_create')): ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('area/create') ?>">
                                        <i class="fa fa-angle-double-right"></i>Crear
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(Yii::app()->user->checkAccess('action_area_index')): ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('area/index') ?>">
                                        <i class="fa fa-angle-double-right"></i>Lista
                                    </a>
                                </li>
                            <?php endif; ?>

                        </ul>                
                    </li>
            <?php endif; ?>
            
            <?php if( Yii::app()->user->checkAccess('action_contenidos_admin') 
                    OR  Yii::app()->user->checkAccess('action_contenidos_create') ): ?>
                    <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'contenidos')?'active':''); ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> 
                            <span>Contenidos</span> 
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <?php if( Yii::app()->user->checkAccess('action_contenidos_admin') ): ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('contenidos/admin') ?>">
                                                <i class="fa fa-angle-double-right"></i> Administrar
                                            </a>
                                        </li>
                            <?php endif; ?>
                            <?php if( Yii::app()->user->checkAccess('action_contenidos_create') ): ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('contenidos/create') ?>">
                                                <i class="fa fa-angle-double-right"></i>Crear
                                            </a>
                                        </li>
                            <?php endif; ?>
                        </ul>                
                    </li>
            <?php endif; ?>
            
            <?php if( Yii::app()->user->checkAccess('action_ejercicios_admin') 
                    OR  Yii::app()->user->checkAccess('action_ejercicios_create') ): ?>

                     <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'ejercicios')?'active':''); ?>">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> 
                            <span>Ejercicios</span> 
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <?php if(Yii::app()->user->checkAccess('action_ejercicios_admin')): ?>
                                 <li>
                                    <a href="<?php echo Yii::app()->createUrl('ejercicios/admin') ?>">
                                        <i class="fa fa-angle-double-right"></i> Administrar
                                    </a>
                                 </li>
                            <?php endif; ?>

                            <?php if(Yii::app()->user->checkAccess('action_ejercicios_admin')): ?>
                                <li>
                                    <a href="<?php echo Yii::app()->createUrl('ejercicios/create') ?>">
                                        <i class="fa fa-angle-double-right"></i>Crear
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>                
                    </li>

            <?php endif; ?>
            
            <?php if( Yii::app()->user->checkAccess('action_asignatura_admin') 
                    OR  Yii::app()->user->checkAccess('action_asignatura_create') ): ?>
                            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'asignatura')?'active':''); ?>">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> 
                                    <span>Asignatura</span> 
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if(Yii::app()->user->checkAccess('action_asignatura_admin') ): ?>
                                            <li>
                                                <a href="<?php echo Yii::app()->createUrl('asignatura/admin') ?>">
                                                    <i class="fa fa-angle-double-right"></i> Administrar
                                                </a>
                                            </li>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('action_asignatura_create') ): ?>
                                            <li>
                                                <a href="<?php echo Yii::app()->createUrl('asignatura/create') ?>">
                                                    <i class="fa fa-angle-double-right"></i>Crear
                                                </a>
                                            </li>
                                    <?php endif; ?>
                                </ul>                
                            </li>
            <?php endif; ?>  

            <?php if( Yii::app()->user->checkAccess('action_asignatura_admin') 
                    OR  Yii::app()->user->checkAccess('action_asignatura_create') ): ?>
                            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'asignatura')?'active':''); ?>">
                                <a href="#">
                                    <i class="fa fa-dashboard"></i> 
                                    <span>Asignatura</span> 
                                    <i class="fa fa-angle-left pull-right"></i>
                                </a>
                                <ul class="treeview-menu">
                                    <?php if(Yii::app()->user->checkAccess('action_asignatura_admin') ): ?>
                                            <li>
                                                <a href="<?php echo Yii::app()->createUrl('asignatura/admin') ?>">
                                                    <i class="fa fa-angle-double-right"></i> Administrar
                                                </a>
                                            </li>
                                    <?php endif; ?>
                                    <?php if(Yii::app()->user->checkAccess('action_asignatura_create') ): ?>
                                            <li>
                                                <a href="<?php echo Yii::app()->createUrl('asignatura/create') ?>">
                                                    <i class="fa fa-angle-double-right"></i>Crear
                                                </a>
                                            </li>
                                    <?php endif; ?>
                                </ul>                
                            </li>
            <?php endif; ?>


            <?php if( Yii::app()->user->checkAccess('action_talleres_admin') 
                      OR  Yii::app()->user->checkAccess('action_talleres_create') ): ?>
                        <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'talleres')?'active':''); ?>">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> 
                                <span>Talleres</span> 
                                <i class="fa fa-angle-left pull-right"></i>
                            </a>
                            <ul class="treeview-menu">
                                <?php  if(Yii::app()->user->checkAccess('action_talleres_admin')): ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('talleres/admin') ?>">
                                                <i class="fa fa-angle-double-right"></i> Administrar
                                            </a>
                                        </li>
                                <?php endif; ?>
                                <?php if(Yii::app()->user->checkAccess('action_talleres_create') ): ?>
                                        <li>
                                            <a href="<?php echo Yii::app()->createUrl('talleres/create') ?>">
                                                <i class="fa fa-angle-double-right"></i>Crear
                                            </a>
                                        </li>
                                <?php endif; ?>
                            </ul>                
                        </li>
            <?php endif; ?>

            <?php  if(Yii::app()->user->checkAccess('action_jbackup')): ?>
                        <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'jbackup')?'active':''); ?>">
                            <a href="<?php echo Yii::app()->createUrl('jbackup') ?>">
                                <i class="fa fa-angle-double-right"></i> BackUp
                            </a>
                        </li>
            <?php endif ?>

        </ul>
        <?php } ?>
    </section>
    <!-- /.sidebar -->
</aside>