<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="1; http://192.168.1.135/FORMS/MANUTENCAO/CHIAPERINI2/index.php">
  <link rel="stylesheet" href="dsgr.css">
  <title>VISUALIZAÇÃO</title>
</head>

<body>
<p class="arr2">RELATÓRIO DE ORDEM DE SERVIÇO <br> MANUTENÇÃO</p>
<div class="top">
  <img class="ctr2" src="img/logo-chiaperini.png" alt="img">
</div>

<!--header class="top auto ctr2">
  <img class="ctr2" src="img/logo-chiaperini.png" alt="img"><p class="white" style="margin-left: 10px; font-size: 1.5vw;">RELATÓRIO DE ORDEM DE SERVIÇO MANUTENÇÃO</p>
</header-->
<main>
  <div>
<table class="table-title">
  <tr>
    <th>O.S</th>
      <!--th-- class="topow">Nº MÁQUINA</!--th-->
    <th>EQUIPAMENTO</th>
    <th>SETOR</th>
      <!--th>TIPO</th-->
      <!--th>PRIORIDADE</th>-->
    <th>STATUS</th>
    <th>DATA</th>
    <th>TEMPO</th>
  </tr>

  <tr>
    <td colspan="6"><label class="disable"><br>_</label><label class="disable"></label></td>
  </tr>
  
</table>

<table class="table1">


<tr>
  <th colspan="6">CORRETIVA</th>
</tr>

<?php

try{
//acessa o banco de dados
$myPDO = new PDO("pgsql:host=192.168.0.4;dbname=QUALIDADE","postgres", "Dwf6127d4l5k6@");
                                  
$sql = "SELECT 
num_solicitacao, 
CONCAT(num_equipamento,' - ',nome_equipamento) as equipamento,
setor_solicitante,
tipo_servico, 
prioridade,
to_char(data_solicitacao, 'DD/MM/YYYY') as data_solicitacao, 
CASE WHEN data_prevista IS NULL THEN 'ABERTA' ELSE 'EXECUCAO' END as status, CONCAT((CURRENT_DATE - data_solicitacao), ' D') as tempo
FROM form_manut
WHERE data_fechamento IS NULL AND tipo_servico LIKE 'CORRETIVA%'
ORDER BY num_solicitacao DESC	";

$qnt_corretiva = 0;

foreach($myPDO->query($sql)as $row){

  $num_solicit = $row['num_solicitacao'];
  $num_solicit = $row['num_solicitacao'];
  $tamanho = $row['num_solicitacao'];
  $tamanho = strlen($tamanho);
    
  $setor = $row['setor_solicitante'];
  $equipamento = $row['equipamento'];
  $status = $row['status'];
  $tipo = $row['tipo_servico'];
  $prioridade = $row['prioridade'];
  $dt_solicit = $row['data_solicitacao'];
  $tempo = $row['tempo'];

  if ($tamanho == 1){
    $num_solicit = '0000'.$num_solicit;
  }

  else if ($tamanho == 2){
      $num_solicit = '000'.$num_solicit;
  }

  else if ($tamanho == 3){
      $num_solicit = '00'.$num_solicit;
  }

  else if ($tamanho == 4){
      $num_solicit = '0'.$num_solicit;
  }
                  
    echo '<tr>';
    if ($status == 'ABERTA') {
        echo '<td class="naoconcluida">'.$num_solicit.'</td>';
        //echo '<td class="naoconcluida">'.$num_equipamento.'</td>';
        echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$equipamento.'</td>';
        echo '<td class="naoconcluida">'.$setor.'</td>';
        //echo '<td class="naoconcluida">'.$tipo.'</td>';
        //echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="naoconcluida">'.$status.'</td>';
        echo '<td class="naoconcluida">'.$dt_solicit.'</td>';
        echo '<td class="naoconcluida">'.$tempo.'</td>';
  
    }else {
        echo '<td class="andamento">'.$num_solicit.'</td>';
        //echo '<td class="andamento">'.$num_equipamento.'</td>';
        echo '<td class="andamento">'.$equipamento.'</td>';
        echo '<td class="andamento">'.$setor.'</td>';
        //echo '<td class="andamento">'.$tipo.'</td>';
        //echo '<td class="andamento" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="andamento">'.$status.'</td>';
        echo '<td class="andamento">'.$dt_solicit.'</td>';
        echo '<td class="andamento">'.$tempo.'</td>';

  }
$qnt_corretiva++;  
}

switch ($qnt_corretiva) {
  case 0:
    echo '<tr><td colspan="6" >NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 1:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 2:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 3:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 4:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 5:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
}

echo '</tr>';
                                      
}catch(PDOException $e){

  echo $e->getMEssage();
                                      
}

?>

<tr>
  <th colspan="6">PREDIAL</th>
</tr>

<?php

