<?php
use PHPUnit\Framework\TestCase;

class ReportsTest extends TestCase {

    public function testProcessedData() { // Prueba del procesamiento de datos
        $sampleData = [  // Datos de muestra para procesar
            ['id_dc' => 1, 'nombre' => 'Ernesto', 'estatus' => 'pendiente'],
            ['id_dc' => 3, 'nombre' => 'Emanuel', 'estatus' => 'pendiente'],
        ];
    
        $reports = new Reports();
    
        $processedData = $reports->processData($sampleData);
    
        $expectedProcessedData = [ // Datos procesados esperados
            [1, 'Ernesto', 'pendiente'],
            [3, 'Emanuel', 'pendiente'],
        ];
    
        // Comparamos los elementos de los arreglos uno por uno
        foreach ($expectedProcessedData as $index => $expectedRow) {
            $this->assertEquals($expectedRow, $processedData[$index]);
        }
    }

    public function testCalculateTotal() {
        $sampleData = [
            ['id_dc' => 1, 'nombre' => 'Ernesto', 'estatus' => 'pendiente'],
            ['id_dc' => 3, 'nombre' => 'Emanuel', 'estatus' => 'pendiente'],
        ];
    
        $reports = new Reports();
    
        $total = $reports->calculateTotal($sampleData);
    
        $expectedTotal = 2;
        $this->assertEquals($expectedTotal, $total);
    }
    

}

class Reports {
    public function processData($data) {
        $processedData = [];
        foreach ($data as $row) {
            // Ahora estamos agregando un arreglo con los valores al arreglo $processedData
            array_push($processedData, [$row['id_dc'], $row['nombre'], $row['estatus']]);
        }
        return $processedData;
    }
    public function calculateTotal($data) {
        return count($data);
    }
}

?>