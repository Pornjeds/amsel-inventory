<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">สร้างรายการใหม่</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    กรุณากรอกข้อมูลรายละเอียดในแต่ละช่องให้ครบถ้วน
                </div>
                <div class="panel-body">
                    <?php echo validation_errors(); ?>
                    <?php $attributes = array('role' => 'form', 'class' => 'dropzone'); ?>
                    <?php echo form_open_multipart('Transaction/VerifyTransaction', $attributes); ?>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>ชื่อ</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="text" placeholder="ชื่อ" name="firstname">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>นามสกุล</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="text" placeholder="นามสกุล" name="lastname">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>ชื่อเล่น</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="text" placeholder="ชื่อเล่น" name="nickname">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>รูปโปรไฟล์</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="file" name="profile-image">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Username</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="text" name="username" placeholder="Username">
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Password</label>
                          </div>
                        </div>
                        <div class="col-md-10">
                            <input class="form-control" type="password" name="password" placeholder="Password">
                        </div>
                      </div>
                      <div class="row">
                            <div class="col-md-2">
                              <div class="form-group">
                                <label>Password</label>
                              </div>
                            </div>
                            <div class="col-md-10">
                                <input class="form-control" type="password" name="password" placeholder="ใส่ Password อีกครั้ง">
                            </div>
                      </div>
                      <div class="row">
                          <div class="col-md-2">
                            <div class="form-group">
                              <label>Email</label>
                            </div>
                          </div>
                          <div class="col-md-10">
                              <input class="form-control" type="email" name="email" placeholder="Email">
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                        </div>
                        <div class="col-md-10">
                            <input class="btn btn-default" type="submit" value="Submit">
                        </div>
                      </div>
                      <!-- /.row (nested) -->
                    </form>
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
<script src="/vendor/dropzone/dropzone.js"></script>
