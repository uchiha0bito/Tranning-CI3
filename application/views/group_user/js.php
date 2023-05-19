
<script>
    $(document).ready(function() {
        $('.delete-link').click(function(e) {
            e.preventDefault();
            var groupId = $(this).data('group-id');
            if (confirm('Are you sure you want to delete this group?')) {
                window.location.href = "<?php echo base_url('group/delete/'); ?>" + groupId;
            }
        });
    });
</script>
