<?php
namespace PoliticallyBarrie;

include $app->templatePath.'block-html-start.php';
?>
<html>
	<head>
<?php include $app->themePath.'block-html-header.php'; ?>
	</head>
	<body class="is-preload">

<?php include $app->templatePath.'block-header.php' ?>

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<section id="main" class="wrapper">
						<div class="inner">
							<h1 class="major">Local Groups</h1>
							<p>Here I'm collecting local advocacy organizations, political parties and discussion forums for people who want to discuss or volunteer in Barrie. If you have more, let me know! I want to make it easy for people to get involved with politics.</p>
<?php
                foreach ($page->groups as $category) {
                    ?>
                <h2><?php echo $category->name; ?></h2>
                <?php echo $app->parsedown->line($category->description); ?>
                <div class="row">
                  
<?php
                  foreach ($category->groups as $group) {
                      ?>
                  <div class="4u 12u(mobile)"><div class="box highlight style2">
                    <h3><?php echo $group->name; ?></h3>
                    <p><?php echo $group->description ?></p>
                    <ul class="fa-ul">
                    <?php echo $group->details; ?>
                    </ul>
                  </div></div>
<?php
                  } // foreach group
                echo "</div>"; // class="row";
                } // foreach category
?>
						</div>
					</section>

			</div>

<?php include $app->templatePath.'block-footer.php'; ?>

	</body>
</html>