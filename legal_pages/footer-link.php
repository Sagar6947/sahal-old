<script src="../assets/js/jquery.min.js"></script>
			<script src="../assets/plugins/js/bootstrap.min.js"></script>
			<script src="../assets/plugins/js/bootsnav.js"></script>
			<script src="../assets/plugins/js/bootstrap-select.min.js"></script>
			<script src="../assets/plugins/js/bootstrap-touch-slider-min.js"></script>
			<script src="../assets/plugins/js/jquery.touchSwipe.min.js"></script>
			<script src="../assets/plugins/js/chosen.jquery.js"></script>
			<script src="../assets/plugins/js/datedropper.min.js"></script>
			<script src="../assets/plugins/js/dropzone.js"></script>
			<script src="../assets/plugins/js/jquery.counterup.min.js"></script>
			<script src="../assets/plugins/js/jquery.fancybox.js"></script>
			<script src="../assets/plugins/js/jquery.nice-select.js"></script>
			<script src="../assets/plugins/js/jqueryadd-count.js"></script>
			<script src="../assets/plugins/js/jquery-rating.js"></script>
			<script src="../assets/plugins/js/slick.js"></script>
			<script src="../assets/plugins/js/timedropper.js"></script>
			<script src="../assets/plugins/js/waypoints.min.js"></script>
			
			<script src="../assets/js/jQuery.style.switcher.js"></script>
			
			<!-- Custom Js -->
			<script src="../assets/js/custom.js"></script>
</body>

</html>
<script>
	var n = localStorage.getItem('on_load_counter');

	if (n === null) {
		n = 0;
	}

	n++;

	localStorage.setItem("on_load_counter", n);

	document.getElementById('display_div_id').innerHTML = n;
</script>