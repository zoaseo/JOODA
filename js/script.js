
let sitemap = document.querySelector('#sitemap');
let body = document.querySelector('body');
let hamburger = document.querySelector('#hambuger_menu');
let sm_p = document.querySelectorAll('.sm_p');
let sm_li = document.querySelectorAll('.sm_li');
let sm_btn = document.querySelector('#sm_btn');
console.log(hamburger);
console.log(sm_p);
hamburger.addEventListener('click',function(){
    sitemap.style.left = 0;
    sitemap.style.opacity = '1';
    body.style.overflow = 'hidden';
    sitemap.style.position = 'fixed';
})
sm_btn.addEventListener('click', function(){
    sitemap.style.left = '-100%';
    sitemap.style.opacity = '0.5';
    body.style.overflow = 'unset';
})


//slide
const imgDivs = document.querySelectorAll('.imgdiv');
const indiDiv = document.querySelector('#indi');
let divLeft = 0;
let current = 0;
let indiStr = "";
// setInterval을 담을 변수
let timer;
imgDivs.forEach((imgdiv,index) =>{
    imgdiv.style.left = `${index*100}%`;   // imgdiv.style.left = `${index*100}%`;
    indiStr = indiStr + `<span>${index}</span>`
})
indiDiv.innerHTML = indiStr;
let indi = document.querySelectorAll('#indi span');
indi[0].classList.add('on');
console.log(indi);
// 인디게이터 이벤트 연결
indiDiv.addEventListener('click', function(e){
    let targetNum = e.target.innerHTML;
    moveDiv(targetNum);
})
function moveDiv(left){
    document.querySelector('#divs').style.left = `${-(left * 100)}%`;
    current = left;
    console.log(current);
    indi.forEach(ind=>{ind.classList.remove('on');})
    indi[current].classList.add('on');
}
// 현재 보고있는 div가 0일 때 이전 3 다음 1
// 현재 보고있는 div가 1일 때 이전 0 다음 2
// 현재 보고있는 div가 2일 때 이전 1 다음 3
// 현재 보고있는 div가 3일 때 이전 2 다음 0
// 자동이미지 전환 실행함수(setInterval)
function startIt() {
        // setInterval(함수, 시간)
    timer = setInterval(function(){
    // 3초마다 이미지전환
    // dom요소divs의 left값이 0%, -100%, -200%, -300%, 0, -100% . . .
    divLeft = current === imgDivs.length-1 ? 0 : divLeft + 1;
    moveDiv(divLeft);
    },3000)
}
// 자동이미지 전환 멈춤함수(clearInterval)
function stopIt() {
    clearInterval(timer);
}
startIt();

// reloadtime =500;
// function get_cookie(Name) {
// var search = Name + "="
// var returnvalue = "";

// if (document.cookie.length > 0) {
// offset = document.cookie.indexOf(search)

// if (offset != -1) {
// offset += search.length
// end = document.cookie.indexOf(";", offset);
// if (end == -1) end = document.cookie.length;
// returnvalue=unescape(document.cookie.substring(offset, end))
// }

// }
// return returnvalue;
// }

 

// function oneload() {
// var cookiename=window.location.pathname
// var flag = eval(get_cookie(window.location.pathname));
// if(flag || flag == null) {
// var cookievalue="false;"
// document.cookie=cookiename+"="+cookievalue;
// location.reload();
// }
// else {
// var cookievalue="true;"
// document.cookie=cookiename+"="+cookievalue;
// }
// }

