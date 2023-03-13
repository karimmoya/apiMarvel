<!DOCTYPE html>
<html>
    <head>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">;
    <meta charset="UTF-8">
    </head>
    <body>
    <style>
    body {
        background-color: #202020;
        font-family: 'Montserrat', sans-serif;
    }
        h2 {
    text-align: center;
    font-size: 24px;
    margin-top: 40px;
    color: white;
    background-color: #EC1D24;
    padding: 10px;
    width: fit-content;
    margin-left: auto;
    margin-right: auto;
    box-sizing: border-box;
    text-shadow: 1px 1px black;
    border: 2px solid white;


   

}
    h3 {
        font-size: 20px;
        margin-top: 20px;
        color: whitesmoke;
    }
    p {
        font-size: 16px;
        margin-top: 10px;
        color: #666;
        text-align: justify;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #2c2c2c;
    }
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        margin-top: 20px;
        width: 200px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px #2c2c2c;
    }
</style>
        <?php
        $public_key = '77e175bf4c5298ecc69e19d4d032e812';
        $private_key = '27d1d81fbf372b1129599ea6266ba0d2c7e71278';
        $timestamp = 1000;
        $hash = md5($timestamp . $private_key . $public_key);
        $url = 'http://gateway.marvel.com/v1/public/comics?ts=' . $timestamp . '&apikey=' . $public_key . '&hash=' . $hash;

        $response = file_get_contents($url);
        if ($response === false) {
            echo 'Error al llamar a la API';
            exit;
        }
        $data = json_decode($response, true);

        echo '<h2>Lista de Comics</h2>';
        foreach ($data['data']['results'] as $comic) {
            echo '<h3>' . $comic['title'] . '</h3>';
            echo '<p>Descripción: ' . $comic['description'] . '</p>';
            echo '<img src="' . $comic['thumbnail']['path'] . '.' . $comic['thumbnail']['extension'] . '"/>';
        }
        ?>
    </body>
</html>
