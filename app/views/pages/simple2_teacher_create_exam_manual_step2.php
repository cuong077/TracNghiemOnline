
<div class="col-lg-11 col-md-10 col-sm-9 col-xs-8 bhoechie-tab bhoechie-tab-3">
    <!-- flight section -->
    <div class="bhoechie-tab-content bhoechie-tab-content-3 active" divsubjectid="1">
        <h2 style="margin-top: 0;color:#3F51B5; text-align: center;"><?php echo $data["subject_name"]." - ".$data["grade_name"]." - ".$data["exam_time_name"];  ?></h2>
        <h3 style="margin-top: 0;color:#55518a">Chương</h3>


        <?php if(count($data["chapters_and_lessons"]) <= 0){ ?>

        <p style="color: red;">Không tồn tại chương và bài học nào !</p>

        <?php }else{ ?>

        <ul class="ul-class" style="margin-left:-40px;">

            <?php 

                foreach ($data["chapters_and_lessons"] as $key_chapter => $chapters_and_lesson){

            ?>
            <li class="list-style-none"> <i id="i_<?php echo $key_chapter; ?>" class="c789icon chapter-input-3-1-icon glyphicon glyphicon-plus" onclick="iconClick('#i_<?php echo $key_chapter; ?>', '#li-chapter-<?php echo $key_chapter; ?>','#chapter_<?php echo $chapters_and_lesson->chapter_id; ?>')">&nbsp;</i>
                <span class="cpointer chapter-title" onclick="iconClick('#i_<?php echo $key_chapter; ?>', '#li-chapter-<?php echo $key_chapter; ?>', '#chapter_3_1_2')"><?php echo $chapters_and_lesson->chapter_name; ?></span>


                <input class="" style=""  max="100" type="checkbox" data-id="1" data-title="Mũ và Logarit" name="chapter_<?php echo $chapters_and_lesson->chapter_id; ?>" value="6">

            </li>


            <li class="list-style-none detail-region-css chapter-input-3-1-detail" style="display: none;" id="li-chapter-<?php echo $key_chapter; ?>">
                <ul class="ul-class" style="margin:6px;margin-left:0px;border: 1px solid #ccc; padding-bottom:2px;">

                    <li class="list-style-none">
                        <h3 style="margin-top: 0;color:#3F51B5; margin-bottom:0px;">Bài</h3>
                    </li>

                    <?php

                        foreach ($chapters_and_lesson->list_lesson as $key_lesson => $lesson) {
                    ?>

                    <li class="list-style-none"> <i id="i_1_6" class="c789icon glyphicon glyphicon-plus chapter-input-3-1-1-icon">&nbsp;</i>
                        <span class="cpointer lession-title"><?php echo $lesson->lesson_name; ?></span>
                        <input class="" style=""  type="checkbox" data-id="6" data-title="Tính đơn điệu của hàm số khi biết công thức f(x), f'(x)" name="lesson_3_1_1_6" id="lesson_3_1_1_6" value="0">

                    </li>

                    <?php

                        }

                    ?>


                </ul>
            </li>


            <?php
                }
            ?>
        </ul>

        <?php } ?>
        <button class="btn btn-primary cssPreview" type="button" onclick="generateQuestion('/Api/GenerateQuestionV2', '#classId','#subjectId','#chapterId','#lessionId','#questionRegion', '#ofme');">Tải câu hỏi</button>

        <button class="btn btn-primary cssPreview" type="button" onclick="generateQuestion('/Api/GenerateQuestionV2', '#classId','#subjectId','#chapterId','#lessionId','#questionRegion', '#ofme');">Tạo đề thi</button>


    </div>
</div>



