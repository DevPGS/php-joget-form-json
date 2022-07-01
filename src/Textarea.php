<?php

/**
 * Textarea
 * Classe utilizzata per creare un oggetto di tipo TextArea nella form di Joget
 * Serve per avere un elemento di tipo area di testo (html textarea)
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

class Textarea extends FormElement implements \JsonSerializable
{
    // DICHIARO LE VARIABILI ED I METODI GET SET
    public const CLASSNAME = "org.joget.apps.form.lib.TextArea";
    public const NUMRIGHE = "5";
    public const NUMCOLONNE = "50";
    private $cols;
    public function getcols()
    {
        return $this->cols;
    }
    public function setcols($value)
    {
        $this->cols = $value;
    }
    private $rows;
    public function getrows()
    {
        return $this->rows;
    }
    public function setrows($value)
    {
        $this->rows = $value;
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
        $this->rows = self::NUMRIGHE;
        $this->cols = self::NUMCOLONNE;
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
        $obj ["rows"] = $this->getrows();
        $obj ["cols"] = $this->getcols();
        $element ["properties"] = $obj;
        $element ["className"] = self::CLASSNAME;
        return $element;
    }
}
