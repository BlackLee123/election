<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title></title>
    <link href="<?php echo base_url();?>css/default.css" rel="stylesheet" type="text/css">
</head>

<body>

<table width="450">
    <tbody>
        <tr><td colspan="5"><p class="title"><?php echo $title;?></p></td></tr>

        <?php foreach ($candidaturas as $row):?>
            <tr>
				<td class="separator"></td>
			</tr>
            <tr>
                <td class="data"><a onclick="parent.main.location.href='<?php echo base_url();?>result/detail/2/<?php echo $row->id;?>';parent.proy.location.href='<?php echo base_url();?>result/detail/4/<?php echo $row->id;?>';" style="cursor:pointer;" ><?php echo $row->descripcion;?></a></li></td>

            </tr>
         <?php endforeach;?>


    </tbody>
</table>





</body>



</html>
