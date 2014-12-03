<?php
namespace Veranstaltung\Model;

class VeranstaltungEntity
{

    protected $id;

    protected $name;

    protected $vorgaengerid;
    
    protected $veranstalterid;
    

	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @return the $vorgaengerid
     */
    public function getVorgaengerid()
    {
        return $this->vorgaengerid;
    }

	/**
     * @return the $veranstalterid
     */
    public function getVeranstalterid()
    {
        return $this->veranstalterid;
    }

	/**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

	/**
     * @param field_type $vorgaengerid
     */
    public function setVorgaengerid($vorgaengerid)
    {
        $this->vorgaengerid = $vorgaengerid;
    }

	/**
     * @param field_type $veranstalterid
     */
    public function setVeranstalterid($veranstalterid)
    {
        $this->veranstalterid = $veranstalterid;
    }

	public function __construct()
    {
    }




}