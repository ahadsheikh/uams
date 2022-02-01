# Show Single Daakfile

Show a single Office.

**URL** : `/api/daakfiles/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the daakfile on the
server.

**Method** : `GET`

**Auth required** : YES

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "id": 1,
    "name": "Daakfile 1",
    "file": "daakfiles/Document.pdf",
    "upload_date": "2020-05-04",
    "message": "This is a new file",
    "owner": "CEO",
    "created_at": "2022-02-01T08:29:56.000000Z",
    "updated_at": "2022-02-01T08:29:56.000000Z"
}
```

## Error Responses

**Condition** : If daakfile does not exist with `id` of provided `pk` parameter.

**Code** : `404 NOT FOUND`

**Content** : `{}`