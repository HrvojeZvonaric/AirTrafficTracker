<?php

class deleteStateDb {

    //funkcija koja prima drzavu za brisanje iz trackera

    public static function deleteState($state) {

            $query = "DELETE FROM drzave
            WHERE imeDrzave = ('$state')";

            AppCore::getDB()->sendQuery($query);
    }
}