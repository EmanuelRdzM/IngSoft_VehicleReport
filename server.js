const express = require('express');
const mysql = require('mysql');
const cors = require('cors'); // Importa la biblioteca 'cors'

const app = express();
//const port = 3000;
const port = 80;


app.use(express.static(__dirname));

app.use(cors());

// Middleware para analizar el cuerpo de la solicitud como JSON
app.use(express.json());

// Configura la conexión a la base de datos
const dbConfig = {
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'plataforma_consultas2',
};

const connection = mysql.createConnection(dbConfig);

// Conectar a la base de datos
connection.connect((err) => {
  if (err) {
    console.error('Error al conectar a la base de datos:', err);
  } else {
    console.log('Conexión exitosa a la base de datos.');
  }
});

// Ruta para guardar datos en la base de datos
app.post('/api/guardarInforme', (req, res) => {
  const { vin, year, model, make, style, overall_length, overall_height, overall_width, standard_seating, made_in, steering_type } = req.body;

  const sql = 'INSERT INTO informe_vehiculos (vin, year, model, make, style, overall_length, overall_height, overall_width, standard_seating, made_in, steering_type) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';

  const values = [vin, year, model, make, style, overall_length, overall_height, overall_width, standard_seating, made_in, steering_type];

  connection.query(sql, values, (error, results) => {
    if (error) {
      console.error('Error al insertar datos en la base de datos:', error);
      res.status(500).json({ error: 'Error al insertar datos' });
    } else {
      console.log('Datos insertados correctamente.');
      res.json({ message: 'Datos guardados correctamente' });
    }
  });
});

app.get('/welcome', (req, res) => {
    res.send('Bienvenido a mi sitio web');
  });

// Iniciar el servidor
app.listen(port, () => {
  console.log(`Servidor escuchando en el puerto ${port}`);
});
