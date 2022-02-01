# Show all Daakfile

Show all daakfiles.

**URL** : `/api/daakfiles/`

**Method** : `GET`

**URL Query Parameters** :

    * owner    : [ owner of the file ]
    * year     : [ daakfile create year ]
    * month    : [ daakfile create month ]
*Notes* : If you give wrong query parameters, you will get 400 BAD REQUEST.

**Auth required** : YES

## Success Responses

**Code** : `200 OK`

**Content** :

```json
[
    {
        "id": 1,
        "name": "Daakfile 1",
        "file": "daakfiles/Document.pdf",
        "upload_date": "2020-05-04",
        "message": "This is a new file",
        "owner": "CEO",
        "created_at": "2022-02-01T08:29:56.000000Z",
        "updated_at": "2022-02-01T08:29:56.000000Z"
    },
    {
        "id": 2,
        "name": "Daakfile 2",
        "file": "daakfiles/Document.pdf",
        "upload_date": "2020-05-04",
        "message": "This is a new file",
        "owner": "CEO",
        "created_at": "2022-02-01T08:29:56.000000Z",
        "updated_at": "2022-02-01T08:29:56.000000Z"
    }
]
```