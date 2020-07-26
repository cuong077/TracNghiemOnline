<?php echo (int)$data["perUpperAvg"];?>
<div id="wrapper" class="menu-wrapper">
    <!-- start header -->
    <style>
    .ban-tin-789 {
        background-color: #212121;
    }
    </style>

    <section id=" text-center" style="margin-bottom:20px;">
        <div class="text-center">

            <h2 class="pageTitle" style="">Thống kê bài thi</h2>
        </div>
    </section>


    <div class="row">
        <canvas id="lineScores" style="width:400px;"></canvas>
        <!-- <canvas ></canvas> -->
        <div class="row">
        <div class="chart-container" style="height:400px; width:400px;">
            <canvas id="pieScores"></canvas>
        </div>
        <div class="col-sm-6">
        <h3>Điểm trung bình bài thi là: <?php echo $data["avgScore"];?></h3>
        </div>
        
        </div>
    </div>
</div>


<style>
.li-classexam {
    border-bottom: 1px solid #ccc;
    list-style: none;
}

.td-task1 {
    width: 40%;
}

.td-task2 {
    width: 20%;
}

.td-task3 {
    width: 20%;
}

.td-task4 {
    width: 10%;
    text-align: center;
}

.td-task5 {
    width: 20%;
    text-align: center;
}

.spanClassName {
    font-weight: bold;
}

.form-controll {
    margin: 3px;
}

.save-parent-message-css {
    margin-bottom: 20px;
    font-size: 14px;
    font-weight: bold;
}

.dateCSS {
    display: inline-block;
    width: 50%;
}

.timeCSS {
    display: inline-block;
    width: 30%;
    cursor: pointer !important;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script language="javascript">
$(document).ready(function() {
    let ctx = $("#lineScores");
    let dataJson = <?php echo $data["scores"]; ?>;

    // console.log(dataJson);

    let lineChart = new Chart(ctx, {
        type: "line",
        data: {
            // labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
            // label: "test",
            datasets: [{
                label: 'Điểm đạt được',
                backgroundColor: '#1a9ade',
                borderColor: '#1a9ade',
                data: dataJson,
                // data: [3,10,7,1,7,1,6],
                fill: false
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        max: 10,
                        min: 0,
                        stepSize: 1
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Tổng điểm'
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Điểm học sinh tham gia'
                    }
                }]
            },
            title: {
                display: true,
                text: 'Bảng thống kê điểm bài thi',
                fontSize: 24
            }
        }
    });
    let ctxPie = $("#pieScores");
    <?php //echo (int)$data["perUpperAvg"];?>
    let myChart = new Chart(ctxPie, {
        type: 'pie',
        data: {
            labels: ["Dưới điểm trung bình bài thi", "Trên điểm trung bình bài thi"],
            datasets: [
            {
                data: [ <?php echo (int)$data["perUpperAvg"];?>, <?php echo 100 - (int)$data["perUpperAvg"]; ?> ],

                backgroundColor: [
                    "#ea6700",
                    "#1a9c30"
                ]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Tỉ lệ trên điểm trung bình của môn học'
            },
            responsive: true,
            maintainAspectRatio: false
        }
    });

});
</script>