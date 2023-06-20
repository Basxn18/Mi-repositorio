const express = require('express');
const bodyParser = require('body-parser');
const MongoClient = require('mongodb').MongoClient;
 const app = express();
const port = 3000;
 app.use(bodyParser.urlencoded({ extended: true }));
 MongoClient.connect('mongodb+srv://cluster0.1crsr13.mongodb.net/" --apiVersion 1 --username Basxnn', { useNewUrlParser: true })
  .then(client => {
    const db = client.db('<database>');
    const collection = db.collection('<collection>');
     app.post('/submit-form', (req, res) => {
      const formData = req.body;
       collection.insertOne(formData)
        .then(result => {
          res.send('Form data saved successfully');
        })
        .catch(error => {
          console.error(error);
          res.status(500).send('An error occurred while saving the form data');
        });
    });
     app.listen(port, () => {
      console.log(`Server listening on port ${port}`);
    });
  })
  .catch(error => {
    console.error(error);
    process.exit(1);
  });