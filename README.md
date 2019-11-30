# Mars Weather API

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)

The Mars Weather API is an API collecting data from NASA's InSight api and redistributing it as a REST API.

## Documentation

### Example response

```
{
    "id": 1000,
    "insight_id": 1460,
    "terrestrial_date": "2016-12-05 00:00:00",
    "sol": 1540,
    "ls": 274,
    "season": "Month 10",
    "min_temp": -72,
    "max_temp": -3,
    "min_gts_temp": -76,
    "max_gts_temp": 13,
    "pressure": 896,
    "pressure_string": "Higher",
    "abs_humidity": null,
    "wind_speed": null,
    "wind_direction": null,
    "atmo_opacity": "Sunny",
    "sunrise": "06:08",
    "sunset": "18:26",
    "local_uv_irradiance_index": "High",
    "created_at": "2019-11-30 15:29:39",
    "updated_at": "2019-11-30 15:29:39",
    "deleted_at": null
}
```

### **GET** - /v1/weather/
Retrieve one week of weather data.
```
https://api.mars.spacexcompanion.app/v1/weather
```

### **GET** - /v1/weather/{id}
Retrieve the weather by id
```
https://api.mars.spacexcompanion.app/v1/weather/1000
```

### **GET** - /v1/weather/first
Retrieve the first known weather on Mars
```
https://api.mars.spacexcompanion.app/v1/weather/first
```

### **GET** - /v1/weather/latest
Retrieve the latest known weather on Mars
```
https://api.mars.spacexcompanion.app/v1/weather/latest
```

### **GET** - /v1/weather/sync/{applicationKey}
Syncs all known weather records from the source database. The application-middleware will validate this.
```
https://api.mars.spacexcompanion.app/v1/weather/sync/ThisShouldBeARandomKey
```

### **GET** - /v1/sols/{nr}
Retrieve of sol {id} on Mars
```
https://api.mars.spacexcompanion.app/v1/sols/2593
```


### **PUT** - /v1/weather
Add a single weather result to the database
```
curl -X PUT "https://api.mars.spacexcompanion.app/v1/weather" \
    -H "Accept: application/json" \
    -H "Content-Type: application/json; charset=utf-8" \
    --data-raw "$body"
```


#### Body Parameters

- **body** should respect the following schema:

```json
{
    "insight_id": "2457",
    "terrestrial_date": "2019-11-25",
    "sol": "2594",
    "ls": "110",
    "season": "Month 4",
    "min_temp":"-79",
    "max_temp":"-22",
    "pressure":"772",
    "pressure_string":"Higher",
    "abs_humidity":"--",
    "wind_speed":"--",
    "wind_direction":"--",
    "atmo_opacity":"Sunny",
    "sunrise":"05:47",
    "sunset":"17:30",
    "local_uv_irradiance_index":"Moderate",
    "min_gts_temp":"-82",
    "max_gts_temp":"-8"
}
```

## Contributing

If you have any questions or tips, feel free to [contact](https://www.studionoorderlicht.nl/contact/) me anytime!.

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an [email](https://www.studionoorderlicht.nl/contact/) to Jeroen Boumans. All security vulnerabilities will be promptly addressed.

## License

GNU GENERAL PUBLIC LICENSE
Version 3, 29 June 2007
Everyone is permitted to copy and distribute verbatim copies
 of this license document, but changing it is not allowed.
