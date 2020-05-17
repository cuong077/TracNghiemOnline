<?php $exam = $data["exam"]; echo($exam[3])?>
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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Danh sách bài thi đã chọn</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="MaThoiGian" class="col-sm-2 control-label">Mã thời gian</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaThoiGian" placeholder="Mã thời gian"
                                        value="<?php echo $exam[4];?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="MaGiaoVien" class="col-sm-2 control-label">Mã giáo viên</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaGiaoVien" placeholder="Mã giáo viên" value="<?php echo $exam[2];?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="MaKhoi" class="col-sm-2 control-label">Mã khối</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaKhoi" placeholder="Mã khối" value="<?php echo $exam[3];?>" name="grade_id">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="MaBaiThi" class="col-sm-2 control-label">Mã bài thi</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaBaiThi" placeholder="Mã bài thi" value="<?php echo $exam[0];?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="MaMon" class="col-sm-2 control-label">Mã môn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaMon" placeholder="Mã môn">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="MoTaBaiThi" class="col-sm-2 control-label">Mô tả bài thi</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MoTaBaiThi" placeholder="Mô tả bài thi" value="<?php echo $exam[1];?>" name="exam_description">
                                </div>
                            </div>
                          
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="manager/danhsachbaithi" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right">Update</button>
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