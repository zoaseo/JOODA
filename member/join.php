<?php include_once '../include/header.php' ?>
<div id="member" class="section_container">
    <h2>회원가입</h2>
    <h3>회원정보를 입력하세요.</h3>
    <form action="../process/join_process.php" method="post">
        <table>
            <tr>
                <td>아이디</td>
                <td class="member_input"><input type="text" name="userId" id="userId"></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td class="member_input"><input type="password" name="userPw" id="userPw">
                <p>( 8자 이상 입력해주세요. )</p>
            </td>
        
            </tr>
            <tr>
                <td>비밀번호체크</td>
                <td class="member_input"><input type="password" name="userPwCh" id="userPwCh">
                <span id="passInform"></span></td>
            </tr>
            <tr>
                <td>이름</td>
                <td class="member_input"><input type="text" name="userName" id="userName"></td>
            </tr>
            <tr>
                <td>성별</td>
                <td class="input_radio">
                    <label for="radio1">남</label>
                    <input type="radio" name="userGender" id="radio1" value="male" checked>     
                    <label for="radio1">여</label>
                    <input type="radio" name="userGender" id="radio1"  value="female">
                </td>
            </tr>
            <tr>
            <td>주소</td>
            <td id="address_td">
                <input type="text" id="woopyeon" placeholder="우편번호"> 
                <input type="button" onclick="PostCodeSearch()" value="우편번호 찾기"><br> 
                <input type="text" id="doro" placeholder="도로명주소" name="doro"> 
                <input type="text" id="sangse" placeholder="상세주소 입력" name="sangse">
            </td>
            </tr>
            <tr>
                <td>전화번호</td>
                <td class="member_input"> <input type="text" name="userPhone" id="userPhone">
                <p>( 공백, 기호 없이 입력해주세요. )</p></td>
            </tr>
            <tr>
                <td>SMS 수신</td>
                <td class="input_radio">
                    <input type="radio" name="userSMSCK" id="radio2" value="yes" checked>
                    <label for="radio2">예</label>
                    <input type="radio" name="userSMSCK" id="radio2" value="No">
                    <label for="radio2">아니오</label>
                <br>
                <p>( 다양한 프로모션 / 할인 정보를 제공 받을 수 있습니다. )</p>
                </td>
            <tr>
                <td colspan="2">
                    <button type="submit" onclick="joinProcess()">회원가입</button>
                    <button type="reset">취소</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
    let userPw2 = document.querySelector('#userPw');
let userPwCh2 = document.querySelector('#userPwCh');
let passInform = document.querySelector('#passInform');
userPwCh2.addEventListener('keyup',function(){
    if(userPw2.value != userPwCh2.value) {
        passInform.innerHTML = '비밀번호가 일치하지 않습니다.';
    }else {
        passInform.innerHTML = '비밀번호가 일치합니다.';
    }
})
    function joinProcess(){
        let userId = document.querySelector('#userId').value;
        let userPw = document.querySelector('#userPw').value;
        let userPwCh = document.querySelector('#userPwCh').value;
        let userName = document.querySelector('#userName').value;
        let userPhone = document.querySelector('#userPhone').value;

        if(!userId) {
            alert('아이디를 입력하세요');
        }
        if(userPw.length < 8) {
            alert('비밀번호는 8자리 이상 입력하셔야 합니다.');
        }
        if(userPw !== userPwCh) {
            alert('패스워드 확인이 일치하지 않습니다.');
        }
        if(!userName) {
            alert('이름을 입력하세요');
        }
        if(!userPhone) {
            alert('전화번호를 입력하세요');
        }
        if(userId && userPw.length>=8 && userPw === userPwCh && userName && userPhone) {
            // location.replace("/jooda/index.php");
            alert('회원가입을 했습니다.');
            location.replace("/jooda/index.php");
            // 페이지 이동 해야됨!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
        }
    }
       // 주소 입력
       function PostCodeSearch(){
            new daum.Postcode({
                oncomplete: function(data) {
                var roadAddr = data.roadAddress;
                
                document.querySelector('#woopyeon').value=data.zonecode;
                document.querySelector("#doro").value = roadAddr;
            
                }
            }).open();
        }
</script>
<?php include_once '../include/footer.php' ?>
<style>
    body {
        padding-top: 160px;
    }
    #please {
    position: absolute;
    bottom: -600px;
    left: 50px;
}
</style>