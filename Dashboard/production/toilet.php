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
                <div class="">
                    <div class="page-title">
                        <div class="title_left">
                            <h3>Level 4 Female Toilet</h3><br>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    
                    <div>
                        <img src='../images/floor plan3.jpg' height='400'>
                        <br>
                        <br>
                    </div>

<!--Number of visit (Within 15 mins)------------------------------------------------------------------------------------------------------------------------------------->
                
                <div class="x_title">

                    <h2>Number of visit <b>(Within 15 mins)</b> <img src='../images/door.png' height='30'></h2>
                    <div class="clearfix"></div>
                </div>

                <!------------------------------------------------------------------------->

                <div class="row">

                    <!--cubicle 1-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 1 </b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id="c1count" style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <!--cubicle 2-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 2 </b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id="c2count" style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <!--cubicle 3-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 3 </b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id="c3count" style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <!--cubicle 4-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 4 </b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id="c4count" style="color:#FCDB63;"></div>
                        </div>
                    </div>
                </div>
                <br>


<!--Toilet paper status (within 15 mins)------------------------------------------------------------------------------------------------------------------------------------->
                
                <div class="x_title">

                    <h2>Toilet Paper status <b>(Within 15 mins) <img src='../images/toiletpaper.png' height='30'></b></h2>
                    <div class="clearfix"></div>
                </div>

                <!------------------------------------------------------------------------->

                <div class="row">

                    <!--cubicle 1-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 1 </b><img src='../images/toiletpaper.png' height='20'></h3>
                            <div class="count" id="c1paper" style="color:#8EACD8;"></div>
                        </div>
                    </div>

                    <!--cubicle 2-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 2 </b><img src='../images/toiletpaper.png' height='20'></h3>
                            <div class="count" id="c2paper" style="color:#8EACD8;"></div>
                        </div>
                    </div>

                    <!--cubicle 3-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 3 </b><img src='../images/toiletpaper.png' height='20'></h3>
                            <div class="count" id="c3paper" style="color:#8EACD8;"></div>
                        </div>
                    </div>

                    <!--cubicle 4-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3><b>Cubicle 4 </b><img src='../images/toiletpaper.png' height='20'></h3>
                            <div class="count" id="c4paper" style="color:#8EACD8;"></div>
                        </div>
                    </div>
                </div>
                <br>


<!--Overall toilet informaiton for the whole day---------------------------------------------------------------------------------------------------------------------------------------------->
                
                <div class="x_title">

                    <h2>Overall Toilet Information <b>(Today)</b></h2>
                    <div class="clearfix"></div>
                </div>

                <!------------------------------------------------------------------------->


                <div class="row">

                    <!-- id = 'totalvisit1' -->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3>Number of visit for <b>Cubicle 1</b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id='totalvisit1' style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <!-- id = 'totalvisit2' -->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3>Number of visit for <b>Cubicle 2</b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id='totalvisit2' style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <!-- id = 'totalvisit3' -->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3>Number of visit for <b>Cubicle 3</b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id='totalvisit3' style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <!-- id = 'totalvisit4' -->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3>Number of visit for <b>Cubicle 4</b><img src='../images/door.png' height='20'></h3>
                            <div class="count" id='totalvisit4' style="color:#FCDB63;"></div>
                        </div>
                    </div>

                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3>Current Capacity of bin <img src='../images/bin.png' height='20'></h3>
                            <div class="count" id='bin' style="color:#f5b182;"></div>
                            
                        </div>
                    </div>

                    <!-- id = 'lightduration' style = "color:#FECCCB;"-->
                    <div class="animated flipInY col-lg-3 col-md-4 col-sm-6 col-xs-12">
                        <div class="tile-stats">
                            <h3>Duration of light on for the day <img src='../images/lightbulb.png' height='20'></h3>
                            <div class="count" id='lightduration' style="color:#FECCCB;"></div>
                            <!-- <h3>Duration of light</h3> -->
                            <!-- <p>Duration of light on for the day <img src='../images/lightbulb.png' height='20'></p> -->
                            
                        </div>
                    </div>

                </div>

<!------------------------------------------------------------------------------------------------------------------------------------------------>
                <br />
        <!-- /page content -->
<!------------------------------------------------------------------------------------------------------------------------->


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
<!------------------------------------------------------------------------------------------------------------------------->


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
<!---------------------------------------------------------------------------------------------------------------------------------->
  


