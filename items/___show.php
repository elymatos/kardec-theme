<?php
$title = metadata('item', 'display_title');
echo head(array('title' => $title, 'bodyclass' => 'items show'));
?>

<header>
    <h2><?php echo metadata('item', 'display_title'); ?></h2>
    <?php if ($description = metadata('item', array('Dublin Core', 'Description'), array('snippet' => 250))): ?>
        <p><?php echo $description; ?></p>
    <?php endif; ?>
</header>

<div style="display:flex; flex-direction: row; margin:1rem;">
  <div style="width:50%">
    <?php
    echo $this->universalViewer($item, array(
      'style' => 'height: 600px;' . get_option('universalviewer_style'),
    ));
    ?>
  </div>
  <div style="width:45%">
    <?php echo all_element_texts('item'); ?>

    <!-- The following prints a list of all tags associated with the item -->
    <?php if (metadata('item', 'has tags')): ?>
      <div id="item-tags" class="element">
        <h3><?php echo __('Tags'); ?></h3>
        <div class="element-text"><?php echo tag_string('item'); ?></div>
      </div>
    <?php endif;?>

    <!-- The following prints a citation for this item. -->
    <div id="item-citation" class="element">
      <h3><?php echo __('Citation'); ?></h3>
      <div class="element-text"><?php echo metadata('item', 'citation', array('no_escape' => true)); ?></div>
    </div>

    <?php fire_plugin_hook('public_items_show', array('view' => $this, 'item' => $item)); ?>
  </div>

</div>


<nav>
<ul class="item-pagination navigation">
    <li id="previous-item" class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item" class="next"><?php echo link_to_next_item_show(); ?></li>
</ul>
</nav>

<?php echo foot(); ?>
