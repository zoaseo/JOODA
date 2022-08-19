<?php
    session_start();
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "delete from feedback where feedback ='{$_POST['feedback']}'";
    if(isset($_SESSION['userId'])){
        if( $_SESSION['userId'] == $_POST['userId'] || $_SESSION['userId'] == 'admin'){
            $result = mysqli_query($conn, $query);
?>
<script>
       alert("삭제되었습니다.");
        history.back();
</script>
<?php
        } else {
?>    
<script>
    alert("본인 댓글만 삭제 가능합니다.");
    history.back();
</script>
<?php
        }
    } else {
?>
<script>
    alert("본인 댓글만 삭제 가능합니다.");
    history.back();
</script>

<?php
    }
?>
