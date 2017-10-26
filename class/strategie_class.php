<?php



class strategie
{
  private $_id;
  Private $_id_joueur;
  Private $_nom;
  public function __construct($type=0) 
  {
 
	  if($type==0)
	  {
$bdd = Connexion::bdd();
$rep = $bdd->query('SELECT * FROM listestrategies ORDER BY RAND() LIMIT 1');
$donnee = $rep->fetch();
  $this->_id = $donnee["id"];
  $this->_id_joueur = $donnee["id_joueur"];
  $rep = $bdd->query('SELECT * FROM `listejoueurs` WHERE Id ='.$this->_id_joueur);
  $donnee = $rep->fetch();
  
  if ($donnee == null)
  {
	  echo "attention la stratagie n'a pas de joueur associé";
  }
  else
  {
	  $this->_nom = $donnee["Pseudo"];
  }
  
  }
  else
  {
  $bdd = Connexion::bdd();

	
  $sql = 'SELECT * FROM listestrategies WHERE id='.$type.' ';
$rep = $bdd->query($sql);

$donnee = $rep->fetch();
  $this->_id = $donnee["id"];
  $this->_id_joueur = $donnee["id_joueur"];
  $rep = $bdd->query('SELECT * FROM `listejoueurs` WHERE Id ='.$this->_id_joueur);
  $donnee = $rep->fetch();
  
  if ($donnee == null)
  {
	  echo "attention la stratagie n'a pas de joueur associé";
  }
  else
  {
	  $this->_nom = $donnee["Pseudo"];
  }
  
  
  }
  }
  
  
    public function get_id() 
  {
	 
	return $this->_id;
  }
  
  public static function strat_by_id_joueur($id)
  {
  	$bdd = Connexion::bdd();
  	$sql = 'SELECT * FROM listestrategies WHERE id_joueur='.$id.' ';
  	$rep = $bdd->query($sql);
  	$donnee = $rep->fetch();
  	return new strategie($donnee["id"]);
  }
  
