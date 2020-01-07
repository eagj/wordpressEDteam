<?php
if ( !function_exists('mawt_custom_theme_options_menu') ):
  function mawt_custom_theme_options_menu () {
    add_menu_page( 'Ajustes del Tema', 'Ajustes del Tema', 'administrator', 'custom_theme_options', 'mawt_custom_theme_options_form', 'dashicons-admin-generic', 20 );
  }
endif;

add_action('admin_menu', 'mawt_custom_theme_options_menu');

if ( !function_exists('mawt_custom_theme_options_form') ):
  function mawt_custom_theme_options_form () {
?>
    <div class="wrap">
      <h1><?php _e('Ajustes y Opciones del Tema', 'mawt'); ?></h1>
      <form action="options.php" method="post">
        <?php
          settings_fields('mawt_options_group');
          do_settings_sections( 'mawt_options_group' );
        ?>
        <table class="form-table">
          <tr valign="top">
            <th scope="row">Texto del Footer:</th>
            <td>
              <input type="text" name="mawt_footer_text" value="<?php echo esc_attr( get_option('mawt_footer_text') ); ?>">
            </td>
          </tr>
        </table>
        <?php submit_button(); ?>
      </form>
    </div>
<?php
  }
endif;

if ( !function_exists('mawt_custom_theme_options_register') ):
  function mawt_custom_theme_options_register () {
    //un registro por opción
    register_setting('mawt_options_group', 'mawt_footer_text' );
  }
endif;

add_action('admin_init', 'mawt_custom_theme_options_register');
?>
