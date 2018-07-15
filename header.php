<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <?php  $i = 0; foreach ($lastnews = showLastNews(3) as $item){ $i++; ?>
        <li data-target="#myCarousel" data-slide-to="<?php echo $item['id']; ?>" <?php if ($i == 1){echo 'class="active"';} ?> ></li>
        <?php } ?>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <?php $i = 0; foreach ($lastnews = showLastNews(3) as $item){  $i++; ?>
        <div class="item <?php if ($i == 1){echo 'active';} ?>">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill" style="background-image:url('<?php echo $item['image']; ?>');"></div>
            <div class="carousel-caption">
                <h2><?php echo $item['name']; ?></h2>
            </div>
        </div>
        <?php } ?>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>
</header>