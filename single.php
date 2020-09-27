<?php get_header(); ?>

<main class="main main--archive">
   <article class="blog main__column">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <!-- Blog meta data -->
            <span class="blog__meta">
               <?php the_time('d-m-Y') ?> |
               <?php echo $category = get_the_category()[0]->cat_name; ?> |
               <?php the_author() ?>
            </span>

            <!-- Blog content -->
            <?php the_content(); ?>
         <?php endwhile;
      else : ?>
         <p class="error-message">Sorry, we hebben deze post niet kunnen vinden.</p>
      <?php endif; ?>
   </article>
</main>

<?php get_footer(); ?>