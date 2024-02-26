<?php
$cities = get_terms([
    'taxonomy' => 'property_city'
]);
$types = get_terms([
    'taxonomy' => 'property_type'
]);
$currentCity = get_query_var('city');
$currentType = get_query_var('property_type');
?>
<form action="<?= get_post_type_archive_link('property') ?>" class="search-form__form">
<?php if(is_front_page()): ?>
<div class="search-form__checkbox">
    </div>
    <?php endif ?>
    <div class="form-group">
        <select name="city" id="city" class="form-control">
            <option value=""><?= __('Les lieux', 'agencia') ?></option>
            <?php foreach($cities as $city): ?>
                <option value="<?= $city->slug ?>" <?php selected($city->slug, $currentCity) ?>><?= $city->name ?></option>
            <?php endforeach; ?>
        </select>
        <label for="city"><?= __('Lieu', 'agencia') ?></label>
    </div>
    <div class="form-group">
        <select name="property_type" id="property_type" class="form-control">
            <option value=""><?= __('Les types', 'agencia') ?></option>
            <?php foreach($types as $type): ?>
                <option value="<?= $type->slug ?>" <?php selected($type->slug, $currentType) ?>><?= $type->name ?></option>
            <?php endforeach; ?>
        </select>
        <label for="property_type"><?= __('Type', 'agencia') ?></label>
    </div>
    
    <button type="submit" class="btn btn-filled"><?= __('Rechercher', 'agencia') ?></button>
</form>