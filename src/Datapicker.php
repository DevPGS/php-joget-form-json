<?php

/**
 * Datapicker
 * Classe utilizzata per creare un oggetto di tipo DatePicker nella form di Joget
 * Serve per avere un elemento di tipo calendario con scelta (jquery datepicker)
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

class Datapicker extends FormElement implements \JsonSerializable
{
    // DICHIARO LE VARIABILI ED I METODI GET SET
    public const CLASSNAME = "org.joget.apps.form.lib.DatePicker";
    public const DATAJAVA = "yyyy-MM-dd";
    public const DATAJQUERY = "dd/mm/yy";
    public const RANGEPICKER = "c-30:c+10";
    public const ALLOWMANUAL = "true";
    public const DISALLOWMANUAL = "";
    private $yearRange;
    public function getyearRange()
    {
        return $this->yearRange;
    }
    public function setyearRange($value)
    {
        $this->yearRange = $value;
    }
    private $dataFormat;
    public function getdataFormat()
    {
        return $this->dataFormat;
    }
    public function setdataFormat($value)
    {
        $this->dataFormat = $value;
    }
    private $format;
    public function getformat()
    {
        return $this->format;
    }
    public function setformat($value)
    {
        $this->format = $value;
    }
    private $currentDateAs;
    public function getcurrentDateAs()
    {
        return $this->currentDateAs;
    }
    public function setcurrentDateAs($value)
    {
        $this->currentDateAs = $value;
    }
    private $startDateFieldId;
    public function getstartDateFieldId()
    {
        return $this->startDateFieldId;
    }
    public function setstartDateFieldId($value)
    {
        $this->startDateFieldId = $value;
    }
    private $endDateFieldId;
    public function getendDateFieldId()
    {
        return $this->endDateFieldId;
    }
    public function setendDateFieldId($value)
    {
        $this->endDateFieldId = $value;
    }
    private $allowManual;
    public function getallowManual()
    {
        return $this->allowManual;
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
    public function __construct($idwf, $etichetta, $validatore)
    {
        parent::__construct($idwf, $etichetta, $validatore);
        $this->yearRange = self::RANGEPICKER;
        $this->dataFormat = self::DATAJAVA;
        $this->format = self::DATAJQUERY;
        $this->currentDateAs = "";
        $this->startDateFieldId = "";
        $this->endDateFieldId = "";
        $this->allowManual = self::ALLOWMANUAL;
    }

    /**
     * PERMETTE DI INSERIRE IL CAMPO DATA COME INPUT TESTUALE
     */
    public function allowManual()
    {
        $this->allowManual = self::ALLOWMANUAL;
    }

    /**
     * PERMETTE DI INSERIRE IL CAMPO DATA SOLO TRAMITE PICKER
     */
    public function disallowManual()
    {
        $this->allowManual = self::DISALLOWMANUAL;
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see FormElement::jsonSerialize()
     */
    public function jsonSerialize()
    {
        $obj = parent::jsonSerialize();
        $obj["yearRange"] = $this->getyearRange();
        $obj["dataFormat"] = $this->getdataFormat();
        $obj["format"] = $this->getformat();
        $obj["currentDateAs"] = $this->getcurrentDateAs();
        $obj["startDateFieldId"] = $this->getstartDateFieldId();
        $obj["endDateFieldId"] = $this->getendDateFieldId();
        $obj["allowManual"] = $this->getallowManual();
        $element["properties"] = $obj;
        $element["className"] = self::CLASSNAME;
        return $element;
    }
}
