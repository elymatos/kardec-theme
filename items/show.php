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
  <div style="margin: 0 1rem 1rem 1rem; 0 1rem 1rem 1rem; width:45%; height:600px">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Dados</a>
      <a class="item" data-tab="second">Transcrição</a>
      <a class="item" data-tab="third">Tradução</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first" style="height:550px">
      <div class="ui card">
        <?php $data = all_element_texts('item', ['retyrn_type' => 'array']); ?>
        <?php foreach($data as $name => $value) : ?>
        <div class="content">
          <div class="ui small feed">
            <div class="event">
              <div class="content">
                <div class="summary">
                  <a><?php echo __($name); ?>:</a> <?php echo $value; ?>
                </div>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>

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
    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
      Second
    </div>
    <div class="ui bottom attached tab segment" data-tab="third">
      Third
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

<script>
    jQuery('.menu .item')
        .tab()
    ;
</script>
