<?php
/*
Plugin Name: DL Test Plugin
Description: Testing plugin development
Plugin URI: https://davidmlentz.github.io
Version: 0.0.3
Author: David Lentz
Author URI: https://davidmlentz.github.io
*/

defined( 'ABSPATH' ) or die( 'No hackers' );

if( ! class_exists( 'DL_Test_Plugin_Updater' ) ){
	include_once( plugin_dir_path( __FILE__ ) . 'updater.php' );
}

$updater = new DL_Test_Plugin_Updater( __FILE__ );
$updater->set_username( 'davidmlentz' );
$updater->set_repository( 'DL_Test_Plugin_Updater' );
$updater->initialize();

function DL_test_plugin() {

date_default_timezone_set('America/Boise');

	$timeString = date("Hi");
	$time = intval($timeString); // Cast that as an int (was a string)
/*
	echo $time;
  	echo "<hr />";
  	echo $day;
  	echo "<hr />";
*/
	$options_array = get_option(dl_test_options);
	// This array is made of elements named like 'Mon_open' and 'Mon_close'
	$openIndex = date('D') . "_open"; // Array element that holds today's opening time
	$closeIndex = date('D') . "_close"; // Array element that holds today's closing time
	$openTime = $options_array[$openIndex];
	$closeTime = $options_array[$closeIndex];

	echo "Today is " . date('D') . " and we open at $openTime and we close at $closeTime.";
	$open = ($openTime < $time && $time < $closeTime) ? TRUE : FALSE;

	if ($open) {
		echo "<br />We're OPEN!";
		$location = 'http://rc.boisestate.edu/api/start_session.ns?issue_menu=1&id=1&c2cjs=1';
	} else {
		echo "<br />Sorry. Please call again. Because we're closed.";
		$location = 'http://oit.boisestate.edu/chat-support-is-closed';
	}

        echo "<br />Redirecting you to $location";
/*
	echo "<pre>";
	var_dump($options_array);
	echo "</pre>";
	echo "<br />";
	echo "Monday opening: ";
	echo $options_array[Mon_open];
	echo "<br />";
        echo "Monday closing: ";
        echo $options_array[Mon_close];
        echo "<br />";
        echo "Tuesday opening: ";
        echo $options_array[Tue_open];
        echo "<br />";
        echo "Tuesday closing: ";
        echo $options_array[Tue_close];
        echo "<br />";
        echo "Wednesday opening: ";
        echo $options_array[Wed_open];
        echo "<br />";
        echo "Wednesday closing: ";
        echo $options_array[Wed_close];
        echo "<br />";
        echo "Thursday opening: ";
        echo $options_array[Thu_open];
        echo "<br />";
        echo "Thursday closing: ";
        echo $options_array[Thu_close];
        echo "<br />";
        echo "Friday opening: ";
        echo $options_array[Fri_open];
        echo "<br />";
        echo "Friday closing: ";
        echo $options_array[Fri_close];
        echo "<br />";
        echo "Saturday opening: ";
        echo $options_array[Sat_open];
        echo "<br />";
        echo "Saturday closing: ";
        echo $options_array[Sat_close];
        echo "<br />";
        echo "Sunday opening: ";
        echo $options_array[Sun_open];
        echo "<br />";
        echo "Sunday closing: ";
        echo $options_array[Sun_close];
*/
}

add_shortcode('dl_test', 'DL_test_plugin');


