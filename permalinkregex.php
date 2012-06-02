<?php
/**
 * Permalink Regex Filter
 *
 * Apply a regex to the building of your permalinks so you
 * have more control over the url.
 *
 * PHP version 5.3
 *
 * @category WordPress
 * @package  Plugins
 * @author   Tom Davidson <tom@davidson.me.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL v3.0
 * @version  SVN: $Id$
 * @link     https://github.com/Tom-Davidson
 */
/*
Plugin Name: Permalink Regex Filter
Plugin URI: https://github.com/Tom-Davidson
Description: Apply a regex to the building of your permalinks.
Author: Tom Davidson
Version: 0.9
Author URI: https://github.com/Tom-Davidson
*/
/**
 * TomDavidson_WordPress_Plugin_PermalinkRegexFilter
 *
 * The main class for the filter plugin.
 *
 * @category WordPress
 * @package  Plugins
 * @author   Tom Davidson <tom@davidson.me.uk>
 * @license  http://www.gnu.org/copyleft/gpl.html GPL v3.0
 * @link     https://github.com/Tom-Davidson
 */
class TomDavidson_WordPress_Plugin_PermalinkRegexFilter
{
    /**
     * __construct
     *
     * Binds the plugin functionality to the WorPress hooks
     * 
     * @return null
     */
    public function __construct()
    {
        // post_link hook
        add_action(
            'post_link',
            array(
                $this,
                'postLink'
            )
        );
    }
    /**
     * postLink
     *
     * Filter to modify the post rewrite rules
     * 
     * @param WP_Rewrite $rules The current rewrite rules
     *
     * @return WP_Rewrite
     */
    public function postLink($rules)
    {
        // Ok, it's not a regex but it works for this site.
        $rules = str_replace(
            'http://www.claredavidson.com/wp/blog/',
            'http://www.claredavidson.com/blog/',
            $rules
        );
        return $rules;
    }
}

// Instantiate our new class
$td_wp_plugin_permalinkregexfilter
    = new TomDavidson_WordPress_Plugin_PermalinkRegexFilter();
