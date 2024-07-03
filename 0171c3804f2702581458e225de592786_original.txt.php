?><div style="clear: both"></div>
</div>
<div id="foot">
<a href="<?php 
bloginfo('url');
?>">Home</a><?php 
$pages = wp_list_pages('depth=1&title_li=&echo=0');
$pages2 = preg_split('/(<li[^>]*>)/', $pages);
foreach ($pages2 as $var) {
    echo str_replace('</li>', '', $var);
}
?> <br/>
Distributed by <a href="http://mondaydressing.com">Baju Grosiran</a><br/>
<?php 
wp_footer();
$header_ads_act = get_theme_option('footer_ads_act1');
if ($header_ads_act == '' || $header_ads_act == 'No') {
    ?>
Copyright &#169; <?php 
    echo date("Y");
    ?> <a href="<?php 
    bloginfo('url');
    ?>"><?php 
    bloginfo('name');
    ?></a><?php 
} else {
    echo get_theme_option('footer_ads1');
}
?>
</div>
</div>
</body>
</html>
