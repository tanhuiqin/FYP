<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- tab area on the top -------------------------------------------------------------------------------------- -->
    <title>IoToilet</title>
    <link rel="icon" href="../images/icons/favicon9.png" type="image/gif">
    <!-- --------------------------------------------------------------------------------------------------------- -->

    <!-- all the links ----------------------------------------------------------------------------------------------->
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
    <!-- new font -->
    <link href="../newfont/style.css" rel="stylesheet">
    <!----------------------------------------------------------------------------------------------------------------->


    <!--session !------------------------------------------------------------------------------------------------------>

    <?php
    session_start();

        if (isset($_SESSION['USER']))
        {
            $name = $_SESSION['USER'];
            $role = $_SESSION['ROLE'];
            // unset($_SESSION['USER']);

        }
        else
        {
          header("Location: ../login.php");
        }

    ?>

    <!----------------------------------------------------------------------------------------------------------------->
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            
            <!--the top part of side bar ------------------------------------------------------------------>
            <div class="navbar nav_title" style="border: 0;">
            <!-- <div class="navbar nav_title" style="border: 0;"> -->
              <div class="newfont">
                <a href="homepage.php" class="site_title"><img src='../images/icons/favicon9.png' alt=''><span>  I O T O I L E T </span></a>
              </div>
            </div>
            <!--------------------------------------------------------------------------------------------->


            <div class="clearfix"></div>



            <!-- menu profile quick info ------------------------------------------------------------------>
            <div class="profile clearfix">
              <div class="profile_info">
                <span><h6>Welcome,</h6></span>  
                <div style="color:white;"><h6><?php echo $name; ?></h6></div>
              </div>
            </div>
            <!--------------------------------------------------------------------------------------------->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                
                <h3>General</h3>

                <ul class="nav side-menu">
                    
                  <li><a href="homepage.php"><i class="fa fa-home"></i> Home</a></li>

                  <li><a><i class="fa fa-desktop"></i> Toilets <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="nodata.php">Level 2 Male</a></li>
                        <li><a href="nodata.php">Level 2 Female</a></li>
                        <li><a href="nodata.php">Level 3 Male</a></li>
                        <li><a href="nodata.php">Level 3 Female</a></li>
                        <li><a href="nodata.php">Level 4 Male</a></li>
                        <li><a href="toilet.php">Level 4 Female</a></li>
                        <li><a href="nodata.php">Level 5 Male</a></li>
                        <li><a href="nodata.php">Level 5 Female</a></li>
                    </ul>
                  </li>


                  <li><a href="analysis.php"><i class="fa fa-bar-chart-o"></i> Analysis </a></li>


                  <?php
                    if($role == "ADMINISTRATOR")
                    {
                      echo '<li><a><i class="fa fa-desktop"></i> User Management <span class="fa fa-chevron-down"></span></a>
                      <ul class="nav child_menu">
                          <li><a href="create_user.php">Create User</a></li>
                          <li><a href="delete_user.php">Delete User</a></li>
                      </ul>
                      </li>';
                    }
                  ?>
                  
                </ul>
              </div>

            </div>
            <!-- /sidebar menu -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              <nav class="nav navbar-nav">
              <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                  <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">

                    <!-- the top right profile -->
                    <?php
                        echo $name;
                    ?>
                  </a>
                  <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                  </div>
                </li>
                <br>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->

