<?php include_once '../include/header.php' ?>
<?php
    $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
    $query = "select * from product where type = 'baby'";
    $result = mysqli_query($conn, $query);
    function printList() {
        global $result;
        while($row = mysqli_fetch_array($result)){
            echo "<li><a href='detail.php?id={$row['id']}'><img src='/jooda/img/product/{$row['imgsrc']}'>
            <p class='pro_title'>{$row['title']}</p>
            <p class='pro_price'>{$row['price']}원</p></a></li>";
        }
        ?>
            <?php include_once '../include/footer.php' ?>
        <?php
            }
        ?>
        <?php include_once '../include/skell.php' ?>
<div id="product_list">
        <h2>아기용품</h2>
        <h3>태어난 걸 축하해~</h3>
        <ul>
            <?php printList(); ?>
        </ul>
</div>

