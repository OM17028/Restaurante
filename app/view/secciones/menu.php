           
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><a href="<?php echo URL; ?>Dashboard"><img class="img-rounded" src="<?php echo URL; ?>public_html/img/LOGO.png" alt="a" width="150" ></a></div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Dashboard">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Restaurantes">Restaurantes</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Productos">Productos</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Reportes">Reportes</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Usuarios">Usuarios</a>
                    <div class="sidebar-foot">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="<?php echo URL ?>Login/cerrar"><?php if($_SESSION["nuser"]){ echo 'Cerrar Sesion'; }else{ echo'Iniciar Sesion'; } ?></a>
                    
                    </div>
                </div>
                
            </div>
        