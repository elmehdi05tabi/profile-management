<div class="col-sm-4 my-5">
    <div class="card">
        <img class="card-img-top" src="https://picsum.photos/100/60" alt="Card image cap" />
        <div class="card-body">
            <h4 class="card-title"><?php echo e($profile->name); ?></h4>
            <p class="card-text"><?php echo e(Str::limit($profile->bio,50)); ?></p>
            <a  class="stretched-link" href="<?php echo e(route('profile.show',$profile->id)); ?>"></a>
        </div>
        <div class="card-foot border-top bg-light px-3 py-3 d-flex justify-content-center gap-3" style="z-index: 10">
            <form action="<?php echo e(route('profile.destroy',$profile->id)); ?>" method="POST">
                <?php echo method_field('DELETE'); ?>
                <?php echo csrf_field(); ?>
                <button class="btn btn-danger " >Supprimer</button>
            </form>
            <form action="<?php echo e(route('profile.edit',$profile->id)); ?>"  method="GET">
                <button class="btn btn-primary me-5">
                    Modifier
                </button>
            </form>
        </div>
    </div>
</div><?php /**PATH C:\laravel_tutorial\resources\views/components/profile-card.blade.php ENDPATH**/ ?>