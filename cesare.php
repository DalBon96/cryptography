<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);
//CIFRARIO DI CESARE
class cesare{ //classe Cesare

//////////////////////////////////////////////////////////
//Testo CHIARO -------> TESTO CIFRATO -------> Testo CHIARO
//variabile $text-------> variabile $crypto-------> variabile.....//ANCORA DA SCEGLIERE
/////////////////////////////////////////////////////////

    public $code;//per inserire il numero
    //N. volte da spostare l'alfabeto

    public $text;//scrivere il testo
    //VARIABILE SOTTO per trasformare il TESTO: $text
    //                                   ARRAY:$arr_text[$text]

    public $arr_text; //VARIABILE D'AMBIENTE
    //per trasformare il testo scritto in array

    public $arr_text_2; //VARIABILE D'AMBIENTE
    //per trasformare il testo scritto in array

    public $directory; //random nomi

    public $crypto; ////VARIABILE D'AMBIENTE
    //testo CIFRATO-----cioè convertito e traslato in codie ASCII

function intro(){
    $b="\n\n";
    $b.=" _____________________________________\n";
    $b.="|►INTRODUZIONE AL CIFRARIO DI CESARE◄ |\n";
    $b.="|inserire un numero tra (1-10)        |\n";
    $b.="|per spostare il testo criptato..     | \n";
    $b.="|_____________________________________|";
    $b.="\n\n";
    echo $b;
    //$this->insert_code();
    
}

function insert_code(){ //con questa funzione sposto l'alfabeto di TOTO numeri
    $this->code=max(1,10);
    
   do{
        $this->code=readline("│Valore tra 1-10....."); //codice con all'interno il numero

        if($this->code>10 || $this->code<1){
            echo "ERRORE...RIPROVARE.....\n";
        }else{
            echo "│Hai scelto ► $this->code\n";
            echo "│Desideri continuare ?\n";
            echo "│►Si_(1)  ►No_(0)\n";

            //MINI MENU/////////////////////////////////////////
            $n=readline("....► ");
            switch($n!="0"){
                case "1": //questo comando mi manda alla funzione di scrittura del testo
                            $this->insert_text($this->code);
                            
                    break;
                case "0":   echo "Ritorno al menu di selezione del Valore...\n";
                            echo $this->insert_code();//ritorno al menu di selezione del numero
                    break;
                default: echo "Comando sbagliato....RIPROVARE...\n";
            }
            /////////////////////////////////////////
        }
    } while($this->code>10 || $this->code<1);

}
////////////////////////////////////////////////////////
//METODO PER GENERARE UN ARRAY CASUALE
function RandomDirectory(){
    $this->directory=array("ECHO","ALFA","GAMMA","OMEGA","ZURIGO");
    $k = array_rand($this->directory);
    $v = $this->directory[$k];
    return $v;
    }
/////////////////////////////////////////////////////////

function insert_text($code2){

    $a="\n";
    $a.="│Valore di SPOSTAMENTO codice scelto,\n";
    $a.="│DIRETTIVA N: "."__► ".$this->RandomDirectory()."_".$code2." ◄__\n";
    $a.="│scrivere il testo criptato che desideri inviare,\n";
    $a.="│successivamente premere INVIO per confermare\n";
    $a.="│***\n\n";
    echo $a;

    //scrittura testo normale
    $this->text=readline("│Testo CHIARO►\n");
    //dopo viene cifrato
    $this->confirm_directory($this->text,$code2,$this->RandomDirectory());
    
    
}

function confirm_directory($text_upper,$code3,$directory){
    $text_upper2=strtoupper($text_upper); //da minuscolo a MAIUSCOLO
    //funzione strtoupper(testo_minuscolo)

    //conferma testo
    echo "\n\n│Confermare DIRETTIVA N: "."__► ".$directory."_".$code3." ◄__  ?\n". 
             "│► ".strtoupper($text_upper2)." ◄\n". //strtoupper(..) testo in maiuscolo
             "│►Si_(1)  ►No_(0)\n";
    $confirm = readline("   ");
    
    //piccolo menu di scelta
        switch($confirm!="0"){
            case "1":   //testo criptato con passaggio valore scelto
                        $this->crypto_text($text_upper2,$code3); //inserito ho il numero e il testo
                break;
            case "0":   echo "Ritorno al menu di selezione del Valore...\n";
                        echo $this->insert_text($code3);//ritorno al menu di selezione TESTO
                break;
                default: echo "Comando sbagliato....RIPROVARE...\n";
                        $this->confirm_directory($text_upper,$code3,$directory);

        }
}


/////METODO IMPORTANTE////////////////////////////////////////////////////////////////////////////
function crypto_text($choice_text,$choice_code){//funzione per trasformare il testo in array
    ///E ALTRO......

    //str_split($testo) mi trasforma il testo in un array
    //$this->arr_text = ARRAY che contiene il testo trasformato in ARRAY
    $this->arr_text=str_split($choice_text);

    //CICLO FOR
    /*for($i=0;$i<count($this->arr_text);$i++){
          echo $this->arr_text[$i]."--"; //lista testo ARRAY
          echo $ascii=ord($this->arr_text[$i])."--"; //lista array convertito codice numerico ASCII
          echo $conv=($ascii+$choice_code)."--"; //VARIABILE CREATA ALL'interno con Variabile $choice_code
          echo $this->crypto=chr($conv)."\n";//codice numerico ASCII convertito in testo CHIARO
        //CI SONO RIUSCITO
    }*/

    for($i=0;$i<count($this->arr_text);$i++){ //CICLO FOR CHE MI STAMPA IL TESTO CRIPTATO
        echo $this->crypto=chr((ord($this->arr_text[$i])+$choice_code)); //lista testo ARRAY
         //lista array convertito codice numerico ASCII
        //VARIABILE CREATA ALL'interno con Variabile $choice_code
        //codice numerico ASCII convertito in testo CHIARO
  }

   
    
}
////////////////////////////////////////////////////////////////////////////////////////////////////////


}
//istanzio l'oggetto
$cesare=new cesare();
//introduzione con testo
$cesare->intro();
//METODO con logiche
$cesare->insert_code();
?>
