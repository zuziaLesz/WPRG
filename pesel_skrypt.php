<?php
if (isset($_POST['pesel']) && is_numeric($_POST['pesel']) && strlen($_POST['pesel'])==11)
{
    $numer_pesel = str_split($_POST['pesel']);
    if($numer_pesel[2]<2)  //1900-1999
    {
        $rok = 1900;
    }
    if($numer_pesel[2]==2 || $numer_pesel[2]==3)  //2000-2099
    {
        $rok = 2000;
        $numer_pesel[2]=$numer_pesel[2]-2;
    }
    if($numer_pesel[2]>34) //1800-1899
    {
        $rok = 1800;
        $numer_pesel[2]=$numer_pesel[2]-8;
    }
    $rok =$rok+($numer_pesel[0]*10)+$numer_pesel[1];
    switch ($numer_pesel[3]){
        case 0:
            $miesiac = 'pazdziernik';
            break;
        case 1:
            if($numer_pesel[2]==0) $miesiac = 'styczen';
            else $miesiac = 'listopad';
            break;
        case 2:
            if($numer_pesel[2]==0) $miesiac = 'luty';
            else $miesiac = 'grudzien';
            break;
        case 3:
            $miesiac = 'marzec';
            break;
        case 4:
            $miesiac = 'kwiecien';
            break;
        case 5:
            $miesiac = 'maj';
            break;
        case 6:
            $miesiac = 'czerwiec';
            break;
        case 7:
            $miesiac = 'lipiec';
            break;
        case 8:
            $miesiac = 'sierpien';
            break;
        case 9:
            $miesiac = 'wrzesien';
            break;
    }
    $dzien =($numer_pesel[4]*10)+$numer_pesel[5];
    if($numer_pesel[9]%2==0) $plec = 'kobieta';
    else $plec = 'mezczyzna';
    echo "Data urodzenia:\n";
    echo $dzien . "\n";
    echo $miesiac ."\n";
    echo $rok."\n";
    echo "Plec: ";
    echo $plec;
}
else echo "Podany numer nie jest peselem\n";
?>
