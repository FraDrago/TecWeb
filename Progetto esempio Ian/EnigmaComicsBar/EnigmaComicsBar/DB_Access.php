<?php
//namespace DB;
class DBAccess{
  const HOST_DB = "localhost";
  const USERNAME = "nzorzo";
  const PASSWORD = "io7lee8Ookahcias";
  const DATABASE_NAME = "nzorzo";
  
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
    $this->connessione = mysqli_close($this->connessione);
    if(!$this->connessione){
      return true;
    }
    else{
      return false;
    }
  }
  
  public function insertUser($username, $name, $surname, $email, $password){
  	$username = stripslashes($username);
    $username = mysqli_real_escape_string($this->connessione,$username);
    $name = stripslashes($name);
    $name = mysqli_real_escape_string($this->connessione,$name);
    $surname = stripslashes($surname);
    $surname = mysqli_real_escape_string($this->connessione,$surname);
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($this->connessione,$email);
	$password = stripslashes($password);
	$password = mysqli_real_escape_string($this->connessione,$password);
    
  	$query = "INSERT INTO Users (Name, Surname, Username, Email, Password) VALUES (\"$name\", \"$surname\", \"$username\", \"$email\", '".md5($password)."')";
    $result = mysqli_query($this->connessione, $query);
	if(mysqli_affected_rows($this->connessione)>0){
		return true;	
	}
    else{
		return false;	
	}
  }
  
  	public function login($username, $password){
		$username = stripslashes($username);
		//escapes special characters in a string
		$username = mysqli_real_escape_string($this->connessione,$username);
		$password = stripslashes($password);
		$password = mysqli_real_escape_string($this->connessione,$password);
		//Checking is user existing in the database or not
        $query = "SELECT * FROM `Users` WHERE Username='$username' and Password='".md5($password)."'";
		$result = mysqli_query($this->connessione,$query);
        $out = $result->fetch_assoc();
		$rows = mysqli_num_rows($result);
        if($rows==1)
	    	$out['valid'] = true;
		else
			$out['valid']=false;
        return $out;
	}
	
	public function logout(){
		if(session_destroy())
			return true;
        else
        	return false;
	}
    
    public function scriviCommento($ID_User, $username, $ID_Evento, $testoCommento){
		$query = "INSERT INTO Commento (Testo, Eventi_ID, Users_ID, Users_username) VALUES (\"$testoCommento\", \"$ID_Evento\", \"$ID_User\", \"$username\")";
		$result = mysqli_query($this->connessione,$query);
        if(mysqli_affected_rows($this->connessione) > 0)
        	return true;
        else
        	return false;
	}
	
	public function getCommenti($ID_Evento){
		$queryComm = "SELECT * FROM Commento WHERE Eventi_ID = '$ID_Evento'";
		$commenti = mysqli_query($this->connessione, $queryComm);
        if(mysqli_num_rows($commenti) == 0)
        	return null;
        else{
        	$result = array();
        	while($row = mysqli_fetch_assoc($commenti)){
        		$arrayResult = array(
          		"ID" => $row['ID'],
          		"Testo" => $row['Testo'],
          		"Users_ID" => $row['Users_ID'],
          		"Users_username" => $row['Users_username']
          		);
          		array_push($result, $arrayResult);
        	}
        	return $result;
      	}
	}
	
	public function eliminaCommento($ID){
		$query = "DELETE FROM Commento WHERE ID='$ID'";
		$result = mysqli_query($this->connessione, $query);
        if($result)
        	return true;
        else
        	return false;
	}
    
    public function isAdmin($id){
    	$query="SELECT ID, Admin FROM Users WHERE ID='$id' AND Admin IS NOT NULL";
        $queryResult=mysqli_query($this->connessione, $query) or die ("Error in isAdmin query: " .
                                                                    mysqli_error($this->connessione));
      	if(mysqli_num_rows($queryResult) == 0){
        return false;
      	}else{
        return true;
        }
    }
    
	public function getPanini(){
      $querySelect = "SELECT * FROM Panini ORDER BY ID ASC";
      $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Error in getPanini query: " .
                                                                    mysqli_error($this->connessione));
      if(mysqli_num_rows($queryResult) == 0){
        return null;
      }
      else{
        $result = array();
        while($row = mysqli_fetch_assoc($queryResult)){
        $arrayResult = array(
          "ID" => $row['ID'],
          "Nome" => $row['Nome'],
          "Immagine" => $row['Immagine'],
          "Ingredienti" => $row['Ingredienti'],
          "Prezzo" => $row['Prezzo']
          );
          array_push($result, $arrayResult);
        }
        return $result;
      }
   }
   public function getDrinks(){
     $querySelect = "SELECT * FROM Drinks ORDER BY ID ASC";
     $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Error in getDrinks query: " .
                                                                   mysqli_error($this->connessione));
     if(mysqli_num_rows($queryResult) == 0){
       return null;
     }
     else{
       $result = array();
       while($row = mysqli_fetch_assoc($queryResult)){
       $arrayResult = array(
         "ID" => $row['ID'],
         "Nome" => $row['Nome'],
         "Immagine" => $row['Immagine'],
         "Descrizione" => $row['Descrizione'],
         "Prezzo" => $row['Prezzo']
         );
         array_push($result, $arrayResult);
       }
       return $result;
     }
  }
  public function getPaniniRandom($n){
    $querySelect = "SELECT * FROM Panini ORDER BY RAND() LIMIT ".$n;
    $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Errore in getPaniniRandom " .
                                                                  mysqli_error($this->connessione));
    if(mysqli_num_rows($queryResult) == 0){
      return null;
    }
    else{
      $result = array();
      while($row = mysqli_fetch_assoc($queryResult)){
      $arrayResult = array(
        "ID" => $row['ID'],
        "Nome" => $row['Nome'],
        "Immagine" => $row['Immagine'],
        "Ingredienti" => $row['Ingredienti'],
        "Prezzo" => $row['Prezzo']
        );
        array_push($result, $arrayResult);
      }
      return $result;
    }
 }
 public function getDrinksRandom($n){
   $querySelect = "SELECT * FROM Drinks ORDER BY RAND() LIMIT ".$n;
   $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Errore in getDrinksRandom : " .
                                                                 mysqli_error($this->connessione));
   if(mysqli_num_rows($queryResult) == 0){
     return null;
   }
   else{
     $result = array();
     while($row = mysqli_fetch_assoc($queryResult)){
     $arrayResult = array(
       "ID" => $row['ID'],
       "Nome" => $row['Nome'],
       "Immagine" => $row['Immagine'],
       "Descrizione" => $row['Descrizione'],
       "Prezzo" => $row['Prezzo']
       );
       array_push($result, $arrayResult);
     }
     return $result;
   }
}

