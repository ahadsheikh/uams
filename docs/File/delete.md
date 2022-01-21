# Delete a File

Delete the File.

**URL** : `/api/files/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the File in the
database.

**Method** : `DELETE`

**Auth required** : YES

## Success Response

**Condition** : If the File exists.

**Code** : `204 NO CONTENT`

**Content** : `{}`

## Error Responses

**Condition** : If there was no File available to delete.

**Code** : `404 NOT FOUND`

**Content** : `{}`
