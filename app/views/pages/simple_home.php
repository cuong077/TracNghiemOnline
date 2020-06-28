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
    <section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>KHỐI</h2>
                    </div>
                    <div class="categories__item__list">
                        <a href="#">
                            <div class="categories__item">
                                <img src="public/simple/img/categories/cat-2.png" alt="">
                                <h5>Khối 10</h5>
                                <span>Hiển thị số bài thi ở đây nha</span>
                            </div>
                        </a>

                        <a href="#">
                            <div class="categories__item">
                                <img src="public/simple/img/categories/cat-2.png" alt="">
                                <h5>Khối 11</h5>
                                <span>Hiển thị số bài thi ở đây nha</span>
                            </div>
                        </a>

                        <a href="#">
                            <div class="categories__item">
                                <img src="public/simple/img/categories/cat-2.png" alt="">
                                <h5>Khối 12</h5>
                                <span>Hiển thị số bài thi ở đây nha</span>
                            </div>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Most Search Section Begin -->
    <section class="">
        <div class="container">
            <div class="row">
                <!-- <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Tất Cả Bài Thi</h2>
                    </div>
                </div> -->
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content">
                        <!-- Most Search Section Begin -->
                        <section class="most-search spad">
                            <div class="container">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-title">
                                            <h2>Danh sách các bài thi</h2>  
                                        </div>
                                        <div class="col-lg-12" style="float:left">
                                            <table style="">
                                              <tr>
                                                <th>ID</th>
                                                <th>Tên bài thi</th>
                                                <th>Thao tác</th>
                                              </tr>

                                                <?php
                                                    while ($row = mysqli_fetch_array($data["list_exam"])) {
                                                        # code...
                                                    
                                                ?>
                                              <tr>
                                                <td><?php echo $row["id"]; ?></td>
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
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <!-- <div class="row">
                                <div class="col-lg-4 col-md-6">
                                    <div class="listing__item">
                                        <div class="listing__item__pic set-bg" data-setbg="public/simple/img/listing/list-1.jpg">
                                           
                                        </div>
                                        <div class="listing__item__text">
                                            <div class="listing__item__text__inside">
                                                <h5>Hiển thị tên bài thi</h5>
                                               
                                                <ul>
                                                    <li>Khối:khối đây nha php</li>
                                                    <li>Tên GV</li>
                                                </ul>
                                            </div>
                                            <div class="listing__item__text__info">
                                                <div><button class="btn btn-primary" onclick="#">Mở bài thi</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                        
                
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Most Search Section End -->

    