<?php 
include('h.php');
date_default_timezone_set('Asia/Bangkok');// change according timezone
$currentTime = date( 'Y-m-d h:i:s A', time () );
?>
<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
	<link rel="shortcut icon" href="img/icons/icon-48x48.png" />
	<link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link href="css/add.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
</head>


<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">
    <?php include('menutop.php');?>
    <?php include('menu_l.php');?>
  
      
    <div class="content-wrapper">

        <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                  <main class="content">
				<div class="container-fluid p-0">

					<h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-6 col-xxl-5 d-flex">
							<div class="w-100">
								<div class="row">
                                
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">ยอดขายเดือนนี้ (หน่วย)</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="truck"></i>
														</div>
													</div>
												</div>
                                                <?php
												$month = date("n",strtotime($currentTime));
												$query=mysqli_query($conn,"SELECT COUNT(id) as coid FROM orders WHERE Month(order_date) = $month");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                ?>	
												<h1 class="mt-1 mb-3"><?php echo htmlentities($row['coid']);?></h1>
                                                <?php } ?>
												<!-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> ??? </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
                                        <div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">รายได้เดือนนี้</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
                                                
												<?php 
                                                $status='Delivered';
                                                $earn = 0;
                                                $totalearn = 0;
                                                $month = date("n",strtotime($currentTime));
                                                $query=mysqli_query($conn,"SELECT orders.quantity as ot,products.product_price as ppp,products.shipping_charge as ps FROM orders JOIN products ON products.id=orders.product_id WHERE orders.order_status='$status' and Month(order_date) = $month");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                    
                                                    $earn = $row["ot"]*$row["ppp"]+$row["ps"];
                                                    $totalearn += $earn;
                                                ?>
                                                <?php } ?>
                                                <h1 class="mt-1 mb-3">฿ <?php echo htmlentities($totalearn);?></h1>

												<!-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> ??? </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">ยอดผู้เข้าใช้เว็บ</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="users"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">???</h1>
												<!-- <div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> ??? </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
									</div>
									<div class="col-sm-6">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">ยอดขายตั้งแต่เปิดร้าน</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="dollar-sign"></i>
														</div>
													</div>
												</div>
                                                <?php 
                                                $status='Delivered';
                                                $earn = 0;
                                                $totalearn = 0;
                                                $query=mysqli_query($conn,"SELECT orders.quantity as ot,products.product_price as ppp,products.shipping_charge as ps FROM orders JOIN products ON products.id=orders.product_id WHERE orders.order_status='$status' ");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                    $earn = $row["ot"]*$row["ppp"]+$row["ps"];
                                                    $totalearn += $earn;
                                                ?>
                                                <?php } ?>
                                                <h1 class="mt-1 mb-3">฿ <?php echo htmlentities($totalearn);?></h1>
												<!-- <div class="mb-0">
													<span class="text-success"> <i class="mdi mdi-arrow-bottom-right"></i> ??? </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">ยอดรายการสั่งซื้อเดือนนี้</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="shopping-cart"></i>
														</div>
													</div>
												</div>
                                                <?php 
												$month = date("n",strtotime($currentTime));
                                                $query=mysqli_query($conn,"SELECT COUNT(DISTINCT order_id) as moid FROM orders WHERE Month(order_date) = $month ");
                                                while($row=mysqli_fetch_array($query))
                                                {
                                                ?>	
												<h1 class="mt-1 mb-3"><?php echo htmlentities($row['moid']);?></h1>
                                                <?php } ?>
												<!-- <div class="mb-0">
													<span class="text-danger"> <i class="mdi mdi-arrow-bottom-right"></i> ??? </span>
													<span class="text-muted">Since last week</span>
												</div> -->
											</div>
										</div>
									</div>
                                    
								</div>
							</div>
						</div>

						<div class="col-xl-6 col-xxl-7">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">การเติบโตของร้าน (บาท/เดือน)</h5>
								</div>
								<div class="card-body py-3">
									<div class="chart chart-sm">
										<canvas id="chartjs-dashboard-line"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-12 col-lg-8 col-xxl-9 d-flex">
							<div class="card flex-fill">
								<div class="card-header">

									<h5 class="card-title mb-0">ธุรกรรมวันนี้</h5>
								</div>
								<table class="table table-hover my-0">
									
									<tbody>
										
										<?php
                                            $f1="00:00:00";
                                            $from=date('Y-m-d')." ".$f1;
                                            $t1="23:59:59";
                                            $to=date('Y-m-d')." ".$t1;

                                            $query = "SELECT *,orders.order_id as ooid, COUNT(orders.product_id) as coq,SUM(orders.quantity*products.product_price+products.shipping_charge) as qps FROM orders JOIN products ON products.id=orders.product_id WHERE orders.order_date BETWEEN '$from' and '$to' GROUP BY orders.order_id ORDER BY orders.order_date " or die("Error:" . mysqli_error());
                                            $result = mysqli_query($conn, $query); 
                                            echo ' <table id="example1" class="table table-bordered table-striped">';
                                            echo "<thead>";
                                                echo "<tr class=''>
                                                <th width='5%'  class='d-none d-xl-table-cell'>รายการ</th>
                                                <th width='10%' class='d-none d-xl-table-cell'>ลูกค้า</th>
                                                <th width='15%' class='d-none d-xl-table-cell'>อีเมล/เบอร์ติดต่อ</th>
                                                <th width='15%' class='d-none d-xl-table-cell'>ที่อยู่</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>สินค้า</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>สุทธิ</th>
												<th width='15%' class='d-none d-xl-table-cell'>การชำระเงิน</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>สถานะ</th>
                                                <th width='5%' class='d-none d-xl-table-cell'>วันที่</th>
												
                                               
                                                </tr>";
                                            echo "</thead>";
                                            while($row = mysqli_fetch_array($result)) {
                                            echo "<tr>";
                                                // $total = $row["quantity"]*$row["ppp"]+$row["ps"]; 
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["ooid"] .  "</td> ";
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["fullname"] .  "</td> ";
                                                echo "<td> อีเมล: " .$row["email"] .
                                                "<br>ติดต่อ: <font color='blue'>".$row["contactno"] ."</font>".
                                                "</td class='d-none d-xl-table-cell'> ";
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["shipping_address"]. "<br> ".$row["shipping_pincode"].  "</td> "; "</td> ";
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["coq"] .  "</td> ";  
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["qps"] .  "</td> "; 
												echo "<td  class='d-none d-xl-table-cell'>" .$row["payment_method"] .  "</td> "; 
                                                echo "<td  class='d-none d-xl-table-cell'>" .$row["order_status"] .  "</td> ";  
                                                echo "<td> ".date('Y/m/d',strtotime($row["order_date"])). "</td> ";
                                                
                                            }
                                            echo "</table>";
                                            mysqli_close($conn);
                                        ?> 
									</tbody>
								</table>
							</div>
						</div>
						<div class="col-12 col-lg-4 col-xxl-3 d-flex">
							<div class="card flex-fill w-100">
								<div class="card-header">

									<h5 class="card-title mb-0">ยอดขายประจำเดือน (ชิ้น)</h5>
								</div>
								<div class="card-body d-flex w-100">
									<div class="align-self-center chart chart-lg">
										<canvas id="chartjs-dashboard-bar"></canvas>
									</div>
								</div>
							</div>
						</div>
					</div>

				</div>
			</main>                
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
        
        

    
    
    
    </div>
