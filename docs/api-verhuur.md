# Verhuur API systeem 

## Endpoints 

De API heeft de volgende eindpunten: 

| Endpoint        | `GET`    | `POST`    | `PATCH`    | `DELETE`    | `PUT`   |
| :-------------- | :------- | :-------- | :--------- | :---------- | :------ |
| `rental`        | `OK`     | -         | -          | -           | -       |
| `rental/create` | -        | `OK`      | -          | -           | -       |
| `rental/{id}`   | `OK`     | -         | -          | `OK`        | `OK`    |  

## Headers 

De volgende headers moeten opgestuurd worden naar de server: 

| Header       | Content            | 
| :----------- | :----------------- |
| Accept       | `application/json` |
| Authencation | JSON token         |

## Authencatie

De authencatie verloopt doormiddel van een token. Deze token kunt u terugvinden bij uw account info. 
Als u een login hebt en toegang heeft tot de administrator panel in het platform. 

Deze token moet u wel na elke request terug meesturen met `?api_token=<uw token>`

BV: `http://wwww.st-joris-turnhout.be/api/v1/rental?api_token=<mijn token>`.

## Eindpunten 

### `GET` /rental 

Geeft alle verhuringen weer. Deze worden opgebroken in data stukken van 5.

```
{  
  	"data":[{  
        "id":1,
        "start_datum":"fgfgds",
        "eind_datum":"gfds",
        "status":0,
        "groep":"",
        "email":"fgd"
    }],
   	"meta":{  
      	"cursor":{  
          "current":false,
           "prev":6,
           "next":1,
           "count":1
      	}
   	}
}
```

### `GET` rental/{id}

Geef een specifieke verhuring weer.

### `PUT` rental/{id}

Wijzig eeen verburing . Voor de status te bepalen maken we gebruiken van integers. De statussen vind
je bij de `POST` rentel/create request.

Alle invoer velden zijn verplicht. 

| Parameter     | Data type | Description.                  | 
| :------------ | :-------- | :---------------------------- |
| `Start_datum` | `string`  | Start datum van de verhuring. |
| `Eind_datum`  | `string`  | Eind datum van de verhuring.  |
| `Status`      | `integer` | De status van de verhuring.   | 
| `Email`       | `string`  | De email van de aanvrager.    |
| `telephone`   | `string`  | De tel. nr van de aanvrager.  |

### `POST` rental/create

Maak een nieuwe verhuring aan. Voor de status te bepalen maken we gebruik van integers. hier onder 
vind je met de parameters een omschrijving.

Alle invoer velden zijn verplicht.

| Parameter     | Data type | Description.                  | 
| :------------ | :-------- | :---------------------------- |
| `Start_datum` | `string`  | Start datum van de verhuring. |
| `Eind_datum`  | `string`  | Eind datum van de verhuring.  |
| `Status`      | `integer` | De status van de verhuring.   | 
| `Email`       | `string`  | De email van de aanvrager.    |
| `telephone`   | `string`  | De tel. nr van de aanvrager.  |
| `group`       | `string`  | De group die wilt huren.      |

#### Status parameters 

| Waarde | Beschrijving         |
| :----- | :------------------- |
| `0`    | Nieuwe aanvraag      | 
| `1`    | Optie                | 
| `2`    | Bevestigd            | 

**Success message** 

```
{
	"message": "rental create"
}
```

**Failure message**

```
{
	"message": "cannot perform the operation."
}
```

### `DELETE` rental/{id}

Verwijder een verhuring. De {id} is verplicht zodat het systeem weet welke record verwijderd moet worden.

**Success message**

```
{
	"message": "rental deleted"
}
```

**Failure message**

```
(need to develop this)
```
