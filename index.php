<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Reajuste de Preços</title>
</head>
<body>

<?php 
   $precoproduto = $_POST['precoproduto'] ?? '0';
   $percentual =$_POST['percentual'] ?? '0';

?>
 
    <main>
        <h1>Reajustador de Preços</h1>   
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method ="post">
        <label for="precoDoProduto"> Preço do Produto (R$)</label>
        <input type="number" name="precoproduto" id="precoproduto"  min="0.10" step="0.01" value="<?=$precoproduto?>">
        <label for="percentual">Qual será o percentual do reajuste? (<strong><span id="p"></span>%</strong>)</label>
        <input type="range" name="percentual" id="percentual" value="<?=$percentual?>" min="0" max="100" step="1" oninput="mudaValor()">
        <input type="submit" value="Reajustar">
        </form>
    </main>


    <?php 
        $conta = ($precoproduto * $percentual) / 100;
        $valorfinal = $precoproduto + $conta;
        ?>

    <section>
        
        <h1>Resultado do Reajuste</h1>
    
        <?php 
        echo "<p> O produto que custava R$" . number_format($precoproduto, 2,",","."). ", com <strong>$percentual% de aumento </strong> vai passar a custar <strong>R$".number_format($valorfinal,2,",",".")."</strong> a partir de agora. </p>"
        
        ?>

    </section>
    <script>
            // Declaração Automática
            mudaValor()
            function mudaValor(){
                p.innerText = percentual.value
            }
        </script>
</body>
</html>