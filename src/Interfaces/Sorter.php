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

    namespace NonDB\Interfaces;

    /**
     * Sorter Interface
     * 
     * @method void __construct()
     * @method mixed sort()
     * 
     */
    interface Sorter {

        /**
         * Constructor
         *
         * @param Callable $rule
         * 
         */
        public function __construct(Callable $rule);

        /**
         * Sort it.
         *
         * @param mixed $data
         * 
         * @return mixed
         * 
         */
        public function sort($data);

    }