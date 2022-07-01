<?php

/**
 * AfrescoButton
 * Classe utilizzata per creare un oggetto di tipo AlfrescoRepoButton nella form di Joget
 * Serve per avere il connettore con il repository per navigare nei file caricati
 * Equivale ad un FormElement (con campi personalizzati, quindi non la estende)
 * Implementa JsonSerializable per definire come utilizzare il metodo json_encode() di PHP
 *
 * @category   Joget
 * @package    JogetJsonFormCreator
 * @author     DevPGS
 * @license    Apache-2.0
 * @version    1.0
 * @since      File utilizzabile dalla Release 1.0
 *
 */
namespace Herald\JogetJsonFormCreator;

class AlfrescoButton implements \JsonSerializable
{
	// DICHIARO LE VARIABILI ED I METODI GET SET
	const CLASSNAME = "org.joget.alfresco.AlfrescoRepoButton";
	const PROCESSIDDEFAULT = "#assignment.processId#";
	const IDDEFAULT = "documento";
	const ETICHETTA = "Apri Documenti";
	private $processId;
	public function getprocessId()
	{
		return $this->processId;
	}
	public function setprocessId($value)
	{
		$this->processId = $value;
	}
	private $id;
	public function getid()
	{
		return $this->id;
	}
	public function setid($value)
	{
		$this->id = $value;
	}
	private $label;
	public function getlabel()
	{
		return $this->label;
	}
	public function setlabel($value)
	{
		$this->label = $value;
	}

	/**
	 * Costruttore
	 *
	 * @param string $etichetta
	 *        	Etichetta per l'interfaccia grafica (se non passata prende il valore di default della classe definito in ETICHETTA)
	 */
	public function __construct($etichetta = self::ETICHETTA)
	{
		$this->processId = self::PROCESSIDDEFAULT;
		$this->id = self::IDDEFAULT;
		$this->label = $etichetta;
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize()
	{
		$obj["processId"] = $this->getprocessId();
		$obj["id"] = $this->getid();
		$obj["label"] = $this->getlabel();
		$element["properties"] = $obj;
		$element["className"] = self::CLASSNAME;
		return $element;
	}
}
