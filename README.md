<h1 align="center">PHP Json Joget Form Creator</h1>

# Indice
- [Contesto](#contesto)
- [Requisiti](#requisiti)
- [Installazione](#installazione)
- [Uso](#uso)
  - [Elementi](#elementi)
  - [Esempio](#esempio)
- [Licenza](#licenza)
  - [Dettaglio licenza](#dettaglio-licenza)
  - [Contributori](#contributori)

# Contesto
Questa libreria permette di creare una form in PHP con una struttura definita ed avere in output la stessa in JSON.

La struttura di un oggetto Form per Joget e' del seguente tipo:
```
Form -> Section (*) -> Column (*) -> FormElement (*) ---|-> Validator
                                                        |-> Option (?)(*)
  (?) = Opzionale                                       |-> OptionBinder (?)
  (*) = da 1 a N

   /-------------------------FORM--------------------------\
   |   /--------------------SECTION1-------------------\   |
   |   |   /---COLS1----|----COLS2----|----COLS3---\   |   |
   |   |   |  ELEMENT1  |   ELEMENT1  |  ELEMENT1  |   |   |
   |   |   |  ELEMENT2  |            |  ELEMENT2   |   |   |
   |   |   |            |            |  ELEMENT3   |   |   |
   |   |   \---------------------------------------/   |   |
   |   \-----------------------------------------------/   |
   |                                                       |
   |   ---------------------SECTION2-------------------\   |
   |   |   ------------------COLS1-----------------\   |   |
   |   |   |             ELEMENT1                  |   |   |
   |   |   |             /--ELEMENT2--\            |   |   |
   |   |   |             |-OPT1 -OPT2 |            |   |   |
   |   |   |             |-OPT3 -OPT4 |            |   |   |
   |   |   |             \------------/            |   |   |
   |   |   \---------------------------------------/   |   |
   |   \-----------------------------------------------/   |
   \-------------------------------------------------------/

```
# Requisiti
- PHP >= 5.6

# Installazione

Il progetto può essere importato come dipendenza di composer:
```
composer require sinetinformatica/php-joget-form-json
```
oppure clonandolo nel seguente modo:

```
your_project_folder
|___sdk_repo_folder
```
a questo punto lanciare all'interno della cartella `sdk_repo_folder` il comando
```
composer install --no-dev
```


# Uso
## Elementi
Gli elementi supportati sono i seguenti
- Elementi Contenitori
  - Form
  - Sezione
  - Colonna
- Elementi Base
  - FormElement
  - JogetRadio
  - SelectBox
  - Checkbox
  - Textfield
  - Textarea
  - Datapicker
  - HiddenField
- Elementi Custom
  - Empty
  - AlfrescoButton
-  Validatori
  - JogetValidator
  - JogetValidatorProperties
- Opzioni
  - Option
  - OptionBinder

## Esempio
[Vedi il file di esempio](example.md)
# Licenza

## Dettaglio Licenza
La licenza per questo repository &egrave; una `Apache License 2.0`.
All'interno del file [LICENSE](./LICENSE) sono presenti le informazioni
specifiche.

## Contributori

Qui c'&egrave; una lista di contributori. Grazie per essere partecipi nel
miglioramento del progetto giorno dopo giorno!

<a href="https://github.com/sinetinformatica/php-joget-form-json">
  <img
  src="https://contributors-img.web.app/image?repo=sinetinformatica/php-joget-form-json"
  />
</a>
