<!--Tytuł: Projekt średniej arytmetycznej ocen szkolnych-->
<!--Wykonawca: Daniel Chyliński-->
<!--Środowisko programistyczne: Visual Studio Code, XAMPP-->
<!--Język programowania: PHP, HTML & CSS-->









<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img.png">
    <link rel="stylesheet" href="style.css" type="text/css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fontello/css/fontello.css" type="text/css">
    <title>Kalkulator średniej ocen</title>



    
</head>
<body>
<div id="container">
  <div class="title">

    <div id="title">Kalkulator średniej ocen</div>

    <ul id="nav">
        <a href="#"><li>O mnie</a>
        <a href="#"><li><i class="demo-icon icon-facebook-squared"></i></a>
        <a href="#"><li><i class="demo-icon icon-instagram"></i></a>
    </ul>

  </div>
  <div class="content">
    <h2>Kalkulator średniej ocen szkolnych</h2>
    
    <div class="content-information">
    <p>Narzędzie pozwoli ci na szybkie policzenie średniej arytmetycznej ocen i stwierdzi, czy będziesz
       miał świadecto z paskiem na podstawie średniej. Nie musisz męczyć się korzystając z kalkulatora,
        wprowadź wszystkie swoje oceny po przecinku np. 6, 5, 4 itp. Wprowadzone dane nie są gromadzone
         przez serwer, także strona i wprowadzone oceny są w pełni bezpieczne.
    </p><br><br>
    </div>
    <h3>Wprowadź swoje oceny:</h3>
    <form action="index.php" method="get">
      <input id="input-grades" type="text" name="grades">
      <input id="submit" type="submit" value="Oblicz"><br><br>
    </form>



    <?php
     if(isset($_GET['grades']) && !empty($_GET['grades']))
     {
      $grades = $_GET['grades'];
      
      $tab_grades = explode(",",$grades);
      if(is_array($tab_grades))
      {
      foreach($tab_grades as $item)
      {
        if($item <= 6 && $item > 0)
        {
        $sum = array_sum($tab_grades);
        }
        else{
          echo "Podaj prawidłowe oceny (w zakresie 1 - 6) !";
          exit();
        }
        
      }
      $ilosc_ocen = count($tab_grades);
      $srednia = $sum / $ilosc_ocen;
      $wynik = round($srednia,2);
      echo 'Średnia ocen wynosi: '.'<span style="color:red;">'.$wynik.'</span>'.'<br><br>';
      echo 'Średnia jest zaokrąglona do dwóch miejsc po przecinku.<br><br>';
      if($wynik>=4.75)
      {
        echo '<span style="font-size:20px;">Z podanych ocen wychodzi świadectwo z paskiem. Gratulacje!</span><br><br>';
      }
      else
      {
        echo '<span style="font-size:20px;">Niestety, ale z podanych ocen nie wychodzi Ci świadectwo z paskiem.</span><br><br>';
      }
      }
     
     }
     
     
     
     
     else
     {
      echo '<br>Nie podano żadnych ocen!';
     }

     

    ?>
  </div>
  
    
</div>
</body>
</html>