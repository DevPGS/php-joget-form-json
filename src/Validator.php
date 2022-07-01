<?php

/**
 * JogetValidator
 * Classe utilizzata per creare un validatore da utilizzare per gli elementi della form di Joget
 * Serve per definire un oggetto che contiene le restrizioni sui campi html ad essa associati
 * - Validator vuoto se non necessario
 * - Validator di tipo Default se richiesto (con ValidatorProperties da associare)
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

class Validator implements \JsonSerializable {
	// DICHIARO LE VARIABILI ED I METODI GET SET
	private $className;
	public function getclassName() {
		return $this->className;
	}
	public function setclassName($value) {
		$this->className = $value;
	}
	private $properties;
	public function getproperties() {
		return $this->properties;
	}
	public function setproperties($value) {
		$this->properties = $value;
	}

	/**
	 * Costruttore
	 *
	 * @param boolean $haValidatore
	 *        	false -> validatore vuoto
	 *        	true -> validatore di tipo DefaultValidator con properties passate come parametro
	 * @param JogetValidatorProperties $proprieta
	 *        	caratteristiche del validatore
	 */
	public function __construct($haValidatore, $proprieta = array()) {
		if ($haValidatore) {
			$this->className = "org.joget.apps.form.lib.DefaultValidator";
			$this->properties = $proprieta;
		} else {
			$this->className = "";
			$this->properties = new EmptyElement ();
		}
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize() {
		return [
				'className' => $this->getclassName (),
				'properties' => $this->getproperties ()
		];
	}
}