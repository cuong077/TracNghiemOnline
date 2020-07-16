<?php $error = $data["error"];print_r($error);?>
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
                        <h3 class="box-title"><b style="color:#3c8dbc;">Thêm chương học </b></h3>
                    </div>
                    <!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post">
                        <div class="box-body">

                            <!-- select grade, subject -->
                            <div class="form-group">
                                <label for="grade" class="col-sm-2 control-label">Khối lớp học</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-10 browser-default custom-select form-control" id="gradeSelect"
                                        name="gradeSelect">
                                        <!-- <option>Danh sách quyền</option> -->
                                        <?php $grades = $data["grades"] ;
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


                            <div class="form-group">
                                <label for="grade" class="col-sm-2 control-label">Môn học</label>
                                <div class="col-sm-10">
                                    <select class="col-sm-10 browser-default custom-select form-control" id="subjectSelect"
                                        name="subjectSelect">
                                    </select>
                                </div>

                            </div>

                            <!-- infor chapter -->
                            <div class="form-group">
                                <label for="chapterName" class="col-sm-2 control-label">Tên chương</label>
                                <div class="col-sm-10 text-center  <?php if($error["chapterName"] != "") echo "has-error"; ?>">
                                    <input type="text" class="form-control" placeholder="Tên chương"
                                        name="chapterName">
                                    <?php if(@$error["chapterName"] != ""){ ?>
                                        <span class="help-block"><?php echo @$error["chapterName"]?></span>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="chapterDescription" class="col-sm-2 control-label">Mô tả chương học</label>
                                <div class="col-sm-10 text-center <?php if($error["chapterDescription"] != "") echo "has-error"; ?>" >
                                    <input type="text" class="form-control" id="chapterDescription" placeholder="Mô tả môn học."
                                        name="chapterDescription">
                                    <?php if(@$error["chapterDescription"] != ""){ ?>
                                        <span class="help-block">Vui lòng nhập mô tả môn học.</span>
                                    <?php } ?>
                                </div>
                            </div>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="Manager/ListChapters" class="btn btn-default">Quay lại</a>
                            <button type="submit" class="btn btn-info pull-right" name="addChapter">Thêm</button>
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
<script>
    let gradeSelect = document.getElementById('gradeSelect');
    gradeSelect.addEventListener('change', function() {
        let gradeId = gradeSelect.value;
        console.log(gradeId);
        $.ajax({
            url: 'Manager/GetListSubjectWithAjax/' + gradeId,
            type: 'GET',
            dataType: "text",
            success: function(res){
                let subjects = JSON.parse(res);
                let arr = "";
                // console.log(res);
                if(subjects.length > 0){
                    for(let index=0; index< subjects.length; index++){
                        let template = `
                        <option value="`+subjects[index]["Id"]+`">`+subjects[index]["Name"]+`</option>
                        `;
                        arr += template;
                    }

                    let subjectSelect = document.getElementById("subjectSelect");
                }
                else{
                    arr += `<option>None</option>`;
                }
                
                subjectSelect.innerHTML = arr;
            },
            error: function(){

            }
        })
    }, false);
</script>
