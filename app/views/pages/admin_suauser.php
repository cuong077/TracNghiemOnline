<?php $user = $data["user"];?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">

    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-lg-12">
                <!-- form start -->
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title"><b style="color:#3c8dbc;">Thông tin người dùng <?php echo $user[1]?><b>
                        </h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="email" class="col-sm-2 control-label">Email</label>

                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                        value="<?php echo $user[0]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="UserName" class="col-sm-2 control-label">UserName</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="UserName" placeholder="UserName" name="username"
                                        value="<?php echo $user[1]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="FullName" class="col-sm-2 control-label">FullName</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="FullName" placeholder="FullName" name="fullname"
                                        value="<?php echo $user[2]; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="RoleID" class="col-sm-2 control-label">RoleID</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="RoleID" placeholder="RoleID" name="role_id"
                                        value="<?php echo $user[3]; ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a class="btn btn-default" href="manager/danhsachuser">Cancel</a>
                            <button type="submit" name="UpdateUser" class="btn btn-info pull-right">Update</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- Horizontal Form -->

            </div>

        </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->