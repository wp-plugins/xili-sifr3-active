<?php
/*
Plugin Name: xili-sIFR3-active
Plugin URI: http://dev.xiligroup.com/xili-sifr3-active/
Description: This plugin activate the sIFR3 modules (.css, and .js) inside your current theme -
Author: MS dev.xiligroup.com
Version: 0.9.5
Author URI: http://dev.xiligroup.com
*/ 

# This plugin is free software; you can redistribute it and/or
# modify it under the terms of the GNU Lesser General Public
# License as published by the Free Software Foundation; either
# version 2.1 of the License, or (at your option) any later version.
#
# This plugin is distributed in the hope that it will be useful,
# but WITHOUT ANY WARRANTY; without even the implied warranty of
# MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
# Lesser General Public License for more details.
#
# You should have received a copy of the GNU Lesser General Public
# License along with this plugin; if not, write to the Free Software
# Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA 02111-1307 USA

# Version date 090210 - 101203 - 120122 MS

/*multilingue for admin pages and menu*/


define('XILISIFR3ACTIVE_VER','0.9.5'); /* used in admin UI*/

load_plugin_textdomain('xili-sifr3-active', false, 'xili-sifr3-active' );


if ( !defined('WP_CONTENT_DIR') )
	define( 'WP_CONTENT_DIR', ABSPATH . 'wp-content' );
define('XILISIFR3_ABSPATH', WP_CONTENT_DIR.'/plugins/' . dirname(plugin_basename(__FILE__)) . '/');

	
	define('SIFR3PATH',XILISIFR3_ABSPATH.'sifr3');
	define('SIFR3URL',get_bloginfo('wpurl').'/'.PLUGINDIR.'/'.dirname(plugin_basename(__FILE__)).'/sifr3');
	define('SIFR3INCURTHEMEURL',get_bloginfo('stylesheet_directory'));
	define('SIFR3INCURTHEMEPATH',get_stylesheet_directory()); // 0.9.4 child 
	define('SIFR3SUBJSFOLDER','js'); /*themes sub-folders - if you decide modify here*/
	define('SIFR3SUBSIFRFOLDER','sifr3');

function is_sifr3() {
	/* hook in functions.php of current theme*/
	if (function_exists('is_sifr3_intheme')) return is_sifr3_intheme();
	//if (is_front_page()) return true; /* or uncomment this line */
	return false;
}

if (!is_admin()) {
/* sIFR3 folder */
	function xilisifr3_header() {
	/* js files in header */
		if (is_sifr3()) {
			wp_enqueue_script('sifr3',SIFR3URL.'/js/sifr.js',false,'3');
			wp_enqueue_script('sifr3d',SIFR3URL.'/js/sifr-debug.js',array('sifr3'),'3');
	
			/*with var for sifr-config.js*/
			if (file_exists(SIFR3INCURTHEMEPATH.'/'.SIFR3SUBJSFOLDER.'/sifr-config.js')) {
				echo "<script type=\"text/javascript\">var themefolder = '".str_replace(get_bloginfo('siteurl').'/','',SIFR3INCURTHEMEURL)."';</script>\n";
			
				wp_enqueue_script('sifr3c',get_bloginfo('stylesheet_directory').'/'.SIFR3SUBJSFOLDER.'/sifr-config.js',false,'3');
			} else {
				echo "<script type=\"text/javascript\">var pluginfolder = '".SIFR3DIR."';</script>\n";
				wp_enqueue_script('sifr3c',SIFR3URL.'/wp-js/sifr-config.js',false,'3');
			}
		}
	}
	add_action('wp_print_scripts', 'xilisifr3_header');

	function add_sifr3_stylesheet(){
		if (is_sifr3()) {
    		$ThemeStyleFilePath = SIFR3INCURTHEMEPATH.'/'.SIFR3SUBSIFRFOLDER.'/sifr.css';
    		$DefaultStyleFilePath = SIFR3PATH.'/css/sifr.css'; 
   	
   			if (file_exists($ThemeStyleFilePath)){
    			
        		wp_register_style('sifr3StyleSheet', SIFR3INCURTHEMEURL.'/'.SIFR3SUBSIFRFOLDER.'/sifr.css',false,'2.7','screen'); 
				wp_enqueue_style( 'sifr3StyleSheet');
    		} elseif (file_exists($DefaultStyleFilePath)) {
    			
    			wp_register_style('sifr3DStyleSheet', SIFR3URL.'/css/sifr.css',false,'2.7','screen'); 
				wp_enqueue_style( 'sifr3DStyleSheet');
    		}
		}	
	}

	add_action('wp_print_styles', 'add_sifr3_stylesheet');
}

/*add admin menu and associated page*/
add_action('admin_menu', 'xili_addsifr3_pages');
function xili_addsifr3_pages() {
	add_options_page(__('sIFR3-active','xili-sifr3-active'), __('sIFR3-active','xili-sifr3-active'), 'import', 'sIF3-active_page', 'xili_sIF3_active_menu');
}

function xili_sIF3_active_menu()
		{?>
<div class='wrap'>
		<h2><?php _e("xili-sIFR3-active settings","xili-sifr3-active"); ?></h2>
		<p><cite><a href='http://dev.xiligroup.com/xili-sifr3-active/' target='_blank'>xili-sIF3-active</a></cite> <?php _e("plugin activate the modules of sIFR3 in your current theme and detect the specific configurations for sIFR3 in your theme.","xili-sifr3-active"); ?></p>
		<p>-&nbsp;<?php _e("The current theme is here","xili-sifr3-active"); echo ": <em>".get_bloginfo('stylesheet_directory') ?>. </em><br /><br />-&nbsp;
		<?php _e("The active sifr-config.js is here","xili-sifr3-active"); 
		$themejsfolder = SIFR3INCURTHEMEPATH.'/'.SIFR3SUBJSFOLDER.'/';
		if (file_exists($themejsfolder.'sifr-config.js')) {
			echo ": <em>".SIFR3INCURTHEMEURL.'/'.SIFR3SUBJSFOLDER.'/' ;}
		else {
			echo ": <em>".SIFR3URL.'/wp-js/';
			}
			?>. </em><br /><br />-&nbsp;
		<?php _e("The active sifr.css is here","xili-sifr3-active"); 
		$themecssfolder = SIFR3INCURTHEMEPATH.'/'.SIFR3SUBSIFRFOLDER.'/';
		if (file_exists($themecssfolder.'sifr.css')) {
			echo ": <em>".SIFR3INCURTHEMEURL.'/'.SIFR3SUBSIFRFOLDER.'/' ;}
		else {
			echo ": <em>".SIFR3URL.'/css/';
			}		?>. </em><br /><br />
		
		<strong>
		<?php _e("suite... soon","xili-sifr3-active");?></strong></p>
		<p>© <a href="http://dev.xiligroup.com" target="_blank" title="<?php _e('Author'); ?>" >dev.xiligroup.com</a>™ - msc - 2009-2012 - v. <?php echo XILISIFR3ACTIVE_VER; ?></p>
		<?php 
		}
?>