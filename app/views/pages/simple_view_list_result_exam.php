    <style>
    table {
      font-family: arial, sans-serif;
      border-collapse: collapse;
      width: 100%;
    }

    td, th {
      border: 1px solid #dddddd;
      text-align: left;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
    </style>
     <!-- Hero Section Begin -->
    <section style="padding:50px 0;" class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
    </section>
    <!-- Hero Section End -->

    <!-- Most Search Section Begin -->
    <section class="most-search spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Danh sách các bài thi đã tham gia</h2>  
                    </div>
                    <div class="col-lg-12" style="float:left">
                        <table>
                          <tr>
                            <th>Tên bài thi</th>
                            <th>Môn</th>
                            <th>Khối</th>
                            <th>Thời gian tham gia tham gia</th>
                            <th>Trạng thái</th>
                            
                            <th>Thao tác</th>
                          </tr>

                            <?php
                                while ($row = mysqli_fetch_array($data["allExamResultOfUser"])) {
                                    # code...
                                
                            ?>
                          <tr>
                            <td><?php echo $row["description"]; ?></td>
                            <td><?php echo $row["subject_name"]; ?></td>
                            <td><?php echo $row["grade_name"]; ?></td>

                            <td><?php echo $row["time_join"]; ?></td>
                            <td><?php echo ($row["is_completed"] == 1)?"<span style='color:green;'>Đã hoàn tất</span>":"<span style='color:red;'>Chưa hoàn tất</span>"; ?></td>

                            <td>
                              <?php if($row["is_completed"] == 1){ ?>
                                <a href='Examination/viewResultExam/<?php echo $row['id']; ?>'>Xem kết quả</a>
                              <?php }else{ ?>
                                <a href='Examination/doExam/<?php echo $row['id']; ?>'>Tiếp tục làm bài</a>
                              <?php } ?>

                            </td>
                          </tr>

                          <?php 
                            }
                          ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>