# Update Work

Update the Work.

**URL** : `/api/works/:pk/`

**Method** : `PUT`

**Auth required** : YES

**Data example** Partial data is allowed, but the method need to be `PATCH`.

**Body**

```json
{   
    "title": "A Office Updated",
}
 ```

## Success Responses

**Code** : `200 OK`

**Content example** :

```json
{
    "id": 123,
    "title": "A Office Updated",
}
```

## Error Response

**Condition** : Work does not exist at URL

**Code** : `404 NOT FOUND`

**Content** : `{}`