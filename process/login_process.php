<?php
    session_start();
    // members 테이블에 등록된 회원인지 확인
    $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
    $query = "select * from members where userID='{$_POST['userId']}'";
    $result = mysqli_query($conn, $query);

    // 아이디가 있다면 비밀번호 검사
    if(mysqli_num_rows($result)==1) {
        $row = mysqli_fetch_array($result);

        // 비밀번호 확인 -> 비밀번호가 맞으면 세션 생성
        if($_POST['userPw'] == $row['userPW']) {
            $_SESSION['userId'] = $_POST['userId'];
            // 세션아이디가 있으면 로그인 되었습니다. 경고창 출력
            if(isset($_SESSION['userId'])) {
        ?>
        <script>
            alert("로그인 되었습니다.");
            location.replace("../index.php");
        </script>
        <?php        
            }
        } else {
        ?>
        <script>
            alert("비밀번호가 맞지 않습니다.");
            location.replace("../index.php");
        </script>    
        <?php
        }
    } else {
    ?>
    <script>
        alert("아이디가 맞지 않습니다.");
        location.replace("../index.php");
    </script>  
    <?php
    }
?>
