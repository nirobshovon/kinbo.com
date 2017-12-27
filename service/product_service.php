<?php require_once "../data/product_data_access.php"; ?>
<?php
   
    
    function getNumberOfPages(){
        return getNumOfPages();
    }
    
	function ProductByPaiging()
	{
		return getProductbyfive();
	}
	
	function getProductByCategoryId($id)
	{
		return getProductByCatId($id);
	}
	
	function getProductCategory()
	{
		return getProductCat();
	}
	
	function DeleteProduct($id)
	{
		return deleteProductById($id);
	}
	
	function getProductUsingId($id)
	{
		
		
		$rw=mysqli_fetch_assoc(getProductById($id));		
		return $rw;
	}
	
	function getCategoryByName($name)
	{
		return CategoryByName($name);
	}
	
	function addNewCategory($cat_title,$textarea)
	{
		return addCategory($cat_title,$textarea);
	}
	
	function AddProduct($cat_id, $title, $short_desc, $filename, $price, $stock)
	{
		return addNewProduct($cat_id, $title, $short_desc, $filename, $price, $stock);
	}
	
	function UpdateProduct($id,$cat_id, $title, $short_desc, $filename, $price, $stock)
	{
		return UpdateExistingProduct($id,$cat_id, $title, $short_desc, $filename, $price, $stock);
	}
	
	function getCategoryIdByName($name)
	{
		
		if($rw=mysqli_fetch_assoc(getCategoryByName($name))){
			
			
			$cat_id=$rw['id'];
		}
		
		return $cat_id;
	}
    
?>