<meta charset="utf-8" />
<?php
  if (isset($_GET['q']) && !is_null($_GET['q'])) {
    $q = urlencode($_GET['q']);
    $url = 'https://maps.googleapis.com/maps/api/geocode/json?address=' . $q;
    $content = file_get_contents($url);
    $content = json_decode($content);
    if ($content->status == 'OK') {
      $result = array_pop($content->results);
      $output = $result->formatted_address;
    } else {
      $output = 'Did not find';
    }
  }
?>
<form>
  <input type="text" placeholder="Search query" name="q" />
  <input type="submit" value="Go!" />
</form>
<?php if (isset($output)): ?>
Output: <?= $output; ?>
<?php endif; ?>

