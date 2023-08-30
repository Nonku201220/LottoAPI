<?php
require_once('db.config.php');

// Fetch XML data from the API
$xml_data = file_get_contents("https://www.nationallottery.co.za/xmlfeed/powerball.xml");
$xml = simplexml_load_string($xml_data);

// Insert data into LottoPlus2 table
foreach ($xml->record as $record) {
    $draw_date = $record->field[0]['value'];
    $next_draw_date = $record->field[1]['value'];
    $draw_number = (int)$record->field[2]['value'];
    $Ball1 = (int)$record->field[3]['value'];
    $Ball2 = (int)$record->field[4]['value'];
    $Ball3 = (int)$record->field[5]['value']; 
    $Ball4 = (int)$record->field[6]['value'];
    $Ball5 = (int)$record->field[7]['value'];
    $Powerball = (int)$record->field[8]['value'];
    $Div1Winners = (int)$record->field[9]['value'];
    $Div1Payout = (float)$record->field[10]['value'];
    $Div2Winners = (int)$record->field[11]['value'];
    $Div2Payout = (float)$record->field[12]['value'];
    $Div3Winners = (int)$record->field[13]['value'];
    $Div3Payout = (float)$record->field[14]['value'];
    $Div4Winners = (int)$record->field[15]['value'];
    $Div4Payout = (float)$record->field[16]['value'];
    $Div5Winners = (int)$record->field[17]['value'];
    $Div5Payout = (float)$record->field[18]['value'];
    $Div6Winners = (int)$record->field[19]['value'];
    $Div6Payout = (float)$record->field[20]['value'];
    $Div7Winners = (int)$record->field[21]['value'];
    $Div7Payout = (float)$record->field[22]['value'];
    $Div8Winners = (int)$record->field[23]['value'];
    $Div8Payout = (float)$record->field[24]['value'];
    $Div9Winners = (int)$record->field[25]['value'];
    $Div9Payout = (float)$record->field[26]['value'];
    $RolloverAmount = (float)$record->field[27]['value'];
    $RolloverNumber = (int)$record->field[28]['value'];
    $TotalPrizePool = (float)$record->field[29]['value'];
    $TotalSales = (float)$record->field[30]['value'];
    $EstimatedJackpot = (float)$record->field[31]['value'];
    $GuaranteedJackpot = (float)$record->field[32]['value'];
    $DrawMachine = $record->field[33]['value'];
    $BallSet = $record->field[34]['value'];
    $PowerballDrawMachine = $record->field[35]['value'];
    $GPWinners = (int)$record->field[36]['value'];
    $WCWinners = (int)$record->field[37]['value'];
    $NCWinners = (int)$record->field[38]['value'];
    $ECWinners = (int)$record->field[39]['value'];
    $MPWinners = (int)$record->field[40]['value'];
    $LPWinners = (int)$record->field[41]['value'];
    $FSWinners = (int)$record->field[42]['value'];
    $KZNWinners = (int)$record->field[43]['value'];
    $NWWinners = (int)$record->field[44]['value'];

    $stmt = $conn->prepare("INSERT INTO powerball (DrawDate, NextDrawDate, DrawNumber, Ball1, Ball2, Ball3, Ball4, 
    Ball5, Powerball, Div1Winners, Div1Payout, Div2Winners, Div2Payout, Div3Winners, Div3Payout, Div4Winners, 
    Div4Payout, Div5Winners, Div5Payout, Div6Winners, Div6Payout, Div7Winners, Div7Payout, Div8Winners, Div8Payout,  Div9Winners, Div9Payout,
    RolloverAmount, RolloverNumber, TotalPrizePool, TotalSales, EstimatedJackpot, GuaranteedJackpot, DrawMachine,
    BallSet, PowerballDrawMachine, GPWinners, WCWinners, NCWinners, ECWinners, MPWinners, LPWinners, FSWinners, KZNWinners, NWWinners) 
    VALUES (:draw_date, :next_draw_date, :draw_number, :Ball1, :Ball2, :Ball3, :Ball4, :Ball5, :Powerball, 
    :Div1Winners, :Div1Payout, :Div2Winners, :Div2Payout, :Div3Winners, :Div3Payout, :Div4Winners, :Div4Payout, 
    :Div5Winners, :Div5Payout, :Div6Winners, :Div6Payout, :Div7Winners, :Div7Payout, :Div8Winners, :Div8Payout, :Div9Winners, :Div9Payout,
    :RolloverAmount, :RolloverNumber, :TotalPrizePool, :TotalSales, :EstimatedJackpot, :GuaranteedJackpot, :DrawMachine,
    :BallSet, :PowerballDrawMachine, :GPWinners, :WCWinners, :NCWinners, :ECWinners, :MPWinners, :LPWinners, :FSWinners, :KZNWinners, :NWWinners)");

     // Bind values to parameters
     $stmt->bindValue(':draw_date', $draw_date);
     $stmt->bindValue(':next_draw_date', $next_draw_date);
     $stmt->bindValue(':draw_number', $draw_number);
     $stmt->bindValue(':Ball1', $Ball1);
     $stmt->bindValue(':Ball2', $Ball2);
     $stmt->bindValue(':Ball3', $Ball3);
     $stmt->bindValue(':Ball4', $Ball4);
     $stmt->bindValue(':Ball5', $Ball5);
     $stmt->bindValue(':Powerball', $Powerball);
     $stmt->bindValue(':Div1Winners', $Div1Winners);
     $stmt->bindValue(':Div1Payout', $Div1Payout);
     $stmt->bindValue(':Div2Winners', $Div2Winners);
     $stmt->bindValue(':Div2Payout', $Div2Payout);
     $stmt->bindValue(':Div3Winners', $Div3Winners);
     $stmt->bindValue(':Div3Payout', $Div3Payout);
     $stmt->bindValue(':Div4Winners', $Div4Winners);
     $stmt->bindValue(':Div4Payout', $Div4Payout);
     $stmt->bindValue(':Div5Winners', $Div5Winners);
     $stmt->bindValue(':Div5Payout', $Div5Payout);
     $stmt->bindValue(':Div6Winners', $Div6Winners);
     $stmt->bindValue(':Div6Payout', $Div6Payout);
     $stmt->bindValue(':Div7Winners', $Div7Winners);
     $stmt->bindValue(':Div7Payout', $Div7Payout);
     $stmt->bindValue(':Div8Winners', $Div8Winners);
     $stmt->bindValue(':Div8Payout', $Div8Payout);
     $stmt->bindValue(':Div9Winners', $Div9Winners);
     $stmt->bindValue(':Div9Payout', $Div9Payout);
     $stmt->bindValue(':RolloverAmount', $RolloverAmount);
     $stmt->bindValue(':RolloverNumber', $RolloverNumber);
     $stmt->bindValue(':TotalPrizePool', $TotalPrizePool);
     $stmt->bindValue(':TotalSales', $TotalSales);
     $stmt->bindValue(':EstimatedJackpot', $EstimatedJackpot);
     $stmt->bindValue(':GuaranteedJackpot', $GuaranteedJackpot);
     $stmt->bindValue(':DrawMachine', $DrawMachine);
     $stmt->bindValue(':BallSet', $BallSet);
     $stmt->bindValue(':PowerballDrawMachine', $PowerballDrawMachine);
     $stmt->bindValue(':GPWinners', $GPWinners);
     $stmt->bindValue(':WCWinners', $WCWinners);
     $stmt->bindValue(':NCWinners', $NCWinners);
     $stmt->bindValue(':ECWinners', $ECWinners);
     $stmt->bindValue(':MPWinners', $MPWinners);
     $stmt->bindValue(':LPWinners', $LPWinners);
     $stmt->bindValue(':FSWinners', $FSWinners);
     $stmt->bindValue(':KZNWinners', $KZNWinners);
     $stmt->bindValue(':NWWinners', $NWWinners);

    // Execute the prepared statement
    $stmt->execute();
}

$stmt->closeCursor(); // Close the cursor for the next iteration
$conn = null; // Close the connection
?>