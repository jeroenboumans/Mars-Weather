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
            <h6 class="uk-heading-line uk-text-center"><span>SpaceX Companion - API</span></h6>

            <h1 class="display-4">Mars Weather API <?=$version?></h1>
            <p class="lead">The Mars Weather API is an API collecting data from NASA's <a href="https://mars.nasa.gov/insight/weather/">InSight API</a> and redistributing it as a REST API.</p>

            <h3>Build with Laravel</h3>
            <p><strong>Mars Weather API</strong> is build on Laravel's <a href="https://lumen.laravel.com/" target="_blank">Lumen</a> platform to provide quick and fast request response.</p>
            <a href="https://github.com/jeroenboumans/Mars-Weather" target="_blank" class="uk-button uk-button-default"><span class="uk-margin-small-right uk-icon" uk-icon="icon: github"></span> Source code </a>
        </div>
    </div>

    <div class="uk-section uk-section-default">
        <div class="uk-container uk-container-small">
            <h2>Endpoints</h2>
            <h3><span class="uk-label uk-label-success">GET</span> /weather</h3>
            <p>Retrieve weather data. Note: This endpoint is limited to 30 requests per minute.</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather</pre></p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather?year=2019" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather?year=2019</pre></p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather?month=11&year=2019&day=25&range=day" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather?month=11&year=2019&day=25&range=day</pre></p>
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
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/3" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/3</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/first</h3>
            <p>Retrieve the first known weather on Mars</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/first" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/first</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/latest</h3>
            <p>Retrieve the latest known weather on Mars</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/weather/latest" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/weather/latest</pre></p>

            <h3><span class="uk-label uk-label-success">GET</span> /weather/sols/{nr}</h3>
            <p>Retrieve of sol {nr} on Mars</p>
            <p><a target="_blank" href="https://api.mars.spacexcompanion.app/v1/sols/355" class="uk-button uk-button-primary uk-button-small">Run</a> <pre>https://api.mars.spacexcompanion.app/v1/sols/355</pre></p>

        </div>
    </div>
    <div class="uk-section uk-section-muted">

        <div class="uk-container uk-container-small">
            <h6 class="uk-heading-line uk-text-center"><span>Studio Noorderlicht &copy;<?=date('Y')?></span></h6>
        </div>
    </div>
</body>
</html>
