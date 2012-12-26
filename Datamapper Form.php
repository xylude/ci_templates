<?php
/*
  Document   : ${name}
  Created on : ${date}, ${time}
  Author     : Jason Crider
  Description:

 *  Will generate a form based on Datamapper Fields.
 */
$model = 'model passed from controller';
?>
<form action="" method="post">
    <?php
    foreach ($model->fields as $field) {
        if (substr_count($field, '_id') == 0 && $field != 'id') {
            //set field types:
            $field_type = 'text';
            if ($field == 'pic') {
                $field_type = 'file';
            } if ($field == 'content') {
                $field_type = 'textarea';
            }
            ?>
            <p>
                <label for="<?= $field; ?>"><?= ($field == 'pic') ? 'Image' : ucwords(str_replace('_', ' ', $field)); ?></label>
                <?php if ($field_type == 'text') { ?>
                    <input type="text" name="<?= $field; ?>" value="<?= $model->{$field}; ?>" />
                <?php } else if ($field_type == 'checkbox') { ?>
                    <input type="checkbox" name="<?= $field; ?>" <?= ($model->{$field} == 1) ? 'checked="checked"' : ''; ?> />
                <?php } else if ($field_type == 'textarea') { ?>
                    <textarea name="<?= $field; ?>">
                        <?= $model->{$field}; ?>
                    </textarea>
                <?php } else if ($field_type == 'file') { ?>
                    <input type="file" name="<?= $field; ?>" value="<?= $model->{$field}; ?>" />
                    <?php if ($field == 'pic') {
                        if ($model->pic) { ?>
                            <img src="<?= $model->pic; ?>" />
                        <?php }
                    } ?>
            <?php } ?>
            </p>
            <?php
        }
    }
    ?>
    <p>
        <input type="submit" value="<?= $action; ?>" />
    </p>
</form>