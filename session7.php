<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    


<?php 

$startyear=2018;
$endyear=2022;
$startmonth=2;
$endmonth=9;
$year_difference=$endyear-$startyear;

echo "<h2>".$year_difference."</h2>";




for($year = $startyear ; $year <= $endyear ; $year++){



    if($year == $startyear){
        $month_start= $startmonth;
        $month_end = 12;
    }elseif($year == $endyear){
        $month_start= 1;
        $month_end =  $endmonth;
    }else{
        $month_start= 1;
        $month_end = 12;
    }


    for ($month = $month_start ; $month <= $month_end ; $month++) {
        $month_name = date("F", mktime(0, 0, 0, $month, 10));
    echo $year.'-'.$month_name .'<br>';

}
}
?>

</body>
</html>