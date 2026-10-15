<?php 





Class Helpers{

//*
// a collections of functions
//


public function cut_text($text, $num_chars) {
    if (strlen($text) > $num_chars) {
      $text = substr($text, 0, $num_chars);
      $text = substr($text, 0, strrpos($text, ' '));
      $text .= '...';
    }
    return $text;
  }

 public function slugify($text) {
    // Replace non-letter or non-digit characters with a hyphen
    $text = preg_replace('~[^\pL\d]+~u', '-', $text);
  
    // Transliterate non-ASCII characters to ASCII
    $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
  
    // Remove any remaining non-letter or non-digit characters
    $text = preg_replace('~[^-\w]+~', '', $text);
  
    // Convert to lowercase and trim hyphens
    $text = strtolower(trim($text, '-'));
  
    // Return the resulting slug URL
    return $text;
  }  
  
}