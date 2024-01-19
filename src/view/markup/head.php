<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php 
        foreach($cssFiles as $entry){
        ?>
             <link href=<?=SITE_NAME."assets/styles/".$entry.".css"?> rel="stylesheet">
    <?php }
   
       
?>
<title><?=$pageTitle?></title>
</head>

    