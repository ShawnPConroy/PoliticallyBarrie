<?php
include $app->templatePath.'block-html-start.php';
?>
<html>
	<head>
<?php include $app->templatePath.'block-html-header.php' ?>
	</head>
	<body class="is-preload">

<?php include $app->templatePath.'block-header.php' ?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major"><?php echo $page->pageTitle; ?></h1>

							<div class="row">
								<div class="col-6 col-12-medium">
    							<p><?php echo $page->content; ?></p>
    							<ul>
                                  <?php
                                  foreach ($page->repData['Wards'] as $key=>$data) {
                                      echo '<li><a href="/reps/'.$key.'">'.$data['Name'].'</a></li> ';
                                  }
                                  ?>
    							</ul>
							</div> <!-- col-6 -->
							<div class="col-6 col-12-medium">
							    <iframe src="https://www.google.com/maps/d/u/1/embed?mid=1RjQ_9SPfGKEaHo9H0aUKBlpkjcU" style="width: 100%; height: 654px;"></iframe>
    						</div>
						</div>
					</section>

			</div>

<?php include $app->templatePath.'block-footer.php'; ?>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>