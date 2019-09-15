<?php

include_once "/home/jsnowban/public_html/politicallybarrie.ca/php/provincial-data.php";
//include_once "/home/jsnowban/public_html/politicallybarrie.ca/php/federal-data.php";
include_once "/home/jsnowban/public_html/politicallybarrie.ca/php/municipal-data.php";

$c = 0;

function showMunicipalCandidates( $candidate ) {
 $pastelColours     = array("#FF8E8E","#E994AB","#FF2DFF","#CB59E8","#9191FF","#67C7E2","#A5D3CA","#E1E1A8","#DECF9C","#DAAF85","#DAA794","#CF8D72","#DAAC96","#D1A0A0");
 $foregroundColours = array("black",  "black",  "black",  "black",  "black",  "black",  "black",  "black",  "black", "black","black","black","black","black");
 global $c; // Index for pastel colours
 
 foreach( $candidate as $candidateLastName => $data ) {
  echo " <!-- $candidateLastName -->";
  $candidateColour = $pastelColours[$c++];
  $c = $c % count($pastelColours);
  $candidateForeColour = $foregroundColours[$c];
  
  echo "<div class='candidateInfo' id='$candidateLastName' style='background-color: $candidateColour; color: $candidateForeColour;'>\n\r";

    // Display all information
    foreach( $data as $datum => $content ) {
    
     // Display this peice of info
     
     if( $datum == 'Name' ) {
      echo "  <em>$content</em><br/>\n\r";
     } else if ( strpos($content, 'http') !== false ) {
      echo "  $datum: <a href='$content'>$content</a><br/>\n\r";     	
     } else if ( strpos($content, 'mailto') !== false ) {
      $email = substr($content, 7);
      echo "  $datum: <a href='$content'>$email</a><br/>\n\r";     	
     } else if ( empty($content) ) {
     	// Ignore
     } else if ( $datum == 'facebook' ) {
      echo "<a href='$content'><img src='/images/$datum.png' /></a> ";
     } else {
      echo "  $datum: $content<br/>\n\r";
     }
    }

  echo "</div>";
 }
 echo "<!-- end smc function -->";
 return;
}




/** Old Provincial Election Code -- Needs to be updated **/
function showCandidatesOld( $candidate ) {
 
 // For every candidate/party combination make a info box
 foreach( $candidate as $party => $data ) {
  echo "<div class='candidateInfo' id='$party'>\n\r";
  
  // For each set of data (candidate / party )
  foreach( $data as $type => $infoBlock ) {
   echo " <div class='$type'>\n\r";
   
    // Display all information
    foreach( $infoBlock as $datum => $content ) {
    
     // Display this peice of info
     if( $datum == 'name' ) {
      echo "  <em>$content</em><br/>\n\r";
     } else if ( strpos($content, 'http') !== false ) {
      echo "  $datum: <a href='$content'>$content</a><br/>\n\r";     	
     } else if ( strpos($content, 'mailto') !== false ) {
      $email = substr($content, 7);
      echo "  $datum: <a href='$content'>$email</a><br/>\n\r";     	
     } else if ( empty($content) ) {
     	// Ignore
     } else if ( $datum == 'facebook' ) {
      echo "<a href='$content'><img src='/images/$datum.png' /></a> ";
     } else {
      echo "  $datum: $content<br/>\n\r";
     }
     
    }
   echo " </div>\n\r";
  }
  echo "</div>\n\r"; // candidateInfo
 }
 
 return;
}



function showInfo ($info ) {
    // Display all information
    foreach( $info as $datum => $content ) {
    
     // Display this peice of info
     if( $datum == 'name' ) {
      echo "  <em>$content</em><br/>\n\r";
     } else if ( strpos($content, 'http') !== false ) {
      echo "  $datum: <a href='$content'>$content</a><br/>\n\r";     	
     } else if ( strpos($content, 'mailto') !== false ) {
      $email = substr($content, 7);
      echo "  $datum: <a href='$content'>$email</a><br/>\n\r";     	
     } else if ( empty($content) ) {
     	// Ignore
     } else if ( $datum == 'facebook' ) {
      echo "<a href='$content'><img src='/images/$datum.png' /></a> ";
     } else {
      echo "  $datum: $content<br/>\n\r";
     }
     
    }

}



function showSocialInfo ($info ) {
    // Display all information
    foreach( $info as $datum => $content ) {
     // Display this peice of info
      echo "<a href='$content'><img src='/images/pace/$datum.png' /></a> ";
     
    }
	echo  "<br/>\n\r";
}




function showCandidates( $candidate ) {
 
 // For every candidate/party combination make a info box
 foreach( $candidate as $party => $data ) {
  echo "<div class='candidateInfo' id='$party'>\n\r";
  
  // Show Candidate information first
  
   echo " <div class='candidate'>\n\r";
   showInfo( $data['candidate']);
   showSocialInfo( $data['candidateSocial'] );
   echo " </div>\n\r";

   echo " <div class='party'>\n\r";
   showInfo( $data['party'] );
   showSocialInfo( $data['partySocial'] );
   echo " <strong>Local party</strong><br/>\n\r";
   showInfo( $data['localParty'] );
   showSocialInfo( $data['localSocial'] );
   echo " </div>\n\r";
  
  echo "</div>\n\r"; // candidateInfo
 }
 
 return;
}

?>