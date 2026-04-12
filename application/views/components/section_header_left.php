<?php
// Minimal fallback parameters for safety
$eyebrow  = isset($eyebrow) ? $eyebrow : '';
$title    = isset($title) ? $title : '';
$subtitle = isset($subtitle) ? $subtitle : '';
$align    = isset($align) ? $align : 'left'; // MVP focus on left-aligned
?>
<div>
    <?php if (!empty($eyebrow)): ?>
        <span class="mb-2 block text-[10px] font-bold uppercase tracking-[0.4em] text-secondary">
            <?php echo $eyebrow; ?>
        </span>
    <?php endif; ?>
    
    <?php if (!empty($title)): ?>
        <h2 class="font-headline text-4xl uppercase tracking-widest text-primary">
            <?php echo $title; ?>
        </h2>
    <?php endif; ?>

    <?php if (!empty($subtitle)): ?>
        <p class="mt-3 font-serif italic text-muted">
            <?php echo $subtitle; ?>
        </p>
    <?php endif; ?>
</div>
