# Update Daakfile

Update the daakfile.

**URL** : `/api/daakfiles/:pk/`

**Method** : `PUT`

**Auth required** : YES

**Data example** Partial data is allowed, but the method need to be `PATCH`.

**Body**

```json
{
    "name": "New daakfiles 1",
    "upload_date": "2020-05-11",
    "message": "Some message",
    "owner": "CEO",
}
```
note: `name` is optional. if you not give name then filename wil be used.

## Success Responses

**Code** : `200 OK`

**Content example** :

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

## Error Response

**Condition** : daakfile does not exist at URL

**Code** : `404 NOT FOUND`

**Content** : `{}`