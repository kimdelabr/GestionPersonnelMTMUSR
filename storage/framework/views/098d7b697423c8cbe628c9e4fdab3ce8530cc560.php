<nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="<?php echo e(route('home')); ?>" class="nav-link <?php echo e(setMenuClass('home', 'active')); ?>">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Accueil
              </p>
            </a>
          </li>

        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("User")): ?>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Gestion administrative 
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="nav-icon fas fa-chart-line"></i>
                  <p>Gestion des affectations</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-swatchbook"></i>
                  <p>Gestion du fichier du personnel</p>
                </a>
              </li>
            </ul>
        </li>
        <?php endif; ?>



        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Admin")): ?>
        <li class="nav-item <?php echo e(setMenuClass('admin.habilitations.', 'menu-open')); ?>">
            <a href="#" class="nav-link <?php echo e(setMenuClass('admin.habilitations.', 'active')); ?>">
              <i class=" nav-icon fas fa-user-shield"></i>
              <p>
                Habilitations
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item ">
                <a
                href="<?php echo e(route('admin.habilitations.users.index')); ?>"
                class="nav-link <?php echo e(setMenuClass('admin.habilitations.users.index', 'active')); ?>"
                >
                  <i class=" nav-icon fas fa-users-cog"></i>
                  <p>Utilisateurs</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-fingerprint"></i>
                  <p>Roles et permissions</p>
                </a>
              </li>
            </ul>
        </li>
       


        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-cogs"></i>
                <p>
                Management
                <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                    <i class="nav-icon far fa-circle"></i>
                    <p>Structures</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#"
                        class="nav-link">
                    <i class="nav-icon fas fa-list-ul"></i>
                    <p>Banques</p>
                    </a>
                </li>
                
            </ul>
        </li>
        <?php endif; ?>






        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("User")): ?>
        <li class="nav-header">Gestion de la mutuelle</li>
        <li class="nav-item">
            <a href="#" class="nav-link ">
                <i class="nav-icon fas fa-users"></i>
                <p>
                Personnel du ministère
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-exchange-alt"></i>
                <p>
                Gestion des évènements
                </p>
            </a>
        </li>
        <?php endif; ?>






        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check("Staff")): ?>
        <li class="nav-header">CAISSE</li>
        <li class="nav-item">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-coins"></i>
                <p>
                Gestion des primes
                </p>
            </a>
        </li>
        <?php endif; ?>
        

        </ul>
      </nav>
<?php /**PATH C:\laragon\www\GestionPersonnelMTMUSR\resources\views/components/menu.blade.php ENDPATH**/ ?>