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
                <form class="form-horizontal" method="post">
                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title"><b style="color:#3c8dbc;"> Thêm bài thi. <b> </h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <table class="table table-striped text-center">
                            <!-- <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaGiaoVien" class="control-label">Mã giáo viên</label>
                                </th>
                                <td>
                                    <input type="text" class="form-control" id="MaGiaoVien" placeholder="Mã giáo viên"
                                        value="\" readonly>
                                </td>
                            </tr> -->
                            <tr>
                                <th class="text-center col-sm-2">
                                    <label for="MaThoiGian" class="control-label">Mã thời gian</label>
                                </th>
                                <td>
                                    <!-- <input type="text" class="form-control" id="MaThoiGian" placeholder="Mã thời gian"
                                        value="" readonly> -->

                                    <select class="browser-default custom-select form-control" name="examTimeSelect">
                                        <?php $examTimes=$data["examTimes"]; 
                                                // print_r($roles);

                                                for ($index=0; $index < count($examTimes); $index++) { 
                                                    $row = $examTimes[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>"><?php echo $row[1];?>
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

                                        <option value="<?php echo $row[0];?>">
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
                                    <select class="browser-default custom-select form-control" name="subjectSelected">
                                        <?php $subjects=$data["subjects"]; 

                                                for ($index=0; $index < count($subjects); $index++) { 
                                                    $row = $subjects[$index];
                                        ?>

                                        <option value="<?php echo $row[0];?>">
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
                                        value="" name="exam_description">
                                </td>
                            </tr>


                        </table>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <!-- <a href="Manager/danhsachbaithi">Cancel</button> -->
                            <button type="submit" class="btn btn-info pull-right" name="AddExam">Thêm</button>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                    <!-- Horizontal Form -->

                    <!-- Horizontal Form -->
                    <div class="box box-info">
                        <div class="box-header with-border text-center">
                            <h3 class="box-title"><b style="color:#3c8dbc;"> Câu hỏi của bài thi. <b> </h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="list-questions" id="list-questions">

                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a onclick="addQuestion();" class="btn btn-info" name="addQuestion">Thêm câu hỏi</a>
                        </div>
                        <!-- /.box-footer -->
										<input type="hidden" name="counter_questions" id="counter" value="">
                </form>
            </div>
            <!-- Horizontal Form -->

        </div>

</div>


</section>
<!-- /.content -->

</div>
<!-- /.content-wrapper -->

<script>
let counter = 0;

function addQuestion() {
    counter += 1;

    let blockHTML = `<div class="question pad">
                                <input type="text" name="nameQuestion_` + counter + `" class="form-control" value="` +
        counter + `. ">
                                <div class="col-xs-12 col-md-6 row pad">
                                    <input type="radio" name="answers_radio_` + counter + `" class="col-xs-1" value="1">
                                    <input type="text" class="w-75 form-control col-xs-11" name="_radio`+counter+`_1">
                                </div>
                                <div class="col-xs-12 col-md-6 row pad">
                                    <input type="radio" name="answers_radio_` + counter + `" class="col-xs-1" value="2">
                                    <input type="text" class="w-75 form-control col-xs-11" name="answers_`+counter+`_2">
                                </div>
                                <div class="col-xs-12 col-md-6 row pad">
                                    <input type="radio" name="answers_radio_` + counter + `" class="col-xs-1" value="3">
                                    <input type="text" class="w-75 form-control col-xs-11" name="answers_`+counter+`_3">
                                </div>
                                <div class="col-xs-12 col-md-6 row pad">
                                    <input type="radio" name="answers_radio_` + counter + `" class="col-xs-1" value="4">
                                    <input type="text" class="w-75 form-control col-xs-11" name="answers_`+counter+`_4">
                                </div>
                            </div>`;

		let block  = document.createElement("div");
		block.innerHTML = blockHTML;

    document.getElementById("list-questions").append(block);
    document.getElementById("counter").value = counter;
}
</script>

<style>
.w-75 {
    width: 80%;
    /* margin: 15px; */
}

.rounded {
    border-radius: 5px;
}

.pad {
    padding: 15px;
}
</style>