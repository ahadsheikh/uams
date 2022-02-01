# Create Daakfile

Create an daakfiles that can operate some daakfiless.

**URL** : `/api/daakfiless/`

**Method** : `POST`

**Auth required** : YES

**Body**

```json
{
    "name": "New daakfiles 1",
    "file": "officedaakfiless/Document.pdf",
    "upload_date": "2020-05-11",
    "message": "Some message",
    "owner": "CEO",
}
```
note: `name` is optional. if you not give name then filename wil be used.

## Success Response

**Code** : `201 CREATED`

**Content example**

```json
{
    "id": 123,
    "name": "New daakfiles 1",
    "file": "officedaakfiless/Document.pdf",
    "upload_date": "2020-05-11",
    "message": "Some message",
    "owner": "CEO",
}
```

## Error Responses

**Condition** : If fields are missed.

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
    "message": "The given data was invalid.",
    "errors": {
        "file": [
            "The file field is required."
        ],
        "upload_date": [
            "The upload date field is required."
        ],
        "message": [
            "The message field is required."
        ],
        "owner": [
            "The owner field is required."
        ]
    }
}
```