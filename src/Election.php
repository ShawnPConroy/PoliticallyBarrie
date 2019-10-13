<?php
namespace PoliticallyBarrie;

class Election {
    public $name;
        
    public $showResults;
    public $showOverview;
    public $showListing;
    public $showSurvey;
    public $showContents;
    
    public $eligibleVoters;
    public $voterTurnout;
    public $turnoutPercent;
    
    public $seats;
    public $questions;
    
    function __construct($data, $election, $app) {
        $this->name = $data[$election]['Info']['Name'];
        
        $this->showResults = $data[$election]['Info']['Results'];
        $this->showOverview = $data[$election]['Info']['Overview'];
        $this->showListing = $data[$election]['Info']['Listing'];
        $this->showSurvey = $data[$election]['Info']['Survey'];
        $this->showContents = $data[$election]['Info']['Contents'];
        
        $this->ogImage = $data[$election]['Info']['ogImage'];
        $this->voterIdLink = $data[$election]['Info']['Voter ID'];
        $this->voterRegistrationLink = $data[$election]['Info']['Voter Registration Link'];
        $this->votingLocationLink = $data[$election]['Info']['Voting Locations Link'];
        $this->mapEmbed = $data[$election]['Info']['Map Embed'];
        $this->mapLink = $data[$election]['Info']['Map Link'];
        
        $this->resultsLink = $data[$election]['Info']['Results Link'];
        $this->eligibleVoters = $data[$election]['Info']['Eligible Voters'];
        $this->voterTurnout = $data[$election]['Info']['Voter Turnout'];
        $this->turnoutPercentage = $data[$election]['Info']['Turnout Percentage'];
        
        $this->questions = $data[$election.'-questions'];
        
        foreach ($data[$election]['Info']['Dates'] as $dateType => $date) {
            $this->dates .= generateDetailLi($dateType, $date, $app);
        }
        foreach ($data[$election]['Info']['Additional Links'] as $title => $link) {
            $this->additionalLinks .= generateDetailLi("Link", Array($title => $link), $app);
        }
        
        // Loops through all data in an election.
        // This skips 'Info' since there are no candidates within in.
        foreach($data[$election] as $seatName => $seatData) {
            if ($seatName == 'Info') continue;
            $this->seats[$seatName] = new Seat($seatName, $seatData);
        }
    }
}

Class Seat {
    public $name;
    public $intro;
    public $candidates;
    public $candidatesByPercent;
    
    function __construct($name, $seatData) {
        $this->name = $name;
        $this->intro = $seatData['Info']['Intro'];
        
        $this->resultsLink = $data[$election]['Info']['Results Link'];
        $this->eligibleVoters = $data[$election]['Info']['Eligible Voters'];
        $this->voterTurnout = $data[$election]['Info']['Voter Turnout'];
        $this->turnoutPercentage = $data[$election]['Info']['Turnout Percentage'];
        
        foreach ($seatData['Candidates'] as $candidateName => $candidateData) {
            $candidate = new Candidate($candidateData, $app);
            $this->candidates[$candidate->listingName] = $candidate;
            $this->candidatesByPercent[$candidate->percent] = $candidate;
        }
        ksort($this->candidates);
        krsort($this->candidatesByPercent);
    }
}

class Candidate {
    public $name;
    public $listingName;
    
    public $votes;
    public $percent;
    
    public $detailsLi;
    
    public $responses;
    
    function __construct($data, $app) {
        $this->name = $data['Display Name'];
        $this->listingName = $data['Listing Name'];
        $this->party = $data['Party'];
        
        $this->votes = $data['Votes'];
        $this->percent = $data['Percentage'];
        
        foreach ($data['Social'] as $type => $datum) {
            if ($type != 'Description') {
                $this->detailsLi .= generateDetailLi($type, $datum, $app);
            }
        } // foreach data/detail
        foreach ($data['Info'] as $type => $datum) {
            if ($type != 'Description') {
                $this->detailsLi .= generateDetailLi($type, $datum, $app);
            }
        } // foreach data/detail
        
        $this->responses = $data['Survey'];
        foreach ($this->responses as $qId => $response) {
            if (is_array($response)) {
                $this->responses[$qId.'Clarification'] = $response['Clarification'];
                $this->responses[$qId] = $response['Answer'];
            }
        }

    }
}