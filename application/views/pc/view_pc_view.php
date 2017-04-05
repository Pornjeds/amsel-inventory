<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Blank</h1>
            </div>
            <div>
              <p>
                <?php
                  foreach($user as $u){
                    echo $u -> FirstName;
                    echo $u -> LastName;
                    echo $u -> NickName;
                    echo $u -> StoreName;
                  }
                ?>
              </p>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
