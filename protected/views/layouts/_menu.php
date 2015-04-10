<aside class="left-side" style="min-height: 884px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="http://localhost/creditos/themes/credito/dist/img/default_profile.jpg" class="img-circle" alt="User Image">
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
        <ul class="sidebar-menu">
            <li class="header">MENÚ DE NAVEGACIÓN</li>
            <li class="treeview"><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Codeudor</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu" style="overflow: hidden; display: none;"><li><a href="http://localhost/creditos/codeudor/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/codeudor/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/codeudor/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-th"></i> <span>Cliente</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/cliente/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/cliente/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li><li><a href="http://localhost/creditos/cliente/create"><i class="fa fa-angle-double-right"></i>Crear</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-bar-chart-o"></i> <span>Información laboral</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/informacionLaboral/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/informacionLaboral/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li><li><a href="http://localhost/creditos/informacionLaboral/create"><i class="fa fa-angle-double-right"></i>Crear</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-laptop"></i> <span>Cargos</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/cargos/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/cargos/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li><li><a href="http://localhost/creditos/cargos/create"><i class="fa fa-angle-double-right"></i>Crear</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-edit"></i> <span>EPS</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/eps/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/eps/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li><li><a href="http://localhost/creditos/eps/create"><i class="fa fa-angle-double-right"></i>Crear</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-edit"></i> <span>Usuarios</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li class="header">Administrador de Usuarios</li><li><a href="http://localhost/creditos/cruge/ui/editprofile"><i class="fa fa-user"></i>Editar Perfil</a></li><li><a href="http://localhost/creditos/cruge/ui/usermanagementcreate"><i class="fa fa-user"></i>Crear Usuario</a></li><li><a href="http://localhost/creditos/cruge/ui/usermanagementadmin"><i class="fa fa-user"></i>Administrar</a></li><li class="header">Campos Personalizados</li><li><a href="http://localhost/creditos/cruge/ui/fieldsadminlist"><i class="fa fa-user"></i> Listar Campos de Perfil</a></li><li><a href="http://localhost/creditos/cruge/ui/fieldsadmincreate"><i class="fa fa-user"></i>Crear Campo de Perfil</a></li><li class="header">Roles y Asignaciones</li><li><a href="http://localhost/creditos/cruge/ui/rbaclistroles"><i class="fa fa-user"></i>Roles</a></li><li><a href="http://localhost/creditos/cruge/ui/rbaclisttasks"><i class="fa fa-user"></i>Tareas</a></li><li><a href="http://localhost/creditos/cruge/ui/rbaclistops"><i class="fa fa-user"></i>Operaciones</a></li><li><a href="http://localhost/creditos/cruge/ui/rbacusersassignments"><i class="fa fa-user"></i>Asignar Roles a Usuarios</a></li><li class="header">Sistema</li><li><a href="http://localhost/creditos/cruge/ui/sessionadmin"><i class="fa fa-user"></i>Sesiones</a></li><li><a href="http://localhost/creditos/cruge/ui/systemupdate"><i class="fa fa-user"></i>Variables del Sistema</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Referencias</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/referencias/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/referencias/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/referencias/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Tipo Abono</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/tipoAbono/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/tipoAbono/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/tipoAbono/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Pensiones</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/pensiones/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/pensiones/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/pensiones/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Parentescos</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/parentescoReferencia/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/parentescoReferencia/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/parentescoReferencia/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Tipo vinculación EPS</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/tipoVinculacionEps/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/tipoVinculacionEps/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/tipoVinculacionEps/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Solicitud de prestamo</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/solicitudPrestamo/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/solicitudPrestamo/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/solicitudPrestamo/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li><li class="treeview "><a href="#">
                    <i class="fa fa-dashboard"></i> <span>Tipo de referencia</span> <i class="fa fa-angle-left pull-right"></i>
                </a><ul class="treeview-menu"><li><a href="http://localhost/creditos/tipoReferencia/create"><i class="fa fa-angle-double-right"></i>Crear</a></li><li><a href="http://localhost/creditos/tipoReferencia/index"><i class="fa fa-angle-double-right"></i>Listar</a></li><li><a href="http://localhost/creditos/tipoReferencia/admin"><i class="fa fa-angle-double-right"></i> Administrador</a></li></ul></li>        </ul>
    </section>
    <!-- /.sidebar -->
</aside>