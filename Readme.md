# 303 Callapp API
## Accident
### Create
    url: /callcenter-api/accident/update
    method: POST
    header: 'Content-Type: application/json',
            'token: deda1781d6d6b5127796217275b6456e09ac2ed9ffa70bf79d9564d52b3cd5755b10fee38b3eca523765c9472c8455ba52d485078b6eb24628daf47e3fe163ad'
    body: 
        {
            "event_id": 2,
            "bu": "test",
            "cust_number": "Test Number",
            "cust_name": "Test",
            "substation": "Subst 312",
            "feeder": "Feeder 123123",
            "tp": "TP123",
            "event_date": "2022-01-01 00:32:33",
            "enter_date": "2022-01-01 00:32:33"

#

### Update
    url: /callcenter-api/accident/update
    method: POST
    header: 'Content-Type: application/json',
            'token: deda1781d6d6b5127796217275b6456e09ac2ed9ffa70bf79d9564d52b3cd5755b10fee38b3eca523765c9472c8455ba52d485078b6eb24628daf47e3fe163ad'
    body: 
        {
            "event_id": 2,
            "bu": "test",
            "cust_number": "Test Number",
            "cust_name": "Test",
            "substation": "Subst 312",
            "feeder": "Feeder 123123",
            "tp": "TP123",
            "event_date": "2022-01-01 00:32:33",
            "enter_date": "2022-01-01 00:32:33",
            "id": 19
        }

#
#

## Quality-issue
### Create
    url: /callcenter-api/Quality-issue/create
    method: POST
    header: 'Content-Type: application/json',
            'token: deda1781d6d6b5127796217275b6456e09ac2ed9ffa70bf79d9564d52b3cd5755b10fee38b3eca523765c9472c8455ba52d485078b6eb24628daf47e3fe163ad'
    body: 
        {
            "event_id": 2,
            "bu": "xxxx",
            "cust_number": "Test Number",
            "cust_name": "Test",
            "substation": "Subst 312",
            "feeder": "Feeder 123123",
            "tp": "TP123",
            "ISSUE_TYPE": "TEst",
            "ISSUE_DESC": "asdasd",
            "event_date": "2022-01-01 00:32:33",
            "enter_date": "2022-01-01 00:32:33"
        }
#

### Update
    url: /callcenter-api/accident/update
    method: POST
    header: 'Content-Type: application/json',
            'token: deda1781d6d6b5127796217275b6456e09ac2ed9ffa70bf79d9564d52b3cd5755b10fee38b3eca523765c9472c8455ba52d485078b6eb24628daf47e3fe163ad'
    body: 
        {
            "event_id": 2,
            "bu": "test",
            "cust_number": "Test Number",
            "cust_name": "Test",
            "substation": "Subst 312",
            "feeder": "Feeder 123123",
            "tp": "TP123",
            "ISSUE_TYPE": "TEst",
            "ISSUE_DESC": "asdasd",
            "event_date": "2022-01-01 00:32:33",
            "enter_date": "2022-01-01 00:32:33",
            "id": 19
        }