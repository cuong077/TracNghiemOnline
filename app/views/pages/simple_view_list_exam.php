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
    <section class="hero set-bg" data-setbg="public/simple/img/hero/about.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="hero__text">
                        <div class="section-title">
                            <h2>Hệ thống thi trắc nghiệm trực tuyến</h2>
                            <p>TracNgiemOnline</p>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
   
    <!-- Categories Section End -->

    <!-- Most Search Section Begin -->
    <section class="most-search spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Danh sách các bài thi</h2>  
                    </div>
                    <div class="col-lg-12" style="float:left">
                        <table>
                          <tr>
                            <th>Tên bài thi</th>
                            <th>Thao tác</th>
                          </tr>

                            <?php
                                while ($row = mysqli_fetch_array($data["list_exam"])) {
                                    # code...
                                
                            ?>
                          <tr>
                            <td><?php echo $row["description"]; ?></td>
                            <td><a href='Examination/viewExam/<?php echo $row['id']; ?>'>Xem</a></td>
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