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
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title"><b style="color:#3c8dbc;">Danh sách người dùng</b></h3>
                    </div>

                    <div>
                        <table class="table table-striped custab text-center
                        ">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Email</th>
                                    <th>Full Name</th>
                                    <th>User Name</th>
                                    <th>Role</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php


                                  $users = $data["users"];
                                  for ($index=0; $index < count($users); $index++) { 
                                    # code...
                                    $row = $users[$index];
                                ?>
                                <tr>
                                    <td> <?php echo $row[4]; ?></td>
                                    <td> <?php echo $row[5]; ?></td>
                                    <td> <?php echo $row[1]; ?></td>
                                    <td> <?php echo $row[0]; ?></td>
                                    <td> <?php echo $row[2]; ?></td>
                                    <td class="text-center">
                                        <!-- <a class="btn btn-success btn-xs" href="Manager/themuser"><span
                                                class="glyphicon glyphicon-plus"></span> Add</a> -->
                                        <a class='btn btn-info btn-xs' href="Manager/suauser/<?php echo $row[3]?>"><span
                                                class="glyphicon glyphicon-edit"></span> Edit</a>
                                        <a href="Manager/xoauser/<?php echo $row[3]?>" class="btn btn-danger btn-xs"><span
                                                class="glyphicon glyphicon-remove"></span> Del</a>
                                    </td>
                                </tr>

                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<div id="confirm" class="modal hide fade">
    <div class="modal-body">
        Bạn có chắc chắn xóa người dùng?
    </div>
    <div class="modal-footer">
        <form method="post">
            <a href="" data-dismiss="modal" class="btn btn-primary" name="delete">Delete</button>
                <button type="button" data-dismiss="modal" class="btn">Cancel</button>
        </form>

    </div>
</div>