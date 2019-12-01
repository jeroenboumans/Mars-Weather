# Mars Weather API

[![buddy pipeline](https://app.buddy.works/studionoorderlicht/mars-weather/pipelines/pipeline/226287/badge.svg?token=ff018493511180fdeb94a5b441fe39a51a4d5b2d1bc24c0f68f4c7099e7c4e5d "buddy pipeline")](https://app.buddy.works/studionoorderlicht/mars-weather/pipelines/pipeline/226287)

![](https://mars-jpl-nasa-gov.s3.amazonaws.com/src/insight/insight_weather_bg.jpg)

The Mars Weather API is an API collecting data from NASA's InSight api and redistributing it as a REST API.

## Application URL
[https://api.mars.spacexcompanion.app/](https://api.mars.spacexcompanion.app/)

## Example response

```
{
  "sol": 359,
  "season": "spring",
  "measurement": {
    "first": "2019-11-30 00:00:00",
    "last": "2019-11-30 00:00:00"
  },
  "air": {
    "temperature": {
      "average": -63.06,
      "minimum": -99.32,
      "maximum": -21.75
    },
    "pressure": {
      "average": 668.79,
      "minimum": 652.77,
      "maximum": 681.96
    }
  },
  "wind": {
    "speed": {
      "average": 5.8,
      "minimum": 0.21,
      "maximum": 23.26
    },
    "directions": [
      {
        "point": "N",
        "degrees": 0,
        "up": 1,
        "right": 0
      },
      ...
    ]
  }
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
