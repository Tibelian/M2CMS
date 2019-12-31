<?php

$_SESSION['downloadList'] = getSettings('download');
$_SESSION['text'] = getSettings('language/' . Language::getIso() . '/text');
