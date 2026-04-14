<?php
// Minimal fallback parameters for safety
$eyebrow         = isset($eyebrow) ? $eyebrow : '';
$title           = isset($title) ? $title : '';
$subtitle        = isset($subtitle) ? $subtitle : '';
$divider         = isset($divider) ? $divider : true;
$container_class = isset($container_class) ? $container_class : 'mb-16 text-center';
?>
<div class="<?php echo $container_class; ?>">
    <?php if (!empty($eyebrow)): ?>
        <span class="mb-4 block text-xs font-bold uppercase tracking-[0.5em] text-secondary">
            <?php echo $eyebrow; ?>
        </span>
    <?php endif; ?>
    
    <?php if (!empty($title)): ?>
        <h2 class="font-headline text-4xl tracking-widest text-primary">
            <?php echo $title; ?>
        </h2>
    <?php endif; ?>

    <?php if (!empty($subtitle)): ?>
        <p class="mt-3 font-serif italic text-muted">
            <?php echo $subtitle; ?>
        </p>
    <?php endif; ?>

    <?php if ($divider): ?>
        <div class="mx-auto mt-5 h-1 w-24 bg-secondary"></div>
    <?php endif; ?>
</div>
