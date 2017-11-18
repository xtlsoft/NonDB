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

    trait ArrayAccess {

        /**
         * Check whether an offset defined
         *
         * @param mixed $offset
         * 
         * @return bool
         * 
         */
        public function offsetExists ( $offset ){
            return isset($this->data[$offset]);
        }

        /**
         * Get the value
         *
         * @param mixed $offset
         * 
         * @return mixed
         * 
         */
        public function offsetGet ( $offset ) {

            return $this->data[$offset];

        }

        /**
         * Set the value
         *
         * @param mixed $offset
         * @param mixed $value
         * 
         * @return void
         * 
         */
        public function offsetSet ( $offset , $value ){
            if($value instanceof \NonDB\Data){
                $value = $value->getArray();
            }
            $this->data[$offset] = $value;
        }
        
        /**
         * Unset the data
         *
         * @param mixed $offset
         * 
         * @return void
         * 
         */
        public function offsetUnset ( $offset ){
            unset($this->data[$offset]);
        }

    }