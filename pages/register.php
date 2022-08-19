<?php include_once '../include/header.php' ?>
<div id="member" class="section_container">
        <h2>상품 등록하기</h2>
        <form action="../process/register_process.php" method="POST" enctype="multipart/form-data"> <!--../process/cart_process.php -->
        <table>
            <tr>
                <td class="bold">상품사진</td>
                <td><input type="file" name="img" required></td>
            </tr>
            <tr>
                <td class="bold">상품종류</td>
                <td>
                    <select name="type" id="gift">
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
                <td class="bold">상품명</td>
                <td class="member_input"><input type="text" name="title"></td>
            </tr>
            <tr>
                <td class="bold">가격</td>
                <td class="member_input"><input type="text" name="price" required id="priceInput"></td>
            </tr>
            <tr>
                <td class="bold">상품설명</td>
                <td><textarea name="desc" id="desc" cols="30" rows="10"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">상품등록</button>
                    <button type="reset">취소</button>
                </td>
            </tr>
        </table>
        </form>
    </div>
<?php include_once '../include/footer.php' ?>
<script>
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