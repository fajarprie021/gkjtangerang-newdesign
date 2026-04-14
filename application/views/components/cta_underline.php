<?php
// Default fallbacks to prevent errors
$url = isset($url) ? $url : '#';
$text = isset($text) ? $text : 'LIHAT SELENGKAPNYA';
$class_override = isset($class_override) && !empty($class_override) ? ' ' . $class_override : '';

// Base tailwind styling for the underline link
$base_classes = 'border-b-2 border-primary pb-1 text-xs font-bold uppercase tracking-[0.2em] text-primary transition hover:text-secondary hover:border-secondary';
?>
<a href="<?php echo $url; ?>" class="<?php echo $base_classes . $class_override; ?>">
    <?php echo $text; ?>
</a>
