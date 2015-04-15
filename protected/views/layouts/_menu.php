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
            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'cruge')?'active':'');?>">
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li class="header">Administrador de Usuarios</li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/editprofile"); ?> "><i class="fa fa-user"></i>Editar Perfil</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/usermanagementcreate"); ?>"><i class="fa fa-user"></i>Crear Usuario</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/usermanagementadmin"); ?>"><i class="fa fa-user"></i>Administrar</a></li>
                    <li class="header">Campos Personalizados</li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/fieldsadminlist"); ?>"><i class="fa fa-user"></i> Listar Campos de Perfil</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/fieldsadmincreate"); ?>"><i class="fa fa-user"></i>Crear Campo de Perfil</a></li>
                    <li class="header">Roles y Asignaciones</li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbaclistroles"); ?>"><i class="fa fa-user"></i>Roles</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbaclisttasks"); ?>"><i class="fa fa-user"></i>Tareas</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbaclistops"); ?>"><i class="fa fa-user"></i>Operaciones</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/rbacusersassignments"); ?>"><i class="fa fa-user"></i>Asignar Roles a Usuarios</a></li>
                    <li class="header">Sistema</li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/sessionadmin"); ?>"><i class="fa fa-user"></i>Sesiones</a></li>
                    <li><a href="<?php echo Yii::app()->createUrl("cruge/ui/systemupdate"); ?>"><i class="fa fa-user"></i>Variables del Sistema</a></li>
                </ul>
            </li>
            
            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'cursos')?'active':''); ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                    <span>Cursos</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('cursos/admin') ?>">
                            <i class="fa fa-angle-double-right"></i> Administrar
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('cursos/create') ?>">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                </ul>                
            </li>


            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'area')?'active':''); ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                    <span>Areas</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('area/admin') ?>">
                            <i class="fa fa-angle-double-right"></i> Administrar
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('area/create') ?>">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                </ul>                
            </li>
            
            
            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'contenidos')?'active':''); ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                    <span>Contenidos</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('contenidos/admin') ?>">
                            <i class="fa fa-angle-double-right"></i> Administrar
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('contenidos/create') ?>">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                </ul>                
            </li>
            
            
            
             <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'ejercicios')?'active':''); ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                    <span>Ejercicios</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('ejercicios/admin') ?>">
                            <i class="fa fa-angle-double-right"></i> Administrar
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('ejercicios/create') ?>">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                </ul>                
            </li>
            
            

            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'asignatura')?'active':''); ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                    <span>Asignatura</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('asignatura/admin') ?>">
                            <i class="fa fa-angle-double-right"></i> Administrar
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('asignatura/create') ?>">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                </ul>                
            </li>


            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'grado')?'active':''); ?>">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                    <span>Grados</span> 
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('grado/admin') ?>">
                            <i class="fa fa-angle-double-right"></i> Administrar
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo Yii::app()->createUrl('grado/create') ?>">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                </ul>                
            </li>


            <li class="treeview <?php echo (strstr(strtolower(Yii::app()->controller->uniqueID), 'jbackup')?'active':''); ?>">
                <a href="<?php echo Yii::app()->createUrl('jbackup') ?>">
                    <i class="fa fa-angle-double-right"></i> BackUp
                </a>
            </li>



        </ul>
        <?php } ?>
    </section>
    <!-- /.sidebar -->
</aside>