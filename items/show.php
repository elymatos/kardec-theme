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

<div id="show-box">
  <div class="viewer">
    <?php
    echo $this->universalViewer($item, array(
      'style' => 'height: 600px;' . get_option('universalviewer_style'),
    ));
    ?>
  </div>
  <div class="data">
    <div class="ui top attached tabular menu">
      <a class="active item" data-tab="first">Dados</a>
      <a class="item" data-tab="second">Transcrição</a>
      <a class="item" data-tab="third">Tradução</a>
    </div>
    <div class="ui bottom attached active tab segment" data-tab="first">
      <div class="ui card">
        <?php $data = all_element_texts('item', ['return_type' => 'array']); ?>
        <div class="content">
          <div class="header">Dublin Core</div>
        </div>
        <div class="content">
          <div class="ui small feed">
            <?php foreach ($data["Dublin Core"] as $name => $value) : ?>
              <div class="event">
                <div class="content">
                  <b><?php echo __($name); ?>:</b> <?php echo $value[0]; ?>
                </div>
              </div>
            <?php endforeach; ?>
          </div>
        </div>
      </div>

      <!-- The following prints a list of all tags associated with the item -->
      <?php if (metadata('item', 'has tags')): ?>
        <div class="ui card">
          <div class="content">
            <div class="header"><?php echo __('Tags'); ?></div>
          </div>
          <div class="content">
            <div class="ui small feed">
              <div class="event">
                <div class="content">
                  <?php echo tag_string('item'); ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endif; ?>

      <!-- The following prints a citation for this item. -->
      <div class="ui card">
        <div class="content">
          <div class="header"><?php echo __('Citation'); ?></div>
        </div>
        <div class="content">
          <div class="ui small feed">
            <div class="event">
              <div class="content">
                <?php echo metadata('item', 'citation', array('no_escape' => true)); ?>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
    <div class="ui bottom attached tab segment" data-tab="second">
      <?php
        $tn = [];
        foreach($item->Files as $file) {
            if (strpos($file->original_filename, '_TN')) {
              $tn[] = $file;
            }
        }
        ?>
      <?php if (count($tn) > 0) :?>
        <div class="ui top attached secondary menu">
          <?php foreach($tn as $i => $file) {
              $pg= $i + 1;
              $idTab = "second_" . $pg;
              $titleTab = $file->original_name;
              echo "<a class='item' data-tab='{$idTab}'>{$pg}</a>";
            }
          ?>
        </div>
        <?php foreach($tn as $i => $file) {
          $pg= $i + 1;
          $idTab = "second_" . $pg;
          $titleTab = $file->original_name;
          $markup = file_markup($tn[$i]);
          echo "<div class=\"ui bottom attached tab segment secondaryTab\" data-tab=\"{$idTab}\">{$markup}</div>";
        }
        ?>
      <?php else: ?>
      <span>Não há transcrições para este item.</span>
      <?php endif; ?>
    </div>
    <div class="ui bottom attached tab segment" data-tab="third">
      <?php
      $tn = [];
      foreach($item->Files as $file) {
        if (strpos($file->original_filename, '_TR')) {
          $tn[] = $file;
        }
      }
      ?>
      <?php if (count($tn) > 0) :?>
        <div class="ui top attached secondary menu">
          <?php foreach($tn as $i => $file) {
            $pg= $i + 1;
            $idTab = "third_" . $pg;
            $titleTab = $file->original_name;
            echo "<a class='item' data-tab='{$idTab}'>{$pg}</a>";
          }
          ?>
        </div>
        <?php foreach($tn as $i => $file) {
          $pg= $i + 1;
          $idTab = "third_" . $pg;
          $titleTab = $file->original_name;
          $markup = file_markup($tn[$i]);
          echo "<div class=\"ui bottom attached tab segment secondaryTab\" data-tab=\"{$idTab}\">{$markup}</div>";
        }
        ?>
      <?php else: ?>
        <span>Não há traduções para este item.</span>
      <?php endif; ?>
    </div>
  </div>
</div>
<nav>
  <ul class="item-pagination navigation">
    <li id="previous-item"
        class="previous"><?php echo link_to_previous_item_show(); ?></li>
    <li id="next-item"
        class="next"><?php echo link_to_next_item_show(); ?></li>
  </ul>
</nav>
<?php echo foot(); ?>

<script>
    jQuery('.menu .item')
        .tab()
    ;
</script>
