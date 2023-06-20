const express = require('express');
const bodyParser = require('body-parser');
const MongoClient = require('mongodb').MongoClient;
const app = express();
const port = 3000;

app.use(bodyParser.urlencoded({ extended: true }));

MongoClient.connect('mongodb+srv://basxnn:montagas123.@cluster0.1crsr13.mongodb.net/Form?retryWrites=true&w=majority', { useNewUrlParser: true })
  .then(client => {
    const db = client.db('Form');
    const emailCollection = db.collection('email');
    const messageCollection = db.collection('message');
    const phoneCollection = db.collection('phone');
    const nameCollection = db.collection('name');

    app.post('/submit-form', (req, res) => {
      const formData = req.body;

      // Insert data into respective collections
      Promise.all([
        emailCollection.insertOne({ email: formData.email }),
        messageCollection.insertOne({ message: formData.message }),
        phoneCollection.insertOne({ phone: formData.phone }),
        nameCollection.insertOne({ name: formData.name })
      ])
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
