<?php

// Obtenez le chemin absolu de la racine du serveur
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';

include_once($rootPath . '/models/User.php');
include_once($rootPath . '/config/config.php');

class UserController extends User
{
  function __construct()
  {
    parent::__construct();
  }
  /*********************************************************************** */
  function insert(User $u)
  {
    try {
      $query = "insert into users (name,email, password,adresse,phone,rib,cin,ville) values(?, ?, ?, ?,?,?,?,?)";
      $res = $this->pdo->prepare($query);
      $aryy = array($u->getName(), $u->getEmail(), $u->getPassword(), $u->getAddress(), $u->getPhone(), $u->getRib(), $u->getCin(), $u->getCity());
      //var_dump($aryy);
      return $res->execute($aryy);
    } catch (Exception $e) {
      echo "Error: " . $e;
      header('Location:index.php');
    }
  }
  /***************************************************************************** */
  function connexion(User $u)
  {

    try {
      ob_start();
      session_start();
      $query = "select * from users where email= ? and password= ?";
      $res = $this->pdo->prepare($query);
      $aryy = array($u->getEmail(), $u->getPassword());
      $res->execute($aryy);

      $user = $res->fetch(PDO::FETCH_ASSOC); // Récupération de la première ligne de résultat

      if ($res->rowCount() == 1) {

        // Start the session
        $_SESSION['id'] = $user['id'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['email'] = $user['email'];

        $_SESSION['is_admin'] = $user['is_admin'];
        // echo "Connexion réussie pour l'utilisateur : " . $_SESSION['name'] ;
        header("Location: home.php");
        exit();
      } else {
        // echo "Identifiants incorrects. Veuillez réessayer.";
        header("Location: login.php?erreur=Identifiants incorrects. Veuillez réessayer.");
        exit();
      }
    } catch (Exception $e) {
      echo "error" . $e;
      header('location :login.php?erreur=' . $e);
    }
  }
  /*************************************************** */
  function liste(user $u)
  {
    $query = "select * from users ";
    $res = $this->pdo->prepare($query);
    //$arry=array($u->getId());
    $res->execute();
    return $res;
  }
  /************************************************* */

  function modifier_user(User $u)
  {
    try {
      $sql = "UPDATE users SET  name=?, email=?,password=?,is_admin=?,adresse=?,phone=?,rib=?,cin=?,ville=? WHERE id=?";
      $stmt = $this->pdo->prepare($sql);
      $arry = array(
        $u->getName(),
        $u->getEmail(),
        $u->getPassword(),
        $u->getIsAdmin(),
        $u->getAddress(),
        $u->getPhone(),
        $u->getRib(),
        $u->getCin(),
        $u->getCity(),
        $u->getId() // Assuming getId() returns the user's ID
      );
      return $stmt->execute($arry);
      //var_dump($arry);
      //echo $stmt;
    } catch (Exception $e) {
      return false;
    }
  }
  //**************delete************************* */
  function delete($id)
  {
    $query = "delete from users where id=?";
    $res = $this->pdo->prepare($query);
    return $res->execute(array($id));
  }
  //////////////*************get users*********************** */
  function getUser($id)
  {
    $query = "select * from users where id=? ";
    $res = $this->pdo->prepare($query);
    $res->execute(array($id));
    $Data = $res->fetch();
    return $Data;
  }

  function searchwithidname($id, $name)
{
    $query = "SELECT * FROM users WHERE 1=1";
    $params = array();

    if (!empty($id)) {
        $query .= " AND id = ?";
        $params[] = $id;
    }

    if (!empty($name)) {
        $query .= " AND name LIKE ?";
        $params[] = '%' . $name . '%';
    }

    $res = $this->pdo->prepare($query);
    $res->execute($params);

    return $res->fetchAll(PDO::FETCH_ASSOC);
    
}


  /****************************numuser********************************************************** */
 
  public function nbUtilisateur() {
    $sql = "SELECT COUNT(id) AS total FROM users";
    $res = $this->pdo->query($sql);
    $result = $res->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}
//*************************************************verification si un admin**************************************** */


}
 




