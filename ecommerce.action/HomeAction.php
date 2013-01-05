<?php

require_once "ecommerce.dao/HomeDao.php";

class HomeAction {
    
    public $homedao;
    
    public function __construct() {
        $this->homedao = new HomeDao();
    }
    
    
    public function recuperaBanner(){
        return $this->homedao->recuperarBannerLoja();
    }
    
    
}

?>
