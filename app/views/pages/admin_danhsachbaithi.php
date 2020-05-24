<?php $exams=$data["exams"];
  // print_r($exams);
?>
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

                        <h3 class="box-title"><b style="color:#3c8dbc;">Danh sách bài thi </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div>
                        <div>
                            <table class="table table-striped custab text-center">
                                <thead>
                                    <tr>
                                        <th>Mã bài thi</th>
                                        <th>Bài thi</th>
                                        <th>Giáo viên</th>
                                        <th>Khối lớp</th>
                                        <th>Thời gian</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                       for ($index=0; $index < count($exams); $index++) { 
                                        # code...
                                        $row = $exams[$index];
                                    ?>
                                    <tr>
                                        <td><?php echo $row[0];?></td>
                                        <td><?php echo $row[1];?></td>
                                        <td><?php echo $row[2];?></td>
                                        <td><?php echo $row[3];?></td>
                                        <td><?php echo $row[4];?></td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-xs"
                                                href="Manager/suabaithi/<?php echo $row[0];?>">
                                                <span class="glyphicon glyphicon-edit"></span>
                                                Sửa</a>
                                            <a href="#" class="btn btn-danger btn-xs"><span
                                                    class="glyphicon glyphicon-remove"></span>Xóa</a></td>
                                    </tr>
                                    <?php }?>
                                </tbody>

                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->