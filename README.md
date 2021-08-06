# WordPress: ENVIRONMENT constant setting for identifying Development or Live environments

This bit of code allows you to identify the server the code is accessed from, sets a WordPress Constant named "ENVIRONMENT" in wp-config.php, and demonstrates use in both the wp-config.php and functions.php files.

This code is useful if you are regularly updating your site and want to be sure you're not uploading development environment code to your live production sites. It's also useful for letting you set up variables for reuse in your code without remembering your sandbox and live credentials and tokens every time you need them.

