<!DOCTYPE html>
<html>
    <head>

        <meta name="description" content="Crime Monitoring Portal for Police Station of Binangonan">
        <meta name="keywords" content="Crime Monitoring Portal, Police Station, Binangonan, Crime Monitoring, monitoring Portal">
        <meta name="author" content="Clover Leaf">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            BODY {
                width: 550PX;
            }

            #chart-container {
                width: 100%;
                height: auto;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>

    </head>

    <body style = "font-family: Verdana, Geneva, Tahoma, sans-serif;">
        <?php 
            require 'nav.php';

            $vistC = 00;
            $regC = 00;
            $MsgC = 00;

           

        ?>
           
        <div id = "dailyR">
            <img src="pic/dailyReports" alt="bg of reports" style = " position: absolute; top: 50px;">
            <label id = "dtToday" style = "position: absolute; top:70px; left: 48px;"><b><?php echo date('M d, Y ,l') ?></b></label>
            <label id = "rContent" style = "position: absolute; top: 180px; left: 253px;"><?php echo $vistC?></label>
            <label id = "rContent" style = "position: absolute; top: 180px; left: 106px;"><?php echo $regC?></label>
            <label id = "rContent" style = "position: absolute; top: 180px; left: 400px;"><?php echo $MsgC?></label>
        </div>
        <div id="chart-container">
        <canvas id="graphCanvas"></canvas>
      </div>

    <script>
        $(document).ready(function () {
            showGraph();
        });


        function showGraph()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var month = [];
                    var visitors = [];

                    for (var i in data) {
                        month.push(data[i].month);
                        visitors.push(data[i].visitors);
                    }

                    var chartdata = {
                        labels: month,
                        datasets: [
                            {
                                label: 'Visited Chart',
                                backgroundColor: '#060C36',
                                borderColor: '#060C36',
                                hoverBackgroundColor: '#FFF200',
                                hoverBorderColor: '#FFF200',
                                data: visitors
                            }
                        ]
                    };

                    var graphTarget = $("#graphCanvas");

                    var barGraph = new Chart(graphTarget, {
                        type: 'bar',
                        data: chartdata
                    });
                });
            }
        }
        </script>

        <div style = " width: 760px; height: 575px; position: absolute; top: 75px; right: 10px;">
            <label style = "color: #060C36; font-size: 20px; font-style: normal; font-weight: 700; line-height: normal;">ACTIVITY LOG<label>



            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect x="3" y="6" width="18" height="15" rx="2" stroke="#060C36" stroke-width="2"/>
                <path d="M4 11H20" stroke="#060C36" stroke-width="2" stroke-linecap="round"/>
                <path d="M9 16H15" stroke="#060C36" stroke-width="2" stroke-linecap="round"/>
                <path d="M8 3L8 7" stroke="#060C36" stroke-width="2" stroke-linecap="round"/>
                <path d="M16 3L16 7" stroke="#060C36" stroke-width="2" stroke-linecap="round"/>
            </svg>


                <label style = "color: #060C36;font-size: 11px; width: 100px;position: absolute; right: 10px; ">PRINT REPORTS</label>
                    <div style = "position: absolute; right: 10px">
                        <a href="generate.php">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 2V7L12 7.05441C11.9999 7.47848 11.9998 7.8906 12.0455 8.23052C12.097 8.61372 12.2226 9.051 12.5858 9.41421C12.949 9.77743 13.3863 9.90295 13.7695 9.95447C14.1094 10.0002 14.5215 10.0001 14.9456 10H14.9456H14.9456H14.9456L15 10H20V16C20 18.8284 20 20.2426 19.1213 21.1213C18.2426 22 16.8284 22 14 22H10C7.17157 22 5.75736 22 4.87868 21.1213C4 20.2426 4 18.8284 4 16V8C4 5.17157 4 3.75736 4.87868 2.87868C5.75736 2 7.17157 2 10 2H12ZM14 2.00462V7C14 7.49967 14.0021 7.77383 14.0277 7.96402L14.0287 7.97131L14.036 7.97231C14.2262 7.99788 14.5003 8 15 8H19.9954C19.9852 7.58836 19.9525 7.31595 19.8478 7.06306C19.6955 6.69552 19.4065 6.40649 18.8284 5.82843L16.1716 3.17157C15.5935 2.59351 15.3045 2.30448 14.9369 2.15224C14.684 2.04749 14.4116 2.01481 14 2.00462ZM8 13C8 12.4477 8.44772 12 9 12L15 12C15.5523 12 16 12.4477 16 13C16 13.5523 15.5523 14 15 14L9 14C8.44772 14 8 13.5523 8 13ZM9 16C8.44772 16 8 16.4477 8 17C8 17.5523 8.44772 18 9 18H13C13.5523 18 14 17.5523 14 17C14 16.4477 13.5523 16 13 16H9Z" fill="#060C36"/>
                                </svg>
                        </a>
                    </div>

            


            <div style = " width: 760px; height: 59px; background-color: pink;">
                <label>Filters</label>

            </div>





            <div style = "height:450px; width: 760px; color: #000;font-size: 13px; font-style: normal; font-weight: 400; line-height: normal; overflow-y: auto;" >
                    <table width="100%" border="1" style="border-collapse:collapse;">
                    <thead style = "background: #060C36;color:white;" >
                    <tr>
                        <th><strong>Row no.</strong></th>
                        <th><strong>Log Id</strong></th>
                        <th><strong>Username</strong></th>
                        <th><strong>Usertype</strong></th>
                        <th><strong>Description</strong></th>
                        <th><strong>Date</strong></th>
                        <th><strong>Time</strong></th>
                    </tr>
                    </thead>
                    <tbody>
                        
                    <?php
                    $count=1;
                    $sel_query="Select * from tblactivity_log ORDER BY logId desc;";
                    $result = mysqli_query($con,$sel_query);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                    <tr>
                        <td align="center"><?php echo $count; ?></td>
                        <td align="center"><?php echo $row["logId"]; ?></td>
                        <td align="center"><?php echo $row["username"]; ?></td>
                        <td align="center"><?php echo $row["usertype"]; ?></td>
                        <td align="center"><?php echo $row["description"]; ?></td>
                        <td align="center"><?php echo $row["date"]; ?></td>
                        <td align="center"><?php echo $row["time"]; ?></td>
                    </tr>
                    <?php $count++; } ?>
                    </tbody>
                    </table>

            </div>
        </div>

 


    </body>
</html>