<table>
    <tbody>
        <tr>
            <td class="td-q-l col-lg-6">
                <h4 style="width:100%; min-width:520px; margin-bottom:0px;">
                                        Tổng số câu tìm được: <span id="totalSearch">7</span> câu
                                        <a id="aViewMoreTruoc" href="javascript:void(0)" onclick="getMore(1);" class="btn btn-primary" style="display: none;"> &lt;&lt; Xem trước </a>
                                        <a id="aViewMore" href="javascript:void(0)" onclick="getMore(2);" class="btn btn-primary" style="display: none;"> &gt;&gt; Xem sau </a>
                                        
                                    </h4>
                <span style="color:green; font-style:italic">(Nhấp chuột chọn câu hỏi, câu sẽ được chuyển qua mục <strong>được chọn bên phải</strong>)</span>
                <span onclick="addAllLeftToRight()" style="color:green; font-weight:bold; cursor:pointer; float:right;">
                                        <i class="glyphicon glyphicon-arrow-right"></i> Chọn nhanh
                                    </span>
            </td>
            <td class="td-q-r col-lg-6" style="vertical-align:top">
                <h4 style="margin-bottom:0px;">
                                        Tổng số câu đã chọn: <span id="totalSelected">1</span> câu
                                        <a id="aPreviewHidden" href="localhost/TracNghiemOnline/Home/PreviewQuestion?ids=" class="btn btn-primary linkPoupUpCSS" style="display:none">Xem trước đề thi &gt;&gt; </a>
                                        <a id="aPreview" href="javascript:void(0)" onclick="preview();" class="btn btn-primary" style="display: none;">Xem trước đề thi &gt;&gt; </a>
                                    </h4>
                <span style="color:red; font-style:italic">(Nhấp chuột vào câu hỏi để loại bỏ câu đã chọn)</span>
                <span onclick="removeAllRight()" style="color:green; font-weight:bold; cursor:pointer;float:right;">
                                        <i class="glyphicon glyphicon-remove"></i> Xóa nhanh
                                    </span>
            </td>
        </tr>
        <tr>
            <td class="td-q-l col-lg-6">
                <ul id="questionRegion">
                    <li onclick="addQuestion(216)" class="li-question" id="li_216" data-id="216">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>(Hoang mạc Sahara) Theo kết quả của một trung tâm nghiện cứu về mức độ sa mạc hóa của hoang mạc Sahara cho biết mức độ sa mạc hóa của hoang mạc là một hàm phụ thuộc theo nhiệt độ môi trường:
                            <img class="equation-image" src="https://static.789.vn/eduquestion//201754282010781318/obj201754282010781318781318_images\obj201754282010781318781318_img1.png" alt="img1" width="252" height="43">.Giả sử nhiệt độ môi trường dao động từ 00C đến 500C. Hỏi nhiệt độ nào khiến mức độ sa mạc hóa lớn nhất ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>30.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>10.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>20.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>00.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;">
                        <a href="localhost/TracNghiemOnline/tao-de-thi.html?id=216" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>
                    <li onclick="addQuestion(442)" class="li-question" id="li_442" data-id="442">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>
                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175828324982529/obj20175828324982529141372_images\obj20175828324982529141372_img1.png" alt="img1" width="210" height="233">Khi sản xuất vỏ lon sữa bò hình trụ, các nhà thiết kế luôn đặt mục tiêu sao cho chi phí nguyên liệu làm vỏ lon là ít nhất, tức là diện tích toàn phần của hình trụ là nhỏ nhất. Muốn thể tích khối trụ đó bằng V và diện tích toàn phần phần hình trụ nhỏ nhất thì bán kính đáy R bằng: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>&nbsp;
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175828324982529/obj20175828324982529584348_images\obj20175828324982529584348_img1.png" alt="img1" width="87" height="63">.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>&nbsp;
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175828324982529/obj20175828324982529457374_images\obj20175828324982529457374_img1.png" alt="img1" width="76" height="63">.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>&nbsp;
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175828324982529/obj20175828324982529330400_images\obj20175828324982529330400_img1.png" alt="img1" width="87" height="63">.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>&nbsp;
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175828324982529/obj20175828324982529773377_images\obj20175828324982529773377_img1.png" alt="img1" width="76" height="63">.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;">
                        <a href="localhost/TracNghiemOnline/tao-de-thi.html?id=442" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>
                    <li onclick="addQuestion(576)" class="li-question" id="li_576" data-id="576">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>Một người gửi tiết kiệm 100 triệu đồng với lãi suất kép theo quý là 2% . Hỏi sau 2 năm người đó lấy lại được tổng là bao nhiêu tiền? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>17,1 triệu.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>16 triệu.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>117, 1 triệu.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>116 triệu.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;">
                        <a href="localhost/TracNghiemOnline/tao-de-thi.html?id=576" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>
                    <li onclick="addQuestion(643)" class="li-question" id="li_643" data-id="643">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>Một tên lửa bay vào không trung với quãng đường đi được quãng đường&nbsp;
                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175328440263976/obj20175328440263976533455_images\obj20175328440263976533455_img1.png" alt="img1" width="41" height="36">(km) là hàm phụ thuộc theo biến:</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>&nbsp;
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175328440263976/obj20175328440263976973496_images\obj20175328440263976973496_img1.png" alt="img1" width="33" height="28">(km/s).</p>
                                    </td>
                                    <td class="td-a">
                                        <p>
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175328440263976/obj20175328440263976895980_images\obj20175328440263976895980_img1.png" alt="img1" width="32" height="28">(km/s).</p>
                                    </td>
                                    <td class="td-a">
                                        <p>&nbsp;
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175328440263976/obj20175328440263976354087_images\obj20175328440263976354087_img1.png" alt="img1" width="33" height="28">(km/s).</p>
                                    </td>
                                    <td class="td-a">
                                        <p>
                                            <img class="equation-image" src="https://static.789.vn/eduquestion//20175328440263976/obj20175328440263976701082_images\obj20175328440263976701082_img1.png" alt="img1" width="43" height="28">(km/s).</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;">
                        <a href="localhost/TracNghiemOnline/tao-de-thi.html?id=643" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>
                    <li onclick="addQuestion(644)" class="li-question" id="li_644" data-id="644">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>Một người gửi tiết kiệm 100 triệu đồng với lãi suất kép theo quý là 2% . Hỏi sau 2 năm người đó lấy lại được tổng là bao nhiêu tiền? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>17,1 triệu.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>16 triệu.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>117, 1 triệu.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>116 triệu.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;">
                        <a href="localhost/TracNghiemOnline/tao-de-thi.html?id=644" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>
                    <li onclick="addQuestion(692)" class="li-question" id="li_692" data-id="692">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>Một cây tre sau mỗi năm nó cao hơn 5% so với năm trước. Giả sử khi nó sống được 3 năm thì nó cao 3,7m. Hỏi sau 5 năm thì nó cao bao nhiêu m? (làm tròn đến số thập phân thứ hai).&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>4,05m.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>4,06m.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>4,09m.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>4,08m.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;">
                        <a href="localhost/TracNghiemOnline/tao-de-thi.html?id=692" target="_blank"> <i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a>
                    </li>
                    <li onclick="addQuestion(731)" class="li-question" id="li_731" data-id="731">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>Một tấm bìa hình vuông, người ta cắt bỏ ở mỗi góc của tấm bìa một hình vuông có cạnh bằng&nbsp;
                            <img class="equation-image" src="https://static.789.vn/eduquestion//20172028570659055/obj20172028570659055513615_images\obj20172028570659055513615_img1.png" alt="img1" width="49" height="25">&nbsp;rồi gấp lại thanhg một hình hộp chữ nhật không nắp. Nếu dung tích của hộp bằng&nbsp;
                            <img class="equation-image" src="https://static.789.vn/eduquestion//20172028570659055/obj20172028570659055513615_images\obj20172028570659055513615_img2.png" alt="img2" width="80" height="28">thì cạnh của tấm bìa có độ dài là: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>38&nbsp;cm.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>36&nbsp;cm.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>44&nbsp;cm.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>42 cm.&nbsp;&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                    <li style="text-align: right;"></li>
                </ul>
            </td>
            <td class="td-q-r col-lg-6" style="vertical-align:top">
                <ul id="questionRegionSelected">
                    <li onclick="removeQuestion(216)" class="li-question" id="li_selected_216">
                        <input type="hidden" id="q_216" name="questions[]" value="216" class="SelectedQuestionCSS">
                        <h4>Lớp 12 &gt; Toán &gt; Bài toán thực tế &gt; Bài toán thực tế </h4>
                        <p>(Hoang mạc Sahara) Theo kết quả của một trung tâm nghiện cứu về mức độ sa mạc hóa của hoang mạc Sahara cho biết mức độ sa mạc hóa của hoang mạc là một hàm phụ thuộc theo nhiệt độ môi trường:
                            <img class="equation-image" src="https://static.789.vn/eduquestion//201754282010781318/obj201754282010781318781318_images\obj201754282010781318781318_img1.png" alt="img1" width="252" height="43">.Giả sử nhiệt độ môi trường dao động từ 00C đến 500C. Hỏi nhiệt độ nào khiến mức độ sa mạc hóa lớn nhất ? &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                        <br>
                        <table class="table table-bordered table-responsive">
                            <tbody>
                                <tr>
                                    <td class="td-a">
                                        <p>30.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>10.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>20.</p>
                                    </td>
                                    <td class="td-a">
                                        <p>00.</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </li>
                </ul>
            </td>
        </tr>
    </tbody>
