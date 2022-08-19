<?php
session_start();
if(isset($_SESSION['userId'])) {
    $id = $_GET['id'];
    $many = $_GET['how_many'];
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "select * from product where id={$id}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);

    $query2 = "insert into buytable(`아이디`, `imgsrc`, `title`, `단가`, `수량` ) 
    values ('{$_SESSION['userId']}',
    '{$row['imgsrc']}',
    '{$row['title']}',
    {$row['price']}, 
    {$many})";
    $result2 = mysqli_query($conn, $query2);
?>
    <script>
        go_cart('장바구니에 물건을 담았습니다. 장바구니로 이동하시겠습니까?', 확인, 취소);
        function go_cart(질문, 예스, 노) {
        if(confirm(질문)) 예스();
        else 노();
    }
    function 확인() {
        location.replace("../pages/cart.php"); // ?many={$_POST['how_many']}
    }
    function 취소() {
        history.back();
    }
    </script>
<?php
} else {
?>
<script>
   alert ("로그인 후 이용가능합니다.");
   history.back();
</script>
<?php
}
?>