# Delete a Office

Delete the Office.

**URL** : `/api/offices/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the Office in the
database.

**Method** : `DELETE`

**Auth required** : YES

## Success Response

**Condition** : If the Office exists.

**Code** : `204 NO CONTENT`

**Content** : `{}`

## Error Responses

**Condition** : If there was no Office available to delete.

**Code** : `404 NOT FOUND`

**Content** : `{}`
