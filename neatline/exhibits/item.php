<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

?>

<!-- Texts. -->
<div class="tester"><?php echo all_element_texts('item'); ?></div>

<!-- Files. -->
<?php if (metadata('item', 'has files')): ?>
  <h3><?php echo __('Files'); ?></h3>
    <div class="lightbocks">
       <?php
            $imgtypes = array('image/jpeg','image/jpg','image/png','image/jpeg','image/gif');
            foreach ($item->Files as $file) {
                $mime = metadata($file,'MIME Type');
                if (in_array($mime, $imgtypes) ) {
                    echo '<a class="verylight" href="' . file_display_url($file, $format = 'fullsize') . '"data-lightbox="image">';
                    echo '<img src="' . file_display_url($file, $format = 'fullsize') . '"/>' ;
                    echo '</a>';
              } else {
                   echo '<a class="originalfile" href=' . file_markup($file, $props = array('linkToFile' => true, 'imageSize' => 'fullsize')) . '';
                   echo '</a>';
                 }
            };?>
    </div>

<?php endif; ?>

<hr />

<!-- Link. -->
<?php echo link_to(
  get_current_record('item'), 'show', 'View the item in Omeka'
); ?>
