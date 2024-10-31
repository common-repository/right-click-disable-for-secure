<?php 
/* ================================================
Plugin Name: Right Click Disable for Secure
Plugin URI: https://plugin.habibcoder.com/right-click-disable/
Author: HabibCoder
Author URI: http://habibcoder.com
Version: 3.0.0
Requires at least: 6.0
Tested up to: 6.6
Requires PHP: 7.0
License: GNU General Public License v2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Description: *Right Click Disable for Secure* is a WordPress Website Secure Plugin. If you want to enhance the security of your website, you can use this plugin.
Tags: right click disable for secure, right click disable, website security, click disable, secure website 
Text Domain: rcdfors
================================================= */

// ABSPATH
if (! defined('ABSPATH')) {
	exit();
}

/* ==========================
	Text Domain
========================== */
add_action('plugins_loaded', 'rcdfors_load_textdomain');
function rcdfors_load_textdomain(){
    load_plugin_textdomain('rcdfors', false, dirname(plugin_basename( __FILE__ ) ) . '/lang');
}

/* =================================
	Get Plugin Directory and URL
================================= */
$rcd_dir = plugin_dir_path( __FILE__ );
$recd_dir_url = plugin_dir_url( __FILE__ );

/* =============================
	Require Files
============================= */
$rcd_admin_dir = $rcd_dir . 'admin/rcdfors-option.php';
if (file_exists($rcd_admin_dir)) {
	require_once($rcd_admin_dir);
}


/* =============================
	Enqueue Back End
============================= */
add_action('admin_enqueue_scripts', 'rcdfors_backend_cssjs_enqueue');
function rcdfors_backend_cssjs_enqueue(){
	// Stylesheet
	wp_enqueue_style('rcdfors-css', PLUGINS_URL('css/rcdfors-style.css', __FILE__), array(), '2.0.0', 'all');
}


/* ===============================================
	Redirect Plugin Admin Page after Activate
=============================================== */
register_activation_hook( __FILE__, 'rcdfors_plugin_activation' );
function rcdfors_plugin_activation(){
	add_option( 'rcdfors_plugin_do_activate', true);
}

add_action( 'admin_init', 'rcdfors_plugin_redirect' );
function rcdfors_plugin_redirect(){
	if ( is_admin() && get_option('rcdfors_plugin_do_activate', false)) {
		delete_option( 'rcdfors_plugin_do_activate' );
		
		if(!isset($_GET['active_multi'])) {
			wp_safe_redirect( admin_url('admin.php?page=rcd-for-secure') );
			exit;
		}

	}
};
/* ==================================
	Script add dynamically
================================== */
add_action('wp_head', 'rcdfors_addjs_dynamically');
function rcdfors_addjs_dynamically(){ ?>
	
<!-- Right Click Disable for Secure Plugin Script -->
<script>
	// Without alert text
<?php if(get_option('rcdforsalertnoyes') == 'no') : ?>
	if(document.addEventListener){
		document.addEventListener('contextmenu', function(e){
			e.preventDefault();
		}, false);
	}else{
		document.attachEvent('oncontextmenu', function(){
			window.event.returnValue = false;
		});
	};
	<?php endif; ?>
	// With alert text
<?php if(get_option('rcdforsalertnoyes') == 'yes') : ?>
	if(document.addEventListener){
		document.addEventListener('contextmenu', function(e){
			alert("<?php print get_option('rcdalerttext'); ?>");
			e.preventDefault();
		}, false);
	}else{
		document.attachEvent('oncontextmenu', function(){
			alert("<?php print get_option('rcdalerttext'); ?>");
			window.event.returnValue = false;
		});
	};
	<?php endif; ?>
//F12, ctrl + shift + I, ctrl + shift + J, ctrl + shift + C, ctrl + U Disable 
	document.onkeydown = function(e){
		<?php if(get_option('rcdforsftwelvekey') == 'yes') : ?> 
		if(e.keyCode == 123) {
			return false;
		}
		<?php endif; ?>
		<?php if(get_option('rcdforskey-crtlshifti') == 'yes') : ?> 
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'I'.charCodeAt(0)){
			return false;
		}
		<?php endif; ?>
		<?php if(get_option('rcdfors-csjkey') == 'true') : ?> 
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'J'.charCodeAt(0)){
			return false;
		}
		<?php endif; ?>
		<?php if(get_option('rcdfors-cukey') == 'true') : ?> 
		if(e.ctrlKey && e.keyCode == 'U'.charCodeAt(0)){
			return false;
		}
		<?php endif; ?> 
		<?php if(get_option('rcdfors-csckey') == 'true') : ?> 
		if(e.ctrlKey && e.shiftKey && e.keyCode == 'C'.charCodeAt(0)){
			return false;
		}  
		<?php endif; ?>     
	};
</script>
<?php 
}