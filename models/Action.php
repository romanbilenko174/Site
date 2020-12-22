<?php
class Action{
	const SHOW_BY_DEFAULT = 4;
	public static function getLatestActions($count = self::SHOW_BY_DEFAULT)
    {
        $db = Db::getConnection();
        $sql = 'SELECT id , title , startdate , enddate, data FROM actions '
                . 'ORDER BY id DESC'
                . ' LIMIT :count';
        $result = $db->prepare($sql);
        $result->bindParam(':count', $count, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        $i = 0;
        $actionsList = array();
        while ($row = $result->fetch()) {
            $actionsList[$i]['id'] = $row['id'];
            $actionsList[$i]['title'] = $row['title'];
            $actionsList[$i]['startdate'] = $row['startdate'];
            $actionsList[$i]['enddate'] = $row['enddate'];
            $actionsList[$i]['data'] = $row['data'];
            $i++;
        }
        return $actionsList;
    }
    public static function getImage($id)
    {
        $noImage = 'no-image.jpg';
        $path = '/static/actions/';
        $pathToActionImage = $path . $id . '.jpg';

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToActionImage)) {
            return $pathToActionImage;
        }
        return $path . $noImage;
    }
    public static function getActionById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM actions WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
}
?>