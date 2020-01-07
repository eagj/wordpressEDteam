<section class="WP-Query">
  <?php
  //https://developer.wordpress.org/reference/classes/wp_query/
  //https://codex.wordpress.org/Class_Reference/WP_Query
  $wp_query = new WP_Query( array(
    'posts_per_page' => 4,
    'orderby' => 'rand'
  ) );

  if( $wp_query->have_posts() ):
    while ($wp_query->have_posts()):
       $wp_query->the_post();
  ?>
  <figure>
          <a href="<?php the_permalink(); ?>">
            <?php the_post_thumbnail( 'thumbnail' ); ?>
            <?php the_title('<figcaption>', '</figcaption>'); ?>
          </a>
        </figure>
  <?php
    endwhile;
  endif;
  wp_reset_postdata();
  wp_reset_query();
  ?>
</section>
