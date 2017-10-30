<?php include ROOT . '/views/layouts/header.php'; ?>

<!-- start main -->
<div class="main_bg">
<div class="prod_wrap">	
	<div class="main">
		<!-- start grids_of_3 -->
                    <?php for ($i=0; $i < count($categories); $i++):  // Перебор массива с категориями для вывода
                        if ($i%4 == 0): // Если новая строка, то вставить grids_of_3 (позиции для 3х категорий)?> 
                            <div class="grids_of_3"> 
                        <?php endif;?>
                    <div class="grid1_of_3">
                        <h3><?php echo $categories[$i]['name'];?></h3>
                        <a href="/category/<?php echo $categories[$i]['id']; ?>">
                            <img src="<?php echo Product::getCategoryImage($categories[$i]['id']); ?>" alt=""/> 
                            <div class="price"><h3><span>Открыть</span></h3></div>
			</a>
                    </div>  
                    <?php if ((($i+1)%4 == 0 && $i != 0)            // Если категория - последняя в grids_of_3
                            || ($i+1 == count($categories))): // или последняя в массиве, то сделать отступ?>
			<div class="clear"></div>                   
                    <?php endif; ?>
		<?php   if (($i+1)%4 == 0): // Если категория последняя в grids_of_3, то закрыть тег?> 
                            </div>
                 <?php endif; ?>
		<?php endfor; ?>
		<!-- end grids_of_3 -->
	</div>
</div>
</div>	

<?php include ROOT . '/views/layouts/footer.php';
