<?php
namespace PoliticallyBarrie;

function showStats($app, $page)
{
    $page->htmlTitle = "Barrie Stats";
    $page->ogTitle = $page->htmlTitle;
    $page->ogDescription = "A collection of election statistics for Barrie.";
    $page->ogImage = $app->imagesPath.'og-images/pb-stats-0.png';
    

    // Get representatives data
    $statsData = yaml_parse_file($app->statsFile);
    if ($statsData == false) {
        exit("Failed to read stats data file.");
    }
    processStats($statsData, $app, $page);
    include $app->templatePath.'stats.php';
}

function processStats($statsData, $app, $page) {
    foreach ($statsData as $section) {
        $currentRiding = new \stdClass();
        $currentRiding->name = $section['Name'];
        $currentRiding->info = $section['Info'];
        foreach($section['Stats'] as $stat) {
            $currentStat = new \stdClass();
            $currentStat->uri = $stat['URI'];
            $currentStat->description = $stat['Description'];
            $currentRiding->stats[] = $currentStat;
        }
        $page->stats[] = $currentRiding;
    }
}