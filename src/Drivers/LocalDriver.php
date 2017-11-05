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
                return json_decode(file_get_contents($file), true);
            }else{
                throw new \NonDB\Exceptions\DriverException('Table Not Exists.', 1002);
            }

        }
        
        /**
         * Set a table's data
         *
         * @param string $table
         * @param mixed[] $data
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function setData(string $table, $data){
            
            $file = $this->base . '/' . $table . '.json';
            if(file_exists($file)){
                if(file_put_contents($file, json_encode($data))){
                    $status = true;
                }else{
                    $status = false;
                }
                return new \NonDB\Components\Status($status);
            }else{
                throw new \NonDB\Exceptions\DriverException('Table Not Exists.', 1002);
            }

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
            
            $status = file_put_contents($file = $this->base . '/' . $name . '.json', "[]");

            return new \NonDB\Components\Status($status);

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

            $status = unlink($file = $this->base . '/' . $name . '.json');
            
            return new \NonDB\Components\Status($status);

        }

    }