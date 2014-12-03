<?php
namespace Veranstalter\Model;

use Zend\Db\Adapter\Adapter;
use Veranstalter\Model\VeranstalterEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;

class VeranstalterMapper
{
    protected $tableName = 'veranstalter';
    protected $dbAdapter;
    protected $sql;

    public function __construct(Adapter $dbAdapter)
    {
        $this->dbAdapter = $dbAdapter;
        $this->sql = new Sql($dbAdapter);
        $this->sql->setTable($this->tableName);
    }

    public function fetchAll()
    {
        $select = $this->sql->select();
        //$select->order(array('completed ASC', 'created ASC'));

        $statement = $this->sql->prepareStatementForSqlObject($select);
        $results = $statement->execute();

        $entityPrototype = new VeranstalterEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }
    
    
    public function saveVeranstalter(VeranstalterEntity $veranstalter)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($veranstalter);
    
        if ($veranstalter->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $veranstalter->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();
    
        if (!$veranstalter->getId()) {
            $veranstalter->setId($result->getGeneratedValue());
        }
        return $result;
    
    }
    
    public function saveLogin(VeranstalterEntity $veranstalter, $passwort)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($veranstalter);
        // Vielleicht †berprŸfung: Meldung
        if ($veranstalter->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $veranstalter->getId()));
        } else {
            // insert action
//             unset($data['id']);
//             $action->values($data);
            $action = $this->dbAdapter->query('INSERT INTO `logindaten`(`Email`, `Passwort`, `Rolle`) VALUES (?,?,?)', array($veranstalter->getEmail(),'Passwort',$this->tableName));
        }
//         $statement = $this->sql->prepareStatementForSqlObject($action);
//         $result = $statement->execute();
    
//         if (!$veranstalter->getId()) {
//             $veranstalter->setId($result->getGeneratedValue());
//         }
        return $result;
    
    }
    
    public function getVeranstalter($id)
    {
        $select = $this->sql->select();
        $select->where(array('id' => $id));
    
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }
    
        $hydrator = new ClassMethods();
        $veranstalter = new VeranstalterEntity();
        $hydrator->hydrate($result, $veranstalter);
    
        return $veranstalter;
    }
    
    public function deleteVeranstalter($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));
    
        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }
    
    public function deleteLogin($veranstalter)
    {
        $action = $this->dbAdapter->query('DELETE FROM `logindaten` WHERE `Email`=?', array($veranstalter->getEmail()));
        return $result;
    }
    
}