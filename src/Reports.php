<?php

class Reports {
    public function processData($data) {
        $processedData = [];
        foreach ($data as $row) {
            array_push($processedData, $row['id_dc'], $row['nombre'], $row['estatus']);
        }
        return $processedData;
    }
}

?>