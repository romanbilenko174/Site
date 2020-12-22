<?php
class BotMenuController
{
public function actionAdditional(){
        require_once(ROOT . '/views/botmenu/additional.php');
        return true;
    }
public function actionLifting(){
        require_once(ROOT . '/views/botmenu/lifting.php');
        return true;
    }
public function actionTrade(){
	require_once(ROOT . '/views/botmenu/trade.php');
	return true;
    }
}
?>