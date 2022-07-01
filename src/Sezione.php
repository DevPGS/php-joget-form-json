<?php

/**
 * Sezione
 * Classe utilizzata per creare un contenitore di tipo Section nella form di Joget
 * Implementa JsonSerializable per definire come utilizzare il metodo json_encode() di PHP
 *
 * @category   Joget
 * @package    JogetJsonFormCreator
 * @author     DevPGS
 * @copyright  SI.net Servizi Informatici srl
 * @license    Apache-2.0
 * @version    1.0
 * @since      File utilizzabile dalla Release 1.0
 *
 */
namespace Herald\JogetJsonFormCreator;

class Sezione implements \JsonSerializable {
	// DICHIARO LE VARIABILI ED I METODI GET SET
	CONST CLASSNAME = "org.joget.apps.form.model.Section";
	private $id;
	public function getid() {
		return $this->id;
	}
	public function setid($value) {
		$this->id = $value;
	}
	private $loadBinder;
	public function getloadBinder() {
		return $this->loadBinder;
	}
	public function setloadBinder($value) {
		$this->loadBinder = $value;
	}
	private $label;
	public function getlabel() {
		return $this->label;
	}
	public function setlabel($value) {
		$this->label = $value;
	}
	private $permission;
	public function getpermission() {
		return $this->permission;
	}
	public function setpermission($value) {
		$this->permission = $value;
	}
	private $storeBinder;
	public function getstoreBinder() {
		return $this->storeBinder;
	}
	public function setstoreBinder($value) {
		$this->storeBinder = $value;
	}
	private $visibilityControl;
	public function getvisibilityControl() {
		return $this->visibilityControl;
	}
	public function setvisibilityControl($value) {
		$this->visibilityControl = $value;
	}
	private $visibilityValue;
	public function getvisibilityValue() {
		return $this->visibilityValue;
	}
	public function setvisibilityValue($value) {
		$this->visibilityValue = $value;
	}
	private $regex;
	public function getregex() {
		return $this->regex;
	}
	public function setregex($value) {
		$this->regex = $value;
	}
	private $elementi;
	public function getelementi() {
		return $this->elementi;
	}
	public function setelementi($value) {
		$this->elementi = $value;
	}

	/**
	 *
	 * @param string $id
	 *        	id della sezione
	 * @param string $etichetta
	 *        	etichetta della sezione per l'interfaccia grafica
	 * @param Colonna[] $elementiform
	 *        	Array contenente l'elenco delle colonne da inserire nella sezione, se non passato crea array vuoto. I valori possono essere aggiunti in seguito con addColonna
	 *
	 */
	public function __construct($id, $etichetta, $colonne = array()) {
		$this->id = $id;
		$this->label = $etichetta;
		$this->elementi = $colonne;
		$this->visibilityControl = "";
		$this->regex = "";
		$this->loadBinder = new OptionBinder ();
		$this->storeBinder = new OptionBinder ();
		$this->permission = new OptionBinder ();
		$this->visibilityValue = "";
	}

	/**
	 * Aggiungo una colonna in coda a quelle gi� presenti
	 *
	 * @param Colonna $elemento
	 *
	 */
	public function addColonna($colonna) {
		$this->elementi [] = $colonna;
	}

	/**
	 * Conta il numero di colonne contenuti nella sezione
	 */
	public function contaColonne() {
		return count ( $this->elementi );
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		$obj ["visibilityControl"] = $this->getvisibilityControl ();
		$obj ["regex"] = $this->getregex ();
		$obj ["loadBinder"] = $this->getloadBinder ();
		$obj ["permission"] = $this->getpermission ();
		$obj ["id"] = $this->getid ();
		$obj ["label"] = $this->getlabel ();
		$obj ["storeBinder"] = $this->getstoreBinder ();
		$obj ["visibilityValue"] = $this->getvisibilityValue ();
		$element ["properties"] = $obj;
		$element ["className"] = self::CLASSNAME;
		$element ["elements"] = $this->getelementi ();
		return $element;
	}
}