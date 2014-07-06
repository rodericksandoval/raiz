<div class="l-page" role="document">

<?php if ($page['utility_bar']): ?>
  <div class="l-wrapper l-utility-bar-wrapper">
    <nav class="l-contained l-utility-bar">
      <?php print render($page['utility_bar']); ?>
    </nav>
  </div>
<?php endif; ?>

<div class="l-wrapper l-header-wrapper">

  <header class="l-contained l-header" role="banner">

    <section class="l-branding">
      <?php if ($logo): ?>
        <div class="site-logo">
          <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" /></a>
        </div>
      <?php endif; ?>
      <?php if ($site_name || $site_slogan): ?>
        <div class="name-and-slogan">
          <?php if ($site_name): ?>
            <h1 class="site-name">
              <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
          <?php endif; ?>
          <?php if ($site_slogan): ?>
            <h2 class="site-slogan"><?php print $site_slogan; ?></h2>
          <?php endif; ?>
        </div>
      <?php endif; ?>
    </section>

    <?php if ($page['header']): ?>
      <?php print render($page['header']); ?>
    <?php endif; ?>

    <?php if ($page['navigation']): ?>
      <nav class="l-navigation" role="navigation">
        <?php print render($page['navigation']); ?>
      </nav>
    <?php endif; ?>

  </header>
</div>

<?php if ($page['featured']): ?>
  <div class="l-wrapper l-featured-wrapper">
    <section class="l-featured">
      <?php print render($page['featured']); ?>
    </section>
  </div>
<?php endif; ?>

<?php if ($page['above_main']): ?>
  <div class="l-wrapper l-above-main-wrapper">
    <section class="l-contained l-above-main">
      <?php print render($page['above_main']); ?>
    </section>
  </div>
<?php endif; ?>

<div class="l-wrapper l-main-wrapper">
  <main class="l-contained l-main" role="main">

<!--<?php if ($breadcrumb): ?>
      <?php print $breadcrumb; ?>
    <?php endif; ?> -->

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
     <aside class="l-sidebar-first" role="complementary">
       <?php print render($page['sidebar_first']); ?>
     </aside>
    <?php endif; ?>

   <?php if ($page['sidebar_second']): ?>
     <aside class="l-sidebar-second" role="complementary">
       <?php print render($page['sidebar_second']); ?>
     </aside>
    <?php endif; ?>

  </main>
</div>

<?php if ($page['below_main']): ?>
  <div class="l-wrapper l-below-main-wrapper">
    <section class="l-contained l-below-main">
      <?php print render($page['below_main']); ?>
    </section>
  </div>
<?php endif; ?>

<?php if ($page['triptych_first'] || $page['triptych_middle'] || $page['triptych_last']): ?>
  <div class="l-wrapper l-triptych-wrapper">
    <section class="l-contained l-triptych" role="banner">
      <?php print render($page['triptych_first']); ?>
      <?php print render($page['triptych_middle']); ?>
      <?php print render($page['triptych_last']); ?>
    </section>
  </div>
<?php endif; ?>

<?php if ($page['footer_firstcolumn'] || $page['footer_secondcolumn'] || $page['footer_thirdcolumn'] || $page['footer_fourthcolumn']): ?>
  <div class="l-wrapper l-footer-columns-wrapper">
    <section class="l-contained l-footer-columns">
      <?php print render($page['footer_firstcolumn']); ?>
      <?php print render($page['footer_secondcolumn']); ?>
      <?php print render($page['footer_thirdcolumn']); ?>
      <?php print render($page['footer_fourthcolumn']); ?>
    </section>
  </div>
<?php endif; ?>

<div class="l-wrapper l-footer-wrapper">
  <footer class="l-contained l-footer" role="contentinfo">
    <?php print render($page['footer']); ?>
  </footer>
</div>

</div><!--page-->

