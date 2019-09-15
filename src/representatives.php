<?php
namespace PoliticallyBarrie;

/**
 * Shows the representatives.
 **/
function showReps($app, $page)
{
    // Get representatives data
    $page->repData = yaml_parse_file($app->repsFile);
    if ($page->repData == false) {
        exit("Failed to read representatives data file.");
    }
    $location = $page->path[2];
    getWardReps($page->repData['Wards'][$location], $app, $page);
    $page->pageTitle = "Barrie Representatives";
    $page->htmlTitle = $page->ogTitle = $page->pageTitleShort = $page->pageTitle;
    $page->regionReps = $page->repData['Wards'][$location];
    $page->ogDescription = "A list of reps and contact info for Barrie: MP, MPP, mayor, councilor and trustee.";
    $page->ogImage = $app->imagesPath.'og-images/pb-reps-0.png';
  
    if (!empty($location) && !empty($page->repData['Wards'][$location])) {
        $page->title = "Your " . $page->repData['Wards'][$location]['Name'] . " Representatives";
        $page->pageTitleShort = $page->repData['Wards'][$location]['Name'] . " Representatives";
        $page->htmlTitle = $page->ogTitle = $page->pageTitleShort;
        $page->ogDescription = "A list of reps and contact info for ".$regionName.": MP, MPP, mayor, councilor and trustee.";
        include $app->templatePath.'representatives-ward.php';
    } else {
        // Show list of all regions
        if ($location == '404' || (!empty($location) && empty($page->repData['Wards'][$location]))) {
            // Show error page saying the link is broken
            $page->pageTitle = '404: Broken Link';
            $page->pageTitleShort = '404: Broken Link';
            $page->content = "Oops, it looks like the link you followed is broken. To find you elected representatives, select your ward from the list:";
        } elseif (empty($location)) {
            $page->content = "To find you elected representatives, select your ward from the list:";
        }
        include $app->templatePath.'representatives.php';
    }
}



function getWardReps($wardReps, $app, &$page)
{
    foreach ($wardReps as $officeShort => $info) {
        // Skip if it's not an array of rep data
        if (is_array($info)) {
            $contact = "";
            $links = "";
            unset($currentRep);
            $currentRep = new \stdClass();
            
            // Collect details
            foreach ($info as $key => $value) {
                $currentInfo = generateDetailLi($key, $value, $app);
                
                if ($key == 'Email' || $key == 'Phone' || $key == 'Fax' || $key == 'Address'){
                    $contact .= $currentInfo;
                }
                else {
                    $links .= $currentInfo;
                }
                
            }
            
            // Pull together rep data
            $summary = 'Your '.$info['Office'].' is '.$info['Name'].'.';
            if (!empty($info['Party'])) {
                $summary .= ' '.ucfirst(pronoun($info['Gender'], 'be')).' a member of the '.$info['Party'].'.';
            }
            
            $currentRep->header = $officeShort.': '.$info['Name'];
            if (!empty($info['Party Short Form'])) {
                $currentRep->header .= " (".$info['Party Short Form'].")";
            }
            $currentRep->contact = $contact;
            $currentRep->links = $links;
            $currentRep->summary = $summary;
            $currentRep->officeShort = $officeShort;
            $currentRep->id = generateId($officeShort);
            $wardRepsSummary[] = "<a href=\"#" . $currentRep->id . "\">" . $info['Name'] . "</a> (" . $officeShort . ")";
            $page->wardReps[] = $currentRep;
        } // end foreach $pageRepresentative
    }
  
    // Sumarise ward reps
    $page->content = "Your representatives are " . generateList($wardRepsSummary, ", ", " and ") . ".";
} // end function getWardReps();