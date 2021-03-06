<?php

class partieencours
{
  private $_id;

  public function __construct($id) 
  {
  		$bdd = Connexion::bdd();
  		
  		$this->_id=$id;
  }
  
  public static function ajouter($joueur1,$joueur2)
  {
  	$bdd = Connexion::bdd();	
  
  	$id=uniqid();
  	$partie=new partieencours($id);
  	$Date = date("Y-m-d H:i:s");
  	
  	$reponse = TRUE;

  	while($reponse != FALSE)
  	{
  		$sql = "SELECT * FROM `partieencours` WHERE (`Id_joueur1` =".$joueur1." AND `Id_joueur2`="."$joueur2".") OR (`Id_joueur1` =".$joueur2." AND `Id_joueur2`="."$joueur1".") ";
  		$req = $bdd->query($sql);
  		$reponse = $req->fetch();
  		
  sleep(1);
  
  	}
 	
  	
  	$req = $bdd->prepare('INSERT INTO `partieencours` (`Id`, `Id_joueur1`, `Id_joueur2`, `date`)
VALUES(:Id, :joueur1, :joueur2, :date)');
  	$req->execute(array(
  			'Id' => $id,
  			'joueur1' => $joueur1,
  			'joueur2' => $joueur2,
  			'date' => $Date
  	)) or die(print_r($req->errorInfo()));
  	$req -> closeCursor();
	
$ch = curl_init();
 
curl_setopt($ch, CURLOPT_URL, 'http://'.ROOTWEB.'traitementpartie.php?num='.$id);
curl_setopt($ch, CURLOPT_TIMEOUT_MS, 1000);
 
curl_exec($ch);
curl_close($ch);

$jou2 = new joueur($joueur2);

if($jou2->is_strat())
{
	$strat = strategie::strat_by_id_joueur($joueur2);
	$coupstrat = $strat->jouer($joueur1);
	$partie->set_coup(2, $coupstrat);

}
  	
  	return $partie;
  }

public function get_id() 
{
	return $this->_id;
}


public function set_old()
{
	
	$bdd = Connexion::bdd();
	$sql = "UPDATE partieencours SET NEW = 0 WHERE Id='".$this->_id." '";
	$rep = $bdd->query($sql);

}

public function set_coup($num,$val)
{
    
    $bdd = Connexion::bdd();
    
    if($num === 1)
    {
        $sql = "UPDATE partieencours SET Coup1=".$val." WHERE Id='".$this->_id." '";
    }
    else
    {
        $sql = "UPDATE partieencours SET Coup2=".$val." WHERE Id='".$this->_id." '";
    }
    
        $rep = $bdd->query($sql);
        
}


public function set_auto($num,$val)
{
	
	$bdd = Connexion::bdd();
	
	if($num === 1)
	{
		$sql = "UPDATE partieencours SET Auto1=".$val." WHERE Id='".$this->_id." '";
	}
	else
	{
		$sql = "UPDATE partieencours SET Auto2=".$val." WHERE Id='".$this->_id." '";
	}
	
	$rep = $bdd->query($sql);
	
}


public function stock()
{
	$joueur1 = $this->get_joueur(1);
	$joueur2 = $this->get_joueur(2);
	$coup1 = $this->get_coup(1);
	$coup2 = $this->get_coup(2);
	$id = $this->get_id();
	
		$bdd = Connexion::bdd();
		
		$req = $bdd->prepare('INSERT INTO `listeparties`  (`Joueur1`, `Joueur2`, `Coup1`, `Coup2`, `ex_id` )
VALUES(:joueur1, :joueur2, :coup1, :coup2, :ex_id)');
		$req->execute(array(
				'joueur1' => $joueur1,
				'joueur2' => $joueur2,
				'coup1' => $coup1,
				'coup2' => $coup2,
				'ex_id' => $id
		)) or die(print_r($req->errorInfo()));
		
		
		$req -> closeCursor();
		
		$J1 = new joueur($joueur1);
		$J2 = new joueur($joueur2);
		$J1->inc_nbcoup($coup1,$coup2);
		$J2->inc_nbcoup($coup2,$coup1);

		if($this->get_auto(1)==TRUE)
		{
			$J1->inc_auto();
		}
		
		
		if($this->get_auto(2)==TRUE)
		{
			$J2->inc_auto();
		}
		
		
	
	
}


public function suppr()
{
	
	$bdd = Connexion::bdd();
	$sql = "DELETE FROM partieencours  WHERE Id='".$this->_id."'" ;
	$rep = $bdd->query($sql);
}

public function exist()
{
	
	$bdd = Connexion::bdd();
	$sql = "SELECT * FROM partieencours  WHERE Id='".$this->_id."'" ;
	$rep = $bdd->query($sql);

	
	if($rep->fetch())
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
	
}





public function is_new()
{
	$bdd = Connexion::bdd();
	$sql = "SELECT * FROM partieencours  WHERE Id='".$this->_id."'" ;
	$rep = $bdd->query($sql);
	$donnee = $rep->fetch();
	$donnee["NEW"];
}

public function get_joueur($num)
{
    $bdd = Connexion::bdd();
    $sql = "SELECT * FROM partieencours  WHERE Id='".$this->_id."'" ;
    $rep = $bdd->query($sql);
    $donnee = $rep->fetch();
    if($num===1)
    {
        return $donnee["Id_joueur1"];
    }
    else
    {
        return $donnee["Id_joueur2"];
    }
}

public function get_coup($num)
{
    $bdd = Connexion::bdd();
    $sql = "SELECT * FROM partieencours  WHERE Id='".$this->_id."'" ;
    $rep = $bdd->query($sql);
    $donnee = $rep->fetch();
    if($num===1)
    {
        return $donnee["Coup1"];
    }
    else
    {
        return $donnee["Coup2"];
    }
}

public function get_auto($num)
{
	$bdd = Connexion::bdd();
	$sql = "SELECT * FROM partieencours  WHERE Id='".$this->_id."'" ;
	$rep = $bdd->query($sql);
	$donnee = $rep->fetch();
	// var_dump($donnee);
	if($num===1)
	{
		return $donnee["Auto1"];
	}
	else
	{
		return $donnee["Auto2"];
	}
}



public static function find_last($joueur2)
{
	$bdd = Connexion::bdd();
	$sql = 'SELECT * FROM partieencours WHERE Id_joueur2='.$joueur2.' OR Id_joueur1='.$joueur2.' ORDER BY date DESC';
	$rep = $bdd->query($sql);
	$donnee = $rep->fetch();
	if($donnee==null)
	{
		return null;
	}
	else
	{
	return new partieencours($donnee["Id"]);
	}
}

public static function find_new($joueur2)
{
	$bdd = Connexion::bdd();
	$sql = 'SELECT * FROM partieencours WHERE (Id_joueur2='.$joueur2.' OR Id_joueur1='.$joueur2.') AND NEW=TRUE ORDER BY date DESC';
	$rep = $bdd->query($sql);
	$donnee = $rep->fetch();
	if($donnee==null)
	{
		return null;
	}
	else
	{
		return new partieencours($donnee["Id"]);
	}
}


}
?>