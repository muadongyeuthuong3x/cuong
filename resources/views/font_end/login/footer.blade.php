<script type="text/javascript" src="/back_end/js/jquery-1.11.3.min.js"></script>
<script src="/back_end/js/toastr.min.js"></script>

<script type="text/javascript">
    window.onload = function () {
        document.getElementById("password1").onchange = validatePassword;
        document.getElementById("password2").onchange = validatePassword;
    }
    function validatePassword(){
        var pass2=document.getElementById("password2").value;
        var pass1=document.getElementById("password1").value;
        if(pass1!=pass2)
            document.getElementById("password2").setCustomValidity("2 mật khẩu không trùng khớp");
        else
            document.getElementById("password2").setCustomValidity('');
            //empty string means no validation error
    }




</script>



@if(session('thongbao'))
    <script type="text/javascript">
        toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 5000});
    </script>
@endif




</body>
</html>
