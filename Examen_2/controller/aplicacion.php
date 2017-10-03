<?php
/**
 * Created by PhpStorm.
 * User: jorgenunez
 * Date: 10/02/17
 * Time: 11:18 PM
 */
require_once './vendor/autoload.php';
$app = new \Slim\Slim();
$app->config(array(
            'debug'=>true,
            'templates.path'=>'view'
            ));

$app->get('/ws/(:min)/(:max)', function ($min, $max) use ($app) {
    $json = leerArchivo();
    $employees = array();

    foreach ($json as $employee) {
        $salary = floatval(str_replace(array('$', ','), '', $employee['salary']));
        if ($salary >= $min && $salary <= $max) {
            array_push($employees, $employee);
        }
    }
    $response['response']['employees'] = $employees;
    $xml_user_info = new SimpleXMLElement("<?xml version='1.0'?><root><response></response></root>");
    array_to_xml($employees, $xml_user_info);

    echo $xml_user_info->asXML();
});

$app->get('/detalle/:id', function ($id) use ($app) {
    $json = leerArchivo();
    $key = array_search($id, array_column($json, 'id'));
    $data['employees'][0] = $json[$key];
    $skills = '';
    foreach ($data['employees'][0]['skills'] as $skill) {
        $skills .= $skill['skill'] . ',';
    }
    $data['skills'] = trim($skills, ',');
    return $app->render('../view/detalle.php', $data);
});

$app->get('/', function () use ($app) {
    $data['employees'] = leerArchivo();
    $app->render('../view/lista.php', $data);
});

$app->post('/', function () use ($app) {
    $email = $app->request()->post('email');
    $json = leerArchivo();
    if ($email != '') {
        $key = array_search($email, array_column($json, 'email'));
        $data['employees'][0] = $json[$key];
        $data['email'] = $email;
    } else {
        $data['employees'] = $json;
    }

    return $app->render('../view/lista.php', $data);
});

function array_to_xml($array, &$xml_user_info)
{
    foreach ($array as $key => $value) {
        if (is_array($value)) {
            if (!is_numeric($key)) {
                $subnode = $xml_user_info->addChild("$key");
                array_to_xml($value, $subnode);
            } else {
                $subnode = $xml_user_info->addChild("item$key");
                array_to_xml($value, $subnode);
            }
        } else {
            $xml_user_info->addChild("$key", htmlspecialchars("$value"));
        }
    }
}

function leerArchivo()
{
    return json_decode(file_get_contents('employees.json', true), true);
}