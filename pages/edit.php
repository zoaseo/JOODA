<?php include_once '../include/header.php' ?>
<?php
    $conn = mysqli_connect('localhost','gml2854','hyojin0115!','gml2854');
    $query = "select * from product where id = {$_POST['id']}";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_array($result);
?>
<div id="member" class="section_container">
        <h2>상품 수정하기</h2>
        <form action="../process/pro_edit_process.php" method="POST" enctype="multipart/form-data" onsubmit="return confirm('상품을 수정하시겠습니까?')"> <!--../process/cart_process.php -->
        <table>
            <tr>
                <td class="bold">상품사진</td>
                <td><input type="hidden" name="oldimg" value="<?=$row['imgsrc']?>" required>
                <input type="file" name="img" style="position:absolute; opacity:0;" onchange="imageChange(this)">
                <label class="file">파일선택</label>
                <label id="imglabel"><?=$row['imgsrc']?></label>
                </td>
            </tr>
            <tr>
                <td class="bold">상품종류</td>
                <td>
                    <select name="type" id="gift" value="<?=$row['type']?>">
                        <option value="friend">우정선물</option>
                        <option value="parent">부모님선물</option>
                        <option value="honey">애인선물</option>
                        <option value="birth">생일선물</option>
                        <option value="baby">아기용품</option>
                        <option value="pet">펫용품</option>
                        <option value="random">랜덤박스</option>
                    </select>            
                </td>
            </tr>
            <tr>
                <td class="bold">상품명
                <input type="hidden" name="id" value="<?=$row['id']?>">
                </td>
                <td class="member_input"><input type="text" name="title" value="<?=$row['title']?>"></td>
            </tr>
            <tr>
                <td class="bold">가격</td>
                <td class="member_input"><input type="text" name="price" required id="priceInput" value="<?=$row['price']?>"></td>
            </tr>
            <tr>
                <td class="bold">상품설명</td>
                <td><textarea name="desc" id="desc" cols="30" rows="10"><?=$row['desc']?>"</textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">상품수정</button>
                    <button type="reset">취소</button>
                </td>
            </tr>
        </table>
        </form>
    </div>
<?php include_once '../include/footer.php' ?>
<script>

    function imageChange(input) {
        // #imglabel의 내용을 input의 value값으로 변경
        // 배열의 마지막 인덱스 배열길이 - 1
        if(input.value){
            let valueArr = input.value.split('\\');
            document.querySelector('#imglabel').innerHTML = valueArr[valueArr.length - 1];
        }else {
            document.querySelector('#imglabel').innerHTML = '선택 파일 없음';
        }
    }

    let priceInput = document.querySelector("#priceInput");
    priceInput.addEventListener('input', function(){
        if(isNaN(Number(priceInput.value))) {
            alert("가격은 숫자만 입력해주세요.");
            priceInput.value="";
        }
    })
</script>
<style>
    body {
        padding-top: 160px;
    }
    @media screen and (max-width: 480px) { 
        #member form table {
            width: max-content;
        }
        #member #desc {
            width: 390px;
        }
    }
</style>