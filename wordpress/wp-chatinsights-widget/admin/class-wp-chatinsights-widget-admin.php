<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wp_chatinsights_widget
 * @subpackage wp_chatinsights_widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wp_chatinsights_widget
 * @subpackage wp_chatinsights_widget/admin
 * @author     Your Name <email@example.com>
 */
class wp_chatinsights_widget_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp_chatinsights_widget    The ID of this plugin.
	 */
	private $wp_chatinsights_widget;

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
	 * @param      string    $wp_chatinsights_widget       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($wp_chatinsights_widget, $version)
	{

		$this->wp_chatinsights_widget = $wp_chatinsights_widget;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wp_chatinsights_widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wp_chatinsights_widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->wp_chatinsights_widget, plugin_dir_url(__FILE__) . 'css/wp-chatinsights-widget-admin.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts()
	{

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wp_chatinsights_widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wp_chatinsights_widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->wp_chatinsights_widget, plugin_dir_url(__FILE__) . 'js/wp-chatinsights-widget-admin.js', array('jquery'), $this->version, false);

	}

	public function register_widget_id_setting()
	{
		register_setting('wp_chatinsights_widget_options', 'wp_chatinsights_widget_id', 'sanitize_text_field');
		add_settings_section('wp_chatinsights_widget_section', 'Main Settings', null, 'wp-chatinsights-widget');
		add_settings_field('wp_chatinsights_widget_id', 'Widget ID', array($this, 'widget_id_callback'), 'wp-chatinsights-widget', 'wp_chatinsights_widget_section');
	}

	public function widget_id_callback()
	{
		$widget_id = get_option('wp_chatinsights_widget_id');
		echo "<input id='wp_chatinsights_widget_id' name='wp_chatinsights_widget_id' type='text' value='$widget_id' />";
	}

	public function create_admin_menu_page()
	{
		add_options_page('WP ChatInsights Widget', 'ChatInsights Widget', 'manage_options', 'wp-chatinsights-widget', array($this, 'display_settings_page'));
	}
	public function display_settings_page()
	{
		?>
										<div>
										<h2>WP ChatInsights Widget</h2>
										Visit the <a href="https://portal.chatinsights.io" target="_blank">ChatInsights Portal</a> to get your widget ID and paste it below.
										<form method="post" action="options.php">
										<?php
										settings_fields('wp_chatinsights_widget_options');
										do_settings_sections('wp-chatinsights-widget');
										submit_button();
										?>
										</form>
										</div>
										<?php
	}

}