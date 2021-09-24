# Central Times REST API

This plugin currently performs the following changes to the REST API:

- Registers a field, `ct_raw`, containing raw un-rendered post data, with shortcodes, to each post on `/wp/v2/posts`
- Registers a new endpoint `/centraltimes/v1/shortcodes`, which describes the internal `shortcode_tags` global
  variable. (
  shortcode names are the keys)
- Registers a new endpoint `/wp/v2/staff_profile` for the SNO `staff_profile` custom post type.
- Registers post meta fields `jobtitle`, `name`, `schoolyear`, `sno_deck`, `staffposition`, and `writer` as keys under
  each `staff_profile` entry.
- Registers custom taxonomies at the endpoints `/wp/v2/staff_year` and `/wp/v2/staff_name`, for `staff_year`
  and `staff_name` respectively.