try{
//acessa o banco de dados
$myPDO = new PDO("pgsql:host=192.168.0.4;dbname=QUALIDADE","postgres", "Dwf6127d4l5k6@");
                                  
$sql = "SELECT 
num_solicitacao, 
CONCAT(num_equipamento,' - ',nome_equipamento) as equipamento,
setor_solicitante,
tipo_servico, 
prioridade,
to_char(data_solicitacao, 'DD/MM/YYYY') as data_solicitacao, 
CASE WHEN data_prevista IS NULL THEN 'ABERTA' ELSE 'EXECUCAO' END as status, CONCAT((CURRENT_DATE - data_solicitacao), ' D') as tempo
FROM form_manut
WHERE data_fechamento IS NULL AND tipo_servico LIKE 'PREDIAL'
ORDER BY num_solicitacao DESC";

$qnt_predial = 0;

foreach($myPDO->query($sql)as $row){

  $num_solicit = $row['num_solicitacao'];
  $num_solicit = $row['num_solicitacao'];
  $tamanho = $row['num_solicitacao'];
  $tamanho = strlen($tamanho);
    
  $setor = $row['setor_solicitante'];
  $equipamento = $row['equipamento'];
  $status = $row['status'];
  $tipo = $row['tipo_servico'];
  $prioridade = $row['prioridade'];
  $dt_solicit = $row['data_solicitacao'];
  $tempo = $row['tempo'];

  if ($tamanho == 1){
    $num_solicit = '0000'.$num_solicit;
  }

  else if ($tamanho == 2){
      $num_solicit = '000'.$num_solicit;
  }

  else if ($tamanho == 3){
      $num_solicit = '00'.$num_solicit;
  }

  else if ($tamanho == 4){
      $num_solicit = '0'.$num_solicit;
  }
                  
    echo '<tr>';
    if ($status == 'ABERTA') {
        echo '<td class="naoconcluida">'.$num_solicit.'</td>';
        //echo '<td class="naoconcluida">'.$num_equipamento.'</td>';
        echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$equipamento.'</td>';
        echo '<td class="naoconcluida">'.$setor.'</td>';
        //echo '<td class="naoconcluida">'.$tipo.'</td>';
        //echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="naoconcluida">'.$status.'</td>';
        echo '<td class="naoconcluida">'.$dt_solicit.'</td>';
        echo '<td class="naoconcluida">'.$tempo.'</td>';
  
    }else {
        echo '<td class="andamento">'.$num_solicit.'</td>';
        //echo '<td class="andamento">'.$num_equipamento.'</td>';
        echo '<td class="andamento">'.$equipamento.'</td>';
        echo '<td class="andamento">'.$setor.'</td>';
        //echo '<td class="andamento">'.$tipo.'</td>';
        //echo '<td class="andamento" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="andamento">'.$status.'</td>';
        echo '<td class="andamento">'.$dt_solicit.'</td>';
        echo '<td class="andamento">'.$tempo.'</td>';

  }
$qnt_predial++;  
}
echo '</tr>';

switch ($qnt_predial) {
  case 0:
    echo '<tr><td colspan="6" >NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 1:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 2:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 3:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 4:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 5:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
}

                                      
}catch(PDOException $e){

  echo $e->getMEssage();
                                      
}

?>

<tr>
  <th colspan="6">PREVENTIVA</th>
</tr>

<?php

try{
//acessa o banco de dados
$myPDO = new PDO("pgsql:host=192.168.0.4;dbname=QUALIDADE","postgres", "Dwf6127d4l5k6@");
                                  
$sql = "SELECT 
num_solicitacao, 
CONCAT(num_equipamento,' - ',nome_equipamento) as equipamento,
setor_solicitante,
tipo_servico, 
prioridade,
to_char(data_solicitacao, 'DD/MM/YYYY') as data_solicitacao, 
CASE WHEN data_prevista IS NULL THEN 'ABERTA' ELSE 'EXECUCAO' END as status, CONCAT((CURRENT_DATE - data_solicitacao), ' D') as tempo
FROM form_manut
WHERE data_fechamento IS NULL AND tipo_servico LIKE 'PREVENTIVA%'
ORDER BY num_solicitacao DESC";

$qnt_preventiva = 0;

foreach($myPDO->query($sql)as $row){

  $num_solicit = $row['num_solicitacao'];
  $num_solicit = $row['num_solicitacao'];
  $tamanho = $row['num_solicitacao'];
  $tamanho = strlen($tamanho);
    
  $setor = $row['setor_solicitante'];
  $equipamento = $row['equipamento'];
  $status = $row['status'];
  $tipo = $row['tipo_servico'];
  $prioridade = $row['prioridade'];
  $dt_solicit = $row['data_solicitacao'];
  $tempo = $row['tempo'];

  if ($tamanho == 1){
    $num_solicit = '0000'.$num_solicit;
  }

  else if ($tamanho == 2){
      $num_solicit = '000'.$num_solicit;
  }

  else if ($tamanho == 3){
      $num_solicit = '00'.$num_solicit;
  }

  else if ($tamanho == 4){
      $num_solicit = '0'.$num_solicit;
  }
                  
    echo '<tr>';
    if ($status == 'ABERTA') {
        echo '<td class="naoconcluida">'.$num_solicit.'</td>';
        //echo '<td class="naoconcluida">'.$num_equipamento.'</td>';
        echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$equipamento.'</td>';
        echo '<td class="naoconcluida">'.$setor.'</td>';
        //echo '<td class="naoconcluida">'.$tipo.'</td>';
        //echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="naoconcluida">'.$status.'</td>';
        echo '<td class="naoconcluida">'.$dt_solicit.'</td>';
        echo '<td class="naoconcluida">'.$tempo.'</td>';
  
    }else {
        echo '<td class="andamento">'.$num_solicit.'</td>';
        //echo '<td class="andamento">'.$num_equipamento.'</td>';
        echo '<td class="andamento">'.$equipamento.'</td>';
        echo '<td class="andamento">'.$setor.'</td>';
        //echo '<td class="andamento">'.$tipo.'</td>';
        //echo '<td class="andamento" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="andamento">'.$status.'</td>';
        echo '<td class="andamento">'.$dt_solicit.'</td>';
        echo '<td class="andamento">'.$tempo.'</td>';

  }
$qnt_preventiva++;  
}
echo '</tr>';

switch ($qnt_preventiva) {
  case 0:
    echo '<tr><td colspan="6" >NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 1:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 2:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 3:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 4:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 5:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
}


}catch(PDOException $e){

  echo $e->getMEssage();
                                      
}

