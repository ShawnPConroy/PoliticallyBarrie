<?php
namespace PoliticallyBarrie;

/**
 * Display the groups yaml.
 */
function showGroups($app, $page)
{
    $page->htmlTitle = "Local Groups";
    $page->ogTitle = $page->htmlTitle;
    $page->ogDescription = "A list of political parties, advocacy groups and discussion forums for Barrie.";
    $page->ogImage = $app->imagesPath.'og-images/pb-groups-0.png';
    
    // Get representatives data
    $groupsData = yaml_parse_file($app->groupsFile);
    if ($groupsData == false) {
        exit("Failed to read groups data file.");
    }
    processGroups($groupsData, $app, $page);
    include $app->templatePath.'groups.php';
}




function processGroups($groupsData, $app, $page)
{
    
    foreach ($groupsData as $categoryName => $categoryData) {
        $currentCategory = new \stdClass();
        $currentCategory->name = $categoryName;
        $currentCategory->description = $categoryData['Description'];
        
        foreach ($categoryData['Groups'] as $groupName => $groupInfo) {
            if (!is_array($groupInfo)) {
                continue;
            }
            $currentGroup = new \stdClass();
            $currentGroup->name = $groupName;
            $currentGroup->description = $groupInfo['Description'];
            $currentGroup->details = "";
      
            foreach ($groupInfo as $dataName => $dataDescription) {
                if ($dataName != 'Description') {
                    $currentGroup->details .= generateDetailLi($dataName, $dataDescription, $app);
                }
            } // foreach $groupInfo
            $currentCategory->groups[] = $currentGroup;
        } // foreach $categoryData['Groups']
        $categories[$categoryName] = $currentCategory;
    } // foreach $groupsData
    $page->groups = $categories;
  return;
}