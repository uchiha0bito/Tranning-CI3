
<script>
    $(document).ready(function() {
        $('.delete-link').click(function(e) {
            e.preventDefault();
            var userId = $(this).data('user-id');
            if (confirm('Are you sure you want to delete this user?')) {
                window.location.href = "<?php echo base_url('users/delete/'); ?>" + userId;
            }
        });
    });
</script>
