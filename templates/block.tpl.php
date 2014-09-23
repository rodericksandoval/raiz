<?php
/**
 * @file
 * Default theme implementation to display a block.
 */
?>

<?php
  if ($classes) {
    $classes = ' class="'. $classes . '"';
  }

  // Add Aria role to the search block
  if($block_html_id == "block-search-form"){
    $role = 'role="search"';
  } else {
      $role = '';
    }
?>

<section <?php print $classes .  $attributes . $role; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($block->subject): ?>
    <h2<?php print $title_attributes; ?> class="block-title"><?php print $block->subject ?></h2>
  <?php endif;?>
  <?php print render($title_suffix); ?>

  <div class="block-content"<?php print $content_attributes; ?>>
    <?php print $content ?>
  </div>

</section>
