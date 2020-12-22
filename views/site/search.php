<?php
$db_host		= 'localhost';
$db_user		= 'root';
$db_pass		= '';
$db_database	= 'nst'; 

$link = mysql_connect($db_host,$db_user,$db_pass);

mysql_select_db($db_database,$link) or die("Ошибка".mysql_error());
mysql_query("SET names utf8");
function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/static/products/';
        $pathToProductImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
$queryString = $_POST['q'];
$search = mysql_real_escape_string($queryString);
$result = mysql_query("SELECT * FROM goods WHERE name LIKE '%$search%' LIMIT 5",$link);
 If (mysql_num_rows($result) > 0)
{
$row = mysql_fetch_array($result);
do
{
      
echo '
<br>
<br>
<li style="list-style:none;">
<div align="center" class="search-result-image" >
<a  href="/product/'.$row['id'].'" ><img  id="searchimg" src="'.getImage($row['id']).'" /></a>
</div>
<div class="block-title-price">
<a href="/product/'.$row['id'].'">'.$row["name"].'</a>
<p>'.$row["price"].' руб</p>
</div>
</li>
';
}
 while ($row = mysql_fetch_array($result));
}else{
    echo '
<center>
<a id="search-noresult" >Ничего не найдено! :\'(</a>
</center>    
';    
}
?>