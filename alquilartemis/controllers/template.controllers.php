<?php 
class TemplateControllers{
    public function index($include){
        header('Location: '.$include);
    }
    public function template($include){
        require"$include";
    }
}
?>