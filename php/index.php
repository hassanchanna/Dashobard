<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        <?php
        $a="ali";
        $num1 = "4";
        $num2 = 5;
        echo "<h1>first php code</h1>";
        ?>
        <h1><?php echo "hello ".$a?></h1>
        <p><?php echo $num1 + $num2?></p>
        <?php
        for($i=0;$i<10;$i++){
            ?>
               <h2><?php echo $i;?></h2>   
            <?php
        }
   
        ?>
  
    </body>
</html>