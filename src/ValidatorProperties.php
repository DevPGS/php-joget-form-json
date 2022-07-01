<?php

/**
 * JogetValidatorProperties
 * Classe utilizzata per creare un validatore da utilizzare per gli elementi della form di Joget
 * Serve per definire le restrizioni sui campi html ad essa associati
 *   - Costanti per tipo di controllo: ALFABETICO | ALFANUMERICO | NUMERICO | EMAIL | REGEX
 *   - Obbligatorio/Non obbligatorio
 * Da associare ad un Validator di tipo Default
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

class ValidatorProperties implements \JsonSerializable
{
    public const ALFABETICO = 'alphabet';
    public const ALFANUMERICO = 'alphanumeric';
    public const NUMERICO = 'numeric';
    public const EMAIL = 'email';
    public const REGEX = 'custom';
    private $mandatory;
    public function getmandatory()
    {
        return $this->mandatory;
    }
    public function setmandatory($value)
    {
        $this->mandatory = $value;
    }
    private $type;
    public function gettype()
    {
        return $this->type;
    }
    public function settype($value)
    {
        $this->type = $value;
    }
    private $customRegex;
    public function getcustomRegex()
    {
        return $this->customRegex;
    }
    public function setcustomRegex($value)
    {
        $this->customRegex = $value;
    }
    private $message;
    public function getmessage()
    {
        return $this->message;
    }
    public function setmessage($value)
    {
        $this->message = $value;
    }
    // DICHIARO I COSTRUTTORI

    /**
     *
     * @param boolean $obbligatorio
     *        	Definisce se il Form Element Associato � obbligatorio
     * @param string $messaggio
     *        	Messaggio da mostrare nel caso in cui fallisca il controllo del Validatore
     * @param string $tipo
     *        	Pu� assumere i valori delle costanti ALFABETICO, ALFANUMERICO, NUMERICO, EMAIL, REGEX
     * @param string $regex
     *        	Specificare la condizione se tipo = REGEX
     */
    public function __construct($obbligatorio = false, $messaggio = "", $tipo = "", $regex = "")
    {
        if ($obbligatorio) {
            $this->mandatory = "true";
        } else {
            $this->mandatory = "";
        }
        $this->type = $tipo;
        $this->customRegex = $regex;
        $this->message = $messaggio;
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
                'mandatory' => $this->getmandatory(),
                'type' => $this->gettype(),
                'custom-regex' => $this->getcustomRegex(),
                'message' => $this->getmessage()
        ];
    }
}
