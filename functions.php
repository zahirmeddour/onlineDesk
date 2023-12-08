<?php

function redirectTo($link)
{
    header("Location: http://{$link}");
}

function uploadFile($fileName)
{
    if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], '/var/www/uploads/' . $_FILES['uploadfile']['name'])) {
            return 1;
        } else {
            echo 'problem de stockage de fichier!';
        }
    } else {
        echo "problem d'upload de fichier!";
    }
}

function request($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}

function retJSON($JSONData)
{
    $jsonDat = file_get_contents($JSONData);
    $jsonDat = json_decode($jsonDat);

    return $jsonDat;
}

function retPost($postVariable)
{
    if (isset($_POST[$postVariable]))
        return $_POST[$postVariable];
    else
        return null;
}

function retGet($getVariable)
{
    if (isset($getVariable))
        return $getVariable;
    else
        return null;
}

function getRemoteIP()
{
    if (isset($_SERVER['REMOTE_ADDR'])) {
        return $_SERVER['REMOTE_ADDR'];
    } else {
        die ("Problem avec L'adresse a distance");
    }
}

function getServerIP()
{
    if (isset($_SERVER['HTTP_HOST'])) {
        return $_SERVER['HTTP_HOST'];
    } else {
        die ("Problem avec l'adresse Serveur");
    }
}
