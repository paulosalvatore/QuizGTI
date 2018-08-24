<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
	    Quiz - GTI
        <?= $this->fetch("title") ?>
    </title>
    <?= $this->Html->meta("icon") ?>

	<?= $this->Html->script("jquery.min") ?>

	<?= $this->fetch("meta") ?>
    <?= $this->fetch("css") ?>
    <?= $this->fetch("script") ?>
</head>
<body>
    <?= $this->Flash->render() ?>
    <?= $this->fetch("content") ?>
</body>
</html>
