<aside class="left-side" style="min-height: 884px;">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" style="height: auto;">
        <!-- Sidebar user panel -->
        <div>
            <img src="<?php echo Yii::app()->baseUrl.'/themes/OzAuLink/images/iefo.png'; ?>" style="margin: 0px 20%;">
        </div>
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo Yii::app()->baseUrl.'/themes/OzAuLink/images/user.png'; ?>" class="img-circle" alt="User Image">
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
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> 
                        <span>Codeudor</span> 
                        <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu" style="overflow: hidden; display: none;">
                    <li>
                        <a href="http://localhost/creditos/codeudor/create">
                            <i class="fa fa-angle-double-right"></i>Crear
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/creditos/codeudor/index">
                            <i class="fa fa-angle-double-right"></i>Listar
                        </a>
                    </li>
                    <li>
                        <a href="http://localhost/creditos/codeudor/admin">
                            <i class="fa fa-angle-double-right"></i>Administrador
                        </a>
                    </li>
                </ul>
            </li>      
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>