<?php
ob_start();
session_start();
error_reporting(E_ALL);


require ( dirname (__FILE__) . '/../connection/connection.php'); 
date_default_timezone_set("Africa/Harare");

class User{
	private $dbCon;

//private $username;

	public function __construct(){

		try{

		$this->dbCon = new Connection();

		$this->dbCon = $this->dbCon->dbConnection();
		$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}

	public function login($username, $password){
		if(!empty($username) && !empty ($password)) {
		$login_query = $this->dbCon->prepare("SELECT username, firstname, lastname, phone, email, password, roles_id, verified FROM users WHERE username=?" );
				$login_query->bindParam(1, $username);
				$login_query->execute();
				
				if($login_query->rowCount() ==1){
				$row = $login_query -> fetch();
				$hash_pass =trim($row['password']);
				$roles_id = $row['roles_id'];
				$verified = $row['verified'];

				//verify password
				if (password_verify($password, $hash_pass)) {

					if ($roles_id == 1 && $verified == 1) {
						$_SESSION['user'] = $row;
						
						header("Location: index.php");
						//die();
					} elseif ($roles_id == 3 && $verified == 1) {
						$_SESSION['user'] = $row;
						
						header("Location: reporter.php");
					}else{
						$_SESSION['invalidUser']=true;
					}
					
					// Success!
					//$_SESSION['user'] = $row;
					
					//header("Location: index.php");
					//die();
				}
				else {
					 $_SESSION['invalidUser']=true;
				}
			
					
				}else{
                    
                    $_SESSION['invalidUser']=true;
					
				}
		
		}
	} //end of login authentication
	
	public function checkUser($uid,$pass){
		
		if(!empty($uid) && !empty ($pass)) {
		$login_query = $this->dbCon->prepare("SELECT uid, pass,name FROM click WHERE uid=? AND pass=?" );
				$login_query->bindParam(1, $uid);
				$login_query->bindParam(2, $pass);
				$login_query->execute();
				
				if($login_query->rowCount() ==1){
				$row = $login_query -> fetch();
				
				return $row;
				//verify password
			
				
					
				}
		
		}
	}

  public function addUser($username,$fname,$lname,$password,$phone,$email){
		//check if the user is already in the system before adding new user
		$checkUser = $this->dbCon->prepare("SELECT username from users where username=?" );
		$checkUser->bindValue(1, $username);
		$checkUser->execute();
		if($checkUser->rowCount() ==1){
			//user already in the system
			$_SESSION['user_found']= true;
		}else{
			//add user in the system
			$role = 10; //Admin
				$addUser = $this->dbCon->prepare("INSERT INTO users (username, password, firstname,lastname,email,phone,roles_id) VALUES (:username, :password, :fname,:lname,:email,:phone,:role_id)" );
				$addUser->execute(array(
						  ':username'=>($username),
						  ':password'=>($password),
						  ':fname'=>($fname),
						  ':lname'=>($lname),
						  ':email'=>($email),
						  ':phone'=>($phone),
						  ':role_id'=>($role),
						  ));
						  
						  $_SESSION['user-added']=true;
					
		}
	
	
			

	} //end adding users


	public function getUser(){
		$getUser = $this->dbCon->Prepare("SELECT * FROM users WHERE verified = 0");
		$getUser->execute();
		
		if($getUser->rowCount()>0){
			$rows = $getUser->fetchAll();
			return $rows;
		}
	} //end of getting news




	  public function addReporter($username,$fname,$lname,$password,$phone,$media_house,$email){
		//check if the user is already in the system before adding new user
		$checkUser = $this->dbCon->prepare("SELECT username from users where username=?" );
		$checkUser->bindValue(1, $username);
		$checkUser->execute();
		if($checkUser->rowCount() ==1){
			//user already in the system
			$_SESSION['user_found']= true;
		}else{
			//add user in the system
			$role = 3; //Reporter
				$addReporter = $this->dbCon->prepare("INSERT INTO users (username, password, firstname,lastname,email,phone,media_house,roles_id) VALUES (:username, :password, :fname,:lname,:email,:phone, :media_house,:role_id)" );
				$addReporter->execute(array(
						  ':username'=>($username),
						  ':password'=>($password),
						  ':fname'=>($fname),
						  ':lname'=>($lname),
						  ':email'=>($email),
						  ':phone'=>($phone),
						  ':media_house'=>($media_house),
						  ':role_id'=>($role),
						  ));
						  
						  $_SESSION['reporter-added']=true;
					
		}
	
	
			

	} //end adding users
	
		public function getUserProfile(){	
				$getUserProfile = $this->dbCon->prepare("SELECT username,email,firstname, middlename, lastname FROM users WHERE username=?" );
				$getUserProfile->bindParam(1, $_SESSION['user']['username']);
				$getUserProfile->execute();

				if($getUserProfile->rowCount() ==1){
				$row = $getUserProfile -> fetch();

				return $row;
				//verify password



				}

		
	}
	public function getUsers(){
		//get all users
		try{
			$getUsers = $this->dbCon->prepare("SELECT username, fname, lname, email, phone, users.role_id AS role_id, roles.name AS role from users INNER JOIN roles ON (roles.role_id = users.role_id) WHERE username = ?" );		
			$getUsers->execute();
			if($getUsers->rowCount()>0){
				$row = $getUsers->fetchAll();
				return $row;
			}else{
				return null;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	
	
	} //end of getting users

	public function getSingleUser($username){
		//get one users
		try{
			$getUsers = $this->dbCon->prepare("SELECT username, fname, lname, email, phone, users.role_id AS role_id, roles.name AS role from users INNER JOIN roles ON (roles.role_id = users.role_id) WHERE username = ?" );		
			$getUsers->bindParam(1, $username);
			$getUsers->execute();
			if($getUsers->rowCount()>0){
				$row = $getUsers->fetch();
				return $row;
			}else{
				return null;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	
	
	} //end of getting single user
	
	//Update Password
	public function updatepassword($username, $password){

		try{
			$updatepassword = $this->dbCon->prepare("UPDATE users SET password =? WHERE username=?");
			$updatepassword->bindparam(1, $password);	
			$updatepassword->bindparam(2, $username);			
			$updatepassword->execute();
			
			$_SESSION['password_updated'] =true;
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	// user roles 
	public function getRoles(){
		
		try{
			
			$get = $this->dbCon->prepare("SELECT role_id, name FROM roles");
			$get->execute();
			$countRows = $get->rowCount();

			$rows = $get->fetchAll();
			if($countRows>0){
				return $rows;
			}else{
				return null;
			}

		} catch (PDOException $e){
			echo "Lost connection to the database";
		} 

	}

	// add role 
	public function addRole($role){
		try{
			$get = $this->dbCon->prepare("INSERT INTO roles (role_id, name)
				VALUE(:role_id, :name)");
			$get->bindParam(":role_id", $role_id);
			$get->bindParam(":name", $name);
			$get->execute();

			$_SESSION['role-added'] = true;

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	// update role 
	public function updateRole($role_id, $role){
		try{
			$get = $this->dbCon->prepare("UPDATE roles SET name = ? WHERE role_id = ?");
		
			$get->bindParam(1, $name);
			$get->bindParam(2, $role_id);
			$get->execute();

			$_SESSION['role-updated'] = true;
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}


	// update role 
	public function authorizeUser($id){
		try{
			$get = $this->dbCon->prepare("UPDATE users SET verified = '1' WHERE username = '$id'");
		
			$get->bindParam(1, $id);
			$get->execute();

			$_SESSION['user-authorized'] = true;
			
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

   
} //End of Class Users

Class Player{
	private $dbCon;

	public function __construct(){

		try{

		$this->dbCon = new Connection();

		$this->dbCon = $this->dbCon->dbConnection();
		$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}

			// add a player

	public function addPlayer($path, $team){
		
		try{
			//echo $path; die();
				$handle = @fopen($path, "r"); //read line one by one
				$values='';

				while (!feof($handle)) // Loop til end of file.
				{
					$buffer = fgets($handle, 4096); // Read a line.
					list($a,$b,$c)=explode("|",$buffer);//Separate string by the means of |
					//values.=($a,$b,$c);// save values and use insert query at last or
					//generate player ID
					$player_id = $team.substr($a,0,1).$b.$c;
					//check if player exist
					$checkPlayer = $this->dbCon->prepare("SELECT player_id  FROM players WHERE player_id =?");
					$checkPlayer->bindParam(1, $player_id);			
					$checkPlayer->execute();
					
					if($checkPlayer->rowCount()>0){
						// dont add, player exists 
						$_SESSION['player-exists'] = true;
					}else{
						// add player
						
						$addTeam = $this->dbCon->prepare("INSERT INTO players (player_id,fname,middle_name, lastname,team_id)VALUES(:player_id,:fname,:middle_name, :lastname,:team_id)");
						$addTeam->execute(array(
								  ':player_id'=>($player_id),
								  ':fname'=>($a),
								  ':middle_name'=>($b),
								  ':lastname'=>($c),
								  ':team_id'=>($team)));
								  

						$_SESSION['player-added'] = true;
					}
					
				}
				//unlink($path);
				
				
			
			

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
		public function addSinglePlayer($player_id,$team,$fname,$mname,$lname){
		
		try{
				//check if player exist
					$checkPlayer = $this->dbCon->prepare("SELECT player_id  FROM players WHERE player_id =?");
					$checkPlayer->bindParam(1, $player_id);			
					$checkPlayer->execute();
					
					if($checkPlayer->rowCount()>0){
						// dont add, player exists 
						$_SESSION['single-player-exists'] = true;
					}else{
						// add player
						
						$addTeam = $this->dbCon->prepare("INSERT INTO players (player_id,fname,middle_name, lastname,team_id)VALUES(:player_id,:fname,:middle_name, :lastname,:team_id)");
						$addTeam->execute(array(
								  ':player_id'=>($player_id),
								  ':fname'=>($fname),
								  ':middle_name'=>($mname),
								  ':lastname'=>($lname),
								  ':team_id'=>($team)));
								  

						$_SESSION['single-player-added'] = true;
					}
					
			
				

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	// get players
	public function getHomePlayers($home){
		try{
			$getPlayers = $this->dbCon->prepare("SELECT player_id, fname, middle_name, lastname, players.team_id AS team_id, teams.name AS name FROM players INNER JOIN teams ON (teams.team_id = players.team_id) WHERE players.team_id=?");
			$getPlayers->bindParam(1,$home);			
			$getPlayers->execute();
			$rows = $getPlayers->fetchAll();

			if($getPlayers->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
		public function getAwayPlayers($away){
		try{
			$getPlayers = $this->dbCon->prepare("SELECT player_id, fname, middle_name, lastname, players.team_id AS team_id, teams.name AS name FROM players INNER JOIN teams ON (teams.team_id = players.team_id) WHERE players.team_id=?");
			$getPlayers->bindParam(1,$away);			
			$getPlayers->execute();
			$rows = $getPlayers->fetchAll();

			if($getPlayers->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	// get players
	public function getPlayers($team_id){
		try{
			$getPlayers = $this->dbCon->prepare("SELECT player_id, fname, middle_name, lastname, players.team_id AS team_id, teams.name AS name FROM players INNER JOIN teams ON (teams.team_id = players.team_id) WHERE players.team_id=?");
			$getPlayers->bindParam(1,$team_id);			
			$getPlayers->execute();
			$rows = $getPlayers->fetchAll();

			if($getPlayers->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
		// get single player
	public function getSinglePlayer($player_id){
		//echo $player_id; die();
		try{
			$getPlayers = $this->dbCon->prepare("SELECT player_id, fname, middle_name, lastname, players.team_id AS team_id, teams.name AS name FROM players INNER JOIN teams ON (teams.team_id = players.team_id) WHERE players.player_id=?");
			$getPlayers->bindParam(1,$player_id);			
			$getPlayers->execute();
			

			if($getPlayers->rowCount()>0){
				$rows = $getPlayers->fetch();
				return $rows;
			}else{
				return null;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
	
	// transfer player
	public function transferPlayer($old_team,$new_team,$player_id){
		$date = DATE('Y-m-d H:i:s');		
		//insert into transfer table
		$transferPlayer = $this->dbCon->PREPARE("INSERT INTO transfers (player_id,old_team,new_team,transfer_date) VALUES (:player_id,:old_team,:new_team,:transfer_date)");
		$transferPlayer->execute(array(
		':player_id'=>$player_id,
		':old_team'=>$old_team,
		':new_team'=>$new_team,
		':transfer_date'=>$date
		));
		
		//update team id in players table
		$updatePlayerTeam = $this->dbCon->PREPARE("UPDATE players SET team_id=? WHERE player_id=?");
		$updatePlayerTeam->bindParam(1, $new_team);
		$updatePlayerTeam->bindParam(2, $player_id);
		$updatePlayerTeam->execute();
		
		$_SESSION['player_transfered'] = true;
	}
	// get single player
	public function getTopScorers($limit,$season){
		try{
			$getTopScorers = $this->dbCon->prepare("SELECT goals.player_id,fname, middle_name, lastname, game_id, sum(score) as score FROM goals
			INNER JOIN players ON (players.player_id=goals.player_id) WHERE season=? GROUP BY goals.player_id ORDER BY score DESC LIMIT $limit");
			$getTopScorers->bindParam(1,$season);
			$getTopScorers->execute();
			$rows = $getTopScorers->fetchAll();

			if($getTopScorers->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}
	
		public function getTotalScores($season){
		try{
			$getTotalScores = $this->dbCon->prepare("SELECT sum(score) as total FROM goals WHERE season=?");
			$getTotalScores->bindparam(1,$season);
			$getTotalScores->execute();
			$rows = $getTotalScores->fetch();

			if($getTotalScores->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

}



Class Team{
	private $dbCon;
	//private $username;

	public function __construct(){
		try{
			$this->dbCon = new Connection();

			$this->dbCon = $this->dbCon->dbConnection();
			$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}


	// add a team

	public function addTeam($zone,$logo,$name,$gender){
		
		try{
			// check if team exists 
			$check = $this->dbCon->prepare("SELECT name  FROM teams WHERE name =?");
			$check->bindParam(1, $name);			
			$check->execute();
			
			if($check->rowCount()>0){
				// dont add, team exists 
				$_SESSION['team-exists'] = true;
			}else{//echo "w"; die();
				// add team
				$status = 1; //active team
				$addTeam = $this->dbCon->prepare("INSERT INTO teams (name,zones_id, logo,gender)VALUES(:name,:zones_id,:logo,:gender)");
				$addTeam->execute(array(
						  ':name'=>($name),
						  ':zones_id'=>($zone),
						  ':logo'=>($logo),
						  ':gender'=>($gender)
						  ));
				$id = $this->dbCon->lastInsertId();	  
				//add team to the log table
				$season = "2019/2020";
				$addToLog = $this->dbCon->prepare("INSERT INTO log_table (teams_id,season,zones_id)VALUES(:teams_id,:season,:zones_id)");
				$addToLog->execute(array(
						  ':teams_id'=>($id),
						  ':season'=>($season),
						   ':zones_id'=>($zone)
						  ));
				$_SESSION['team-added'] = true;
			}

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	// update team
	public function updateTeam($name, $team_id){
		try{
			$update = $this->dbCon->prepare("UPDATE teams SET name = ? WHERE team_id =?");
			$update->bindParam(1, $name);
			$update->bindParam(2, $team_id);
			$update->execute();

			$_SESSION['team-updated'] = true;

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	public function activateTeam($team_id){
		try{
			$status = 1; // active teams
			$update = $this->dbCon->prepare("UPDATE teams SET status_id = ? WHERE team_id =?");
			$update->bindParam(1, $status);
			$update->bindParam(2, $team_id);
			$update->execute();

			$_SESSION['team-active'] = true;

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	// deactivate team
	public function deactivateTeam($team_id){
		try{
			$status = 0; // in active teams
			$update = $this->dbCon->prepare("UPDATE teams SET status_id = ? WHERE team_id =?");
			$update->bindParam(1, $status);
			$update->bindParam(2, $team_id);
			$update->execute();

			$_SESSION['team-inactive'] = true;

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}


	// get all teams 
	public function getTeams(){
		
		try{
			$status =0; //relegated teams
			$get = $this->dbCon->prepare("SELECT teams.id as id, teams.name as name, zones.name as zone,logo FROM teams
			INNER JOIN zones ON (teams.zones_id=zones.id)");
			$get->execute();
			
			$rows = $get->fetchAll();
			if($get->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		} catch (PDOException $e){
			echo $e->getMessage();
		} 

	}


		// get all teams per zone 
	public function getTeamsPerZone($zone){
		
		try{			
			$getTeamsPerZone = $this->dbCon->prepare("SELECT id, name, zones_id, logo FROM teams WHERE zones_id =?");
			$getTeamsPerZone->bindParam(1,$zone);
			$getTeamsPerZone->execute();
			
			
			if($getTeamsPerZone->rowCount()>0){
				$rows = $getTeamsPerZone->fetchAll();
				return $rows;
			}else{
				return null;
			}

		} catch (PDOException $e){
			echo $e->getMessage();
		} 

	}
	
	public function getSingleTeam($team_id){
		
		try{
			
			$get = $this->dbCon->prepare("SELECT team_id, name FROM teams WHERE team_id = ?");
			$get->bindParam(1, $team_id);
			$get->execute();
			$countRows = $get->rowCount();

			$rows = $get->fetch();
			if($countRows>0){
				return $rows;
			}else{
				return null;
			}

		}catch (PDOException $e){
			echo $e->getMessage();
		} 

	}


}

// class for venues 
Class Venue{
	private $dbCon;
	//private $username;

	public function __construct(){
		try{
			$this->dbCon = new Connection();

			$this->dbCon = $this->dbCon->dbConnection();
			$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}


	// add a venue

	public function addVenue($name){
		try{
			// check if team exists 
			$checkVenue = $this->dbCon->prepare("SELECT id FROM venue WHERE name = ?");
			$checkVenue->bindParam(1, $name);
			$checkVenue->execute();

			if($checkVenue->rowCount()>0){
				// dont add, team exists 
				$_SESSION['ground-exists'] = true;
			}else{
				// add venue
				$addVenue = $this->dbCon->prepare("INSERT INTO venue (name) VALUES(:name)");
				$addVenue->execute(array(
						  ':name'=>($name)));

				$_SESSION['venue-added'] = true;
			}

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	// update team
	public function updateVenue($name, $venue_id){
		try{
			$update = $this->dbCon->prepare("UPDATE venues SET name = ? WHERE venue_id =?");
			$update->bindParam(1, $name);
			$update->bindParam(2, $venue_id);
			$update->execute();

			$_SESSION['venue-updated'] = true;

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}

	// delete venue
	public function deleteVenue($venue_id){
		try{
			$update = $this->dbCon->prepare("DELETE FROM venues WHERE venue_id =?");
			$update->bindParam(1, $name);
			$update->bindParam(2, $venue_id);
			$update->execute();

			$_SESSION['team-updated'] = true;

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}


	// get all venues 
	public function getVenueList(){
		
		try{
			
			$getVenue = $this->dbCon->prepare("SELECT id, name FROM venue");
			$getVenue->execute();
			
			$rows = $getVenue->fetchAll();
			if($getVenue->rowCount()>0){
				return $rows;
			}else{
				return null;
			}

		} catch (PDOException $e){
			echo $e->getMessage();
		} 

	}


	public function getSingleVenue($venue_id){
		
		try{
			
			$get = $this->dbCon->prepare("SELECT venue_id, name FROM venues WHERE venue_id = ?");
			$get->bindParam(1, $venue_id);
			$get->execute();
			$countRows = $get->rowCount();

			$rows = $get->fetch();
			if($countRows>0){
				return $rows;
			}else{
				return null;
			}

		} catch (PDOException $e){
			echo $e->getMessage();
		} 

	}


}



Class Game{
	public function __construct(){

        try{
            $this->dbConct = new Connection();
            $this->dbConct = $this->dbConct->dbConnection();
            $this->dbConct->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Lost connection to the database";
        }
    }//end of constructor


	
	// add Fixture

	public function addFixture($awayTeam,$homeTeam,$venue,$date_time){
		//echo $venue; die();
		try{
				// add fixture
				$season ="2019/2020";
				$addFixture = $this->dbConct->prepare("INSERT INTO fixture (home_team, away_team,venue_id, date_time,season) VALUES(:home_team, :away_team,:venue_id, :date_time,:season)");
				$addFixture->execute(array(
						  ':home_team'=>($homeTeam),
						  ':away_team'=>($awayTeam),
						  ':venue_id'=>($venue),
						  ':date_time'=>($date_time),
						  ':season'=>($season),
						  ));
				$id = $this->dbConct->lastInsertId();
				
				//add into results table
				$addResult = $this->dbConct->prepare("INSERT INTO results (fixture_id,home_team, away_team,season) VALUES(:fixture_id,:home_team, :away_team,:season)");
				$addResult->execute(array(
						  ':fixture_id'=>($id),
						  ':home_team'=>($homeTeam),
						  ':away_team'=>($awayTeam),
						  ':season'=>($season)
						  ));
						  
				$_SESSION['fixture-added'] = true;
			

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function addResults($homeTeam,$awayTeam,$fixture_id,$homePlayer_id,$awayPlayer_id,$season){
		//echo $venue; die();
		try{
		
				// add Results
				$status = 1; //played status
				$datetime = DATE('Y-m-d H:i:s');
				$addResults = $this->dbConct->prepare("UPDATE results SET home_score=?, away_score=?, status=?, last_updated=?,updated_by=?,season=? WHERE fixture_id=?");
				$addResults->bindParam(1, $homeTeam);
				$addResults->bindParam(2,$awayTeam);
				$addResults->bindParam(3,$status);
				$addResults->bindParam(4,$datetime);
				$addResults->bindParam(5,$_SESSION['user']['username']);
				$addResults->bindParam(6,$season);
				$addResults->bindParam(7,$fixture_id);
				
				$addResults->execute();
				
				//add Home scorer
				$score = 1;
				if($homePlayer_id !="" && $awayPlayer_id !=""){ //both team scored
				
					$addHomeScorer = $this->dbConct->prepare("INSERT into goals (player_id, game_id, score,last_updated,season) VALUES(:player_id,:game_id,:score,:last_updated,:season)");
					$addHomeScorer->execute(array(
							  ':player_id'=>($homePlayer_id),
							  ':game_id'=>($fixture_id),
							  ':score'=>($score),
							  ':last_updated'=>($datetime),
							  ':season'=>($season)
							  ));
							  
					$addAwayScorer = $this->dbConct->prepare("INSERT into goals (player_id, game_id, score,last_updated,season) VALUES(:player_id,:game_id,:score,:last_updated,:season)");
					$addAwayScorer->execute(array(
							  ':player_id'=>($awayPlayer_id),
							  ':game_id'=>($fixture_id),
							  ':score'=>($score),
							  ':last_updated'=>($datetime),
							   ':season'=>($season)
							  ));
					
					$_SESSION['results-added'] = true;
				
				}elseif($homePlayer_id !="" && $awayPlayer_id ==""){ //only home team scored
				
					$addHomeScorer = $this->dbConct->prepare("INSERT into goals (player_id, game_id, score,last_updated,season) VALUES(:player_id,:game_id,:score,:last_updated,:season)");
					$addHomeScorer->execute(array(
							  ':player_id'=>($homePlayer_id),
							  ':game_id'=>($fixture_id),
							  ':score'=>($score),
							  ':last_updated'=>($datetime),
							   ':season'=>($season)
							  ));
						
					$_SESSION['results-added'] = true;
					
				}elseif($homePlayer_id =="" && $awayPlayer_id !=""){ //only away team scored
								  
					$addAwayScorer = $this->dbConct->prepare("INSERT into goals (player_id, game_id, score,last_updated,season) VALUES(:player_id,:game_id,:score,:last_updated,:season)");
					$addAwayScorer->execute(array(
							  ':player_id'=>($awayPlayer_id),
							  ':game_id'=>($fixture_id),
							  ':score'=>($score),
							  ':last_updated'=>($datetime),
							   ':season'=>($season)							  
							  ));
					
					$_SESSION['results-added'] = true;
					
				}
				
			$_SESSION['results-added'] = true;

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	
	public function addZeroResults($homeScore,$awayScore,$fixture_id,$season){
		//echo $venue; die();
		try{
		
				// add Results
				//$status = 2; //Final status
				$datetime = DATE('Y-m-d H:i:s');
				$addResults = $this->dbConct->prepare("UPDATE results SET home_score=?, away_score=?, last_updated=?,updated_by=?,season=? WHERE fixture_id=?");
				$addResults->bindParam(1, $homeScore);
				$addResults->bindParam(2,$awayScore);
				$addResults->bindParam(3,$datetime);
				$addResults->bindParam(4,$_SESSION['user']['username']);
				$addResults->bindParam(5,$fixture_id);
				$addResults->bindParam(6,$season);
				$addResults->execute();
				
		

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function updateGameStatus($status,$fixture_id){
		//echo $venue; die();
		try{
			
				// add fixture
				//$status = 2; //played status
				$addResults = $this->dbConct->prepare("UPDATE fixtures SET status=? WHERE fixture_id=?");
				$addResults->bindParam(1, $status);				
				$addResults->bindParam(2,$fixture_id);
				$addResults->execute();
				
				$updateStatus = $this->dbConct->prepare("UPDATE results SET status=? WHERE fixture_id=?");
				$updateStatus->bindParam(1, $status);				
				$updateStatus->bindParam(2,$fixture_id);
				$updateStatus->execute();
			
		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	
	public function endGame($fixture_id,$homeScore,$awayScore){
		
		try{
			//get teams
			$getTeams =$this->dbConct->PREPARE("SELECT home_team, away_team, fixture_id FROM fixture WHERE fixture_id=?");
			$getTeams->bindParam(1,$fixture_id);
			$getTeams->execute();
			if($getTeams->rowCount()>0){ //data retrieved
				$row = $getTeams->fetch();
				$home_team = $row['home_team'];
				$away_team = $row['away_team'];
			}
			
			//check if the fixture is not already updated
			$status =2;
			$selectFixture = $this->dbConct->prepare("SELECT fixture_id, status FROM results WHERE fixture_id=? AND status=?");
			$selectFixture->bindParam(1,$fixture_id);
			$selectFixture->bindParam(2,$status);
			$selectFixture->execute();
			$row = $selectFixture->fetch();
			if($selectFixture->rowCount()>0){ //already updated
			
				$_SESSION['already-updated']= true;
			}else{//update Logo Table
					// update home team results
				if($homeScore>$awayScore){
					
					//begin transaction
					$this->dbConct->beginTransaction();
					$homePoints = 2;
					$awayPoints =1;
					
					//select points, scores and conceded goals for home team
					$getDetails = $this->dbConct->prepare("SELECT teams_id,points, scored, conceded,played,won,lost,forfeit FROM log_table WHERE teams_id=?");
					$getDetails->bindParam(1,$home_team);
					$getDetails->execute();
					
					
					if($getDetails->rowCount()>0){ //echo $home_team; die();
						$row = $getDetails->fetch();
						$points=  $row['points'] + $homePoints;
						$scored = $row['scored']+ $homeScore;
						$conceded = $row['conceded']+ $awayScore;
						$played = $row['played']+ 1;
						$won = $row['won'] +1;
						
						//update home team log table
						$addResult = $this->dbConct->prepare("UPDATE log_table SET points=?, scored=?, conceded=?,played=?, won=? WHERE teams_id=?");
						$addResult->bindParam(1, $points);
						$addResult->bindParam(2, $scored);	
						$addResult->bindParam(3, $conceded);
						$addResult->bindParam(4, $played);
						$addResult->bindParam(5, $won);	
						$addResult->bindParam(6, $home_team);
						$addResult->execute();
						
						
					}
					
					//select points, scores and conceded goals for away team
					$getAwayTeamDetails = $this->dbConct->prepare("SELECT teams_id,points, scored, conceded,played,won,lost,forfeit FROM log_table WHERE teams_id=?");
					$getAwayTeamDetails->bindParam(1,$away_team);
					$getAwayTeamDetails->execute();
					
					$row = $getAwayTeamDetails->fetch();
					if($getAwayTeamDetails->rowCount()>0){
						$points=  $row['points'] + $awayPoints;
						$scored = $row['scored']+ $awayScore;
						$conceded = $row['conceded']+ $homeScore;
						$played = $row['played']+ 1;
						$lost= $row['lost'] +1;
						
						//update home team log table
						$addResult = $this->dbConct->prepare("UPDATE log_table SET points=?, scored=?, conceded=?,played=?, lost=? WHERE teams_id=?");
						$addResult->bindParam(1, $points);
						$addResult->bindParam(2, $scored);	
						$addResult->bindParam(3, $conceded);							
						$addResult->bindParam(4, $played);
						$addResult->bindParam(5, $lost);
						$addResult->bindParam(6, $away_team);
						$addResult->execute();
					}
					
					//commit transaction
				$status = 2; //played status
				$addResults = $this->dbConct->prepare("UPDATE fixture SET status=? WHERE fixture_id=?");
				$addResults->bindParam(1, $status);				
				$addResults->bindParam(2,$fixture_id);
				$addResults->execute();
				
				$updateStatus = $this->dbConct->prepare("UPDATE results SET status=? WHERE fixture_id=?");
				$updateStatus->bindParam(1, $status);				
				$updateStatus->bindParam(2,$fixture_id);
				$updateStatus->execute();
				
					$this->dbConct->commit();
					
					$_SESSION['log_updated'] = true;
					
					
					
				}elseif($homeScore<$awayScore){
					//echo 'fffwt'; die();
					//begin transaction
					$this->dbConct->beginTransaction();
					$homePoints = 1;
					$awayPoints =2;
					
					//select points, scores and conceded goals for home team
					$getDetails = $this->dbConct->prepare("SELECT teams_id,points, scored, conceded,played,won,lost,forfeit FROM log_table WHERE teams_id=?");
					$getDetails->bindParam(1,$home_team);
					$getDetails->execute();
					
					$row = $getDetails->fetch();
					if($getDetails->rowCount()>0){
						$points=  $row['points'] + $homePoints;
						$scored = $row['scored']+ $homeScore;
						$conceded = $row['conceded']+ $awayScore;
						$played = $row['played']+ 1;
						$lost = $row['lost'] +1;
						
						//update home team log table
						$addResult = $this->dbConct->prepare("UPDATE log_table SET points=?, scored=?, conceded=?,played=?,lost=? WHERE teams_id=?");
						$addResult->bindParam(1, $points);
						$addResult->bindParam(2, $scored);	
						$addResult->bindParam(3, $conceded);
						$addResult->bindParam(4, $played);
						$addResult->bindParam(5, $lost);
						$addResult->bindParam(6, $home_team);						
						$addResult->execute();
					}
					
					//select points, scores and conceded goals for away team
					$getAwayTeamDetails = $this->dbConct->prepare("SELECT teams_id, points, scored, conceded,played,won,lost,forfeit FROM log_table WHERE teams_id=?");
					$getAwayTeamDetails->bindParam(1,$away_team);
					$getAwayTeamDetails->execute();
					
					$row = $getAwayTeamDetails->fetch();
					if($getAwayTeamDetails->rowCount()>0){
						$points=  $row['points'] + $awayPoints;
						$scored = $row['scored']+ $awayScore;
						$conceded = $row['conceded']+ $homeScore;
						$played = $row['played']+ 1;
						$won = $row['won'] = +1;
						
						//update home team log table
						$addResult = $this->dbConct->prepare("UPDATE log_table SET points=?, scored=?, conceded=?,played=?, won=? WHERE teams_id=?");
						$addResult->bindParam(1, $points);
						$addResult->bindParam(2, $scored);	
						$addResult->bindParam(3, $conceded);							
						$addResult->bindParam(4, $played);
						$addResult->bindParam(5, $won);
						$addResult->bindParam(6, $away_team);
						$addResult->execute();
					}
					
					//commit transaction
					
				$status = 2; //played status
				$addResults = $this->dbConct->prepare("UPDATE fixture SET status=? WHERE fixture_id=?");
				$addResults->bindParam(1, $status);				
				$addResults->bindParam(2,$fixture_id);
				$addResults->execute();
				
				$updateStatus = $this->dbConct->prepare("UPDATE results SET status=? WHERE fixture_id=?");
				$updateStatus->bindParam(1, $status);				
				$updateStatus->bindParam(2,$fixture_id);
				$updateStatus->execute();
				
					$this->dbConct->commit();
					$_SESSION['log_updated'] = true;
					
				}
				
				//end of Log Table update
			}
			
			//end of checking
				
				
			

		}catch (PDOException $e){
			echo $e->getMessage();
			//Rollback the transaction.
			$this->dbCon->rollBack();
		}
	}
	

    // get all fixtures 
    public function getFixture($status){
    	try{
			
    		$getFixture = $this->dbConct->prepare("SELECT fixture_id, date_time, venue.name as venue, 
			t.name as home_team, t.logo as home_logo,t2.logo as away_logo, t2.name as away_team FROM fixture INNER JOIN
			teams as t ON (t.id=fixture.home_team) INNER JOIN teams as t2
			ON(t2.id=fixture.away_team) INNER JOIN venue ON
			(venue.id=fixture.venue_id) WHERE DATE(date_time) >=CURDATE() AND status !=? 
			ORDER BY date_time ASC");
			$getFixture->bindParam(1,$status);
    		$getFixture->execute();
    		$rows = $getFixture->fetchAll();
    		
    		if($getFixture->rowCount()> 0){
    			return $rows;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
		public function getSpecificFixture($id){
		$date = DATE("Y-m-d"); //current date
		$getFixture =$this->dbConct->PREPARE("SELECT fixture_id, date_time,homeTeam.id as home,homeTeam.name as home_team,awayTeam.id as away,awayTeam.name as away_team,venue.name as venue  FROM fixture INNER JOIN teams as homeTeam ON (homeTeam.id =fixture.home_team) INNER JOIN teams as awayTeam ON (awayTeam.id=fixture.away_team) INNER JOIN venue ON (venue.id=fixture.venue_id) WHERE fixture_id =? ");
		$getFixture->bindParam(1,$id);
		$getFixture->execute();
		
		if($getFixture->rowCount()>0){
			$row = $getFixture->fetch();			
			return $row;
		}
	} //end of getting specific fixture
	
		
	public function getGameResults($id){
		$getGameResults =$this->dbConct->PREPARE("SELECT results_id,fixture_id, IF(status=1,'In Progres','No Started or No Scores') as status, home_team_score,away_team_score,updated_by,last_updated FROM results WHERE fixture_id =? ");
		$getGameResults->bindParam(1,$id);
		$getGameResults->execute();
		
		if($getGameResults->rowCount()>0){
			$row = $getGameResults->fetch();			
			return $row;
		}
	} //end of getting specific results
	
		// add Score
		public function addScore($homeScore,$awayScore,$fixture_id){
		try{
				$date = DATE("Y-m-d"); //current date
				$status =1; // in progress status
				$addScore = $this->dbConct->prepare("UPDATE results SET home_team_score=?, away_team_score=?,last_updated=?,updated_by=?,status=? WHERE fixture_id=?");
				$addScore->bindParam(1,$homeScore);
				$addScore->bindParam(2,$awayScore);
				$addScore->bindParam(3,$date);
				$addScore->bindParam(4,$_SESSION['user']['username']);
				$addScore->bindParam(5,$status);
				$addScore->bindParam(6,$fixture_id);
				$addScore->execute();
				
				$_SESSION['score-added'] = true;
			

		}catch (PDOException $e){
			echo $e->getMessage();
		}
	}
	//update fixture
	  public function editFixture($fixture_id, $date,$venue){
    	try{
    		$editFixture = $this->dbConct->prepare("UPDATE fixtures SET date_time=?, venue_id=? WHERE fixture_id=?");
			$editFixture->bindParam(1,$date);
			$editFixture->bindParam(2,$venue);
			$editFixture->bindParam(3,$fixture_id);
    		$editFixture->execute();
			
			$_SESSION['fixture-updated']=true;
    	

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	
		//update fixture
	  public function cancelFixture($fixture_id, $status){
    	try{
    		$cancelFixture = $this->dbConct->prepare("UPDATE fixtures SET status=? WHERE fixture_id=?");
			$cancelFixture->bindParam(1,$status);
			$cancelFixture->bindParam(2,$fixture_id);
    		$cancelFixture->execute();
			
			$upadteResultsStatus = $this->dbConct->prepare("UPDATE results SET status=? WHERE fixture_id=?");
			$upadteResultsStatus->bindParam(1,$status);
			$upadteResultsStatus->bindParam(2,$fixture_id);
    		$upadteResultsStatus->execute();
			
			$_SESSION['fixture-cancelled']=true;
    	

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	
	  public function getScores($season,$status){
    	try{
    		$getScores = $this->dbConct->prepare("SELECT results_id,IF(results.status=1,'In Progres','Game Ended') as game_status, results.fixture_id, t.name as home_team,t.logo as home_logo,t2.logo as away_logo, t2.name as away_team, home_team_score, away_team_score,last_updated FROM results 
			INNER JOIN teams as t ON (t.id=results.home_team) INNER JOIN teams as t2 ON(t2.id=results.away_team)
			INNER JOIN fixture ON (results.fixture_id=fixture.fixture_id) WHERE results.season =? AND results.status !=? ORDER BY last_updated DESC");
			$getScores->bindParam(1,$season);
			$getScores->bindParam(2,$status);
    		$getScores->execute();
    		$rows = $getScores->fetchAll();
    		
    		if($getScores->rowCount()> 0){
    			return $rows;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	    // get todays' fixtures 
    public function getTodaysFixture($status,$played){
    	try{
    		$getFixture = $this->dbConct->prepare("SELECT fixture_id, date_time, venue.name as venue, 
			t.name as home_team, t2.name as away_team FROM fixture INNER JOIN teams as t
			ON (t.id=fixture.home_team) INNER JOIN teams as t2 ON(t2.id=fixture.away_team) 
			INNER JOIN venue ON (venue.id=fixture.venue_id) 
			WHERE status!=? AND status !=? AND DATE(date_time)=CURDATE() ORDER BY date_time ASC");
			$getFixture->bindParam(1,$status);
			$getFixture->bindParam(2,$played);
    		$getFixture->execute();
    		$rows = $getFixture->fetchAll();
    		
    		if($getFixture->rowCount()> 0){
    			return $rows;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	
	    // get todays' fixtures 
    public function getGameDetails($fixture_id){
    	try{
    		$getGameDetails = $this->dbConct->prepare("SELECT fixtures.venue_id,venue.name as venue_name ,fixtures.date_time, results.fixture_id, results.home_team, results.away_team, t.name as home_team_name, t2.name as away_team_name, home_score,away_score FROM results INNER JOIN teams as t ON (t.team_id=results.home_team) INNER JOIN teams as t2 ON(t2.team_id=results.away_team) INNER JOIN fixtures ON(fixtures.fixture_id=results.fixture_id) INNER JOIN venue ON(venue
			.venue_id=fixtures.venue_id) WHERE results.fixture_id=?");
			$getGameDetails->bindParam(1,$fixture_id);
    		$getGameDetails->execute();
    		$row = $getGameDetails->fetch();
    		
    		if($getGameDetails->rowCount()> 0){
    			return $row;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	
	  // get all Results 
	  
    public function getResults(){
    	try{
			
    		$getFixture = $this->dbConct->prepare("SELECT fixture_id, date_time, venue.name as venue, t.name as home_team, t2.name as away_team FROM fixtures INNER JOIN teams as t ON (t.team_id=fixtures.home_team) INNER JOIN teams as t2 ON(t2.team_id=fixtures.away_team) INNER JOIN venue ON (venue.venue_id=fixtures.venue_id), last_updated WHERE date_time >=CURDATE() ORDER BY date_time ASC");
			
    		$getFixture->execute();
    		$rows = $getFixture->fetchAll();
    		
    		if($getFixture->rowCount()> 0){
    			return $rows;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	
	 public function getTeams($fixture_id){
    	try{
    		$getTeams = $this->dbConct->prepare("SELECT home_team, away_team FROM fixtures WHERE fixture_id=?");
			$getTeams->bindParam(1,$fixture_id);
    		$getTeams->execute();
    		$row = $getTeams->fetch();
    		
    		if($getTeams->rowCount()> 0){
    			return $row;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }
	
	  public function getLogTable($id,$gender){
    	try{
			
    		$getLogTable = $this->dbConct->prepare("SELECT teams.name as team_id,points, scored,
			conceded,scored-conceded as gd,  played, won, lost, forfeit FROM log_table
			INNER JOIN teams ON (teams.id=log_table.teams_id) WHERE log_table.zones_id =? AND gender =?
			ORDER BY points DESC, gd DESC, scored DESC");
			$getLogTable->bindParam(1,$id);
			$getLogTable->bindParam(2,$gender);
    		$getLogTable->execute();
    		$rows = $getLogTable->fetchAll();
    		
    		if($getLogTable->rowCount()> 0){
    			return $rows;
    		}else{
    			return null;
    		}

    	}catch(PDOException $e){
    		echo $e->getMessage();
    	}
    }


}


Class Contact{

	public function __construct(){

        try{
            $this->dbConct = new Connection();
            $this->dbConct = $this->dbConct->dbConnection();
            $this->dbConct->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Lost connection to the database";
        }
    }//end of constructor
	
	public function sendMail($name, $email, $mailBody){
		//get customer details
		
		$recipient="tiyasomba@gmail.com";
		$subject="Contact From Website";
			
		mail($recipient, $subject, $mailBody, "From: $name <$email>");			
				
		$_SESSION['email_sent']=true;
		
	}






}
//end of Contact Class


Class Banner{

	public function __construct(){

        try{
            $this->dbConct = new Connection();
            $this->dbConct = $this->dbConct->dbConnection();
            $this->dbConct->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Lost connection to the database";
        }
    }//end of constructor
	
	public function addBanner($image_Path,$title){
		
		//check if banner already exist
		$checkBanner = $this->dbConct->prepare("SELECT image_path FROM banner where image_path=?");	
		$checkBanner->bindparam(1, $image_Path);
		$checkBanner->execute();
		
		if ($checkBanner->rowCount()>0) { //Events found
			
			$row = $checkBanner->fetch();
			$_SESSION['banner-found']=true;
		
			}else{//banner not found, add banner
				
				$addBanner = $this->dbConct->prepare("INSERT INTO banner (image_path, title) VALUES (:image_path, :title)" );
				$addBanner->execute(array(
						  ':image_path'=>($image_Path),
						  ':title'=>($title)));
							
						
				$_SESSION['banner-added']=true;
			}
		
		
		
	}
	
	
		public function getBanners(){
			try{
				$getBanner = $this->dbConct->prepare("SELECT image_path, title FROM banner");	
				$getBanner->execute();
					
				if ($getBanner->rowCount()>0) { 
					
					$row = $getBanner->fetchAll();
					return $row;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			
		}
	
		public function deleteBanner($id){
		//delete banner details
		
		$deleteBanner = $this->dbConct->prepare("DELETE FROM banner WHERE image_path=?");
		$deleteBanner->bindparam(1, $id);
		$deleteBanner->execute();
			unlink($id);
			$_SESSION['banner-deleted'] = true;
		
	}





}
//end of Banner Class
class Gallery{
	private $dbCon;

//private $username;

	public function __construct(){

		try{

		$this->dbCon = new Connection();

		$this->dbCon = $this->dbCon->dbConnection();
		$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}

		//add Album
	public function addAlbum($title,$album_cover){
				
				$addAlbum = $this->dbCon->prepare("INSERT INTO album (name,album_cover) VALUES (:name,:album_cover)" );
				$addAlbum->execute(array(
						  ':name'=>($title),
						  ':album_cover'=>($album_cover)
						  ));
						  
						  $_SESSION['album-added']=true;
		
	}

		
	public function getAlbums(){
		$getAlbums = $this->dbCon->Prepare("SELECT id,name, album_cover FROM album");
		$getAlbums->execute();
		
		if($getAlbums->rowCount()>0){
			$row = $getAlbums->fetchAll();
			return $row;
		}
	} //end of getting albums
	
	//add Photo
	public function addPhoto($album,$image,$caption){
				$date_posted =DATE("Y-m-d H:i");
				$addPhoto = $this->dbCon->prepare("INSERT INTO album_images (image_url,caption,album_id,date_posted) VALUES (:image_url,:caption,:album_id,:date_posted)" );
				$addPhoto->execute(array(
						  ':image_url'=>($image),
						  ':caption'=>($caption),
						  ':album_id'=>($album),
						  ':date_posted'=>($date_posted)
						  ));
						  
						  $_SESSION['photo-added']=true;
		
	}
	
		public function getPhotosPerAlbums($id){
		$getPhotosPerAlbums = $this->dbCon->Prepare("SELECT id,image_url, caption, album_id, date_posted FROM album_images WHERE album_id=?");
		$getPhotosPerAlbums->bindParam(1,$id);
		$getPhotosPerAlbums->execute();
		
		if($getPhotosPerAlbums->rowCount()>0){
			$rows = $getPhotosPerAlbums->fetchAll();
			return $rows;
		}
	} //end of getting sub categories
	public function getSubcategoryPerCategory($id){
		$getSubcategoryPerCategory = $this->dbCon->Prepare("SELECT id, name, category_category_id FROM sub_category WHERE category_category_id=?");
		$getSubcategoryPerCategory->bindParam(1,$id);
		$getSubcategoryPerCategory->execute();
		
		if($getSubcategoryPerCategory->rowCount()>0){
			$row = $getSubcategoryPerCategory->fetchAll();
			return $row;
		}
	} //end of getting sub categories per category ID

	public function deleteAlbum($id){
		//delet all photos from that album 1st
		$deletePhotosPerAlbum = $this->dbCon->PREPARE("DELETE FROM album_images WHERE album_id=?");
		$deletePhotosPerAlbum->bindParam(1,$id);
		$deletePhotosPerAlbum->execute();
		
		//delete the actual album
		$deleteAlbum = $this->dbCon->PREPARE("DELETE FROM album WHERE id=?");
		$deleteAlbum->bindParam(1,$id);
		$deleteAlbum->execute();
		
		
	}
	
		public function getSpecificAlbum($id){
		$getSpecificAlbum = $this->dbCon->Prepare("SELECT id,name, album_cover FROM album WHERE id=?");
		$getSpecificAlbum->bindParam(1,$id);
		$getSpecificAlbum->execute();
		
		if($getSpecificAlbum->rowCount()>0){
			$row = $getSpecificAlbum->fetch();
			return $row;
		}
	} //end of getting a specific album
	
		public function editAlbum($bannerpath,$title,$album_id){
		$editAlbum = $this->dbCon->PREPARE("UPDATE album SET name=?, album_cover=? WHERE id=?");
		$editAlbum->bindParam(1,$title);
		$editAlbum->bindParam(2,$bannerpath);
		$editAlbum->bindParam(3,$album_id);
		$editAlbum->execute();
		
		$_SESSION['album-edited'] =true;
	}
	
	
}

//end of gallery class
Class Zone{

	public function __construct(){

        try{
            $this->dbConct = new Connection();
            $this->dbConct = $this->dbConct->dbConnection();
            $this->dbConct->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e){
            echo "Lost connection to the database";
        }
    }//end of constructor
	
	public function addZone($path, $title){
		
		//check if banner already exist
		$checkBanner = $this->dbConct->prepare("SELECT image_path FROM banner where image_path=?");	
		$checkBanner->bindparam(1, $path);
		$checkBanner->execute();
		
		if ($checkBanner->rowCount()>0) { //Events found
			
			$row = $checkBanner->fetch();
			$_SESSION['banner-found']=true;
		
			}else{//banner not found, add banner
				
				$addBanner = $this->dbConct->prepare("INSERT INTO banner (image_path, title) VALUES (:image_path, :title)" );
				$addBanner->execute(array(
						  ':image_path'=>($path),
						  ':title'=>($title)));
							
						
				$_SESSION['banner-added']=true;
			}
		
		
		
	}
	
	
		public function getZones(){
			try{
				$getZones = $this->dbConct->prepare("SELECT id, name FROM zones");	
				$getZones->execute();
					
				if ($getZones->rowCount()>0) { 
					
					$row = $getZones->fetchAll();
					return $row;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			
		}
		
		public function getSpecificZone($id){
			try{
				$getSpecificZone = $this->dbConct->prepare("SELECT id, name FROM zones WHERE id=?");
				$getSpecificZone->bindParam(1,$id);
				$getSpecificZone->execute();
					
				if ($getSpecificZone->rowCount()>0) { 
					
					$row = $getSpecificZone->fetch();
					return $row;
				}
			}catch(PDOException $e){
				echo $e->getMessage();
			}
			
			
		}
	
		public function deleteBanner($id){
		//delete banner details
		
		$deleteBanner = $this->dbConct->prepare("DELETE FROM banner WHERE image_path=?");
		$deleteBanner->bindparam(1, $id);
		$deleteBanner->execute();
			unlink($id);
			$_SESSION['banner-deleted'] = true;
		
	}





}
// end of class zone

class News{
	private $dbCon;

//private $username;

	public function __construct(){

		try{

		$this->dbCon = new Connection();

		$this->dbCon = $this->dbCon->dbConnection();
		$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}

	public function getNews(){
		$getNews = $this->dbCon->Prepare("SELECT id,title, content, news_image, date_added FROM news ORDER BY date_added DESC");
		$getNews->execute();
		
		if($getNews->rowCount()>0){
			$rows = $getNews->fetchAll();
			return $rows;
		}
	} //end of getting news

	public function getReporterNews(){
		$added_by = $_SESSION['user']['username'];
		$getReporterNews = $this->dbCon->Prepare("SELECT id,title, content, news_image, date_added FROM news WHERE added_by = '$added_by' ORDER BY date_added DESC");
		$getReporterNews->execute();
		
		if($getReporterNews->rowCount()>0){
			$rows = $getReporterNews->fetchAll();
			return $rows;
		}
	} //end of getting news



	public function getHomeNews(){
		$getNews = $this->dbCon->Prepare("SELECT id,title, content, news_image, date_added FROM news ORDER BY date_added DESC LIMIT 1");
		$getNews->execute();
		
		if($getNews->rowCount()>0){
			$rows = $getNews->fetchAll();
			return $rows;
		}
	} //end of getting news

		public function getMoreHomeNews(){
		$getNews = $this->dbCon->Prepare("SELECT id,title, content, news_image, date_added FROM news ORDER BY date_added DESC LIMIT 3");
		$getNews->execute();
		
		if($getNews->rowCount()>0){
			$rows = $getNews->fetchAll();
			return $rows;
		}
	} //end of getting news
	
	public function getSpecificNews($id){
		$getSpecificNews = $this->dbCon->Prepare("SELECT id,title, content, news_image, date_added FROM news WHERE id=?");
		$getSpecificNews->bindParam(1,$id);
		$getSpecificNews->execute();
		
		if($getSpecificNews->rowCount()>0){
			$row = $getSpecificNews->fetch();
			return $row;
		}
	} //end of getting a specific news
	
	public function deleteNews($id){
		$deleteNews = $this->dbCon->Prepare("DELETE FROM news WHERE id=? ");
		$deleteNews->bindParam(1,$id);
		$deleteNews->execute();		
		
	} //end of deleting event
	
	//add news
	public function addNews($title,$content,$news_image){
			
				$date_posted =DATE("Y-m-d H:i"); // active
				$addNews = $this->dbCon->prepare("INSERT INTO news (title,content,news_image,date_added, added_by) VALUES (:title,:content,:news_image,:date_posted,:added_by)" );
				$addNews->execute(array(
						  ':title'=>($title),
						  ':content'=>($content),
						  ':news_image'=>($news_image),
						  ':date_posted'=>($date_posted),
						  ':added_by'=>$_SESSION['user']['username']
						  ));
						  
						  $_SESSION['news-added']=true;
		
	}
	
	public function editNews($bannerpath,$title,$news,$news_id){
		$editNews = $this->dbCon->PREPARE("UPDATE news SET title=?, content=?,news_image=? WHERE id=?");
		$editNews->bindParam(1,$title);
		$editNews->bindParam(2,$news);
		$editNews->bindParam(3,$bannerpath);
		$editNews->bindParam(4,$news_id);
		$editNews->execute();
		
		$_SESSION['news-edited'] =true;
	}
	
}



class Secretariat{
	private $dbCon;

//private $username;

	public function __construct(){

		try{

		$this->dbCon = new Connection();

		$this->dbCon = $this->dbCon->dbConnection();
		$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}

	public function getSecretariat(){
		$getSecretariat = $this->dbCon->Prepare("SELECT id,fullname, position, description, image_url FROM secretariat ORDER BY rank DESC");
		$getSecretariat->execute();
		
		if($getSecretariat->rowCount()>0){
			$rows = $getSecretariat->fetchAll();
			return $rows;
		}
	} //end of getting Secretariat


	

	public function getZonesSecretariat($id){
		$getZonesSecretariat = $this->dbCon->Prepare("SELECT id,fullname, position, description, zones_id, image_url FROM zones_secretariat WHERE zones_id = '$id' ORDER BY rank ASC");
		$getZonesSecretariat->execute();
		
		if($getZonesSecretariat->rowCount()>0){
			$rows = $getZonesSecretariat->fetchAll();
			return $rows;
		}
	} //end of getting Secretariat


	public function getSpecificSecretariat($id){
		$getSpecificSecretariat = $this->dbCon->Prepare("SELECT id,fullname, position, description, image_url FROM secretariat WHERE id=?");
		$getSpecificSecretariat->bindParam(1,$id);
		$getSpecificSecretariat->execute();
		
		if($getSpecificSecretariat->rowCount()>0){
			$row = $getSpecificSecretariat->fetch();
			return $row;
		}
	} //end of getting a specific Secretariat

	
	public function getSpecificZoneSecretariat($id){
		$getSpecificZoneSecretariat = $this->dbCon->Prepare("SELECT id,fullname, position, description, image_url FROM zones_secretariat WHERE id=?");
		$getSpecificZoneSecretariat->bindParam(1,$id);
		$getSpecificZoneSecretariat->execute();
		
		if($getSpecificZoneSecretariat->rowCount()>0){
			$row = $getSpecificZoneSecretariat->fetch();
			return $row;
		}
	} //end of getting a specific Secretariat


	public function deleteSecretariat($id){
		$deleteSecretariat = $this->dbCon->Prepare("DELETE FROM secretariat WHERE id=? ");
		$deleteSecretariat->bindParam(1,$id);
		$deleteSecretariat->execute();		
		
	} //end of deleting event
	
	//add news
	public function addSecretariat($fullname,$position, $description,$secretariat_image){
			
				$addSecretariat = $this->dbCon->prepare("INSERT INTO secretariat (fullname,position,description,image_url) VALUES (:fullname,:position,:description,:image_url)" );
				$addSecretariat->execute(array(
						  ':fullname'=>($fullname),
						  ':position'=>($position),
						  ':description'=>($description),
						  ':image_url'=>($secretariat_image)
						  ));
						  
						  $_SESSION['secretariat-added']=true;
		
	}//End of adding Secretariat


	public function addZoneSecretariat($fullname,$position, $description, $zones_id, $secretariat_image){
			
				$addZoneSecretariat = $this->dbCon->prepare("INSERT INTO zones_secretariat (fullname,position,description,zones_id,image_url) VALUES (:fullname,:position,:description,:zones_id, :image_url)" );
				$addZoneSecretariat->execute(array(
						  ':fullname'=>($fullname),
						  ':position'=>($position),
						  ':description'=>($description),
						  ':zones_id'=>($zones_id),
						  ':image_url'=>($secretariat_image)
						  ));
						  
						  $_SESSION['zone-secretariat-added']=true;
		
	}//End of adding Secretariat

	
	public function editSecretariat($bannerpath,$fullname,$position,$description, $secretariat_id){
		$editSecretariat = $this->dbCon->PREPARE("UPDATE secretariat SET fullname=?, position=?,description=?, image_url=? WHERE id=?");
		$editSecretariat->bindParam(1,$fullname);
		$editSecretariat->bindParam(2,$position);
		$editSecretariat->bindParam(3,$description);
		$editSecretariat->bindParam(4,$bannerpath);
		$editSecretariat->bindParam(5,$secretariat_id);
		$editSecretariat->execute();
		
		$_SESSION['secretariat-edited'] =true;
	}//End of Editing Secretariat


	public function editZoneSecretariat($bannerpath,$fullname,$position,$description, $secretariat_id){
		$editZoneSecretariat = $this->dbCon->PREPARE("UPDATE zones_secretariat SET fullname=?, position=?,description=?, image_url=? WHERE id=?");
		$editZoneSecretariat->bindParam(1,$fullname);
		$editZoneSecretariat->bindParam(2,$position);
		$editZoneSecretariat->bindParam(3,$description);
		$editZoneSecretariat->bindParam(4,$bannerpath);
		$editZoneSecretariat->bindParam(5,$secretariat_id);
		$editZoneSecretariat->execute();
		
		$_SESSION['secretariat-edited'] =true;
	}//End of Editing Secretariat

	
}


class Videos{
	private $dbCon;

//private $username;

	public function __construct(){

		try{

		$this->dbCon = new Connection();

		$this->dbCon = $this->dbCon->dbConnection();
		$this->dbCon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		} catch (PDOException $e){
			echo "Lost connection to the database";
		}
	}

	public function getVideos(){
		$getVideos = $this->dbCon->Prepare("SELECT id,video_url, description FROM videos");
		$getVideos->execute();
		
		if($getVideos->rowCount()>0){
			$rows = $getVideos->fetchAll();
			return $rows;
		}
	} //end of getting Secretariat
	
	public function getSpecificSecretariat($id){
		$getSpecificSecretariat = $this->dbCon->Prepare("SELECT id,fullname, position, description, image_url FROM secretariat WHERE id=?");
		$getSpecificSecretariat->bindParam(1,$id);
		$getSpecificSecretariat->execute();
		
		if($getSpecificSecretariat->rowCount()>0){
			$row = $getSpecificSecretariat->fetch();
			return $row;
		}
	} //end of getting a specific Secretariat
	
	public function deleteVideo($id){
		$deleteVideo = $this->dbCon->Prepare("DELETE FROM videos WHERE id=? ");
		$deleteVideo->bindParam(1,$id);
		$deleteVideo->execute();		
		
	} //end of deleting event
	
	//add news
	public function addVideo($video_url, $description){
			
				$addVideo = $this->dbCon->prepare("INSERT INTO videos (video_url,description) VALUES (:video_url,:description)" );
				$addVideo->execute(array(
						  ':video_url'=>($video_url),
						  ':description'=>($description),
						  ));
						  
						  $_SESSION['video-added']=true;
		
	}//End of adding Secretariat
	
	
}


?>