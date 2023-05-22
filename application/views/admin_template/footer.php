	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"></script>
	</body>

	</html>
	<script>
		var input = document.querySelector('.slug');

		if (input) {
			input.addEventListener('input', function(event) {
				var text = event.target.value;
				var slug = slugify(text);
				// Thay đổi giá trị của input thành slug hợp lệ
				event.target.value = slug;
			})
		}


		// Create  slug
		function slugify(text) {
			return text.toString().toLowerCase()
				.replace(/\s+/g, '_') // Thay thế khoảng trắng bằng dấu gạch dưới
				.replace(/[^\w\-]+/g, '') // Loại bỏ các ký tự không hợp lệ
				.replace(/\_+/g, '_') // Thay thế nhiều gạch dưới liên tiếp thành một gạch dưới
				.replace(/^-+/, '') // Loại bỏ dấu gạch ngang ở đầu
				.replace(/-+$/, ''); // Loại bỏ dấu gạch ngang ở cuối
		}
	</script>
