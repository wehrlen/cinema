<?php
/**
 * Ce fichier permet de déclarer les filtres supplémentaires pour filtrer les tournages
 */
defined('ABSPATH') or die('rien à voir');

$propertyCategories = [];


// Filtre les tournages par lieu ou par type
add_filter('query_vars', function (array $params): array {
    $params[] = 'city';
    $params[] = 'property_type';

    return $params;
});
add_action('pre_get_posts', function (WP_Query $query): void {

    if (is_admin() || !$query->is_main_query() || !is_post_type_archive('property')) {
        return;
    }

    //var_dump(get_query_var('city'));

    $city = get_query_var('city');
    if ($city) {
        $tax_query = $query->get('tax_query', []);
        $tax_query[] = [
            'taxonomy' => 'property_city',
            'terms' => $city,
            'field' => 'slug'
        ];
        $query->set('tax_query', $tax_query);
    }

    $type = get_query_var('property_type');
    if ($type) {
        $tax_query = $query->get('tax_query', []);
        $tax_query[] = [
            'taxonomy' => 'property_type',
            'terms' => $type,
            'field' => 'slug'
        ];
        $query->set('tax_query', $tax_query);
    }


});