<script>
            var d = new Date();
            var c_time = (d.getTime() - d.getMilliseconds()) / 1000;
            var c_15_time = c_time - 15 * 60;
            var d_time = (d.getTime() - d.getMilliseconds() - d.getSeconds() * 1000 - d.getMinutes() * 60 * 1000 - d
                .getHours() * 60 * 60 * 1000) / 1000;
            var api = "https://a9xkspni0f.execute-api.ap-southeast-1.amazonaws.com/beta/query?table=";
            var t1 = "Table1";
            var t2 = "Table2";
            var t3 = "Table3";
            var t4 = "Table4";
            var t5 = "Table5";
            var t6 = "Table6";
            var t7 = "Table7";
            var t8 = "Table8";
            var t16 = "Table16"
            const totalvisit1 = document.getElementById("totalvisit1");
            const totalvisit2 = document.getElementById("totalvisit2");
            const totalvisit3 = document.getElementById("totalvisit3");
            const totalvisit4 = document.getElementById("totalvisit4");
            const lightduration = document.getElementById("lightduration");
            const c1count = document.getElementById("c1count");
            const c1paper = document.getElementById("c1paper");
            const c2count = document.getElementById("c2count");
            const c2paper = document.getElementById("c2paper");
            const c3count = document.getElementById("c3count");
            const c3paper = document.getElementById("c3paper");
            const c4count = document.getElementById("c4count");
            const c4paper = document.getElementById("c4paper");
            if (totalvisit1) {
                fetch((api + t1 + '&min=' + d_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        totalvisit1.textContent = count;
                    })
            }
            if (totalvisit2) {
                fetch((api + t2 + '&min=' + d_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        totalvisit2.textContent = count;
                    })
            }
            if (totalvisit3) {
                fetch((api + t3 + '&min=' + d_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        totalvisit3.textContent = count;
                    })
            }
            if (totalvisit4) {
                fetch((api + t4 + '&min=' + d_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        totalvisit4.textContent = count;
                    })
            }
            if (lightduration) {
                fetch((api + t16 + '&min=' + d_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var sum = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            sum += parseInt(element.payload.M.duration2.N);
                        });
                        lightduration.textContent = Math.round(sum / 60 / 60) + "Hrs " + Math.round((sum - Math.round(
                            sum / 60 / 24) * 60) % 60) + "Mins";
                    })
            };
            if (c1count) {
                fetch((api + t1 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        c1count.textContent = count;
                    })
            }
            if (c1paper) {
                fetch((api + t5 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        if (data.Items.length == 0) {
                            var result = "No Data";
                        } else {
                            var distance = data.Items[0].payload.M.status2.M.distance.N;
                            if (distance < 20) {
                                var result = "Full";
                            } else if (distance < 40) {
                                var result = "Moderate";
                            } else {
                                var result = "Low"
                            }
                        }
                        c1paper.textContent = result;
                    })
            }
            if (c2count) {
                fetch((api + t2 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        c2count.textContent = count;
                    })
            }
            if (c2paper) {
                fetch((api + t6 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        if (data.Items.length == 0) {
                            var result = "No Data";
                        } else {
                            var distance = data.Items[0].payload.M.status2.M.distance.N;
                            if (distance < 20) {
                                var result = "Full";
                            } else if (distance < 40) {
                                var result = "Moderate";
                            } else {
                                var result = "Low"
                            }
                        }
                        c2paper.textContent = result;
                    })
            }
            if (c3count) {
                fetch((api + t3 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        c3count.textContent = count;
                    })
            }
            if (c3paper) {
                fetch((api + t7 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        if (data.Items.length == 0) {
                            var result = "No Data";
                        } else {
                            var distance = data.Items[0].payload.M.status2.M.distance.N;
                            if (distance < 20) {
                                var result = "Full";
                            } else if (distance < 40) {
                                var result = "Moderate";
                            } else {
                                var result = "Low"
                            }
                        }
                        c3paper.textContent = result;
                    })
            }
            if (c4count) {
                fetch((api + t4 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        var count = 0;
                        var items = data.Items;
                        items.forEach(element => {
                            if (element.payload.M.status2.N == "0") {
                                count += 1;
                            }
                        });
                        c4count.textContent = count;
                    })
            }
            if (c4paper) {
                fetch((api + t8 + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        if (data.Items.length == 0) {
                            var result = "No Data";
                        } else {
                            var distance = data.Items[0].payload.M.status2.M.distance.N;
                            if (distance < 20) {
                                var result = "Full";
                            } else if (distance < 40) {
                                var result = "Moderate";
                            } else {
                                var result = "Low"
                            }
                        }
                        c4paper.textContent = result;
                    })
            }

            // bin calculation
            const bin = document.getElementById("bin");
            fetch((api + "Table14" + '&min=' + c_15_time + '&max=' + c_time))
                    .then((response) => {
                        response.set
                        return response.json();
                    })
                    .then((data) => {
                        if (data.Items.length == 0) {
                            bin.textContent = "Not Full";
                        } else {
                            var status = data.Items[0].payload.M.status2N;
                            if (status == 1) {
                                bin.textContent = "Full";
                            } else {
                                bin.textContent = "Not Full";
                            }
                        }

                    })

        </script>

    <!------------------------------------------------------------------------------------------------------------------------>
  </body>
</html>
