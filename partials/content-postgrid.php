<?php

$query = new WP_Query(array(
   'post_type' => 'post',
   'posts_per_page' => 4,
));

if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
      <article class="post-card">
         <div class="post-card__header" style="background: left / cover no-repeat url('<?php echo wp_get_attachment_image_src(get_post_thumbnail_id(), 'large' )[0] ?>') rgba(0,0,0,0.4);">
            <span class="header__meta meta--date">
               <?php echo get_the_date(); ?>
            </span>
            <span class="header__meta meta--category">
            <?php echo $category = get_the_category()[0]->cat_name; ?>
            </span>
         </div>
         <div class="post-card__content">
            <a class="content__title" href='<?php the_permalink(); ?>'>
               <?php the_title(); ?>
            </a>
            <p class="content__summary">
               <?php echo $excerpt = substr(get_the_excerpt(), 0, 250) . '...'; ?>
            </p>
         </div>
      </article>
<? endwhile;
else: ?>
   <p class="error-message">Sorry, we hebben geen posts kunnen vinden.</p>
<?php endif; wp_reset_query(); ?>
<a class="btn" href="/blog">Meer laden</a>