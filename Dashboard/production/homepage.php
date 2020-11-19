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

        <!-- level 2 toilet ---------------------------------------------------------------------------------------------------------------------->
          <div class="row"> 
            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 2 Male Toilet</h2>
                  <img src='../images/male4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>

        
            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 2 Female Toilet</h2>
                  <img src='../images/female4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>
          <!-- </div> -->

        <!-- level 3 toilet ---------------------------------------------------------------------------------------------------------------------->
          <!-- <div class="row">   -->
            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 3 Male Toilet</h2>
                  <img src='../images/male4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>


            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 3 Female Toilet</h2>
                  <img src='../images/female4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>
          <!-- </div> -->

        <!-- level 4 toilet ---------------------------------------------------------------------------------------------------------------------->
          <!-- <div class="row"> -->
            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 4 Male Toilet</h2>
                  <img src='../images/male4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>

          
            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="toilet.php">
                <div class="x_title">
                  <h2>Level 4 Female Toilet</h2>
                  <img src='../images/female4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1 id='score'></h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>Data available.</p>
                </div>
              </a>
              </div>
            </div>
          <!-- </div> -->

        <!-- level 5 toilet ---------------------------------------------------------------------------------------------------------------------->
          <!-- <div class="row">   -->
            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 5 Male Toilet</h2>
                  <img src='../images/male4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>


            <div class="col-md-4 col-xs-8 widget widget_tally_box">
              <div class="x_panel ui-ribbon-container fixed_height_390">
              <a href="nodata.php">
                <div class="x_title">
                  <h2>Level 5 Female Toilet</h2>
                  <img src='../images/female4.png' height='40'>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">

                  <div style="text-align: center; margin-bottom: 10px">
                    <h1>No Data</h1>
                    <canvas height="60" width="110"></canvas></span>
                  </div>

                  <h3 class="name_title">Overall Toilet condition</h3>

                  <div class="divider"></div>

                  <p>No data available.</p>

                </div>
              </a>
              </div>
            </div>
          </div>


          <br />

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
  <script src="../vendors/jquery.easy-pie-chart/dist/jquery.easypiechart.min.js"></script>

  <script>
      var d = new Date();
      var c_time = (d.getTime() - d.getMilliseconds()) / 1000;
      var c_15_time = c_time - 15 * 60;
      var c_3h_time = c_time - 180 * 60;
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
      var t16 = "Table16";
      var sum = 0;
      var result = null;
      var colour = null;
      const score = document.getElementById("score");
// ------------------------------------------------------------------------------------------------------------------------------------------------
      
// Retrieve data from Table1 (cubicle door 1) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t1 + '&min=' + c_3h_time + '&max=' + c_time))
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
          if (count <= 20) {
            sum += 12.5;
          } 
          else if (count <= 50) {
            sum += 8;
          } 
          else {
            sum += 4;
          }

          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }

          score.textContent = result
          score.style.color = colour
        });

// Retrieve data from Table2 (cubicle door 2) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t2 + '&min=' + c_3h_time + '&max=' + c_time))
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
          if (count <= 20) {
            sum += 12.5;
          } 
          else if (count <= 50) {
            sum += 8;
          } 
          else {
            sum += 4;
          }

          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }

          score.textContent = result
          score.style.color = colour
        });


// Retrieve data from Table3 (cubicle door 3) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t3 + '&min=' + c_3h_time + '&max=' + c_time))
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
          if (count <= 20) {
            sum += 12.5;
          } 
          else if (count <= 50) {
            sum += 8;
          } 
          else {
            sum += 4;
          }

          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }
          
          score.textContent = result
          score.style.color = colour
        });


// Retrieve data from Table4 (cubicle door 4) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t4 + '&min=' + c_3h_time + '&max=' + c_time))
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
          if (count <= 20) {
            sum += 12.5;
          } 
          else if (count <= 50) {
            sum += 8;
          } 
          else {
            sum += 4;
          }

          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }

          score.textContent = result
          score.style.color = colour
        });


// Retrieve data from Table5 (Toilet paper 1) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t5 + '&min=' + c_15_time + '&max=' + c_time))
        .then((response) => {
          response.set
          return response.json();
        })
        .then((data) => {
          if (data.Items.length == 0) {
            sum += 0;
          } else {
            var distance = data.Items[0].payload.M.status2.M.distance.N;
            if (distance < 20) {
              sum += 12.5;
            } 
            else if (distance < 40) {
              sum += 8;
            } 
            else {
              sum += 4;
            }
          }

          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }

          score.textContent = result
          score.style.color = colour
        })


// Retrieve data from Table6 (Toilet paper 2) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t6 + '&min=' + c_15_time + '&max=' + c_time))
        .then((response) => {
          response.set
          return response.json();
        })
        .then((data) => {
          if (data.Items.length == 0) {
            sum += 0;
          } else {
            var distance = data.Items[0].payload.M.status2.M.distance.N;
            if (distance < 20) {
              sum += 12.5;
            } else if (distance < 40) {
              sum += 8;
            } else {
              sum += 4;
            }
          }
          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }

          score.textContent = result
          score.style.color = colour
        })


// Retrieve data from Table7 (Toilet paper 3) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t7 + '&min=' + c_15_time + '&max=' + c_time))
        .then((response) => {
          response.set
          return response.json();
        })
        .then((data) => {
          if (data.Items.length == 0) {
            sum += 0;
          } else {
            var distance = data.Items[0].payload.M.status2.M.distance.N;
            if (distance < 20) {
              sum += 12.5;
            } 
            else if (distance < 40) {
              sum += 8;
            } 
            else {
              sum += 4;
            }
          }
          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }

          score.textContent = result
          score.style.color = colour
        })


// Retrieve data from Table8 (Toilet paper 4) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + t8 + '&min=' + c_15_time + '&max=' + c_time))
        .then((response) => {
          response.set
          return response.json();
        })
        .then((data) => {
          if (data.Items.length == 0) {
            sum += 0;
          } else {
            var distance = data.Items[0].payload.M.status2.M.distance.N;
            if (distance < 20) {
              sum += 12.5;
            } 
            else if (distance < 40) {
              sum += 8;
            } 
            else {
              sum += 4;
            }
          }

          if (sum > 80) {
            result = "Clean";
            colour = "#09e04a";
          } 
          else if (sum > 48) {
            result = "Moderate";
            colour = "#fab319";
          } 
          else {
            result = "Dirty";
            colour = "red";
          }
          
          score.textContent = result
          score.style.color = colour
        })


// Retrieve data from Table14 (Bin) ------------------------------------------------------------------------------------------------------------------------------------------------
      fetch((api + "Table14" + '&min=' + c_15_time + '&max=' + c_time))
          .then((response) => {
            response.set
            return response.json();
          })
          .then((data) => {
            if (data.Items.length == 0) {
              sum += 3;
            } else {
              var status = data.Items[0].payload.M.status2N;
              if (status == 1) {
                sum += 0;
              } else {
                sum += 3;
              }
            }
            if (sum > 80) {
              result = "Clean";
              colour = "#09e04a";
            } 
            else if (sum > 48) {
              result = "Moderate";
              colour = "#fab319";
            } 
            else {
              result = "Dirty";
              colour = "red";
            }

            score.textContent = result
            score.style.color = colour
          })
// ------------------------------------------------------------------------------------------------------------------------------------------------
    </script>
  </body>
</html>
