<?php

class ProfesoresController extends AppController
{
    public function index($page=1){
        view::template('pantalla1');
        $this->titulo ="profesores";
        $profesor =  new Profesores();
        $this->listaProfesores = $profesor->getProfesores($page);
    }
    public function registro(){
        view::template('pantalla1');
        $this->titulo ="Registro de profesores";
    }
    public function create(){
        $this->titulo = "registro de profesores";
        view::template('pantalla1');
        if(Input::hasPost('profesores')){
            $profesor = new Profesores(Input::post('profesores'));
            if (!$profesor->create()){
                Flash::valid ("creado exitosamente");
                Input::delete();
                return;
            }
            Flash::error("Fallo la operación");
        }
    }
        
}