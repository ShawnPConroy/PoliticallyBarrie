<?php
namespace PoliticallyBarrie;

/**
 * Show the election pages
 */
function showVote($app, $page)
{
    $page->title = "Barrie Elections";
    $page->htmlTitle = $page->pageTitleShort;
    $page->ogTitle = $page->htmlTitle;
    $page->ogDescription = "Barrie Election results, candidate list and survey responses.";
    $page->ogImage = $app->imagesPath.'og-images/pb-vote-0.png';

    $election = $page->path[2]; //$_REQUEST['election'];
    $level = substr($election, 5);
    
    if ($election=="2011-federala" || $election=="2015-federala") {
        include $app->templatePath."vote-$election.php";
    }
    elseif ($level=='federal' || $level=='provincial' || $level=='municipal') {
        showElection($election, $level, $app, $page);
    }
    elseif (empty($election)) {
        include $app->templatePath.'vote.php';
    }
    else {
        $page->content = "Oops, the link you followed is broken. Choose an election from below.";
        $page->title = "404: Link error";
        include $app->templatePath.'vote.php';
    }
    
    return;
}

// Should be showVoteData
function showElection($election, $level, $app, $page)
{
    switch ($level) {
        case 'municipal':
            $voteData = yaml_parse_file($app->voteMunicipalFile);
            break;
        case 'provincial':
            $voteData = yaml_parse_file($app->voteProvincialFile);
            break;
        case 'federal':
            $voteData = yaml_parse_file($app->voteFederalFile);
            break;
    }
    if ($voteData == false) {
        exit("Failed to read $level vote data file.");
    }
    $page->election = new Election($voteData, $election, $voteData[$election.'-questions'], $app);
    if (!empty($page->election->ogImage))
        $page->ogImage = $app->imagesPath.'og-images/'.$page->election->ogImage;
    //$page->voteData = $voteData[$election]; // remove?
    // print_r($page->election);
    // die("test");
    //$page->title = $page->election->name;
    //$page->htmlTitle = $page->pageTitleShort = $page->title;
    include $app->templatePath."vote-election.php";
}