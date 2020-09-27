<?php
/* Template Name: Home */
get_header() ?>

<main class="main main--home">
   <section class="main__column post-create">
      <!-- Get partial content postcreate from content-postcreate.php -->
      <?php get_template_part('partials/content', 'postcreate'); ?>
   </section>
   <section class="main__column post-grid">
      <!-- Get partial content postcreate from content-postgrid.php -->
      <?php get_template_part('partials/content', 'postgrid'); ?>
   </section>
</main>

<?php get_footer() ?>