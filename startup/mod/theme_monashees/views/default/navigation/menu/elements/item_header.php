<?php
/**
 * A single element of a menu.
 *
 * @package Elgg.Core
 * @subpackage Navigation
 *
 * @uses $vars['item']       ElggMenuItem
 * @uses $vars['item_class'] Additional CSS class for the menu item
 */
$item = $vars ['item'];

$link_class = 'elgg-menu-closed';
if ($item->getSelected ()) {
    // @todo switch to addItemClass when that is implemented
    // $item->setItemClass('elgg-state-selected');
    $link_class = 'elgg-menu-opened';
}

$children = $item->getChildren ();
if ($children) {
    $item->addLinkClass ( $link_class );
    $item->addLinkClass ( 'elgg-menu-parent' );
}

$item_class = $item->getItemClass ();
$item_link_class_selected = "";

if (elgg_is_active_plugin ( 'home' )) {
    if (elgg_get_context () == 'main') {
        
        if ($item->getName () == 'home') {
            // $item_class = "$item_class elgg-state-selected";
            $item_link_class_selected = 'active';
        }
    }
}

if ($item->getSelected ()) {
    // $item_class = "$item_class elgg-state-selected";
    $item_link_class_selected = 'active';
}

if (isset ( $vars ['item_class'] ) && $vars ['item_class']) {
    $item_class .= ' ' . $vars ['item_class'];
}

echo "<li class=\"$item_class\">";
$link = $item->getContent ();

echo str_replace ( "<a ", '<a class="' . $item_link_class_selected . '" ', $link );

if ($children) {
    echo elgg_view ( 'navigation/menu/elements/section', array (
            'items' => $children,
            'class' => 'elgg-menu elgg-child-menu' 
    ) );
}
echo '</li>';
