<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/models/User.php');
include_once($rootPath . '/controllers/UserController.php');

try {
    $id = $_POST['id'];
    $name = $_POST['name'];

    $userctr = new UserController();
    $result = $userctr->searchwithidname($id, $name);

    if ($result == true) {

        header('Location: users.php?success=1&data=' . json_encode($result));
        exit();
    } else {
        header('Location: users.php?error=1');
        exit();
    }
} catch (Exception $e) {
echo $e ;
}
?>
