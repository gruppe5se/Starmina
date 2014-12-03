<?php
namespace Veranstaltung\Model;

use Zend\Db\Adapter\Adapter;
use Veranstaltung\Model\VeranstaltungEntity;
use Zend\Stdlib\Hydrator\ClassMethods;
use Zend\Db\Sql\Sql;
use Zend\Db\Sql\Select;
use Zend\Db\ResultSet\HydratingResultSet;
use Veranstaltung\Controller\VeranstaltungController;

class VeranstaltungMapper
{
    protected $tableName = 'veranstaltung';
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

        $entityPrototype = new VeranstaltungEntity();
        $hydrator = new ClassMethods();
        $resultset = new HydratingResultSet($hydrator, $entityPrototype);
        $resultset->initialize($results);
        return $resultset;
    }
    
    public function saveVeranstaltung(VeranstaltungEntity $veranstaltung)
    {
        $hydrator = new ClassMethods();
        $data = $hydrator->extract($veranstaltung);
    
        if ($veranstaltung->getId()) {
            // update action
            $action = $this->sql->update();
            $action->set($data);
            $action->where(array('id' => $veranstaltung->getId()));
        } else {
            // insert action
            $action = $this->sql->insert();
            unset($data['id']);
            $action->values($data);
        }
        $statement = $this->sql->prepareStatementForSqlObject($action);
        $result = $statement->execute();
    
        if (!$veranstaltung->getId()) {
            $veranstaltung->setId($result->getGeneratedValue());
        }
        return $result;
    
    }
    
    public function getVeranstaltung($id)
    {
        $select = $this->sql->select();
        $select->where(array('id' => $id));
    
        $statement = $this->sql->prepareStatementForSqlObject($select);
        $result = $statement->execute()->current();
        if (!$result) {
            return null;
        }
    
        $hydrator = new ClassMethods();
        $veranstaltung = new VeranstaltungEntity();
        $hydrator->hydrate($result, $veranstaltung);
    
        return $veranstaltung;
    }
    
    public function deleteVeranstaltung($id)
    {
        $delete = $this->sql->delete();
        $delete->where(array('id' => $id));
    
        $statement = $this->sql->prepareStatementForSqlObject($delete);
        return $statement->execute();
    }
}