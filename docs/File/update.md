# Update File

Update the File.

**URL** : `/api/files/:pk/`

**Method** : `PUT`

**Auth required** : YES

**Data example** Partial data is allowed, but the method need to be `PATCH`.

**Body**

```json
{
    "name": "New file 1",
    "upload_date": "2020-05-11",
}
 ```

## Success Responses

**Code** : `200 OK`

**Content example** :

```json
{
    "id": 123,
    "name": "New file 1",
    "file": "officefiles/Document.pdf",
    "upload_date": "2020-05-11",
    "File_id": 1,
}
```

## Error Response

**Condition** : File does not exist at URL

**Code** : `404 NOT FOUND`

**Content** : `{}`