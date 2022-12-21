<?php
/**
 * Registers the custom post type and custom meta field.
 *
 * @link       https://jvargas.site/
 * @since      1.0.0
 *
 * @package    Example_Ctp_Plugin
 * @subpackage Example_Ctp_Plugin/includes
 */

/**
 *  Registers the custom post type and custom meta field.
 *
 * @package    Example_Ctp_Plugin
 * @subpackage Example_Ctp_Plugin/includes
 * @author     Joaquin Vargas <jvargas@gmail.com>
 */
class Example_CPT {

	/**
	 * Registers the custom post type.
	 */
	public function register_example_cpt() {
		$args = array(
			'label'           => 'Example CPT',
			'public'          => true,
			'show_ui'         => true,
			'show_in_rest'    => true,
			'capability_type' => 'post',
			'hierarchical'    => false,
			'rewrite'         => array( 'slug' => 'example-cpt' ),
			'query_var'       => true,
			'menu_icon'       => 'dashicons-admin-post',
			'supports'        => array(
				'title',
				'editor',
				'excerpt',
				'trackbacks',
				'custom-fields',
				'comments',
				'revisions',
				'thumbnail',
				'author',
				'page-attributes',
			)
		);
		register_post_type( 'example_cpt', $args );
	}

	/**
	 * Add a meta box to the post edit screen for the custom post type
	 */
	public function cpt_example_meta_box() {
		add_meta_box(
			'cpt_example_meta_box',
			'Example Meta',
			array( $this, 'cpt_example_meta_box_callback' ),
			'example_cpt',
			'side'
		);
	}

	/**
	 * Display the text field for managing the custom meta field in the meta box
	 */
	public function cpt_example_meta_box_callback( $post ) {
		$value = get_post_meta( $post->ID, '_cpt_example_meta_key', true );
		?>
        <label for="cpt_example_meta_field">Example Meta:</label>
        <input type="text" id="cpt_example_meta_field" name="cpt_example_meta_field"
               value="<?php echo esc_attr( $value ); ?>">
		<?php
	}

	/**
	 * Save the value of the custom meta field when the post is saved
	 */
	public function cpt_example_save_meta_box_data( $post_id ) {
		if ( ! isset( $_POST['cpt_example_meta_field'] ) ) {
			return;
		}
		$my_data = sanitize_text_field( $_POST['cpt_example_meta_field'] );
		update_post_meta( $post_id, '_cpt_example_meta_key', $my_data );
	}

	public function cpt_example_register_rest_field() {
		register_rest_field( 'example_cpt', 'example_meta', array(
			'get_callback'    => array( $this, 'cpt_example_get_rest_field' ),
			'update_callback' => array( $this, 'cpt_example_update_rest_field' ),
			'schema'          => null,
		) );
	}

	public function cpt_example_get_rest_field( $object, $field_name, $request ) {
		return get_post_meta( $object['id'], '_cpt_example_meta_key', true );
	}

	public function cpt_example_update_rest_field( $value, $object, $field_name ) {
		if ( ! $value || ! is_string( $value ) ) {
			return;
		}

		return update_post_meta( $object->ID, '_cpt_example_meta_key', strip_tags( $value ) );
	}

}
