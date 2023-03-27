<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Birthday</title>
</head>
<body>
<FORM action="lab4.php" method="GET">
    <div>
   <label for="date">Select your date of birth</label>
    </div>
    <input type="date" id="date" name="date">
    <div>
        <td><INPUT type="submit" value="przeslij"></td>
    </div>
</FORM>
</body>
</html>
<?php
$day_of_week = date("l", strtotime($_GET["date"]));
$current_year = date("Y");
$years_lived = $current_year - date("Y",strtotime($_GET['date']));
$year_next_bday = $current_year;
if(date("m",strtotime($_GET['date']))>date("m"))
{
    $years_lived=$years_lived-1;
    $year_next_bday = $current_year;
}
if(date("m",strtotime($_GET['date']))==date("m"))
{
    if(date("d",strtotime($_GET['date']))>date("d"))
    {
        $years_lived=$years_lived-1;
        $year_next_bday = $current_year;
    }
}
$day_next_bday = date('d',strtotime($_GET['date']));
$month_next_bday = date("m",strtotime($_GET['date']));
$date_next_bday = date("Y-m-d", mktime(0,0,0,$month_next_bday,$day_next_bday,$year_next_bday));
$date1 = new DateTime(date("Y-m-d"));
$date2 = new DateTime($date_next_bday);
$days_until_bday = date_diff($date1, $date2);
echo "You were born on  " . $day_of_week . "  You are " . $years_lived . "years old" . "   Your next birthday is in " . $days_until_bday->format("%a") . " days.";
?>
