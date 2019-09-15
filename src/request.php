<?php
namespace PoliticallyBarrie;

/**
 * Displays home page.
 */
function showHome($app, $page)
{
    $page->htmlTitle = "Politically Barrie";
    $page->ogTitle = $page->htmlTitle;
    $page->ogDescription = "Barrie political portal: find your MP, MPP and other representatives, election candidates, historic results and local political groups.";
    $page->ogImage = $app->imagesPath.'og-images/pb-generic-0.png';
    
    include $app->templatePath.'home.php';
}


/**
 * Display 404
 * This is based on showing representatives, so make sure both change.
 */
function show404($app, $page)
{
    $page->content = "Oops, it looks like the link you followed is broken. To find you elected representatives, select your ward from the list:";
    $page->path[2] = '404';
    showReps($app, $page);
}


/**
 * Calls the appropriate function based on the url.
 */
function processRequest($app, $appOld = null)
{
    $parsedUrl = parse_url($_SERVER['REQUEST_URI']);
    
    $page = new \stdClass();
    
    $page->path = explode('/', $parsedUrl['path']);
    $page->section = $page->path[1];
    $page->siteTitle = $app->siteTitle;

    $pageOld['path'] = explode('/', $parsedUrl['path']);
    $pageOld['section'] = $pageOld['path'][1];
    $pageOld['siteTitle'] = $appOld['siteTitle'];
    
    switch ($page->section) {
        case 'reps':
            showReps($app, $page);
            break;
        
        case 'vote':
            showVote($app, $page);
            break;
        
        case 'groups':
            showGroups($app, $page);
            break;
        
        case 'stats':
            showStats($app, $page);
            break;
        
        case '':
            showHome($app, $page);
            break;
        
        default:
            show404($app, $page);
            break;
      }
}
