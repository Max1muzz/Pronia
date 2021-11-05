<div class="sidebar-area">
    <div class="widgets-searchbox">
        <form id="widgets-searchbox" method="get" action="/shop/search">
            <input class="input-field" type="text" placeholder="Поиск" name="search">
            <button class="widgets-searchbox-btn" type="submit">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
    <div class="widgets-area">
        <div class="widgets-item pt-0">
            <h2 class="widgets-title mb-4">Категории</h2>
            <ul>
                <?=$this->sidebarHtml;?>
            </ul>
        </div>
    </div>

</div>
