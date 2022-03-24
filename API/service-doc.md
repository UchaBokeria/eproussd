# Call Center – USSD API
## POST: /callcenter-api/accident
### PARAMETERS:
    EVENTID – Number / required /
    BU – String / required / სერვის ცენტრი
    CUST_NUMBER – String / required / აბონენტის ნომერი
    CUST_NAME – String / required / აბონენტის სახელი
    SUBSTATION– String / required / ქვესადგური
    FEEDER – String / required / ფიდერი
    TP – String / required / ტრასფორმატორი
    EVENT_DATE – String / required / მოვლენის თარიღი (yyyy-mm-dd HH:MM:SS)
    ENTER_DATE – String / required / შენახვის თარიღი (yyyy-mm-dd HH:MM:SS)

### Success/ Error response:
    {"success": true}
    {"success": false, error: xxx}
    ERROR CODE:
    SYSTEM_ERROR = 999;

---

# POST: /callcenter-api/quality-issue
### PARAMETERS:
    EVENTID – Number / required
    BU – String / required / სერვის ცენტრი
    CUST_NUMBER – String / required / აბონენტის ნომერი
    CUST_NAME – String / required / აბონენტის სახელი
    SUBSTATION– String / required / ქვესადგური
    FEEDER – String / required / ფიდერი
    TP – String / required / ტრასფორმატორი
    ISSUE_TYPE – String / required / ტიპი
    ISSUE_DESC – String / required / არწერა
    EVENT_DATE – String / required / მოვლენის თარიღი (yyyy-mm-dd HH:MM:SS)
    ENTER_DATE – String / required / შენახვის თარიღი (yyyy-mm-dd HH:MM:SS)

### Success/ Error response:
    {"success": true}
    {"success": false, error: xxx}
    ERROR CODE:
    SYSTEM_ERROR = 999;