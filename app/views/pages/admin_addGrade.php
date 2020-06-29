<!-- Content Wrapper. Contains page content -->
<?php $error = $data["error"];?>
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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Thêm mới khối<b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">
                            <div class="form-group text-center <?php if(@$error["gradeName"] != "") echo "has-error"; ?>">
                                <label for="Tenkhoi" class="col-sm-2 control-label">Tên khối</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Tenkhoi" placeholder="Tên khối"
                                        name="grade_name">
                                    <?php if(@$error["gradeName"] != ""){ ?>
                                        <span class="help-block">Vui lòng nhập tên khối.</span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group text-center <?php if(@$error["gradeDescription"] != "") echo "has-error"; ?>">
                                <label for="Decription" class="col-sm-2 control-label">Mô tả khối</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Decription" placeholder="Mô tả"
                                        name="decription">
                                        <?php if(@$error["gradeDescription"] != ""){ ?>
                                        <span class="help-block">Vui lòng nhập mô tả khối.</span>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="Manager/ListGrades" class="btn btn-default">Quay lại</a>
                            <button type="submit" class="btn btn-info pull-right" name="addGrade">Thêm</button>
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