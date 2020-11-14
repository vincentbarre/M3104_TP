<?php

class Item extends Model
{

    public static function getList()
    {

        $db = Database::getConnexion ();

        $sql = "SELECT * FROM INFO2_Items";
        $stmt = $db->prepare ($sql);
        $stmt->execute ();

        return $stmt->fetchAll ();
    }

    public static function getFromSlug($slug)
    {

        $db = Database::getConnexion ();

        $slug = filter_var ($slug, FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM INFO2_Items WHERE slug = :param";
        $stmt = $db->prepare ($sql);
        $stmt->bindValue ("param", $slug);
        $stmt->execute ();

        return $stmt->fetch ();
    }

}