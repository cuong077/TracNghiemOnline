<?php $subjects=$data["subjects"] ?>
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
                      
                        <h3 class="box-title"><b style="color:#3c8dbc;">Danh sách môn học </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div style="padding:15px;">
                        <div>
                            <table class="table table-striped custab text-center">
                                <thead>
                                    <tr>
                                        <!-- <th>Mã môn</th> -->
                                        <th>Tên môn</th>
                                        <th>Khối lớp học</th>
                                        <th>Mô tả</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <?php
                                      for ($index=0; $index < count($subjects); $index++) { 
                                        # code...
                                        $row = $subjects[$index];
                                ?>
                                <tr>
                                    <!-- <td></td> -->
                                    <td><?php echo $row[1];?></td>
                                    <td><?php echo($row[2]);?></td>
                                    <td><?php echo($row[3]);?></td>
                                    
                                    <td class="text-center">

                                        <a class='btn btn-info btn-xs' href="Manager/EditSubject/<?php echo $row[0];?>"><span
                                                class="glyphicon glyphicon-edit"></span> Sửa</a>
                                        <a href="Manager/HiddenSubject/<?php echo $row[0];?>" class="btn btn-danger btn-xs"><span
                                                class="glyphicon glyphicon-remove"></span> Ẩn</a>
                                        <a href="Manager/DeleteSubject/<?php echo $row[0];?>" class="btn btn-danger btn-xs"><span
                                                class="glyphicon glyphicon-remove"></span> Xóa</a></td>
                                        
                                </tr>
                                <?php }?>
                                                                
                            </table>
                        </div>
<!--                     
                        <div class="text-center padding-bottom-xs">
                            <a  style="height:40px;" class="text-center btn btn-success btn-xs" href="Manager/EditSubject/<?php echo $row[0];?>"><span
                                                    class="glyphicon glyphicon-plus"></span> Thêm môn học</a>
                        </div>
                         -->
                    
                    </div>

                </div>

            </div>
        </div>
        <a id="button">
            
        </a>

    </section>
</div>