</table>


<script>
        String.prototype.trimEnd = function(c) {
            if (this.length == 0) return this;
    
            c = c ? c : ' ';
            var i = this.length - 1;
            for (; i >= 0 && this.charAt(i) == c; i--);
            return this.substring(0, i + 1);
        }
        function empty(input) {
            return input == '' || input == undefined || input == null;
        }
        function preview()
        {
            var url = 'localhost/TracNghiemOnline/Home/PreviewQuestion?ids=';
            var ids = '';
            $('.SelectedQuestionCSS').each(function(){
                ids += $(this).val() + ',';
            });
            ids.trimEnd(',');
            url += ids;
            $('#aPreviewHidden').attr('href',url);
            $('#aPreviewHidden').click();
        }
        var currentPage = 1;
        var numOfPage = 0;
        var totalRecords = 0;
        var pageSize = 50;
    
        function getMore(idx)
        {
            if (idx == 1) {
                currentPage = currentPage - 1;
            } else {
                currentPage = currentPage + 1;
            }
    
            if (currentPage > 1) {
                $('#aViewMoreTruoc').show();
            } else {
                $('#aViewMoreTruoc').hide();
            }
            generateQuestion('localhost/TracNghiemOnline/Api/GenerateQuestionV2', '#classId', '#subjectId', '#chapterId', '#lessionId', '#questionRegion', '#ofme');
    
            if (currentPage >= numOfPage) {
                $('#aViewMore').hide();
                return;
            }
        }
    
        function generateQuestion(url, jClassId, jSubjectId, jChapterId, jLessionId, jId, jOfmeId) {
            var classId = $(jClassId).val();
            var subjectId = $(jSubjectId).val();
            var chapterId = $(jChapterId).val();
            var lessionId = $(jLessionId).val();
            var ofme = $(jOfmeId).val();
    
            var classTitle = $(jClassId + ' option:selected').text();
            var subjectTitle = $(jSubjectId + ' option:selected').text();
            var chapterTitle = $(jChapterId + ' option:selected').text();
            var lessionTitle = $(jLessionId + ' option:selected').text();
            var title = `${classTitle} > ${subjectTitle} > ${chapterTitle} > ${lessionTitle}`;
            if (empty(classId)) {
                showAlert({ 'content': 'Chức năng đang phát triển', callBack: function () { $(jClassId).focus(); } });
                $(jClassId).focus();
                return;
            }
            if (empty(subjectId)) {
                showAlert({ 'content': 'Quý Thầy cô vui lòng chọn môn học', callBack: function () { $(jSubjectId).focus(); } });
                $(jSubjectId).focus();
                return;
            }
            if (empty(chapterId)) {
                showAlert({ 'content': 'Quý Thầy cô vui lòng chương', callBack: function () { $(jChapterId).focus(); } });
                $(jChapterId).focus();
                return;
            }
            if (empty(lessionId)) {
                showAlert({ 'content': 'Quý Thầy cô vui lòng bài', callBack: function () { $(jLessionId).focus(); } });
                $(jLessionId).focus();
                return;
            }
            var params = {
                classId: classId,
                subjectId: subjectId,
                chapterId: chapterId,
                lessionId: lessionId,
                ofme: ofme,
                pageIndex:currentPage
            };
    
            $.post(url, params, function (datas) {
    
                var jItems = datas.data;
                var html = '';
                if (datas.RC == 1) {
    
                    currentPage = parseInt(datas.currentPage);
                    numOfPage = parseInt(datas.numOfPage);
                    totalRecords = parseInt(datas.totalRecords);
                    pageSize = parseInt(datas.pageSize);
    
                    if (totalRecords >= pageSize) {
                        $('#aViewMore').show();
                    } else {
                        $('#aViewMore').hide();
                    }
                    if (currentPage >= numOfPage) {
                        $('#aViewMore').hide();
                    }
    
                    $('#totalSearch').html(totalRecords);
                    for (i = 0; i < jItems.length; i++) {
                        var jItem = jItems[i];
                        var tbl = '<table class="table table-bordered table-responsive">';
                        tbl += '<tr>';
                        tbl += '<td class="td-a">' + jItem.A1.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A2.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A3.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A4.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '</tr>';
                        tbl += '</table>';
    
                        html += '<li onclick="addQuestion(' + jItem.Id + ')" class="li-question" id="li_' + jItem.Id + '" data-id="' + jItem.Id + '"><h4>' + title + ' </h4>' + jItem.Content.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '<br>' + tbl + '</li>';
                        html += '<li style="text-align: right;"><a href="localhost/TracNghiemOnline/tao-de-thi.html?id=' + jItem.Id + '" target="_blank"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a></li>';
    
                    }
    
                    $(jId).html(html);
    
                    refreshMathType();
    
                } else {
                    showAlert({ 'content': datas.RD });
                }
    
                //showAlert({ 'content': html });
            });
    
        }
        function generateQuestionForEdit(url, id, jId) {
    
            if (empty(id)) {
                showAlert({ 'content': 'Dữ liệu không hợp lệ', callBack: function () { $(jClassId).focus(); } });
                $(jClassId).focus();
                return;
            }
    
            var classTitle = $('#classId option:selected').text();
            var subjectTitle = $('#subjectId option:selected').text();
            var title = `${classTitle} > ${subjectTitle}`;
    
            var params = {
                id: id
            };
    
            $.post(url, params, function (datas) {
    
                var jItems = datas.data;
                var html = '';
                if (datas.RC == 1) {
                    $('#totalSearch').html(jItems.length);
                    for (i = 0; i < jItems.length; i++) {
                        var jItem = jItems[i];
                        var tbl = '<table class="table table-bordered table-responsive">';
                        tbl += '<tr>';
                        tbl += '<td class="td-a">' + jItem.A1.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A2.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A3.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '<td class="td-a">' + jItem.A4.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '</td>';
                        tbl += '</tr>';
                        
                        tbl += '</table>';
    
                        html += '<li onclick="addQuestion(' + jItem.Id + ')" class="li-question" id="li_' + jItem.Id + '" data-id="' + jItem.Id + '"><h4>' + title + ' </h4>' + jItem.Content.replace(new RegExp("www. w3. org/1998/Math/MathML", "g"), "www.w3.org/1998/Math/MathML") + '<br>' + tbl + '</li>';
                        html += '<li style="text-align: right;"><a href="localhost/TracNghiemOnline/tao-de-thi.html?id=' + jItem.Id + '" target="_blank"><i class="glyphicon glyphicon-edit"></i> Chỉnh sửa</a></li>';
                    }
    
                    $(jId).html(html);
                    for (i = 0; i < jItems.length; i++) {
                        var jItem = jItems[i];
                        addQuestion(jItem.Id);
                    }
    
                    refreshMathType();
    
                } else {
                    showAlert({ 'content': datas.RD });
                }
    
                //showAlert({ 'content': html });
            });
        }
        function refreshMathType() {
            var scriptMathJax = document.createElement('script');
            scriptMathJax.src = 'https://cdn.789.vn/Content/MathJax/MathJax.js?config=TeX-MML-AM_CHTML-full';
            //scriptMathJax.src = 'localhost/TracNghiemOnline/Content/MathJax/MathJax.js?config=TeX-MML-AM_CHTML-full';
            document.body.appendChild(scriptMathJax);
    
            var mathRefresh = document.getElementById("questionRegion");
            MathJax.Hub.Queue(["Typeset", MathJax.Hub, mathRefresh]);
        }
        var totalQuestion = 0;
        function addQuestion(id) {
            var item = $('#q_' + id).val();
            if (!empty(item)) {
                showAlert({ 'content': 'Câu này đã được chọn, Thầy cô vui lòng chọn câu khác!' });
                return;
            }
            var examNumOfQuestion = $('#examNumOfQuestion').val();
            if (totalQuestion >= examNumOfQuestion) {
                showAlert({ 'content': `Tổng số câu đã chọn ${totalQuestion} = tổng số câu của bài thi ${examNumOfQuestion}<br>Để chọn câu này, Thầy cô vui lòng bỏ chọn các câu đã chọn, hoặc thêm tổng câu hỏi cho đề thi`, callBack: function () { $('#examNumOfQuestion').focus(); } });
                $('#examNumOfQuestion').focus();
                return;
            }
            var html = $('#li_' + id).html();
            var hidden = `<input type="hidden" id="q_${id}" name="questions[]" value="${id}" class="SelectedQuestionCSS">`;
            var li = `<li onclick="removeQuestion(${id})" class="li-question" id="li_selected_${id}">${hidden}${html}</li>`;
            $('#questionRegionSelected').append(li);
            totalQuestion++;
            $('#totalSelected').html(totalQuestion);
            $('#li_' + id).addClass('q-selected');
    
            //$('#classId').prop("disabled", true);
            //$('#subjectId').prop("disabled", true);
            //$('#ofme').prop("ofme", true);
            ennableSave();
        }
        function removeQuestion(id) {
            $('#li_' + id).removeClass('q-selected');
            $('#li_selected_' + id).remove();
            totalQuestion--;
            $('#totalSelected').html(totalQuestion);
            ennableSave();
        }
        function getChapter(url, class_id, subject_id, jId) {
            if (empty(subject_id) || subject_id <= 0 || empty(class_id) || class_id <= 0) {
                //alert('Dữ liệu không hợp lệ: ' + subject_id + '-' + class_id);
                return;
            }
            var uid = 0;
            var ofme = $('#ofme').val();
            if(ofme == 1)
            {
                uid = 220762;
            }
            var params = {
                action: 'chapter',
                class_id: class_id,
                subject_id: subject_id,
                uid:uid
            };
            $.post(url, params, function (datas) {
                $(jId).html(datas.HTML);
                currentPage = 1;
                numOfPage = 0;
                totalRecords = 0;
                pageSize = 50;
                if(220762 != 37153)
                {
                    $("#chapterId option[value='167']").remove();
                }
            });
        }
        function getLesson(url, chapter_id, jId) {
            if (empty(chapter_id) || chapter_id <= 0) {
                //showAlert({ content: 'Dữ liệu không hợp lệ' });
                return;
            }
            var uid = 0;
            var ofme = $('#ofme').val();
            if(ofme == 1)
            {
                uid = 220762;
            }
            var params = {
                action: 'lesson',
                chapter_id: chapter_id,
                uid:uid
            };
            $.post(url, params, function (datas) {
                $(jId).html(datas.HTML);
                currentPage = 1;
                numOfPage = 0;
                totalRecords = 0;
                pageSize = 50;
            });
        }
        function reset1()
        {
            $('#classId').val('');
            $('#subjectId').val('');
        }
        function addAllLeftToRight()
        {
            totalQuestion = 0;
            removeAllRight();
            var examNumOfQuestion = $('#examNumOfQuestion').val();
            var index = 1;
            $('#questionRegion li').each(function () {
                var id = $(this).attr('data-id');
                if (id != undefined)
                {
                    var item = $('#q_' + id).val();
                    if (empty(item)) {
                        if (index > examNumOfQuestion) {
                            return;
                        } else {
                            totalQuestion = index;
                            var html = $('#li_' + id).html();
                            var hidden = `<input type="hidden" id="q_${id}" name="questions[]" value="${id}" class="SelectedQuestionCSS">`;
                            var li = `<li onclick="removeQuestion(${id})" class="li-question" id="li_selected_${id}">${hidden}${html}</li>`;
                            $('#questionRegionSelected').append(li);
                            $('#totalSelected').html(totalQuestion);
                            $('#li_' + id).addClass('q-selected');
                            ennableSave();
                            index++;
                        }
                    }
                }
            });
        }
        function removeAllRight()
        {
            totalQuestion = 0;
            $('#totalSelected').html(totalQuestion);
            $('#questionRegionSelected').html('');
            $('#questionRegion li').removeClass('q-selected');
            ennableSave();
        }
