<div class="div-burguer">
    <button id="boton-hamburguesa">
            <span>&#9776;</span>
    </button>
</div>
<section class="sidebar">
        <aside>
            <nav id="menu-hamburguesa">
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header" style="color:white">MAIN NAVIGATION</li>

                    <li><a href="index.php"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Inicio</span></a></li>

                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Inventario</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right fa-lg"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <!-- va a vista/registrar.php -->
                            <li class="active"><a href="registrar.php"><i class="fa fa-circle-o fa-lg"></i>&nbsp;Registrar</a></li>
                            <li><a href="buscar.php"><i class="fa fa-circle-o fa-lg"></i>Buscar</a></li>
                            <li><a href="importar.php"><i class="fa fa-circle-o fa-lg"></i>Importar tablas (categoria)</a></li>
                        </ul>
                    </li>

                    <li><a href="./salida.php"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Salida</span></a></li>


                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Historial</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right fa-lg"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="index.php?pag=entradas"><i class="fa fa-circle-o fa-lg"></i>Entrada</a></li>
                            <li><a href="index.php?pag=historial"><i class="fa fa-circle-o fa-lg"></i>Salida</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-dashboard fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Clientes</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right fa-lg"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="./registrar_cliente.php"><img src="./assets/images/iconos/cliente.png" alt="clientes" class="iconos" ></img>Registrar</a></li>
                            <li><a href=""><i class="fa fa-circle-o fa-lg"></i>Editar</a></li>
                            <li><a href="./listado_precios_especificos.php"><i class="fa fa-circle-o fa-lg"></i>Ver precios especificos</a></li>
                            <li><a href="./listar_clientes.php"><i class="fa fa-circle-o fa-lg"></i>Listar</a></li>
                        </ul>
                    </li>
                    

                    <li><a href="index.php?pag=listdb"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Registrar BD Remota</span></a></li>

                    <li><a href="index.php?pag=actualizar_todas"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Actualizar Webs</span></a></li>

                    <li><a href="exportar.php" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar productos con precios</span></a></li>
                    <li><a href="./model/exportar-categorias.php" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar categorias</span></a></li>
                    <li><a href="./model/exportar-tiendas.php" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar tiendas</span></a></li>
                    <!-- <li><a href="#" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar tiendas</span></a></li> -->

                    <li><a href="importar.php"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Importar</span></a></li>

                    <li><a href="index.php?pag=cargandoa3erp" onclick="return confirm('Seguro que desea actualizar el programar de Gestion?'); "><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<span>Actualizar a3erp</span></a></li>
                </ul>

            </nav>
        </aside>
    </section>

    