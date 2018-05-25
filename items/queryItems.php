<?php 
$query="SELECT * FROM products";
if (isset($_POST['searchSubmit'])){
    $order=$_POST['radOrder'];
    $type=$_POST['typeList'];
    $search=$_POST['search'];
    if($type!=='All'){
        $query=$query." WHERE type='$type'";} 
    if($type!=='All'&&(!empty($search))){
        $query=$query." AND review LIKE '%$search%'";}
    if($type=='All'&&(!empty($search))){
        $query=$query." WHERE review LIKE '%$search%'";}
    if(!empty($order)){
        $query=$query." ORDER BY $order";}

$_SESSION['query']= $query;
$_SESSION['searchSubmit']= $_POST['searchSubmit'];
$_SESSION['order']= $order;
$_SESSION['type']= $type;
$_SESSION['search']= $search;
}
header('location:web_dev.php?content=mainPage/PDO.php');


?>