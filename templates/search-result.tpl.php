<?php
/**
 * @file
 * Default theme implementation for displaying a single search result.
  */
?>

<article class="search-result">

  <?php print render($title_prefix); ?>
    <h3 class="title"><a href="<?php print $url; ?>"><?php print $title; ?></a></h3>
  <?php print render($title_suffix); ?>

  <?php if ($snippet): ?>
    <div class="search-snippet"><?php print $snippet; ?></div>
  <?php endif; ?>

  <?php if ($info): ?>
    <footer class="search-info"><?php print $info; ?></footer>
  <?php endif; ?>

</article>
