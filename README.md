# Central Times REST API

This plugin currently performs the following changes to the REST API:

- Registers a field, `ct_raw`, containing raw un-rendered post data, with shortcodes, to each post on `/wp/v2/posts`
- Registers a new endpoint `/centraltimes/v1/shortcodes`, which returns an array of shortcode names.
- Registers a new endpoint `/wp/v2/staff_profile` for the SNO `staff_profile` custom post type.
- Registers a new endpoint `/centraltimes/v1/ngg-gallery/(?P<id>\d+)`, to return NextGEN gallery image data.
- Registers a new endpoint `/centraltimes/v1/sno-gallery/(?P<ids>(\d+,*)+)`, to return SNO gallery image data.
- Registers a new endpoint `/centraltimes/v1/rules` endpoint to blacklist COVID-19 content due to app store restrictions.
- Registers metas of `post` (endpoint `posts` in namespace `wp/v2`): `writer`, `sno_deck`, `jobtitle`, `video`,
  & `videographer` to REST fields `ct_writer`, `ct_subtitle`, `ct_jobtitle`, `ct_video`, & `ct_videographer`,
  respectively.
- Registers custom taxonomies at the endpoints `/wp/v2/staff_year` and `/wp/v2/staff_name`, for `staff_year`
  and `staff_name` respectively.

# Changelog

## v0.8.0
- Added hardcoded `/centraltimes/v1/rules` endpoint to blacklist COVID-19 content due to app store restrictions.

## v0.7.1
- Fixed bug that left out the Editorials tab category.

## v0.7.0
- Project has been renamed from `wp_ct_rest_api` to `wp_centraltimes`
- Registered a new endpoint `/centraltimes/v1/sno-gallery/(?P<ids>(\d+,*)+)`, to return SNO gallery image data

## v0.6.0
- Registered a new endpoint `/centraltimes/v1/ngg-gallery/(?P<id>\d+)`, to return gallery image data
- Modified `/centraltimes/v1/shortcodes` to return an array of shortcode names instead of shortcode keys

## v0.5.1

- Metas registered in v0.5.0 did not actually exist. Removed those registrations, and fixed behavior by registering
  metas of `post` (endpoint `posts` in namespace `wp/v2`): `writer`, `sno_deck`, `jobtitle`, `video`, & `videographer`
  to REST fields `ct_writer`, `ct_subtitle`, `ct_jobtitle`, `ct_video`, & `ct_videographer`, respectively.

## v0.5.0

- Register post metas `jobtitle`, `name`, `schoolyear`, `sno_deck`, `staffposition`, and `writer` as fields under
  each `staff_profile` entry.

## v0.4.0

- Register custom taxonomies at the endpoints `/wp/v2/staff_year` and `/wp/v2/staff_name`, for `staff_year`
  and `staff_name` respectively.

## v0.3.0

- Register a new endpoint `/wp/v2/staff_profile` for the SNO `staff_profile` custom post type.

## v0.2.0

- Register a new endpoint `/centraltimes/v1/shortcodes`, which describes the internal `shortcode_tags` global
  variable. (shortcode names are the keys)

## v0.1.0

- Register a field, `ct_raw`, containing raw un-rendered post data, with shortcodes, to each post on `/wp/v2/posts`
