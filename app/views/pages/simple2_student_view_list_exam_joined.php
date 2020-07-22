<section id=" text-center" style="margin-bottom:20px;">
        <div class="text-center">

            <h2 class="pageTitle" style="">Lịch sử thi</h2>
        </div>
    </section>

<div class="row">
	<div class="col-md-12">
        				<style type="text/css">
        					
        					#result_table tr th,#result_table tr td{
        						text-align: center; vertical-align: middle;
        					}

        				</style>
        	
                        <table id="result_table" class="table table-bordered table-responsive">
                            <thead>
                                <tr>
                                	<th>STT</th>
                                    <th>Tên bài thi</th>
                                    <th>Lớp</th>
                                    <th>Ngày tham gia</th>
                                    <th>Thời gian</th>
                                    <th>Điểm</th>
                                    <th>Thao tác</th>
                                    <th>Tình trạng bài làm</th>
                                </tr>
                            </thead>
                            <tbody>

                            	<?php 

                            		foreach ($data["list_result"] as $stt => $result){
                            		
                            	?>

								<tr>
									<td><?php echo $stt + 1; ?></td>
                                    <td><?php echo $result->exam_name; ?></td>
                                    <td><?php echo $result->class_name; ?></td>
                                    <td><?php echo $result->time_join; ?></td>
                                    <td><?php echo $result->time_name; ?></td>
                                    <td><?php echo $result->score; ?></td>
                                    <td>
                                        <?php if(!$result->is_completed){ ?>
                                            <a href="<?php echo Config::$base_url; ?>Student/doExam/<?php echo $result->result_id; ?>" class="btn btn-primary btn-md" style="margin-bottom:5px;">Thi tiếp</a>
                                        <?php }else{ ?>
                                    	<a href="<?php echo Config::$base_url; ?>Student/viewExamResult/<?php echo $result->result_id; ?>" class="btn btn-primary btn-md" style="margin-bottom:5px;">Xem kết quả</a>
                                        <?php } ?>
                                    </td>
                                    <td><?php echo (($result->is_completed)?"<span style='color:green;'>Đã hoàn thành</span>":"<span style='color:red;'>Chưa hoàn thành</span>"); ?></td>
                                    
								</tr>

								<?php } ?>
                            </tbody>
                        </table>
                    </div>
</div>