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
         * Set the parent
         *
         * @param mixed $parent
         * 
         * @return self
         * 
         */
        public function setParent($parent){

            $this->parent = $parent;

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