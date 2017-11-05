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
     * Driver Interface
     * 
     * @method mixed getData()
     * @method \NonDB\Components\Status setData()
     * @method \NonDB\Components\Status addTable()
     * @method \NonDB\Components\Status removeTable()
     * 
     */
    interface Driver {

        /**
         * Get a table's data
         *
         * @param string $table
         * @param mixed $name = ""
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return mixed
         * 
         */
        public function getData(string $table, $name = "");

        /**
         * Set a table's data
         *
         * @param string $table
         * @param \NonDB\Components\Different $diff
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function setData(string $table, \NonDB\Components\Different $diff);

        /**
         * Add a table
         *
         * @param string $name
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function newTable(string $name);

        /**
         * Remove a table
         *
         * @param string $name
         * @throws \NonDB\Exceptions\DriverException
         * 
         * @return \NonDB\Components\Status
         * 
         */
        public function removeTable(string $name);

    }