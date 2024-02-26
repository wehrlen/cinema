<?php 
/**
* Plugin Name: Film Plugin
*/
add_action('init', function () {
    register_post_type('property', [
        'label' => __('Property', 'filmm'),
        'menu_icon' => 'dashicons-tickets',
        'labels' => [
            'name'                     => __('Property', 'film'),
            'singular_name'            => __('Property', 'film'),
            'edit_item'                => __( 'Edit property', 'film'),
            'new_item'                => __( 'New property', 'film'),
            'view_item'                => __( 'View property', 'film'),
            'view_items'                => __( 'View properties', 'film'),
            'search_items'                => __( 'Search properties', 'film'),
            'not_found'                => __( 'No properties found.', 'film'),
            'not_found_in_trash'                => __( 'No properties found in Trash', 'film'),
            'all_items'                => __( 'All properties', 'film'),
            'archives'                => __( 'Property archive', 'film'),
            'attributes'                => __( 'Property attributes', 'film'),
            'insert_into_item'         => __( 'Insert into property', 'film' ),
            'uploaded_to_this_item'    => __( 'Uploaded to this property', 'film' ),
            'filter_items_list'        => __( 'Filter properties list', 'film' ),
            'items_list_navigation'    => __( 'Properties list navigation', 'film' ), 
            'items_list'               => __( 'Properties list', 'film' ),
            'item_published'           => __( 'Property published.', 'film' ),
            'item_published_privately' => __( 'Property published privately.', 'film' ),
            'item_reverted_to_draft'   => __( 'Property reverted to draft.', 'film' ),
            'item_scheduled'           => __( 'Property scheduled.', 'film' ),
            'item_updated'             => __( 'Property updated.', 'film' ),
        ],
        'has_archive' => true,
        'public' => true,
        'hierarchical' => false,
        'exclude_from_search' => false,
        'taxonomies' => ['property_type', 'property_city', 'property_option'],
        'supports' => ['title', 'editor', 'excerpt', 'thumbnail']
    ]);
    register_taxonomy('property_type', 'property', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __( 'Types', 'film' ),
        'singular_name'              => __( 'Type', 'film' ),
        'search_items'               => __( 'Search Types' , 'film'),
        'popular_items'              => __( 'Popular Types' , 'film'),
        'all_items'                  => __( 'All Types' , 'film'),
        'edit_item'                  => __( 'Edit Type' , 'film'),
        'view_item'                  => __( 'View Type' , 'film'),
        'update_item'                => __( 'Update Type' , 'film'),
        'add_new_item'               => __( 'Add New Type' ), 'film', 
        'new_item_name'              => __( 'New Type Name' , 'film'),
        'separate_items_with_commas' => __( 'Separate Types with commas' , 'film'),
        'add_or_remove_items'        => __( 'Add or remove Types' , 'film'),
        'choose_from_most_used'      => __( 'Choose from the most used Types' , 'film'),
        'not_found'                  => __( 'No Types found.' , 'film'),
        'no_terms'                   => __( 'No Types' , 'film'),
        'items_list_navigation'      => __( 'Types list navigation' , 'film'),
        'items_list'                 => __( 'Types list' , 'film'),
        'back_to_items'              => __( '&larr; Back to Types' , 'film'),
        ]
    ]);
    register_taxonomy('property_city', 'property', [
        'meta_box_cb' => 'post_categories_meta_box',
        'labels' => [
        'name'                       => __( 'Cities', 'film' ),
        'singular_name'              => __( 'City', 'film' ),
        'search_items'               => __( 'Search Cities' , 'film'),
        'popular_items'              => __( 'Popular Cities' , 'film'),
        'all_items'                  => __( 'All Cities' , 'film'),
        'edit_item'                  => __( 'Edit City' , 'film'),
        'view_item'                  => __( 'View City' , 'film'),
        'update_item'                => __( 'Update City' , 'film'),
        'add_new_item'               => __( 'Add New City' ), 'film', 
        'new_item_name'              => __( 'New City Name' , 'film'),
        'separate_items_with_commas' => __( 'Separate Cities with commas' , 'film'),
        'add_or_remove_items'        => __( 'Add or remove Cities' , 'film'),
        'choose_from_most_used'      => __( 'Choose from the most used Cities' , 'film'),
        'not_found'                  => __( 'No Cities found.' , 'film'),
        'no_terms'                   => __( 'No Cities' , 'film'),
        'items_list_navigation'      => __( 'Cities list navigation' , 'film'),
        'items_list'                 => __( 'Cities list' , 'film'),
        'back_to_items'              => __( '&larr; Back to Cities' , 'film'),
        ]
    ]);
    register_taxonomy('property_option', 'property', [
        'labels' => [
        'name'                       => __( 'Options', 'film' ),
        'singular_name'              => __( 'Option', 'film' ),
        'search_items'               => __( 'Search Options' , 'film'),
        'popular_items'              => __( 'Popular Options' , 'film'),
        'all_items'                  => __( 'All Options' , 'film'),
        'edit_item'                  => __( 'Edit Option' , 'film'),
        'view_item'                  => __( 'View Option' , 'film'),
        'update_item'                => __( 'Update Option' , 'film'),
        'add_new_item'               => __( 'Add New Option' ), 'film', 
        'new_item_name'              => __( 'New Option Name' , 'film'),
        'separate_items_with_commas' => __( 'Separate Options with commas' , 'film'),
        'add_or_remove_items'        => __( 'Add or remove Options' , 'film'),
        'choose_from_most_used'      => __( 'Choose from the most used Options' , 'film'),
        'not_found'                  => __( 'No Options found.' , 'film'),
        'no_terms'                   => __( 'No Options' , 'film'),
        'items_list_navigation'      => __( 'Options list navigation' , 'film'),
        'items_list'                 => __( 'Options list' , 'film'),
        'back_to_items'              => __( '&larr; Back to Options' , 'film'),
        ]
    ]);
});

register_activation_hook(__FILE__, 'flush_rewrite_rules');
register_deactivation_hook(__FILE__, 'flush_rewrite_rules');

require_once("query.php");

/**
 *@param WP_Post|int|null $post
 */
function film_city($post): void{
    if ($post === null) {
        $post = get_post();
    }
    $cities = get_the_terms($post, 'property_city');
    if (empty($cities)) {
        return;
    }
    $city = $cities[0];
    echo $city->name;
    $postalCode = get_field('postal_code', $city);
    if ($postalCode) {
        echo ' (' . $postalCode . ')';
    }
}

/**
 *@param WP_Post|int|null $post
 */
function film_type($post): void{
    if ($post === null) {
        $post = get_post();
    }
    $types = get_the_terms($post, 'property_type');
    if (empty($types)) {
        return;
    }
    $type = $types[0];
    echo $type->name;
}