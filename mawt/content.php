    <article class="Content">
      <?php
      //https://developer.wordpress.org/reference/functions/query_posts/
      if ( have_posts() ): while ( have_posts() ): the_post(); ?>
        <article>
          <?php the_post_thumbnail(); ?>
          <h2>
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          </h2>
          <?php the_excerpt(); ?>
          <?php the_category(); ?>
          <p><?php the_category(', '); ?></p>
          <p><?php the_tags(); ?></p>
          <p>
            <?php the_time( get_option('date_format') ); ?>
          </p>
          <p>
            <?php the_author_posts_link(); ?>
          </p>
          <div>
            <h3>Custom Fields & Metaboxes</h3>
            <?php the_meta(); ?>
            <p>
              <?php echo get_post_meta( get_the_ID(), 'origen', true); ?>
            </p>
            <p>
              <?php echo get_post_meta( get_the_ID(), 'Actividad Física', true); ?>
            </p>
            <p>
              <?php echo get_post_meta( get_the_ID(), 'mb_origen_raza', true); ?>
            </p>
            <p>
              <?php echo get_post_meta( get_the_ID(), 'mb_esperanza_vida', true); ?>
            </p>
            <h3>ACF</h3>
            <p>
              <?php the_field('ideal_para'); ?>
             </p>
            <p>
              <?php echo get_field('ideal_para'); ?>
             </p>
          </div>
        </article>
        <hr>
      <?php endwhile; else: ?>
        <p>El contenido solicitado no existe</p>
      <?php endif;
        wp_reset_postdata();
        wp_reset_query();
       ?>
    </article>
    <section class="Pagination  Other">
      <?php //previous_post_link(); ?>
      <?php //next_post_link(); ?>
      <?php echo paginate_links(); ?>
    </section>
