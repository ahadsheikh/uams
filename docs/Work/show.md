# Show Single Work

Show a single Work.

**URL** : `/api/works/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the Office on the
server.

**Method** : `GET`

**Auth required** : YES

## Success Response

**Code** : `200 OK`

**Content example**

```json
{
    "id": 345,
    "title": "A office",
}
```

## Error Responses

**Condition** : If Work does not exist with `id` of provided `pk` parameter.

**Code** : `404 NOT FOUND`

**Content** : `{}`