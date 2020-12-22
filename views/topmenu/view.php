<?php include ROOT . '/views/layouts/header.php'; ?>
<h2 style="text-align: center;"><?php echo $action['title'];?></h2>
        <div id="actionview">
                
                    <div id="actionviewdata">
                    <div id="actionviewtitle"></div>
                    <div id="actionviewdate">Акция проводится с <?php echo $action['startdate']; ?> по <?php echo $action['enddate']; ?></div>
                    <div id="actionviewdata"><h3><?php echo $action['data'];?></h3></div>
                    <div ><img id="actionviewimg" src="<?php echo Action::getImage($action['id']); ?>"></div>
                </div>
                </div>
            
<?php include ROOT . '/views/layouts/footer.php'; ?>