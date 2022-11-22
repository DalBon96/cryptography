<?php
error_reporting(E_ALL ^ E_WARNING ^ E_NOTICE ^ E_DEPRECATED);
//PROGRAMMA PER FARE IL MENU
class menu{

    private $menu; //VARIABILE D'AMBIENTE
    //creo un array per i menu
    //array multidimensionali

    function root(){
        ////////////////LIVELLO 0/////////////////////////////////////////////////////
        $this->menu[1]=array(
            "id_padre"=>0,
            "titolo"=>"MENU PRINCIPALE",
            //sotto array con le varie opzioni

            array(
                'indicefiglio' => 2,
                'opzione'=>'Scrivi testo'
            ),
            array(
                'indicefiglio' => 3,
                'opzione'=>'Decripta un testo'
            ),
            array(
                'indicefiglio' => 4,
                'opzione'=>'Lista testi'
            ),
        );

        ////////////////LIVELLO 1/////////////////////////////////////////////////////
        $this->menu[1]=array(
            "id_padre"=>1,
            "titolo"=>"MENU PRINCIPALE",
            //sotto array con le varie opzioni

            array(
                'indicefiglio' => 2,
                'opzione'=>'Scrivi testo'
            ),
            array(
                'indicefiglio' => 3,
                'opzione'=>'Decripta un testo'
            ),
            array(
                'indicefiglio' => 4,
                'opzione'=>'Lista testi'
            ),
        );
    }


}
$menu = new menu();
?>