<?php
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "delete from product where `id`={$_POST['id']}";
    $result = mysqli_query($conn, $query);
    $query2 = "set foreign_key_checks = 0";
    $result2 = mysqli_query($conn, $query2);
    if($result) {
        unlink("../img/product/".$_POST['imgsrc']);  // img의 파일도 같이 삭제
        echo "삭제되었습니다.";
?>
        <!-- <script>
        history.back();
        </script> -->
<?php
}else {
        echo "실패했습니다.";
    }
    // SET foreign_key_checks = 0;    --// 해제
    // SET foreign_key_checks = 1;    --// 설정

    header("Location:../pages/{$_POST['type']}.php");
?>