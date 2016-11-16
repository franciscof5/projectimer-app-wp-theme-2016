<?php
/*Template Name: Pomo - Ranking*/
?>
<?php get_header() ?>

<script type="text/javascript">
jQuery( document ).ready(function() {
	largura = 800;
	primeiro = jQuery("li:nth-child(2)").find('span').text();
	jQuery( "li" ).each(function(i) {
		/*alert( jQuery(this).find('span').text() );
		jQuery( this ).width( jQuery(this).find('span').text() );/
		*/
		qtddpomo = parseInt(jQuery(this).find('span').text());
		//res = 25 + ((((qtddpomo/primeiro)/4)*3)*100);
		//res = 50 + ((((qtddpomo/primeiro)/2)*1)*100);
		res = 40 + ((((qtddpomo/primeiro)/10)*6)*100);
		jQuery( this ).width( (res) + "%" );
		jQuery( this ).css('backgroundColor', "CCC");
		/*if(i>0) {
			jQuery( this ).before( '<span style="float: left;font-family: Lilita One, cursive;width: 30px;font-size: 20px;line-height: 30px;text-align: center;background: #009933;color: #FFF;border-radius: 50px;padding: 0;margin: 20px 10px;">'+i+"</span" );
		}*/
	});
});
</script>

<?php //get_sidebar(); ?>
    <div id="content" class="content_nosidebar">
    	<div class="padder">
		<h1>Ranking</h1>
		<?php echo do_shortcode('[widgets_on_pages id="authors"]');	?>
	</div>
</div><!-- #content -->
	
<?php get_footer() ?>
