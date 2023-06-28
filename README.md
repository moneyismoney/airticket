## How to start:

- Clone the project

- Prepare environment
```
docker-compose build
docker-compose up -d
```
- Create DB structure by db.sql script

- Do the POST request to {{base_url}}/api/search.php, with such parameters:
```
date: "2023-11-21"
origin: "KBP"
destination: "VIE"
```
- If you prefer Postman, import collection from GetFlights.postman_collection.json