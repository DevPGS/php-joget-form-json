<?php

/**
 * JogetRadio
 * Classe utilizzata per creare un oggetto di tipo Radio nella form di Joget
 * Serve per avere un elemento di tipo lista con scelta singola (html radio)
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

class Radio extends FormElement implements \JsonSerializable {
	// DICHIARO LE VARIABILI ED I METODI GET SET
	CONST CLASSNAME = "org.joget.apps.form.lib.Radio";
	private $options;
	public function getoptions() {
		return $this->options;
	}
	public function setoptions($value) {
		$this->options = $value;
	}
	private $optionBinder;
	public function getoptionBinder() {
		return $this->optionBinder;
	}
	public function setoptionBinder($value) {
		$this->optionBinder = $value;
	}
	private $controlField;
	public function getcontrolField() {
		return $this->controlField;
	}
	public function setcontrolField($value) {
		$this->controlField = $value;
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
	 * @param Option[] $opzioni
	 *        	Array contenente l'elenco delle opzioni dell'elemento, se non passata crea array vuoto. I valori possono essere aggiunti in seguito con addOpzione
	 */
	public function __construct($idwf, $etichetta, $validatore, $opzioni = array()) {
		parent::__construct ( $idwf, $etichetta, $validatore );
		$this->optionBinder = new OptionBinder ();
		$this->options = $opzioni;
		$this->controlField = "";
	}

	/**
	 * Aggiungo un'opzione in coda a quelle gi� presenti
	 *
	 * @param Option $opzione
	 */
	public function addOpzione($opzione) {
		$this->options [] = $opzione;
	}

	/**
	 * Conta il numero di opzioni contenute nell'elemento
	 */
	public function contaOpzioni() {
		return count ( $this->options );
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see FormElement::jsonSerialize()
	 */
	public function jsonSerialize() {
		$obj = parent::jsonSerialize ();
		$obj ["controlField"] = $this->getcontrolField ();
		$obj ["optionBinder"] = $this->getoptionBinder ();
		$obj ["options"] = $this->getoptions ();
		$element ["properties"] = $obj;
		$element ["className"] = self::CLASSNAME;
		return $element;
	}
}