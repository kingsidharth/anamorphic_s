<?php

/* 
 *
 * HELPER FUNCTIONS 
 *
 */


# Get an array as a list
function get_array_list($array) {
  echo implode(",", $array);
} 

# Print the above
function the_array_list($array) {
  echo get_array_list($array);
}

