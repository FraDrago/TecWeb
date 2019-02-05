<?php
//namespace DB;
class DBAccess{
  const HOST_DB = "localhost";
  const USERNAME = "root";
  const PASSWORD = "";
  const DATABASE_NAME = "clinica";
  
  public $connessione;
  
  public function openDBConnection(){
    $this->connessione = mysqli_connect(static::HOST_DB, static::USERNAME, static::PASSWORD, static::DATABASE_NAME);

    if(!$this->connessione){
      return false;
    }
    else{
      return true;
    }
  }

  public function closeDBConnection(){

    if($this->connessione){
      $this->connessione->close();
    }

  }


  public function getOrari(){
      $querySelect = "SELECT * FROM orari ORDER BY ID ASC";
      $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Error in getOrari query: " .mysqli_error($this->connessione));
      if(mysqli_num_rows($queryResult) == 0){
        return null;
      }
      else{
        $result = array();
        while($row = mysqli_fetch_assoc($queryResult)){
        $arrayResult = array(
          "ID" => $row['ID'],
          "Giorno" => $row['Giorno'],
          "OrariStart" => $row['OrariStart'],
          "OrariEnd" => $row['OrariEnd'],
          );
          array_push($result, $arrayResult);
        }
        return $result;
      }
   }

function validateTime($time, $format = 'H:i'){
    $d = DateTime::createFromFormat($format, $time);
    return $d && $d->format($format) == $time;
}


function getImmaginiGalleria(){

  $result = array();
  $queryResult = mysqli_query($this->connessione, "SELECT * FROM galleria" ) or die ("Error in getImmaginiGalleria query: " .mysqli_error($this->connessione));
  if(mysqli_num_rows($queryResult) > 0){
    while($row = mysqli_fetch_assoc($queryResult))
    {
        //$rows[] = $row;
        array_push($result,$row);
    }

  }

  return $result;
}  


}
?>
