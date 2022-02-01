# Delete a Daakfile

Delete the daakfiles.

**URL** : `/api/daakfiles/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the daakfiles in the
database.

**Method** : `DELETE`

**Auth required** : YES

## Success Response

**Condition** : If the daakfiles exists.

**Code** : `204 NO CONTENT`

**Content** : `{}`

## Error Responses

**Condition** : If there was no daakfiles available to delete.

**Code** : `404 NOT FOUND`

**Content** : `{}`
