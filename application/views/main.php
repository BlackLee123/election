<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo $title.'-'.$subtitle;?></title>
    <link href="<?php echo base_url();?>css/default.css" rel="stylesheet" type="text/css">
</head>

<body>


<table width="400">
    <tbody>
        <tr><td colspan="5"><p class="title"><?php echo $title.'<br>'.$subtitle;?></p></td></tr>

        <?php foreach ($candidatos as $candidato):?>
            <tr><td colspan="5" class="separator"><?php echo $candidato->nombre;?></td></tr>
            <tr>
                <!--<td><img alt="<?php echo $candidato->partido;?>" src="<?php echo $candidato->partido_img;?>"></td>-->
                <td><img alt="<?php echo $candidato->nombre;?>" src="<?php echo $candidato->foto;?>"></td>
                <td class="data"><?php echo $candidato->total;?></td>
                <td class="data"><?php echo $candidato->porciento;?>%</td>
                <td><table width="100" class="barchartcontainer"><tbody><tr>
                <td width="<?php echo $candidato->porciento;?>%"
                    bgcolor="<?php echo $candidato->color;?>"
                    style="border-top: 10px solid <?php echo $candidato->color;?>;">&nbsp;</td>
                <td width="100%">&nbsp;</td></tr></tbody></table></td>
            </tr>
         <?php endforeach;?>

        <tr><td colspan="3" class="total">PARTICIPACION: <?php echo $participacion_porciento;?>%</td><td colspan="2" class="total">TOTAL: <?php echo $total->total_votos;?></td></tr>
		
    </tbody>
</table>

<?php echo $subtitle == 'PROYECCION' ? '' : '<p>UNIDADES REPORTADAS: '.$escrutado->unidades.' DE '.$cargo->unidades.' PARA UN '.$tally_porciento.'%</p>';?>



</body>



</html>
