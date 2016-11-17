<?php

/**
 * Controller CartController
 */
class SiteController
{

    public function actionIndex()
    {
        $categories = Category::getCategoriesList();

        $latestProducts = Product::getLatestProducts();

        $sliderProducts = Product::getRecommendedProducts();

        require_once(ROOT . '/views/site/index.php');
        return true;
    }


    public function actionAbout()
    {
        require_once(ROOT . '/views/site/about.php');
        return true;
    }

}
