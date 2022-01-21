# Create File

Create an File that can operate some files.

**URL** : `/api/files/`

**Method** : `POST`

**Auth required** : YES

**Body**

```json
{
    "name": "New file 1",
    "file": "officefiles/Document.pdf",
    "upload_date": "2020-05-11",
    "work_id": 1,
}
```

## Success Response

**Code** : `201 CREATED`

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

**Condition** : If fields are missed.

**Code** : `400 BAD REQUEST`

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