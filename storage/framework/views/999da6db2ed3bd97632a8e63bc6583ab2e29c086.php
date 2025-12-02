<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'profile']); ?>
    <div class="container-fluid ">
        <div class="row ">
            <div class="card p-5 text-center">
                <img class="card-img-top w-25 mx-auto circele" src="<?php echo e(asset("storage/".$profile->image)); ?>" alt="Title" />
                <div class="card-body">
                    <h4 class="card-title">#<?php echo e($profile->id); ?> <?php echo e($profile->name); ?></h4>
                    <p class="card-text">Email : <a href="mailto:<?php echo e($profile->email); ?>"><?php echo e($profile->email); ?></a></p>
                    <p class="card-text"><?php echo e($profile->created_at->format('d-m-Y')); ?></p>
                    <p class="card-text"><?php echo e($profile->bio); ?></p>
                </div>
            </div>
            
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\laravel_tutorial\resources\views/profiles/show.blade.php ENDPATH**/ ?>