<?php
namespace Event\Model;

use Zend\Db\Sql\Ddl\Column\BigInteger;
class EventEntity
{

    protected $id;

    protected $name;

    protected $ort;

    protected $vorgaengerid;
        
    protected $geschlechtsbeschraenkung;
    
    protected $meisterschaftsbeschraenkung;
    
    protected $anmeldegebuehr;
    
    protected $teilnehmerlimit;
    
    protected $veranstaltungsid;
    
    protected $altersminimum;
    
    protected $altersmaximum;
    
    protected $lizenz;
    
    protected $hausnummer;
    
    protected $postleitzahl;
    
    protected $strasse;
    
    protected $beschreibung;
    
    protected $datum;
    
    protected $sportartid;
    

	/**
     * @return the $sportartid
     */
    public function getSportartid()
    {
        return $this->sportartid;
    }

	/**
     * @param field_type $sportartid
     */
    public function setSportartid($sportartid)
    {
        $this->sportartid = $sportartid;
    }

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

	/**
     * @return the $geschlechtsbeschraenkung
     */
    public function getGeschlechtsbeschraenkung()
    {
        return $this->geschlechtsbeschraenkung;
    }

	/**
     * @param field_type $geschlechtsbeschraenkung
     */
    public function setGeschlechtsbeschraenkung($geschlechtsbeschraenkung)
    {
        $this->geschlechtsbeschraenkung = $geschlechtsbeschraenkung;
    }

	/**
     * @return the $meisterschaftsbeschraenkung
     */
    public function getMeisterschaftsbeschraenkung()
    {
        return $this->meisterschaftsbeschraenkung;
    }

	/**
     * @param field_type $meisterschaftsbeschraenkung
     */
    public function setMeisterschaftsbeschraenkung($meisterschaftsbeschraenkung)
    {
        $this->meisterschaftsbeschraenkung = $meisterschaftsbeschraenkung;
    }


	/**
     * @return the $teilnehmerlimit
     */
    public function getTeilnehmerlimit()
    {
        return $this->teilnehmerlimit;
    }

	/**
     * @param field_type $teilnehmerlimit
     */
    public function setTeilnehmerlimit($teilnehmerlimit)
    {
        $this->teilnehmerlimit = $teilnehmerlimit;
    }


	/**
     * @return the $altersminimum
     */
    public function getAltersminimum()
    {
        return $this->altersminimum;
    }

	/**
     * @param field_type $altersminimum
     */
    public function setAltersminimum($altersminimum)
    {
        $this->altersminimum = $altersminimum;
    }

	/**
     * @return the $altersmaximum
     */
    public function getAltersmaximum()
    {
        return $this->altersmaximum;
    }

	/**
     * @param field_type $altersmaximum
     */
    public function setAltersmaximum($altersmaximum)
    {
        $this->altersmaximum = $altersmaximum;
    }

	/**
     * @return the $lizenz
     */
    public function getLizenz()
    {
        return $this->lizenz;
    }

	/**
     * @param field_type $lizenz
     */
    public function setLizenz($lizenz)
    {
        $this->lizenz = $lizenz;
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
     * @return the $beschreibung
     */
    public function getBeschreibung()
    {
        return $this->beschreibung;
    }

	/**
     * @param field_type $beschreibung
     */
    public function setBeschreibung($beschreibung)
    {
        $this->beschreibung = $beschreibung;
    }

	/**
     * @return the $datum
     */
    public function getDatum()
    {
        return $this->datum;
    }

	/**
     * @param field_type $datum
     */
    public function setDatum($datum)
    {
        $this->datum = $datum;
    }
	/**
     * @return the $anmeldegebuehr
     */
    public function getAnmeldegebuehr()
    {
        return $this->anmeldegebuehr;
    }

	/**
     * @param field_type $anmeldegebuehr
     */
    public function setAnmeldegebuehr($anmeldegebuehr)
    {
        $this->anmeldegebuehr = $anmeldegebuehr;
    }
	/**
     * @return the $vorgaengerid
     */
    public function getVorgaengerid()
    {
        return $this->vorgaengerid;
    }

	/**
     * @param field_type $vorgaengerid
     */
    public function setVorgaengerid($vorgaengerid)
    {
        $this->vorgaengerid = $vorgaengerid;
    }

	/**
     * @return the $veranstaltungsid
     */
    public function getVeranstaltungsid()
    {
        return $this->veranstaltungsid;
    }

	/**
     * @param field_type $veranstaltungsid
     */
    public function setVeranstaltungsid($veranstaltungsid)
    {
        $this->veranstaltungsid = $veranstaltungsid;
    }









}