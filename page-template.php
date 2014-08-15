<?php
/*
Plugin Name: Page templates
Plugin URI: http://ryan.hoover.ws
Description: Displays a page's template on its edit page
Version: 0.1
Author: Ryan Hoover
Author URI: http://ryan.hoover.ws
*/


// *****
// Add column in pages admin screen to show page template
function rsh_custom_pages_columns($columns) {

	/** Add a Template Column **/
	$templateColumn = array(
		'template' => __('Template')
	);
	$columns = array_merge( $columns, $templateColumn );
	
	return $columns;
}
add_filter('manage_pages_columns', 'rsh_custom_pages_columns');

// *****
// Get content for custom column
function rsh_custom_page_column_content($column_name, $post_id) {
  if ($column_name == 'template') {
		$page_template = array_search( get_post_meta( $post_id, '_wp_page_template', true ), get_page_templates() );
  	echo $page_template;
  }
}
add_action('manage_pages_custom_column', 'rsh_custom_page_column_content', 10, 2);
