<?php

function redirectTo($link)
{
    if (!isset($link))
        return null;
    else
        header("Location: http://{$link}");
}

function uploadFile($fileName)
{
    if (!isset($fileName))
        return null;
    if (is_uploaded_file($_FILES['uploadfile']['tmp_name'])) {
        if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], '/var/www/uploads/' .
            $_FILES['uploadfile']['name'])) {
            return 1;
        } else {
            echo "problem de stockage de fichier!";
        }
    } else {
        echo "problem d'upload de fichier!";
    }
}

function request($url)
{

    if (!isset($url)) {
        return null;
    }

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $res = curl_exec($ch);
    curl_close($ch);

    return $res;
}

function retJSON($JSONData)
{

    if (!isset($JSONData)) {
        return null;
    }

    $jsonDat = file_get_contents($JSONData);
    $jsonDat = json_decode($jsonDat);

    return $jsonDat;
}

function retPost($postVariable)
{
    if (!isset($_POST[$postVariable]))
        return null;
    else
        return $_POST[$postVariable];
}

function retGet($getVariable)
{
    if (!isset($getVariable))
        return null;
    else
        return $getVariable;
}

function getRemoteIP()
{
    if (!isset($_SERVER['REMOTE_ADDR']))
        return null;
    else
        return $_SERVER['REMOTE_ADDR'];
}

function getServerIP()
{
    if (!isset($_SERVER['HTTP_HOST']))
        return null;
    else
        return $_SERVER['HTTP_HOST'];
}
