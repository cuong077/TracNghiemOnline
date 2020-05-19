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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Tất cả môn </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <div>
                        <div>
                            <table class="table table-striped custab text-center">
                                <thead>
                                    <tr>
                                        <th>Mã môn</th>
                                        <th>Tên môn</th>
                                        <th>Hành động</th>
                                    </tr>
                                </thead>
                                <?php
                                      for ($index=0; $index < count($subjects); $index++) { 
                                        # code...
                                        $row = $subjects[$index];
                                  ?>

                                <tr>
                                    <td><?php echo $row[0];?></td>
                                    <td><?php echo $row[1];?></td>

                                    <td class="text-center">
                                        <a class='btn btn-success btn-xs' href="Manager/themmon"><span
                                                class="glyphicon glyphicon-plus"></span> Add</a>
                                        <a class='btn btn-info btn-xs' href="Manager/suamon/<?php echo $row[0];?>"><span
                                                class="glyphicon glyphicon-edit"></span> Edit</a>
                                        <a href="#" class="btn btn-danger btn-xs"><span
                                                class="glyphicon glyphicon-remove"></span> Del</a></td>
                                </tr>
                                <?php }?>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>
</div>