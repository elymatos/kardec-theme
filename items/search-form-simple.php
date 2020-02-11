<!--
<?php echo $this->form('search-form', $options['form_attributes']); ?>
    -->
    <?php echo $this->formText('query', $filters['query'], array('title' => __('Search'))); ?>
<?php $options['show_advanced'] = true;
$record_types = get_custom_search_record_types();
$searchQueryTypes = array(
  'keyword' => __('Todos os termos'),
  'boolean' => __('Qualquer termo'),
  'exact_match' => __('Termo exato'),
);
$query_types = apply_filters('search_query_types', $searchQueryTypes);
$validRecordTypes = get_custom_search_record_types();

$filters = array(
  'query' => apply_filters('search_form_default_query', ''),
  'query_type' => apply_filters('search_form_default_query_type', 'keyword'),
  'record_types' => apply_filters('search_form_default_record_types',
    array_keys($validRecordTypes))
);
?>

    <?php if ($options['show_advanced']): ?>
    <div id="advanced-form" style="text-align: left">
        <fieldset id="query-types">
            <legend><?php echo __('Escolha o tipo de pesquisa:'); ?></legend>
          <!--
            <?php echo $this->formRadio('query_type', $filters['query_type'], null, $query_types); ?>
            -->
          <?php foreach ($query_types as $key => $value): ?>
            <div class="ui checkbox radio">
              <?php echo "<input type=\"radio\" name=\"query_type\" id=\"query-type-{$key}\" value=\"{$key}\" />" ?>
              <?php echo "<label for='query_type-{$key}'>{$value}</label>" ?>
            </div>
          <?php endforeach; ?>
        </fieldset>
        <?php if ($record_types): ?>
        <fieldset id="record-types">
            <legend><?php echo __('Escolha os tipos de registros para a pesquisa:'); ?></legend>
            <?php foreach ($record_types as $key => $value): ?>
              <div class="ui checkbox">
                <?php echo "<input type=\"checkbox\" name=\"record_types[]\" id=\"record-types-{$key}\" value=\"{$key}\"" . (in_array($key, $filters['record_types']) ? 'checked' : '') . "/>" ?>
                <?php echo "<label for='record_types-{$key}'>{$value}</label>" ?>
              </div>
            <!--
            <?php echo $this->formCheckbox('record_types[]', $key, array('checked' => in_array($key, $filters['record_types']), 'id' => 'record_types-' . $key)); ?>
            <?php echo $this->formLabel('record_types-' . $key, $value);?><br>
            -->
            <?php endforeach; ?>
        </fieldset>
        <?php elseif (is_admin_theme()): ?>
            <p><a href="<?php echo url('settings/edit-search'); ?>"><?php echo __('Go to search settings to select record types to use.'); ?></a></p>
        <?php endif; ?>
      <!--
        <p><?php echo link_to_item_search(__('Advanced Search (Items only)')); ?></p>
        -->
    </div>
    <?php else: ?>
        <?php echo $this->formHidden('query_type', $filters['query_type']); ?>
        <?php foreach ($filters['record_types'] as $type): ?>
        <?php echo $this->formHidden('record_types[]', $type); ?>
        <?php endforeach; ?>
    <?php endif; ?>
<!--
    <?php echo $this->formButton('submit_search', $options['submit_value'], array('type' => 'submit')); ?>
</form>
-->
