# Codeless Library
An helper library with functionalities that are common among my WP projects.

## Features

- 2 functions to check if WP_DEBUG and SCRIPT_DEBUG are defined.
- Utility class to display admin notices with ability to dismiss notices via ajax.
- Utility function to add plugin action links.
- Utility function to add plugin row meta links.
- Utility function to add a plugin message ( similar to the update message into the plugin’s page ).
- Count bubble.
- Helper function to add admin menu bar items.
- Add columns to the user’s table.
- Add columns to post types tables.
- Add columns to taxonomies tables.
- Add new action links to post rows.
- A jQuery modal interface that replicates the look and feel of WP’s media manager modals.

## Initialize the class

Include the `wp-codeless-lib.php` file into your project and then:

```php
$helper = new TDP\Codeless;
```

### Check if WP_DEBUG is defined

```php
if( $helper::is_development() )
```

### Check if WP_DEBUG and SCRIPT_DEBUG are defined

```php
if( $helper::is_development() && $helper::is_script_debug() )
```

### Show an admin notice

```php
$helper::show_admin_notice( $content = ‘The message’ , $type = ‘success’ , $id );
```

If `$id` is defined, the message will be set as “sticky”. Sticky notices will stay visible until the user dismisses the message.

Dismissed messages are stored into the `wp_codeless_dismissed_notices` option.
