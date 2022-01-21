# Create Work

Create an Work that can operate some files.

**URL** : `/api/works/`

**Method** : `POST`

**Auth required** : YES

**Body**

```json
{
    "title": "New Work",
}
```

## Success Response

**Code** : `201 CREATED`

**Content example**

```json
{
    "id": 123,
    "title": "New Work",
}
```

## Error Responses

**Condition** : If fields are missed.

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
    "title": [
        "This field is required."
    ]
}
```