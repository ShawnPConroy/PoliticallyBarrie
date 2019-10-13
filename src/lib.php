<?php
namespace PoliticallyBarrie;

function generateList($list, $seperator, $finalSeperator = null) {
    if ($finalSeperator == null) $finalSeperator = $seperator;
    $num = count($list);
    if ($num == 1) {
        $listText = $list[0];
    }
    else if ($num > 1) {
        $finalItem = array_pop($list);
        $listText = implode($seperator, $list) . $finalSeperator . $finalItem;
    }
    else {
        $listText = "";
    }
    return $listText;
}



// Based on www.mendoweb.be/blog/php-convert-string-to-camelcase-string/
function makeId($str, array $noStrip = []) {
    generateId($str, $noStrip);
}

function generateId($str, array $noStrip = [])
{
    // non-alpha and non-numeric characters become spaces
    $str = strtolower($str);
    $str = preg_replace('/[^a-z0-9' . implode("", $noStrip) . ']+/i', ' ', $str);
    $str = trim($str);
    // uppercase the first character of each word
    $str = ucwords($str);
    $str = str_replace(" ", "", $str);
    $str = lcfirst($str);

    return $str;
}


// she has / they have / had... he is / they are
// Returns sentence fragment... use ucfirst to capitalize
function pronoun($gender, $context) {
    switch ($context) {
        case 'be':
            switch ($gender) {
                case 'Female':
                    $fragment = "she is";
                    break;
                case 'Male':
                    $fragment = 'he is';
                    break;
                default:
                    $fragment = 'they are';
                    break;
            }
            break;
        case 'possessive':
            switch ($gender) {
                case 'Female':
                    $fragment = "her";
                    break;
                case 'Male':
                    $fragment = 'his';
                    break;
                default:
                    $fragment = 'their';
                    break;
            }
            break;
    }
    
    return $fragment;
}

function getUsername($dataDescription) {
    if (empty(dataDescription)) {
        return "";
    }
    // Get username
    $urlPath = explode('/', $dataDescription);
    while (empty($username = array_pop($urlPath))) {
        //Advance until true
    }
    return $username;
}


function generateDetail($dataName, $dataDescription, $displayType, $app)
{
    
    if (is_array($dataDescription)) {
        if ($dataName == 'Advance Voting') {
            $result .= generateDetail_item("Advance Voting Date", "Advance Voting", 'li', $app);
            $result .= '<ul class="fa-ul">';
            $closeUl = '</ul>';
        }
        foreach ($dataDescription as $currentKey => $currentData) {
            if ($dataName == 'Link') {
                $link['link'] = $currentData;
                $link['text'] = $currentKey;
                $currentData = $link;
            }
            $result .= generateDetail_item($dataName, $currentData, 'li', $app);
        }
        return $result.$closeUl;
    }
    
    return generateDetail_item($dataName, $dataDescription, $displayType, $app);
}


function generateDetail_item($type, $data, $displayType, $app) {
    switch ($type) {
        case 'Email':
            $link = 'mailto:'.$data;
            $icon = 'fa-envelope';
            $aria = 'email';
            $text = $data;
            break;
        case 'Phone':
            $icon = 'fa-phone';
            $aria = 'phone number';
            $text = $data;
            break;
        case 'Election Day':
            $icon = 'fa-check';
            $aria = '';
            $text = $type .": ". $data;
            break;
        case 'Advance Voting':
            $icon = 'fa-angle-right';
            $aria = '';
            $text = $data;
            break;
        case 'Advance Voting Date':
            $icon = 'fa-arrow-circle-up';
            $aria = '';
            $text = $data;
            break;
        case 'City Hall Voting':
            $icon = 'fa-institution';
            $aria = '';
            $text = $type .": ". $data;
            break;
        case 'Fax':
            $icon = 'fa-fax';
            $aria = 'fax';
            $text = $data;
            break;
        case 'Address':
            $icon = 'fa-map-marker';
            $aria = 'address';
            $text = $data;
            $link = 'https://www.google.ca/maps/place/'.strip_tags($data);
            break;
        case 'Facebook Page':
            $icon = 'fa-facebook';
            $aria = 'Facebook page';
            $text = ($displayType=='li') ? getUsername($data) : '';
            $link = $data;
            break;
        case 'Facebook Group':
            $icon = 'fa-facebook';
            $aria = 'Facebook group';
            $text = ($displayType=='li') ? getUsername($data) : '';
            if (is_numeric($text)) {
                $text = $type;
            }
            $link = $data;
            break;
        case 'Facebook Profile':
            $icon = 'fa-facebook';
            $aria = 'Facebook Profile';
            $text = ($displayType=='li') ? getUsername($data) : '';
            $link = $data;
            break;
        case 'Facebook':
            $icon = 'fa-facebook';
            $text = ($displayType=='li') ? $data : '';
            $link = $data;
            break;
        case 'Instagram':
            $icon = 'fa-instagram';
            $aria = 'Instagram';
            $text = ($displayType=='li') ? getUsername($data) : '';
            $link = $data;
            break;
        case 'Twitter':
            $aria = 'Twitter';
            $icon = 'fa-twitter';
            $text = ($displayType=='li') ? getUsername($data) : '';
            $link = $data;
            break;
        case 'LinkedIn':
            $aria = 'LinkedIn';
            $icon = 'fa-linkedin';
            $text = ($displayType=='li') ? getUsername($data) : '';
            $link = $data;
            break;
        case 'YouTube':
            $aria = 'YouTube';
            $icon = 'fa-youtube';
            $text = ($displayType=='li') ? getUsername($data) : '';
            $link = $data;
            break;
        case 'Link':
            $aria = 'link';
            $icon = 'fa-external-link';
            $text = $data['text'];
            $link = $data['link'];
            break;
        case 'Warning':
            $icon = 'fa-warning';
            $text = $data;
            $aria = 'notice';
            break;
        case 'Default':
            if (!($type == 'Name' || $type == 'Party' || $type == 'Party Short Form' || $type == 'Office' || $type == 'Gender')) {
                $icon = 'fa-circle';
                $text = $type.': '.$app['parsedown']->line($data);
            }
    }
    
    
    // create li
    if ($displayType=='icon') {
        $result = '<span class="fa '.$icon.'" aria-label="'.$aria.'"></span> '.$text;
        if (isset($link)) {
            $result = '<a href="'.$link.'">'.$result.'</a>';
        }
        
    }
    if ($displayType=='li') {
        $result = '<span class="fa-li fa '.$icon.'" aria-label="'.$aria.'"></span> '.$text;
        if (isset($link)) {
            $result = '<a href="'.$link.'">'.$result.'</a>';
        }
        $result = '<li>'.$result.'</li>';
    }
  
    return $result;
}

