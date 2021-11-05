<?php $parent_id = \shop\App::$app->getProperty('parent_id')?>
<option value="<?=$id;?>"<?php if ($id == $parent_id) echo ' selected';?>>

    <?php if ($cat['parent_id'] > 0): ?>
        &nbsp;&nbsp;
    <?php endif; ?>

    <?php if ($cat['parent_id'] == 0){
        $this->pass = '';
    }?>
            <?=$this->pass;?>
            <?=$cat['title'];?>
</option>
<?php if(isset($cat['childs'])){
    $this->pass .='-';
    echo $this->getSidebarHtml($cat['childs']);
}?>