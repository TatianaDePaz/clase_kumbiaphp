<?php
    Load::models('alumnos');
class AlumnosController extends AppController
{
    public function index($page=1){
        view::template('pantalla1');
        $this->titulo ="listado alumnos";
        $alumno = new Alumnos();
        $this->listaAlumnos = $alumno->getAlumnos($page);
    }
     
    public function registro() {
        view::template('pantalla1');
        $this->titulo ="registro de alumnos";
    }
    public function create(){
        $this->titulo="registro Alumnos";
        view::template('pantalla1');
        if( Input::hasPost('alumnos')){
            $alumno = new Alumnos(Input::post('alumnos'));
            if(!$alumno->create()){
                Flash::valid ("creado exitosamente");
                Input::delate();
                return;
            }
            Flash::error("Fallo la operacion");
        }
    }
    public function edit($id){
       view::template('pantalla1');
        $alumno = new Alumnos(); 
        if(Input::hasPost('alumnos')){
            if(!$alumno->update(Input::post('alumnos'))){
                Flash::error("No se actualizo el registro");
            }else{
                Flash::valid("actualizado el alumno");
                return Redirect::to();
            }
        }else{
            $this->alumnos = $alumno->Find((int)$id);
        }   
    }
    public function del($id){
        $alumno = new Alumnos();
        if(!$alumno->delete ((int)$id)){
            Flash::error('Error al borrar el alumno');
        }else{
            Flash::valid("alumno borrado");
        }
        return Redirect::to();
    }
}