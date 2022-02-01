# Show all Files

Show all Files.

**URL** : `/api/files/`

**Method** : `GET`

**URL Query Parameters** :

    * office   : [ office name ]
    * category : [ office work category ]
    * year     : [ file create year ]
    * month    : [ file create month ]
*Notes* : If you give wrong query parameters, you will get 400 BAD REQUEST.

**Auth required** : YES

## Success Responses

**Code** : `200 OK`

**Content** :

```json
[
    {
        "id": 123,
        "name": "New file 1",
        "file": "officefiles/Document.pdf",
        "upload_date": "2020-05-11",
        "work_id": 1,
    },
    {
        "id": 123,
        "name": "New file 1",
        "file": "officefiles/Document.pdf",
        "upload_date": "2020-05-11",
        "work_id": 1,
    },
    {
        "id": 123,
        "name": "New file 1",
        "file": "officefiles/Document.pdf",
        "upload_date": "2020-05-11",
        "work_id": 1,
    }
]
```