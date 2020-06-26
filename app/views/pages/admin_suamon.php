<?php $subject=$data["subject"]?>
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
                        <h3 class="box-title">Môn đã chọn</h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="MaMon" class="col-sm-2 control-label">Mã Môn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaMon" placeholder="Mã Môn"
                                        value="<?php echo $subject[0]?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TenMon" class="col-sm-2 control-label">Tên Môn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="TenMon" placeholder="Tên Môn"
                                        value="<?php echo $subject[1]?>" name="subject_name">
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a type="submit" class="btn btn-default" href="Manager/danhsachmon">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right" name="updateSubject">Update</button>
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