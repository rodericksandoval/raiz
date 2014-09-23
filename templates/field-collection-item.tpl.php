<?php
/**
 * @file
 * Default theme implementation for field collection items.
 */
?>

<?php
  if ($classes) {
    $classes = ' class="'. $classes . '"';
  }
?>

<div <?php print $classes .  $attributes; ?>>
  <?php print render($content); ?>
</div>
