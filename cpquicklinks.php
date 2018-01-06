<?php
defined('_JEXEC') or die;
require(__DIR__.'./../../administrator/components/com_cpquicklinks/cpquicklinks_api.php');
$links = getQuickLinks();
if(!isset($_GET['option']) || $_GET['option'] !== 'com_cpquicklinks') {
	$params = JFactory::getApplication()->getMenu()->getActive()->params;
	$title = $params->get('pagetitle');
	$css = $params->get('customcss');
	if(!empty($css)) {
		echo '<style>'.$css.'</style>';
	}
}
?>
<link rel="stylesheet" href="components/com_cpquicklinks/src/css/index.css">
<link rel="stylesheet" href="components/com_cpquicklinks/src/css/font-awesome.min.css">
<?php
if((!isset($_GET['option']) || $_GET['option'] !== 'com_cpquicklinks') && !empty($title)) {
	$params = JFactory::getApplication()->getMenu()->getActive()->params;
	echo '<h1 id="cpquicklinkstitle">'.$title.'</h1>';
}
?>
<div id="cpquicklinks">
<?php
	foreach($links as $catname => $cat) {
		echo '
			<div class="category">
				<span class="fa '.$cat['icon'].'"></span><span class="name">'.$catname.'</span>
				<div>
		';
		foreach($cat['links'] as $linknamedesc => $link) {
			$pop = 'target="_top"';
			if($link['popout']) {
				$pop = 'target="_blank"';
			}
			$lnda = explode(';', $linknamedesc);
			if(count($lnda) == 1) {
				$linkname = $lnda[0];
				$linkdesc = $lnda[0];
			} else {
				$linkname = $lnda[0];
				$linkdesc = $lnda[1];
			}
			echo '
					<a title="'.$linkdesc.'" href="'.$link['href'].'" '.$pop.'>'.$linkname.'</a>
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
if(isset($_GET['option']) && $_GET['option'] == 'com_cpquicklinks') {
	exit();
}
?>