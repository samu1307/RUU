<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $tittle; ?></title>
    <link rel="stylesheet" href="<?php echo $urlCss; ?>">
    <script type="module" src="<?php echo $urlJs; ?>" defer></script>
    <?php if($icon == 1){ ?>
        <link rel="stylesheet" defer href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <?php }?>
</head>