public function saveNewPanino($nome, $imageName, $prezzo, $descrizione){
  $queryInsert = "INSERT INTO Panini(Nome, Immagine, Prezzo, Ingredienti) VALUES (\"$nome\", \"$imageName\", \"$prezzo\", \"$descrizione\")";
  $queryResult = mysqli_query($this->connessione, $queryInsert)or die ("Errore in saveNewPanino : " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;
  }else{
    return false;
  }
}

public function saveNewDrink($nome, $imageName, $prezzo, $descrizione){
  $queryInsert = "INSERT INTO Drinks(Nome, Immagine, Prezzo, Descrizione) VALUES (\"$nome\", \"$imageName\", \"$prezzo\", \"$descrizione\")";
  $queryResult = mysqli_query($this->connessione, $queryInsert) or die ("Errore in saveNewDrink " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;
  }else{
    return false;
  }
}

public function controllaNomePanino($nome){
  $query = "SELECT * FROM Panini WHERE Nome='$nome'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Errore in controllaNomePanino : " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){// con la select funziona come mysqli_num_rows
    return false;// il Nome del Panino esiste già
  }else{
    return true;
  }
}

public function controllaNomeDrink($nome){
  $query = "SELECT * FROM Drinks WHERE Nome='$nome'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Errore in controllaNomeDrink : " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return false;// il Nome del Drink esiste già
  }else{
    return true;
  }
}

public function EliminaPanino($id){
  $query = "DELETE FROM Panini WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Errore in EliminaPanino : " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;// Esiste il panino con questo id e il panino è stato eliminato con successo
  }else{
    return false;
  }
}

public function EliminaDrink($id){
  $query = "DELETE FROM Drinks WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in EliminaDrink query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;// Esiste il drink con questo id e il drink è stato eliminato con successo
  }else{
    return false;
  }
}

public function getPanino($id){
  $query="SELECT * FROM Panini WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in getPanino query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_num_rows($queryResult)==1){
      $row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
      return $row; // Esiste il panino con questo id e lo ritorno
  }else{
    return false;
  }
}

