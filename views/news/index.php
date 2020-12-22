<?php include ROOT.'/views/layouts/header.php';?>
<div id="newscontent">
					<?php foreach ($newsList as $newsItem):?>
					<div id="newspost">
						<h2 class="title" style="text-align: center;"><a style="color:#0ca3d2;" href='/news/<?php echo $newsItem['id'] ;?>'><?php echo $newsItem['title'];?></a></h2>
						<p class="meta">Опубликовано пользователем <?php echo $newsItem['author'];?> 
						<br> 
						<font style="display: flex; justify-content: center;"> <?php echo $newsItem['date'];?> &nbsp
						</font>
						<div class="entry">
							<p><img id="newsimg" src="<?php echo News::getImage($newsItem['id']) ?>" width="800" height="300" alt="" /></p>
							<p style="width:60%;"><?php echo $newsItem['short_data'];?></p>
						</div>
					</div>
				<?php endforeach;?>
</div>
<?php include ROOT.'/views/layouts/footer.php';?>