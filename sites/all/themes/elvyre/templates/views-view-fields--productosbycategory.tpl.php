<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php
if ($fields['title_1']->raw == 'Blend Cemento') {
    $a = 0;
}
?>
<?php
$width = 100;
$height = 100;
if (isset($row->field_field_medida_largo[0]['raw']['value']) && isset($row->field_field_medida_ancho[0]['raw']['value'])) {
    $width = ($row->field_field_medida_ancho[0]['raw']['value'] * 100 ) / 60;
    $height = ($row->field_field_medida_largo[0]['raw']['value'] * 100 ) / 60;
}
?>
<div class="content-new-parent">
    <?php
    //print str_replace('<div class="field-content">', '<div class="field-content" style="width:' . $width . '%;height:' . $height . '%;">', $fields['field_image']->content);
    $html = preg_replace('/width="[0-9]*"/', 'width="' . $width . '%"', $fields['field_image']->content);
    $html = preg_replace('/height="[0-9]*"/', 'height="' . $height . '%"', $html);
    print $html;
    ?>
</div>
<?php print $fields['title_1']->content; ?>
