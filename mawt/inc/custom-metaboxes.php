<?php
if ( !function_exists('mawt_add_meta_boxes') ):
  function mawt_add_meta_boxes () {
    //7 parametros:
      // id para identificar el metabox
      // Titulo del Metabox
      // Callback con el contenido
      // Pantalla donde se mostrará
      // Contexto donde se mostrará (normal, aside, advanced)
      // Prioridad en la que se mostrará
      // Argumentos con callback

    add_meta_box( 'mawt_meta_box', __('Información de la Raza', 'mawt'), 'mawt_metaboxes', 'post', 'normal', 'high', null );
  }
endif;

add_action('add_meta_boxes', 'mawt_add_meta_boxes');

if ( !function_exists('mawt_metaboxes') ):
  function mawt_metaboxes ( $post ) {
    wp_nonce_field( basename(__FILE__), 'mawt_nonce' );
?>
    <table class="form-table">
      <tr>
          <th class="row-title" colspan="2">
              <p>Añade la información de la raza</p>
          </th>
      </tr>
      <tr>
          <th class="row-title">
              <label for="mb_origen_raza">Origen de la Raza:</label>
          </th>
          <td>
              <input id="mb_origen_raza" name="mb_origen_raza" class="regular-text" type="text" value="<?php echo esc_attr( get_post_meta( $post->ID, 'mb_origen_raza', true ) ); ?>">
          </td>
      </tr>
      <tr>
          <th class="row-title">
              <label for="mb_esperanza_vida">Esperanza de Vida:</label>
          </th>
          <td>
            <?php $res_esperanza = esc_html( get_post_meta( $post->ID, 'mb_esperanza_vida', true ) );  ?>
            <select name="mb_esperanza_vida" id="mb_esperanza_vida" class="post-box">
              <option value="" selected>- - -</option>
              <option <?php selected($res_esperanza, '8-10'); ?> value="8 a 10 años">8 a 10 años</option>
              <option <?php selected($res_esperanza, '10-12'); ?> value="10 a 12 años">10 a 12 años</option>
              <option <?php selected($res_esperanza, '12-14'); ?> value="12 a 14 años">12 a 14 años</option>
              <option <?php selected($res_esperanza, '15-20'); ?> value="15 a 20 años">15 a 20 años</option>
            </select>
          </td>
      </tr>
    </table>
<?php
  }
endif;

if ( !function_exists( 'mawt_save_metaboxes' ) ):
  function mawt_save_metaboxes( $post_id, $post, $update ) {
    if ( !isset( $_POST[ 'mawt_nonce' ] ) || !wp_verify_nonce( $_POST[ 'mawt_nonce' ], basename( __FILE__ ) ) )
      return $post_id;

    if ( !current_user_can( 'edit_post', $post_id ) )
      return $post_id;

    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
      return $post_id;

    $mb_origen_raza = $mb_esperanza_vida = '';

    if( isset( $_POST['mb_origen_raza'] ) ) {
      $mb_origen_raza = sanitize_text_field( $_POST['mb_origen_raza'] );
    }

    update_post_meta($post_id, 'mb_origen_raza', $mb_origen_raza );

    if( isset( $_POST['mb_esperanza_vida'] ) ) {
      $mb_esperanza_vida = sanitize_text_field( $_POST['mb_esperanza_vida'] );
    }

    update_post_meta($post_id, 'mb_esperanza_vida', $mb_esperanza_vida );
  }
endif;

add_action('save_post', 'mawt_save_metaboxes', 10, 3);
?>
