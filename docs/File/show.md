# Show Single File

Show a single Office.

**URL** : `/api/files/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the File on the
server.

**Method** : `GET`

**Auth required** : YES

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "id": 123,
    "name": "New file 1",
    "file": "officefiles/Document.pdf",
    "upload_date": "2020-05-11",
    "work_id": 1,
}
```

## Error Responses

**Condition** : If File does not exist with `id` of provided `pk` parameter.

**Code** : `404 NOT FOUND`

**Content** : `{}`