</script>


<script language="javascript">
    $(document).ready(function () {
                        $("#btnLoginQuickLogin").fancybox({
                            maxWidth: 800,
                            maxHeight: 600,
                            fitToView: false,
                            width: '300px',
                            height: '450px',
                            autoSize: true,
                            //closeClick: false,
                            openEffect: 'none',
                            //closeEffect: 'none',
                            'transitionIn': 'elastic',
                            'transitionOut': 'elastic',
                            'speedIn': 600,
                            'speedOut': 200,
                            'overlayShow': false,
                            modal: false,
                            'type': 'iframe',
                            'scrolling': 'no',
                            'iframe': {
                                scrolling: 'no',
                                preload: true
                            }
                        });
                        $(this).bind("contextmenu", function (e) {
                            e.preventDefault();
                        });
            
                        //$(".fancybox").fancybox();
                        //setup for meta data
                        $("a.linkPoupUpCSS").fancybox({
                            'width': "95%",
                            'autoSize': false,
                            'height': 780,
                            'hideOnContentClick': false,
                            'type': 'iframe'
                        });
            
                        $(window).scroll(function (event) {
                            var scrol = $(this).scrollTop();
                            if (scrol > 50) {
                                $(".btn-top").show();
                            }
                            else {
                                $(".btn-top").hide();
                            }
                        }).trigger('scroll');
            
                        $(".btn-top").click(function () {
                            $("html, body").animate({ scrollTop: 0 });
                            return false;
                        });
            
                    });
