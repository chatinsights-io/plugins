<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    chatinsights_widget
 * @subpackage chatinsights_widget/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    chatinsights_widget
 * @subpackage chatinsights_widget/admin
 * @author     Your Name <email@example.com>
 */
class chatinsights_widget_Admin
{

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $chatinsights_widget    The ID of this plugin.
	 */
	private $chatinsights_widget;

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
	 * @param      string    $chatinsights_widget       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($chatinsights_widget, $version)
	{

		$this->chatinsights_widget = $chatinsights_widget;
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
		 * defined in chatinsights_widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The chatinsights_widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style($this->chatinsights_widget, plugin_dir_url(__FILE__) . 'css/chatinsights-widget-admin.css', array(), $this->version, 'all');

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
		 * defined in chatinsights_widget_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The chatinsights_widget_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script($this->chatinsights_widget, plugin_dir_url(__FILE__) . 'js/chatinsights-widget-admin.js', array('jquery'), $this->version, false);

	}

	public function register_widget_id_setting()
	{
		register_setting('chatinsights_widget_options', 'chatinsights_widget_id', 'sanitize_text_field');
		add_settings_section('chatinsights_widget_section', 'Main Settings', null, 'chatinsights-widget');
		add_settings_field('chatinsights_widget_id', 'Widget ID', array($this, 'widget_id_callback'), 'chatinsights-widget', 'chatinsights_widget_section');
	}

	public function widget_id_callback()
	{
		$widget_id = get_option('chatinsights_widget_id');
		echo "<input id='chatinsights_widget_id' name='chatinsights_widget_id' type='text' value='$widget_id' />";
	}

	public function create_admin_menu_page()
	{
		add_options_page('ChatInsights Widget', 'ChatInsights Widget', 'manage_options', 'chatinsights-widget', array($this, 'display_settings_page'));
	}
	public function display_settings_page()
	{
		?>
																<div>
																<h2>ChatInsights Widget</h2>
																Visit the <a href="https://portal.chatinsights.io" target="_blank">ChatInsights Portal</a> to get your widget ID and paste it below.
																<form method="post" action="options.php">
																<?php
																settings_fields('chatinsights_widget_options');
																do_settings_sections('chatinsights-widget');
																submit_button();
																?>
																</form>
																</div>
																<?php
	}

}