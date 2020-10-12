</div>
</div>
</div>


<script src="/back_end/js/gijgo.min.js" type="text/javascript"></script>
<script src="/back_end/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/back_end/vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="/back_end/js/ruang-admin.min.js"></script>
<script src="/back_end/js/toastr.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.1/js/select2.min.js"></script>
<script src="/back_end/js/ajax.js"></script>
<script src="/back_end/js/sukien.js"></script>
@if(session('thongbao'))
    <script type="text/javascript">
        toastr.success('{{ session('thongbao') }}', 'Thông báo', {timeOut: 5000});
    </script>
@endif
@if(session('error'))
    <script type="text/javascript">
        toastr.error('{{ session('error') }}', 'Thông báo', {timeOut: 5000});
    </script>
@endif


</body>
</html>

