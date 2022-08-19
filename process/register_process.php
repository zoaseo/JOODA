<script>
    let fe_input = document.queryselector('#fe_input');
    fe_input.value = '';
</script>
<?php
    $fileimg = $_FILES['img'];
    // move_uploaded_file(현재위치, 업로드할 위치);
    move_uploaded_file($fileimg['tmp_name'],"C:\Apache24\htdocs\jooda\img\product/".$fileimg['name']);

    // post 전송으로 넘어온 데이터는 슈퍼글로벌 $_POST변수가 배열형태로 받는다.
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "insert into product(`title`, `price`,`imgsrc`, `desc`, `type`)
    values('{$_POST['title']}', {$_POST['price']},'{$fileimg['name']}', '{$_POST['desc']}', '{$_POST['type']}')";
    $result = mysqli_query($conn, $query);
    // header('Location: ../index.php');
    header("Location:../pages/{$_POST['type']}.php");
?>
