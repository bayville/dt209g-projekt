<?php
      // Meta-Box Generator
      // How to use: $meta_value = get_post_meta( $post_id, $field_id, true );
      // Example: get_post_meta( get_the_ID(), "my_metabox_field", true );

      class SpaceMetabox {
        //Post types to display in
        private $screens = array('space');

        // Fields
        private $fields = array(
          array(
            'label' => 'Pris',
            'id' => 'price',
            'type' => 'number',
           ),
          array(
            'label' => 'Prisperiod',
            'id' => 'period',
            'type' => 'select',
            'options' => array(
               'dag',
               'vecka',
               'månad',
            ),
           ) ,
           array(
            'label' => 'Det här ingår: (en per rad)',
            'id' => 'facilities',
            'type' => 'textarea',
           ),
           array(
            'label' => 'Kapacitet',
            'id' => 'capacity',
            'type' => 'number',
            'default' => '1',

           )  
        );

        public function __construct() {
          add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ) );
          add_action( 'save_post', array( $this, 'save_fields' ) );
        }

        public function add_meta_boxes() {
          foreach ( $this->screens as $s ) {
            add_meta_box(
              'Space',
              __( 'Space', 'gefle-workspace' ),
              array( $this, 'meta_box_callback' ),
              $s,
              'normal',
              'core'
            );
          }
        }

        public function meta_box_callback( $post ) {
          wp_nonce_field( 'Space_data', 'Space_nonce' ); 
          $this->field_generator( $post );
        }

        public function field_generator( $post ) {
          $output = '';
          foreach ( $this->fields as $field ) {
            $label = '<label for="' . $field['id'] . '">' . $field['label'] . '</label>';
            $meta_value = get_post_meta( $post->ID, $field['id'], true );
            if ( empty( $meta_value ) ) {
              if ( isset( $field['default'] ) ) {
                $meta_value = $field['default'];
              }
            }
            switch ( $field['type'] ) {
              case 'textarea':
                $input = sprintf(
                  '<textarea style="width: 100%%" id="%s" name="%s" rows="5">%s</textarea>',
                  $field['id'],
                  $field['id'],
                  $meta_value
                );
                break;

              case 'select':
              $input = sprintf(
                '<select id="%s" name="%s">',
                $field['id'],
                $field['id']
              );
              foreach ( $field['options'] as $key => $value ) {
                $field_value = !is_numeric( $key ) ? $key : $value;
                $input .= sprintf(
                  '<option %s value="%s">%s</option>',
                  $meta_value === $field_value ? 'selected' : '',
                  $field_value,
                  $value
                );
              }
              $input .= '</select>';
              break;
        
              default:
                $input = sprintf(
                '<input %s id="%s" name="%s" type="%s" value="%s">',
                $field['type'] !== 'color' ? 'style="width: 100%"' : '',
                $field['id'],
                $field['id'],
                $field['type'],
                $meta_value
              );
            }
            $output .= $this->format_rows( $label, $input );
          }
          echo '<table class="form-table"><tbody>' . $output . '</tbody></table>';
        }

        public function format_rows( $label, $input ) {
          return '<div style="margin-top: 10px;"><strong>'.$label.'</strong></div><div>'.$input.'</div>';
        }

        

        public function save_fields( $post_id ) {
          if ( !isset( $_POST['Space_nonce'] ) ) {
            return $post_id;
          }
          $nonce = $_POST['Space_nonce'];
          if ( !wp_verify_nonce( $nonce, 'Space_data' ) ) {
            return $post_id;
          }
          if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return $post_id;
          }
          foreach ( $this->fields as $field ) {
            if ( isset( $_POST[ $field['id'] ] ) ) {
              switch ( $field['type'] ) {
                case 'email':
                  $_POST[ $field['id'] ] = sanitize_email( $_POST[ $field['id'] ] );
                  break;
                case 'text':
                  $_POST[ $field['id'] ] = sanitize_text_field( $_POST[ $field['id'] ] );
                  break;
              }
              update_post_meta( $post_id, $field['id'], $_POST[ $field['id'] ] );
            } else if ( $field['type'] === 'checkbox' ) {
              update_post_meta( $post_id, $field['id'], '0' );
            }
          }
        }

      }

      if (class_exists('SpaceMetabox')) {
        new SpaceMetabox;
      };

      