<?php

/**
 * HiddenField
 * Classe utilizzata per creare un oggetto di tipo TextField nella form di Joget
 * Serve per avere un elemento di tipo riga di testo (html input > text)
 * Estende FormElement
 * Implementa JsonSerializable per definire come utilizzare il metodo json_encode() di PHP
 *
 * @category   Joget
 * @package    JogetJsonFormCreator
 * @author     DevPGS
 * @copyright  SI.net Servizi Informatici srl
 * @license    Apache-2.0
 * @version    1.1
 * @since      File utilizzabile dalla Release 1.1
 *
 */
namespace Herald\JogetJsonFormCreator;

class HiddenField implements \JsonSerializable {
	// DICHIARO LE VARIABILI ED I METODI GET SET
	CONST CLASSNAME = "org.joget.apps.form.lib.HiddenField";
	private $id;
	public function getid() {
		return $this->id;
	}
	public function setid($value) {
		$this->id = $value;
	}
	private $defaultvalue;
	public function getdefaultvalue() {
		return $this->defaultvalue;
	}
	public function setdefaultvalue($value) {
		$this->defaultvalue = $value;
	}
	private $workflowVariable;
	public function getworkflowVariable() {
		return $this->workflowVariable;
	}
	public function setworkflowVariable($value) {
		$this->workflowVariable = $value;
	}
	private $useDefaultWhenEmpty;
	public function getdefaultwhenempty() {
		return $this->useDefaultWhenEmpty;
	}
	public function setdefaultwhenempty($value) {
		$this->useDefaultWhenEmpty = $value;
	}

	/**
	 * Costruttore
	 *
	 * @param string $idwf
	 *        	id dell'oggetto (nome univoco)
	 * @param string $etichetta
	 *        	etichetta visualizzata nell'interfaccia grafica
	 * @param JogetValidator $validatore
	 *        	Validatore associato per il controllo dei valori ammissibili, NULL se non presente
	 */
	public function __construct($idwf, $value) {
		$this->id = $idwf;
		$this->workflowVariable = $idwf;
		$this->defaultvalue = $value;
		$this->useDefaultWhenEmpty = "";

	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		$obj ['id'] = $this->getid ();
		$obj ['value'] = $this->getdefaultvalue ();
		$obj ['workflowVariable'] = $this->getworkflowVariable ();
		$obj ["useDefaultWhenEmpty"] = $this->getdefaultwhenempty ();
		$element ["properties"] = $obj;
		$element ["className"] = self::CLASSNAME;
		return $element;
	}
}