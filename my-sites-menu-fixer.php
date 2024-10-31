<?php
/*
Plugin Name: My Sites Menu Fixer
Description: Makes the My Sites Menu into three colums
Version: 1.4.1
Author: Lars Midgaard
Author URI: http://onezero.no/
*/

function custom_my_sites() {
	?>
	<style type="text/css">
	
	@media (min-width: 783px) {
		#wp-admin-bar-my-sites-list{
			width:666px;
		}
		#wpadminbar .quicklinks .menupop ul#wp-admin-bar-my-sites-list > li{
			width:222px;
			float:left;
		}
		#wpadminbar ul, #wpadminbar ul li{ z-index: auto;  }
		
		#wpadminbar .quicklinks #wp-admin-bar-my-sites.menupop ul.ab-sub-secondary{ background-color:transparent; }
		#wpadminbar .quicklinks #wp-admin-bar-my-sites.menupop .ab-sub-secondary>li>a{ padding-top:1px; padding-bottom:3px; }
		#wpadminbar .quicklinks #wp-admin-bar-my-sites.menupop .ab-sub-secondary>li>a:hover{ background-color:#464b50; }
		
		#wpadminbar .menupop li.hover > .ab-sub-wrapper{
			z-index:99999;
		}
		#wpadminbar ul#wp-admin-bar-my-sites-super-admin{ background-color:#464b50; }
	}
	
	</style>
	
	<script>
	
	jQuery( document ).ready(function() {
		jQuery('#wp-admin-bar-my-sites-list').children().each(function(index, element) {
			jQuery(this).attr('data-site_name', jQuery(this).find('a').first().text());
		});
		
		jQuery('#wp-admin-bar-my-sites-list > li').sort(function(a,b){
			return jQuery(a).text().toUpperCase().localeCompare(jQuery(b).text().toUpperCase());
		}).appendTo('#wp-admin-bar-my-sites-list');
	});
	
	</script>
	<?php
}

add_action('admin_bar_menu', 'custom_my_sites');

?>