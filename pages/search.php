<?php include_once '../include/header.php' ?>
<?php
         $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
         $query = "select * from product  where `title` Like '%{$_POST['search']}%'";
         $result = mysqli_query($conn, $query);
         $total = mysqli_num_rows($result);
         
        function printList() {
        $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
        $query = "select * from product  where `title` Like '%{$_POST['search']}%'";
        $result = mysqli_query($conn, $query);
        // echo"<h3 id='stop_ani'>총 {$total}건 검색되었습니다.</h3>";
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
<div id="product_list">
        <h2>검색한 상품목록입니다.</h2>
        <h3>총 <?=$total?>건 검색되었습니다.</h3>
        <ul>
            <?php printList(); ?>
        </ul>
</div>