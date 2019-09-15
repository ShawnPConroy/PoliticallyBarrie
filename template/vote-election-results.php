<?php
namespace PoliticallyBarrie;
?>
            <section id="results" class="wrapper">
                <div class="inner">
                <h1 class="major"><span class="fa fa-bar-chart"></span> <?php echo $page->election->name; ?> Results</h1>
<?php
if (count($page->election->seats) > 1) {
    
    unset($candidates);
    foreach($page->election->seats as $seat) {
        $candidates[] = '<a href="#'.generateId($seat->name.' Results').'">'.$seat->name.'</a>';
    }
    
    $introText = "";
    
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
                <p>Here are the results of the election. Select your <? echo $regionType; ?> below.<?php echo $introText; ?></p>
                <p><?php echo generateList($candidates, ", "); ?></p>
<?php
}

foreach($page->election->seats as $seat) {
?>
                    <h2 id="<?php echo generateId($seat->name." Results"); ?>"><?php echo $seat->name; ?> Results</h2>
<?php
if (!empty($seat->eligibleVoters) || !empty($seat->voterTurnout)) {
?>
                    <p>Of <?php echo $seat->eligibleVoters; ?> eligible voters, <?php echo $seat->voterTurnout; ?>% voted.</p>
<?php
}
?>
                    <div class="table-wrapper">
                        <table>
                            <colgroup>
                                <col class="candidateName">
                                <col class="min number">
                                <col class="min number">
                                <col>
                            </colgroup>
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Vote</th>
                                    <th>Percent</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
<?php
    $first = true;
    foreach ($seat->candidatesByPercent as $candidate) {
        $elected = "";
        if ($first) {
            $elected .= ' <span class="fa fa-check"></span>';
            $meterLow = $candidate->percent;
            $first = false;
        }
?>
                                <tr>
                                    <td class="candidateName"><strong><?php echo $candidate->name.$elected; ?></strong><br/><?php echo $candidate->party; ?></td>
                                    <td class="number"><?php echo $candidate->votes; ?></td>
                                    <td class="number"><?php echo $candidate->percent; ?>%<br/><?php echo $candidate->change.(!empty($candidate->change)?'%':''); ?></td>
                                    <td><meter class="votes" max="100" low="<?php echo $meterLow; ?>" value="<?php echo $candidate->percent; ?>"></meter></td>
                                </tr>
<?php
    } // endforeach $seat['Candidates']
?>
                            </tbody>
                        </table>
                    <?php echo $sectionsList; ?>
                    </div>
<?php
} // endforeach seat
?>
                </div>
            </section>