public function UpdatePanino($id, $nome, $imageName, $prezzo, $descrizione){
  $query = "UPDATE Panini SET Nome=\"$nome\", Immagine=\"$imageName\", Ingredienti=\"$descrizione\", Prezzo=\"$prezzo\" WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in UpdatePanino query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;// Update effettuato con successo
  }else{
    return false;
  }
}

public function getDrink($id){
  $query="SELECT * FROM Drinks WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in getDrink query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_num_rows($queryResult)==1){
      $row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
      return $row; // Esiste il panino con questo id e lo ritorno
  }else{
    return false;
  }
}

public function UpdateDrink($id, $nome, $imageName, $prezzo, $descrizione){
  $query = "UPDATE Drinks SET Nome=\"$nome\", Immagine=\"$imageName\", Descrizione=\"$descrizione\", Prezzo=\"$prezzo\" WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in UpdateDrink query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;// Update effettuato con successo
  }else{
    return false;
  }
}

  public function getContattaci(){
       $querySelect = "SELECT * FROM Contattaci/* ORDER BY ID ASC*/";
       $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Error in getContattaci query: " .
                                                                     mysqli_error($this->connessione));
       if(mysqli_num_rows($queryResult) == 0){
         return null;
       }else{
         $result = array();
         while($row = mysqli_fetch_assoc($queryResult)){
         $arrayResult = array(
           "ID" => $row['ID'],
           "Nome" => $row['Nome'],
           "NumeroTelefono" => $row['NumeroTelefono'],
           "Email" => $row['Email'],
           "FileImmagine" => $row['FileImmagine']
           );
           array_push($result, $arrayResult);
         }
         return $result;
       }
    }

  public function EliminaContattaci($id){
    $query = "DELETE FROM Contattaci WHERE ID='$id'";
    $queryResult = mysqli_query($this->connessione, $query) or die ("Error in EliminaContattaci query: " .
                                                                  mysqli_error($this->connessione));
    if(mysqli_affected_rows($this->connessione)>0){
      return true;// Esiste il contatto con questo id ed è stato eliminato con successo
    }else{
      return false;
    }
  }
  
  public function saveNewContattaci($nome, $imageName, $numero, $email){
    $queryInsert = "INSERT INTO Contattaci(Nome, FileImmagine, NumeroTelefono, Email) VALUES (\"$nome\", \"$imageName\", \"$numero\", \"$email\")";
    $queryResult = mysqli_query($this->connessione, $queryInsert) or die ("Error in saveNewContattaci query: " .
                                                                  mysqli_error($this->connessione));
    if(mysqli_affected_rows($this->connessione)>0){
      return true;
    }else{
      return false;
    }
  }

public function getEventi(){
     $querySelect = "SELECT * FROM Eventi ORDER BY Data,Ora";
     $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Error in getEventi query: " .
                                                                   mysqli_error($this->connessione));
     if(mysqli_num_rows($queryResult) == 0){
       return null;
     }
     else{
       $result = array();
       while($row = mysqli_fetch_assoc($queryResult)){
       $arrayResult = array(
         "ID" => $row['ID'],
         "Nome" => $row['Nome'],
         "Immagine" => $row['Immagine'],
         "Descrizione" => $row['Descrizione'],
         "Data" =>$row['Data'],
         "Ora"=>$row['Ora']
         );
         array_push($result, $arrayResult);
       }
       return $result;
     } 
}
public function saveNewEvento($nome, $imageName, $data,$ora, $descrizione){
  $queryInsert = "INSERT INTO Eventi(Data, Ora, Nome, Descrizione, Immagine) VALUES (\"$data\",\"$ora\", \"$nome\", \"$descrizione\", \"$imageName\")";
  $queryResult = mysqli_query($this->connessione, $queryInsert) or die ("Error in saveNewEvento query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;
  }else{
    return false;
  }
}
public function EliminaEvento($id){
$result=$this->getCommenti($id);
	if(count($result)>0){
		foreach($result as $row){
    			$this->EliminaCommento($row['ID']);
		}
	}
  $query = "DELETE FROM Eventi WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in EliminaEventi query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;
  }else{
    return false;
  }
}
public function getEvento($id){
  $query="SELECT * FROM Eventi WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in getEvento query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_num_rows($queryResult)==1){
      $row = mysqli_fetch_array($queryResult, MYSQLI_ASSOC);
      
      return $row; 
  }else{
    return false;
  }
}
public function UpdateEvento($id, $nome, $imageName, $data,$ora, $descrizione){
	
  $query = "UPDATE Eventi SET Nome=\"$nome\", Immagine=\"$imageName\", Descrizione=\"$descrizione\", Data=\"$data\", Ora=\"$ora\" WHERE ID='$id'";
  $queryResult = mysqli_query($this->connessione, $query) or die ("Error in UpdateEvento query: " .
                                                                mysqli_error($this->connessione));
  if(mysqli_affected_rows($this->connessione)>0){
    return true;
  }else{
    return false;
  }
}

