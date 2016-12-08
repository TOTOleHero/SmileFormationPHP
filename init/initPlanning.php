<?php


require_once __DIR__.'/../lib/planning-data.lib.php';

$initData = [

[ 'date' => "20161203", "label" => 'PHP base', 'teacher'=> 'Thomas Lecarpentier'],
[ 'date' => "20161205", "label" => 'PHP base', 'teacher'=> 'Thomas Lecarpentier'],
[ 'date' => "20161206", "label" => 'PHP base', 'teacher'=> 'Thomas Lecarpentier'],
[ 'date' => "20161207", "label" => 'PHP base', 'teacher'=> 'Thomas Lecarpentier'],
[ 'date' => "20161208", "label" => 'PHP base', 'teacher'=> 'Thomas Lecarpentier'],
[ 'date' => "20161209", "label" => 'PHP avancé'],
[ 'date' => "20161211", "label" => 'PHP avancé'],
[ 'date' => "20161212", "label" => 'PHP avancé'],
[ 'date' => "20161213", "label" => 'PHP avancé'],

 ];

persistPlanningData($initData);