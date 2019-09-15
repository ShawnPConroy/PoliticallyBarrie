<?php
include $app->templatePath.'block-html-start.php';
?>
<html>
	<head>
<?php include $app->templatePath.'block-html-header.php'; ?>
	</head>
	<body class="">

<?php include $app->templatePath.'block-header.php';
?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major"><?php echo $page->title; ?></h1>
    						<p><?php echo $page->content; ?></p>
						</div>
					</section>
<?php

  // Show all reps  <div class="box style1">
  
  foreach ($page->wardReps as $rep) {
      ?>
					<section id="<?php echo $rep->id; ?>" class="wrapper rep <?php echo $rep->id; ?>">
    					<div class="inner">
    					  <div class="highlight style1">
      						<h2><?php echo $rep->header; ?></h2>
        					<div class="row">
      					    <div class="6u 12u(mobile)">
          						<p><?php echo $rep->summary; ?></p>
          						<ul class="fa-ul">
                        <?php echo $rep->contact ?>
          						</ul>
      					    </div>
      					    <div class="6u 12u(mobile)">
          						<ul class="fa-ul">
                        <?php echo $rep->links ?>
          						</ul>
      					    </div>
        					</div>
    					  </div>
    					</div>
					</section>
<?php
  } // end foreach $pageRepresentative
?>
			</div>

<?php include $app->templatePath.'block-footer.php'; ?>

	</body>
</html>