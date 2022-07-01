<?php

/**
 * Form
 * Classe utilizzata per creare un contenitore di tipo Form in Joget
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
class Form implements JsonSerializable
{
	// DICHIARO LE VARIABILI ED I METODI GET SET
	const CLASSNAME = "org.joget.apps.form.model.Form";
	const POSTPROCESSORRUN = "both";
	private $id;
	public function getid()
	{
		return $this->id;
	}
	public function setid($value)
	{
		$this->id = $value;
	}
	private $loadBinder;
	public function getloadBinder()
	{
		return $this->loadBinder;
	}
	public function setloadBinder($value)
	{
		$this->loadBinder = $value;
	}
	private $name;
	public function getname()
	{
		return $this->name;
	}
	public function setname($value)
	{
		$this->name = $value;
	}
	private $description;
	public function getdescription()
	{
		return $this->description;
	}
	public function setdescription($value)
	{
		$this->description = $value;
	}
	private $permission;
	public function getpermission()
	{
		return $this->permission;
	}
	public function setpermission($value)
	{
		$this->permission = $value;
	}
	private $storeBinder;
	public function getstoreBinder()
	{
		return $this->storeBinder;
	}
	public function setstoreBinder($value)
	{
		$this->storeBinder = $value;
	}
	private $nopermissionMessage;
	public function getnopermissionMessage()
	{
		return $this->nopermissionMessage;
	}
	public function setnopermissionMessage($value)
	{
		$this->nopermissionMessage = $value;
	}
	private $postProcessorRunOn;
	public function getpostProcessorRunOn()
	{
		return $this->postProcessorRunOn;
	}
	private $postProcessor;
	public function getpostProcessor()
	{
		return $this->postProcessor;
	}
	public function setpostProcessor($value)
	{
		$this->postProcessor = $value;
	}
	public function setpostProcessorRunOn($value)
	{
		$this->postProcessorRunOn = $value;
	}
	private $tableName;
	public function gettableName()
	{
		return $this->tableName;
	}
	public function settableName($value)
	{
		$this->tableName = $value;
	}
	private $elementi;
	public function getelementi()
	{
		return $this->elementi;
	}
	public function setelementi($value)
	{
		$this->elementi = $value;
	}

	/**
	 * Costruttore
	 *
	 * @param string $id
	 *        	Id della form da usare in Joget
	 * @param string $etichetta
	 *        	Nome della form da visualizzare in Joget
	 * @param string $nomeTabella
	 *        	Nome della tabella associata alle informazioni in Joget
	 * @param Section[] $sezioni
	 *        	Array contenente l'elenco delle sezioni da inserire nella form, se non passato crea array vuoto. I valori possono essere aggiunti in seguito con addSezione
	 *
	 */
	public function __construct($id, $etichetta, $nomeTabella, $sezioni = array())
	{
		$this->id = $id;
		$this->name = $etichetta;
		$this->tableName = $nomeTabella;
		$this->elementi = $sezioni;
		$this->loadBinder = new OptionBinder("org.joget.apps.form.lib.WorkflowFormBinder");
		$this->storeBinder = new OptionBinder("org.joget.apps.form.lib.WorkflowFormBinder");
		$this->permission = new OptionBinder();
		$this->postProcessor = new OptionBinder();
		$this->postProcessorRunOn = self::POSTPROCESSORRUN;
		$this->description = "";
		$this->nopermissionMessage = "";
	}

	/**
	 * Aggiungo una sezione in coda a quelle gi� presenti
	 *
	 * @param Sezione $sezione
	 *
	 */
	public function addSezione($sezione)
	{
		$this->elementi[] = $sezione;
	}

	/**
	 * Conta il numero di sezioni contenute nella form
	 */
	public function contaSezioni()
	{
		return count($this->elementi);
	}
	/*
	 *
	 */
	public function jsonSerialize()
	{
		$obj["noPermissionMessage"] = $this->getnopermissionMessage();
		$obj["loadBinder"] = $this->getloadBinder();
		$obj["name"] = $this->getname();
		$obj["description"] = $this->getdescription();
		$obj["postProcessorRunOn"] = $this->getpostProcessorRunOn();
		$obj["permission"] = $this->getpermission();
		$obj["id"] = $this->getid();
		$obj["postprocessor"] = $this->getpostProcessor();
		$obj["storeBinder"] = $this->getstoreBinder();
		$obj["tableName"] = $this->gettableName();
		$element["properties"] = $obj;
		$element["className"] = self::CLASSNAME;
		$element["elements"] = $this->getelementi();
		return $element;
	}
}
