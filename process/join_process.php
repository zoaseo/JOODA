<?php
    $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
    $query = "insert into members(`userID`, `userPW`, `userName`, `userGender`, `userPhone`, `userSMSCK`, `userAddress_doro`, `userAddress_sangse`)
    values( '{$_POST['userId']}', 
            '{$_POST['userPw']}', 
            '{$_POST['userName']}', 
            '{$_POST['userGender']}', 
            '{$_POST['userPhone']}',
            '{$_POST['userSMSCK']}',
            '{$_POST['doro']}',
            '{$_POST['sangse']}'
            )";
            if($_POST['userId'] && strlen($_POST['userPw'])>=8 && $_POST['userPw'] == $_POST['userPwCh'] && $_POST['userName'] && $_POST['userPhone']
            && $_POST['doro'] && $_POST['sangse']) {
                $result = mysqli_query($conn, $query);  
                header('Location: ../index.php');   
            } else {
                header('Location:../member/join.php');
            }
    // if($result) {
    //     echo "성공";
        // header('Location:../index.php');
    // } else {
    //     echo "실패";
    // }
  
?>