jQuery(document).ready(function() {
	/* Column equalizer for hp featured section */
	function ftEqual() {
		var maxHeight = 0;
        jQuery(".ft_content.ct-2, .ft_content.ct-3, .ft_content.ct-4, .ft_content.ct-5").each(function(){
            if (jQuery(this).height() > maxHeight) { maxHeight = jQuery(this).height(); }
        });
		if(maxHeight > 0) {
			jQuery(".ft_content.ct-2, .ft_content.ct-3, .ft_content.ct-4, .ft_content.ct-5").height(maxHeight);
		} 
    }
    ftEqual();
	jQuery(window).resize(function() {
		jQuery(".ft_content.ct-2, .ft_content.ct-3, .ft_content.ct-4, .ft_content.ct-5").height('auto');
		ftEqual();
	});
});