
# Esempi
## Versione con add incrementali

Creo i contenitori e gli aggiungo gli elementi con funzioni di add

Istanzio una nuova form, sezione e colonna
```
$form = new Form ( "form_di_prova", "Form di Prova", "tabella_prova" );
$sezione = new Sezione ( "sezione1", "Dati Bambino" );
$colonna = new Colonna ();
```
Aggiungo i dati alla colonna
```
$nomeBambinoTextField = new Textfield ( "nome_bambino", "Nome Bambino", NULL );
$colonna->addElemento ( $nomeBambinoTextField );
$cognomeBambinoTextField = new Textfield ( "cognome_bambino", "Cognome Bambino", NULL );
$colonna->addElemento ( $cognomeBambinoTextField );
$dataNascitaBambino = new Datapicker ( "data_nascita", "Data nascita Bambino", NULL );
$colonna->addElemento ( $dataNascitaBambino );
```
Aggiungo la colonna alla sezione
```
$sezione->addColonna ( $colonna );
```
Aggiungo la colonna alla sezione
```
$form->addSezione ( $sezione );
```
Creo una nuova sezione e colonna, creo una selectbox con le opzioni e la aggiungo alla nuova colonna->sezione creata
```
$sezione = new Sezione ( "sezione2", "Dati Scuola" );
$colonna = new Colonna ();
$scuola = new SelectBox ( "scuola_frequentata", "Scuola Frequentata", NULL );
$scuola->addOpzione ( new Option ( "rodari", "Rodari" ) );
$scuola->addOpzione ( new Option ( "pascoli", "Pascoli" ) );

$colonna->addElemento ( $scuola );

$sezione->addColonna ( $colonna );
$form->addSezione ( $sezione );

$sezione = new Sezione ( "sezione2", "Dati Scuola" );
$colonna = new Colonna ();
$scuola = new SelectBox ( "scuola_frequentata", "Scuola Frequentata", NULL );
$scuola->addOpzione ( new Option ( "rodari", "Rodari" ) );
$scuola->addOpzione ( new Option ( "pascoli", "Pascoli" ) );

$colonna->addElemento ( $scuola );

$sezione->addColonna ( $colonna );
$form->addSezione ( $sezione );
```
## Versione con creazione in fase di construct
Creo in ordine ELEMENTI -> COLONNE -> SEZIONI -> FORM
```
$opzioni = array();
$elementi = array();
$colonne = array();
$sezioni = array();

$elementi[] = new Textarea("area_text","Note",NULL);

$opzioni[] = new Option ( "yes", "Accetto" ) ;
$opzioni[] = new Option ( "no", "Rifiuto" ) ;
$elementi[] = new JogetRadio("radio","Scelta",NULL,$opzioni);
$opzioni = array();

$colonne[] = new Colonna(Colonna::WIDTHFULLSIZE,$elementi);
$elementi = array();

$sezioni[] = new Sezione("sez1", "Dati",$colonne);
$colonne = array();

$opzioni[] = new Option ( "accetto", "Dichiaro di" ) ;
$elementi[] = new Checkbox("checkbox","Dichiarazioni",NULL,$opzioni);
$opzioni = array();

$opzioni[] = new Option ( "prescuola", "Pre scuola" ) ;
$opzioni[] = new Option ( "postscuola", "Post scuola" ) ;
$elementi[] = new Checkbox("checkbox","Scelte",NULL,$opzioni);
$opzioni = array();

$elementi[] = new AlfrescoButton("Apri Documentale da Form");

$colonne[] = new Colonna(Colonna::WIDTHFULLSIZE,$elementi);
$elementi = array();

$sezioni[] = new Sezione("sez2", "Altri Dati",$colonne);
$colonne = array();

$form2 = new Form ( "form_di_prova", "Form di Prova", "tabella_prova", $sezioni );
```
# Risultato
Esporto la struttura in json
```
echo"<pre>";
echo json_encode($form);
echo "</pre>";
echo"<hr>";
echo"<pre>";
echo json_encode($form2);
echo "</pre>";
```