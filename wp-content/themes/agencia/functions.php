<?php
require_once('inc/supports.php');
require_once('inc/assets.php');
require_once('inc/apparence.php');
require_once('inc/menus.php');



function agencia_icon(string $name): string {
    $spriteUrl = get_template_directory_uri() . '/assets/sprite.14d9fd56.svg';
    return <<<HTML
<svg class="icon"><use xlink:href="{$spriteUrl}#{$name}"></use></svg>
HTML;
}