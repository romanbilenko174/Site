<?php include ROOT.'/views/layouts/header.php';?>
<div id="content">
    <div id="catalog">
        <div id="ddm">
            <div class="but">
                <font id="ddm-text"><a id="addm" href="/catalog" style="color:white; text-decoration: none;">Каталог товаров</a> <div id="images">
                    <img id="mnog" src="/static/images/mnog.png"/>
                    <img id="mnog2" src="/static/images/mnog2.png"/>
                </div></font>
               
                 <div class="category-products">
                    <?php foreach ($categories as $categoryItem): ?>
                        <h4 class="panel-title">
                            <a   id="link" href="/category/<?php echo $categoryItem['id']; ?>">
                                <font id="menudata">
                                <?php echo $categoryItem['name']; ?>
                            </font>
                            </a>
                        </h4>
                    <?php endforeach; ?>
                </div> 

            </div>
            <div class="search" >
                <form id="search" method="post" action="/fullsearch">
                <input type="text" name="q" placeholder="Поиск по каталогу"  id="sl" autocomplete="off" onmouseover="" onblur="">
                <input type="submit" id="sb" name="search" value="">
                </form>
            </div>
            </div>
             
        </div>
          <div id="block-search-result">
                    <ul id="list-search-result">  
                    </ul>
                </div>      
    </div>
<?php 
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'nst');

if (!mysql_connect(DB_HOST, DB_USER, DB_PASS)) {
    exit('Cannot connect to server');
}
if (!mysql_select_db(DB_NAME)) {
    exit('Cannot select database');
}

mysql_query('SET NAMES utf8');

function search ($query) 
{ 
    $query = trim($query); 
    $query = mysql_real_escape_string($query);
    $query = htmlspecialchars($query);

    if (!empty($query)) 
    { 
        if (strlen($query) < 3) {
            $text = '<p>Слишком короткий поисковый запрос.</p>';
        } else if (strlen($query) > 128) {
            $text = '<p>Слишком длинный поисковый запрос.</p>';
        } else { 
            $q = "SELECT * FROM goods WHERE name LIKE '%$query%'";

            $result = mysql_query($q);

            if (mysql_affected_rows() > 0) { 
                $row = mysql_fetch_assoc($result); 
                $num = mysql_num_rows($result);

                $text = '<p style="text-align:center;">По запросу <b>'.$query.'</b> найдено '.$num.' '.Cart::getNumEnding($num,array("совпадение","совпадения","совпадений")) .'</p>';

                do {
                   $text .= '<div id="clearer1"><div id="product"><a id="productname" href="/product/'.$row['id'].'"><img  class="productimg" id="productimg'.$row['id'].'" src="'.Product::getImage($row['id']).'" alt="" /></a>
                   <p>
                    <a id="productname" href="/product/'.$row['id'].'">
                        '.$row['name'].'
                        </a>
                </p>
                 <div id="center">
                <h3 style="margin-top:5px; margin-right:20px;">'.$row['price'].' руб.</h3>
                <a href="#" class="add-to-cart" data-id="'.$row['id'].'">Купить</a>
                <a href="#" class="added-to-cart" data-id="'.$row['id'].'">В корзине</a>
                </div>
             </div>
             </div>';               
            } while ($row = mysql_fetch_assoc($result)); 
            } else {
                $text = '<p>По вашему запросу ничего не найдено.</p>';
            }
        } 
    } else {
        $text = '<p>Задан пустой поисковый запрос.</p>';
    }

    return $text; 
} 
?>
<?php 
if (!empty($_POST['q'])) { 
    $search_result = search ($_POST['q']); 
    echo $search_result; 
}
?>
<?php include ROOT.'/views/layouts/footer.php';?>
