<?php $__env->startSection("contenu"); ?>
    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('counter', [])->html();
} elseif ($_instance->childHasBeenRendered('JiCz7dt')) {
    $componentId = $_instance->getRenderedChildComponentId('JiCz7dt');
    $componentTag = $_instance->getRenderedChildComponentTagName('JiCz7dt');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('JiCz7dt');
} else {
    $response = \Livewire\Livewire::mount('counter', []);
    $html = $response->html();
    $_instance->logRenderedChild('JiCz7dt', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layouts.master", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\GestionPersonnelMTMUSR\resources\views/welcome.blade.php ENDPATH**/ ?>