</div>

<?php
$earnpermonth = array('0','0','0','0','0','0','0','0','0','0','0','0');
?>
                                                

    <script src="js/app.js"></script>

	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var ctx = document.getElementById("chartjs-dashboard-line").getContext("2d");
			var gradient = ctx.createLinearGradient(0, 0, 0, 225);
			gradient.addColorStop(0, "rgba(215, 227, 244, 1)");
			gradient.addColorStop(1, "rgba(215, 227, 244, 0)");
			// Line chart
			new Chart(document.getElementById("chartjs-dashboard-line"), {
				type: "line",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "Sales (฿)",
						fill: true,
						backgroundColor: gradient,
						borderColor: window.theme.primary,
						data: [
							0,
							0,
							0,
							32070,
							50890,
							0,
							0,
							0,
							0,
							0,
							0,
                            0
							
						]
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					tooltips: {
						intersect: false
					},
					hover: {
						intersect: true
					},
					plugins: {
						filler: {
							propagate: false
						}
					},
					scales: {
						xAxes: [{
							reverse: true,
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}],
						yAxes: [{
							ticks: {
								stepSize: 1000
							},
							display: true,
							borderDash: [3, 3],
							gridLines: {
								color: "rgba(0,0,0,0.0)"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Pie chart
			new Chart(document.getElementById("chartjs-dashboard-pie"), {
				type: "pie",
				data: {
					labels: ["Chrome", "Firefox", "IE"],
					datasets: [{
						data: [4306, 3801, 1689],
						backgroundColor: [
							window.theme.primary,
							window.theme.warning,
							window.theme.danger
						],
						borderWidth: 5
					}]
				},
				options: {
					responsive: !window.MSInputMethodContext,
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					cutoutPercentage: 75
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			// Bar chart
			new Chart(document.getElementById("chartjs-dashboard-bar"), {
				type: "bar",
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
					datasets: [{
						label: "This year",
						backgroundColor: window.theme.primary,
						borderColor: window.theme.primary,
						hoverBackgroundColor: window.theme.primary,
						hoverBorderColor: window.theme.primary,
						data: [54, 67, 41, 55, 62, 45, 55, 73, 60, 76, 48, 79],
						barPercentage: .75,
						categoryPercentage: .5
					}]
				},
				options: {
					maintainAspectRatio: false,
					legend: {
						display: false
					},
					scales: {
						yAxes: [{
							gridLines: {
								display: false
							},
							stacked: false,
							ticks: {
								stepSize: 20
							}
						}],
						xAxes: [{
							stacked: false,
							gridLines: {
								color: "transparent"
							}
						}]
					}
				}
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var markers = [{
					coords: [31.230391, 121.473701],
					name: "Shanghai"
				},
				{
					coords: [28.704060, 77.102493],
					name: "Delhi"
				},
				{
					coords: [6.524379, 3.379206],
					name: "Lagos"
				},
				{
					coords: [35.689487, 139.691711],
					name: "Tokyo"
				},
				{
					coords: [23.129110, 113.264381],
					name: "Guangzhou"
				},
				{
					coords: [40.7127837, -74.0059413],
					name: "New York"
				},
				{
					coords: [34.052235, -118.243683],
					name: "Los Angeles"
				},
				{
					coords: [41.878113, -87.629799],
					name: "Chicago"
				},
				{
					coords: [51.507351, -0.127758],
					name: "London"
				},
				{
					coords: [40.416775, -3.703790],
					name: "Madrid "
				}
			];
			var map = new jsVectorMap({
				map: "world",
				selector: "#world_map",
				zoomButtons: true,
				markers: markers,
				markerStyle: {
					initial: {
						r: 9,
						strokeWidth: 7,
						stokeOpacity: .4,
						fill: window.theme.primary
					},
					hover: {
						fill: window.theme.primary,
						stroke: window.theme.primary
					}
				},
				zoomOnScroll: false
			});
			window.addEventListener("resize", () => {
				map.updateSize();
			});
		});
	</script>
	<script>
		document.addEventListener("DOMContentLoaded", function() {
			var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
			var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
			document.getElementById("datetimepicker-dashboard").flatpickr({
				inline: true,
				prevArrow: "<span title=\"Previous month\">&laquo;</span>",
				nextArrow: "<span title=\"Next month\">&raquo;</span>",
				defaultDate: defaultDate
			});
		});
	</script>
    </body>
</html>
<?php include('footerjs.php');?>