<?php
namespace PoliticallyBarrie;

$introText = ' For only a list of candidates and their contact information, head over to the <a href="#listing">candidate listing section</a>.';

switch($level) {
    case 'municipal':
        $seatType = "ward";
        $introText .= " Also, remember to check for the schoolboard trustee for your ward.";
        break;
    case 'provincial':
    case 'federal':
        $seatType = "riding";
        break;
}

?>
            <section id="survey" class="wrapper">
                <div class="inner">
                <h1 class="major"><span class="fa fa-commenting-o"></span> Survey Responses</h1>
                <p>Here is a list of all candidates and their contact info, along with their responses to the survey, if any. Select your <? echo $seatType; ?> below.<?php echo $introText; ?></p>
<?php
unset($candidates);
foreach($page->election->seats as $seat) {
    $candidates[] = '<a href="#'.generateId($seat->name.' Survey').'">'.$seat->name.'</a>';
}
?>
                <p><?php echo generateList($candidates, ", "); ?></p>
<?php

foreach($page->election->seats as $seat) {
?>
                    <h2 id="<?php echo generateId($seat->name.' Survey'); ?>"><?php echo $seat->name; ?> Surveys</h2>
                        
<?php
    $first = true;
    foreach ($seat->candidates as $candidate) { 
?>
                    <h3><?php echo $candidate->name; ?> Survey Results</h3>
                    <ul class="fa-ul">
                        <?php echo $candidate->detailsLi; ?>
                    </ul>
<?php
        if (!empty($candidate->responses['notice'])) {
?>
                    <h3><span class="fa fa-exclamation-circle"></span> Notice</h3>
                    <p><?php echo $app->parsedown->text($candidate->responses['notice']);?></p>
<?php
        }
?>
                    <div class="row">
                            
<?php
        if (!empty($candidate->responses['qWhy']))
        {
?>
                        <div class="6u 12u(mobile)">
                            <p><em class="questionLabel"><?php echo $page->election->questions['qWhy']['Label']; ?></em> <em><?php echo $page->election->questions['qWhy']['Question']; ?></em></p>
                        </div>
                        <div class="6u 12u(mobile)">
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qWhy']); ?></blockquote>
                        </div>
<?php
        }
        if (!empty($candidate->responses['qValues']))
        {
?>
                        <div class="6u 12u(mobile)">
                            <p><em class="questionLabel"><?php echo $page->election->questions['qValues']['Label']; ?></em> <em><?php echo $page->election->questions['qValues']['Question']; ?></em></p>
                        </div>
                        <div class="6u 12u(mobile)">
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qValues']); ?></blockquote>
                        </div>
<?php
        }
        if (!empty($candidate->responses['qIssues']))
        {
?>
                        <div class="6u 12u(mobile)">
                            <p><em class="questionLabel"><?php echo $page->election->questions['qIssues']['Label']; ?></em> <em><?php echo $page->election->questions['qIssues']['Question']; ?></em></p>
                        </div>
                        <div class="6u 12u(mobile)">
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qIssues']); ?></blockquote>
                        </div>
<?php
        }
        
        if(!empty($candidate->responses['qTaxes'])) {
?>
                        <div class="6u 12u(mobile)">
                            <p><em class="questionLabel"><?php echo $page->election->questions['qTaxes']['Label']; ?></em> <em><?php echo $candidate->questions['qTaxes']['Question']; ?></em></p>
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qTaxes']); ?></blockquote>
                        </div>
                        <div class="6u 12u(mobile)">
<?php
            if(!empty($candidate->responses['qTaxesClarification'])) {
?>
                            <p><em class="questionLabel"><?php echo $page->election->questions['qTaxes']['Clarification Label']; ?></em></p>
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qTaxesClarification']); ?></blockquote>
<?php
            }
?>
                        </div> <!-- taxes -->
<?php
        }
?>
<?php
        if(!empty($candidate->responses['qPot'])) {
?>
                        <div class="6u 12u(mobile)">
                            <p><em class="questionLabel"><?php echo $page->election->questions['qPot']['Label']; ?></em> <em><?php echo $page->election->questions['qTaxes']['Question']; ?></em></p>
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qPot']); ?></blockquote>
                        </div> <!-- pot -->
                        <div class="6u 12u(mobile)">
<?php
            if(!empty($candidate->responses['qPotClarification'])) {
?>
                            <p><em class="questionLabel"><?php echo $page->election->questions['qPot']['Clarification Label']; ?></em></p>
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qPotClarification']); ?></blockquote>
<?php
            }
?>
                        </div> <!-- pot c -->
<?php
        }
        if(!empty($candidate->responses['qSexEd'])) {
?>
                        <div class="6u 12u(mobile)">
                            <p><em class="questionLabel"><?php echo $page->election->questions['qSexEd']['Label']; ?></em> <em><?php echo $page->election->questions['qSexEd']['Question']; ?></em></p>
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qSexEd']); ?></blockquote>
                        </div> <!-- sexed -->
                        <div class="6u 12u(mobile)">
<?php
            if(!empty($candidate->responses['qSexEdClarification'])) {
?>
                            <p><em class="questionLabel"><?php echo $page->election->questions['qSexEd']['Clarification Label']; ?></em></p>
                            <blockquote><?php echo $app->parsedown->text($candidate->responses['qSexEdClarification']); ?></blockquote>
<?php
            }
?>
                        </div> <!-- sexed c -->
<?php
        }
?>
                    </div> <!-- end div.row -->

<?php
    } // endforeach $seat['Candidates']
?>
                    <?php echo $sectionsList; ?>
<?php
} // endforeach seat
?>
                </div>
            </section>