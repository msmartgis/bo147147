<!-- jQuery 3 -->

<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});



</script>

<script src="{{asset('vendor_components/jquery-3.3.1/jquery-3.3.1.js')}}"></script>

<!-- jQuery UI 1.11.4 -->
<script src="{{asset('vendor_components/jquery-ui/jquery-ui.js')}}"></script>


<!-- popper -->
<script src="{{asset('vendor_components/popper/dist/popper.min.js')}}"></script>

<!-- Bootstrap 4.0-->
<script src="{{asset('js/bootstrap.min.js')}}"></script>

<!-- Slimscroll -->
<script src="{{asset('vendor_components/jquery-slimscroll/jquery.slimscroll.js')}}"></script>

<!-- FastClick -->
<script src="{{asset('vendor_components/fastclick/lib/fastclick.js')}}"></script>

<!-- peity -->
<script src="{{asset('vendor_components/jquery.peity/jquery.peity.js')}}"></script>

<!-- Fab Admin App -->
<script src="{{asset('js/template.js')}}"></script>


<!-- Select2 -->
<script src="{{asset('vendor_components/select2/dist/js/select2.full.js')}}"></script>

<!-- iCheck 1.0.1 -->
<script src="{{asset('vendor_plugins/iCheck/icheck.min.js')}}"></script>

<!-- Fab Admin for advanced form element -->
<script src="{{asset('js/advanced-form-element.js')}}"></script>


<!-- Sweet-Alert  -->
<script src="{{asset('vendor_components/sweetalert/sweetalert.min.js')}}"></script>
<script src="{{asset('vendor_components/sweetalert/jquery.sweet-alert.custom.js')}}"></script>

<!-- date-range-picker -->
<script src="{{asset('vendor_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('vendor_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

<!-- bootstrap datepicker -->
<script src="{{asset('vendor_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript" src="{{asset('js/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/daterangepicker.js')}}"></script>

<!-- toast -->
<script src="{{asset('vendor_components/jquery-toast-plugin-master/src/jquery.toast.js')}}"></script>
<script src="{{asset('js/toastr.js')}}"></script>
{{--functions---}}
<script src="{{asset('js/js_translate.js')}}"></script>
<script src="{{asset('js/functions.js')}}"></script>


<script>
	$(window).on('load', function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");
			$(function () {
			  $('[data-toggle="tooltip"]').tooltip()
			})
		});
		

		$(".datepicker").datepicker({
		format: "dd/mm/yyyy"
		});
</script>

@stack('added_scripts')