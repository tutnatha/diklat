<style type="text/css">
@media all{
	.print-panel{
		font-size:11px;
		padding:3px 3px 5px 5px; margin:0px auto; background:#EFEFEF; height:25px;
	}
	
	.print-button{

		border:1px solid #BFBFBF; padding:4px 5px 4px 40px;
		float:right; text-decoration:none;
		font-size:12px;
		font-family:Arial, Helvetica, sans-serif;
		line-height:20px;
		margin:0 5px 5px 5px; background:#FFF url(<?php echo base_url() ?>asset/images/icon-print-small.png) 2px no-repeat;
	}
	#size{width:20px; background-color:#FFC; border:solid thin; }
	
}
@media print{	
	.print-button{ display:none; }
	.print-panel{ display:none; }
}
</style>

<script type="text/javascript" src="<?php echo base_url();?>jquery/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(e) {
		var ukr = $('td').css('font-size');
		$('#size').val(parseInt(ukr));
		
        $('#btplus').click(function(e) {
			var skr = $('td').css('font-size');
			var mon = $('.monotype').css('font-size');
			var mon1 = $('.monotype1').css('font-size');
			var plus = parseInt(skr) + 1;
			
			$('td').css('font-size',plus);
			$('.monotype').css('font-size',parseInt(mon)+1);
			$('.monotype1').css('font-size',parseInt(mon1)+1);
			$('#size').val(plus);
		});
		
		$('#btmin').click(function(e) {
			var skr = $('td').css('font-size');
			var plus = parseInt(skr) - 1;
			var mon = $('.monotype').css('font-size');
			var mon1 = $('.monotype1').css('font-size');
			
			$('td').css('font-size',plus);
			$('.monotype').css('font-size',parseInt(mon)-1);
			$('.monotype1').css('font-size',parseInt(mon1)-1);
			$('#size').val(plus);
		});
    });
	
</script>
<div class='print-panel'>
	<!--<input type="button" id="btplus" name="btplus" value="A++">
    <input type="button" id="btmin" name="btmin" value="A- -">
    <input type="text" id="size" name="size" size="1" readonly="readonly" />-->
    
    <a class='print-button' href='#' onclick='print()'>Cetak ke Printer</a>
</div><div class='clear'></div>
