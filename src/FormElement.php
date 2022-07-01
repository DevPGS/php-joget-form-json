<?php

/**
 * FormElement
 * Classe astratta per definire le parti comuni di un oggetto Joget nella form di Joget
 * Serve per avere un elemento di tipo generico in html
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

class FormElement implements \JsonSerializable
{
	const READONLY = "true";
	const READONLYLABEL = "true";
	const NOTREADONLY = "";
	const NOTREADONLYLABEL = "";

	// DICHIARO LE VARIABILI ED I METODI GET SET
	private $label;
	public function getlabel()
	{
		return $this->label;
	}
	public function setlabel($value)
	{
		$this->label = $value;
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
	private $workflowVariable;
	public function getworkflowVariable()
	{
		return $this->workflowVariable;
	}
	public function setworkflowVariable($value)
	{
		$this->workflowVariable = $value;
	}
	private $defaultvalue;
	public function getdefaultvalue()
	{
		return $this->defaultvalue;
	}
	public function setdefaultvalue($value)
	{
		$this->defaultvalue = $value;
	}
	private $readonly;
	public function getreadonly()
	{
		return $this->readonly;
	}
	private $readonlyLabel;
	public function getreadonlyLabel()
	{
		return $this->readonlyLabel;
	}
	private $validator;
	public function getvalidator()
	{
		return $this->validator;
	}
	public function setvalidator($value)
	{
		$this->validator = $value;
	}

	// DICHIARO I COSTRUTTORI

	/**
	 *
	 * @param string $idwf
	 *        	id dell'elemento
	 * @param string $etichetta
	 *        	etichetta visualizzata nell'interfaccia grafica
	 * @param JogetValidator $validatore
	 *        	Validatore del campo. Se non passato o NULL crea un validatore vuoto
	 */
	public function __construct($idwf, $etichetta, $validatore = NULL)
	{
		$this->id = $idwf;
		$this->workflowVariable = $idwf;
		$this->label = $etichetta;
		if ($validatore == NULL)
			$this->validator = new Validator(false);
		else
			$this->validator = $validatore;

		$this->readonly = self::NOTREADONLY;
		$this->readonlyLabel = self::NOTREADONLYLABEL;
		$this->defaultvalue = "";
	}

	/**
	 * Mette l'elemento in sola lettura e lo visualizza come testo
	 */
	public function readonlyGUI()
	{
		$this->readonlyLabel = self::READONLYLABEL;
		$this->readonly = self::READONLY;
	}

	/**
	 * Mette l'elemento in modifica e lo visualizza come widget
	 */
	public function writableGUI()
	{
		$this->readonlyLabel = self::NOTREADONLYLABEL;
		$this->readonly = self::NOTREADONLY;
	}

	/**
	 *
	 * {@inheritDoc}
	 *
	 * @see JsonSerializable::jsonSerialize()
	 */
	public function jsonSerialize()
	{
		return [
			'id' => $this->getid(),
			'label' => $this->getlabel(),
			'value' => $this->getdefaultvalue(),
			'workflowVariable' => $this->getworkflowVariable(),
			'validator' => $this->getvalidator(),
			'readonly' => $this->getreadonly(),
			'readonlyLabel' => $this->getreadonlylabel()
		];
	}
}
