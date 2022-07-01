<?php

/**
 * SelectBox
 * Classe utilizzata per creare un oggetto di tipo SelectBox nella form di Joget
 * Serve per avere un elemento di tipo lista con scelta singola o multipla (html select)
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

class SelectBox extends Radio implements \JsonSerializable
{
    // DICHIARO LE VARIABILI ED I METODI GET SET
    public const CLASSNAME = "org.joget.apps.form.lib.SelectBox";
    public const MULTIPLESELECTION = "true";
    public const NOTMULTIPLESELECTION = "";

    private $size;
    public function getsize()
    {
        return $this->size;
    }
    public function setsize($value)
    {
        $this->size = $value;
    }
    private $multiple;
    public function getmultiple()
    {
        return $this->multiple;
    }
    public function multipleselect()
    {
        $this->multiple = self::MULTIPLESELECTION;
    }
    public function singleselect()
    {
        $this->multiple = self::NOTMULTIPLESELECTION;
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
    public function __construct($idwf, $etichetta, $validatore, $opzioni = array())
    {
        parent::__construct($idwf, $etichetta, $validatore);
        $this->optionBinder = new OptionBinder();
        array_unshift($opzioni, new Option("nessuno", "Nessuna Scelta Effettuata"));
        $this->options = $opzioni;
        $this->controlField = "";
        $this->size = "";
        $this->multiple = self::NOTMULTIPLESELECTION;
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
        $obj ["controlField"] = $this->getcontrolField();
        $obj ["optionBinder"] = $this->getoptionBinder();
        $obj ["options"] = $this->getoptions();
        $obj ["multiple"] = $this->getmultiple();
        $obj ["size"] = $this->getsize();
        $element ["properties"] = $obj;
        $element ["className"] = self::CLASSNAME;
        return $element;
    }
}
