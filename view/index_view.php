        <?php foreach ($categories as $category){ ?>
        <div class="col-lg-12">
            <h3 class="page-header"><a href="index.php?route=category&action=category_view&id=<?php echo $category['id_cat']; ?>"><?php echo $category['name_cat']; ?></a></h3>
        </div>
            <?php foreach ($allnews as $news){?>
				<?php if($news['parent'] == $category['id_cat']){ ?>
					<div class="col-sm-3 col-xs-6">
					<img class="img-responsive portfolio-item" src="<?php echo $news['image']; ?>" alt="">
					<a href="index.php?route=category&action=news_view&id=<?php echo $news['id']; ?>"><?php echo $news['name']; ?></a>
					</div>
				<?php } ?>
			<?php } ?>
        <?php } ?>

        <div class="col-lg-12">
            <h2 class="page-header">Наиболее популярные новости</h2>
        </div>
		
        <?php foreach ($mostVisitedNews as $item){?>
			<div class="col-sm-3 col-xs-6">
				<img class="img-responsive portfolio-item" src="<?php echo $item ['image']; ?>" alt="">
				<a href="index.php?route=category&action=news_view&id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a>
			</div>
        <?php } ?>


