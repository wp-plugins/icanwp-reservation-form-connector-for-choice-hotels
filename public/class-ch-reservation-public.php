<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://icanwp.com/plugins/
 * @since      1.0.0
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    CH_Reservation
 * @subpackage CH_Reservation/public
 * @author     Team HiWordpress <support@icanwp.com>
 */
class CH_Reservation_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $ch_reservation    The ID of this plugin.
	 */
	private $ch_reservation;

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
	 * @param      string    $ch_reservation       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $ch_reservation, $version ) {

		$this->ch_reservation = $ch_reservation;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * The CH_Reservation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'css/ch-reservation-public.css', array(), $this->version, 'all' );
		
		$ch_style = get_option('ch_reservation_select_style_option');
		if(!empty($ch_style)){
			wp_enqueue_style( $this->ch_reservation . '-ch-style', plugin_dir_url( __FILE__ ) . 'css/' . $ch_style . '.css', array(), $this->version, 'all' );
		}
		
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * The CH_Reservation_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$jq = intval(get_option( 'ch_reservation_check_load_jquery' )) * 4;
		$sp = intval(get_option( 'ch_reservation_check_load_jquery_spinner' )) * 2;
		$dp = intval(get_option( 'ch_reservation_check_load_jquery_datepicker' ));
		$script_option = $jq + $dp + $sp;
	
		if($script_option === 7){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', '' , $this->version, false );
		} elseif($script_option === 6){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery-ui-datepicker' ), $this->version, false );
		} elseif($script_option === 5){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery-ui-spinner' ), $this->version, false );
		} elseif($script_option === 4){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery-ui-spinner', 'jquery-ui-datepicker' ), $this->version, false );
		} elseif($script_option === 3){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery' ), $this->version, false );
		} elseif($script_option === 2){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery', 'jquery-ui-datepicker' ), $this->version, false );	
		} elseif($script_option === 1){
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery', 'jquery-ui-spinner' ), $this->version, false );
		} else {
			wp_enqueue_script( $this->ch_reservation, plugin_dir_url( __FILE__ ) . 'js/ch-reservation-public.js', array( 'jquery', 'jquery-ui-spinner', 'jquery-ui-datepicker' ), $this->version, false );
		}
	}
	
	public function register_ch_reservation_shortcodes(){
		add_shortcode( 'ch-reservation',  array( $this, 'ch_reservation_display' ));
	}
	
	public function ch_reservation_display($atts){
		$total = shortcode_atts(array(
			'rows' => ''
		), $atts);
		$rows = intval($total['rows']);
		if($rows < 5 && $rows > 1){
			wp_enqueue_style( $this->ch_reservation . '-ch-rows-' . $rows, plugin_dir_url( __FILE__ ) . 'css/row-' . $rows . '.css', array(), $this->version, 'all' );
		}
		
		ob_start();
		include( plugin_dir_path( __FILE__ ) . 'partials/ch-reservation-public-display.php' );
		$output = ob_get_contents();
		ob_get_clean();
		
		return $output;		
	}

}