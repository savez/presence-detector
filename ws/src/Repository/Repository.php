<?php

namespace Repository;

/**
 * From KnpSilexExtensions (https://github.com/KnpLabs/KnpSilexExtensions)
 */

use Doctrine\DBAL\Connection;

/**
 * Represents a base Repository.
 */
abstract class Repository
{
    /**
     * @return string
     */
    abstract public function getTableName();

    /**
     * @var Doctrine\DBAL\Connection
     */
    public $db;

    /**
     * @param Doctrine\DBAL\Connection $db
     */
    public function __construct(Connection $db)
    {
        $this->db = $db;
    }

    /**
     * Inserts a table row with specified data.
     *
     * @param array $data An associative array containing column-value pairs.
     * @return integer The number of affected rows.
     */
    public function insert(array $data)
    {
        return $this->db->insert($this->getTableName(), $data);
    }

    /**
     * Executes an SQL UPDATE statement on a table.
     *
     * @param array $identifier The update criteria. An associative array containing column-value pairs.
     * @param array $types Types of the merged $data and $identifier arrays in that order.
     * @return integer The number of affected rows.
     */
    public function update(array $data, array $identifier)
    {
        return $this->db->update($this->getTableName(), $data, $identifier);
    }

    /**
     * Executes an SQL DELETE statement on a table.
     *
     * @param array $identifier The deletion criteria. An associateve array containing column-value pairs.
     * @return integer The number of affected rows.
     */
    public function delete(array $identifier)
    {
        return $this->db->delete($this->getTableName(), $identifier);
    }

    /**
     * Returns all records from this repository's table
     * 
     * @return array
     */
    public function findAll()
    {
        return $this->db->fetchAll(sprintf('SELECT * FROM %s', $this->getTableName()));
    }
    
	public function listDipendenti(){
		 return $this->db->fetchAll(sprintf("SELECT * FROM %s WHERE ruolo LIKE 'dipendente'", $this->getTableName()));
	}

    public function checkCodUser($cod){
        return $this->db->fetchAll(sprintf("SELECT codice FROM %s WHERE codice = '".$cod."'", $this->getTableName()));
    }

    public function checkInsertByUtenteAndDay($cod,$day){
        return $this->db->fetchAll(sprintf("SELECT id_utente FROM %s WHERE id_utente = '".$cod."' AND giorno = '".$day."'", $this->getTableName()));
    }

    public function allUser(){
        return $this->db->fetchAll(sprintf("SELECT * FROM %s ", $this->getTableName()));
    }

    public function allByUserAndMonth($idu,$m){
        return $this->db->fetchAll("SELECT * FROM orario JOIN utente ON orario.id_utente = utente.codice WHERE utente.codice = '".$idu."' AND MONTH(giorno) = '".$m."'");

    }

     public function allByUserAndDay($idu,$d,$m,$y){
        return $this->db->fetchAll("SELECT *, DATE_FORMAT(giorno,'%d/%m/%Y') as dataformat FROM orario JOIN utente ON orario.id_utente = utente.codice 
                                    WHERE utente.codice = '".$idu."' 
                                    AND DAY(giorno) = '".$d."'
                                    AND MONTH(giorno) = '".$m."'
                                    AND YEAR(giorno) = '".$y."'");

    }

    public function checkCredential($u,$p){
        return $this->db->fetchAll(sprintf("SELECT * FROM %s WHERE username LIKE '".$u."' AND password LIKE '".$p."'", $this->getTableName()));
    }


    public function allUserAndInsert(){
        return $this->db->fetchAll("SELECT  DISTINCT(u.codice),u.nome,u.cognome,DATE_FORMAT(o.giorno,'%d/%m/%Y') as dataformat, o.orario 
                                            FROM utente u
                                            LEFT JOIN orario o ON  u.codice = o.id_utente
                                            WHERE o.giorno = (SELECT MAX(giorno) 
                                            FROM orario o2 WHERE o.id_utente = o2.id_utente)
                                            GROUP BY (u.codice)");
    }


    public function singleUser($id){
        return $this->db->fetchAll(sprintf("SELECT * FROM %s WHERE codice = '".$id."'",$this->getTableName()));
    }

    public function getPresenzeByUserAndMonth($id,$m){        
        return $this->db->fetchAll("SELECT *,DATE_FORMAT(giorno,'%d/%m/%Y') as dataformat 
                                    FROM orario 
                                    WHERE id_utente = '".$id."'
                                    AND MONTH(giorno) = '".$m."'");
    }
}