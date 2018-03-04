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

    namespace NonDB\Sorter;

    class DefaultSort implements \NonDB\Interfaces\Sorter {

        /**
         * Rule
         *
         * @var Callable
         */
        protected $rule;

        /**
         * Constructor
         *
         * @param Callable $rule
         * 
         * @return void
         * 
         */
        public function __construct($rule){

            $this->rule = $rule;

        }

        /**
         * Sort it.
         *
         * @param mixed $data
         * 
         * @return mixed
         * 
         */
        public function sort($data){

            uasort($data, $this->rule);

            return $data;

        }

    }