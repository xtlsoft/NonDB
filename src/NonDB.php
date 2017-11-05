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

    namespace NonDB;
    
    class NonDB {

        /**
         * NonDB Version
         */
        const VERSION = "0.1.0";

        /**
         * Create a driver
         *
         * @static
         * @param string $name Example: "Json:./data/"
         * @throws \NonDB\Exceptions\CoreException
         * @return \NonDB\Interfaces\Driver
         * 
         */
        public static function driver(string $name){

            //Get the name.
            $name = explode(':', $name);
            //Get the classname.
            $class = "\\NonDB\\Drivers\\" . $name[0];
            //Get the parameter.
            $param = $name[1];

            //See if the driver exists.
            if(!class_exists($class) || !( \NonDB\Components\Tool::checkImplement($class, "NonDB\\Interfaces\\Driver") )){
                throw new \NonDB\Exceptions\CoreException("Driver $class wasn't exists.", "0011");
                return false;
            }

            //Get driver.
            $driver = eval("return new $class(urldecode(\$param));");

            return $driver;

        }

        /**
         * Configure
         *
         * @var array
         * 
         */
        protected $config = [];
        
        /**
         * Constructor
         *
         * @param \NonDB\Interfaces\Driver $driver
         * @param array $config
         * 
         */
        public function __construct(\NonDB\Interfaces\Driver $driver, $config = []){

            $this->setDriver($driver);
            $this->config($config);

        }

        /**
         * Get the table.
         * 
         * @param string $table 
         * @return \NonDB\Table 
         * 
         */
        public function table(string $table = "default"){
            
            return new \NonDB\Table($table);

        }
        
        /**
         * Set The DB Driver
         *
         * @param \NonDB\Interfaces\Driver $driver
         * @return self
         * 
         */
        public function setDriver(\NonDB\Interfaces\Driver $driver){
            
            $this->driver($driver);

            return $this;

        }

        /**
         * Configure NonDB
         *
         * @param mixed $config
         * @param string $val
         * 
         * @return self
         * 
         */
        public function config($config, $val = ""){

            if(is_array($config)){
                $this->config = array_merge($this->config, $config);
            }else{
                $this->config[$config] = $val;
            }

            return $this;

        }

    }