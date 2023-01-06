<?php

/**
 * Fonction pour convertir des bytes en format KB / MB / GB / TB / EB / ZB en fonction de sa tailles
 *  Retourne les bytes avec leurs unités de mesures correspondant. Les décimals des bytes retournées sont arrondis 2
 */
function convertSize($bytes, $precision = 2) {
  
  // On divise les bytes par 1024 jusqu'a trouver son unité de mesure, si unité trouvé alors on retourne le résultat 
  // A chaque augmentation d'unité de temps on divise à nouveau avec celui inférieur 
  // Dans le cas ou aucun unité ne correspond alors on est sur des bytes infierieur à 1024

  $kilobytes = $bytes / 1024;
  
  if ($kilobytes < 1024) {
    return round($bytes, $precision) . ' KB';
  }

  $megabytes = $kilobytes / 1024;

  
  if ($megabytes < 1024) {
    return round($megabytes, $precision) . ' MB';
  }

  $gigabytes = $megabytes / 1024;


  if ($gigabytes < 1024) {
    return round($gigabytes, $precision) . ' GB';
  }


  $terabytes = $gigabytes / 1024;

  if ($terabytes < 1024) {
    return round($terabytes, $precision) . ' TB';
  }

  $petabytes = $terabytes / 1024;

  if ($petabytes < 1024) {
    return round($petabytes, $precision) . ' TB';
  }

  $exabytes = $petabytes / 1024;

  if ($exabytes < 1024) {
    return round($exabytes, $precision) . ' EB';
  }

  $zettabytes = $exabytes / 1024;

  if ($zettabytes < 1024) {
    return round($zettabytes, $precision) . ' ZB';
  }

  $yottabytes = $zettabytes / 1024;

  if ($yottabytes < 1024) {
    return round($yottabytes, $precision) . ' ZB';
  }

  $hellabyte = $yottabytes / 1024;

  if ($hellabyte < 1024) {
    return round($hellabyte, $precision) . ' HB';
  }
  
  return $bytes . ' B';
}
