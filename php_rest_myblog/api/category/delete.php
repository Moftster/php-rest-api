<?php 

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Authorization, Access-Control-Allow-Methods, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    //Instantiate DB Object and Connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Category Object
    $category = new Category($db);

    // Get raw categoryed data
    $data = json_decode(file_get_contents("php://input"));

    // Set ID to delete
    $category->id = $data->id;

    // Delete category
    if($category->delete()){
        echo json_encode(
            array('message' => 'Category deleted!')
        );
    } else {
        echo json_encode(
            array('message' => 'Category not deleted.')
        );
    }
