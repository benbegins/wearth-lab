<?php

// Register marque Taxonomy
function marques_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Marques', 'Taxonomy General Name', 'wearthlab' ),
		'singular_name'              => _x( 'Marque', 'Taxonomy Singular Name', 'wearthlab' ),
		'menu_name'                  => __( 'Marques', 'wearthlab' ),
		'all_items'                  => __( 'Toutes les marques', 'wearthlab' ),
		'parent_item'                => __( 'Marque parent', 'wearthlab' ),
		'parent_item_colon'          => __( 'Marque parent :', 'wearthlab' ),
		'new_item_name'              => __( 'Ajouter une marque', 'wearthlab' ),
		'add_new_item'               => __( 'Ajouter une marque', 'wearthlab' ),
		'edit_item'                  => __( 'Modifier la marque', 'wearthlab' ),
		'update_item'                => __( 'Mettre à jour la marque', 'wearthlab' ),
		'view_item'                  => __( 'Voir la marque', 'wearthlab' ),
		'separate_items_with_commas' => __( 'Séparer les marques par une virgule', 'wearthlab' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer des éléments', 'wearthlab' ),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisées', 'wearthlab' ),
		'popular_items'              => __( 'Marques populaires', 'wearthlab' ),
		'search_items'               => __( 'Rechercher des marques', 'wearthlab' ),
		'not_found'                  => __( 'Rien trouvé', 'wearthlab' ),
		'no_terms'                   => __( 'Pas d\'élément', 'wearthlab' ),
		'items_list'                 => __( 'Liste des marques', 'wearthlab' ),
		'items_list_navigation'      => __( 'Liste des marques navigation', 'wearthlab' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'marque', array( 'product' ), $args );

}
add_action( 'init', 'marques_taxonomy', 0 );



// Register icones Taxonomy
function icones_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Icones', 'Taxonomy General Name', 'wearthlab' ),
		'singular_name'              => _x( 'Icone', 'Taxonomy Singular Name', 'wearthlab' ),
		'menu_name'                  => __( 'Icones', 'wearthlab' ),
		'all_items'                  => __( 'Toutes les icones', 'wearthlab' ),
		'parent_item'                => __( 'Icone parent', 'wearthlab' ),
		'parent_item_colon'          => __( 'Icone parent :', 'wearthlab' ),
		'new_item_name'              => __( 'Ajouter une icone', 'wearthlab' ),
		'add_new_item'               => __( 'Ajouter une icone', 'wearthlab' ),
		'edit_item'                  => __( 'Modifier l\'icone', 'wearthlab' ),
		'update_item'                => __( 'Mettre à jour l\'icone', 'wearthlab' ),
		'view_item'                  => __( 'Voir l\'icone', 'wearthlab' ),
		'separate_items_with_commas' => __( 'Séparer les icones par une virgule', 'wearthlab' ),
		'add_or_remove_items'        => __( 'Ajouter ou supprimer des éléments', 'wearthlab' ),
		'choose_from_most_used'      => __( 'Choisir parmi les plus utilisées', 'wearthlab' ),
		'popular_items'              => __( 'Icones populaires', 'wearthlab' ),
		'search_items'               => __( 'Rechercher des icones', 'wearthlab' ),
		'not_found'                  => __( 'Rien trouvé', 'wearthlab' ),
		'no_terms'                   => __( 'Pas d\'élément', 'wearthlab' ),
		'items_list'                 => __( 'Liste des icones', 'wearthlab' ),
		'items_list_navigation'      => __( 'Liste des icones navigation', 'wearthlab' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'icone', array( 'product' ), $args );

}
add_action( 'init', 'icones_taxonomy', 0 );
