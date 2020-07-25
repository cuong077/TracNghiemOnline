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
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="email" class="control-label">Email</label>
                                </th>
                                <td>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email"
                                        value="<?php echo $user[0]; ?>" disabled>
                                </td>
                            </tr>
                            
                            <tr class="text-center">
                                <th class="text-center col-sm-2">
                                    <label for="UserName" class="control-label">User Name</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="UserName" placeholder="UserName"
                                                name="username" value="<?php echo $user[1]; ?>">
                                </td> 
                            </tr>
                           
                            <tr>
                                <th class="text-center">
                                    <label for="FullName" class="control-label">FullName</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="FullName" placeholder="FullName"
                                                name="fullname" value="<?php echo $user[2]; ?>">
                                </td>
                            </tr>
                            

                            <tr>
                                <th class="text-center">
                                    <label for="RoleID" class="control-label">Role</label>
                                </th>
                                <td>
                                    <select class="browser-default custom-select form-control" name="roleSelect">
                                        <!-- <option>Danh sách quyền</option> -->
                                        <?php $roles=$data["roles"]; 
                                                // print_r($roles);

                                                for ($index=0; $index < count($roles); $index++) { 
                                                    $row = $roles[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$user[3] == $row[0]) echo "selected"; ?>><?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>

                            </tr>
                            

                        </table>
                      
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a class="btn btn-default" href="Manager/ListUsers">Quay lại</a>
                            <button type="submit" name="UpdateUser" class="btn btn-info pull-right">Cập nhật</button>
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