<?php



$map = [
  "App\\" => "src",
];




//class_name = App\Character;
spl_autoload_register(function ($class_name){
        $namespaceMatches = [];
        //["0" => 'appclass']
        preg_match('/(.)*\\\/', $class_name, $namespaceMatches);

        //reset array pointer en return value van eerste array value
        $namespace = reset($namespaceMatches);

        //$className = Character
        $className = str_replace($namespace, '', $class_name);

        //Indien er in onze $map array namespaces staan
        if(isset($map[$namespace])){

            //is mijn directory de namespace src\\
            $directory = $map[$namespace];

            //include src/character.php
            include $directory . DIRECTORY_SEPARATOR . $className . '.php';
        } else {
            throw new InvalidArgumentException("Could not load class" . $class_name);
        }
});


