// silly chrome wants SSL to do screensharing
<<<<<<< HEAD
dsd
=======
dsdsds
>>>>>>> d55a985d47f88e0f037c4ad753d93386e2f7478d

var privateKey = fs.readFileSync('fakekeys/privatekey.pem').toString(),
    certificate = fs.readFileSync('fakekeys/certificate.pem').toString();


var app = express();

app.use(express.static(__dirname));

https.createServer({key: privateKey, cert: certificate}, app).listen(8000);
http.createServer(app).listen(8001);


