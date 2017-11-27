<?php
defined('_JEXEC') or die;
require(__DIR__.'./../../administrator/components/com_cpquicklinks/cpquicklinks_api.php');
$links = getQuickLinks();
?>
<link rel="stylesheet" href="components/com_cpquicklinks/src/css/index.css">
<link rel="stylesheet" href="components/com_cpquicklinks/src/css/font-awesome.min.css">
<div id="cpquicklinks">
<?php
	foreach($links as $catname => $cat) {
		echo '
			<div class="category">
				<span class="fa '.$cat['icon'].'"></span><span class="name">'.$catname.'</span>
				<div>
		';
		foreach($cat['links'] as $linkname => $link) {
			$pop = 'target="_top"';
			if($link['popout']) {
				$pop = 'target="_blank"';
			}
			echo '
					<a title="'.$linkname.'" href="'.$link['href'].'" '.$pop.'>'.$linkname.'</a>
			';
		}
		echo '
				</div>
			</div>
		';
	}
?>
</div>
<?php 
if(isset($_GET['task']) && $_GET['task'] == 'preview') {
	exit();
}
?>