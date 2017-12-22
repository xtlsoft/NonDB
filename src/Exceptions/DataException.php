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

    namespace NonDB\Exceptions;

    class DataException extends \Exception {
        
        use \NonDB\Exceptions\Base;

        /**
         * Type of the exception.
         *
         * @var string
         * 
         */
        protected $type = "DataException";

    }