public function CheckForEvento($messaggio,$nome,$imageName,$data,$ora,$descrizione,$imageSize,$imageTmpName,$operation){
									$error=0;
									
									$targetDir = "images/Eventi/";
									$imageName = basename($imageName);
									$targetFile = $targetDir . $imageName;
									$imageFileType = strtolower(pathinfo($targetFile,PATHINFO_EXTENSION));
									
                                  
									
										if(strlen($nome)<1){
											$messaggio .= "<li>Nome: Nome troppo corto.</li>";
											$error=1;
										}elseif(strlen($nome)>30){
											$messaggio .= "<li>Nome: Nome troppo lungo.</li>";
											$error=1;
										}
									
								if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
											&& $imageFileType != "gif") {
										$messaggio=$messaggio."<li>Immagine: Il file non è una immagine. Sono permessi i file di tipo: JPG, JPEG, PNG e GIF.</li>";
										$error=1;
									
									}elseif ($imageSize > 4194304) {
										$messaggio=$messaggio."<li>Immagine: Immagine: Il file non deve superare i 4 MB.</li>";
										$error=1;
									}
                                    if(!strtotime($data)||!strtotime($ora)){
                                    if(!strtotime($data)){
                                    $messaggio.="<li>Data: Errori con la Data assicurarsi di aver usato il seguente formato gg-mm-aaaa</li>";
                                    $error=1;
                                    }if(!strtotime($ora)){
                                    $messaggio.="<li>Ora: Errori con l'Ora assicurarsi di aver usato il seguente formato hh:mm 24H</li>";
                                    $error=1;}
                                    }else{
                                    $data=date("Y-m-d", strtotime($data));
                                    $ora=date("H:i", strtotime($ora));
                                    
                                    
                                    
									if(!$this->validateDate($data)){
                                    $messaggio.=$messaggio."<li>Data: La data non è stata inserita correttamente.</li>";
										$error=1;
                                    }
                                    
                                    if(!$this->validateTime($ora)){
                                    $messaggio.=$messaggio."<li>Ora: L' Ora non è stata inserita correttamente.</li>";
										$error=1;
                                    }
                                    }
                                   
                                   
                                    
                                    if(!$error){
											if(!move_uploaded_file($imageTmpName, $targetFile)) {
												$messaggio=$messaggio."<li>Immagine: C'è stato un errore con il caricamento dell'immagine.</li>";
											}else{
                                            	if($operation=="Insert"){
													if($this->saveNewEvento(mysqli_real_escape_string($this->connessione,$nome), $imageName, mysqli_real_escape_string($this->connessione,$data),mysqli_real_escape_string($this->connessione,$ora), mysqli_real_escape_string($this->connessione,$descrizione))){
														$messaggio .= "<li>Evento inserito.</li>";
													}
                                                }
                                           }
                                    }
                                    else{
										$messaggio = "<div id=\"errori\">Errori:</div>" . $messaggio;
									}
                                    return $messaggio;
								
}

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) == $date;
}

function validateTime($time, $format = 'H:i'){
    $d = DateTime::createFromFormat($format, $time);
    return $d && $d->format($format) == $time;
}

public function getEventiHome($n){
    $querySelect = "SELECT * FROM Eventi ORDER BY Data,Ora LIMIT ".$n;
    $queryResult=mysqli_query($this->connessione, $querySelect) or die ("Error in getEventiHome query: " .
                                                                  mysqli_error($this->connessione));
    if(mysqli_num_rows($queryResult) == 0){
      return null;
    }
    else{
      $result = array();
      while($row = mysqli_fetch_assoc($queryResult)){
      $arrayResult = array(
        "ID" => $row['ID'],
        "Nome" => $row['Nome'],
        "Immagine" => $row['Immagine'],
        "Descrizione" => $row['Descrizione'],
        "Data" => $row['Data'],
        "Ora" => $row['Ora']
        );
        array_push($result, $arrayResult);
      }
      return $result;
    }
 }


}
?>
