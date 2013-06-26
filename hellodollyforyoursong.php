<?php

/*
@package Hello_Dolly_For_Your_Song
@version 0.1

Plugin Name: Hello Dolly For Your Song
Description: This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg. Every human being has a special connection to a particular song. And because of that, Hello Dolly For Your Song brings the lyric of your favourite song to the admin screen.
Plugin URI: http://wordpress.org/extend/plugins/hello-dolly-for-your-song/
Version: 0.3
License: GPLv3
Author: Marco Hitschler
Author URI: http://www.unmus.de/
*/

// Wordpress Action
add_action( 'admin_notices', 'hdfys' );
add_action( 'admin_head', 'hdfys_css' );
add_action( 'admin_menu', 'hdfys_show_options');
add_action( 'plugins_loaded' , 'hdfys_init_widget');

// Localization
load_plugin_textdomain('hellodollyforyoursong', false, 'hello-dolly-for-your-song');

/*
Content Functions
*/

// Get the lyric
function hdfys_get_lyric() {
	
	// First we fetch the lyric
	$lyrics = get_option('hdfys_song');
	
	// Remove the slashes
	$lyrics = stripcslashes($lyrics);
	
	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// Get Hello Dolly
function hdfys_get_hello_dolly() {
	
	/* Hello Dolly Lyric */
	$hdfys_hello_dolly="Hello, Dolly
	Well, hello, Dolly
	It's so nice to have you back where you belong
	You're lookin' swell, Dolly
	I can tell, Dolly
	You're still glowin', you're still crowin'
	You're still goin' strong
	We feel the room swayin'
	While the band's playin'
	One of your old favourite songs from way back when
	So, take her wrap, fellas
	Find her an empty lap, fellas
	Dolly'll never go away again
	Hello, Dolly
	Well, hello, Dolly
	It's so nice to have you back where you belong
	You're lookin' swell, Dolly
	I can tell, Dolly
	You're still glowin', you're still crowin'
	You're still goin' strong
	We feel the room swayin'
	While the band's playin'
	One of your old favourite songs from way back when
	Golly, gee, fellas
	Find her a vacant knee, fellas
	Dolly'll never go away
	Dolly'll never go away
	Dolly'll never go away again";	
	
	// Here we split it into lines
	$hdfys_hello_dolly = explode( "\n", $hdfys_hello_dolly );

	// And then randomly choose a line
	return wptexturize( $hdfys_hello_dolly[ mt_rand( 0, count( $hdfys_hello_dolly ) - 1 ) ] );;
}

/*
Display of the songtext lines in the admin head
*/

// This just echoes the line, if no songtext is stored, Hello Dolly is used
function hdfys() {	
	$text = get_option('hdfys_song');
	$text = strlen($text);
	$line = ($text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
	echo "<p class='admin-hdfys'>".$line."</p>";
}

// We need some CSS to position the paragraph
function hdfys_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';
	echo "
	<style type='text/css'>
	.admin-hdfys {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

/*
Options Page
*/

function hdfys_options() {
	echo '
	<div class="wrap">
	<h2>Hello Dolly For Your Song</h2>
	';
	if(isset($_POST['hdfys'])) {
		$your_song = $_POST['your_song'];
		$your_song = preg_replace("/[\r\n]+[\s\t]*[\r\n]+/","\n", $your_song);
		update_option('hdfys_song', $your_song);
		echo '		
		<div class="updated fade">
		<p><strong>'. __('Settings saved!','hellodollyforyoursong').'</strong></p> 
		</div>';
	}
	$your_song = (get_option('hdfys_song') != false) ? get_option('hdfys_song') : "";
	$your_song = stripcslashes($your_song);
	echo '
	<p>'. __('Which song do you like?','hellodollyforyoursong').'<br/>'. __('What song touched you?','hellodollyforyoursong').'<br/>'. __('What song brings you back fond memories?','hellodollyforyoursong').'</p>
	<p>'. __('Enter the lyrics into the form.','hellodollyforyoursong').'</p>
	<form name="songtext" method="post" action="">
	<textarea name="your_song" style="width:600px;height:400px;">'.$your_song.'</textarea>
	<p class="submit">
	<input type="submit" class="button-primary" name="hdfys" value="Save" />
	</p>
	</form>
	</div>
	';
}

/*
Add the options page to the admin panel
*/

function hdfys_show_options() {
add_options_page('Hello Dolly For Your Song', 'Hello Dolly Your Song', 10, basename(__FILE__), "hdfys_options");
}

/*
Widget
*/

// Load the widget
function hdfys_init_widget() {
	
	register_sidebar_widget('Hello Dolly For Your Song', 'hdfys_widget');
}

// The unbelievable widget ;-)
function hdfys_widget() {

	$widget_text = get_option('hdfys_song');
	$widget_text = strlen($widget_text);
	$widget_line = ($widget_text > 0) ? hdfys_get_lyric() : hdfys_get_hello_dolly() ;
	echo '<aside class="widget hdfys">';
	echo '<h3 class="widget-title">';
	// echo 'Delete the previous // and enter your widget title here';
	echo '</h3>';
	echo '<p class="widget-hdfys">'.$widget_line.'</p>';
	echo '</aside>';
	
}

?>