<?php
namespace PoliticallyBarrie;

$page->htmlTitle = $page->title . $page->siteTitle;
include $app->templatePath.'block-html-start.php';
?>
<html>
    <head>
<?php include $app->templatePath.'block-html-header.php'; ?>
    </head>
    <body class="is-preload">
<?php include $app->templatePath.'block-header.php';

$sectionsList = '<ul class="sectionJump box highlight style2"><li>Jump to section:</li>';
if ($page->election->showResults)
    $sectionsList .= '<li><a href="#results" class="icon fa-bar-chart"> Election Results</a></li>';
if ($page->election->showOverview)
    $sectionsList .= '<li><a href="#overview" class="icon fa-info-circle"> Election Overview</a></li>';
if ($page->election->showListing)
    $sectionsList .= '<li><a href="#listing" class="icon fa-list"></span> Candidate Listing</a></li>';
if ($page->election->showSurvey)
    $sectionsList .= '<li><a href="#survey" class="icon fa-commenting-o"></span> Survey Results</a></li>';
$sectionsList .= '<li><a href="'.$app->websiteUri.'/vote/" class="icon fa-chevron-left"></span> Other elections</a></li></ul>' .
    '<p class="box highlight style3">See a mistake? Email <a href="mailto:shawn@politicallybarrie.ca">Shawn@PoliticallyBarrie.ca</a> with updates.</p>';

if ($page->election->showContents) {
?>
        <!-- Wrapper -->
        <section id="contents" class="wrapper">
            <div class="inner">
                <h1 class="major"><?php echo $page->election->name; ?></h1>
				<?php echo $sectionsList; ?>
             </div>
        </section>
<?php
}

if ($page->election->showResults) include $app->templatePath.'vote-election-results.php';
if ($page->election->showOverview) include $app->templatePath.'vote-election-overview.php';
if ($page->election->showListing) include $app->templatePath.'vote-election-listing.php';
if ($page->election->showSurvey) include $app->templatePath.'vote-election-survey.php';

include $app->templatePath.'block-footer.php';
?>
    </body>
</html>