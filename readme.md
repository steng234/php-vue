# Prova Tecnica Watuppa

## Istruzioni di avvio

Per eseguire correttamente il progetto, ti consigliamo di utilizzare **due terminali separati**: uno per il frontend e uno per il backend.

---

## 1. Backend

### Configurazione delle variabili d’ambiente

navigare nella cartella `backend/`

Crea un file `.env` nella  con queste variabili:

```
DB_HOST=localhost
DB_USERNAME=root
DB_PASSWORD=password
DB_NAME=php_vue
FRONTEND_URL=http://localhost:5174
```

Installa le dipendenze:

```
composer install
```

Inizializza il Database (se non già presente):

note: il database deve essere gia presente:

```
php scripts/run_migrations.php
php scripts/run_seeders.php
```

Avvia il backend:

```
php -S localhost:8080 -t public
```
---

## Frontend

### Configurazione delle variabili d’ambiente

navigare nella cartella `frontend/`

Crea un file `.env` nella  con queste variabili:

```
VITE_BACKEND_URL=http://localhost:8002/api
```

Installa le dipendenze:

```
npm install
```

Avvia il server di sviluppo:

```
npm run dev
```

Per buildare il progetto in ES5 (legacy):

```
npm run build
```

## Email di testing del proggramma

```
mario.rossi@example.com
```