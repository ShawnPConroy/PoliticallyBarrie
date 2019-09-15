<?php
namespace PoliticallyBarrie;

include_once './lib/Parsedown.php';
include_once './src/lib.php';
include_once './src/request.php';
include_once './src/representatives.php';
include_once './src/groups.php';
include_once './src/stats.php';
include_once './src/vote.php';
include_once './src/Election.php';

$app = new \stdClass();
$app->siteUrl = 'http://politicallybarrie.ca/';
$app->siteName = 'Politically Barrie';
$app->repsFile = './data/representatives.yaml';
$app->groupsFile = './data/groups.yaml';
$app->voteFederalFile = './data/vote-federal.yaml';
$app->voteProvincialFile = './data/vote-provincial.yaml';
$app->voteMunicipalFile = './data/vote-municipal.yaml';
$app->statsFile = './data/stats.yaml';
$app->templatePath = "./template/";
$app->imagesPath = $app->siteUrl."images/";
$app->parsedown = new \Parsedown();