<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('shared/meta_view'); ?>
</head>

<body>

    <div id="wrapper">

        <?php $this->load->view('shared/navigation_view'); ?>

        <?php $this->load->view($page); ?>

        <?php $this->load->view('shared/script_view'); ?>

        <!-- Page-Level Demo Scripts - Tables - Use for reference -->
        <script>
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });
        });
        </script>

</body>

</html>
