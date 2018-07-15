<?php
	require_once 'model/category.php';
	$categories = idNameCategory();
	foreach ($categories as $category){
	    $idCurentCat = $category['id_cat'];
		$limit = 3;
		$allnewscurent = showNews($idCurentCat, $limit);
		foreach ($allnewscurent as $news){
			$allnews[] = $news;
		}
	}
	$mostVisitedNews = mostVisitedNews(3);
	require_once 'view/index_view.php';
?>