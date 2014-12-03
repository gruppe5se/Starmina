<?php
namespace Veranstalter\Model;

class VeranstalterEntity
{

    protected $id;

    protected $name;

    protected $vorname;

    protected $email;
        
    protected $iban;
    
    protected $bic;
    
    protected $verifiziert;
    
    protected $firmenname;
    
    protected $strasse;
    
    protected $hausnummer;
    
    protected $postleitzahl;
    
    protected $ort;    

	public function __construct()
    {
    }
	/**
     * @return the $id
     */
    public function getId()
    {
        return $this->id;
    }

	/**
     * @param field_type $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

	/**
     * @return the $name
     */
    public function getName()
    {
        return $this->name;
    }

	/**
     * @param field_type $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

	/**
     * @return the $vorname
     */
    public function getVorname()
    {
        return $this->vorname;
    }

	/**
     * @param field_type $vorname
     */
    public function setVorname($vorname)
    {
        $this->vorname = $vorname;
    }

	/**
     * @return the $email
     */
    public function getEmail()
    {
        return $this->email;
    }

	/**
     * @param field_type $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

	/**
     * @return the $iban
     */
    public function getIban()
    {
        return $this->iban;
    }

	/**
     * @param field_type $iban
     */
    public function setIban($iban)
    {
        $this->iban = $iban;
    }

	/**
     * @return the $bic
     */
    public function getBic()
    {
        return $this->bic;
    }

	/**
     * @param field_type $bic
     */
    public function setBic($bic)
    {
        $this->bic = $bic;
    }

	/**
     * @return the $verifiziert
     */
    public function getVerifiziert()
    {
        return $this->verifiziert;
    }

	/**
     * @param field_type $verifiziert
     */
    public function setVerifiziert($verifiziert)
    {
        $this->verifiziert = $verifiziert;
    }

	/**
     * @return the $firmenname
     */
    public function getFirmenname()
    {
        return $this->firmenname;
    }

	/**
     * @param field_type $firmenname
     */
    public function setFirmenname($firmenname)
    {
        $this->firmenname = $firmenname;
    }

	/**
     * @return the $strasse
     */
    public function getStrasse()
    {
        return $this->strasse;
    }

	/**
     * @param field_type $strasse
     */
    public function setStrasse($strasse)
    {
        $this->strasse = $strasse;
    }

	/**
     * @return the $hausnummer
     */
    public function getHausnummer()
    {
        return $this->hausnummer;
    }

	/**
     * @param field_type $hausnummer
     */
    public function setHausnummer($hausnummer)
    {
        $this->hausnummer = $hausnummer;
    }

	/**
     * @return the $postleitzahl
     */
    public function getPostleitzahl()
    {
        return $this->postleitzahl;
    }

	/**
     * @param field_type $postleitzahl
     */
    public function setPostleitzahl($postleitzahl)
    {
        $this->postleitzahl = $postleitzahl;
    }

	/**
     * @return the $ort
     */
    public function getOrt()
    {
        return $this->ort;
    }

	/**
     * @param field_type $ort
     */
    public function setOrt($ort)
    {
        $this->ort = $ort;
    }
    
    



}