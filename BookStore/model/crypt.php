<?php 

class Crypt {

        private $key;
        private $ivs;
        private $iv;
        private $cipher;
        private $mode;
        
        public function __construct() {
                $this->cipher = MCRYPT_RIJNDAEL_128;
                $this->mode = MCRYPT_MODE_CBC;
                $this->key = sha1('triplede', true);                
                $this->ivs = mcrypt_get_iv_size($this->cipher, $this->mode);
                $this->iv = mcrypt_create_iv($this->ivs);
        }
        
        public function encrypt($data) {
                $data = mcrypt_encrypt($this->cipher, $this->key, $data, $this->mode, $this->iv);
                $data = base64_encode($data);
                return $data;
        }
        
        public function decrypt($data) {
                $data = base64_decode($data);
                $data = mcrypt_decrypt($this->cipher, $this->key, $data, $this->mode, $this->iv);                
                return $data;
        }


}

?>