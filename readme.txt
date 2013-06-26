=== Hello Dolly For Your Song ===
Contributors: unmus
Tags: hello dolly, love, widget, music, song, random, text
Requires at least: 3.0 or higher
Tested up to: 3.5.2
Stable tag: trunk
License: GPLv3 or later

This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg. It shows a random text line of any song in the blog as widget and at the admin screen.

== Description ==

This simple plugin is an extended version of the famous hello dolly plugin by Matt Mullenweg (inventor of wordpress). Every human being has a special connection to a particular song. And because of that, Hello Dolly For Your Song brings the lyric of your favourite song in the blog and to the admin screen. But of course it can be used for any text. ;-)

= Features =

* Display Hello Dolly in the admin head
* Display custom songtext at the admin screen
* Display custom songtext in the blog
* Hello For Dolly Your Song Widget
* Options Page to define a custom song text
* Languages: English, German

= Related Links =

<a href="http://www.unmus.de/wordpress-plugin-hello-dolly-for-your-song/">Official Plugin Page</a> (German)
<a href="http://www.unmus.de/hello-dolly-for-your-song/">Why I have created this plugin?</a> (German)

== Installation ==

1. Upload plugin folder to the /wp-content/plugins/ directory
2. Activate the plugin through the Plugins menu in WordPress
3. Then go to settings > Hello Dolly Your Song to configure your songtext

But much better is the wordpress plugin directory installation. 

== Frequently Asked Questions ==

= I have not maintained any songtext, nevertheless some text will be displayed in the admin head. =

This is Hello Dolly by Louis Armstrong. If not any text is maintained in the options, the programm uses the songtext of Hello Dolly.

= How can I deinstall Hello Dolly For Your Song? =

You can use the regular way at the plugin page. After deinstallation your wordpress is really clean. Version 0.4 of this plugin and above cleans all database entries too.

= How can I deinstall the previous versions of Hello Dolly For Your Song? =

You can use the regular way at the plugin page too. But the last maintained text remains in your database. To remove it, please delete the dataset "option-name=hdfys_song" in the table wp_options.

= How can I bring the widget in the blog with a custom widget title? =

Go to line 173 of the file hellodollyforyoursong.php.
Remove the // and write your widget title between the apostrophes.

== Screenshots ==

1. Display songtext in the admin head
2. Options Page

== Changelog ==

= 0.4 =
* 26 june 2013
* Widget
* Localization
* German language
* Clean desinstallation (database entries will be removed)
* Bugfix: Processing of apostrophes

= 0.3 =
* 3 may 2013
* Structured and readable code
* Initial published version

= 0.2 =
* 3 may 2013
* Running version without errors

= 0.1 =
* 3 may 2013
* Running version