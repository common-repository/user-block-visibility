=== User Block Visibility ===
Contributors: nateconley
Tags: gutenberg, blocks, users
Requires at least: 5.0
Tested up to: 5.1.1
Requires PHP: 5.6
Stable tag: 1.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Allows authors to restrict access to blocks by user roles.

== Description ==

Allows authors to restrict access to blocks by user roles.

This plugin is meant to be lightweight, limited in scope, while maintaining extensibility. If you need a hook, please reach out!

## Developer API

User Block Visibility is meant to be extensible. For example, use the filter `ubv_built_in_user_roles` to restrict the built-in roles that are available.

To create custom restriction options, use `ubv_additional_roles` and the built-in WordPress filter `render_block`.

To restrict access to this functionality, use `ubv_do_enqueue_sidebar`.

== Screenshots ==

1. Showing a block with visibility restricted for subscribers and users who are not logged in.

== Frequently Asked Questions ==

= Hey, this isn't working with "Classic" blocks. =

Classic blocks do not behave like normal blocks and do not store data along with them, so this plugin will not work for this block type.

= This is not working for [insert block type]! =

You may have found a bug! I would be happy to take a look if you wouldn't mind to submit a ticket in the support forum for this plugin.

== Changelog ==

= 1.0 =
* Initial release!
