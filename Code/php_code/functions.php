<?php
function phpAlert($msg, $page) {
  echo "<script>
  alert('$msg');
  window.location.href='$page';
  </script>";
}

function cleanString($input)
{
    $input = strip_tags($input);    // -> not a tag < 5
    return filter_var ( $input, FILTER_SANITIZE_STRING); // -> not a tag
} 
function cleanInteger($input)
{
    if (filter_var($int, FILTER_VALIDATE_INT) === 0 || !filter_var($int, FILTER_VALIDATE_INT) === false) {
        return $input;
      } else {
        return -1;
      }
} 
?>