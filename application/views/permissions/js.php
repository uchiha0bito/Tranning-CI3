<script>
	// Data table
	$(document).ready(function() {
		$('#permissionTable').DataTable();
	});

	$(document).ready(function() {
		$('.delete-link').click(function(e) {
			e.preventDefault();
			var permissionId = $(this).data('permission-id');
			if (confirm('Are you sure you want to delete this permission?')) {
				window.location.href = "<?php echo base_url('permission/delete/'); ?>" + permissionId;
			}
		});
	});

</script>
