<?php $grade=$data["grade"];?>

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
                    <div class="box-header with-border">
                        <h3 class="box-title"><b style="color:#3c8dbc;">Sửa thông tin khối<b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="Makhoi" class="col-sm-2 control-label">Mã khối</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Makhoi" name="grade_id" placeholder="Mã khối" value="<?php echo $grade["id"];?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="Tenkhoi" class="col-sm-2 control-label">Tên khối</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Tenkhoi" name="grade_name" placeholder="Tên khối" value="<?php echo $grade["name"]?>">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="manager/danhsachkhoi" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right" name="updateGrade">Update</button>
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