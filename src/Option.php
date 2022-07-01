<?php

/**
 * Option
 * Classe utilizzata per creare un opzione da utilizzare della form di Joget
 * Serve per avere un'opzione per gli elementi che la supportano (es. html checkbox, radio, select)
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

class Option implements \JsonSerializable
{
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
    private $value;
    public function getvalue()
    {
        return $this->value;
    }
    public function setvalue($value)
    {
        $this->value = $value;
    }
    private $grouping;
    public function getgrouping()
    {
        return $this->grouping;
    }
    public function setgrouping($value)
    {
        $this->grouping = $value;
    }
    // DICHIARO IL COSTRUTTORE

    /**
     *
     * @param string $valore
     *        	Identificativo del campo
     * @param string $etichetta
     *        	Etichetta visualizzata dall'utente
     * @param string $gruppo
     *        	Raggruppamento dell'oggetto (opzionale)
     */
    public function __construct($valore, $etichetta, $gruppo = "")
    {
        $this->value = $valore;
        $this->label = $etichetta;
        $this->grouping = $gruppo;
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
                'value' => $this->getvalue(),
                'label' => $this->getlabel(),
                'grouping' => $this->getgrouping()
        ];
    }
}
