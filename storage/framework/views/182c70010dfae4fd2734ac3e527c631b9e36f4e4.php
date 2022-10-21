<aside class="control-sidebar control-sidebar-dark">
<!-- Control sidebar content goes here -->
<div class="bg-dark">
    <div class="card-body bg-dark box-profile">
    <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="<?php echo e(asset('images/user.png')); ?>" alt="User profile picture">
    </div>

    <h3 class="profile-username text-center ellipsis"><?php echo e(userFullName()); ?> </h3>

    <p class="text-muted text-center"><?php echo e(getRolesName()); ?></p>

    <ul class="list-group bg-dark mb-3">
        <li class="list-group-item">
        <a href="#" class="d-flex align-items-center "><i class="fa fa-lock pr-2"></i><b >Mot de passe</b> </a>
        </li>
        <li class="list-group-item">
        <a href="#" class="d-flex align-items-center"><i class="fa fa-user pr-2"></i><b >Mon profile</b> </a>
        </li>
    </ul>

    <a class="btn btn-primary btn-block" href="<?php echo e(route('logout')); ?>"
        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
        Déconnexion
    </a>

    <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
        <?php echo csrf_field(); ?>
    </form>
    </div>
    <!-- /.card-body -->
</div>
</aside>
<?php /**PATH C:\laragon\www\GestionPersonnelMTMUSR\resources\views/components/sidebar.blade.php ENDPATH**/ ?>