<?php
$slideGroups = array(
    array(
        'group' => 'Programma',
        'style' => 'expertsession',
        'slides' => array(
            array('file' => 'joomla_templating/sander/goede_basis', 'title' => 'Een goede basis', 'speaker' => 'Sander'),
            array('file' => 'joomla_templating/jisse/template_overrides', 'title' => 'Template Overrides', 'speaker' => 'Jisse'),
            array('file' => 'joomla_templating/sander/jlayout', 'title' => 'JLayout', 'speaker' => 'Sander'),
            array('file' => 'joomla_templating/hans/bootstrap', 'title' => 'Bootstrap', 'speaker' => 'Hans'),
            array('file' => 'joomla_templating/jisse/template_overrides', 'title' => 'PHP Helper klasse', 'speaker' => 'Jisse'),
            array('file' => 'joomla_templating/jisse/js_snippets', 'title' => 'JavaScript / jQuery', 'speaker' => 'Jisse'),
            array('file' => 'joomla_templating/hans/less', 'title' => 'LESS', 'speaker' => 'Hans'),
            array('file' => 'joomla_templating/jisse/building_tools', 'title' => 'Automatiseren', 'speaker' => 'Jisse'),
        ),
    ),
);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Joomla! Templating - Expert Sessie</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <link rel="stylesheet" href="css/pwt.css" />
    <link rel="stylesheet" href="css/custom.css" />
  </head>
  <body style="background: transparent url('images/expert-sessie-joomla-templating.jpg') top center no-repeat">
    <div class="container">
        <div class="title-box">
            <div class="title">
                <h1>Joomla! Templating<br/><span>Expert Sessie</span></h1>
                <p>vrijdag 06 februari, 14:00-17:00 uur, Almere</p>
            </div>
        </div>
    </div>
    <div class="container container-program">
    <?php foreach($slideGroups as $slideGroup): ?>
    <h3><?php echo $slideGroup['group']; ?></h3>
    <ul>
        <?php foreach($slideGroup['slides'] as $slide) : ?>
        <li>
            <?php $title = $slide['title'] . ' (' . $slide['speaker']. ')'; ?>
            <a href="slide.php?style=<?= $slideGroup['style'] ?>&slide=<?= $slide['file'] ?>&title=<?= $slide['title']; ?>">
                <?php echo $title; ?>
            </a>
        </li>
        <?php endforeach; ?>
    </ul>
    <?php endforeach; ?>
    </div>
  </body>
</html>
