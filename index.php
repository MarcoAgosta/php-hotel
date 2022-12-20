<?php

    $listafiltrata = [];

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

    $filtrare = isset($_GET["parcheggio"]);

    if ($filtrare){
        foreach ($hotels as $hotel){

            if ($_GET["parcheggio"] == "true"){

                if ($hotel['parking'] == true){
                    array_push($listafiltrata, $hotel);
                };
            } elseif ($_GET["parcheggio"] == "false"){

                if ($hotel['parking'] == false){
                    array_push($listafiltrata, $hotel);
                };
            } elseif ($_GET["parcheggio"] == "null"){

                array_push($listafiltrata, $hotel);
            }
        };
    } else {
        $listafiltrata = $hotels;
    }

    $i = 0;

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-3">Lista Hotel</h1>

        <div class="col-6 mb-4">
            <form method="GET" action="">
                <select name="parcheggio" class="form-select d-inline w-75" aria-label="Default select example">
                    <option selected value="null">Parcheggio</option>
                    <option value="true">Presente</option>
                    <option value="false">Assente</option>
                </select>
                <button class="btn btn-primary mb-1"> Filtra</button>
            </form>
            
        </div>

        <table class="table border">
            <thead>
                <th>#</th>
                <th>Nome</th>
                <th>Descrizione</th>
                <th>Parcheggio</th>
                <th>Voto</th>
                <th>Distanza dal centro</th>
            </thead>

            <tbody>
                <?php
                foreach ($listafiltrata as $hotel){
                    $i++;
                    echo "<tr>";
                    echo "<td>{$i}</td>";
                    echo "<td>{$hotel['name']}</td>";
                    echo "<td>{$hotel['description']}</td>";
                    if ($hotel['parking']==true){
                        echo "<td>Presente</td>";
                    } else {
                        echo "<td>Assente</td>";
                    };
                    echo "<td>{$hotel['vote']}</td>";
                    echo "<td>{$hotel['distance_to_center']} Km</td>";
                    echo "</tr>";
                };
                ?>
            </tbody>

        </table>
    </div>
    
</body>
</html>