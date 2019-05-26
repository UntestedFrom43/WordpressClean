<?php if ( ! defined( 'FW' ) ) {
	die( 'Forbidden' );
}

/**
 * @var array $atts
 */
?>
<!-- Оборачеваем в ссылку по условию -->
<?php if( isset( $atts['url'] ) && $atts['url'] ): ?>
	<!-- Редирект на пользовательский ввод в конструкторе -->
	<!-- Открытие ссылки -->
	<a href="<?php echo esc_attr($atts['url']); ?>">
<?php endif; ?>

<!-- Ссылка с icon-->
<span class="fw-icon">
	<i class="<?php echo esc_attr($atts['icon']); ?>"></i>
	<?php if (!empty($atts['title'])): ?>
		<br/>
		<span class="list-title"><?php echo $atts['title'] ?></span>
	<?php endif; ?>
</span>

<?php if( isset( $atts['url'] ) && $atts['url'] ): ?>
	<!-- Закрытие ссылки -->
	</a>
<?php endif; ?>