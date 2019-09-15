<?php
namespace PoliticallyBarrie;
?>
            <section id="listing" class="wrapper">
                <div class="inner">
                <h1 class="major"><span class="fa fa-list"></span> Candidate Listing</h1>
<?php
unset($candidates);
foreach($page->election->seats as $seatName => $seat) {
    $candidates[] = '<a href="#'.generateId($seatName.' Listing').'">'.$seatName.'</a>';
}

$introText = "";
if ($page->election->showSurvey) $introText = ' All candidate data as well as their survey responses are in the <a href="#survey">survey section</a>.';

switch($level) {
    case 'municipal':
        $regionType = "ward";
        $introText .= " Also, remember to check for the schoolboard trustee for your ward.";
        break;
    case 'provincial':
    case 'federal':
        $regionType = "riding";
        break;
}

?>
                <p>Here is a list of all candidates. Select your <? echo $regionType; ?> below.<?php echo $introText; ?></p>
                <p><?php echo generateList($candidates, ", "); ?></p>
<?php
foreach($page->election->seats as $seatName => $seat) {
?>
                    <h2 id="<?php echo generateId($seatName.' Listing'); ?>"><?php echo $seatName; ?> Candidates</h2>
<?php
        if (!empty($seat->intro)) {
            echo $app->parsedown->text($seat->intro);
        }
?>
                    <div class="row">
                        
<?php
    $first = true;
    foreach ($seat->candidates as $candidate) { 
?>
                    <div class="4u 12u(mobile)">
                        <div class="box highlight style1">
                            <p><strong><?php echo $candidate->name; ?></strong></p>
                            <ul class="fa-ul">
                                <?php echo $candidate->detailsLi; ?>
                            </ul>
                        </div>
                    </div>
<?php
    } // endforeach $seatData['Candidates']
?>
                    </div>
                    <?php echo $sectionsList; ?>
<?php
} // endforeach $page->election (seat)
?>
                </div>
            </section>