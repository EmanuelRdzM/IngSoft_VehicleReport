<?php
use PHPUnit\Framework\TestCase;

class ValidationDBTest extends TestCase {

    public function testDatabaseQuery() { // Prueba de consulta a la base de datos simulada
        $conexionSimulada = $this->createMock(mysqli::class);
        $conexionSimulada->method('query')->willReturn($this->createMock(mysqli_result::class));

        $dbConect = new DB_Concection();
        $dbConect->setDatabaseConnection($conexionSimulada);

        $result = $dbConect->performDatabaseQuery();

        $this->assertInstanceOf(mysqli_result::class, $result);
    }

    public function testVehiculoRobado() { // caso de prueba para vehiculo robado
        $validator = new ReportValidator();

        $result = $validator->isValidVehicle('robado');

        $this->assertTrue($result); 
    }

    public function testVehiculoInspeccion() { // caso de prueba para vehiculo inspeccionado
        $validator = new ReportValidator();

        $result = $validator->isValidVehicle('inspeccion');

        $this->assertTrue($result); 
    }

}

class DB_Concection {
    private $dbConnection;

    // Método para establecer la conexión a la base de datos (simulado para las pruebas)
    public function setDatabaseConnection($connection) {
        $this->dbConnection = $connection;
    }

    // Método que realiza la consulta a la base de datos
    public function performDatabaseQuery() {
        $consulta = "SELECT COUNT(*) AS motivo FROM datos_c WHERE motivo='vehiculo abandonado' AND estatus = 'pendiente';";
        return $this->dbConnection->query($consulta);
    }
}


class ReportValidator {
    private $validStatuses = ['robado', 'inspeccion', 'pendiente'];

    public function isValidVehicle($status) {
        return in_array($status, $this->validStatuses);
    }

    public function isValidVehicleForReport($status) {
        return $status === 'robado' || $status === 'inspeccion';
    }

    public function isValidUser($userType) {
        return $userType === 'usuario' || $userType === 'admin';
    }

    public function isValidReportData($data) {
        return isset($data['vehicle_id']) && isset($data['user_id']) && isset($data['description']);
    }

    // Agregar más funciones de validación según sea necesario
}

?>