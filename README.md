ISTRUZIONI DI AVVIO

Eseguire i seguenti comandi per :
- far partire il container Xampp :
```
docker run --name myXampp -p 22:22 -p 80:80 -d -v /workspaces/codici_postali:/www tomsik68/xampp:8
```
- importare il database:
```
docker exec myXampp /bin/sh -c "export PATH=/opt/lampp/bin:$PATH &&  mysql -u root < /www/db.sql"
```
