<?php 





Class Helpers{

//*
// a collections of functions
//


public static function escape($text) {
    return htmlspecialchars((string) $text, ENT_QUOTES, 'UTF-8');
}

public static function postUrl($post) {
    return URL_GEN . (!empty($post->slug) ? 'blogs/show/'.rawurlencode($post->slug) : 'blogs/read/'.(int) $post->id);
}

public static function readingTime($text) {
    return max(1, (int) ceil(str_word_count(strip_tags($text)) / 200));
}

public static function italianDate($date) {
    $months = [1=>'gennaio', 'febbraio', 'marzo', 'aprile', 'maggio', 'giugno', 'luglio', 'agosto', 'settembre', 'ottobre', 'novembre', 'dicembre'];
    $time = strtotime($date);
    return date('j', $time).' '.$months[(int) date('n', $time)].' '.date('Y', $time);
}

public function cut_text($text, $num_chars) {
    $text = trim(html_entity_decode(strip_tags($text), ENT_QUOTES, 'UTF-8'));
    if (mb_strlen($text) > $num_chars) {
      $text = mb_substr($text, 0, $num_chars);
      $space = mb_strrpos($text, ' ');
      if ($space !== false) { $text = mb_substr($text, 0, $space); }
      $text .= '...';
    }
    return self::escape($text);
  }

 public static function slugify($text) {
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