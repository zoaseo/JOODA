<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 maximum-scale=1, minimum-scale=1">
    <title>JOODA</title>
    <link rel="stylesheet" href="/jooda/css/style.css">
    <script src="//t1.daumcdn.net/mapjsapi/bundle/postcode/prod/postcode.v2.js"></script>
    <script defer src="/jooda/js/script.js"></script>
    <link rel="shortcut icon" href="img/f_icon2.ico" type="image/x-icon">
</head>
<body>
    <div id="wrap">
        <header>
            <div id = "hambuger_menu">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div> 
            <a href="/jooda/index.php"><h1>JOODA</h1></a>
            <div id="member">
                <form action="/jooda/pages/search.php" method="post">
                <div id= "search_box">
                    <input type="text" name="search" required>
                    <button id="searchBtn"><img src="/jooda/img/search.png" alt=""></button>
                </div>
                </form>
                <div>
                <?php
                    if(isset($_SESSION['userId'])) {
                        echo "<a href='/jooda/process/logout_process.php'>logout</a>";

                        if($_SESSION['userId']=='admin') {
                            echo "<a href='/jooda/pages/register.php' id='register'>상품등록</a>";
                        }
                    } else {
                        echo "<a href='/jooda/member/login.php'>login</a>";
                    }
                ?>
                </div>
                <div><a href="/jooda/member/join.php">join</a></div>
            </div>
        </header>
        <?php 
            session_start();
            // var_dump($_SESSION);
            $id = $_SESSION['userId'];
            $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
            $query = "select sum(수량)
            from members inner join buytable 
            on buytable.아이디 = members.userID
            where members.userID = '$id'";
            $result = mysqli_query($conn, $query);
            $row = mysqli_fetch_array($result);
            $numnum = $row[0];
            if(empty($_SESSION['userId']) || $numnum == 0) {
                $numnum = 0;
            }
        ?>
        <a href="/jooda/pages/cart.php"><div id="cart_icon"><span id="cart_many"> <?= $numnum ?></span></div></a>
        <div id="sitemap">
            <ul id="sm_ul">
                <li id="sm_btn">
                    <span id="left_"></span>
                    <span id="right_"></span>
                </li>
                <ul id="li_box">
                    <li class="sm_li"><a id="all_li" href="/jooda/pages/all.php">All</a></li>
                    <li class="sm_li"><a class="same_li" href="/jooda/pages/friend.php">우정선물</a>
                        <p class="sm_p">우리 우정 변치말기!</p>
                    </li>
                    <li class="sm_li"><a id="parent_li" href="/jooda/pages/parent.php">부모님선물</a>
                        <p class="sm_p">부모님 사랑해요!</p>
                    </li>
                    <li class="sm_li"><a class="same_li" href="/jooda/pages/honey.php">애인선물</a>
                        <p class="sm_p">오늘부터 1일!</p>
                    </li>
                    <li class="sm_li"><a class="same_li" href="/jooda/pages/birth.php">생일선물</a>
                        <p class="sm_p">너 생일이라며?</p>
                    </li>
                    <li class="sm_li"><a class="same_li" href="/jooda/pages/baby.php">아기용품</a>
                        <p class="sm_p">태어난 걸 축하해~</p>
                    </li>
                    <li class="sm_li"><a id="pet_li" href="/jooda/pages/pet.php">펫 용품</a>
                        <p class="sm_p">마음은 강형욱!</p>
                    </li>
                    <li class="sm_li"><a class="same_li" href="/jooda/pages/random.php">랜덤박스</a>
                        <p class="sm_p">뭐 줄지 도저히 모르겠다!</p>
                    </li>
                    <div id="sm_small_box">
                        <li class="sm_small_li">
                            <a href="#">Facebook</a>
                         
                        </li>
                        <li class="sm_small_li">
                            <a href="#">instagram</a>
                        </li>
                    </div>
                </ul>
            </ul>
            <div id="sm_div">

            </div>
            <div id="sm_div_r">
                <a href="/jooda/index.php"><h1>JOODA</h1></a>
            </div>
        </div>