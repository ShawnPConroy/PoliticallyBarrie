				<!-- Main -->
					<section id="overview" class="wrapper">
						<div class="inner">
							<h1 class="major"><span class="fa fa-info-circle"></span> <?php echo $page->election->name; ?></h1>
<?php
    if (!empty($page->election->resultsLink)) {
?>
									<p style="text-align: center;"><a href="<?php echo $page->election->resultsLink; ?>" class="button primary icon fa-certificate">View Election Results (unofficial)</a></p>
<?php
    }
?>
							<div class="row">
								<div class="col-6 col-12-medium">
                
                                    <h2><a href="#candidates"><i class="fa fa-users"></i> <span>Candidates</span></a></h2>
                	
                                    <p>I have collected a list of all candidates, and sent them my own survey. I&#8217;ve also linked to surveys from other advocacy organizations. Contact me if you know of more. View my <a href="#candidates">list of all candidates</a>.</p>
    								<ul class="actions">
<?php
    if (!empty($page->election->showSurvey)) {
?>
										<li><a href="#survey" class="button primary small">Survey Responses</a></li>
<?php
    }
?>
										<li><a href="#listing" class="button small">Candidate List</a></li>
									</ul>
                	                
                                    <h2><a href="<?php echo $page->election->voterIdLink; ?>"><i class="fa fa-info"></i> <span>Voter ID</span></a></h2>
                	
            	                    <p>You must have a piece of ID with your name and signature on it. Ontario driver&#8217;s license, photo Health Card or Photo Card. <a href="<?php echo $page->election->voterIdLink; ?>">See the full list of accepted ID</a>.</p>
                                </div>
								<div class="col-6 col-12-medium">
								    <h2><i class="fa fa-calendar-check-o"></i> Election Dates</h2>
								    <ul class="fa-ul">
								        <?php echo $page->election->dates; ?>
								    </ul>
								    
<?php
    if (!empty($page->election->additionalLinks)) {
?>
                                    <h2>External Links</h2>
								    <ul class="fa-ul">
								        <?php echo $page->election->additionalLinks; ?>
								    </ul>
<?php
    }
?>
                                    
								</div> <!-- col-6 -->
								<div class="col-6 col-12-medium">
                                  <h2><a href="<?php echo $page->election->mapLink; ?>"><i class="fa fa-map-marker"></i> <span>Election Map</span></a></h2>
                	
                	                <p>All voting locations are shown on the election map on this page. These are the locations you can vote at during advance voting and on the election date. Click the top icon to view in full screen.</p>
                	                <p>You can also <a href="<?php echo $page->election->votingLocationLink; ?>">view the list of all voting locations</a>. On the voting location page, scroll down for the mobile voting bus dates and locations, as well as long term car, retirement and apartment voting days.</p>
                	                <p>It looks like you can vote at ANY voting location.</p>
								</div> <!-- col-6 -->
								<div class="col-6 col-12-medium">
                                    <iframe src="<?php echo $page->election->mapEmbed; ?>" width="100%" height="700"></iframe>
                                </div>
							</div> <!-- row -->
							<?php echo $sectionsList; ?>
						</div> <!-- inner -->
					</section>
					
