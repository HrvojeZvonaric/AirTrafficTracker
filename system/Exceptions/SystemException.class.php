<?php

class SystemException extends Exception {

    public function show () {

        return ("Greska: " . $this->getMessage() .
         "U datoteci: " . $this->getFile() .
         "Na liniji: " . $this->getLine() .
         "StackTrace: "  . $this->getTraceAsString()
        );
    }
}