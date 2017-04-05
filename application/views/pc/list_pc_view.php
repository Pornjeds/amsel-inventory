<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">รายชื่อ PC</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    ตารางรายชื่อ PC
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr>
                                <th class="text-center">ชื่อ-นามสกุล</th>
                                <th class="text-center">ชื่อเล่น</th>
                                <th class="text-center">สาขา</th>
                                <th class="text-center">อีเมล์</th>
                            </tr>
                        </thead>
                        <tbody>
                          <?php
                          if(!$users)
                          {
                            //No data
                          }
                          else{
                            foreach($users as $user)
                            {
                              echo '<tr class="even">
                                      <td><a href="/index.php/pcuser/viewpcuser?userID='.
                                        $user -> UserID .'">' . $user -> FirstName . ' ' . $user -> LastName.
                                      '</a></td>
                                      <td class="text-center">' . $user -> NickName . '</td>
                                      <td class="text-center">' . $user -> StoreName . '</td>
                                      <td class="text-center">' . $user -> Email . '</td>
                                    </tr>';
                            }
                          }
                          ?>
                        </tbody>
                    </table>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->
