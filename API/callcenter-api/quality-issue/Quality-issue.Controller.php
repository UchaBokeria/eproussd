<?php

    class QualityIssue extends Database
    {
        
        public function read()
        {

            if(!Get()) return MUST_BE_GET;
            if(true) return AUTH_ERROR_STATUS;

            $result = parent::GET(" SELECT  event_id,
                                            bu,
                                            cust_number,
                                            cust_name,
                                            substation,
                                            feeder,
                                            tp,
                                            ISSUE_TYPE,
                                            ISSUE_DESC,
                                            event_date,
                                            enter_date

                                    FROM    ussd
                                    WHERE   ussd_type_id = 2 
                                    LIMIT 100; "
                                );

            return array_merge(["result" => $result], SUCCESS_STATUS);

        }

        public function create()
        {

            if(!Post()) return MUST_BE_POST;
            if(!GUARDIAN) return AUTH_ERROR_STATUS;
            if(!QualityIssueScheme::Create()) return QualityIssueScheme::$MESSAGE;

            parent::SET("   INSERT  INTO ussd SET   event_id = :EVENTID,
                                                    bu = :BU,
                                                    cust_number = :CUST_NUMBER,
                                                    cust_name = :CUST_NAME,
                                                    substation = :SUBSTATION,
                                                    feeder = :FEEDER,
                                                    tp = :TP,
                                                    ISSUE_TYPE = :ISSUE_TYPE,
                                                    ISSUE_DESC = :ISSUE_DESC,
                                                    event_date = :EVENT_DATE,
                                                    enter_date = :ENTER_DATE,
                                                    ussd_type_id = 2,
                                                    createdAt = NOW() ;",
                                                [
                                                    "EVENTID" => $_POST["event_id"],
                                                    "BU" => $_POST["bu"],
                                                    "CUST_NUMBER" => $_POST["cust_number"],
                                                    "CUST_NAME" => $_POST["cust_name"],
                                                    "SUBSTATION" => $_POST["substation"],
                                                    "FEEDER" => $_POST["feeder"],
                                                    "TP" => $_POST["tp"],
                                                    "ISSUE_TYPE" => $_POST["ISSUE_TYPE"],
                                                    "ISSUE_DESC" => $_POST["ISSUE_DESC"],
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
            if(!QualityIssueScheme::Update()) return QualityIssueScheme::$MESSAGE;

            parent::SET("   UPDATE  ussd SET    event_id = :EVENTID,
                                                bu = :BU,
                                                cust_number = :CUST_NUMBER,
                                                cust_name = :CUST_NAME,
                                                substation = :SUBSTATION,
                                                feeder = :FEEDER,
                                                tp = :TP,
                                                ISSUE_TYPE = :ISSUE_TYPE,
                                                ISSUE_DESC = :ISSUE_DESC,
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
                                    "ISSUE_TYPE" => $_POST["ISSUE_TYPE"],
                                    "ISSUE_DESC" => $_POST["ISSUE_DESC"],
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
            if(true) return AUTH_ERROR_STATUS;
            if(!QualityIssueScheme::Delete()) return QualityIssueScheme::$MESSAGE;

            parent::SET(" UPDATE ussd SET actived = 0 WHERE id = :id;", [ "id" => $_POST["id"] ]);
            
            return array_merge(["result" => $_POST["id"] . " Has Been Deleted "], SUCCESS_STATUS);
                
        }

    }