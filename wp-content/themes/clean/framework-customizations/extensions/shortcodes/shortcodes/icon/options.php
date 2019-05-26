<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

$options = array(
	'icon'       => array(
		'type' => 'icon',
		'label' => __( 'Icon', 'fw' )
	),
	'title'    => array(
		'type'  => 'text',
		'label' => __( 'Title', 'fw' ),
		'desc'  => __( 'Icon title', 'fw' ),
	),
	//Custom icons
	'url' => array(
		'label' => __('Custom Icon URL', 'clean'),
		'desc'  => __('Insert Custom Icon url to this icon', 'clean'),
		'type'  => 'text',
	),
);