</script>

<script type="text/javascript">
            $(document).ready(function () {
                $('#aViewMoreTruoc').hide();
                $('#aViewMore').hide();
                $('#aPreview').hide();
                startValidate();
                $('#btnTopSave').prop('disabled', true);
                if(0 > 0)
                {
                    //$('#classId').prop("disabled", true);
                    //$('#subjectId').prop("disabled", true);
                    //$('#ofme').prop("disabled", true);
                    //getChapter('localhost/TracNghiemOnline/Api/GetSelectOption', $('#subjectId').val(), '#chapterId');
                    //$('#subjectId').val(0);
                    getChapter('localhost/TracNghiemOnline/Api/GetSelectOption', $('#classId').val(), $('#subjectId').val(), '#chapterId');
                    generateQuestionForEdit('localhost/TracNghiemOnline/Api/GenerateQuestionV2ForEdit', 0, '#questionRegion');
                }
            });
            function ennableSave()
            {
                var examNumOfQuestion = $('#examNumOfQuestion').val();
                if (totalQuestion == parseInt(examNumOfQuestion))
                {
                    $('#btnTopSave').prop('disabled', false);
                    $('#aPreview').show();
                } else {
                    $('#btnTopSave').prop('disabled', true);
                    $('#aPreview').hide();
                }
            }
            function postForm() {
                var title = $('#title').val();
                var examNumOfQuestion = $('#examNumOfQuestion').val();
                var durationOfTime = $('#durationOfTime').val();
                var classId = $('#classId').val();
                var subjectId = $('#subjectId').val();
                var chapterId = $('#chapterId').val();
        
                if (empty(title)) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng nhập tên để sử dụng cho lần sau<br>Ví dụ: Đề thi thử 45 phút, lớp 12, môn toán, 30 câu', callBack: function () { $('#title').focus(); } });
                    $('#title').focus();
                    return false;
                }
                if (empty(examNumOfQuestion) || parseInt(examNumOfQuestion) <= 0 || parseInt(examNumOfQuestion) > 60) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng nhập số tổng câu của đề > 0 và <= 60 câu', callBack: function () { $('#examNumOfQuestion').focus(); } });
                    $('#examNumOfQuestion').focus();
                    return false;
                }
                if (empty(durationOfTime) || parseFloat(durationOfTime) <= 0) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng nhập thời lượng làm bài', callBack: function () { $('#durationOfTime').focus(); } });
                    $('#durationOfTime').focus();
                    return false;
                }
                if (empty(classId)) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng chọn lớp học', callBack: function () { $('#classId').focus(); } });
                    $('#classId').focus();
                    return false;
                }
                if (empty(subjectId)) {
                    showAlert({ 'content': 'Quý Thầy cô vui lòng chọn môn học', callBack: function () { $('#subjectId').focus(); } });
                    $('#subjectId').focus();
                    return false;
                }
                if (totalQuestion < examNumOfQuestion) {
                    showAlert({ 'content': `Tổng số câu đã chọn ${totalQuestion} < tổng số câu của bài thi ${examNumOfQuestion}`, callBack: function () { $('#examNumOfQuestion').focus(); } });
                    $('#examNumOfQuestion').focus();
                    return false;
                }
                showAlert({
                    'content': 'Giáo viên vui lòng kiểm tra các câu hỏi trước khi lưu đề thi. Để đảm bảo đề thi không có sai sót, giáo viên hãy đóng vai là học sinh <a href="localhost/TracNghiemOnline/lop-hoc-da-tham-gia.html" target="_blank">để làm bài</a>',
                    ok: 'Lưu đề thi',
                    callBack: function () { approveSaveExam(); }
                });
        
            }
            function approveSaveExam() {
                $.fancybox.close();
                $("#frmMain").submit();
            }
            function startValidate() {
                $("#frmMain").validate({
                    rules: {
                        title: { required: true },
                        examNumOfQuestion: { required: true },
                        durationOfTime: { required: true },
                        ofme: { required: true },
                        classId: { required: true },
                        subjectId: { required: true },
                        //chapterId: { required: true },
                        //lessionId: { required: true }
                    },
                    messages: {
                        title: "*",
                        examNumOfQuestion: "*",
                        durationOfTime: "*",
                        ofme: "*",
                        classId: "*",
                        subjectId: "*",
                        //chapterId: "*",
                        //lessionId: "*"
                    },
                    errorPlacement: function () {
                        return true;  // suppresses error message text
                    }
                });
            }
            function disable(value)
            {
                $('#classId').prop("disabled", value);
                $('#subjectId').prop("disabled", value);
                $('#ofme').prop("disabled", value);
            }
</script>

<style>
    .required {
        color: red;
    }

    td {
        padding-top: 3px;
    }

    .TDCaption {
        text-align: right;
        padding-right: 10px;
    }

    .td-q-l {
        max-width: 570px !important;
    }

    .td-q-r {
    }

    .li-question {
        margin: 2px;
        border: 1px solid #c7c4c4;
        padding: 5px;
        border-radius: 5px;
        cursor: pointer;
    }

    #questionRegion {
        list-style: none;
        padding: 0px;
        margin: 0px;
        height: 600px;
        overflow-y: scroll;
        overflow-x: no-display;
        max-width: 570px !important;
    }

    #questionRegionSelected {
        list-style: none;
        padding: 0px;
        margin: 0px;
        height: 600px;
        overflow-y: scroll;
        overflow-x: no-display;
    }

    .q-selected {
        border: 1px solid #ff0000;
    }
</style>