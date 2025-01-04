<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
  <?php
  if (is_category()) {
      single_cat_title(); // Category
  } elseif (is_tag()) {
      single_tag_title(); // Tag name
  } elseif (is_archive()) {
      the_archive_title(); // Archivetitle
  } elseif (is_singular()) {
      the_title(); // Titel for single post org page
  } else {
      bloginfo('name'); // Standard: site name
  }
  ?>
  </title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="<?php bloginfo('stylesheet_url') ?>">
  <?php wp_head(); ?>
</head>

<body>
  <header>

  </header>