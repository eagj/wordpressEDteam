</main>
  <footer class="Footer">
    <?php
       wp_nav_menu( array(
          'theme_location' => 'social_menu',
          'container' => 'nav',
          'container_class' => 'SocialMedia'
        ) );
    ?>
    <div>
        <p>
          <small>
            <?php
              if ( get_option('mawt_footer_text') !== '' ):
              echo esc_html( get_option( 'mawt_footer_text' ) );
              else:
            ?>
              &copy; <?php echo date('Y'); ?> por @jonmircha
            <?php
              endif;
            ?>
          </small>
        </p>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>
