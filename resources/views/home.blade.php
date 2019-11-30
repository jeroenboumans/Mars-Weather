<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- UIkit CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/css/uikit.min.css" />

    <!-- UIkit JS -->
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/js/uikit.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/uikit@3.2.3/dist/js/uikit-icons.min.js"></script>

    <title>Mars Weather API <?=$version?></title>
</head>
<body>


    <div class="uk-section uk-section-secondary">

        <div class="uk-container uk-container-small">
            <h1 class="display-4">Mars Weather API <?=$version?></h1>
            <p class="lead">The Mars Weather API is an API collecting data from NASA's <a href="https://mars.nasa.gov/insight/weather/">InSight API</a> and redistributing it as a REST API.</p>
        </div>
    </div>

    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small">
            <h2>Endpoints</h2>
            <h3><span class="uk-label uk-label-success">GET</span> /weather</h3>
            <p>Retrieve weather data. Note: This endpoint is limited to 30 requests per minute.</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather</pre></p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather?year=2018" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather?year=2018</pre></p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather?month=3&year=2017&day=25&range=day" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather?month=3&year=2017&day=25&range=day</pre></p>
            <table class="uk-table uk-table-striped">
                <thead>
                <tr>
                    <th>Param</th>
                    <th>Info</th>
                    <th>Values</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>day</td>
                    <td>Number of the day</td>
                    <td>1 - 31</td>
                </tr>
                <tr>
                    <td>month</td>
                    <td>Number of the month</td>
                    <td>1 - 12</td>
                </tr>
                <tr>
                    <td>year</td>
                    <td>Number of the year</td>
                    <td>2012 - now</td>
                </tr>
                </tbody>
            </table>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/{id}</h3>
            <p>Retrieve the weather by id</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/1000" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/1000</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/first</h3>
            <p>Retrieve the first known weather on Mars</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/first" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/first</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/latest</h3>
            <p>Retrieve the latest known weather on Mars</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/latest" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/latest</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/sync/{applicationKey}</h3>
            <p>Syncs all known weather records from the source database. The application-middleware will validate this.</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/sync/ThisShouldBeARandomKey" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/sync/ThisShouldBeARandomKey</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/sols/{nr}</h3>
            <p>Retrieve of sol {nr} on Mars</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/sols/2593" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/sols/2593</pre></p>

            <h3><span class="uk-label uk-label-warning">PUT</span> /weather</h3>
            <p>Add a single weather result to the database.</p>
            <pre>https://api.mars.spacexcompanion.app/v1/weather</pre>
            <p>Request body format:</p>
            <pre>{
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
    }</pre>
        </div>
    </div>

</body>
</html>
