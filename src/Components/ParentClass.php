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

    trait ParentClass {

        /**
         * Parent Class
         *
         * @var mixed
         */
        private $parent;
        
        /**
         * Callback after set parentClass
         *
         * @var callable
         */
        private $parentCallback = null;

        /**
         * Set the parent
         *
         * @param mixed $parent
         * 
         * @return self
         * 
         */
        public function setParent($parent){

            $this->parent = $parent;

            if($this->parentCallback){
                call_user_func($this->parentCallback);
            }

            return $this;

        }

        /**
         * Set a callback
         *
         * @param Callable $callback
         * @param bool $force
         * 
         * @return self
         * 
         */
        public function setCallback(Callable $callback, bool $force = false){

            if($force || !$this->parentCallback){
                $this->parentCallback = $callback;
            }
            
            return $this;

        }

        /**
         * Get the parent
         *
         * @return mixed
         * 
         */
        public function parent(){

            return $this->parent;

        }

    }