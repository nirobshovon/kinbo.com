<?php require_once "dbconnector.php"; ?>
<?php
   
    function getNumOfPages(){
        
		//for pagination
		$result_per_page=5;
		$sql="SELECT * FROM product";
		$result = executeSQL($sql);
		$number_of_result=mysqli_num_rows($result);
		$number_of_pages = ceil($number_of_result/$result_per_page);
        return $number_of_pages;
    }
	
	function getProductbyfive()
	{
		//for pagination
				$result_per_page=5;
				
				$number_of_pages = getNumOfPages();
				
				if(!isset($_GET['page']))
				{
					$page=1;
				}else{
					$page=$_GET['page'];
				}
				
				$this_page_first_result = ($page-1)*$result_per_page;
				$sql3="SELECT * FROM product LIMIT ".$this_page_first_result.",".$result_per_page;
				$result3=executeSQL($sql3);

				$products = array();
				for($i=0; $row = mysqli_fetch_assoc($result3); ++$i){
					$products[$i] = $row;
				}
        
				return $products;
	}
	
	function addNewProduct($cat_id, $title, $short_desc, $filename, $price, $stock)
	{
		$query="INSERT INTO product ( category_id, title, short_desc, img_path, price, stock) VALUES ('$cat_id', '$title', '$short_desc', '$filename', '$price', '$stock');";
		$result = executeSQL($query);
		return $result;
	}
	
	function UpdateExistingProduct($id,$cat_id, $title, $short_desc, $filename, $price, $stock)
	{
	    $query="update product set category_id=$cat_id,title='$title',short_desc='$short_desc',img_path='$filename',price=$price,stock=$stock where id=$id;";
		$result = executeSQL($query);
		return $result;
	}
	
	function getProductByCatId($id)
	{
		$sql="SELECT * FROM product where category_id=$id";
		$result = executeSQL($sql);
		return $result;
	}
	
	function getProductCat()
	{
		$query="SELECT * FROM product_category";
		$result = executeSQL($query);
		return $result;
	}
	
	function deleteProductById($id)
	{
		$query="DELETE FROM product where id=$id";
		$result = executeSQL($query);
		return $result;
	}
	
	function getProductById($id)
	{
		$query="SELECT * FROM product where id=$id";
		$result = executeSQL($query);
		return $result;
	}
	
	function getCatIdByName($name)
	{
		$query="SELECT * FROM product_category where category_name=$name";
		$result = executeSQL($query);
		return $result;
	}
	
	function CategoryByName($name)
	{
		$query="select * from product_category where category_name='".$name."'";
		$result=executeSQL($query);
		return $result;
		
		
	}
	
	function addCategory($cat_title,$textarea)
	{
		$query="INSERT INTO product_category(category_name,short_desc) VALUES ('$cat_title','$textarea')";
		$result = executeSQL($query);
		return $result;
	}
    
?>