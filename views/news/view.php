<?php include ROOT.'/views/layouts/header.php';?>
					<div class="entry">
						<h2 style="text-align:center;" class="title"><?php echo $newsItem['title'];?></h2>
						<p style="text-align:center;" class="meta">Опубликовано пользователем <font><?php echo $newsItem['author'];?></font> <?php echo $newsItem['date'];?>
						<br><a style="color:#0ca3d2;" href='/news/' class="permalink"> Вернуться на главную</a></p>
							<p><img id="newsviewimg" src="<?php echo News::getImage($newsItem['id']) ?>" width="800" height="300" alt="" /></p>
							<p id="viewdata"><?php echo $newsItem['short_data'];?></p>
						</div>
					</div>
<?php include ROOT.'/views/layouts/footer.php';?>
