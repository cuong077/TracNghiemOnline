<?php $subject=$data["subject"]; $error = @$data["error"]; print_r($error); ?>
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
                        <div class="box-body text-center">
                            <div class="form-group">
                                <label for="MaMon" class="col-sm-2 control-label">Mã môn học.</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="MaMon" placeholder="Mã Môn"
                                        value="<?php echo $subject[0]?>" readonly>
                                    <input type="text" name="oldSubjectName" value="<?php echo $data["oldSubjectName"]?>" hidden>
                                </div>

                            </div>
                            <div class="form-group <?php if(@$error["subjectName"] != "" || @$error["subjectExists"]) {echo "has-error";}?>">
                                <label for="subjectName" class="col-sm-2 control-label">Tên Môn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subjectName" placeholder="Tên Môn"
                                        value="<?php echo $subject[1]?>" name="subjectName">
                                    <?php if(@$error["subjectName"] != ""){ ?>
                                        <span class="help-block"><?php echo @$error["subjectName"]?></span>
                                    <?php } ?>
                                    <?php if(@$error["subjectExists"] != ""){ ?>
                                        <span class="help-block"><?php echo @$error["subjectExists"]?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group <?php if(@$error["subjectDescription"] != "") {echo "has-error";}?>">
                                <label for="TenMon" class="col-sm-2 control-label">Mô tả môn</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="subjectDescription" placeholder="Mô tả môn học"
                                        value="<?php echo $subject[2]?>" name="subjectDescription">
                                    <?php if(@$error["subjectDescription"] != ""){ ?>
                                        <span class="help-block">Vui lòng nhập mô tả môn học.</span>
                                    <?php } ?>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="gradeSelect" class="col-sm-2 control-label">Khối lớp học</label>

                                <div class="col-sm-10">
                                    <select class="browser-default custom-select form-control" name="gradeSelect">
                                        <!-- <option>Danh sách quyền</option> -->
                                        <?php $grades=$data["grades"];  $gradeId = $data["gradeId"]; 

                                                for ($index=0; $index < count($grades); $index++) { 
                                                    $row = $grades[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                        <?php if((int)$gradeId == (int)$row[0]) echo "selected"; ?>><?php echo $row[1];?>
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
                            <a type="submit" class="btn btn-default" href="Manager/ListSubjects">Quay lại</a>
                            <button type="submit" class="btn btn-info pull-right" name="updateSubject">Cập nhật</button>
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