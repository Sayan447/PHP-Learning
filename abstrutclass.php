<?php

abstract class ProductFeature{
    abstract function productdetails();
    abstract function productImage();
    abstract function productOwnerdetails();
}


class UploadProduct extends ProductFeature{
    function productdetails(){
        echo 'product details of product ';
    }

    function productImage(){
        echo 'product details of product ';
    }

    function productOwnerdetails(){
        echo 'product details of product ';
    }


}


$upload = new UploadProduct();
$upload-> productdetails();