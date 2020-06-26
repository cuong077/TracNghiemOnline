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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Thêm môn học </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">

                            <div class="form-group">
                                <label for="TenMon" class="col-sm-2 control-label">Tên Môn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="TenMon" placeholder="Tên Môn"
                                        name="subject_name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="TenMon" class="col-sm-2 control-label">Khối</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-10 browser-default custom-select form-control"
                                        name="gradeSelect">
                                        <!-- <option>Danh sách quyền</option> -->
                                        <?php $grades = $data["grades"] ;
                                                // print_r($roles);

                                                for ($index=0; $index < count($grades); $index++) { 
                                                    $row = $grades[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>">
                                            <?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="Manager/danhsachmon" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right" name="addSubject">Add</button>
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