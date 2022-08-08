<?php $__env->startSection($section); ?>
    <?php
if (! isset($_instance)) {
    $dom = \Livewire\Livewire::mount($component, $componentParameters)->dom;
} elseif ($_instance->childHasBeenRendered('Tx9QzMt')) {
    $componentId = $_instance->getRenderedChildComponentId('Tx9QzMt');
    $componentTag = $_instance->getRenderedChildComponentTagName('Tx9QzMt');
    $dom = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Tx9QzMt');
} else {
    $response = \Livewire\Livewire::mount($component, $componentParameters);
    $dom = $response->dom;
    $_instance->logRenderedChild('Tx9QzMt', $response->id, \Livewire\Livewire::getRootElementTagName($dom));
}
echo $dom;
?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make($layout, \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laravel\sk-store\vendor\livewire\livewire\src\Macros/livewire-view.blade.php ENDPATH**/ ?>