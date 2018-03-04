<?php
    /**
     * NonDB - A NoSQL Database
     * 
     * This Program licensed under MIT.
     * Use it under the Law and the License.
     * 
     * @author Tianle Xu<xtl@xtlsoft.top>
     * @package NonDB
     * @license MIT
     * @category database
     * @link https://github.com/xtlsoft/NonDB/
     * 
     */

    namespace NonDB\Components;

    trait Data {

        /**
         * Data
         * 
         * @var mixed $data
         * 
         */
        public $data;
        protected $key;

        public function get($key) {return $this->__get($key);}
        public function set($key, $val) {$this->__set($key, $val); return $this;}
        public function unset($key) {$this->__unset($key); return $this;}

        /**
         * Get the data
         *
         * @param mixed $key
         * 
         * @return mixed
         * 
         */
        public function __get($key){

            if(is_array($this->data[$key])){
                return (new \NonDB\Data($this->data[$key], $key))->setParent($this);
            }else{
                return $this->data[$key];
            }

        }

        /**
         * Unset A Key
         *
         * @param mixed $key
         * 
         */
        public function __unset($key){

            unset($this->data[$key]);

        }

        /**
         * Set the data
         *
         * @param mixed $key
         * @param mixed $val
         * 
         */
        public function __set($key, $val){
            
            if($val instanceof \NonDB\Data){
                $val = $val->getArray();
            }

            $this->data[$key] = $val;

        }

        /**
         * Get the array.
         *
         * @return array
         * 
         */
        public function getArray(){

            return $this->data;

        }
        
        /**
         * Make it countable.
         * 
         * @return int
         * 
         */
        public function count(){
            
            return count($this->data);
            
        }

        /**
         * Create a data collection
         *
         * @param string $name
         * 
         * @return \NonDB\Data
         * 
         */
        public function create($name){

            $this->data[$name] = [];

            return $this->{$name};

        }

        /**
         * Get one of the data.
         *
         * @return \NonDB\data
         * 
         */
        public function findOne(){

            foreach($this->data as $k=>$v){
                $key = $k;
                break;
            }

            if(is_array($this->data[$key])){
                return (new \NonDB\Data($this->data[$key], $key))->setParent($this);
            }else{
                return $this->data[$key];
            }

        }
        
        /**
         * Find something
         *
         * @param Callable $rule
         * 
         * @return array
         * 
         */
        public function find($rule){

            $r = [];

            foreach($this->data as $k=>$v){
                if($rule($this->{$k})){
                    $r[] = $this->{$k};
                }
            }

            return $r;

        }

        /**
         * Find something by the key
         *
         * @param Callable $rule
         * 
         * @return array
         * 
         */
        public function findByKey($rule){

            $r = [];

            foreach($this->data as $k=>$v){
                if($rule($k)){
                    $r[] = $this->{$k};
                }
            }

            return $r;

        }

        /**
         * Sort The Data
         * 
         * @param Callable $rule
         * @param string $algorithm
         * 
         * @throws \NonDB\Exceptions\DataException
         * 
         * @return \NonDB\Data
         * 
         */
        public function sort($rule, $algorithm = "DefaultSort"){

            $class = "\\NonDB\\Sorter\\" . $algorithm;

            if(!class_exists($class) || !( \NonDB\Components\Tool::checkImplement($class, "NonDB\\Interfaces\\Sorter") )){
                throw new \NonDB\Exceptions\DataException("Sorter $class didn't exists.", "0011");
                return false;
            }

            $sorter = eval("return new ". $class . "(\$rule);");

            $sorted = $sorter->sort($this->getArray());

            $result = (new \NonDB\Data($sorted, $this->key))->setParent($this->parent);

            return $result;

        }

        /**
         * Dump It!
         *
         * @param int $type
         * 
         * @return mixed
         * 
         */
        public function dump($type = \NonDB\Components\Dump::DUMP_VAR_DUMP){

            return \NonDB\Components\Dump::dump($this->getArray(), $type);

        }

    }
