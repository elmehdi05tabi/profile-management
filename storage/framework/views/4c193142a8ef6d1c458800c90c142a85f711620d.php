<nav class="navbar navbar-expand-lg navbar-light bg-black">
    <ul class="navbar-nav ">
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo e(route('home')); ?>">Home</a></li>
        <?php if(auth()->guard()->guest()): ?>
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo e(route('login.show')); ?>">Se Connecter</a></li>    
        <?php endif; ?>
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo e(route('profiles.index')); ?>">Tous Les Profiles</a>
        </li>
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo e(route('settings.index')); ?>">Information</a></li>
        <li class="nav-item"><a class="nav-link text-light" href="<?php echo e(route('profiles.create')); ?>">Ajouter Profiles</a></li>
    </ul>
    <?php if(auth()->guard()->check()): ?>
    <div class="dropdown open">
        <button
            class="btn btn-secondary dropdown-toggle"
            type="button"
            id="triggerId"
            data-bs-toggle="dropdown"
            aria-haspopup="true"
            aria-expanded="false"
        >
        <?php echo e(Auth::user()->name); ?>

    </button>
        <div class="dropdown-menu" aria-labelledby="triggerId">
            <button class="dropdown-item" href="#">Action</button>
            <button class="dropdown-item">
                <a class="nav-link text-danger" href="<?php echo e(route('login.logout')); ?>">Se Déconnecter</a>
            </button>
        </div>
    </div>
        <?php endif; ?>
</nav>
<?php /**PATH C:\laravel_tutorial\resources\views/parties/nav.blade.php ENDPATH**/ ?>