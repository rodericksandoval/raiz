<div class="l-page" role="document">


<?php if ($page['utility_bar']): ?>
  <nav class="l-utility-bar"><?php print render($page['utility_bar']); ?></nav>
<?php endif; ?>


<header class="l-header" role="banner">

  <div class="l-branding">
    <?php if ($site_name): ?>
      <h1 class="site-name"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><?php print $site_name; ?></a></h1>
    <?php endif; ?>
    <?php if ($site_slogan): ?>
      <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
    <?php endif; ?>
  </div>

  <?php if ($page['header']): ?>
    <div class="l-header-region"><?php print render($page['header']); ?></div>
  <?php endif; ?>

  <?php if ($page['navigation']): ?>
    <nav class="l-navigation" role="navigation"><?php print render($page['navigation']); ?></nav>
  <?php endif; ?>

</header>


<?php if ($page['featured']): ?>
  <section class="l-featured"><?php print render($page['featured']); ?></section>
<?php endif; ?>


<?php if ($page['above_main']): ?>
  <section class="l-above-main"><?php print render($page['above_main']); ?></section>
<?php endif; ?>


<main class="l-main" role="main">

<!--<?php if ($breadcrumb): ?><?php print $breadcrumb; ?><?php endif; ?>-->

  <?php print $messages; ?>
  <?php print render($tabs); ?>
  <?php print render($page['help']); ?>
  <?php if ($action_links): ?>
    <ul class="action-links"><?php print render($action_links); ?></ul>
  <?php endif; ?>

  <div class="l-main-content" role="article">

    <?php if ($page['highlighted']): ?>
      <div class="l-highlighted">
        <?php print render($page['highlighted']); ?>
      </div>
    <?php endif; ?>

    <a id="main-content"></a>
    <?php print render($title_prefix); ?>
    <?php if ($title): ?>
      <h1 class="page-title"><?php print $title; ?></h1>
    <?php endif; ?>
    <?php print render($title_suffix); ?>
    <?php print render($page['content']); ?>
    <?php print $feed_icons; ?>
  </div>

  <?php if ($page['sidebar_first']): ?>
    <aside class="l-sidebar-first" role="complementary"><?php print render($page['sidebar_first']); ?></aside>
  <?php endif; ?>

  <?php if ($page['sidebar_second']): ?>
    <aside class="l-sidebar-second" role="complementary"><?php print render($page['sidebar_second']); ?></aside>
  <?php endif; ?>

</main>


<?php if ($page['below_main']): ?>
  <section class="l-below-main"><?php print render($page['below_main']); ?></section>
<?php endif; ?>


<?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
  <section class="l-triptych" role="banner">
    <div class="l-triptych-first"><?php print render($page['triptych_first']); ?></div>
    <div class="l-triptych-middle"><?php print render($page['triptych_middle']); ?></div>
    <div class="l-triptych-last"><?php print render($page['triptych_last']); ?></div>
  </section>
<?php endif; ?>


<?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
  <section class="l-footer-columns" role="banner">
    <div class="l-footer-firstcolumn"><?php print render($page['footer_firstcolumn']); ?></div>
    <div class="l-footer-secondcolumn"><?php print render($page['footer_secondcolumn']); ?></div>
    <div class="l-footer-thirdcolumn"><?php print render($page['footer_thirdcolumn']); ?></div>
    <div class="l-footer-fourthcolumn"><?php print render($page['footer_fourthcolumn']); ?></div>
  </section>
<?php endif; ?>


<footer class="l-footer" role="contentinfo">
  <?php print render($page['footer']); ?>
</footer>


</div><!--page-->

