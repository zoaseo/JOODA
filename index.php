<?php include_once 'include/header.php' ?>
        <div class="section_container">
            <section id = "visual">
                <h2 class = "hidden_h">메인화면</h2>
                <div id="main_slogan">
                    <div><span id="f1" class="f">기</span><span class="s">발</span><span class="t">하게</span></div>
                    <div><span id="f2" class="f">프</span><span class="s">리티</span><span class="t">하게</span></div>
                    <div><span id="f3" class="f">트</span><span class="s">러블</span><span class="t" id="t2">없이</span></span></div> 
                    <div><span id="f4" class="f">샵</span></div>
                </div>
                <div id="divView">
                    <div id="divs">
                        <div class="imgdiv"><img src="img/mainimg.jpeg" alt=""></div>
                        <div class="imgdiv"><img src="img/mainimg2.jpg" alt=""></div>
                        <div class="imgdiv"><img src="img/mainimg3.jpeg" alt=""></div>
                        <div class="imgdiv"><img src="img/mainimg4.jpg" alt=""></div>
                    </div>
                    <div id="indi"></div>
                </div>
            </section>
            <section id = "hot_gift">
                <div id = "hot_gift_top">
                    <h2 class = "hidden_h">인기상품</h2>
                    <div class = "so_title">인기</br>상품</div>
                    <ul>
                        <li><a href="/jooda/pages/detail.php?id=33"><img src="img/product/bir_6.jpg" alt=""></a></li>
                        <li><a href="/jooda/pages/detail.php?id=2"><img src="img/product/fri_2.jpg" alt=""></a></li>
                        <li><a href="/jooda/pages/detail.php?id=20"><img src="img/product/hon_2.jpg" alt=""></a></li>
                    </ul>
                </div>
                <div id="hot_gift_bottom">
                    <div class = "so_title">인기</br>상품</div>
                    <ul>
                        <li><a href="/jooda/pages/detail.php?id=29"><img src="img/product/bir_2.jpg" alt=""></a></li>
                        <li><a href="/jooda/pages/detail.php?id=47"><img src="img/product/pet_2.jpg" alt=""></a></li>
                        <li><a href="/jooda/pages/detail.php?id=22"><img src="img/product/hon_4.jpg" alt=""></a></li>
                    </ul>
                </div>
            </section>
            <section id = "review">
                <div id = "review_box">
                <h2 class = "hidden_h">주다후기</h2>
                <div class = "so_title">주다</br>후기</div>
                <?php
                    $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
                    $query = "select * from feedback";
                    $result = mysqli_query($conn, $query);
                    function printList() {
                        global $result;
                        while($row = mysqli_fetch_array($result)){
                            echo "
                            <div id='juda'>
                            <p id='review_id'>{$row['userId']}님의 댓글</p>
                            <p  id='review_feedback'>{$row['feedback']}</p>

                            <form action='process/feedback_delete_process.php' method='post'>
                            <input type='hidden' name='userId' value='{$row['userId']}'>
                            <input type='hidden' name='feedback' value='{$row['feedback']}'>
                            <button type='submit' id='review_btn'>삭제</button>
                            </form></div>";
                        }
                    }
                ?>

                <form action="process/feedback_process.php" method="post" id="feed_form">
                    <input type="text" name="feedback" id="fe_input">
                    <input type="hidden" name="id" value="{$row['userId']}"> 
                    <button type="submit" id="fe_btn">후기작성</button>
                </form>
                    <?php printList(); ?>
                </div>
            </section>
            <seciotn>
                <div id="saying">
                    <p>혹시 누군가에게 선물을 줘보신 적이 있으신가요?</p>
                    <p>그 선물이 본인은 마음에 드셨나요?</p>
                    <p>혹은 상대방이 본인의 선물에 만족하셨나요?</p>
                    <p>이런 것들이 고민이라면 당장 저희 <span id="blink">JOODA - 기쁨을 주다!</span>를 이용해주세요!</p>
                </div>
            </seciotn>
        </div>
    </div>
</body>
<?php include_once 'include/footer.php' ?>
<script>
window.onload = function() {
setTimeout (function () {
scrollTo(0,0);
}, 100);
}
</script>
<style>
header, #cart_icon {
    animation: heaerappear 1s 2.5s backwards;
}
#please {
    position: relative;
    margin-left: 200px;
}
@media screen and (max-width: 480px) { 
    #please {
        margin-left: 0;
    }
}
</style>