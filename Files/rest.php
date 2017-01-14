<?php
  function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
  }

  function selectSve(){
    	$conn = new PDO("mysql:dbname=wtspirala4;host=localhost;charset=utf8", "admin", "pass");
      $conn->exec("set names utf8");
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $sql = "select * FROM `clanak`ORDER BY id";
      try {
        $stmt = $conn->query($sql);
        $usluge = $stmt->fetchAll(PDO::FETCH_OBJ);
        $conn = null;
        echo '{"Clanci": ' . json_encode($usluge) . '}';
      }
      catch(PDOException $e) {
          echo "Konekcija nije uspjela: " . $e->getMessage();
      }
  }


  function selectID($id){
    $conn = new PDO("mysql:dbname=wtspirala4;host=localhost;charset=utf8", "admin", "pass");
    $conn->exec("set names utf8");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "select * FROM `clanak` WHERE `id`='$id' ORDER BY id";
    try {
        $stmt = $conn->query($sql);
        $usluge = $stmt->fetchAll(PDO::FETCH_OBJ);
        $conn = null;
        echo '{"Clanak": ' . json_encode($usluge) . '}';
    }
    catch(PDOException $e) {
        echo "Konekcija nije uspjela: " . $e->getMessage();
    }
  }

  $method = $_SERVER['REQUEST_METHOD'];
  switch($method) {
    case 'GET':
       zag();
       if(isset($_GET['q'])){
         selectID($_GET['q']);
       }
       else if ($_GET['q']==''){
         selectSve();
       }
       break;

    default:
      header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
      break;
  }
?>
