<li>
    <a href="/shop/category/<?=$cat['alias'];?>">
        <?php if ($cat['parent_id'] > 0): ?>
            <i class="fa fa-chevron-right"></i>
        <?php endif; ?>
        <?php if ($cat['parent_id'] == 0): ?>
            <b>
        <?php endif; ?>
        <?=$cat['title'];?>
        <span>(<?=$num;?>)</span>
        <?php if ($cat['parent_id'] == 0): ?>
            </b>
        <?php endif; ?>
    </a>
    <hr>
    <?php if(isset($cat['childs'])): ?>
        <ul class="ms-3">
            <?=$this->getSidebarHtml($cat['childs']);?>
        </ul>
    <?php endif; ?>
</li>