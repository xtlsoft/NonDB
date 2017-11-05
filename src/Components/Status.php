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

    class Status {

        /**
         * Status
         *
         * @var mixed
         * 
         */
        public $status;

        /**
         * Message
         *
         * @var string
         * 
         */
        public $msg;

        /**
         * Constructor
         *
         * @param mixed $status
         * @param string $msg
         * 
         */
        public function __construct($status, string $msg = ""){
            $this->status = $status;
            $this->msg = $msg;
        }

    }