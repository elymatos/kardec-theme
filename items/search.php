<?php
$pageTitle = __('Pesquisar');
echo head(array('title' => $pageTitle,
           'bodyclass' => 'items advanced-search'));
?>

<h1><?php echo $pageTitle; ?></h1>

<h3>Pesquise itens e coleções em nosso acervo digital</h3>
<!--
<nav class="items-nav navigation secondary-nav">
    <?php echo public_nav_items(); ?>
</nav>
-->



<?php echo $this->partial('items/search-form.php',
    array('formAttributes' =>
        array('id' => 'advanced-search-form'))); ?>

<?php echo foot(); ?>

<script>
  jQuery('.menu .item')
    .tab()
  ;
</script>
