<div class="div-burguer">
    <button id="boton-hamburguesa">
        <span>&#9776;</span>
    </button>
</div>
<section class="sidebar">
    <!-- MENU ANTIGUO -->
    <!--<aside>
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
                           
                            <li class="active"><a href="registrar.php"><i class="fa fa-circle-o fa-lg"></i>&nbsp;Registrar</a></li>
                            <li><a href="buscar.php"><i class="fa fa-circle-o fa-lg"></i>Buscar</a></li>
                            <li><a href="importar.php"><i class="fa fa-circle-o fa-lg"></i>Importar tablas desde Excel</a></li>
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

                    <li><a href="actualizar_webs.php"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Actualizar Webs</span></a></li>

                    <li><a href="exportar.php" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar productos con precios</span></a></li>
                    <li><a href="./model/exportar-categorias.php" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar categorias</span></a></li>
                    <li><a href="./model/exportar-tiendas.php" ><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Exportar tiendas</span></a></li>
                    

                    <li><a href="nueva-categoria.php"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>Nueva Categoria</span></a></li>

                    <li><a href="./model/class_ropadecu.php"><i class="fa fa-book fa-lg"></i>&nbsp;&nbsp;&nbsp;<span>ROPADECU</span></a></li>

                    <li><a href="index.php?pag=cargandoa3erp" onclick="return confirm('Seguro que desea actualizar el programar de Gestion?'); "><i class="fa fa-book"></i>&nbsp;&nbsp;&nbsp;<span>Actualizar a3erp</span></a></li>
                </ul>

            </nav>
        </aside> -->

    <!-- MENU NUEVO -->
    <aside class="aside-menu-icon">
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="container" align="center">
                <img src="./assets/images/pollo.png" alt="imagen logo babyline" style="width: 35%">
            </div>

            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel"><a href="index.php">MENÚ</a></h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>

            <div class="offcanvas-body ">

                <span><i class="fa fa-dashboard me-2" style="color: #fff;"></i>Inventario</span>
                <ul class="">
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i><a class="uri" href="registrar.php">Registrar</a></li>
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i><a class="uri" href="buscar.php">Buscar/Operaciones</a></li>

                </ul>

                <!-- <span><i class="fa-solid fa-right-from-bracket me-2" style="color: #fff;"></i><a class="uri" href="salida.php">Salida</a></span> -->
                <ul></ul>

                <!-- <span><i class="fa-solid fa-clock-rotate-left me-2" style="color: #fff;"></i>Historial</span>
                <ul class="">
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i>Entrada</li>
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i>Salida</li>

                </ul> -->

                <span><i class="fa-solid fa-book me-2" style="color: #fff;"></i>Registrar BD Remota</span>
                <ul></ul>
                <span><i class="fa-solid fa-book me-2" style="color: #fff;"></i><a class="uri" href="actualizar_webs.php">Actualizar Webs</a></span>
                <ul></ul>
                <span><i class="fa-solid fa-book me-2" style="color: #fff;"></i><a class="uri" href="exportar.php">Exportar productos de clientes</a></span>
                <ul></ul>
                <span><i class="fa-solid fa-book me-2" style="color: #fff;"></i><a class="uri" href="importar.php">Importar</a></span>
                <ul></ul>
                <span><i class="fa-solid fa-book me-2" style="color: #fff;"></i><a class="uri" href="listado_precios_especificos.php">Listado precios especificos</a></span>
                <ul></ul>

                <span><i class="fa-solid fa-people-arrows me-2"></i>Clientes</span>
                
                <ul class="">
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i><a class="uri" href="registrar_cliente.php">Registrar</a></li>
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i><a class="uri" href="listar_clientes.php">Listado</a></li>

                </ul>

                
                <span><i class="fa-solid fa-list me-2" style="color: #fff;"></i>Categorias</span>
                <ul class="">
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i><a class="uri" href="nueva_categoria.php">Nueva</a></li>
                    <li class="" aria-disabled="true"><i class="fa-regular fa-circle me-2" style="color: #fff;"></i><a class="uri" href="listar_categorias.php">Listado</a></li>

                </ul>
                
                
                <span><i class="fa-solid fa-book me-2" style="color: #fff;"></i>Actualizar a3erp</span>
                <ul></ul>



            </div>
        </div>
    </aside>

</section>