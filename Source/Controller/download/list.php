<?php

$_SESSION['downloadList'] = getJson('download');
$_SESSION['text'] = getJson('language/' . Language::getIso() . '/text');
