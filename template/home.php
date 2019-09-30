<?php include $app->templatePath.'block-html-start.php'; ?>
<html>
	<head>
<?php include $app->templatePath.'block-html-header.php'; ?>
	</head>
	<body class="is-preload">

		<!-- Sidebar -->
		<section id="sidebar">
			<div class="inner">
				<nav>
					<ul>
<?php include $app->templatePath.'block-nav.php'; ?>
					</ul>
				</nav>
			</div>
		</section>

		<!-- Wrapper -->
		<div id="wrapper">

			<!-- Intro -->
			<section id="intro" class="wrapper style1 fullscreen fade-up">
				<div class="inner">
					<h1 id="homeTitle"><?php echo $app->siteName; ?></h1>
					<p>Hi. I'm Shawn. I've always been interested in politics. I just want to make it easier for people to be engagaged in politics, either by <a href="/vote/">finding your candidates and voting</a>, <a href="/reps/">contact your representative</a> or <a href="/groups/">helping you volunteer somewhere</a>.</p>
					<ul class="actions">
						<li><a href="/vote/2019-federal" class="button primary">Oct 21 Election</a></li>
						<li><a href="/reps/" class="button primary">Your Reps</a></li>
						<li><a href="/vote/" class="button ">Past Elections</a></li>
						<li><a href="/groups/" class="button ">Groups/Parties</a></li>
					</ul>
				</div>
			</section>


			<!-- Two -->
			<section id="sections" class="wrapper style3 fade-up">
				<div class="inner">
					<h2>Your Information is here</h2>
					<p>Below is the sections of this website that you can use to find all sorts of information.</p>
					<div class="features">
						<section>
							<span class="icon major fa-institution"></span>
							<h3><a href="/reps/">Your Representatives</a></h3>
							<p>I have collected data about all the representatives for every region in Barrie are. By selecting your ward, you will see who your MP, MPP, Mayor, Ward and school board trustee is.</p>
						</section>
						<section>
							<span class="icon major fa-check"></span>
							<h3><a href="/vote/">Vote Data</a></h3>
							<p>Here, I make a page for each election. Some past election pages are also available here, so you can see who ran. This is where election survey data goes. It's a great way to learn more about your candidates. Eventually this will include election results.</p>
						</section>
						<section>
							<span class="icon major fa-users"></span>
							<h3><a href="/groups/">Local Groups</a></h3>
							<p>I've tried collecting local groups that are active in the Barrie area. This includes political parties, lobby groups and even social media groups.</p>
						</section>
						<section>
							<span class="icon major fa-bar-chart"></span>
							<h3><a href="/stats/">Stats</a></h3>
							<p>Charts, graphs, maps and other data about past elections and the Greater Barrie Area. (Individual election results will probably be under vote data.)</p>
						</section>
					</div>
				</div>
			</section>



			<!-- Three -->
			<section class="wrapper style1 fade-up">
				<div class="inner">
					<h2>Get in touch</h2>
					<p>Got info? If you know something that should be updated, added or corrected on this website, let me know. This is a hobby for me. If you have connections or work for groups, parties or representatives mentioned here, I'm happy to hear any additional information you have.</p>
					<div class="split style1">
						<section>
							<form method="post" action="https://formspree.io/shawn@politicallybarrie.ca">
								<div class="fields">
									<div class="field half">
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="text" name="email" id="email" />
									</div>
									<div class="field">
										<label for="email">Topic / Subject</label>
										<select name="_subject">
										    <option value="Politically Barrie Feedback">General Feedback</option>
										    <option value="Politically Barrie Correction">Correction</option>
										    <option value="Politically Barrie Comment from Candidate/Staff">Comment from Candidate/Staff</option>
										    <option value="Politically Barrie Suggestions">Suggestions</option>
										    <option value="Politically Barrie New Information">New Information</option>
										</select>
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="5"></textarea>
									</div>
								</div>
								<input type="hidden" name="_next" value="http://politicallybarrie.ca/#sent" />
								<ul class="actions">
									<li><a href="" class="button submit">Send Message</a></li>
								</ul>
							</form>
						</section>
						<section>
							<ul class="contact">
								<li>
									<h3>Email</h3>
									<a href="mailto:shawn@politicallybarrie.ca">shawn@politicallybarrie.ca</a>
								</li>
								<li>
									<h3>Social</h3>
									<ul class="icons">
										<li><a href="#" class="fa-facebook"><span class="label">Facebook</span> Politically Barrie Page</a></li>
										<li><a href="#" class="fa-facebook"><span class="label">Facebook</span> Politically Barrie Group</a></li>
									</ul>
								</li>
							</ul>
						</section>
					</div>
				</div>
			</section>

		</div>

<?php include $app->templatePath.'block-footer.php'; ?>

	</body>
</html>