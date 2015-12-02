
<?php
$scoreOne = intval( $_Post['bScore1']);
$scoreOne = intval( $_Post['bScore2']);
$scoreOne = intval( $_Post['bScore3']);


echo 'Score one ' . $scoreOne . ' Score Two:' . $scoreTwo . 'Score Three' .$scoreThree;
if($scoreOne > $scoreTwo){
$best = $scoreTwo;
}
if($scoreThree > $scoreTwo){
$best = $scoreThree;
}
echo '</br>';
echo 'The best score is ' .$best ;
?>