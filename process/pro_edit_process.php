<?php
$imgsrc = $_FILES ? $_FILES['img']['name'] : $_POST['oldimg'];
if($_FILES['img']['name']!=$_FILES['oldimg']){
    // 책표지가 변경되면 이전파일을 삭제
    // 변경된 파일을 이미지 폴더로 업로드
    unlink('../img/product/'.$_POST['oldimg']);
    move_uploaded_file($_FILES['img']['tmp_name'], 'C:Apache24/htdocs/jooda/img/product/'.$_FILES['img']['name']);
}
$conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
$query = "UPDATE product SET `imgsrc` = '{$imgsrc}', 
`title` = '{$_POST['title']}', 
`price` = {$_POST['price']},  
`desc` = '{$_POST['desc']}', 
`type` = '{$_POST['type']}' 
WHERE `id` = '{$_POST['id']}'";
$query2 = "set foreign_key_checks = 0";
$result2 = mysqli_query($conn, $query2);
$result = mysqli_query($conn, $query);
if($result){
    echo "성공";
    var_dump($_POST['id']);
    var_dump($imgsrc);
    var_dump($_POST['price']);
    var_dump($_POST['title']);
}else{
    echo "실패";
    echo $query;
}
header("Location:../pages/{$_POST['type']}.php");
?>