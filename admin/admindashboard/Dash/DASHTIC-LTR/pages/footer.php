<!--Footer-->
<footer class="footer">
    <div class="container">
        <div class="row align-items-center flex-row-reverse">
            <div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
                Copyright © 2022 <a href="<?php echo $root; ?>/#">AutoTrack</a> All rights reserved.
            </div>
        </div>
    </div>
</footer>
<!-- End Footer-->
</div>

<!-- Back to top -->
<a href="<?php echo $root; ?>/#top" id="back-to-top">
    <svg class="svg-icon" xmlns="http://www.w3.org/2000/svg" height="24" viewBox="0 0 24 24" width="24">
        <path d="M0 0h24v24H0V0z" fill="none" />
        <path d="M4 12l1.41 1.41L11 7.83V20h2V7.83l5.58 5.59L20 12l-8-8-8 8z" />
    </svg>
</a>

<!-- Jquery js-->

<script src="../public/assets/js/vendors/jquery-3.5.1.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js">
< script src = "https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js" >
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
</script>

<!-- Include Moment.js CDN -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js">
</script>


<script src="../public/assets/js/jquery.datetimepicker.full.js"></script>
<script src="../public/assets/js/jquery.datetimepicker.full.min.js"></script>
<script src="../public/assets/js/jquery.datetimepicker.min.js"></script>
<!-- Bootstrap4 js-->
<script src="../public/assets/plugins/bootstrap/popper.min.js"></script>
<script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!--Othercharts js-->
<script src="../public/assets/plugins/othercharts/jquery.sparkline.min.js"></script>
<!-- <script src="../public/assets/js/jquery.datetimepicker.full.min.js"></script>	 -->
<script src="../public/assets/js/jquery-ui.js"></script>



<!-- Jquery-rating js-->
<script src="../public/assets/plugins/rating/jquery.rating-stars.js"></script>

<script src="../public/assets/js/moment.min.js"></script>
<!-- <script src="../public/assets/js/bootstrap-datetimepicker.js"></script> -->

<script src="../public/assets/js/custom.js"></script>
<!-- Circle-progress js-->
<script src="../public/assets/js/vendors/circle-progress.min.js"></script>

<!-- Jquery-rating js-->
<script src="../public/assets/plugins/rating/jquery.rating-stars.js"></script>
<script src="../public/assets/js/vendors/jquery-3.5.1.min.js"></script>

<!-- Bootstrap4 js-->
<script src="../public/assets/plugins/bootstrap/popper.min.js"></script>
<script src="../public/assets/plugins/bootstrap/js/bootstrap.min.js"></script>

<!-- Circle-progress js-->
<script src="../public/assets/js/vendors/circle-progress.min.js"></script>


<!--Sidemenu js-->
<script src="../public/assets/plugins/sidemenu/sidemenu.js"></script>

<!-- P-scroll js-->
<script src="../public/assets/plugins/p-scrollbar/p-scrollbar.js"></script>
<script src="../public/assets/plugins/p-scrollbar/p-scroll1.js"></script>


<!-- INTERNAL JS INDEX2 START -->
<!--Moment js-->
<script src="../public/assets/plugins/moment/moment.js"></script>

<!-- Daterangepicker js-->
<script src="../public/assets/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="../public/assets/js/daterange.js"></script>

<!-- INTERNAL JS INDEX2 END -->


<!-- INTERNAL JS START -->
<!--Select2 js -->
<script src="../public/assets/plugins/select2/select2.full.min.js"></script>
<script src="../public/assets/js/select2.js"></script>


<!-- INTERNAL JS START -->
<!-- Data tables -->
<script src="../public/assets/plugins/datatable/js/jquery.dataTables.js"></script>
<script src="../public/assets/plugins/datatable/js/dataTables.bootstrap4.js"></script>
<script src="../public/assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
<script src="../public/assets/plugins/datatable/js/buttons.bootstrap4.min.js"></script>
<script src="../public/assets/plugins/datatable/js/jszip.min.js"></script>
<script src="../public/assets/plugins/datatable/js/pdfmake.min.js"></script>
<script src="../public/assets/plugins/datatable/js/vfs_fonts.js"></script>
<script src="../public/assets/plugins/datatable/js/buttons.html5.min.js"></script>
<script src="../public/assets/plugins/datatable/js/buttons.print.min.js"></script>
<script src="../public/assets/plugins/datatable/js/buttons.colVis.min.js"></script>
<script src="../public/assets/plugins/datatable/dataTables.responsive.min.js"></script>
<script src="../public/assets/plugins/datatable/responsive.bootstrap4.min.js"></script>
<script src="../public/assets/js/datatables.js"></script>


<script>
var elems = document.getElementsByClassName('delete-confirmation');
var confirmIt = function(e) {
    var dialog = 'Are you sure you want to delete this?'
    if (!confirm(dialog)) e.preventDefault();
};
for (var i = 0, l = elems.length; i < l; i++) {
    elems[i].addEventListener('click', confirmIt, false);
}
</script>