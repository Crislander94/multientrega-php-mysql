<?php 
// 022864 ===> Color 1
// 3F386B ===> Color 2
// 3A553A ===> Color 3
// 0C9789 ===> Color 4
// 0693C6 ===> Color 5
  $color = '';
  if($_SESSION["tipo_usuario"] === 'E'){
    if(isset($_COOKIE["color_empresa"])){
      $color = $_COOKIE["color_empresa"];
    }
  }
  if($_SESSION["tipo_usuario"] === 'A'){
    if(isset($_COOKIE["color_admin"])){
      $color = $_COOKIE["color_admin"];
    }
  }
  if($_SESSION["tipo_usuario"] === 'C'){
    if(isset($_COOKIE["color_admin"])){
      $color = $_COOKIE["color_admin"];
    }
  }
  if($_SESSION["tipo_usuario"] === 'R'){
    if(isset($_COOKIE["color_admin"])){
      $color = $_COOKIE["color_admin"];
    }
  }
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard multientrega</title>
  <!-- ICONOS -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link rel="stylesheet" href="./assets/libs/bootstrap-4.6.0-dist/css/bootstrap.css"> 
  <link rel="stylesheet" href="./assets/libs/bootstrap-select-1.13.1/css/bootstrap-select.css"/>
  <link rel="stylesheet" href="./assets/css/personalizacion.css">
</head>
<body>
    <div class="item-search p-2" style="<?php echo $color; ?>">
        <form class="form-inline" action="/action_page.php">
          <input class="form-control mr-sm-2" type="search" placeholder="¿Que desea buscar?">
        </form>
    </div>