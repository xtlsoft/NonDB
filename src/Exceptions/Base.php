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

    trait Base {

        /**
         * Get the type of the exception.
         *
         * @return string
         * 
         */
        public function getExceptionType(){

            return $this->type;

        }

    }
