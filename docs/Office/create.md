# Create Office

Create an Office that can operate some files.

**URL** : `/api/offices/`

**Method** : `POST`

**Auth required** : YES

**Permissions required** : None

**Data constraints**

## Success Response

**Code** : `201 CREATED`

**Content example**

```json
{
    "id": 123,
    "name": "A Office",
}
```

## Error Responses

**Condition** : If Account already exists for User.

**Code** : `303 SEE OTHER`

**Headers** : `Location: http://testserver/api/accounts/123/`

**Content** : `{}`

### Or

**Condition** : If fields are missed.

**Code** : `400 BAD REQUEST`

**Content example**

```json
{
    "name": [
        "This field is required."
    ]
}
```