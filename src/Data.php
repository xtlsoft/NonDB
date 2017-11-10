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

    class Data {

        use \NonDB\Components\ParentClass;
        use \NonDB\Components\Data;

        /**
         * Constructor
         *
         * @param mixed $data
         * @param mixed $key
         * 
         */
        public function __construct($data, $key){

            $this->data = $data;
            $this->key = $key;

        }

        /**
         * Save the data
         *
         * @return self
         */
        public function save(){

            $this->parent->__set($this->key, $this->data);
            $this->parent->save();

            return $this;

        }

    }