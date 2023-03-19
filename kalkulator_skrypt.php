<?php
$wykonana_operacja = 0;
if(isset($_POST['liczba1']) && isset($_POST['liczba2']) && is_numeric($_POST['liczba1']) && is_numeric($_POST['liczba2']))
{
    echo "wynik kalkulatora prostego\n";
    $wykonana_operacja = 1;
    if($_POST['dzialanie_proste']=='dodawanie') $wynik_prosty=$_POST['liczba1']+$_POST['liczba2'];
    if($_POST['dzialanie_proste']=='odejmowanie') $wynik_prosty=$_POST['liczba1']-$_POST['liczba2'];
    if($_POST['dzialanie_proste']=='mnozenie') $wynik_prosty=$_POST['liczba1']*$_POST['liczba2'];
    if($_POST['dzialanie_proste']=='dzielenie') $wynik_prosty=$_POST['liczba1']/$_POST['liczba2'];
    echo $wynik_prosty;
}
if(isset($_POST['liczba3']) && is_numeric($_POST['liczba3']))
{
    echo "wynik kalkulatora zlozonego\n";
    $wykonana_operacja = 1;
    switch ($_POST['dzialanie_zlozone']){
        case 'cos':
            $wynik_zlozony = cos(deg2rad($_POST['liczba3']));
            break;
        case 'sin':
            $wynik_zlozony = sin(deg2rad($_POST['liczba3']));
            break;
        case 'tan':
            $wynik_zlozony = tan(deg2rad($_POST['liczba3']));
            break;
        case 'binarne_na_dziesietne':
            $wynik_zlozony = bindec($_POST['liczba3']);
            break;
        case 'dziesietne_na_szesnastkowe':
            $wynik_zlozony = dechex($_POST['liczba3']);
            break;
        case 'szesnastkowe_na_dziesietne':
            $wynik_zlozony = hexdec($_POST['liczba3']);
            break;
        case 'stopnie_na_radiany':
            $wynik_zlozony = deg2rad($_POST['liczba3']);
            break;
        case 'radiany_na_stopnie':
            $wynik_zlozony = rad2deg($_POST['liczba3']);
            break;
    }
    echo $wynik_zlozony;
}
if($wykonana_operacja==0)
{
    echo "liczby podane niewalsciwie";
}
?>