<script src="assets/js/intlTelInput.min.js"></script>
<script src="assets/js/utils.min.js"></script>
<script src="templates/common/js/star-rating.js"></script>
<script src="templates/common/js/script.js"></script>
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