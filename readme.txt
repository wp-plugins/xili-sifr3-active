=== xili-sIFR3-active ===
Contributors: MS xiligroup
Donate link: http://dev.xiligroup.com/xili-sifr3/
Tags: theme,sIFR,sIFR3,Post,plugin,posts,admin,flash,font,theme
Requires at least: 2.7.0
Tested up to: 2.7
Stable tag: 0.9.0

xili-sIFR3-active activate the modules of sIFR3 in your current theme. 

== Description ==

xili-sIFR3-active activate the modules of sIFR3 in your current theme and detect the specific configurations for sIFR3 in your theme.

**prerequisite**
This first version is for "themes" designer and developper with knowledges
about sIFR3
	[sIFR3 documentation](http://wiki.novemberborn.net/sifr3/ "sIFR3 documentation")
	[Site to generate .swf font files compatible with sIFR3](http://www.sifrgenerator.com/ "to generate font.swf files")
The plugin provide a dynamic way to activate the sIFR3 .js and .css file in the selected pages by you through a function in the functions.php of your current theme. (see below)

= the files and folders in plugin and in theme's folder =
sIFR3 need a series of file (.js and .css). With the font's swf files, two (sifr.css - sifr-config.js) must be adapted for your site and his look.
The plugin search both files at first step in the current theme (in a "js" folder).
If not present, it search in "wp-js" folder in plugin folder. (here added not to disturb the original sIFR3 folder and sub-folders ; here tested with sifr3-r436).
xili-sIFR3-active provide a way through a VAR to give folder place to java-scripts.

Example of function added in functions.php file of your theme:

`function is_sifr3_intheme(){
	if (is_front_page()) 
			return true;
	return false;
}`


== Installation ==

1. Upload the folder named xili-sIFR3-active to the `/wp-content/plugins/` directory,
2. Upload a **specific config** in your current theme.
3. Activate the plugin through the *'Plugins'* menu in WordPress,
4. Go to the dashboard tools tab - Xili-sIFR3 - and adapt default values if necessary. (in future)

== Frequently Asked Questions ==

= Why the admin UI is today empty ? =
Because it is reserved for future options (and open for other developers !).

== Screenshots ==

1. an example of wp-content/themes folder
2. the admin settings UI

== More infos ==

0.9.0 : first public release 090204