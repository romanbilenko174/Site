<?php include ROOT . '/views/layouts/header.php'; ?>
        <h2 style="text-align: center;">Последние акции</h2>
        <div id="actions">
            <?php foreach($latestActions as $action):?>
                
                    <div id="actiondata">
                    <div id="actiontitle"><?php echo $action['title'];?></div>
                    <div id="actiondate">Акция проводится с <?php echo $action['startdate']; ?> по <?php echo $action['enddate']; ?></div>
                    <div ><img id="actionimg" src="<?php echo Action::getImage($action['id']); ?>"></div>
                    <a id="more" href="view/<?php echo $action['id']?>">Подробнее</a>
                </div>
                
                <?php endforeach;?>
                </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>