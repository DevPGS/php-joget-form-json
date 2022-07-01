<?php

/**
 * OptionBinder
 * Classe utilizzata per creare un binder da utilizzare della form di Joget
 * Crea sempre un oggetto vuoto o di tipo specificato nel costruttore
 * Non utilizzarla direttamente, ad uso interno della libreria
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

class OptionBinder implements \JsonSerializable
{
    // DICHIARO LE VARIABILI ED I METODI GET SET
    private $className;
    public function getclassName()
    {
        return $this->className;
    }
    public function setclassName($value)
    {
        $this->className = $value;
    }
    private $properties;
    public function getproperties()
    {
        return $this->properties;
    }
    public function setproperties($value)
    {
        $this->properties = $value;
    }
    // DICHIARO I COSTRUTTORI

    /**
     * Costruttore
     *
     * @param string $classeJoget
     *        	Se passato imposta il Binder al valore, altrimenti crea un Binder vuoto
     *
     */
    public function __construct($classeJoget = "")
    {
        $this->className = $classeJoget;
        $this->properties = new EmptyElement();
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
                'className' => $this->getclassName(),
                'properties' => $this->getproperties()
        ];
    }
}
