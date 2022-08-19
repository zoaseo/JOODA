<?php
    session_start();
    $id = $_POST['id'];

    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "insert into review(`id`, `userId`, `review`)
    values('{$id}', '{$_SESSION['userId']}','{$_POST['review']}')";

    if(isset($_SESSION['userId'])){
        $result = mysqli_query($conn, $query);
        // header("Location: ../pages/detail.php?id={$id}");
        ?>
            <script>
                // history.back();
                // let fe_input = document.queryselector('#fe_input');
                // fe_input.value= '';

                location.href = document.referrer;
                    // location.replace("../pages/detail.php?id={$id}''.php");
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