function dl_test_settings_init() {
	register_setting( 'dl_test', 'dl_test_options' );
 
	// register a new section in the "dl_test" page
	add_settings_section(
		'dl_test_section_developers',
		__( 'Here is this part.', 'dl_test' ),
		'dl_test_section_developers_cb',
		'dl_test'
	);
 
	// Register a new field in the "dl_test_section_developers" section, inside the "dl_test" page
	add_settings_field(
		'Mon_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Monday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Mon_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);


	add_settings_field(
		'Mon_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Monday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Mon_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);


	add_settings_field(
		'Tue_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Tuesday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Tue_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);


	add_settings_field(
		'Tue_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Tuesday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Tue_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Wed_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Wednesday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Wed_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Wed_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Wednesday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Wed_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Thu_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Thursday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Thu_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Thu_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Thursday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Thu_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Fri_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Friday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Fri_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Fri_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Friday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Fri_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Sat_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Saturday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Sat_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Sat_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Saturday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Sat_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Sun_open', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Sunday open', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Sun_open',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

	add_settings_field(
		'Sun_close', // as of WP 4.6 this value is used only internally
		// use the $args label_for to populate the id inside the callback
		__( 'Sunday close', 'dl_test' ),
		'dl_test_field_thing1_cb',
		'dl_test',
		'dl_test_section_developers',
		[
			'label_for' => 'Sun_close',
			'class' => 'dl_test_row',
			'dl_test_custom_data' => 'custom',
		]
	);

}
 
/**
 * register our dl_test_settings_init to the admin_init action hook
 */
add_action( 'admin_init', 'dl_test_settings_init' );




/**
 * custom option and settings:
 * callback functions
 */
 
// developers section cb
 
// section callbacks can accept an $args parameter, which is an array.
// $args have the following keys defined: title, id, callback.
// the values are defined at the add_settings_section() function.
function dl_test_section_developers_cb( $args ) {
	?>
	<p id="<?php echo esc_attr( $args['id'] ); ?>"><?php esc_html_e( 'This part goes here', 'dl_test' ); ?></p>
	<?php
}
 
// thing1 field cb
 
// field callbacks can accept an $args parameter, which is an array.
// $args is defined at the add_settings_field() function.
// wordpress has magic interaction with the following keys: label_for, class.
// the "label_for" key value is used for the "for" attribute of the <label>.
// the "class" key value is used for the "class" attribute of the <tr> containing the field.
// you can add custom key value pairs to be used inside your callbacks.
function dl_test_field_thing1_cb( $args ) {
	// get the value of the setting we registered with register_setting()
	$options = get_option( 'dl_test_options' );
	// output the field
	?>

		<select id="<?php echo esc_attr( $args['label_for'] ); ?>"
			data-custom="<?php echo esc_attr( $args['dl_test_custom_data'] ); ?>"
			name="dl_test_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
		>
			<option value="0000" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0000', false ) ) : ( '' ); ?>> 
				<?php esc_html_e( '0000', 'dl_test' ); ?>
			</option>
			<option value="0100" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0100', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0100', 'dl_test' ); ?>
			</option>
p
			<option value="0200" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0200', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0200', 'dl_test' ); ?>
			</option>

			<option value="0300" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0300', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0300', 'dl_test' ); ?>
			</option>

			<option value="0400" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0400', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0400', 'dl_test' ); ?>
			</option>

			<option value="0500" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0500', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0500', 'dl_test' ); ?>
			</option>

			<option value="0600" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0600', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0600', 'dl_test' ); ?>
			</option>

			<option value="0700" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0700', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0700', 'dl_test' ); ?>
			</option>

			<option value="0800" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0800', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0800', 'dl_test' ); ?>
			</option>

			<option value="0900" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '0900', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '0900', 'dl_test' ); ?>
			</option>

			<option value="1000" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1000', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1000', 'dl_test' ); ?>
			</option>

			<option value="1100" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1100', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1100', 'dl_test' ); ?>
			</option>

			<option value="1200" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1200', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1200', 'dl_test' ); ?>
			</option>

			<option value="1300" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1300', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1300', 'dl_test' ); ?>
			</option>

			<option value="1400" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1400', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1400', 'dl_test' ); ?>
			</option>

			<option value="1500" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1500', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1500', 'dl_test' ); ?>
			</option>

			<option value="1600" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1600', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1600', 'dl_test' ); ?>
			</option>

			<option value="1700" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1700', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1700', 'dl_test' ); ?>
			</option>

			<option value="1800" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1800', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1800', 'dl_test' ); ?>
			</option>

			<option value="1900" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '1900', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '1900', 'dl_test' ); ?>
			</option>

			<option value="2000" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '2000', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '2000', 'dl_test' ); ?>
			</option>

			<option value="2100" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '2100', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '2100', 'dl_test' ); ?>
			</option>

			<option value="2200" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '2200', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '2200', 'dl_test' ); ?>
			</option>

			<option value="2300" <?php echo isset( $options[ $args['label_for'] ] ) ? ( selected( $options[ $args['label_for'] ], '2300', false ) ) : ( '' ); ?>>
				<?php esc_html_e( '2300', 'dl_test' ); ?>
			</option>

		</select>

	<?php
}

 
/**
 * top level menu
 */
function dl_test_options_page() {
	// add top level menu page
	add_menu_page(
	'DLTest',
	'DLTest Options',
	'manage_options',
	'dl_test',
	'dl_test_options_page_html'
	);
}

/**
 * register our wporg_options_page to the admin_menu action hook
 */
add_action( 'admin_menu', 'dl_test_options_page' );
 
/**
 * top level menu:
 * callback functions
 */
function dl_test_options_page_html() {
	// check user capabilities
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
 
	// add error/update messages
 
	// check if the user have submitted the settings
	// wordpress will add the "settings-updated" $_GET parameter to the url
	if ( isset( $_GET['settings-updated'] ) ) {
		// add settings saved message with the class of "updated"
		add_settings_error( 'dl_test_messages', 'dl_test_message', __( 'Settings Saved', 'dl_test' ), 'updated' );
	}
 
	// show error/update messages
	settings_errors( 'dl_test_messages' );
	?>
	<div class="wrap">
		<h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
		<form action="options.php" method="post">
		<?php
			// output security fields for the registered setting "dl_test"
			settings_fields( 'dl_test' );
			// output setting sections and their fields
		// (sections are registered for "dl_test", each field is registered to a specific section)
		do_settings_sections( 'dl_test' );
		// output save settings button
		submit_button( 'Save Settings' );
	?>
	</form>
	</div>
	<?php
}

