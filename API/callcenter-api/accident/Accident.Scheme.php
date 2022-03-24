<?php

    trait AccidentScheme
    {

        public static $MESSAGE = [
            'code' => 403,
            'success' => false,
            'msg' => "Some Parameter is Wrong"
        ];

        public static function Create()
        {

            if( !require_fields(
                    [
                        "event_id",
                        "bu",
                        "cust_number",
                        "cust_name",
                        "substation",
                        "feeder",
                        "tp",
                        "event_date",
                        "enter_date",
                    ]
                )
            ) {
                self::$MESSAGE = REQUIRED_FIELDS;
                return false;
            }

            return true;

        }

        public static function Update()
        {

            if( !require_fields(
                    [
                        "event_id",
                        "bu",
                        "cust_number",
                        "cust_name",
                        "substation",
                        "feeder",
                        "tp",
                        "event_date",
                        "enter_date",
                        "id"
                    ]
                )
            ) {
                self::$MESSAGE = REQUIRED_FIELDS;
                return false;
            }

            return true;

        }

        public static function Delete()
        {

            if( !require_fields(["id"]) ) {
                self::$MESSAGE = REQUIRED_FIELDS;
                return false;
            }

            return true;

        }

    }