?>

<tr>
  <th colspan="6">MELHORIA</th>
</tr>

<?php

try{
//acessa o banco de dados
$myPDO = new PDO("pgsql:host=192.168.0.4;dbname=QUALIDADE","postgres", "Dwf6127d4l5k6@");
                                  
$sql = "SELECT 
num_solicitacao, 
CONCAT(num_equipamento,' - ',nome_equipamento) as equipamento,
setor_solicitante,
tipo_servico, 
prioridade,
to_char(data_solicitacao, 'DD/MM/YYYY') as data_solicitacao, 
CASE WHEN data_prevista IS NULL THEN 'ABERTA' ELSE 'EXECUCAO' END as status, CONCAT((CURRENT_DATE - data_solicitacao), ' D') as tempo
FROM form_manut
WHERE data_fechamento IS NULL AND tipo_servico LIKE 'MELHORIA'
ORDER BY num_solicitacao DESC";

$qnt_melhoria = 0;

foreach($myPDO->query($sql)as $row){

  $num_solicit = $row['num_solicitacao'];
  $num_solicit = $row['num_solicitacao'];
  $tamanho = $row['num_solicitacao'];
  $tamanho = strlen($tamanho);
    
  $setor = $row['setor_solicitante'];
  $equipamento = $row['equipamento'];
  $status = $row['status'];
  $tipo = $row['tipo_servico'];
  $prioridade = $row['prioridade'];
  $dt_solicit = $row['data_solicitacao'];
  $tempo = $row['tempo'];

  if ($tamanho == 1){
    $num_solicit = '0000'.$num_solicit;
  }

  else if ($tamanho == 2){
      $num_solicit = '000'.$num_solicit;
  }

  else if ($tamanho == 3){
      $num_solicit = '00'.$num_solicit;
  }

  else if ($tamanho == 4){
      $num_solicit = '0'.$num_solicit;
  }
                  
    echo '<tr>';
    if ($status == 'ABERTA') {
        echo '<td class="naoconcluida">'.$num_solicit.'</td>';
        //echo '<td class="naoconcluida">'.$num_equipamento.'</td>';
        echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$equipamento.'</td>';
        echo '<td class="naoconcluida">'.$setor.'</td>';
        //echo '<td class="naoconcluida">'.$tipo.'</td>';
        //echo '<td class="naoconcluida" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="naoconcluida">'.$status.'</td>';
        echo '<td class="naoconcluida">'.$dt_solicit.'</td>';
        echo '<td class="naoconcluida">'.$tempo.'</td>';
  
    }else {
        echo '<td class="andamento">'.$num_solicit.'</td>';
        //echo '<td class="andamento">'.$num_equipamento.'</td>';
        echo '<td class="andamento">'.$equipamento.'</td>';
        echo '<td class="andamento">'.$setor.'</td>';
        //echo '<td class="andamento">'.$tipo.'</td>';
        //echo '<td class="andamento" style="padding: 10px 0px;">'.$prioridade.'</td>';
        echo '<td class="andamento">'.$status.'</td>';
        echo '<td class="andamento">'.$dt_solicit.'</td>';
        echo '<td class="andamento">'.$tempo.'</td>';

  }
$qnt_melhoria++;  
}
echo '</tr>';

switch ($qnt_melhoria) {
  case 0:
    echo '<tr><td colspan="6" >NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 1:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 2:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 3:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 4:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
  case 5:
    echo '<tr><td colspan="6" class="disable">NENHUMA SOLICITAÇÃO EM ANDAMENTO</td></tr>';
      break;
}


}catch(PDOException $e){

  echo $e->getMEssage();
                                      
}

?>

</table>


  <?php 

/*$all = $qnt_predial + $qnt_preventiva + $qnt_melhoria + $qnt_corretiva;

if ($all > 24){
  //habilite o scroll
  //echo '<script>window.alert("SABU KALL FI");</script>';
}*/
?>

</div>
</main>
</body>
</html>