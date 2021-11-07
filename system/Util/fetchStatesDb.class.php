<?php



class fetchStatesDb {

    //slanje querya za dohvat svih trackanih drzava

    public static function fetchStates() {

            $query = "SELECT * FROM drzave";

            $result = AppCore::getDB()->sendQuery($query);

            return $result;
    }
}