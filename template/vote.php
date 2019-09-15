<?php
$page->htmlTitle = $page->title . $page->siteTitle;
$page->ogImage = $app->imagesPath.'og-images/pb-vote-0.png';
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
					<h1 class="major"><?php echo $page->title; ?></h1>
					<?php if (!empty($page->content)) echo $app->parsedown->text($page->content); ?>
					<p>The election section of the website is divided up in to three categories of pages. First, I've copied data from elections I covered with this website in the past. These will include campaign office data, and links to additional information in some cases. And, starting with the 2018 municipal election, responses to surveys I sent out. Second, I will be loading in historic data of previous elections. Obviously, I haven't finished this yet. Finally, I this will have election pages for upcoming election. This will include candidate info, links to party platforms, campaign offices, profiles, links to completed surveys and possibly responses to my own surveys if I continue doing that.</p>
  				<div class="row">
  				    <div class="4u 12u(mobile)">
						<ul>
      					    <li>Upcoming: 2019 Federal Election</li>
      					    <li><a href="/vote/2015-federal">2015 Federation Election</a> (<a href="/vote/2015-federala">old</a>)</li>
      					    <li><a href="/vote/2011-federal">2011 Federation Election</a> (<a href="/vote/2011-federala">old</a>)</li>
      					    <li><a href="/vote/2008-federal">2008 Federation Election</a></li>
      					    <li><a href="/vote/2006-federal">2006 Federation Election</a></li>
						</ul>
  				    </div>
  				    <div class="4u 12u(mobile)">
						<ul>
      					    <li><a href="/vote/2018-provincial">2018 Provincial Election</a></li>
      					    <li><a href="/vote/2014-provincial">2014 Provincial Election</a></li>
      					    <li><a href="/vote/2011-provincial">2011 Provincial Election</a></li>
      					    <li><a href="/vote/2007-provincial">2007 Provincial Election</a></li>
						</ul>
  				    
  				    </div>
  				    <div class="4u 12u(mobile)">
						<ul>
      					    <li><a href="/vote/2018-municipal">2018 Municipal Election</a></li>
      					    <li><a href="/vote/2016-municipal">2016 Municipal By-Election</a></li>
      					    <li><a href="/vote/2014-municipal">2014 Municipal Election</a></li>
      					    <li><a href="/vote/2010-municipal">2010 Municipal Election</a></li>
      					    <li><a href="/vote/2006-municipal">2006 Municipal Election</a></li>
						</ul>
  				    </div>
  				</div>	
				</div>
			</section>

		</div>

<?php include $app->templatePath.'block-footer.php'; ?>

	</body>
</html>