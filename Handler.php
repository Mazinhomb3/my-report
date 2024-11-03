
<?php

class Handler
{
    public static function arrayHandler()
    {
       
        $a = [];

        $a['usuario'] = $_POST['usuario'];
        $a['id-celula'] = $_POST['id-celula'];
        $a['mtp'] = $_POST['mtp'];
        $a['mcp'] = $_POST['mcp'];
        $a['cp'] = $_POST['cp'];
        $a['cria'] = $_POST['cria'];
    
        

        
    return $a;
}
}
