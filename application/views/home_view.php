<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">

<head>

    <?php $this->load->view('shared/meta_view');?>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view('/shared/navigation_view');?>
        <!-- /Navigation -->

        <?php $this->load->view('home_content_view');?>

    </div>
    <!-- /#wrapper -->

    <?php $this->load->view('/shared/script_view');?>

</body>

</html>
