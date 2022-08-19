<?php include_once '../include/header.php' ?>
<?php
    session_start();
    $id = $_SESSION['userId'];
    $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
    $query = "select *
    from members inner join buytable 
    on buytable.아이디 = members.userID
    where members.userID = '$id'";
    $result = mysqli_query($conn, $query);
    $total = mysqli_num_rows($result);
    function printList() {
        global $result;
        global $row;
        global $total;
        $t_var = $total;
        while($row = mysqli_fetch_array($result)){
            $var = $row['수량'];
            echo "<li id='cart_li'>
            <p id='cart_title'>{$row['title']}</p>
            <p id='cart_img'><img src='/jooda/img/product/{$row['imgsrc']}'></p>
            <p id='cart_price' class='go_left'>{$row['단가']}원</p>      
            <p>

                <span class='how_many go_left'>{$row['수량']}개</span>
            </p>
            </li>
            ";
?>
                <!-- <span class='increase in_de'>+</span> -->
        <!-- 스크립트 -->
        <script>
            var jsvar = '<?=$var?>';
            var tjsvar = '<?=$t_var?>';
            console.log(typeof jsvar);
            jsvar = Number(jsvar);
            console.log(tjsvar);
            
            // 수량 조절
            let inc = document.querySelector('.increase');
            let dec = document.querySelector('.decrease');
            let many = document.querySelector('.how_many');

            many.innerHTML = `${jsvar}개`;
            inc.addEventListener('click',function(){
                jsvar += 1;
                many.innerHTML =  `${jsvar}개`;
                document.getElementById('how_many').value = jsvar;
                console.log(document.getElementById('how_many').value);
            })

            dec.addEventListener('click',function(){
                jsvar -= 1;
                if( jsvar <1) {
                    alert ("주문은 1개 이상부터 가능합니다.");
                    jsvar = 1;
                }
                many.innerHTML = `${jsvar}개`;
                document.getElementById('how_many').value =  jsvar;
                console.log(document.getElementById('how_many').value);
            }) 
        </script>
            <form action='../process/delete_process.php' method='post' onsubmit='return confirm("정말 삭제하시겠습니까?");' >
            <input type='hidden' name='title' value='<?=$row['title']?>'>
            <input type="submit" value="삭제하기" id="deleteCh">
            </form>
<?php
        }
    }
?>


<div id="detail" class="cartcart">
        <h2>장바구니</h2>
        <h3><?= $id ?> 회원님의 장바구니 목록입니다.</h3>
        <ul id="cart_ul">
            <li id= "cart_ul_li">
                <ul id="cart_ul2">
                    <li>상품명</li>
                    <li>상품사진</li>
                    <li>상품가격</li>
                    <li>상품수량</li>
                </ul>
            </li>
            <?php printList(); ?>
            <?php include_once '../include/footer.php' ?>
        </ul>
        <div id="price"><span id="price_p">총 주문가격</span>      
             <?php
                $query2 = "select sum(수량 * 단가)
                from members inner join buytable 
                on buytable.아이디 = members.userID
                where members.userID = '$id'";
                $result2 = mysqli_query($conn, $query2);
                $row2 = mysqli_fetch_array($result2);
                if($row2[0] == null) {
                    echo "<span id='total_php'>0원</span>";
                } else {
                    echo "<span id='total_php'>{$row2[0]}원</span>";
                }
            ?>
        </div>
</div>

<style>
    .in_de {
        color: #f9f7f3;;
        background-color: #364259;
        border-radius: 100%;
        padding: 0.1px 7.5px;
        cursor: pointer;
        margin: 0 10px;
    }
    #decrease {
        padding: 0 9px;
    }
    #please {
        left: 50px;
    }
    @media screen and (max-width: 480px) { 
        #member form table {
            width: max-content;
        }
        #member #desc {
            width: 390px;
        }
        #cart_title {

        }
        #cart_img {
            width: 80px;
        }
        #cart_img img {
            width: 100%;
            height: 100%;
        }
        #cart_li {
            font-size: 17px;
        }
        .go_left {
            padding-left: 10px;
        } 
    }
</style>