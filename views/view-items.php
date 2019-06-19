<div class="listOfDiscountItems">
    <?php
    require_once '../controllers/ShopController.php';
    $Shop = new ShopController();
    $items;
    if(isset($_SESSION['itemByName']))
    {
        $items = $Shop->searchItemByName($_SESSION['itemByName']);
        unset($_SESSION['itemByName']);
    }else{
        $total = 0;
        if($total == 0)
        {
            $total = $Shop->countAllItems();
        }
        $limit = 8;
        $pages = ceil($total / $limit);
        $page = min($pages, filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT, array( 'options' => array('default' => 1,'min_range' => 1,),)));

        $offset = ($page - 1)  * $limit;
        $start = $offset + 1;
        $end = min(($offset + $limit), $total);
        $_SESSION['start'] = $start;
        $_SESSION['end'] = $end;
        $prevlink = ($page > 1) ? '<a style="color:red; font-size:30px;" href="?page=1" title="First page">&laquo;</a> <a style="color:red; font-size:30px;" href="?page=' . ($page - 1) . '" title="Previous page">&lsaquo;</a>' : '<span class="disabled">&laquo;</span> <span class="disabled">&lsaquo;</span>';
        $nextlink = ($page < $pages) ? '<a style="color:red; font-size:30px;" href="?page=' . ($page + 1) . '" title="Next page">&rsaquo;</a> <a style="color:red; font-size:30px;" href="?page=' . $pages . '" title="Last page">&raquo;</a>' : '<span class="disabled">&rsaquo;</span> <span class="disabled">&raquo;</span>';
        echo '<div id="paging" style="margin-left:27%; font-weight: 700; color:black;"><p>', $prevlink, ' Pagina ', $page, ' din ', $pages, ' pagini, afiseaza intre ', $start, '-', $end, ' din ', $total, ' de rezultate ', $nextlink, ' </p></div>';

        $items = $Shop->getItems($_SESSION['category'], $_SESSION['brand'], $_SESSION['sizePack'], $_SESSION['order'],$_SESSION['start'],$_SESSION['end']);
    }
    if ($items !== false) {
        foreach ($items as $item) {
    ?>
    <div class="item-container">
        <div class="item-header">
            <div class="item-logo">
                <img src=<?php echo $item['url']; ?> alt="">
            </div>
            <div class="item-price-discount">
                <span>-<?php echo $item['discount']; ?>%</span>
            </div>
        </div>
        <div class="item-body">
            <div class="item-title">
                <?php echo $item['product_name']; ?>
            </div>
            <div class="item-subtitle">
                <?php echo $item['drink_type']; ?>
            </div>
            <div class="item-price">
                <?php echo $item['price']; ?><span>RON</span>
            </div>
            <div class="item-goto">
                <a href="item.php?id=<?php echo $item['id_product']; ?>">
                    <button class="btn special red">
                        Vezi produs
                    </button>
                </a>
                <a href="?addToCart=<?php echo $item['id_product']; ?>">
                    <button class="btn special red">
                        + cart
                    </button>
                </a>
            </div>
        </div>
    </div>
    <?php
    }  
} else {
    ?>
    <div class="msg erro">No items</div>
    <?php
}

?>
</div>