<!------------------------------------------------------I stop here --------------------------------------------------------------------------------------------------------------------------->

        <!-- page content -->
        <div class="right_col" role="main">
            <div class="page-title">
                <div class="title_left">
                    <h3>Analysis</h3><br>
                </div>
            </div>
            <div class="clearfix"></div>
            
            <!-- <?php
                if(isset($_GET['level']))
                {
                    var_dump($_GET);
                }
            ?> -->
                           
                <!-------------------------------------------------------------------------------------------------------------------------->
                <div class="row">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="x_panel">

                            <div class="x_title">
                                <h2>Filter</h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <br>

                                <!--Filter form start ------------------------------------------------------------------------------>
                                <form id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate="" action="analysis.php" method="GET">

                                    <div class="form-group">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align" for="level">Level <span class="required">*</span>
                                            </label>

                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" id="level" name="level">
                                                    <?php
                                                        $all_level = array("Level 2", "Level 3", "Level 4", "Level 5");

                                                        if (isset($_GET['level']))
                                                        {
                                                            foreach($all_level as $eachlevel)
                                                            {
                                                                if($eachlevel == $_GET['level'])
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachlevel;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachlevel;
                                                                    echo "</option>";
                                                                }
                                                                
                                                            }
                                                        }
                                                        else
                                                        {
                                                            foreach($all_level as $eachlevel)
                                                            {
                                                                if ($eachlevel == "Level 4")
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachlevel;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachlevel;
                                                                    echo "</option>";
                                                                }
                                                            }

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="field item form-group">
                                            <label class="col-form-label col-md-3 col-sm-3  label-align" for="gender">Gender
                                                <span class="required">*</span>
                                            </label>
                                            
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" id="gender" name="gender">
                                                    <?php
                                                        $all_gender = array("Male", "Female");

                                                        if (isset($_GET['gender']))
                                                        {
                                                            foreach($all_gender as $eachgender)
                                                            {
                                                                if($eachgender == $_GET['gender'])
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachgender;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachgender;
                                                                    echo "</option>";
                                                                }
                                                                
                                                            }
                                                        }
                                                        else
                                                        {
                                                            foreach($all_gender as $eachgender)
                                                            {
                                                                if($eachgender == "Female")
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachgender;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachgender;
                                                                    echo "</option>";
                                                                }
                                                            }

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="form-group">
                                        <div class="field item form-group">
                                            <label for="analysis"
                                            class="col-form-label col-md-3 col-sm-3  label-align">Analysis</label>
                                            
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" id="analysis" name="analysis">
                                                    <?php
                                                        $all_analysis = array("Total number of visits", "Duration of lights (Whole Toilet)", "Toilet paper usage", "Trash bin capacity");

                                                        if (isset($_GET['analysis']))
                                                        {
                                                            foreach($all_analysis as $eachanalysis)
                                                            {
                                                                if($eachanalysis == $_GET['analysis'])
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachanalysis;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachanalysis;
                                                                    echo "</option>";
                                                                }
                                                                
                                                            }
                                                        }
                                                        else
                                                        {
                                                            foreach($all_analysis as $eachanalysis)
                                                            {
                                                                echo "<option>";
                                                                echo $eachanalysis;
                                                                echo "</option>";
                                                            }

                                                        }
                                                    ?>
                                                </select>
                                                <div style="color:red; font-size:70%;">
                                                    * For Duration of lights, no need to choose cubicle
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="field item form-group">
                                            <label for="analysis"
                                            class="col-form-label col-md-3 col-sm-3  label-align">Cubicle</label>
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" id="cubicle" name="cubicle">
                                                    <?php
                                                        $all_cubicle = array("1", "2", "3", "4");

                                                        if (isset($_GET['cubicle']))
                                                        {
                                                            foreach($all_cubicle as $eachcubicle)
                                                            {
                                                                if($eachcubicle == $_GET['cubicle'])
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachcubicle;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachcubicle;
                                                                    echo "</option>";
                                                                }
                                                                
                                                            }
                                                        }
                                                        else
                                                        {
                                                            foreach($all_cubicle as $eachcubicle)
                                                            {
                                                                echo "<option>";
                                                                echo $eachcubicle;
                                                                echo "</option>";
                                                            }

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="field item form-group">
                                            <label for="duration"
                                            class="col-form-label col-md-3 col-sm-3  label-align">Duration</label>
                                            
                                            <div class="col-md-6 col-sm-6">
                                                <select class="form-control" id="duration" name="duration">
                                                    <!-- <option>Yesterday</option>
                                                    <option>Past week</option>
                                                    <option>Past month</option>
                                                    <option>Past year</option> -->
                                                    <?php
                                                        $all_duration = array("Yesterday", "Last 7 days", "Last 28 days");

                                                        if (isset($_GET['duration']))
                                                        {
                                                            foreach($all_duration as $eachduration)
                                                            {
                                                                if($eachduration == $_GET['duration'])
                                                                {
                                                                    echo "<option selected>";
                                                                    echo $eachduration;
                                                                    echo "</option>";
                                                                }
                                                                else
                                                                {
                                                                    echo "<option>";
                                                                    echo $eachduration;
                                                                    echo "</option>";
                                                                }
                                                                
                                                            }
                                                        }
                                                        else
                                                        {
                                                            foreach($all_duration as $eachduration)
                                                            {
                                                                echo "<option>";
                                                                echo $eachduration;
                                                                echo "</option>";
                                                            }

                                                        }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    <div class="ln_solid"></div>

                                    <div class="form-group">
                                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>

                                </form>

                            </div>

                        </div>
                    </div>
                </div>


                <!-------------------------------------------------------------------------------------------------------------------------->
                <div class="row">
                    <div class="col-md-12 col-sm-8 col-xs-8">
                        <div class="x_panel">
                            <div class="x_title">
                                <?php
                                    date_default_timezone_set('Asia/Singapore');
                                    if (isset($_GET['duration']))
                                    {
                                        // ("Yesterday", "Last 7 days", "Last 28 days");
                                        if($_GET['duration']== "Yesterday")
                                        {
                                            $date2 = date('d M Y',strtotime("-1 days"));
                                            $detailmsg = " (Data of " . $date2 . ")";
                                        }
                                        else if($_GET['duration']== "Last 7 days")
                                        {
                                            $date3 = date('d M Y',strtotime("-7 days"));
                                            $date4 = date('d M Y',strtotime("-1 days"));
                                            $detailmsg = " (Data from " . $date3 . " - " . $date4 . ")";
                                        }
                                        else
                                        {
                                            $date5 = date('d M Y',strtotime("-28 days"));
                                            $date6 = date('d M Y',strtotime("-1 days"));
                                            $detailmsg = " (Data from " . $date5 . " - " . $date6 . ")"; 
                                        }
                                    }
                                    else
                                    {
                                        $detailmsg = "";
                                    }
                                
                                ?>
                                <h2>Chart<small><?php echo $detailmsg; ?></small></h2>
                                <div class="clearfix"></div>
                            </div>

                            <div class="x_content">
                                <iframe class="chartjs-hidden-iframe"
                                    style="width: 100%; display: block; border: 0px; height: 0px; margin: 0px; position: absolute; left: 0px; right: 0px; top: 0px; bottom: 0px;"></iframe>
                                <canvas id="analysischart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        <!-- /page content -->
<!-------------------------------------------------------------------------------------------------------------------------->

        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Gentelella - Bootstrap Admin Template by <a href="https://colorlib.com">Colorlib</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="../vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- gauge.js -->
    <script src="../vendors/gauge.js/dist/gauge.min.js"></script>
    <!-- bootstrap-progressbar -->
    <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Skycons -->
    <script src="../vendors/skycons/skycons.js"></script>
    <!-- Flot -->
    <script src="../vendors/Flot/jquery.flot.js"></script>
    <script src="../vendors/Flot/jquery.flot.pie.js"></script>
    <script src="../vendors/Flot/jquery.flot.time.js"></script>
    <script src="../vendors/Flot/jquery.flot.stack.js"></script>
    <script src="../vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="../vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="../vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="../vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="../vendors/DateJS/build/date.js"></script>
    <!-- JQVMap -->
    <script src="../vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="../vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="../vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="../vendors/moment/min/moment.min.js"></script>
    <script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

<!---------------------------------------------------------------------------------------------------------------------------->
<script>
                    var analysischart = document.getElementById("analysischart");
                    var d = new Date();
                    var d_time = (d.getTime() - d.getMilliseconds() - d.getSeconds() * 1000 - d.getMinutes() * 60 *
                        1000 - d
                        .getHours() * 60 * 60 * 1000) / 1000;
                    var w_time = d_time - 60 * 60 * 24 * 7;
                    var d2_time = d_time - 60 * 60 * 24;
                    var m_time = d_time - 60 * 60 * 24 * 28;
                    var api = "https://a9xkspni0f.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=";
                    var t1 = "Table1";
                    var t2 = "Table2";
                    var t3 = "Table3";
                    var t4 = "Table4";
                    var t5 = "Table5";
                    var t6 = "Table6";
                    var t7 = "Table7";
                    var t8 = "Table8";
                    var t16 = "Table16";
                    const urlParams = new URLSearchParams(window.location.search);
                    const level = urlParams.get('level');
                    const gender = urlParams.get('gender');
                    const analysis = urlParams.get('analysis');
                    const duration = urlParams.get("duration");
                    const cubicle = parseInt(urlParams.get("cubicle"));
                    const daybyhour = ['12:00', '13:00', '14:00', '15:00', '16:00', '17:00', '18:00',
                        '19:00', '20:00', '21:00', '22:00',
                    ]
                    const weekbyday = ["Day 1", "Day 2", "Day 3", "Day 4", "Day 5", "Day 6", "Day 7"]
                    const monthbyweek = ['Week 1', 'Week 2', 'Week 3', 'Week 4']
                    if (duration == "Yesterday") {
                        var label = daybyhour;
                    } else if (duration == "Last 7 days") {
                        var label = weekbyday;
                    } else if (duration == "Last 28 days") {
                        var label = monthbyweek;
                    } else {
                        var label = null;
                    }
                    if (level == "Level 4" && gender == "Female") {
                        if (label != null) {
                            if (analysis == "Duration of lights (Whole Toilet)") {
                                if (label == daybyhour) {
                                    fetch((api + t16 + '&min=' + d2_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,
                                                4: 0,
                                                5: 0,
                                                6: 0,
                                                7: 0,
                                                8: 0,
                                                9: 0,
                                                10: 0,
                                                11: 0,
                                                12: 0,
                                                13: 0,
                                                14: 0,
                                                15: 0,
                                                16: 0,
                                                17: 0,
                                                18: 0,
                                                19: 0,
                                                20: 0,
                                                21: 0,
                                                22: 0,
                                                23: 0
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                    d2_time) / 3600)] += parseInt(element.payload.M
                                                    .duration2.N) / 60;}
                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [ dict[
                                                                12],
                                                            dict[13], dict[14], dict[15], dict[
                                                                16],
                                                            dict[17], dict[18], dict[19], dict[
                                                                20],
                                                            dict[21], dict[22], 
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Duration of Lights (Yesterday)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Minutes",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });

                                } else if (label == weekbyday) {
                                    fetch((api + t16 + '&min=' + w_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();

                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,
                                                4: 0,
                                                5: 0,
                                                6: 0,
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                    w_time) / 3600 / 24)] += parseInt(element.payload.M
                                                    .duration2.N) / 60 / 60;}
                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [dict[0], dict[1], dict[2], dict[3],
                                                            dict[
                                                                4],
                                                            dict[5], dict[6]
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Duration of Lights (In the last 7 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Hours",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                } else if (label == monthbyweek) {
                                    fetch((api + t16 + '&min=' + m_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                    m_time) / 3600 / 24 / 7)] += parseInt(element
                                                    .payload.M
                                                    .duration2.N) / 60 / 60 / 24;}
                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [dict[0], dict[1], dict[2], dict[
                                                            3], ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Duration of Lights (In the last 28 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Days",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                }
                            } else if (analysis == 'Total number of visits') {
                                if (label == daybyhour) {
                                    fetch((api + "Table" + cubicle + '&min=' + d2_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,
                                                4: 0,
                                                5: 0,
                                                6: 0,
                                                7: 0,
                                                8: 0,
                                                9: 0,
                                                10: 0,
                                                11: 0,
                                                12: 0,
                                                13: 0,
                                                14: 0,
                                                15: 0,
                                                16: 0,
                                                17: 0,
                                                18: 0,
                                                19: 0,
                                                20: 0,
                                                21: 0,
                                                22: 0,
                                                23: 0
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                if (element.payload.M.status2.N == "0") {
                                                    dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                        d2_time) / 3600)] += 1;
                                                }}
                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [ dict[
                                                                12],
                                                            dict[13], dict[14], dict[15], dict[
                                                                16],
                                                            dict[17], dict[18], dict[19], dict[
                                                                20],
                                                            dict[21], dict[22],
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Total Number of Visits for Cubicle ' +
                                                            cubicle + ' (Yesterday)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Counts",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                } else if (label == weekbyday) {
                                    fetch((api + "Table" + cubicle + '&min=' + w_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,
                                                4: 0,
                                                5: 0,
                                                6: 0,
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                if (element.payload.M.status2.N == "0") {
                                                    dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                        w_time) / 3600 / 24)] += 1;
                                                }}
                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [dict[0], dict[1], dict[2], dict[3],
                                                            dict[
                                                                4],
                                                            dict[5], dict[6]
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Total Number of Visits for Cubicle ' +
                                                            cubicle + ' (In the last 7 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Counts",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })

                                        })
                                } else if (label == monthbyweek) {
                                    fetch((api + "Table" + cubicle + '&min=' + m_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,

                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                if (element.payload.M.status2.N == "0") {
                                                    dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                        m_time) / 3600 / 24 / 7)] += 1;
                                                }}
                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [dict[0], dict[1], dict[2], dict[3],
                                                            dict[
                                                                4],
                                                            dict[5], dict[6]
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Total Number of Visits for Cubicle ' +
                                                            cubicle + ' (In the last 28 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Counts",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })

                                        })
                                }
                            } else if (analysis == "Toilet paper usage") {
                                if (label == daybyhour) {
                                    fetch((api + "Table" + (cubicle + 4) + '&min=' + d2_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: [0, 0],
                                                1: [0, 0],
                                                2: [0, 0],
                                                3: [0, 0],
                                                4: [0, 0],
                                                5: [0, 0],
                                                6: [0, 0],
                                                7: [0, 0],
                                                8: [0, 0],
                                                9: [0, 0],
                                                10: [0, 0],
                                                11: [0, 0],
                                                12: [0, 0],
                                                13: [0, 0],
                                                14: [0, 0],
                                                15: [0, 0],
                                                16: [0, 0],
                                                17: [0, 0],
                                                18: [0, 0],
                                                19: [0, 0],
                                                20: [0, 0],
                                                21: [0, 0],
                                                22: [0, 0],
                                                23: [0, 0]
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                    dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                    d2_time) / 3600)][0] += parseInt(element.payload.M
                                                    .status2.M.distance.N);
                                                dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                    d2_time) / 3600)][1] += 1
                                                }
                                                


                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [dict[
                                                                12][0] / dict[12][1],
                                                            dict[13][0] / dict[13][1], dict[14][
                                                                0
                                                            ] / dict[14][1], dict[
                                                                15][0] / dict[15][1], dict[
                                                                16][0] / dict[16][1],
                                                            dict[17][0] / dict[17][1], dict[18][
                                                                0
                                                            ] / dict[18][1], dict[
                                                                19][0] / dict[19][1], dict[
                                                                20][0] / dict[20][1],
                                                            dict[21][0] / dict[21][1], dict[22][
                                                                0
                                                            ] / dict[22][1],
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Average Usage of Toilet Paper for Cubicle ' +
                                                            cubicle + ' (Yesterday)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Usage",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true,
                                                                suggestedMax: 200
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                } else if (label == weekbyday) {
                                    fetch((api + "Table" + (cubicle + 4) + '&min=' + w_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: [0, 0],
                                                1: [0, 0],
                                                2: [0, 0],
                                                3: [0, 0],
                                                4: [0, 0],
                                                5: [0, 0],
                                                6: [0, 0],
                                            };
                                            var items = data.Items;
                                            items.forEach(element => {
                                                var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                    dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                        w_time) / 3600 / 24)][0] += parseInt(element.payload.M
                                                    .status2.M.distance.N);
                                                    dict[Math.floor((parseInt(element.payload.M.time2.N) -
                                                    w_time) / 3600 / 24)][1] += 1}

                                            })
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        data: [dict[0][0] / dict[0][1], dict[1][0] /
                                                            dict[1][1], dict[2][0] /
                                                            dict[2][1], dict[3][0] / dict[3][1],
                                                            dict[
                                                                4][0] / dict[4][1],
                                                            dict[5][0] / dict[5][1], dict[6][
                                                            0] / dict[6][1]
                                                        ],
                                                        label: "Data",
                                                        backgroundColor: "rgba(38, 185, 154, 0.31)",
                                                        borderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBorderColor: "rgba(38, 185, 154, 0.7)",
                                                        pointBackgroundColor: "rgba(38, 185, 154, 0.7)",
                                                        pointHoverBackgroundColor: "#fff",
                                                        pointHoverBorderColor: "rgba(220,220,220,1)",
                                                        pointBorderWidth: 1,
                                                    }]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Average Usage of Toilet Paper for Cubicle ' +
                                                            cubicle + ' (In the last 7 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Usage",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true,
                                                                suggestedMax: 200
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                } 
                            } else if (analysis == "Trash bin capacity") {
                                if (label == daybyhour) {
                                    fetch((api + "Table14" + '&min=' + d2_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,
                                                4: 0,
                                                5: 0,
                                                6: 0,
                                                7: 0,
                                                8: 0,
                                                9: 0,
                                                10: 0,
                                                11: 0,
                                                12: 0,
                                                13: 0,
                                                14: 0,
                                                15: 0,
                                                16: 0,
                                                17: 0,
                                                18: 0,
                                                19: 0,
                                                20: 0,
                                                21: 0,
                                                22: 0,
                                                23: 0
                                            };
                                            if (data.Items.length != 0) {
                                                var items = data.Items;
                                                items.forEach(element => {
                                                    var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                    if (element.payload.M.status2.N == "1") {
                                                        dict[Math.floor((parseInt(element.payload.M.time2
                                                                .N) -
                                                            d2_time) / 3600)] += 15;}
                                                    }
                                                })
                                            }
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        label: 'Duration of Trash Bin Full (Mins)',
                                                        backgroundColor: "#26B99A",
                                                        data: [ dict[12], dict[13], dict[
                                                                14],
                                                            dict[15], dict[16], dict[17], dict[
                                                                18], dict[19], dict[20], dict[
                                                                21], dict[22]
                                                        ]
                                                    }, ]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Duration of Trash Bin Full (Yesterday)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Duration (Mins)",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                } else if (label == weekbyday) {
                                    fetch((api + "Table14" + '&min=' + w_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,
                                                4: 0,
                                                5: 0,
                                                6: 0,
                                            };
                                            if (data.Items.length != 0) {
                                                var items = data.Items;
                                                items.forEach(element => {
                                                    var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                    if (element.payload.M.status2.N == "1") {
                                                        dict[Math.floor((parseInt(element.payload.M.time2
                                                                .N) -
                                                            w_time) / 3600 / 24)] += 0.25;
                                                    }}
                                                })
                                            }
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        label: 'Duration of Trash Bin Full (Hours)',
                                                        backgroundColor: "#26B99A",
                                                        data: [dict[0], dict[1], dict[2], dict[3],
                                                            dict[4], dict[5], dict[6]
                                                        ]
                                                    }, ]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Duration of Trash Bin Not Full (In the last 7 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Duration (Hours)",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                } else if (label == monthbyweek) {
                                    fetch((api + "Table14" + '&min=' + m_time + '&max=' + d_time))
                                        .then((response) => {
                                            response.set
                                            return response.json();
                                        })
                                        .then((data) => {
                                            var dict = {
                                                0: 0,
                                                1: 0,
                                                2: 0,
                                                3: 0,

                                            };
                                            if (data.Items.length != 0) {
                                                var items = data.Items;
                                                items.forEach(element => {
                                                    var d = new Date(parseInt(element.payload.M.time2.N)*1000);
                                                var n = d.getHours();
                                                if (n > 11 && n < 23){
                                                    if (element.payload.M.status2.N == "1") {
                                                        dict[Math.floor((parseInt(element.payload.M.time2
                                                                .N) -
                                                            m_time) / 3600 / 24 / 7)] += 0.25;
                                                    }}
                                                })
                                            }
                                            var mychart = new Chart(analysischart, {
                                                type: 'line',
                                                data: {
                                                    labels: label,
                                                    datasets: [{
                                                        label: 'Duration of Trash Bin Full (Hours)',
                                                        backgroundColor: "#26B99A",
                                                        data: [dict[0], dict[1], dict[2], dict[3]]
                                                    }, ]
                                                },
                                                options: {
                                                    title: {
                                                        display: true,
                                                        text: 'Duration of Trash Bin Not Full (In the last 28 days)',
                                                        position: 'top',
                                                        fontSize: 20
                                                    },
                                                    scales: {
                                                        yAxes: [{
                                                            scaleLabel: {
                                                                display: true,
                                                                labelString: "Duration (Hours)",
                                                            },
                                                            ticks: {
                                                                beginAtZero: true
                                                            }
                                                        }]
                                                    }
                                                }
                                            })
                                        });
                                }
                            }
                        }
                    }
                </script>
<!--end of chart ------------------------------------------------------------------------------------------------------------------->
    
  </body>
</html>
