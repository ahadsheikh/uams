# Delete a Work

Delete the Work.

**URL** : `/api/works/:pk/`

**URL Parameters** : `pk=[integer]` where `pk` is the ID of the Work in the
database.

**Method** : `DELETE`

**Auth required** : YES

## Success Response

**Condition** : If the Work exists.

**Code** : `204 NO CONTENT`

**Content** : `{}`

## Error Responses

**Condition** : If there was no Work available to delete.

**Code** : `404 NOT FOUND`

**Content** : `{}`
