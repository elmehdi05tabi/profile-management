<div class="p-2 border border-gray-200 my-2 mx-auto w-50 bg-light">
    
    <div class="card p-2  d-flex my-3 align-items-center justify-content-center gap-3">
        <img  class="rounded-circle" height="50px" width="50px" src="<?php echo e(asset("storage/".$publication->profile->image)); ?>" alt="">
        <h3><?php echo e($publication->profile->name); ?></h3>
        <a class="stretched-link" href="<?php echo e(route('profiles.show',$publication->profile->id)); ?>"></a>
    </div>
    <hr>
            <?php if(auth()->guard()->check()): ?>
            <?php if($canUpdate): ?>
            <div class="forms">
                <a href="<?php echo e(route('publications.edit',$publication->id)); ?>" 
                    class="btn btn-sm  btn-outline-success">Modifier</a>
                    <form method="POST" class="mt-2" action="<?php echo e(route('publications.destroy',$publication->id)); ?>">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field("DELETE"); ?>
                        <button onclick="return confirm('voulez vous suprimer cette publication')" class="btn btn-outline-danger btn-sm">Suprimer</button>
                    </form> 
                </div>
                <?php endif; ?>
                <?php endif; ?>
            <h1 class="">
                <?php echo e($publication->titre); ?>

            </h1>
            <p class="text-gray-600 leading-relaxed mb-4">
                <?php echo e($publication->body); ?>

            </p>
            <?php if($publication->image): ?>
                <img 
                    src="<?php echo e(asset('storage/'.$publication->image)); ?>" 
                    alt="image" 
                    class="img-fluid img-rounde"
                >
            <?php endif; ?>
            
        </div><?php /**PATH C:\laravel_tutorial\resources\views/components/publications.blade.php ENDPATH**/ ?>