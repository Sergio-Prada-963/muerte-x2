<aside class="main-sidebar sidebar-ligth-orange elevation-5">
    <!-- Brand Logo -->
    <a href="../../index3.html" class="brand-link navbar-orange ">
      <img src="views/assets/img/logo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Alquilartemis</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="views/assets/img/perfil.jpg" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <p class="d-block">Pepito Perez</p>
        </div>
      </div>

    

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column orange" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
              <a href="/xampp/var/www/html/php/muerte-x2/alquilartemis" class="nav-link <?php if($urlArray[5]=='') : ?> active <?php endif ?>">
                  <i class="nav-icon far fa-user"></i>
                  <p>
                      Home
                  </p>
              </a>
            </li>
            
            <li class="nav-item">
                <a href="./empleado" class="nav-link <?php if($urlArray[5]=='empleado') : ?> active <?php endif ?>">
                    <i class="nav-icon far fa-user"></i>
                    <p>
                        Empleado
                    </p>
                </a>
            </li>
          
           <li class="nav-item">
               <a href="./producto" class="nav-link <?php if($urlArray[5]=='producto') : ?> active <?php endif ?>">
                   <i class="nav-icon far fa-user"></i>
                   <p>
                       Productos
                   </p>
               </a>
           </li>

           <li class="nav-item">
               <a href="./proveedor" class="nav-link <?php if($urlArray[5]=='proveedor') : ?> active <?php endif ?>">
                   <i class="nav-icon far fa-user"></i>
                   <p>
                       Proveedores
                   </p>
               </a>
           </li>

           <li class="nav-item">
               <a href="./cliente" class="nav-link <?php if($urlArray[5]=='cliente') : ?> active <?php endif ?>">
                   <i class="nav-icon far fa-user"></i>
                   <p>
                       Clientes
                   </p>
               </a>
           </li>

           <li class="nav-item">
               <a href="./obras" class="nav-link <?php if($urlArray[5]=='obras') : ?> active <?php endif ?>">
                   <i class="nav-icon far fa-user"></i>
                   <p>
                       Obras
                   </p>
               </a>
           </li>         
           
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-envelope"></i>
              <p>
                Alquileres
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                   <a href="./salida" class="nav-link <?php if($urlArray[5]=='salidas') : ?> active <?php endif ?>">
                       <i class="nav-icon far fa-user"></i>
                       <p>
                           Salidas
                       </p>
                   </a>
                </li> 
                <li class="nav-item">
                    <a href="./salidaDetalle" class="nav-link <?php if($urlArray[5]=='salidaDetalle') : ?> active <?php endif ?>">
                       <i class="nav-icon far fa-user"></i>
                       <p>Salida Detalle</p>
                    </a>
                </li> 
            </ul>
           </li>

             

             
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->