<?php if (isset($component)) { $__componentOriginal892748396dcfc5b97e43e6771e743950 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal892748396dcfc5b97e43e6771e743950 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout.index','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout.index'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    
    <div id="app"></div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal892748396dcfc5b97e43e6771e743950)): ?>
<?php $attributes = $__attributesOriginal892748396dcfc5b97e43e6771e743950; ?>
<?php unset($__attributesOriginal892748396dcfc5b97e43e6771e743950); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal892748396dcfc5b97e43e6771e743950)): ?>
<?php $component = $__componentOriginal892748396dcfc5b97e43e6771e743950; ?>
<?php unset($__componentOriginal892748396dcfc5b97e43e6771e743950); ?>
<?php endif; ?>
<?php /**PATH /Users/andreblass/Sites/kirby-mecenas/site/templates/home.blade.php ENDPATH**/ ?>