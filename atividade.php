<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistema de salário</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" media="screen" href="style.css">
</head>
<body>
  <section>
    <h1>Sistema de salário</h1>
    <div>
      <form method="post">
        <label for="nome">Nome</label><br />
        <input type="text" name="nome" /><br />
        <br />
        <input type="number" step="0.01" name="semana_1" placeholder="Quantia semana 1" />
        <input type="number" step="0.01" name="semana_2" placeholder="Quantia semana 2" />
        <br />
        <input type="number" step="0.01" name="semana_3" placeholder="Quantia semana 3" />
        <input type="number" step="0.01" name="semana_4" placeholder="Quantia semana 4" /><br />
        <br />
        <input type="submit" name="enviar" value="Validar" id="enviar" />
      </form>
    </div>
    <div id="mensagem">
      <?php
 
          $nome  = filter_input(INPUT_POST, "nome");
          $semana_1 = filter_input(INPUT_POST, "semana_1");
          $semana_2 = filter_input(INPUT_POST, "semana_2");
          $semana_3 = filter_input(INPUT_POST, "semana_3");
          $semana_4 = filter_input(INPUT_POST, "semana_4");
 
 
          if (!($nome && $semana_1 && $semana_2 && $semana_3 && $semana_4)) {
              echo "Favor informar todos os dados.";
              return;
          }
       
          if ($semana_1 < 0 || $semana_2 < 0 || $semana_3 < 0 || $semana_4 < 0) {
              echo "Favor informar valores positivos.";
              return;
          }
 
       
          $semanas = [ $semana_1, $semana_2, $semana_3, $semana_4 ];
          $mes = $semana_1 + $semana_2 + $semana_3 + $semana_4;
          $bonusMes = true;
          $salario = 1927.02;
       
 
          foreach ($semanas as $semana) {
              if ($semana < 20000) {
                  $bonusMes = false;
              } else {
                  $salario += 200;
                  $salario += ($semana - 20000) * 0.05;
              }
          }
 
          if ($bonusMes)
              $salario += ($mes - 80000) * 0.1;
 
          echo "O trabalhador $nome receberá R$ $salario ao final do mês.";
      ?>
    </div>
  </section>
</body>
</html>