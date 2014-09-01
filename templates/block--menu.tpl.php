<?php

/**
 * @file
 * Default theme implementation to display a block.
 */
?>
<nav class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?> class="block-title"><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <?php print $content ?>
</nav>
