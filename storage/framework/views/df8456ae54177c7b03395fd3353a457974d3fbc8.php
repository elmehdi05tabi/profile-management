<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.master','data' => ['title' => 'Update Publication']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('master'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Update Publication']); ?>
    <form action="<?php echo e(route('publications.update',$publication->id)); ?>" enctype="multipart/form-data" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field("PUT"); ?>
         <div class="mb-3 form-group">
            <label for="" class="form-label">Title</label>
            <input type="text" name="titre" class="form-control" value="<?php echo e(old('titre',$publication->titre)); ?>" />
        </div >
        <div class="mb-3">
            <label for="" class="form-label">Description</label>
            <textarea type="text" name="body" class="form-control"><?php echo e(old('body',$publication->body)); ?></textarea>
        </div>
        <div class="mb-3">
            <?php if($publication->image): ?>
                <img src="<?php echo e(asset("storage/".$publication->image)); ?>" width="200px" alt="">
            <?php endif; ?>
        </div>
        <div class="mb-3 form-group">
            <label for="" class="form-label">Image</label>
            <input type="file" name="image" class="form-control" />
        </div>
        <div class="mb-3 form-group">
            <button type="submit" class="btn btn-primary btn-block w-100">Ajouter Publication</button>
        </div>
    </form>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH C:\laravel_tutorial\resources\views/publication/edit.blade.php ENDPATH**/ ?>