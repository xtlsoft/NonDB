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

    class NaturalSort implements \NonDB\Interfaces\Sorter {

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

            $rule = call_user_func($this->rule);
            if($rule === "desc"){
                arsort($data, SORT_NATURAL);
            }else{
                asort($data, SORT_NATURAL);
            }

            return $data;

        }

    }