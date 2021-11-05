<?php if(isset($cat['childs'])): ?>

    <tr data-widget="expandable-table" aria-expanded="false">
        <td>
            <div class="d-flex justify-content-between">
                <div>
                    <i class="expandable-table-caret fas fa-caret-right fa-fw"></i>
<?php else:?>
    <tr>
        <td>
            <div class="d-flex justify-content-between">
                <div>
                    <i class="fas fa-minus fa-fw"></i>
<?php endif?>

                <?php if ($cat['parent_id'] == 0): ?>
                    <b>
                <?php endif; ?>
                        <a href="<?=ADMIN;?>/category/edit?id=<?=$id;?>" class="text-dark">
                            <?=$cat['title'];?>
                            <span>(<?= $num; ?>)</span>
                        </a>
                <?php if ($cat['parent_id'] == 0): ?>
                    </b>
                <?php endif; ?>
                </div>
                <div>
                    <?php if ($num == 0 && !isset($cat['childs'])):?>
                    <a href="<?=ADMIN;?>/category/delete?id=<?=$id;?>" class="text-danger" title="Удалить"><i class="fas fa-times"></i></a>
                    <?php else:?>
                    <i class="fas fa-times" title="Невозможно удалить(имеет содержимое)"></i>
                    <?php endif;?>
                </div>
            </div>
        </td>
    </tr>

    <?php if(isset($cat['childs'])): ?>

        <tr class="expandable-body ms-3">
            <td>
                <div class="p-0">
                    <table class="table table-hover">
                        <tbody>
                            <?=$this->getSidebarHtml($cat['childs']);?>
                        </tbody>
                    </table>
                </div>
            </td>
        </tr>

    <?php endif; ?>

