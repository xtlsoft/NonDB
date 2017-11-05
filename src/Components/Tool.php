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

    class Tool {

        /**
         * Check the class implement
         *
         * @param mixed $class
         * @param string $interface
         * 
         * @return void
         * 
         */
        public static function checkImplement($class, string $interface){
            $ref = new \ReflectionClass($class);
            $names = $ref->getInterfaceNames();
            if(in_array($interface, $names)){
                return true;
            }else{
                return false;
            }
        }

    }