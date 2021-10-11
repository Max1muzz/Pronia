<button class="btn btn-link dropdown-toggle ht-btn" type="button"
        id="currencyButton" data-bs-toggle="dropdown" aria-label="currency"
        aria-expanded="false">
    <?=$this->currency['code'];?>
</button>
<ul class="dropdown-menu" aria-labelledby="currencyButton">
    <?php foreach ($this->currencies as $k=>$v):?>
        <?php if($k != $this->currency['code']):?>
            <li><a class="dropdown-item" href="/shop/currency/change?curr=<?=$k?>"><?=$k?></a></li>
        <?php endif; ?>

    <?php endforeach;?>
</ul>
