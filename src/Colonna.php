<?php

/**
 * Colonna
 * Classe utilizzata per creare un contenitore di tipo Column nella form di Joget
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

class Colonna implements \JsonSerializable
{
    // DICHIARO LE VARIABILI ED I METODI GET SET
    public const CLASSNAME = "org.joget.apps.form.model.Column";
    public const WIDTHFULLSIZE = "100%";
    public const WIDTHHALFSIZE = "49%";
    private $width;
    public function getwidth()
    {
        return $this->width;
    }
    public function setwidth($value)
    {
        $this->width = $value;
    }
    private $elementi;
    public function getelementi()
    {
        return $this->elementi;
    }
    public function setelementi($value)
    {
        $this->elementi = $value;
    }

    /**
     * Costruttore
     *
     * @param Colonna::WIDTHFULLSIZE|Colonna::WIDTHHALFSIZE $dimensionepercentuale
     *        	Dimensione in % della colonna, per definire il numero di colonne della Sezione.
     *        	Di default prende il valore della costante WIDTHFULLSIZE (100%, singola colonna).
     * @param FormElement[] $elementiform
     *        	Array contenente l'elenco degli elementi da inserire nella colonna, se non passata crea array vuoto. I valori possono essere aggiunti in seguito con addElemento
     *
     */
    public function __construct($dimensionepercentuale = self::WIDTHFULLSIZE, $elementiform = array())
    {
        $this->elementi = $elementiform;
        $this->width = $dimensionepercentuale;
    }

    /**
     * Aggiungo un'opzione in coda a quelle gi� presenti
     *
     * @param FormElement $elemento
     *
     */
    public function addElemento($elemento)
    {
        $this->elementi[] = $elemento;
    }

    /**
     * Conta il numero di elementi contenuti nella colonna
     */
    public function contaElementi()
    {
        return count($this->elementi);
    }

    /**
     *
     * {@inheritDoc}
     *
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        $obj["width"] = $this->getwidth();
        $element["properties"] = $obj;
        $element["className"] = self::CLASSNAME;
        $element["elements"] = $this->getelementi();
        return $element;
    }
}
