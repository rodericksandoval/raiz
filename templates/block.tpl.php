<?php

/**
 * @file
 * Default theme implementation to display a block.
 */
?>
<section class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?> class="block-title"><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>
  <div class="block-content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>
</section>
