<?php
include $app->templatePath.'block-html-start.php';
?>
<html>
	<head>
<?php include $app->templatePath.'block-html-header.php'; ?>
	</head>
	<body class="is-preload">

<?php include $app->templatePath.'block-header.php' ?>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Main -->
			<section id="main" class="wrapper">
				<div class="inner">
					<h1 class="major">Election Stats</h1>
					<p>Here are some older statistics I have had hanging around. Most of these are from before the ridings were redistributed. I will be updating this over the winter, and adding some municipal data.</p>
<?php
foreach ($page->stats as $section) {
?>
					<h2><?php echo $section->name ?></h1>
					<div class="box alt">
					    <div class="row gtr-uniform">
<?php
    foreach ($section->stats as $stat) {
?>
        					<div class="6u 12u(mobile)"><span class="image fit"><img src="<?php echo $stat->uri ?>" /></span><?php echo $stat->description ?></div>
<?
    }
?>
					    </div>
					</div>
<?php
}


?>
				</div>
			</section>

		</div>

<?php include $app->templatePath.'block-footer.php'; ?>

	</body>
</html>