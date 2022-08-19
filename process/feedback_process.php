<?php
    session_start();
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "insert into feedback(`userId`, `feedback`)
    values('{$_SESSION['userId']}','{$_POST['feedback']}')";

    if(isset($_SESSION['userId'])){
        $result = mysqli_query($conn, $query);
        // header('Location: ../pages/detail.php?id='$_POST['id']'');
        ?>
            <script>
                // history.back();
                location.replace("../index.php");
                let fe_input = document.queryselector('#fe_input');
                fe_input.value= '';
            </script>
        <?php
    } else {
?>
    <script>
        alert ("로그인 후 이용가능합니다.");
        location.replace("../index.php");
    </script>
<?php
    }
?>
<script>

</script>