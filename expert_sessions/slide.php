<?php
require_once 'slide.class.php';
$slideshow = new Slideshow();
?>
<!DOCTYPE html>
<html>
  <head>
    <title><?php echo $slideshow->getTitle(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/pwt.css" />
    <link rel="stylesheet" href="css/<?php echo $slideshow->getStyle(); ?>.css" />
  </head>
  <body>
    <textarea id="source"><?php echo file_get_contents($slideshow->getFile()); ?></textarea>
    <script src="js/remark-latest.min.js"></script>
    <script>
      var slideshow = remark.create({
        slideNumberFormat: '<?php echo $slideshow->getTitle(); ?> - %current% of %total%',
        highlightStyle: 'googlecode'
      });
    </script>
  </body>
</html>
