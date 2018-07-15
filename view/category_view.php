    <!-- Page Heading -->
	<?php $id = $_GET['id']; foreach ($selectedСategory as $category){ ?>
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"><?php echo $category ['name_cat'] ?>
            </h1>
        </div>
    </div>
	<?php } ?>
    <!-- /.row -->

    <!-- Projects Row -->
    <div class="row">
        <?php
        $id = $_GET['id'];
        $kol = 3;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }else $page = 1;// текущая страница
        $newsList = newsPages($page, $kol);
        ?>
        <?php foreach ($newsList as $news) { ?>
        <div class="col-md-3 portfolio-item">
                <img class="img-responsive" src="<?php echo $news['image']; ?>" alt="">
                <?php echo "<a href=index.php?route=category&action=news_view&id=" . $news['id'] . ">" . $news['name'] . "</a>"; ?>
        </div>
        <?php } ?>
    </div>
    <!-- /.row -->

    <hr>



    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <?php
                $id = $_GET['id'];
                $kol = 3;
                $number = countNews($id, $kol);
                ?>
            <?php for ($i = 1; $i <= $number; $i++){ ?>
                <li>
                    <?php echo "<a href=index.php?route=category&action=category_view&id=".$id."&page=".$i."> Страница ".$i." </a>";?>
                </li>
            <?php } ?>
            </ul>
        </div>
    </div>
    <!-- /.row -->

<hr>


