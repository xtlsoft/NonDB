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

    namespace NonDB\Drivers;

    class LocalDriver implements \NonDB\Interfaces\Driver {

        /**
         * BaseDir
         *
         * @var string
         * 
         */
        protected $base = './data/';

        /**
         * Constructor
         *
         * @throws \NonDB\Exceptions\DriverException
         * @param string $param
         * 
         */
        public function __construct(string $param){

            if(is_dir($param))
                $this->base = $param;
            else
                throw new \NonDB\Exceptions\DriverException('Base Not Exists.', 1001);

        }

        /**
         * Get a table's data
         *
         * @param string $table
         * @param mixed $name = ""
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return mixed
         * 
         */
        public function getData(string $table, $name = ""){
            
            $file = $this->base . '/' . $table . '.json';
            if(file_exists($file)){
                return file_get_contents($file);
            }else{
                throw new \NonDB\Exceptions\DriverException('Table Not Exists.', 1002);
            }

        }
        
        /**
         * Set a table's data
         *
         * @param string $table
         * @param \NonDB\Components\Different $diff
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function setData(string $table, \NonDB\Components\Different $diff){
            
            

        }
        
        /**
         * Add a table
         *
         * @param string $name
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function newTable(string $name){
            
        }
        
        /**
         * Remove a table
         *
         * @param string $name
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function removeTable(string $name){

        }

    }