      public function get_id_joueur() 
  {

	return $this->_id_joueur;
  }
  
  
      public function get_nom() 
  {
	return $this->_nom;
  }
 
  
      public function jouer($joueur) 
  {
	
	
	if($this->_id == 1) // strategie gentille
	{
	return 1;
	}
	
	if($this->_id == 2) // strategie méchante
	{
	return 0;
	}
	
	if($this->_id == 3) // strategie Donnant Donnant
	{
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
		$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 1');
		$reponse = $req->fetch();

		if( $reponse == NULL )
		{
			return 1;
		}
		else
		{
			if($reponse["Joueur1"] == $id2)
			{
				return $reponse["Coup1"];
			}
			else
			{
				return $reponse["Coup2"];
			}
		}
	}
	
	if($this->_id == 4) // strategie Grofman
	{
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
		$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 1');
		$reponse = $req->fetch();

		if( $reponse == NULL )
		{
			return 1;
		}
		else
		{
			if($reponse["Coup1"] == $reponse["Coup2"])
			{
				return 1;
			}
			else
			{
				$alea = rand(1,7);
				if ($alea<3)
				{
					return 1;
				}
				else
				{
					return 0;
				}
			}

		}
	}
	
	if($this->_id == 5) // strategie Friedman susceptible
	{
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
		$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 1');
		$reponse = $req->fetch();

		if( $reponse == NULL )
		{
			return 1;
		}
		else
		{
			if($reponse["Joueur1"] == $id)
			{
				if ($reponse["Coup1"] == 0)
				{
					return 0;
				}
				else
				{
					if ($reponse["Coup2"] == 0)
					{
						return 0;
					}
					else
					{
						return 1;
					}
				}
			}
			else
			{
				if ($reponse["Coup2"] == 0)
				{
					return 0;
				}
				else
				{
					if ($reponse["Coup1"] == 0)
					{
						return 0;
					}
					else
					{
						return 1;
					}
				}

			}

		}
	}
	
	if($this->_id == 6) // strategie Davis, idem Friedman susceptible sauf coopération 10 premiers coups
	{
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
		$req = $bdd->query('SELECT COUNT(*) AS Nb FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 11');	
	$reponse = $req->fetch();
	
	 
		if( $reponse["Nb"] < 10 )
		{
			return 1;
		}
		else
		{
			
			$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 1');	
			$reponse = $req->fetch();
			
			if($reponse["Joueur1"] == $id)
			{
				if ($reponse["Coup1"] == 0)
				{
					return 0;
				}
				else
				{
					if ($reponse["Coup2"] == 0)
					{
						return 0;
					}
					else
					{
						return 1;
					}
				}
			}
			else
			{
				if ($reponse["Coup2"] == 0)
				{
					return 0;
				}
				else
				{
					if ($reponse["Coup1"] == 0)
					{
						return 0;
					}
					else
					{
						return 1;
					}
				}

			}

		}
	}
	
	
		if($this->_id == 7) // strategie Shubik
	{
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
		$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC');
		$hist = $req->fetchAll();
		$new = true;
		$param = 0;
		
		if($hist == null)
		{
				
			return 1;
		}
		foreach ( $hist as $partie)
		{
			
			if( $partie["Coup1"] == 1 AND $partie["Coup2"] == 1 and $new)
			{
				$param = $param +1 ; 
				$new = false;
			}
			if( $partie["Coup1"] == 0 OR $partie["Coup2"] == 0)
			{
				$new = true;
			}
			
		}	
		$param2 = 0;
		
				foreach ( $hist as $partie)
		{
			
			if( $partie["Coup1"] == 1 AND $partie["Coup2"] == 1)
			{
				break;
				
			}
			else
			{
				$param2++;
			}
		}	
		
		
		echo "param1 : ".$param."<br>";
				echo "param2 : ".$param2."<br>";

				if($param2 == 0)
				{
					
					return 1;
				}
			
		if($param2 <= $param)
		{
				
			return 0;
		}
		else
		{
		$last = $hist[0];
		
		if($last["Joueur1"] = $id2)
			{
				
				return $last["Coup1"];
			}
			else
			{
					
				return $last["Coup2"];
			}
		
			
		}
		
	
		return 1;
	}
	
	
	
			if($this->_id == 8) // strategie JOSS
	{
	
		
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
			
		$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 1');
		$reponse = $req->fetch();

			if( $reponse == NULL )
		{
			
			$r = rand(0,9);
			if($r==1)
			{
				return 0;
			}
			else
			{
				return 1;
			}
		}
				else
		{
	
			if($reponse["Joueur1"] == $id2) // si on est le joueur 2
			{
				if($reponse["Coup1"]==0)
				{
				return 0;
				}
				else
				{
			$r = rand(0,9);
			if($r==1)
			{
				return 0;
			}
			else
			{
				return 1;
			}
			}
			}
			else
			{
			if($reponse["Coup2"]==0)
			{
			return 0;
			}
			else
			{
			$r = rand(0,9);
			if($r==1)
			{
				return 0;
			}
			else
			{
				return 1;
			}
			}
			}
			
			
			
			
			
			
		}

	}
	
	
	
	
				if($this->_id == 9) // strategie FIELD
	{
	
		
		$id = $this->_id_joueur;
		$id2 = $joueur;
		$bdd = Connexion::bdd();
		
			$req = $bdd->query('SELECT COUNT(*) AS Nb FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 11');	
	$reponse = $req->fetch();
	$param = $reponse["Nb"];
	if($param > 200)
	{
		$param = 0.5;
	}
	else
	{
		$param = 1 - $param/400;
	}
	echo "<br> param: ".$param."<br>";
	
	
		$req = $bdd->query('SELECT * FROM listeparties WHERE (Joueur1 ='.$id.' AND Joueur2 ='.$id2.') OR (Joueur1 ='.$id2.' AND Joueur2 ='.$id.') ORDER BY date DESC LIMIT 1');
		$reponse = $req->fetch();

		if( $reponse == NULL )
		{
				return 1;
		}
				else
		{
	
			if($reponse["Joueur1"] == $id2) // si on est le joueur 2
			{
				if($reponse["Coup1"]==0)
				{
				return 0;
				}
				else
				{
			$r = rand()/mt_getrandmax();
			if($r > $param )
			{
				return 0;
			}
			else
			{
				return 1;
			}
			}
			}
			else
			{
			if($reponse["Coup2"]==0)
			{
			return 0;
			}
			else
			{
			$r = rand()/mt_getrandmax();
			if($r > $param)
			{
				return 0;
			}
			else
			{
				return 1;
			}
			}
			}
			
			
			
			
			
			
		}

	}
	
					if($this->_id == 10) // strategie aléatoire
	{
		return rand(0,1);
	}
	
  }

}
?>