<?php include_once '../include/header.php' ?>
<?php 
    $id = $_GET['id'];
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "select * from product where id={$id}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
    // var_dump($row);
?>
    <div id="detail" class="mo_detail">
        <h2>상품 자세히보기</h2>
        <form action="../process/cart_process.php" method="GET"> <!--../process/cart_process.php -->
        <table>
            <tr>
                <td><img src=/jooda/img/product/<?=$row['imgsrc']?>></td>
            </tr>
            <tr>
                <td class="bold"><?=$row['title']?></td>
            </tr>
            <tr>
                <td class="bold"><?=$row['price']?>원</td>
            </tr>
            <tr>
               <td>
                   <span id="increase">+</span>
                   <input type="hidden" id="how_manymany" name="how_many">
                   <span id="how_many" value=""></span>
                   <span id="decrease">-</span>
                   <input type="hidden" value="<?=$_GET['id']?>" name="id">
                   <button id="cart" type="submit">장바구니 담기 🛒</button>
                </td>
            </tr>
            <tr>
                <td class="bold">상품설명</td>
            </tr>
            <tr>
                <td id = "product_desc"><?=$row['desc']?></td>
            </tr>
            </form>
            <tr id="mo_editdelete">
            <?php
                session_start();
                if(isset($_SESSION['userId']) && $_SESSION['userId'] == 'admin') {
                    ?>
                        <td colspan='2' id='edit_delete'>
                            <form action='edit.php' method='post'>
                            <input type='hidden' name='id' value='<?=$_GET['id']?>'>
                            <button id='edit_btn' type='submit'>수정</button>
                            </form>
                            <form action='../process/pro_delete_process.php' method='post' onsubmit='return confirm("정말 삭제하시겠습니까?");'>
                            <input type='hidden' name='id' value='<?=$_GET['id']?>'>
                            <input type='hidden' name='imgsrc' value='<?=$row['imgsrc']?>'>
                            <input type='hidden' name='type' value='<?=$row['type']?>'>
                            <button id='delete_btn' type='submit'>삭제</button>
                            </form>
                        </td>
                        <script>
                            // let down = document.querySelector('#go_down');
                            // console.log(down);
                            // console.log('ㅗ모모');
                        </script>
                        <?php
                } 
            ?>
            </tr>
        </table>
        <div class = "so_title">상품리뷰</div>
            <div id="go_down">
            <?php
                session_start();
                if(isset($_SESSION['userId']) && $_SESSION['userId'] == 'admin') {
                ?>
                    <script>
                        let down = document.querySelector('#go_down');
                        down.style.margin = 0;
                    </script>
            <?php    
                }
            ?>
        
                <?php
                    $id = $_GET['id'];
                    $conn = mysqli_connect('localhost', 'gml2854', 'hyojin0115!', 'gml2854');
                    $query = "select * from review where id = $id";
                    $result = mysqli_query($conn, $query);
                    function printList() {
                        global $result;
                        while($row = mysqli_fetch_array($result)){
                            echo "
                            <div id='juda'>
                            <p id='review_id'>{$row['userId']}님의 댓글</p>
                            <p id='review_feedback'>{$row['review']}</p>
                           
                            <form action='../process/review_delete_process.php' id='review_form' method='post'>
                            <input type='hidden' name='userId' value='{$row['userId']}'>
                            <input type='hidden' name='review' value='{$row['review']}'>
                            <button type='submit' id='review_btn'>삭제</button>
                            </form>
                            </div>";
                        }
        
                    }
                ?>
                </div>
                <form action="../process/review_process.php" method="post" id="feed_form">
                    <input type="text" name="review" id="fe_input">
                    <input type='hidden' value='<?=$_GET['id']?>' name='id'>
                    <button type="submit" id="fe_btn">리뷰작성</button>
                </form>
                <?php printList(); ?>
            </div>
        </div>
<?php include_once '../include/footer.php' ?>

<script>
    // 수량 조절
let inc = document.querySelector('#increase');
let dec = document.querySelector('#decrease');
let many = document.querySelector('#how_many');
document.getElementById('how_manymany').value = 1;
let manymany = 1;
console.log(many);
many.innerHTML = manymany;
inc.addEventListener('click',function(){
    manymany += 1;
    many.innerHTML = manymany;
    // document.getElementById('how_many').value = manymany;
    document.getElementById('how_manymany').value = manymany;
    console.log(document.getElementById('how_manymany').value);
})


dec.addEventListener('click',function(){
    manymany -= 1;
    if(manymany<1) {
        alert ("주문은 1개 이상부터 가능합니다.");
        manymany = 1;
    }
    many.innerHTML = manymany;
    // document.getElementById('how_many').value = manymany;
    document.getElementById('how_manymany').value = manymany;
    // console.log(document.getElementById('how_many').value);
    console.log(document.getElementById('how_manymany').value);
}) 

</script>
<style>
#please {
    position: relative;
    margin-left: 200px;
}
.so_title {
    position: absolute;
    top: 1290px;
    left: 450px;
    font-size: 20px;
    font-weight: bold;
}
#feed_form {
    position: absolute;
    top: 1290px;
    left: 50%;
    transform: translateX(-50%);
}
#fe_btn {
    position: absolute;
    top: -10px;
    right: -180px; 
}
#feed_form button{
    width: 120px;
    /* border-bottom: none; */
}
#juda {
    top: 1350px;
    left: 200px;
    height: 60px;
}
#go_down {
    margin-top: 150px;
}
#review_form button {
    width: 80px;
    height: 20px;
    border: none;
    line-height: 20px;
}
@media screen and (max-width: 480px) { 
    #please {
        position: relative;
        margin-left: 0px;  
    }
    .mo_detail {
    width: 480px;
    margin: 0 auto;
    }
    .mo_detail form{
        width: 400px;
        margin-left: 3%
        /* padding: 0 20px; */
    }
    .mo_detail form img {
        width: 80%
    }
    #detail table #product_desc {
        padding: 0;
    }
    #detail button {
        margin-left: 0;
    }
    #detail h2 {
        padding-left: 0;
    }
    #mo_editdelete {
        width: 480px;
        margin: 0 auto;
    }
    #edit_delete {
        width: 200px;
        margin-left: 90px
    }
    .so_title{
        position: unset;
        padding-top: 60px
    }
    #feed_form {
        width: 280px;
        top: 1290px;
        left: 35%
    }
    #fe_btn {
        right: -130px; 
    }
    #go_down {
        /* padding-top: 120px; */
    }
    #juda {
        width: 600px;
    }
    #juda #review_id {
        width: 300px;
    }
    #juda #review_feedback {
        width: 70%;
    }
    #juda #review_btn {
        font-size: 16px;
    }
    #go_down {
        /* margin-top: 80px; */
    }
}
</style>