<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    wp_chatinsights_widget
 * @subpackage wp_chatinsights_widget/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    wp_chatinsights_widget
 * @subpackage wp_chatinsights_widget/public
 * @author     Your Name <email@example.com>
 */
class wp_chatinsights_widget_Public
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
	 * @param      string    $wp_chatinsights_widget       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct($wp_chatinsights_widget, $version)
	{

		$this->wp_chatinsights_widget = $wp_chatinsights_widget;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		wp_enqueue_style($this->wp_chatinsights_widget, plugin_dir_url(__FILE__) . 'css/wp-chatinsights-widget-public.css', array(), $this->version, 'all');

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script($this->wp_chatinsights_widget, plugin_dir_url(__FILE__) . 'js/wp-chatinsights-widget-public.js', array('jquery'), $this->version, false);

	}

	public function embed_js_widget()
	{
		$widget_id = get_option('wp_chatinsights_widget_id');
		?>		
						<script id="bl-widget" type="text/javascript" src="https://blprodstor.blob.core.windows.net/public/widget.js" widget-id="<?php echo $widget_id ?>"></script>
						<?php
	}


}