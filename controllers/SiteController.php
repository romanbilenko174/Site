<?php
class SiteController
{
    public function actionIndex()
    {
    	$categories = Category::getCategoriesList();
        $latestProducts = Product::getLatestProducts(8);
        $latestActions = Action::getLatestActions(4);
        require_once(ROOT . '/views/site/index.php');
        return true;
    }
     public function actionFullSearch(){
       require_once(ROOT . '/views/site/fullsearch.php');
        return true; 
    }
}
