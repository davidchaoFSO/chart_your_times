<?php

class DataModel {
	private $db;

	public function __construct($dsn, $user, $pass){
		try{
		$this->db = new \PDO($dsn, $user, $pass);
		}
		catch (\PDOException $e){
			var_dump($e);
		}
	} // constructor
	
	/**
	* @return array Records from the database, as an array of arrays
	*/
	
	public function getActivityList($username){
	
		$statement = $this->db->prepare("
		SELECT distinct activity
		FROM ${username}
		ORDER BY activity
		
		");
	
	
		try{
			if($statement->execute()){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				//echo count($rows);
				return $rows;
			} //if execute
		}
		catch (\PDOException $e){
				echo "Couldn't query the database.";
				var_dump($e);
		}
		return array();
	}// getlist
	
	/**
	* @return array Records from the database, as an array of arrays
	*/

	public function getTimesList(){
	
		$statement = $this->db->prepare("
		SELECT gameId, title, rating
		FROM games
		ORDER BY gameId
		LIMIT 20
		");
	
	
		try{
			if($statement->execute()){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				return $rows;
			} //if execute
		}
		catch (\PDOException $e){
				echo "Couldn't query the database.";
				var_dump($e);
		}
		return array();
	}// getlist
	
	/**
	* @return array Records from the database, as an array of arrays
	*/
	
	public function getGame($id){
	
		$statement = $this->db->prepare("
		SELECT gameId, title, rating
		FROM games
		WHERE (gameId = :id)
		
		");
	
	
		try{
			if($statement->execute(array(
				':id'=>$id
			))){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				return $rows;
			} //if execute
		}
		catch (\PDOException $e){
				echo "Couldn't query the database.";
				var_dump($e);
		}
		return array();
	}// getgame

	public function updateGame($id, $title, $rating){
	
		$statement = $this->db->prepare("
		UPDATE games
		SET title = :title,
			rating = :rating
		WHERE gameId = :id
		
		");
	
	
		try{
			if($statement->execute(array(
				':id'=>$id, ':title'=>$title, ':rating'=>$rating
			))){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				return $rows;
			} //if execute
		}
		catch (\PDOException $e){
				echo "Couldn't query the database.";
				var_dump($e);
		}
		return array();
	}// updategame
	
	public function deleteGame($id){
	
		$statement = $this->db->prepare("
		DELETE FROM games
		WHERE (gameId = :id)
		
		");
	
	
		try{
			if($statement->execute(array(
				':id'=>$id
			))){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				return $rows;
			} //if execute
		}
		catch (\PDOException $e){
				echo "Couldn't query the database.";
				var_dump($e);
		}
		return array();
	}// deletegame
	
	public function createActivity($activity, $record, $user){
		echo $record; echo $user;
		
		$statement = $this->db->prepare("
		INSERT INTO ${user}
		SET activity = :activity,
			record = :record,
			createdDate = SYSDATE();
		
		
		");
	
	
		try{
			if($statement->execute(array(
				':activity'=>$activity, ':record'=>$record
			))){
				$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
				return $rows;
			} //if execute
		}
		catch (\PDOException $e){
				echo "Couldn't query the database.";
				var_dump($e);
		}
		return array();
	}// createActivity
}

