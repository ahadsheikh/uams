# Create Work

Create an Work that can operate some files.

**URL** : `/api/works/`

**Method** : `POST`

**Auth required** : YES

**Data constraints**

If you give a office and a work title that exists, you will get a existence error.

**Body**

```json
{
    "title": "New Work",
    "type": "A Office",
}
```

## Success Response

**Code** : `201 CREATED`

**Content example**

```json
{
    "id": 123,
    "title": "New Work",
    "type": "A Office",
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
    ],
    "type": [
        "This field is required."
    ]
}
```