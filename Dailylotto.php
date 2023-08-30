<?php
require_once('db.config.php');
require_once('index.php'); 

// Fetch XML data from the API
$xml_data = file_get_contents("https://www.nationallottery.co.za/xmlfeed/dailylotto.xml");
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
    $Div1Winners = (int)$record->field[8]['value'];
    $Div1Payout = (float)$record->field[9]['value'];
    $Div2Winners = (int)$record->field[10]['value'];
    $Div2Payout = (float)$record->field[11]['value'];
    $Div3Winners = (int)$record->field[12]['value'];
    $Div3Payout = (float)$record->field[13]['value'];
    $Div4Winners = (int)$record->field[14]['value'];
    $Div4Payout = (float)$record->field[15]['value'];
    $RolloverAmount = (float)$record->field[16]['value'];
    $RolloverNumber = (int)$record->field[17]['value'];
    $TotalPrizePool = (float)$record->field[18]['value'];
    $TotalSales = (float)$record->field[19]['value'];
    $EstimatedJackpot = (float)$record->field[20]['value'];
    $GuaranteedJackpot = (float)$record->field[21]['value'];
    $DrawMachine = $record->field[22]['value'];
    $BallSet = $record->field[23]['value'];
    $GPWinners = (int)$record->field[24]['value'];
    $WCWinners = (int)$record->field[25]['value'];
    $NCWinners = (int)$record->field[26]['value'];
    $ECWinners = (int)$record->field[27]['value'];
    $MPWinners = (int)$record->field[28]['value'];
    $LPWinners = (int)$record->field[29]['value'];
    $FSWinners = (int)$record->field[30]['value'];
    $KZNWinners = (int)$record->field[31]['value'];
    $NWWinners = (int)$record->field[32]['value'];

    $stmt = $conn->prepare("INSERT INTO dailylotto (DrawDate, NextDrawDate, DrawNumber, Ball1, Ball2, Ball3, Ball4, 
    Ball5, Div1Winners, Div1Payout, Div2Winners, Div2Payout, Div3Winners, Div3Payout, Div4Winners, 
    Div4Payout,
    RolloverAmount, RolloverNumber, TotalPrizePool, TotalSales, EstimatedJackpot, GuaranteedJackpot, DrawMachine,
    BallSet, GPWinners, WCWinners, NCWinners, ECWinners, MPWinners, LPWinners, FSWinners, KZNWinners, NWWinners) 
    VALUES (:draw_date, :next_draw_date, :draw_number, :Ball1, :Ball2, :Ball3, :Ball4, :Ball5,
    :Div1Winners, :Div1Payout, :Div2Winners, :Div2Payout, :Div3Winners, :Div3Payout, :Div4Winners, :Div4Payout, 
    :RolloverAmount, :RolloverNumber, :TotalPrizePool, :TotalSales, :EstimatedJackpot, :GuaranteedJackpot, :DrawMachine,
    :BallSet, :GPWinners, :WCWinners, :NCWinners, :ECWinners, :MPWinners, :LPWinners, :FSWinners, :KZNWinners, :NWWinners)");

     // Bind values to parameters
     $stmt->bindValue(':draw_date', $draw_date);
     $stmt->bindValue(':next_draw_date', $next_draw_date);
     $stmt->bindValue(':draw_number', $draw_number);
     $stmt->bindValue(':Ball1', $Ball1);
     $stmt->bindValue(':Ball2', $Ball2);
     $stmt->bindValue(':Ball3', $Ball3);
     $stmt->bindValue(':Ball4', $Ball4);
     $stmt->bindValue(':Ball5', $Ball5);
     $stmt->bindValue(':Div1Winners', $Div1Winners);
     $stmt->bindValue(':Div1Payout', $Div1Payout);
     $stmt->bindValue(':Div2Winners', $Div2Winners);
     $stmt->bindValue(':Div2Payout', $Div2Payout);
     $stmt->bindValue(':Div3Winners', $Div3Winners);
     $stmt->bindValue(':Div3Payout', $Div3Payout);
     $stmt->bindValue(':Div4Winners', $Div4Winners);
     $stmt->bindValue(':Div4Payout', $Div4Payout);
     $stmt->bindValue(':RolloverAmount', $RolloverAmount);
     $stmt->bindValue(':RolloverNumber', $RolloverNumber);
     $stmt->bindValue(':TotalPrizePool', $TotalPrizePool);
     $stmt->bindValue(':TotalSales', $TotalSales);
     $stmt->bindValue(':EstimatedJackpot', $EstimatedJackpot);
     $stmt->bindValue(':GuaranteedJackpot', $GuaranteedJackpot);
     $stmt->bindValue(':DrawMachine', $DrawMachine);
     $stmt->bindValue(':BallSet', $BallSet);
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

Div1Winners
Div1Payout