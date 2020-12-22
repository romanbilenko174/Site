<?php
class News
{
	public static function getNewsItemByID($id)
	{
		$id = intval($id);
		if ($id) {
		$db = Db::getConnection();
		$result = $db->query('SELECT * FROM news WHERE id=' . $id);
		$result->setFetchMode(PDO::FETCH_ASSOC);
		$newsItem = $result->fetch();
		return $newsItem;
	}
	}
	public static function getNewsList() {
		$db = Db::getConnection();
		$newsList = array();
		$result = $db->query('SELECT id, title, date, author, short_data FROM news ORDER BY id ASC LIMIT 10');
		$i = 0;
		while($row = $result->fetch()) {
			$newsList[$i]['id'] = $row['id'];
			$newsList[$i]['title'] = $row['title'];
			$newsList[$i]['date'] = $row['date'];
			$newsList[$i]['author'] = $row['author'];
			$newsList[$i]['short_data'] = $row['short_data'];
			$i++;
		}
		return $newsList;
}
public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/static/news/';
        $pathToProductImage = $path . $id . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
            return $pathToProductImage;
        }
        return $path . $noImage;
    }
}