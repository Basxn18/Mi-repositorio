import { MongoClient, Db } from 'mongodb';

async function insertMessage() {
  const uri = 'mongodb+srv://<username>:<password>@<cluster-url>/<database>?retryWrites=true&w=majority';

  try {
    // Conectarse al servidor de MongoDB
    const client = await MongoClient.connect(uri);
    const db: Db = client.db('<database-name>');
    const collection = db.collection('<collection-name>');

    // Obtener los valores del formulario
    const email: string = req.body.email;
    const name: string = req.body.name;
    const phone: string = req.body.phone;
    const message: string = req.body.message;

    // Crear el documento con los datos del formulario
    const document = {
      email: email,
      name: name,
      phone: phone,
      message: message
    };

    // Insertar el documento en la colección
    const result = await collection.insertOne(document);

    if (result.insertedCount > 0) {
      console.log('Mensaje enviado correctamente.');
    } else {
      console.log('Error al enviar el mensaje.');
    }

    // Cerrar la conexión a MongoDB
    client.close();
  } catch (error) {
    console.error('Error en la conexión a MongoDB:', error);
  }
}

// Llamar a la función para insertar el mensaje
insertMessage();

console.log('Hello World')
