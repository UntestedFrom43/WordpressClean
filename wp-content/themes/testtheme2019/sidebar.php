<!-- Проверка sidebar на наличие виджетов и их вывод -->
<?php 
    if(!is_active_sidebar('right-sidebar')) 
    return; 
?>
<!-- Sidebar-модуль -->
<div class="col-3">
    <!-- <span>Sidebar_test</span> -->
    <?php dynamic_sidebar('right-sidebar'); ?>
</div>