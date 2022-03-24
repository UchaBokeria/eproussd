<?php

    class Accident extends Database
    {
        
        public function read()
        {

            if(!Get()) return MUST_BE_GET;
            if(!GUARDIAN) return AUTH_ERROR_STATUS;

            $result = parent::GET(" SELECT  event_id,
                                            bu,
                                            cust_number,
                                            cust_name,
                                            substation,
                                            feeder,
                                            tp,
                                            event_date,
                                            enter_date

                                    FROM    ussd
                                    WHERE   ussd_type_id = 1 
                                    LIMIT 100; "
                                );

            return array_merge(["result" => $result], SUCCESS_STATUS);

        }

        public function create()
        {

            if(!Post()) return MUST_BE_POST;
            if(!GUARDIAN) return AUTH_ERROR_STATUS;
            if(!AccidentScheme::Create()) return AccidentScheme::$MESSAGE;

            parent::SET("   INSERT  INTO ussd SET   event_id = :EVENTID,
                                                    bu = :BU,
                                                    cust_number = :CUST_NUMBER,
                                                    cust_name = :CUST_NAME,
                                                    substation = :SUBSTATION,
                                                    feeder = :FEEDER,
                                                    tp = :TP,
                                                    event_date = :EVENT_DATE,
                                                    enter_date = :ENTER_DATE,
                                                    ussd_type_id = 1,
                                                    createdAt = NOW()  ;",
                                                [
                                                    "EVENTID" => $_POST["event_id"],
                                                    "BU" => $_POST["bu"],
                                                    "CUST_NUMBER" => $_POST["cust_number"],
                                                    "CUST_NAME" => $_POST["cust_name"],
                                                    "SUBSTATION" => $_POST["substation"],
                                                    "FEEDER" => $_POST["feeder"],
                                                    "TP" => $_POST["tp"],
                                                    "EVENT_DATE" => $_POST["event_date"],
                                                    "ENTER_DATE" => $_POST["enter_date"]
                                                ]
                                            );

            return array_merge(["result" => "#" . parent::GetLastId() . " Has Been Inserted"], SUCCESS_STATUS);

        }

        public function update()
        {

            if(!Post()) return MUST_BE_POST;
            if(!GUARDIAN) return AUTH_ERROR_STATUS;
            if(!AccidentScheme::Update()) return AccidentScheme::$MESSAGE;

            parent::SET("   UPDATE  ussd SET    event_id = :EVENTID,
                                                bu = :BU,
                                                cust_number = :CUST_NUMBER,
                                                cust_name = :CUST_NAME,
                                                substation = :SUBSTATION,
                                                feeder = :FEEDER,
                                                tp = :TP,
                                                event_date = :EVENT_DATE,
                                                enter_date = :ENTER_DATE,
                                                updatedAt = NOW()   
                            WHERE   id = :id;",
                                [
                                    "EVENTID" => $_POST["event_id"],
                                    "BU" => $_POST["bu"],
                                    "CUST_NUMBER" => $_POST["cust_number"],
                                    "CUST_NAME" => $_POST["cust_name"],
                                    "SUBSTATION" => $_POST["substation"],
                                    "FEEDER" => $_POST["feeder"],
                                    "TP" => $_POST["tp"],
                                    "EVENT_DATE" => $_POST["event_date"],
                                    "ENTER_DATE" => $_POST["enter_date"],
                                    "id" => $_POST["id"]
                                ]
                        );

            return array_merge(["result" => "#" . $_POST["id"] . " Has Been Updated "], SUCCESS_STATUS);

        }

        public function delete()
        {
            
            if(!Post()) return MUST_BE_POST;
            if(false) return AUTH_ERROR_STATUS;
            if(!AccidentScheme::Delete()) return AccidentScheme::$MESSAGE;

            parent::SET(" UPDATE ussd SET actived = 0 WHERE id = :id;", [ "id" => $_POST["id"] ]);

            return array_merge(["result" => $_POST["id"] . " Has Been Deleted "], SUCCESS_STATUS);
                
        }

    }