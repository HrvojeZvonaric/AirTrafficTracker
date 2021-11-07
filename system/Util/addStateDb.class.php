<?php

class addStateDb {

    //funkcija koja prima drzavu za dodavanje u tracker

    public static function addState($state) {

            $query = "INSERT INTO drzave(imeDrzave)
            VALUES ('$state')";

            AppCore::getDB()->sendQuery($query);
    }
}