<?php

class Item extends Model
{

    public static function getList()
    {

        $db = Database::getConnexion ();

        $sql = "SELECT * FROM INFO2_items";
        $stmt = $db->prepare ($sql);
        $stmt->execute ();

        return $stmt->fetchAll ();
    }

    public static function getFromSlug($slug)
    {

        $db = Database::getConnexion ();

        $slug = filter_var ($slug, FILTER_SANITIZE_STRING);
        $sql = "SELECT * FROM INFO2_items WHERE slug = :param";
        $stmt = $db->prepare ($sql);
        $stmt->bindValue ("param", $slug);
        $stmt->execute ();

        return $stmt->fetch();
    }

    public static function updateFromSlug($params) {

        $db = Database::getConnexion ();

        $slug = filter_var ($params['slug'], FILTER_SANITIZE_STRING);
        $description = filter_var ($params['description'], FILTER_SANITIZE_STRING);
        $expiration = filter_var ($params['expiration'], FILTER_SANITIZE_STRING);

        $sql = "UPDATE INFO2_items SET description = '$description', expiration = '$expiration' WHERE slug = '$slug'";

        return $db->exec ($sql);
    }

}