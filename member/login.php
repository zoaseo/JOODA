<?php include_once '../include/header.php' ?>
<div id="member" class="section_container">
    <h2>로그인</h2>
    <h3>아이디와 패스워드를 입력하세요.</h3>
    <form action="../process/login_process.php" method="post">
        <table>
            <tr>
                <td>아이디</td>
                <td class="member_input"><input type="text" name="userId"></td>
            </tr>
            <tr>
                <td>비밀번호</td>
                <td class="member_input"><input type="password" name="userPw"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit">로그인</button>
                    <button type="reset">취소</button>
                    <button type="button" onclick="location.href='join.php'">회원가입</button>
                </td>
            </tr>
        </table>
    </form>
</div>
<?php include_once '../include/footer.php' ?>
<style>
    body {
        padding-top: 160px;
    }
#please {
    position: absolute;
    bottom: 0;
    left: 50px;
}
</style>