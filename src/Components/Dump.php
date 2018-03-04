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

    class Dump {

        /**
         * Constants
         * 
         */
        const DUMP_JSON = 9000;
        const DUMP_JSON_PRETTY = 9001;
        const DUMP_XML = 9010;
        const DUMP_VAR_EXPORT = 9020;
        const DUMP_VAR_DUMP = 9030;
        const DUMP_SERIALIZE = 9040;

        /**
         * Dump it!
         *
         * @param array $data
         * @param int $type
         * 
         * @return mixed
         * 
         */
        public static function dump($data, $type = self::DUMP_VAR_DUMP){

            switch($type){

                case self::DUMP_JSON:
                    return json_encode($data);
                case self::DUMP_JSON_PRETTY:
                    return json_encode($data, JSON_PRETTY_PRINT);
                case self::DUMP_VAR_EXPORT:
                    return var_export($data);
                case self::DUMP_VAR_DUMP:
                    return var_dump($data);
                case self::DUMP_XML:
                    return self::arrayToXML($data);
                case self::DUMP_SERIALIZE:
                    return serialize($data);

            }

        }

        /**
         * Turn array to XML
         *
         * @param array $data
         * @param \SimpleXMLElement &$xml
         * 
         * @return string
         * 
         */
        protected static function arrayToXML($data, &$xml = null){

            if($xml === null)
                $xml = new \SimpleXMLElement("<?xml version=\"1.0\"?><nondb></nondb>");
            foreach($data as $k=>$v){
                if(is_array($v)){
                    $sub = $xml->addChild("$k");
                    self::arrayToXML($v, $sub);
                }else{
                    $xml->addChild("$k", htmlspecialchars("$v"));
                }
            }

            return $xml->asXML();

        }

    }
