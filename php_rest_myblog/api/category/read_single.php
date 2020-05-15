<?php 

    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Category.php';

    //Instantiate DB Object and Connect
    $database = new Database();
    $db = $database->connect();

    // Instantiate Category Object
    $category = new Category($db);

   // Get ID from URL
   $category->id = isset($_GET['id']) ? $_GET['id'] : die();

   // Get single category
   $category->read_one();

   // Create array from single post data
   $cat_arr = array(
       'id' => $category->id,
       'name' => $category->name,
   );

   // Convert to JSON
   print_r(json_encode($cat_arr));
