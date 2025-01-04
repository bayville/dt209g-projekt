<?php
/**
 * CTA page
 */

function add_cta_meta_boxes() {
  add_meta_box(
    'cta_details',           
    __('CTA', 'textdomain'), 
    'render_cta_meta_boxes', 
    'cta',                  
    'normal',                     
    'default'                     
  );
}
add_action('add_meta_boxes', 'add_cta_meta_boxes');

// render cta meta boxes
function render_cta_meta_boxes($post) {
  // Get saved values
  $cta_text = get_post_meta($post->ID, 'cta_text', true);
  $cta_btn_text = get_post_meta($post->ID, 'cta_btn_text', true);
  $cta_btn_link = get_post_meta($post->ID, 'cta_btn_link', true);

  // Render form
  ?>
  <label for="cta_text"><?php _e('Text:', 'textdomain'); ?></label>
  <textarea id="cta_text" name="cta_text" class="widefat" cols="50" rows="2"><?php echo esc_attr($cta_text); ?> </textarea>

  <label for="cta_btn_text"><?php _e('Knapptext:', 'textdomain'); ?></label>
  <input type="text" id="cta_btn_text" name="cta_btn_text" value="<?php echo esc_attr($cta_btn_text); ?>" class="widefat">

  <label for="cta_btn_link"><?php _e('Knapplänk:', 'textdomain'); ?></label>
  <input type="text" id="cta_btn_text" name="cta_btn_link" value="<?php echo esc_attr($cta_btn_link); ?>" class="widefat">
  <?php
}

// Save form
function save_cta_meta_boxes($post_id) {
  // Check if autosave
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
      return;
  }

  // Check user permission
  if (!current_user_can('edit_post', $post_id)) {
      return;
  }

  if (isset($_POST['cta_text'])) {
      update_post_meta($post_id, 'cta_text', sanitize_text_field($_POST['cta_text']));
  }
  if (isset($_POST['cta_btn_text'])) {
      update_post_meta($post_id, 'cta_btn_text', sanitize_text_field($_POST['cta_btn_text']));
  }
  if (isset($_POST['cta_btn_link'])) {
      update_post_meta($post_id, 'cta_btn_link', sanitize_url($_POST['cta_btn_link']));
  }
}
add_action('save_post', 'save_cta_meta_boxes');

// Lägg till CTA-metadatan i REST API-svaret
function add_cta_meta_to_rest_api() {
  // Lägg till CTA metadata till 'cta' posttypens REST API-svar
  register_rest_field('cta', 'meta', [
      'get_callback' => 'get_cta_meta_for_rest_api',
      'update_callback' => null, // Vi uppdaterar inte här
      'schema' => null, // Om du vill specificera ett schema kan du göra det här
  ]);
}
add_action('rest_api_init', 'add_cta_meta_to_rest_api');

// Callback-funktion som hämtar CTA-meta från postmeta
function get_cta_meta_for_rest_api($object) {
  $post_id = $object['id'];
  
  // Hämta CTA metadata
  $cta_text = get_post_meta($post_id, 'cta_text', true);
  $cta_tagline = get_post_meta($post_id, 'cta_tagline', true);
  $cta_btn_text = get_post_meta($post_id, 'cta_btn_text', true);
  $cta_btn_link = get_post_meta($post_id, 'cta_btn_link', true);

  // Returnera CTA meta-data
  return [
      'cta_text' => $cta_text,
      'cta_tagline' => $cta_tagline,
      'cta_btn_text' => $cta_btn_text,
      'cta_btn_link' => $cta_btn_link,
  ];
}
?>