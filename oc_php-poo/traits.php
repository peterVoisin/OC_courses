<?php
trait HTMLFormter
{
  public function format($text)
  {
    return '<p>Date : '.date('d/m/Y').'</p>'."\n".
           '<p>'.nl2br($text).'</p>';
  }
}

class Writer
{
  use HTMLFormter;

  public function write($text)
  {
    file_put_contents('fichier.txt',$this->format($text));
  }
}

class Mailer{
  use HTMLFormter;

  public function send($text)
  {
    mail('login@fai.tld','Test avec les traits PHP',$this->format($text));
  }
}

$w = new Writer;
$w->write('Hello world!');

$m = new Mailer;
$m->send('Hello World!');
