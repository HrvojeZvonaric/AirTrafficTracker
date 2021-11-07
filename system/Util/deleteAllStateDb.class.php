<?php

class deleteAllStateDb {

   

    public static function deleteAll() {

            $query = "TRUNCATE TABLE drzave";

            AppCore::getDB()->sendQuery($query);
    }
}