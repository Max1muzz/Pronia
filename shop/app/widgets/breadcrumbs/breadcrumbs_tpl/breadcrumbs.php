<div class="container mt-3 mb-3 border">
    <div class="row align-self-center">
        <div class="col">
            <ol class="breadcrumb mt-3">

                <li><a href='<?= PATH; ?>'><b>Главная</b> /</a></li>
                <?php foreach ($this->breadcrumbs as $alias => $title): ?>
                    <li><a href='<?= PATH; ?>/category/<?= $alias; ?>'><b><?= $title; ?></b> /</a></li>
                <?php endforeach; ?>
                <?php if ($this->title != null):?>
                <li><?= $this->title; ?></li>
                <?php endif;?>

            </ol>
        </div>
    </div>
</div>
