<div id="skell">
    <!-- 김효진 세상 -->
</div>
</div>

<script>
//로딩중 (스켈레톤)
let skell = document.querySelector('#skell');
window.onload = setTimeout(skelleton, 1000);
// window.onload = skelleton;
function skelleton() {
    // alert('로딩!');
    skell.style.display = 'none';
}
</script>