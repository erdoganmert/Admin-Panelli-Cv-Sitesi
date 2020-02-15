<footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
        Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
</footer>

<!-- ./wrapper -->


<script>
    $(document).ready(function () {

        $("#success").hide(3000);

        var currentDate = new Date();
        var currentDay = currentDate.getDate();
        var currentMonth =currentDate.getMonth() + 1;
        var currentYear = currentDate.getFullYear();
        var simdikiTarih = currentYear +"-"+currentMonth+"-"+currentDay
        $('.tarih').datepicker({
            dateFormat: 'yy-mm-dd',
            changeMonth: true,
            changeYear: true,
            maxDate: simdikiTarih

        });



        $("input[type='radio']").click(function () {
            var radioDeger = $("input[name='devam']:checked").val();
            if(radioDeger == 1){
                $('#bit_tarih').fadeOut();
            }else if(radioDeger == 2){
                $('#bit_tarih').fadeIn();
            }
        });




    });

</script>

</body>
</html>
