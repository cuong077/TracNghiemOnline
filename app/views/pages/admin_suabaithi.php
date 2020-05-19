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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Chính sửa bài thi đã chọn</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaBaiThi" class="control-label">Mã bài thi</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MaBaiThi" placeholder="Mã bài thi"
                                        value="<?php echo $exam[0];?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaGiaoVien" class="control-label">Mã giáo viên</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MaGiaoVien" placeholder="Mã giáo viên"
                                        value="<?php echo $exam[2];?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaThoiGian" class="control-label">Mã thời gian</label>
                                </th>
                                <td>
                                    <!-- <input type="text" class="form-control" id="MaThoiGian" placeholder="Mã thời gian"
                                        value="<?php echo $exam[4];?>" readonly> -->

                                    <select class="browser-default custom-select form-control" name="examTimeSelect">
                                        <?php $examTimes=$data["examTimes"]; 
                                                // print_r($roles);

                                                for ($index=0; $index < count($examTimes); $index++) { 
                                                    $row = $examTimes[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$exam[4] == $row[0]) echo "selected"; ?>><?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <th class="text-center col-sm-2">
                                    <label for="MaKhoi" class="control-label">Mã khối</label>
                                </th>
                                <td>

                                    <select class="browser-default custom-select form-control" name="gradeSelected">
                                        <?php $grades=$data["grades"]; 

                                                for ($index=0; $index < count($grades); $index++) { 
                                                    $row = $grades[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$row["id"] == $exam[3]) echo "selected";?>>
                                            <?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaMon" class="control-label">Mã môn</label>
                                </th>
                                <td>
                                    <select class="browser-default custom-select form-control" name="gradeSelected">
                                        <?php $subjects=$data["subjects"]; 

                                                for ($index=0; $index < count($subjects); $index++) { 
                                                    $row = $subjects[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$row["id"] == $exam[5]) echo "selected";?>>
                                            <?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MoTaBaiThi" class="control-label">Mô tả bài thi</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MoTaBaiThi" placeholder="Mô tả bài thi"
                                        value="<?php echo $exam[1];?>" name="exam_description">
                                </td>
                            </tr>


                        </table>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="Manager/danhsachbaithi" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-info pull-right">Update</button>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
                <!-- Horizontal Form -->


                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border text-center">
                        <h3 class="box-title"><b style="color:#3c8dbc;">Danh sách câu hỏi.</b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <table class="table table-striped text-center">
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaBaiThi" class="control-label">Mã bài thi</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MaBaiThi" placeholder="Mã bài thi"
                                        value="<?php echo $exam[0];?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaGiaoVien" class="control-label">Mã giáo viên</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MaGiaoVien" placeholder="Mã giáo viên"
                                        value="<?php echo $exam[2];?>" readonly>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaThoiGian" class="control-label">Mã thời gian</label>
                                </th>
                                <td>
                                    <!-- <input type="text" class="form-control" id="MaThoiGian" placeholder="Mã thời gian"
                                        value="<?php echo $exam[4];?>" readonly> -->

                                    <select class="browser-default custom-select form-control" name="examTimeSelect">
                                        <?php $examTimes=$data["examTimes"]; 
                                                // print_r($roles);

                                                for ($index=0; $index < count($examTimes); $index++) { 
                                                    $row = $examTimes[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$exam[4] == $row[0]) echo "selected"; ?>><?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>

                                <th class="text-center col-sm-2">
                                    <label for="MaKhoi" class="control-label">Mã khối</label>
                                </th>
                                <td>

                                    <select class="browser-default custom-select form-control" name="gradeSelected">
                                        <?php $grades=$data["grades"]; 

                                                for ($index=0; $index < count($grades); $index++) { 
                                                    $row = $grades[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$row["id"] == $exam[3]) echo "selected";?>>
                                            <?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaMon" class="control-label">Mã môn</label>
                                </th>
                                <td>
                                    <select class="browser-default custom-select form-control" name="gradeSelected">
                                        <?php $subjects=$data["subjects"]; 

                                                for ($index=0; $index < count($subjects); $index++) { 
                                                    $row = $subjects[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"
                                            <?php if((int)$row["id"] == $exam[5]) echo "selected";?>>
                                            <?php echo $row[1];?>
                                        </option>

                                        <?php
                                            }
                                        ?>
                                    </select>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MoTaBaiThi" class="control-label">Mô tả bài thi</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MoTaBaiThi" placeholder="Mô tả bài thi"
                                        value="<?php echo $exam[1];?>" name="exam_description">
                                </td>
                            </tr>


                        </table>

                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="Manager/danhsachbaithi" class="btn btn-default">Cancel</a>
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