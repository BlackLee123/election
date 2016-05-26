<!DOCTYPE html>
<html lang="es">

<head>

	<script type="text/javascript" src="<?php echo base_url();?>js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>js/FusionCharts.js"></script>

</head>

<body>

	<div id="chart1div">
		This text is replaced by the chart.
	</div>
	<script type="text/javascript">
		var chart1 = new FusionCharts("<?php echo base_url();?>images/MSLine.swf", "ChId1", "1200", "800", "0", "1");
		chart1.setXMLUrl("<?php echo base_url();?>chart/tendency/<?php echo $source.'/'.$candidatura;?>");
		chart1.render("chart1div");
	</script>
</body>


</html>


