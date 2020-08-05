<?php

    class App{

        protected $controller = 'Home';
        protected $method = 'index';
        protected $params = [];


        // ini untuk memamnggil controller 
        public function __construct()
        {
            $url = $this->parse_url(); // ini untuk set variable url dengan array dari url
            if(file_exists('../app/controllers/'.$url[0].'.php')){ // ini untuk mengtahui apa ada folder dan file 
                // di dalam app controllers
                $this->controller=$url[0]; // ini untuk set controller jika ada
                unset($url[0]);// dan mengapus array controller di url
            }

            require_once '../app/controllers/'.$this->controller.'.php'; // ini untuk memanggil class controller 
            $this->controller = new $this->controller; // ini untuk instansiasai

            //method
            if(isset($url[1])){
                if(method_exists($this->controller,$url[1])){
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            // kelola marameter
            if(!empty($url)){
                $this->params=array_values($url);
            }

            // jalankan controller dan method dan kirimkan params jika ada
            call_user_func_array([$this->controller,$this->method],$this->params);

        }

        public function parse_url(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'],'/'); // ini untuk mengilangkan slash di akhir url
                $url = filter_var($url,FILTER_SANITIZE_URL); // ini untuk menfilter agar tidak ada char aneh di url
                $url = explode('/',$url); // ini untuk memisahkan url dengan delimiter /
                return $url;
            }
        }
    }