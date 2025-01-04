<!-- Allow SVG-support -->
<?php
function allow_svg_uploads($mimes)
{
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'allow_svg_uploads');

?>