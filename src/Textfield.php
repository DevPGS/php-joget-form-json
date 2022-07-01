<?php

/**
 * Textfield
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
 * @version    1.0
 * @since      File utilizzabile dalla Release 1.0
 *
 */
namespace Herald\JogetJsonFormCreator;

class Textfield extends FormElement implements \JsonSerializable {
	// DICHIARO LE VARIABILI ED I METODI GET SET
	CONST CLASSNAME = "org.joget.apps.form.lib.TextField";
	private $maxlength;
	public function getmaxlength() {
		return $this->maxlength;
	}
	public function setmaxlength($value) {
		$this->maxlength = $value;
	}
	private $size;
	public function getsize() {
		return $this->size;
	}
	public function setsize($value) {
		$this->size = $value;
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
	public function __construct($idwf, $etichetta, $validatore) {
		parent::__construct ( $idwf, $etichetta, $validatore );
		$this->size = "";
		$this->maxlength = "";
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see FormElement::jsonSerialize()
	 */
	public function jsonSerialize() {
		$obj = parent::jsonSerialize ();
		$obj ["maxlength"] = $this->getmaxlength ();
		$obj ["size"] = $this->getsize ();
		$element ["properties"] = $obj;
		$element ["className"] = self::CLASSNAME;
		return $element;
	}
}