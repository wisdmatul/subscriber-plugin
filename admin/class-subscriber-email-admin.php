<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://atul.com
 * @since      1.0.0
 *
 * @package    Subscriber_Email
 * @subpackage Subscriber_Email/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Subscriber_Email
 * @subpackage Subscriber_Email/admin
 * @author     atul.com/atul-plugin <atul@atul.com>
 */
class Subscriber_Email_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Subscriber_Email_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Subscriber_Email_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/subscriber-email-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Subscriber_Email_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Subscriber_Email_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/subscriber-email-admin.js', array( 'jquery' ), $this->version, false );

	}
	//admin menu
	function register_menu_page()
	{
		add_menu_page( 'SUBSCRIBE', 
		'Subscriber Mail Setting', 
		'manage_options', 
		'subscriber-email', 
		array($this, 'subscriber_email_callback'), 
		'dashicons-email-alt2', 
		70
	);
	}

	function subscriber_email_callback()
	{
?>
		<div class="wrap">
			<h2>Subscribe Me</h2>
			<form method="post" action="options.php">
				<?php 
					settings_fields('my_plugin_settings_group');
					do_settings_sections('subscribe-me-settings');
				?>
				<?php submit_button('Save Changes'); ?>
			</form>
		</div>
<?php
	}

	function register_set()
	{
		register_setting('my_plugin_settings_group', 'no_of_posts');
		add_settings_section('subs_settings', 'Subscription Mail Settings', '', 'subscribe-me-settings');
		add_settings_field('no_of_posts', 'No of Posts', array($this, 'no_of_posts_callback'), 'subscribe-me-settings', 'subs_settings');
	}

	public function no_of_posts_callback()
	{
?>
		<input type="text" name="no_of_posts" value="<?php echo esc_attr(get_option('no_of_posts')) ?>">
<?php
	}
}
