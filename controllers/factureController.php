<?php
$rootPath = $_SERVER['DOCUMENT_ROOT'] . '/Facturation/';
include_once($rootPath . '/config/config.php');
include_once($rootPath . '/models/facture.php');

class factureController extends facture
{
  function __construct()
  {
    parent::__construct();
  }
  /*********ajout ********** */
  function insert(facture $f)
  {
    try {
      $query = "insert into invoices (iduser,net_paye,dateecheance,dateemission,type)values(?,?,?,?,?)";
      $res = $this->pdo->prepare($query);
      $arry = array($f->getIdUser(), $f->getNetPayer(), $f->getDateEcheance(), $f->getDateEmission(), $f->gettype());
      return $res->execute($arry);
    } catch (Exception $e) {
      echo "error" . $e;
      header('location :home.php');
    }
  }

  //**********liste********************* */
  function liste(facture $f)
  {
    if ($_SESSION['is_admin']) {
     // $query = "select * from invoices";
      $query = "SELECT i.id, i.iduser, i.datepaid, i.dateecheance,i.dateemission,i.net_paye, i.paid, i.type, u.rib, u.name, u.phone
    FROM invoices i
    INNER JOIN users u ON i.iduser = u.id";
    } else {
      $query = "SELECT i.id, i.iduser, i.datepaid, i.dateecheance,i.dateemission,i.net_paye, i.paid, i.type, u.rib, u.name, u.phone
      FROM invoices i
      INNER JOIN users u ON i.iduser = u.id
      WHERE iduser=" . $_SESSION['id'];
    }
    $res = $this->pdo->prepare($query);
    $res->execute();
    return $res;
  }

  /******************************************************** */
  function getFacture($id)
  {

    $query = "SELECT i.id, i.iduser, i.datepaid, i.dateecheance,i.dateemission,i.net_paye, i.paid, i.type, u.rib, u.name, u.phone
    FROM invoices i
    INNER JOIN users u ON i.iduser = u.id
    WHERE i.id = ?";
    $res = $this->pdo->prepare($query);
    $res->execute(array($id));
    $data = $res->fetch();
    return $data;
  }
  // /***************************modif */
  function modif_fact(facture $f)
  {
    try {
      $query = "UPDATE  invoices SET net_paye=?,dateecheance=?,dateemission=?,type=? where id=?";
      $stmt = $this->pdo->prepare($query);
      $arry = array($f->getNetPayer(), $f->getDateEcheance(), $f->getDateEmission(), $f->gettype(), $f->getId());
      return $stmt->execute($arry);
    } catch (Exception $e) {
      return false;
    }
  }
  /*****************************delete******************* */
  function delete($id)
  {

    $sql = " delete from invoices where id=?";
    $res = $this->pdo->prepare($sql);
    return $res->execute(array($id));
  }
  //**********************non payants******************************* */
  public function numberNonpaye()
  {
    $sql = "SELECT COUNT(id) AS total  FROM invoices  WHERE paid = 0";
    $res = $this->pdo->query($sql);
    $result = $res->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }
  /*************************payes******************************* */
  public function numberpaye()
  {
    $sql = "SELECT COUNT(id) AS total  FROM invoices  WHERE paid = 1";
    $res = $this->pdo->query($sql);
    $result = $res->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
  }
  /****************************************************************/
  function listeNonpaye(facture $f)
  {
    $query = "select id,iduser,datepaid,type from invoices where paid=0 ";
    $res = $this->pdo->prepare($query);
    $res->execute();
    return $res;
  }
  /***************************************************************************** */
  function listepayant(facture $f)
  {
    $query = "select id,iduser,datepaid,type from invoices where paid=1 ";
    $res = $this->pdo->prepare($query);
    $res->execute();
    return $res;
  }
 /************************paiment******************************************************* */
  public function paiement($id)
  {
    try {
      $date_paye = date('Y-m-d H:i:s');

      $sql = "update  invoices set paid = 1 , datepaid = ? where id = ?";
      $stmt = $this->pdo->prepare($sql);
      $arry = array($date_paye, $id);
      return $stmt->execute($arry);
    } catch (Exception $e) {
      echo "error" . $e;
      header('location :paiment.php');
    }
  }
  
}
