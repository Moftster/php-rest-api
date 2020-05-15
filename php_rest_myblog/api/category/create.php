<?php 

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    //Instantiate DB Object and Connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate category Object
    $category = new Category($db);

    // Get raw categoryed data
    $data = json_decode(file_get_contents("php://input"));

    $category->name = $data->name;

    // Create category
    if($category->create()){
        echo json_encode(
            array('message' => 'category created!')
        );
    } else {
        echo json_encode(
            array('message' => 'category not created.')
        );
    }
