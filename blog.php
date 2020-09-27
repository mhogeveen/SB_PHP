<?php
/* Template Name: Blog */
get_header() ?>

<main class="main main--archive">
   <div class="post-grid main__column">
      <?php

      // Initialize paged parameter
      $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;

      // Initialize custom query
      $query = new WP_Query(array(
         'post_type'       => 'post',
         'posts_per_page'  => 8,
         'paged'           => $paged,
      ));

      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
            <article class="post-card post-card--archive">

               <!-- Blog meta data -->
               <div class="post-card__header" style="background: left / cover no-repeat url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large')[0] ?>') rgba(0,0,0,0.4);">
                  <span class="header__meta meta--date">
                     <?php echo get_the_date(); ?>
                  </span>
                  <span class="header__meta meta--category">
                     <?php echo $category = get_the_category()[0]->cat_name; ?>
                  </span>
               </div>

               <!-- Blog content -->
               <div class="post-card__content">
                  <a class="content__title" href='<?php the_permalink(); ?>'>
                     <?php the_title(); ?>
                  </a>
                  <p class="content__summary">
                     <?php echo $excerpt = substr(get_the_excerpt(), 0, 180) . ' ...'; ?>
                  </p>
               </div>

            </article>
         <?php endwhile; ?>

         <!-- Pagination links -->
         <div class="archive-pagination">
            <?php echo paginate_links(array(
               'total'        => $query->max_num_pages,
               'prev_text'    => sprintf('<i></i> %1$s', __('&larr; Vorige pagina', 'text-domain')),
               'next_text'    => sprintf('%1$s <i></i>', __('Volgende pagina &rarr;', 'text-domain')),
            )); ?>
         </div>

      <?php else : ?>
         <p class="error-message">Sorry, we hebben geen posts kunnen vinden.</p>
      <?php endif;
      wp_reset_query(); ?>
   </div>
</main>

<?php get_footer() ?>