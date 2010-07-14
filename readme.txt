=== xili-sIFR3-active ===
Contributors: MS xiligroup
Donate link: http://dev.xiligroup.com/xili-sifr3-active/
Tags: theme,sIFR,sIFR3,Post,plugin,posts,admin,flash,font,theme
Requires at least: 2.7.0
Tested up to: 3.0
Stable tag: 0.9.2

xili-sIFR3-active activate the modules of sIFR3 in your current theme. 

== Description ==

xili-sIFR3-active activate the modules of sIFR3 in your current theme and detect the specific configurations for sIFR3 in your theme.

**prerequisite**
This first version is for "themes" designer and developer with knowledges
about sIFR3 :[sIFR3 documentation](http://wiki.novemberborn.net/sifr3/ "sIFR3 documentation") and [Site to generate .swf font files compatible with sIFR3](http://www.sifrgenerator.com/ "to generate font.swf files").
	
The plugin provide a dynamic way to activate the sIFR3 .js and .css file in the selected pages by you through a function in the functions.php of your current theme. (see below)

= the files and folders in plugin and in theme's folder =
sIFR3 need a series of file (.js and .css). With the font's swf files, two (sifr.css - sifr-config.js) must be adapted for your site and his look.
The plugin search both files at first step in the current theme (in a "js" folder for .js and in a "sifr3" for .css).
If not present, it search in "wp-js" folder in plugin folder. (here added not to disturb the original sIFR3 folder and sub-folders ; here tested with sifr3-r436).
xili-sIFR3-active provide a way through a VAR to give folder place to java-scripts.

Example of function added in functions.php file of your theme: (in this case, adding sifr header files are only added in front-page... *in the demo page, the selection is done through:* `in_category() and is_single()`

`function is_sifr3_intheme(){
	if (is_front_page()) 
			return true;
	return false;
}`

Examples of line added in sifr-config-js file to keep path values VAR:

in default plugin sub-folder *wp-js*: 

`var rockwell = { 
			src: pluginfolder + '/wp-js/rockwell.swf'
`
in your theme sub-folder *js* :

`var rockwell = { 
			src: themefolder + '/js/rockwell.swf'
`
The best is to have a sifr-config specially attached for your specific theme.

== Installation ==

1. Upload the folder named xili-sifr3-active to the `/wp-content/plugins/` directory,
2. Upload a **specific config** in your current theme.
3. Activate the plugin through the *'Plugins'* menu in WordPress,
4. Go to the dashboard tools tab - xili-sIFR3-active - and adapt default values if necessary. (in future)

== Frequently Asked Questions ==

= Why the admin UI is today empty ? =
Because it is reserved for future options (and open for other developers !).

= When sIFR3 is activated, I see both standard H2 just after flash text : why ? =
the ’sifr.css’ file is not in right places (theme subfolder or plugins subfolder) so cannot be found. Verify by comparing html source and content of folder.

= Support Forum or contact form ? =

Effectively, prefer [forum](http://forum2.dev.xiligroup.com/) to have support (with delay around one or two days - here European Time).

== Screenshots ==

1. an example of wp-content/themes folder
2. the admin settings UI

== Changelog ==

= 0.9.2 = 
* third release 090210,
* fix when 'wpurl' is not 'siteurl'
= 0.9.1 = 
* second release with minor fix and more docs.
= 0.9.0 =  
* first public release 090204.

== Upgrade Notice ==

As usually, don't forget to backup the database before major upgrade or testing no-current version.
Upgrading can be easily procedeed through WP admin UI or through ftp.

== More Infos ==
A post with sIFR3 active on WP 3.0 is visible [here](http://dev.xiligroup.com/?p=235). *(the same page before updating from 2.9 to 3.0)*
© 2010-07-14 MS dev.xiligroup.com
