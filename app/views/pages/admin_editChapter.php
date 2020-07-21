<?php @$error = $data["error"];var_dump($error); $subjectId = $data["subjectId"]; @$chapter = $data["chapter"]?>
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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Chỉnh sửa chương học </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body text-center">

                            <!-- select grade, subject -->
                            <div class="form-group">
                                <label for="grade" class="col-sm-2 control-label">Khối lớp học</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-10 browser-default custom-select form-control"
                                        id="gradeSelect" name="gradeSelect" disabled>
                                        <!-- <option>Danh sách quyền</option> -->
                                        <?php $grades = $data["grades"] ;
                                            for ($index=0; $index < count($grades); $index++) { 
                                                $row = $grades[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if($row[0]==(int)$data["gradeId"]) echo "selected"?>>
                                            <?php echo $row[1];?>
                                        </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>

                            </div>


                            <div class="form-group <?php if($error["subjectError"] != "") echo "has-error"?>">
                                <label for="grade" class="col-sm-2 control-label">Môn học</label>
                                <div class="col-sm-10">
                                    <input type="hidden" id="subjectId" name="subjectId"
                                        value="<?php echo $subjectId;?>">

                                    <select class="col-sm-10 browser-default custom-select form-control"
                                        id="subjectSelect" name="subjectSelect" disabled>
                                        <?php $subjects=$data["subjects"]; 

                                            for ($index=0; $index < count($subjects); $index++) { 
                                                $row = $subjects[$index];
                                            ?>

                                        <option value="<?php echo $row[1];?>"
                                            <?php if((int)$subjectId == (int)$row[1]) echo "selected"; ?>>
                                            <?php echo $row[2];?>
                                        </option>

                                        <?php
                                        }
                                        ?>
                                    </select>
                                    <?php if(@$error["subjectError"] != ""){ ?>
                                    <span class="help-block"><?php echo @$error["subjectError"];?></span>
                                    <?php } ?>
                                </div>

                            </div>

                            <!-- infor chapter -->
                            <div class="form-group  <?php if($error["chapterName"] != "") echo "has-error"; ?>">
                                <label for="chapterName" class="col-sm-2 control-label">Tên chương</label>
                                <div class="col-sm-10 text-center">
                                    <input type="text" class="form-control" id="TenMon" placeholder="Tên chương"
                                        name="chapterName" value="<?php echo @$chapter["chapterName"];?>">
                                    <?php if(@$error["chapterName"] != ""){ ?>
                                    <span class="help-block"><?php echo @$error["chapterName"]?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="chapterDescription" class="col-sm-2 control-label">Mô tả chương học</label>
                                <div
                                    class="col-sm-10 text-center <?php if($error["chapterDescription"] != "") echo "has-error"; ?>">
                                    <input type="text" class="form-control" id="chapterDescription"
                                        placeholder="Mô tả môn học." name="chapterDescription"
                                        value="<?php echo @$chapter["chapterDescription"];?>">
                                    <?php if(@$error["chapterDescription"] != ""){ ?>
                                    <span class="help-block">Vui lòng nhập mô tả môn học.</span>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="Manager/ListChapters" class="btn btn-default">Quay lại</a>
                            <button type="submit" class="btn btn-info pull-right" name="updateChapter">Cập nhật</button>
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